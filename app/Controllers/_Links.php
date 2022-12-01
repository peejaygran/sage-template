<?php

namespace App\Controllers;

use DOMDocument;
use Sober\Controller\Controller;

class _Links extends Controller {

    function posts_bound_links($posts) {

        $new_posts = array();
        foreach ($posts as $post) {
            $new_posts[] = array(
                'id' => $post->ID,
                'type' => $post->post_type,
                'link' => get_permalink($post->ID)
            );
        }

        foreach ($new_posts as $post) {
            $this->cache_post_data($post);
        }
    }

    function cache_no_inbound_links() {
        $query = $this->db->get('seo_cache_posts_data');
        $crawled_links =  $query->result();
        $cached_links = array();

        foreach ($crawled_links as $crawled_link) {
            if (!isset($cached_links[$crawled_link->link])) {
                $cached_links[$crawled_link->link] = [];
            }
        }

        foreach ($crawled_links as $crawled_link) {
            $crawled_link_outbounds = json_decode($crawled_link->outbound);

            foreach ($crawled_link_outbounds as $crawled_link_outbound) {

                if (isset($cached_links[$crawled_link_outbound->link]) && !in_array($crawled_link->link, $cached_links[$crawled_link_outbound->link])) {
                    $cached_links[$crawled_link_outbound->link][] = $crawled_link->link;
                }
            }
        }

        foreach ($cached_links as $key => $inbounds) {
            $this->db->set('date', date('Y-m-d H:i:s'));
            $this->db->set('inbound', json_encode($inbounds));
            $this->db->where('link', $key);
            $this->db->update('seo_cache_posts_data');
        }
    }

    function cache_meta_by_post_type() {
        $post_type = $_POST['post_type'];

        $posts = get_posts(array(
            'numberposts' => -1,
            'post_type' => $post_type
        ));

        $this->posts_bound_links($posts);
        echo "done";
    }

    function get_cache_posts_seo() {
        $query = $this->db->get('seo_cache_posts_data');
        return $query->result();
    }

    function ajax_get_cache_posts_meta() {

        $this->db->select('
            post_id, 
            link,
            meta_title,
            meta_description,
        ');

        $query = $this->db->get('seo_cache_posts_data');
        $posts = $query->row();

        header('Content-Type: Application/json');
        echo json_encode(array('data' => $posts));
    }

    private function cache_post_data($post) {
        $doc = new DOMDocument();

        $this->db->where('link', $post['link']);
        $query = $this->db->get('seo_cache_posts_data');

        if ($query->row()) {
            if (date('ymd', strtotime($query->row()->date)) == date('ymd')) {
                return false;
            }
        }

        $current_post_id = $post['id'];
        $current_post_type = $post['type'];
        $current_post_link = $post['link'];
        $outbounds = array();
        $filtered_outbound = array();
        $link_data = array(
            'date' => date('Y-m-d H:i:s'),
            'post_type' => $current_post_type,
            'post_id' => $current_post_id,
            'link' => $current_post_link,
            'inbound' => json_encode(array())
        );

        $html = $this->init_curl_url_meta_chaching($current_post_link);
        @$doc->loadHTML($html);
        $anchors = $doc->getElementsByTagName('a');

        for ($i = 0; $i < $anchors->length; $i++) {
            $anchor = $anchors->item($i);

            if ($anchor->getAttribute('href')) {

                $link = $anchor->getAttribute('href');

                if (strpos($link, home_url()) === false && strpos($link, 'http') === false) {
                    if (substr($link, 0, 1) != '/') {
                        $link = '/' . $link;
                    }
                    $link = home_url() . $link;
                }

                $trailing_slash = 1;
                if (substr($link, -1) != '/') {
                    $trailing_slash = 0;
                }

                $nofollow = 0;
                if ($anchor->getAttribute('rel') == 'nofollow') {
                    $nofollow = 1;
                }

                $rel = '';
                if ($anchor->getAttribute('rel')) {
                    $rel = $anchor->getAttribute('rel');
                }


                if (strpos($link, 'tel') === false && strpos($link, '#') === false && strpos($link, 'mailto:') === false && strpos($link, 'Notice') === false) {
                    $outbounds[] = array(
                        'link' => $link,
                        'trailing_slash' => $trailing_slash,
                        'nofollow' => $nofollow,
                        'rel' => $rel
                    );
                } else {
                    $filtered_outbound[] = array(
                        'link' => $link,
                        'trailing_slash' => $trailing_slash,
                        'nofollow' => $nofollow,
                        'rel' => $rel
                    );
                }
            }
        }

        $link_data['outbound'] = json_encode($outbounds);
        $link_data['filtered_outbound'] = json_encode($filtered_outbound);

        $meta_title = $doc->getElementsByTagName('title');
        $link_data['meta_title'] = '';

        if ($meta_title->item(0)->nodeValue) {
            $link_data['meta_title'] = $meta_title->item(0)->nodeValue;
        }

        $link_data['meta_description'] = '';

        $metas = $doc->getElementsByTagName('meta');
        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            if ($meta->getAttribute('name') == 'description')
                $link_data['meta_description'] = $meta->getAttribute('content');
        }

        $this->db->where('link', $current_post_link);
        $query = $this->db->get('seo_cache_posts_data');
        $_link = $query->row();

        if (!$_link) {
            $this->db->insert('seo_cache_posts_data', $link_data);
        }

        if ($_link) {
            $this->db->where('link', $current_post_link);
            $this->db->update('seo_cache_posts_data', $link_data);
        }
    }

    private function init_curl_url_meta_chaching($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    function check_page_code_error($post_type) {
        $posts = get_posts(array('numberposts' => -1, 'post_type' => $post_type));
        $doc = new DOMDocument();

        foreach ($posts as $post) {
            $notice = 0;
            $link = get_permalink($post->ID);
            $html = $this->init_curl_url_meta_chaching($link);
            @$doc->loadHTML($html);
            $tags = $doc->getElementsByTagName('b');

            if ($tags->length) {
                foreach ($tags as $tag) {
                    if (strtolower($tag->nodeValue) == 'notice') {
                        $notice++;
                    }
                }
            }

            $this->db->where('post_id', $post->ID);
            $query = $this->db->get('code_error');

            if ($query->row()) {
                $data = array(
                    'post_type' => $post_type,
                    'link' => get_permalink($post->ID),
                    'notice' => $notice
                );
                $this->db->where('post_id', $post->ID);
                $this->db->update('code_error', $data);
            }

            if (!$query->row()) {
                $data = array(
                    'post_id' => $post->ID,
                    'post_type' => $post_type,
                    'link' => get_permalink($post->ID),
                    'notice' => $notice
                );
                $this->db->insert('code_error', $data);
            }
        }

        echo count($posts) . ' ' . $post_type;
    }

    function cron_code_error() {
        $this->db->order_by('date', 'asc');
        $query = $this->db->get('code_error');
        $post = $query->row();

        $doc = new DOMDocument();

        $notice = 0;
        $link = get_permalink($post->post_id);
        $html = $this->init_curl_url_meta_chaching($link);
        @$doc->loadHTML($html);
        $tags = $doc->getElementsByTagName('b');

        if ($tags->length) {
            foreach ($tags as $tag) {
                if (strtolower($tag->nodeValue) == 'notice') {
                    $notice++;
                }
            }
        }

        $data = array(
            'link' => $link,
            'notice' => $notice,
            'date' => date('Y-m-d H:i:s')
        );
        $this->db->where('post_id', $post->post_id);
        $this->db->update('code_error', $data);

        echo '<span style="display:none">' . $post->post_id . '</span>' . $link;
    }
}
