<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Reviews extends Controller {

    function save_tp_review() {
        $_POST['customer_review_date'] = date('Y-m-d H:i:s', strtotime($_POST['customer_review_date']));

        $this->db->where('customer_review_link', $_POST['customer_review_link']);
        $query = $this->db->get('trustpilot_reviews');

        if (!$query->result()) {
            $this->db->insert('trustpilot_reviews', $_POST);
        }
    }

    function get_tp_reviews() {
        $query = $this->db->get('trustpilot_reviews');
        return $query->result();
    }
}
