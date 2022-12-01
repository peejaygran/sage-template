<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Areas extends Controller {



    function get_nearby_areas($args = array()) {


        $lat = (int) $args["lat"];
        $lng = (int) $args["lng"];

        $this->db->where('lat >=', $lat - 1);
        $this->db->where('lat <=', $lat + 1);
        $this->db->where('lng >=', $lng - 1);
        $this->db->where('lng <=', $lng + 1);
        $query = $this->db->get('au_postcodes');
        $areas = $query->result();

        foreach ($areas as &$value) {
            $_maps = new _Maps;
            $value->distance = $_maps->getDistanceBetweenPoints(array($lat, $lng), array($value->lat, $value->lng));
        }

        array_multisort(array_column($areas, "distance"), SORT_ASC, $areas);

        return $areas;
    }

    function get_suburbs($areas = array(), $sorting = false) {



        $suburbs = array();
        foreach ($areas as $area) {
            $suburbs[$area->suburb] = [
                "suburb" => $area->suburb, "lat" => $area->lat, "lng" => $area->lng, "distance" => $area->distance, "population" => $area->population
            ];
        }


        if ($sorting == "population") {
            array_multisort(array_column($suburbs, "population"), SORT_DESC, $suburbs);
        }
        if ($sorting == "distance") {
            array_multisort(array_column($suburbs, "distance"), SORT_ASC, $suburbs);
        }




        return array_values($suburbs);
    }


    function get_postcodes($areas = array(), $sorting = false) {



        $suburbs = array();
        foreach ($areas as $area) {
            $suburbs[$area->postcode] = [
                "suburb" => $area->suburb, "postcode" => $area->postcode, "lat" => $area->lat, "lng" => $area->lng, "distance" => $area->distance, "population" => $area->population
            ];
        }


        if ($sorting == "population") {
            array_multisort(array_column($suburbs, "population"), SORT_DESC, $suburbs);
        }
        if ($sorting == "distance") {
            array_multisort(array_column($suburbs, "distance"), SORT_ASC, $suburbs);
        }

        return array_values($suburbs);
    }

    function get_postcode_by_location($location) {

        $this->db->where('suburb', ucwords($location));
        $query = $this->db->get('au_postcodes');

        if (!$query->row()) {
            $this->db->like('suburb', ucwords($location));
            $query = $this->db->get('au_postcodes');
        }

        if (!$query->row()) {
            $this->db->where('urban_area', ucwords($location));
            $query = $this->db->get('au_postcodes');
        }

        if (!$query->row()) {
            $this->db->like('urban_area', ucwords($location));
            $query = $this->db->get('au_postcodes');
        }

        return $query->row();
    }


    /*
    function get_coverage_areas() {

        $lat =  -33.865143;
        $lng = 151.209900;

        $this->db->where('lat >=', $lat - 1);
        $this->db->where('lat <=', $lat + 1);
        $this->db->where('lng >=', $lng - 1);
        $this->db->where('lng <=', $lng + 1);
        $query = $this->db->get('au_postcodes');
        $areas = $query->result();

        foreach ($areas as &$value) {
            $_maps = new _Maps;
            $value->distance = $_maps->getDistanceBetweenPoints(array($lat, $lng), array($value->lat, $value->lng));
        }

        array_multisort( array_column($areas, "distance"), SORT_ASC, $areas);

        header('Content-Type: Application/json');
        echo json_encode($areas);
    }

    */
}
