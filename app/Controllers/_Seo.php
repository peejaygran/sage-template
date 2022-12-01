<?php

namespace App\Controllers;

use DOMDocument;
use AIOSEO\Plugin;
use Sober\Controller\Controller;

class _Seo extends Controller {

    function auto_update_meta() {
        echo \App\template('dashboard.content.under-services');
    }

    function updateMetaDescription($postId, $post_description) {
        $this->db->where('post_id', $postId);
        $this->db->update('wp_aioseo_posts', array('description' => $post_description));
        update_post_meta($postId, '_aioseo_description', $post_description);
    }

    function updateMetaTitle($postId, $post_title) {
        $this->db->where('post_id', $postId);
        $this->db->update('wp_aioseo_posts', array('title' => $post_title));
        update_post_meta($postId, '_aioseo_title', $post_title);
    }

    function get_sample_content() {
        $url = "https://whatremovals.co.uk/dashboard/seo/get_sample_content?" .  http_build_query($_GET);
        $response =  wp_remote_get($url);
        $responseBody = wp_remote_retrieve_body($response);

        $string = str_ireplace("WhatRemovals", "GetMovingExperts", $responseBody);
        $string = str_ireplace("whatstorage", "GetMovingExperts", $string);

        echo $this->find_replace_locations($string);
        die();
    }

    function get_location_coordinates() {
        $url = "https://whatremovals.co.uk/dashboard/seo/get_location_coordinates?" .  http_build_query($_GET);
        $response =  wp_remote_get($url);
        $responseBody = wp_remote_retrieve_body($response);

        header('Content-Type: Application/json');
        echo $responseBody;
        die();
    }

    function find_replace_locations($string) {
        $locations = ["Chelsea", "London", "Glasgow", "Aberdeen", "Bakewell", "Camden", "Darlington", "Ealing", "Falkirk", "Gateshead", "Hackney", "Keighley", "Lambeth", "Macclesfield", "Nantwich", "Okehampton", "Paignton", "Ramsgate", "Saffron Walden", "Tamworth", "Uckfield", "Wadebridge", "York", "Aberdeenshire", "Aberystwyth", "Balham", "Banbury", "Accrington", "Bangor", "Acton", "Aldershot", "Alfreton ", "Alnwick ", "Altrincham", "Dartford", "Kendal", "Amersham", "Ampthill", "Andover", "Angus", "Antrim", "Armagh", "Ashbourne", "Ashburton", "Ashford", "Axminster", "Aylesbury", "Ayr", "Barnet", "Barnsley", "Barnstaple", "Ayrshire", "Barrow-in-Furness", "Barry", "Basingstoke", "Bath", "Battersea", "Beaconsfield", "Beckenham", "Bedford", "Bedlington", "Belfast", "Belper", "Bekhamsted", "Berkshire", "Beverley", "Bexley", "Bicester", "Bideford", "Biggleswade", "Bingley", "Blackburn", "Blackpool", "Bodmin", "Bognor Regis", "Bolton", "Boston", "Brackley", "Bracknell", "Bradford", "Braintree", "Brampton", "Brentford", "Brentwood", "Bridlington", "Bridport", "Brixham", "Broadstairs", "Bromley", "Bromsgrove", "Buckingham", "Burgess Hill", "Burnley", "Bury", "Bury St Edmunds", "Buxton", "Caerphilly", "Caithness", "Callington", "Camberley", "Camborne", "Cambridge", "Cambridgeshire", "Cannock", "Canterbury", "Cantebury", "Canvey Island", "Central London", "Chelmsford", "Chesham", "Cheshire", "Cheshunt", "Chester", "Chesterfield", "Chichester", "Chippenham", "Chiswick", "Chorley", "Christchurch", "Cirencester", "Clacton-on-Sea", "Clapham", "Colchester", "Coleraine", "Colne", "Congleton", "Corby", "Cornwall", "Crawley", "Crewe", "Crowborough", "Cumbernauld", "Cwmbran", "Dartmouth", "Daventry", "Dawlish", "Derry", "Devizes", "Devon", "Didcot", "Doncaster", "Dorchester", "Dorset", "Dover", "Dronfield", "Dudley", "Dumfries", "Dundee", "Dunfermline", "Dunstable", "Durham", "East Grinstead", "East London", "East Lothian", "East Sussex", "Eastleigh", "Ellesmere Port", "Ely", "Croydon", "Enfield", "Epping", "Epsom", "Essex", "Eton", "Evesham", "Exmouth", "Falmouth", "Fareham", "Farnham", "Felixstowe", "Fife", "Flitwick", "Folkestone", "Edinburgh", "Manchester", "Bristol", "Leicester", "Brighton", "Leeds", "Liverpool", "Coventry", "Nottingham", "Exeter", "Sheffield", "Inverness", "Southampton", "Oxford", "Cardiff", "Plymouth", "Derby", "Northampton", "Birmingham", "Bournemouth", "Newport", "Warrington", "Frodsham", "Fulham", "Wirral", "Gerrards Cross", "Gillingham", "Glossop", "Gloucester", "Gloucestershire", "Eastbourne", "Godalming", "Norwich", "Gosport", "Paisley", "Cheltenham", "Grantham", "Gravesend", "Great Torrington", "Great Yarmouth", "Greenwich", "Guildford", "Halifax", "Halstead", "Hamilton", "Hampshire", "Hampstead", "Harlow", "Harpenden", "Harrogate", "Harrow", "Hartlepool", "Hastings", "Hatfield", "Haverhill", "Hayle", "Haywards Heath", "Heathfield", "Hedge End", "Helensburgh", "Hemel Hempstead", "Hendon", "Henley-on-Thames", "Hereford", "Herefordshire", "Hertford", "Hertfordshire", "Hexham", "High Wycombe", "Highgate", "Hinckley", "Hitchin", "Holsworthy", "Honiton", "Hornchurch", "Horsham", "Hounslow", "Hove", "Huddersfield", "Hungerford", "Huntingdon", "Ilford", "Ilkeston", "Ilkley", "Ipswich", "Isle of Wight", "Isleworth", "Islington", "Ivybridge", "Kenilworth", "Kent", "Keswick", "Kettering", "Kidderminster", "Kingsbridge", "Kingston upon Hull", "Kirkcaldy", "Knutsford", "Knustford", "Lanarkshire", "Lancashire", "Lancaster", "Launceston", "Leicestershire", "Leigh", "Leighton Buzzard", "Leominster", "Letchworth", "Lewes", "Lewisham", "Leyton", "Lincoln", "Lisburn", "Liskeard", "Littlehampton", "Llanelli", "Londonderry", "Loughborough", "Loughton", "Louth", "Lowestoft", "Ludlow", "Luton", "Lytham St Annes", "Maidenhead", "Maidstone", "Malvern", "Mansfield", "March", "Margate", "Market Drayton", "Market Harborough", "Marlow", "Matlock", "Medway", "Melbourne", "Melksham", "Melton Mowbray", "Merseyside", "Middlesex", "Milton Keynes", "Mitcham", "Monmouth", "Morecambe", "Neath", "Nelson", "New Malden", "Newbury", "New Market", "Newquay", "Newton Abbot", "Norfolk", "North London", "North Shields", "North Yorkshire", "Northallerton", "North Allerton", "Northamptonshire", "Northumberland", "Northwich", "Notting Hill", "Nottinghamshire", "Nuneaton", "Oldham", "Olney", "Ormskirk", "Otley", "Oxfordshire", "Peckham", "Pembrokeshire", "Penrith", "Penryn", "Penzance", "Perth", "Peterborough", "Peterlee", "Pinner", "Pocklington", "Pontefract", "Pontypridd", "Poole", "Port Talbot", "Portsmouth", "Potters Bar", "Preston", "Putney", "Reading", "Redcar", "Redditch", "Redruth", "Reigate", "Retford", "Rhyl", "Richmond", "Richmond upon Thames", "Rickmansworth", "Ringwood", "Ripon", "Rochdale", "Rochester", "Romford", "Romsey", "Royston", "Rugby", "Ruislip", "Runcorn", "Rutland", "St Austell", "St Ives", "St Neots", "Salford", "Salisbury", "Sandbach", "Sandback", "Sandhurst", "Sandy", "Scarborough", "Scunthorpe", "Seaford", "Seaton", "Selby", "Sevenoaks", "Sherborne", "Shropshire", "Southend-on-Sea", "Southport", "Southwark", "Spalding", "St Helens", "Stafford", "Staffordshire", "Staines", "Stamford", "Stevenage", "Stirling", "Stockport", "Stoke Newington", "Stoke-on-Trent", "Stourbridge", "Stowmarket", "Stratford-upon-Avon", "Streatham", "Stroud", "Suffolk", "Sunderland", "Surbiton", "Surrey", "Sutton", "Swadlincote", "Swansea", "Swindon", "Taunton", "Tavistock", "Teignmouth", "Telford", "Tenterden", "Thatcham", "Tonbridge", "Torquay", "Totnes", "Tottenham", "Trowbridge", "Truro", "Twickenham", "Tyne and Wear", "Uxbridge", "Wakefield", "Wallingford", "Walsall", "Walthamstow", "Wandsworth", "Warminster", "Warwick", "Warwickshire", "Watford", "Wellingborough", "Wellington", "Welwyn Garden City", "Wembley", "house-removals-wembley", "West London", "West Lothian", "West Midlands", "West Sussex", "West Yorkshire", "Weybridge", "Weymouth", "Whitehaven", "Whitley Bay", "Whitstable", "Widnes", "Wigan", "Wisbech", "Witham", "Witney", "Woking", "Wokingham", "Wolverhampton", "Worcester", "Worcestershire", "Workington", "Worksop", "Worthing", "Wrexham", "South London", "Somerset", "Bedfordshire", "Bridgend", "Buckinghamshire", "Petersfield", "Sittingbourne", "Skelmersdale ", "Skipton", "Sleaford", "Slough", "Solihull", "South Shields", "South Yorkshire", "Derbyshire", "Sidmouth", "Sussex", "Wilmslow", "Wiltshire", "Wimbledon", "Winchester", "Windsor", "Winsford", "Orkney", "Kirkwall", "Motherwell", "Galashiels", "Newcastle", "Cleveland", "Hull", "Carlisle", "Llandrindod", "Llandudno", "Shrewsbury", "St. Albans", "Redhill", "Southall", "Kingston-upon-Thames", "East Central London", "North West London", "South East London", "South West London", "West Central London"];
        foreach ($locations as $location) {
            $string = str_replace($location, "[location-here]", $string);
        }
        return $string;
    }


    function CRON_cache_location_pages() {
    }

    function get_all_location_pages($args = array()) {

        $posts = get_posts([
            'post_type' => 'location',
            'post_status' => 'publish',
            'numberposts' => -1
        ]);

        if (isset($args["include_locations"])) {
            foreach ($posts as &$post) {
                $post->location = get_field("location", $post->ID);
            }
        }

        if (isset($args["include_service_page"])) {
            foreach ($posts as &$post) {
                $service = get_field("main_service", $post->ID);

                if (isset($service["service"][0])) {
                    $post->service_page = $service["service"][0];
                }
            }
        }




        //    $args["nearby_to"] must be a page ID
        if (isset($args["nearby_to"])) {

            $page_id = (int)$args["nearby_to"];

            $lat = get_post_meta($page_id, "location_lat", true);
            $lng = get_post_meta($page_id, "location_lng", true);

            $coordinates = [$lat, $lng];

            $_maps = new _Maps();
            foreach ($posts as &$_post) {

                $post_lat = get_post_meta($_post->ID, "location_lat", true);
                $post_lng = get_post_meta($_post->ID, "location_lng", true);

                $post_coordinates = [$post_lat, $post_lng];

                $_post->distance = $_maps->getDistanceBetweenPoints($coordinates, $post_coordinates);
            }

            array_multisort(array_column($posts, "distance"), SORT_ASC, $posts);
        }






        return $posts;
    }

    //mass resize images
    function mass_resize_wp_images($dimension_to_resize = 640) {

        $this->db->where('meta_key', '_wp_attached_file');
        $query = $this->db->get('wp_postmeta');

        $images = $query->result();



        foreach ($images as $image) {


            $dimensions = getimagesize(ABSPATH . "wp-content/uploads/" . $image->meta_value);

            if ((int)$dimensions[0]  > $dimension_to_resize) {

                $url = $image->meta_value;


                $current_filesize =  filesize(ABSPATH . "wp-content/uploads/" . $url);

                $current_filesize = round($current_filesize / 1024, 2); // kilobytes with two digits

                echo "<p> URL: " . site_url() . "/wp-content/uploads/" . $image->meta_value . "</p>";
                echo "<p> Old size: " . $current_filesize . "</p>";

                clearstatcache();

                $this->resize_image(ABSPATH . "wp-content/uploads/" . $url, $dimension_to_resize);

                $new_filesize =  filesize(ABSPATH . "wp-content/uploads/" . $url);
                $new_filesize = round($new_filesize / 1024, 2); // kilobytes with two digits

                echo "<p> New size: " . $new_filesize . "</p>";
                echo "</br>";
            }
        }


        die();
    }

    function resize_image($image_url = false, $size_limit = 200) {




        // ABSPATH
        // /home/630030.cloudwaysapps.com/ukmtuqkmqv/public_html/

        if (!$image_url) {
            $image_url = $this->input->get("url");
        }

        if (!$image_url) {
            return false;
        }




        $filename = basename($image_url);
        $image_url = str_replace(site_url(), ABSPATH, $image_url);




        $image_info = getimagesize($image_url);
        $type = $image_info["mime"];


        if ((int)$image_info[0] > $size_limit) {

            if (strpos($type, 'jpg') !== false) {
                $image = imagecreatefromjpeg($image_url);
                $imgResized = imagescale($image, $size_limit, -1); // width=500 and height = 400
                imagejpeg($imgResized, $image_url, 60);
            }

            if (strpos($type, 'jpeg') !== false) {
                $image = imagecreatefromjpeg($image_url);
                $imgResized = imagescale($image, $size_limit, -1); // width=500 and height = 400
                imagejpeg($imgResized, $image_url, 60);
            }

            if (strpos($type, 'png') !== false) {
                $image = imagecreatefrompng($image_url);
                $imgResized = imagescale($image, $size_limit, -1); // width=500 and height = 400
                imagepng($imgResized, $image_url);
            }

            if (strpos($type, 'webp') !== false) {
                $image = imagecreatefromwebp($image_url);
                $imgResized = imagescale($image, $size_limit, -1); // width=500 and height = 400
                imagewebp($imgResized, $image_url, 60);
            }
        }



        // echo $image_url;
        // die();

        return $image_url;
    }

    function cron_sitmap_xml() {
        // main sitemap
        $sitemap_links = get_field('sitemap_links', 2843);
        $xml_string = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        foreach ($sitemap_links as $link) {
            $xml_string .= '<sitemap><loc>' . $link['sitemap_url'] . '</loc><lastmod>' . date('Y-m-d\TH:i:s\.000\Z', strtotime(get_post(2843)->post_modified_gmt)) . '</lastmod></sitemap>';
        }
        $xml_string .= '</sitemapindex>';
        ($main_sitemap = fopen($_SERVER['DOCUMENT_ROOT'] . 'sitemap.xml', 'w', $_SERVER['CONTEXT_DOCUMENT_ROOT'])) or die('Unable to open file!');
        fwrite($main_sitemap, $xml_string);
        fclose($main_sitemap);

        // sitemap contents
        $sitemap_contents = get_field('sitemap_contents', 2843);
        foreach ($sitemap_contents as $content) {
            $xml_string = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

            $posts = get_posts(['numberposts' => -1, 'post_type' => $content['post_type']]);
            foreach ($posts as $post) {
                $xml_string .= '<url><loc>' . get_permalink($post->ID) . '</loc><lastmod>' . date('Y-m-d\TH:i:s\.000\Z', strtotime(get_post(2843)->post_modified_gmt)) . '</lastmod></url>';
            }
            $xml_string .= '</urlset>';

            ($sitemap_files = fopen($_SERVER['DOCUMENT_ROOT'] . 'sitemaps/' . $content['xml_filename'], 'w', $_SERVER['CONTEXT_DOCUMENT_ROOT'])) or die('Unable to open file!');
            fwrite($sitemap_files, $xml_string);
            fclose($sitemap_files);
        }

        header('Content-Type: Application/json');
        echo json_encode(array('text' => 'sitemap cron successful'));
    }

    function get_cache_bound_links() {
        $query = $this->db->get('cache_bound_links');
        return $query->result();
    }

    function cache_bound_links() {

        $this->db->where('link', $_POST['link']);
        $query = $this->db->get('cache_bound_links');
        $query_row = $query->row();


        if ($query_row) {

            $all_inbound = [];

            if ($_POST['inbound']) {
                $all_inbound[] = $_POST['inbound'];
            }

            foreach (json_decode($query_row->inbound) as $inbound) {
                if (strpos($inbound, '#wp-toolbar') != true && !in_array($inbound, $all_inbound)) {
                    $all_inbound[] = $inbound;
                }
            }

            $this->db->set('inbound', json_encode($all_inbound));
            $this->db->set('outbound', json_encode($_POST['outbound']));
            $this->db->where('link', $_POST['link']);
            $this->db->update('cache_bound_links');
        }

        if (!$query_row) {
            $data = array(
                'link' => $_POST['link'],
                'inbound' => json_encode(array()),
                'outbound' => json_encode($_POST['outbound'])
            );

            $this->db->insert('cache_bound_links', $data);
        }

        foreach ($_POST['outbound'] as $link) {

            $this->db->where('link', $link);
            $query = $this->db->get('cache_bound_links');
            $link_bounds = $query->row();

            if ($link_bounds) {
                $link_inbound = json_decode($link_bounds->inbound);

                if (!in_array($_POST['link'], $link_inbound)) {
                    $link_inbound[] = $_POST['link'];
                }

                $this->db->set('inbound', json_encode($link_inbound));
                $this->db->where('link', $link);
                $this->db->update('cache_bound_links');
            }
        }
    }

    function check_sitemap_links() {

        $sitemaps_xml = array();
        $sitemaps_xml_links = array();

        // sitemap
        $main_sitemap_url =  home_url('sitemap.xml');
        $main_sitemap = $this->init_curl($main_sitemap_url);

        if (!$main_sitemap) {
            $this->save_sitemap_status($main_sitemap_url, 404);
        }

        if ($main_sitemap) {
            $this->save_sitemap_status($main_sitemap_url, 200);
            $sitemaps_xml = $this->get_loc_tags_value($main_sitemap);
        }

        // sitemaps xml
        foreach ($sitemaps_xml as $xml_link) {
            $sitemap = $this->init_curl($xml_link);

            if (!$sitemap) {
                $this->save_sitemap_status($xml_link, 404);
            }

            if ($sitemap) {
                $this->save_sitemap_status($xml_link, 200);
                $sitemaps_xml_links = array_merge($sitemaps_xml_links, $this->get_loc_tags_value($sitemap));
            }
        }

        // sitemap links
        foreach ($sitemaps_xml_links as $link) {
            $url = $this->init_curl($link);

            if (!$url) {
                $this->save_sitemap_status($link, 404);
            }

            if ($url) {
                $this->save_sitemap_status($link, 200);
            }
        }

        echo "done";
    }

    private function get_loc_tags_value($html_content) {
        $dom = new DOMDocument();
        $data = array();

        @$dom->loadhtml($html_content);
        $sitemaps = $dom->getElementsByTagName('loc');

        foreach ($sitemaps as $sitemap) {
            $data[] = $sitemap->nodeValue;
        }

        return $data;
    }

    private function save_sitemap_status($link, $status) {
        $data = array(
            'link' => $link,
            'status' => $status
        );

        $this->db->where('link', $link);
        $query = $this->db->get('sitemap_links_status');

        if (!$query->row()) {
            $this->db->insert('sitemap_links_status', $data);
        }

        if ($query->row()) {

            $this->db->set('status', $status);
            $this->db->set('date', date('Y-m-d H:i:s'));
            $this->db->where('link', $link);
            $this->db->update('sitemap_links_status');
        }
    }

    private function init_curl($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    function cron_sitemap_404_checker() {
        $this->db->order_by("date", "asc");
        $query = $this->db->get('sitemap_links_status');
        $sitemap = $query->row();

        $html_content = $this->init_curl($sitemap->link);

        if (!$html_content) {
            $this->save_sitemap_status($sitemap->link, 404);
        }

        if ($html_content) {
            $this->save_sitemap_status($sitemap->link, 200);
        }

        echo $sitemap->link . " cron successfully";
    }

    function ajax_get_meta_by_post_id() {
        $doc = new DOMDocument();
        if (!isset($_POST['post_id'])) {
            return false;
        }

        $post_id = $_POST['post_id'];
        $permalink = get_permalink($post_id);

        $html = $this->init_curl($permalink);
        @$doc->loadHTML($html);

        $title = $doc->getElementsByTagName('title')[0];
        $meta_title = $title->nodeValue;
        $meta_description = '';

        $metas = $doc->getElementsByTagName('meta');
        foreach ($metas as $meta) {
            if ($meta->getAttribute('name') == 'description') {
                $meta_description = $meta->getAttribute('content');
            }
        }

        $data = array(
            'post_id' => $post_id,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description
        );

        header('Content-Type: Application/json');
        echo json_encode($data);
    }

    function save_post_metas() {

        $this->db->set('title', $_POST['meta_title']);
        $this->db->set('description', $_POST['meta_description']);
        $this->db->where('post_id', $_POST['post_id']);
        $this->db->update('wp_aioseo_posts');

        update_post_meta($_POST['post_id'], '_aioseo_title', $_POST['meta_title']);
        update_post_meta($_POST['post_id'], '_aioseo_description', $_POST['meta_description']);

        header('Content-Type: Application/json');
        echo json_encode(array('text' => 'success'));
    }

    function save_metas_by_post_type() {

        $posts = get_posts(array(
            'numberposts' => -1,
            'post_type' => $_POST['post_type']
        ));

        foreach ($posts as $post) {
            $this->db->set('title', $_POST['meta_title']);
            $this->db->set('description', $_POST['meta_description']);
            $this->db->where('post_id', $post->ID);
            $this->db->update('wp_aioseo_posts');

            update_post_meta($post->ID, '_aioseo_title', $_POST['meta_title']);
            update_post_meta($post->ID, '_aioseo_description', $_POST['meta_description']);
        }

        header('Content-Type: Application/json');
        echo json_encode(array('text' => 'success'));
    }

    function save_location_metas_via_service() {
        $service_id = $_POST['service'];

        $locations = get_posts(
            array(
                'numberposts' => -1,
                'post_type' => 'location'
            )
        );

        $service_location_ids = array();

        foreach ($locations as $location) {
            $main_service = get_field('main_service', $location->ID)['service'][0];
            if ($main_service->ID == $service_id && !in_array($location->ID, $service_location_ids)) {
                $service_location_ids[] = $location->ID;
            }
        }

        if ($_POST['update_all']) {
            foreach ($service_location_ids as $post_id) {
                $this->db->set('title', $_POST['meta_title']);
                $this->db->set('description', $_POST['meta_description']);
                $this->db->where('post_id', $post_id);
                $this->db->update('wp_aioseo_posts');

                update_post_meta($post_id, '_aioseo_title', $_POST['meta_title']);
                update_post_meta($post_id, '_aioseo_description', $_POST['meta_description']);
            }
        }

        if (!$_POST['update_all']) {
            foreach ($service_location_ids as $post_id) {
                $doc = new DOMDocument();
                $html = $this->init_curl(get_permalink($post_id));
                @$doc->loadHTML($html);

                $meta_title = '';
                $meta_description = '';

                $title = $doc->getElementsByTagName('title')[0];
                $meta_title = $title->nodeValue;

                $metas = $doc->getElementsByTagName('meta');
                foreach ($metas as $meta) {
                    if ($meta->getAttribute('name') == 'description') {
                        $meta_description = $meta->getAttribute('content');
                    }
                }

                if (!$meta_title) {
                    $this->db->set('title', $_POST['meta_title']);
                    $this->db->where('post_id', $post_id);
                    $this->db->update('wp_aioseo_posts');
                    update_post_meta($post_id, '_aioseo_title', $_POST['meta_title']);
                }

                if (!$meta_description) {
                    $this->db->set('description', $_POST['meta_description']);
                    $this->db->where('post_id', $post_id);
                    $this->db->update('wp_aioseo_posts');
                    update_post_meta($post_id, '_aioseo_description', $_POST['meta_description']);
                }
            }
        }

        die();
        header('Content-Type: Application/json');
        echo json_encode(array('text' => 'success'));
    }
}
