<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Extras extends Controller {

    function get_post_id_by_meta($company_id) {
        $this->db->where('meta_key', 'company_id');
        $this->db->where('meta_value', $company_id);
        $query = $this->db->get('wp_postmeta');

        if ($query->row()) {
            return $query->row()->post_id;
        }

        return false;
    }

    function get_service_page_id_by_quote_url($url = false) {

        if (!$url) {
            $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
            $current_url = "";
            foreach ($uriSegments as $key => $segment) {
                if ($segment) {
                    $current_url .= "/" . $segment;
                }
            }

            $url = $current_url;
        }

        $this->db->select("post_id");
        $this->db->where("meta_key", "services_banner_get_a_quote_url");
        $this->db->like("meta_value", $url);
        $query = $this->db->get("wp_postmeta");

        $row = $query->row();
        if (isset($row->post_id)) {
            return $row->post_id;
        }

        return false;

        // Select post_id from wp_postmeta where meta_key = "services_banner_get_a_quote_url" and meta_value like '%/get-a-quote/air-conditioning/%';
    }

    function get_fuel_per_litre() {
        $query = $this->db->get('fuel_per_litre');

        header('Content-Type: Application/json');
        echo json_encode(array('data' => $query->result()));
    }

    function get_fuel_per_gallon() {
        $query = $this->db->get('fuel_per_gallon');

        header('Content-Type: Application/json');
        echo json_encode(array('data' => $query->result()));
    }

    function get_fuel_per_tank() {
        $query = $this->db->get('fuel_per_tank');

        header('Content-Type: Application/json');
        echo json_encode(array('data' => $query->result()));
    }

    function get_highest_fuel_cost() {
        $this->db->select('t.Country, `t.2022` as tank, `l.2022` as litre, `g.2022` as gallon');
        $this->db->join('fuel_per_litre l', 'l.Country=t.Country');
        $this->db->join('fuel_per_gallon g', 'g.Country=t.Country');
        $query = $this->db->get('fuel_per_tank t');
        $fuel_prices = $query->result();

        foreach ($fuel_prices as $fuel_price) {
            $fuel_price->tank = substr($fuel_price->tank, 1);
            $fuel_price->litre = substr($fuel_price->litre, 1);
            $fuel_price->gallon = substr($fuel_price->gallon, 1);
        }

        $price = array_column($fuel_prices, 'tank');
        array_multisort($price, SORT_DESC, $fuel_prices);

        foreach ($fuel_prices as $key => &$fuel_price) {
            $fuel_price->id = $key + 1;
            $fuel_price->tank = '$' . $fuel_price->tank;
            $fuel_price->litre = '$' . $fuel_price->litre;
            $fuel_price->gallon = '$' . $fuel_price->gallon;
        }

        header('Content-Type: Application/json');
        echo json_encode(array('data' => array_slice($fuel_prices, 0, 10)));
    }

    function get_petrol_cost() {
        $this->db->select(
            'Country, 
            `2022 - Tank` as per_tank, 
            `YoY Tank Absolute` as yoy_change, 
            `5 Year Absolute` as year_change,
            `YoY % change` as yoy_percentage,
            `5 Year % change` as year_percentage
            '
        );
        $query = $this->db->get('petrol_costs');
        $petrol = $query->result();


        foreach ($petrol as $fuel) {
            $fuel->yoy_percentage = substr($fuel->yoy_percentage, 0, -1);
        }

        $yoy_percentage = array_column($petrol, 'yoy_percentage');
        array_multisort($yoy_percentage, SORT_DESC, $petrol);

        foreach ($petrol as $key => &$fuel) {
            $fuel->id = $key + 1;
            $fuel->yoy_percentage = $fuel->yoy_percentage . '%';
        }

        header('Content-Type: Application/json');
        echo json_encode(array('data' => array_slice($petrol, 0, 10)));
    }


    function get_petrol_cost_yoy() {
        $this->db->select('
        t.Country, 
        `t.2022` as tank_price, 
        `t.YoY Change` as tank_increase_price, 
        `l.2022` as litre_price, 
        `l.YoY Change` as litre_increase_price, 
        `g.2022` as gallon_price, 
        `g.YoY Change` as gallon_increase_price, 
        ');
        $this->db->join('fuel_per_litre l', 'l.Country=t.Country');
        $this->db->join('fuel_per_gallon g', 'g.Country=t.Country');
        $query = $this->db->get('fuel_per_tank t');
        $petrol_yoy = $query->result();

        foreach ($petrol_yoy as $key => $petrol) {
            if (substr($petrol->tank_increase_price, 0, 1) == '$') {
                $petrol->tank_increase_price = substr($petrol->tank_increase_price, 1);
            }

            if (substr($petrol->tank_increase_price, 0, 1) == '-') {
                $petrol->tank_increase_price =  "-" . substr($petrol->tank_increase_price, 2);
            }
            
        }

        $yoy_percentage = array_column($petrol_yoy, 'tank_increase_price');
        array_multisort($yoy_percentage, SORT_DESC, $petrol_yoy);

        foreach ($petrol_yoy as $key => $fuel) {
            $fuel->id = $key + 1;

            if (substr($fuel->tank_increase_price, 0, 1) == '-') {
                $fuel->tank_increase_price =  "-$" . substr($fuel->tank_increase_price, 1);
            }

            if (substr($fuel->tank_increase_price, 0, 1) != '-') {
                $fuel->tank_increase_price = '$' . $fuel->tank_increase_price;
            }

        }

        header('Content-Type: Application/json');
        echo json_encode(array('data' => $petrol_yoy));
    }
}
