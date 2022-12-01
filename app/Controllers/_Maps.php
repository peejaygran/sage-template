<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class _Maps extends Controller {

  

    function getDistanceBetweenPoints($point_a = array(), $point_b = array(), $unit = 'Mi') {

        $latitude_a = $point_a[0];
        $longitude_a = $point_a[1];

        $latitude_b = $point_b[0];
        $longitude_b = $point_b[1];

        $latitude_a = floatval($latitude_a);
        $latitude_b = floatval($latitude_b);
        $longitude_a = floatval($longitude_a);
        $longitude_b = floatval($longitude_b);
        $theta = $longitude_a - $longitude_b;
        $distance = (sin(deg2rad($latitude_a)) * sin(deg2rad($latitude_b))) + (cos(deg2rad($latitude_a)) * cos(deg2rad($latitude_b)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch ($unit) {
            case 'Mi':
                break;
            case 'Km':
                $distance = $distance * 1.609344; //metters to miles = 10 //radius miles

        }
        return $distance;
    }


}
