<?php

namespace App\Controllers;

use Illuminate\Support\Facades\App;
use Sober\Controller\Controller;

class _Tester extends Controller {

    function set_type() {
        set_post_type($this->input->get('post_id'), $this->input->get('post_type'));
        echo $this->input->get('post_id') . " set to " . $this->input->get('post_type');
    }

    function rename_attachment($post_id, $newfilename) {

        $file = get_attached_file($post_id);

        if (!$file) {
            echo "No attachment found!";
            die();
        }

        if (!$newfilename) {
            echo "Filename is empty!";
            die();
        }

        $path = pathinfo($file);
        $newfile = $path['dirname'] . "/" . $newfilename . "." . $path['extension'];
        rename($file, $newfile);
        update_attached_file($post_id, $newfile);

        echo "attachment " . $post_id . " updated from " . $path['basename'] . " to " . $newfilename . "." . $path['extension'];
    }

    function fdp($post_id) {
        wp_delete_post($post_id, true);
        echo "post id " . $post_id . " deleted successfully";
    }

    function lorem() {


        $result = $this->db->query("SELECT * FROM `wp_posts` WHERE (`post_date` LIKE '%lorem%' OR `post_date_gmt` LIKE '%lorem%' OR `post_content` LIKE '%lorem%' OR `post_title` LIKE '%lorem%' OR `post_excerpt` LIKE '%lorem%' OR `post_status` LIKE '%lorem%' OR `comment_status` LIKE '%lorem%' OR `ping_status` LIKE '%lorem%' OR `post_password` LIKE '%lorem%' OR `post_name` LIKE '%lorem%' OR `to_ping` LIKE '%lorem%' OR `pinged` LIKE '%lorem%' OR `post_modified` LIKE '%lorem%' OR `post_modified_gmt` LIKE '%lorem%' OR `post_content_filtered` LIKE '%lorem%' OR `guid` LIKE '%lorem%' OR `post_type` LIKE '%lorem%' OR `post_mime_type` LIKE '%lorem%')");

        return $result->result();
    }


    function permalinks() {
        header('Location:' . home_url('wp-admin/admin.php?page=seo-monitor'));
        die();
        // echo \App\template('partials.links-table');
    }

    function checkfile($file_path = false) {
        if ($file_path) {
            echo "<p>File Path: $file_path </p>";
            // die();
            echo \App\template($file_path);
        }
    }



    function save_404($data) {
        $this->db->insert('user_view_404', $data);
    }

    function get_saved_404() {
        $query = $this->db->get('user_view_404');
        return $query->result();
    }

    function check_page_error() {
        
    }
}
