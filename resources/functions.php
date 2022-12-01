<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use App\Controllers\_Enquiries;
use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__) . '/config/assets.php',
            'theme' => require dirname(__DIR__) . '/config/theme.php',
            'view' => require dirname(__DIR__) . '/config/view.php',
        ]);
    }, true);


function is_current_user($role) {

    $user = wp_get_current_user();

    if (in_array($role, $user->roles)) {
        return true;
    }

    return false;
}


function get_posts_by_categories($category_array = array()) {

    $args = [
        'post_type' => 'post', 'posts_per_page' => -1
    ];

    if (!empty($category_array)) {
        $args['category__in'] = $category_array;
    }

    $query = new WP_Query($args);
    return $query->posts;
    // return $query;
}






add_filter('post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5);

function remove_thumbnail_width_height($html, $post_id, $post_thumbnail_id, $size, $attr) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function generate_stars($stars = false) {
    if ($stars) {
        $round_off = floor($stars);
        $string = "";
        for ($star = 0; $star < 5; $star++) {

            if ($star < $round_off) {
                $string .= '<i class="fas fa-star fill-star"></i>';
            } else {
                $string .= '<i class="fas fa-star mute-star"></i>';
            }
        }
        return $string;
    }
    return false;
}



// Our custom post type function
function create_posttype() {

    register_post_type(
        'location',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Locations'),
                'singular_name' => __('Location')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'locations'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'capability_type' => 'post',
            'taxonomies' => array('category')
        )
    );

    register_post_type(
        'service',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

    register_post_type(
        'subservice',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Sub Services'),
                'singular_name' => __('Sub Service')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'subservice'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'taxonomies' => array('category')
        )
    );

    register_post_type(
        'authors',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Authors'),
                'singular_name' => __('Authors')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'authors'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        )
    );


    foreach (get_users() as $user) {

        if (!function_exists('post_exists')) {
            require_once(ABSPATH . 'wp-admin/includes/post.php');
        }

        if (!post_exists($user->user_nicename, '', '', 'authors', 'publish')) {

            $post = array(
                'post_title'    => $user->user_nicename,
                'post_content'  => '',
                'post_status'   => 'publish',
                'post_author'   => 6,
                'post_type'     => 'authors',
                'page_template' => 'views/template-authors.blade.php'
            );
            $post_id = wp_insert_post($post);

            update_field('author_id', $user->ID, $post_id);
        }
    }
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype');








function display_location_column($column, $post_id) {
    if ($column == 'Location') {
        echo "<span>" .  get_post_meta($post_id, "location_location", true) . "</span>";
    } elseif ($column == 'Service') {
        echo "<span>" .  get_post_meta($post_id, "service_name", true) . "</span>";
    } elseif ($column == 'Template') {
        echo "<span>" .  str_replace("views/", "", get_post_meta($post_id, "_wp_page_template", true))  . "</span>";
    } elseif ($column == 'Service Page') {

        $service = get_field("main_service", $post_id);

        if (isset($service["service"])) {

            foreach ($service["service"] as $_service) {
                $service_name = get_post_meta($_service->ID, "service_name", true);
                if ($service_name) {
                    echo "<span>   <a href='" . get_permalink($_service->ID)  . "'> $service_name  </a> </span>";
                }
            }
        }



        // if(  isset( $service["service"][0] )   ){
        //     $service_name = get_post_meta(  $service["service"][0]->ID, "service_name",true );
        //     echo "<span>   <a href='" . get_permalink($service["service"][0]->ID)  . "'> $service_name  </a> </span>"; 
        // }else{
        //     echo "<span> </span>"; 
        // }


    }
}
add_action('manage_posts_custom_column', 'display_location_column', 10, 2);



add_filter('manage_posts_columns', 'my_columns');
function my_columns($columns) {
    $post_type = get_post_type();
    if ($post_type == 'location') {
        $columns['Location'] = 'Location';
        $columns['Service Page'] = 'Service Page';
    }

    if ($post_type == 'service') {
        $columns['Service'] = 'Service';
    }


    $columns['Template'] = 'Template';


    return $columns;
}



function clear_all_styles_scripts() {

    global $wp_scripts;
    $array = array();
    // Runs through the queue scripts
    foreach ($wp_scripts->queue as $handle) :
        $array[] = $handle;
    endforeach;

    wp_dequeue_script($array);

    global $wp_styles;
    $array = array();
    foreach ($wp_styles->queue as $handle) :
        $array[] = $handle;
    endforeach;
    wp_dequeue_style($array);
}



if (!function_exists('cache_parameters')) {

    function cache_parameters() {



        // if( strpos(   $_SERVER['REQUEST_URI'], '/services/car-wash') !== false   ){

        if ((!isset($_COOKIE['iwashere'])  && !is_user_logged_in())) {
            setcookie("iwashere", "yes", time() + 315360000);

            global $wp_scripts;
            $script_links = array();



            foreach ($wp_scripts->queue as $queue_script) {



                $script_links[] = $wp_scripts->registered[$queue_script]->src;
            }

            global $wp_styles;
            $style_links = array();
            foreach ($wp_styles->queue as $queue_style) {
                $style_links[] = $wp_styles->registered[$queue_style]->src;
            }

            $assets = ["scripts" => $script_links, "styles" => $style_links];

            //clear
            global $wp_scripts;
            $wp_scripts->queue = array();

            global $wp_styles;
            $wp_styles->queue = array();

            add_action('wp_footer', 'clear_all_styles_scripts');

?>



            <style>
                img[loading="lazy"],
                .temp_hidden {
                    display: none;
                }
            </style>

            <script type="text/javascript">
                // console.log(    history.length  );

                var assets = <?= json_encode($assets) ?>;
                var fully_loaded = false;



                function import_all() {
                    if (url_params.get('disable_imports') != null) {

                    } else if (!fully_loaded) {

                        // const hidden_items = document.querySelectorAll('.temp_hidden');
                        // hidden_items.forEach(hidden_item => {
                        //     hidden_item.classList.remove('temp_hidden');
                        // });


                        // const lazy_images = document.querySelectorAll('img[loading="lazy"]');
                        // lazy_images.forEach(lazy_image => {
                        //     lazy_image.style.display = "inherit";
                        // });



                        var g_script = document.getElementById('google-map-api.js');
                        if (typeof(g_script) == 'undefined' || g_script == null) {
                            var g_script = document.createElement("script");
                            g_script.id = "google-map-api.js";
                            g_script.defer = "defer";
                            g_script.async = "async";
                            g_script.type = "text/javascript";
                            g_script.src = "https://maps.googleapis.com/maps/api/js?v=3&amp;libraries=places,drawing,geometry&amp;&key=<?= $GLOBALS['cgv']['google-api-key'] ?>";
                            document.body.appendChild(g_script);

                        }




                        var jquery_script = document.getElementById('jquery_script.js');
                        if (typeof(jquery_script) == undefined || jquery_script == null) {

                            var jquery_script = document.createElement("script");
                            jquery_script.id = "jquery_script.js";
                            jquery_script.type = "text/javascript";
                            jquery_script.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js";
                            document.body.appendChild(jquery_script);
                        }


                        assets.styles.forEach(function(link, index) {

                            if (link) {
                                var dynamic_style = document.createElement("link");
                                dynamic_style.rel = "stylesheet";
                                dynamic_style.href = link;
                                document.body.appendChild(dynamic_style);
                            }

                        })


                        defer("jquery-google", function() {

                            assets.scripts.forEach(function(link, index) {
                                if (!link.includes("google") && !link.includes("jquery.min")) {


                                    var dynamic_scripts = document.createElement("script");
                                    dynamic_scripts.type = "text/javascript";
                                    dynamic_scripts.src = link;
                                    document.body.appendChild(dynamic_scripts);
                                }
                            })






                            const hidden_items = document.querySelectorAll('.temp_hidden');
                            hidden_items.forEach(hidden_item => {
                                hidden_item.classList.remove('temp_hidden');
                            });


                            const lazy_images = document.querySelectorAll('img[loading="lazy"]');
                            lazy_images.forEach(lazy_image => {
                                lazy_image.style.display = "inherit";
                            });

                            fully_loaded = true;

                            $(".inline-bootstrap").remove();













                        })


                    }
                }


                ['click', 'ontouchstart', 'scroll', 'mousemove', 'onkeydown', 'touchstart', 'touchmove', 'touchstart'].forEach(evt =>
                    document.addEventListener(evt, import_all, false)
                );

                if (history.length > 3) {


                    setTimeout(function() {
                        import_all();
                    }, 3000);



                }
            </script>


<?php
        }
    }
}

add_action('wp_print_styles', 'cache_parameters');



function robots_hook() {
    if ($_SERVER['HTTP_HOST'] == 'sidepost.com.au') {
        // force to remove noindex and nofollow
        update_option('blog_public', '1');
    } else {
        // force to add noindex and nofollow
        update_option('blog_public', '0');
    }
}
add_action('wp_head', 'robots_hook');





add_action('wpforms_process_complete_2140', 'do_post_journey', 10, 4); // House Painting
add_action('wpforms_process_complete_2076', 'do_post_journey', 10, 4); // House Cleaning
add_action('wpforms_process_complete_2435', 'do_post_journey', 10, 4); // Air Conditioning

function do_post_journey($fields, $entry, $form_data, $entry_id) {

    $_enquiries = new _Enquiries();


    // House Painting
    if ($entry['id'] == 2140) {
        $params = array(
            'id'    => $entry_id, 'service_type'   => $entry['fields'][7], 'postcode'       => $entry['fields'][2], 'name'           => $entry['fields'][1], 'email'          => $entry['fields'][6], 'phone'          => $entry['fields'][8], 'enquiry_date'   => date('Y-m-d H:i:s')
        );
    }


    // House Cleaning
    if ($entry['id'] == 2076) {

        $params = array(
            'id'    => $entry_id, 'service_type'   => "House Cleaning"
            // , 'service_type'   => $entry['fields'][1]
            , 'name'           => $entry['fields'][4], 'phone'          => $entry['fields'][5], 'email'          => $entry['fields'][8], 'postcode'       => $entry['fields'][9], 'enquiry_date'   => date('Y-m-d H:i:s')
        );
    }



    // Air Conditioning
    if ($entry['id'] == 2435) {

        $params = array(
            'id'    => $entry_id, 'service_type'   => "Air Conditioning", 'name'           => $entry['fields'][2], 'phone'          => $entry['fields'][3], 'email'          => $entry['fields'][4], 'postcode'       => $entry['fields'][7], 'service_date'   => date('Y-m-d', strtotime(str_replace("/", "-", $entry['fields'][5]))), 'enquiry_date'   => date('Y-m-d H:i:s')
        );
    }


    $have_duplicates = $_enquiries->check_duplicates_from_enquiries($params);
    if (!$have_duplicates) {
        $_enquiries->insert_to_enquiries($entry_id, $params);
    }
}



function filter_exerpt_read_more($excerpt, $post, $read_more = true) {

    if (!$excerpt && $post->post_type == 'subservice') {
        if (strpos('-', $post->post_title) !== true) {
            if ($post->post_title === 'Auto Draft') {
                return false;
            }


            $post_pitch = trim(explode('-', $post->post_title)[0]);
            if (isset(explode('-', $post->post_title)[1])) {
                $post_pitch = trim(explode('-', $post->post_title)[1]);
            }

            return $post_pitch;
        }
        die();
    }

    if ($post->post_type == 'subservice') {
        return $excerpt;
    }

    if (!$read_more) {
        return  substr($excerpt, 0, 200) . "...";
    }
    return  substr($excerpt, 0, 200) . '<a href="' . get_permalink($post->ID) . '">... Read More</a>';
}
add_filter('get_the_excerpt', 'filter_exerpt_read_more', 10, 2);



function modify_author_link($link) {
    return str_replace('index.php/author/', 'authors/', $link);
}
add_filter('author_link', 'modify_author_link', 10, 1);


//remove person schema
function aioseo_filter_schema_graphs($graphs) {
    $new_graphs = [];
    $removed = ["PersonAuthor", "WebPage", "WebSite", "Organization"];
    foreach ($graphs as $graph) {
        if (!in_array($graph, $removed)) {
            $new_graphs[] = $graph;
        }
    }
    return $new_graphs;
}
add_filter('aioseo_schema_graphs', 'aioseo_filter_schema_graphs');



function custom_menu_page() {
    add_menu_page(
        'SEO Monitor',
        'SEO Monitor',
        'manage_options',
        'seo-monitor',
        'seo_monitor_summary',
        'dashicons-analytics',
        90
    );
}
add_action('admin_menu', 'custom_menu_page');

function seo_monitor_summary() {
    echo App\template('partials.links-table');
}
