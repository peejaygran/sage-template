<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null) {
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null) {
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = []) {
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = []) {
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset) {
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates) {
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates) {
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar() {
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

if (is_user_logged_in() && !isset($_COOKIE['_sitemap']) && !isset($_GET['_sitemap'])) {
    header('Location: ' . home_url('generate-sitemap?_sitemap=true'));
    die;
}

add_shortcode('show-partials', function ($attr) {

    if (!isset($attr['module'])) {
        return false;
    }

    return \App\template('partials.' . $attr['module'], ["params" => $attr]);
});

add_shortcode('view', function ($attr) {

    if (!isset($attr['module'])) {
        return false;
    }

    return \App\template($attr['module'], ["params" => $attr]);
});


add_shortcode('dashboard-content', function ($attr) {

    if (!isset($attr['module'])) {
        return false;
    }

    return \App\template('dashboard.content.' . $attr['module'], ["params" => $attr]);
});

add_shortcode('css', function ($attr) {


    if (!isset($attr['file'])) {
        return false;
    }

    if (isset($attr['file'])) {
        return '<link rel="stylesheet" href="' . site_url() . '/assets/dist/css/pages/' . $attr['file'] . '.css?v=' . time() . '" type="text/css" media="all">';
    }
});

// if (!function_exists('post_exists')) {
//     require_once(ABSPATH . 'wp-admin/includes/post.php');
// }
// $categories = get_categories();
// $pages = get_posts(array(
//     'numberposts' => -1,
//     'post_type' => 'page',
//     'post_status' => 'publish'
// ));
// foreach ($categories as $category) {
//     $post_title = "Category: " . $category->name;
//     if (!post_exists($post_title)) {
//         $new_page = array(
//             'comment_status' => 'close',
//             'ping_status' => 'close',
//             'post_author' => 6,
//             'post_title' => $post_title,
//             'post_name' => "advice/" . $category->slug,
//             'post_status' => 'publish',
//             'post_content' => '',
//             'post_type' => 'page',
//             'post_category' => $category->cat_ID,
//             'page_template' => 'views/template-category.blade.php'
//         );
//         // $post_id = wp_insert_post($new_page);
//     }
//     // die();
// }