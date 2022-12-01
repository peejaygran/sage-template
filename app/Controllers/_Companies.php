<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Companies extends Controller {


    function get_all_companies() {
        $companies = json_decode(file_get_contents('https://whatremovals.co.uk/dashboard/operators/get_all_operators'));   
        header('Content-Type: Application/json');
        echo json_encode(array('data' => $companies));
    }


    function get_companies_by_location($location) {

        $_companies = file_get_contents('https://whatremovals.co.uk/dashboard/operators/get_operators_by_location_2?radius=20&location=' . urlencode("$location, UK"));
        $companies = json_decode($_companies);
        foreach ($companies as &$company) {
            $services = [];
            $leads = json_decode($company->rmv_leads);

            if (is_array($leads)) {
                if (in_array(1, $leads)) {
                    $services[] = '<i class="fas fa-building circle-badge mr-1" title="Apartment / Flat moves"></i>';
                }
                if (in_array(2, $leads)) {
                    $services[] = '<i class="fas fa-home circle-badge mr-1" title="House Moves"></i>';
                }
                if (in_array(3, $leads)) {
                    $services[] = '<i class="fas fa-home-alt circle-badge mr-1" title="Bungalow"></i>  ';
                }
                if (in_array(4, $leads)) {
                    $services[] = '<i class="fas fa-warehouse circle-badge mr-1" title="Moves from / to a Storage Facility"></i>';
                }
                if (in_array(5, $leads)) {
                    $services[] = '<i class="fas fa-couch circle-badge mr-1" title="Single or Multiple Furniture"></i>';
                }
                if (in_array(7, $leads)) {
                    $services[] = '<i class="fas fa-warehouse-alt circle-badge mr-1" title="Storage Unit"></i>';
                }
                if (in_array(8, $leads)) {
                    $services[] = '<i class="fas fa-phone-office circle-badge mr-1" title="Office"></i>';
                }
                if (in_array(9, $leads)) {
                    $services[] = '<i class="fas fa-trash circle-badge mr-1" title="Rubbish Clearance"></i>';
                }
                if (in_array(10, $leads)) {
                    $services[] = '<i class="fas fa-info-circle circle-badge mr-1" title="Others"></i>';
                }
                if (in_array(11, $leads)) {
                    $services[] = '<i class="fas fa-car circle-badge mr-1" title="Car Transport"></i>';
                }
                if (in_array(12, $leads)) {
                    $services[] = '<i class="fas fa-motorcycle circle-badge mr-1" title="Motobike Transport"></i>';
                }
                if (in_array(13, $leads)) {
                    $services[] = '<i class="fas fa-shopping-cart circle-badge mr-1" title="Purchase Deliveries"></i>';
                }

                $company->leads = $services;
            }

            if (isset($company->general_reviews)) {

                $reviews_sum = 0;
                foreach ($company->general_reviews as $key => $reviews) {
                    $reviews_sum += $reviews->rating;
                }

                $reviews_sum /= count($company->general_reviews);
                $company->review_stars = $reviews_sum;
            }
        }

        return $companies;
    }

    function replace_page_type(){

        echo "<h1>Yow<h1/>";

        // views/template-advice-category.blade.php
    }



}
