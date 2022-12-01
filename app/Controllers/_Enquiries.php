<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Enquiries extends Controller {


    public function insert_to_enquiries($entry_id, $params ) {

        //replace all blanks
        foreach ($params as &$param) {
            $param = rtrim($param, ',');
            if (empty($param)) {
                $param = '';
            }
        }

        global $wpdb;
        $wpdb->show_errors = true;
        $wpdb->insert("sp_enquiries", $params);


        // Print last SQL query string
        // echo $wpdb->last_query;

        // Print last SQL query result
        // echo $wpdb->last_result;

        // Print last SQL query Error
        // echo $wpdb->last_error;
        //     die();





    }



    public function check_duplicates_from_enquiries($params) {


        global $wpdb;
        $wpdb->show_errors = true;

        $sql = "Select * 
                from sp_enquiries 
                where postcode = '" . $params['postcode'] . "'  
                and name = '" . $params['name'] . "'  
                and phone = '" . $params['phone'] . "'  
                and enquiry_date like '" . date('Y-m-d H') . "%' ;";

        return $wpdb->get_row($sql);
    }



}
