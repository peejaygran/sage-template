<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Migration extends Controller {

    function generate_company_profile() {
        $companies = json_decode(file_get_contents('http://whatremovals.co.uk/dashboard/operators/export_companies'));

        foreach ($companies as $company) {
            $this->db->where('meta_key', 'company_id');
            $this->db->where('meta_value', $company->rmv_id);
            $query = $this->db->get('wp_postmeta');
            $company_filter = $query->row();

            if (!$company_filter) {
                $this->create_profile_page(array('rmv_id' => $company->rmv_id, 'rmv_company' => $company->rmv_company));
            }

            if ($company_filter) {
                $this->db->where('post_id', $company_filter->post_id);
                $this->db->where('meta_key', '_wp_page_template');
                $this->db->where('meta_value', 'views/template-profile.blade.php');
                $query = $this->db->get('wp_postmeta');
                $template_filter = $query->row();

                if (!$template_filter) {
                    $this->create_profile_page(array('rmv_id' => $company->rmv_id, 'rmv_company' => $company->rmv_company));
                }
            }
        }
    }

    private function create_profile_page($company) {

        $url = 'movers/' . sanitize_file_name($company['rmv_company']);
        $page_url  =  str_replace(" ", "-", $url);
        $page_url  =  strtolower($page_url);
        $page_url  =  trim($page_url);

        $post    = array(
            'post_title' => $company['rmv_company'],
            'post_status' => 'publish',
            'post_type' => "page",
            'post_author' => 1,
            'post_content' => "",
            'post_name' => $page_url
        );

        $new_post_id = wp_insert_post($post);

        add_post_meta($new_post_id, "_wp_page_template", "views/template-profile.blade.php");
        add_post_meta($new_post_id, "company_id", $company['rmv_id']);
        add_post_meta($new_post_id, "_company_id", "field_622ee843a3f51");


        //Update Permalink
        global $permalink_manager_uris;
        $permalink_manager_uris[$new_post_id] = $page_url;
        update_option('permalink-manager-uris', $permalink_manager_uris);



        $data = array("rmv_link" => $page_url);
        $this->db->where("rmv_id", $company['rmv_id']);
        $this->db->update("removals", $data);


        echo "<a href='" . $page_url . "'>  " .  $page_url  . "</a>";
    }

    // function delete_post() {
    //     $template_filter = null;
    //     $this->db->where('meta_key', 'company_id');
    //     $this->db->where('meta_value', null);
    //     $query = $this->db->get('wp_postmeta');
    //     $company_filter = $query->result();

    //     foreach ($company_filter as $company) {
    //         $this->db->where('post_id', $company->post_id);
    //         $this->db->where('meta_key', '_wp_page_template');
    //         $this->db->where('meta_value', 'views/template-profile.blade.php');
    //         $query = $this->db->get('wp_postmeta');
    //         $template_filter[] = $query->row();
    //     }

    //     foreach ($template_filter as $template) {
    //         wp_delete_post($template->post_id, true);
    //     }
    // }

    // function import_excel() {

    //     echo "qwe";

    //     $a = file_get_contents('https://docs.google.com/spreadsheets/d/1y_27vGegDIfD5ztw9OR13Ry9RgaFf469N7IOALgZCzw/edit#gid=1596504666');

    //     echo '<pre>';
    //     print_r($a);
    //     echo '</pre>';
    // }
}
