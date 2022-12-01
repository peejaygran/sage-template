<!--
Template Name: Sitemap Template
Post Type: Page
-->
@php

// main sitemap
$sitemap_links = get_field('sitemap_links');
$xml_string = '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
foreach ($sitemap_links as $link) {
    $xml_string .= '<sitemap><loc>' . $link['sitemap_url'] . '</loc><lastmod>' . date('Y-m-d\TH:i:s\.000\Z', strtotime(get_post(get_the_ID())->post_modified_gmt)) . '</lastmod></sitemap>';
}
$xml_string .= '</sitemapindex>';
($main_sitemap = fopen('sitemap.xml', 'w', $_SERVER['CONTEXT_DOCUMENT_ROOT'])) or die('Unable to open file!');
fwrite($main_sitemap, $xml_string);
fclose($main_sitemap);

// sitemap contents
$sitemap_contents = get_field('sitemap_contents');
foreach ($sitemap_contents as $content) {
    $xml_string = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

    $posts = get_posts(['numberposts' => -1, 'post_type' => $content['post_type']]);
    foreach ($posts as $post) {
        $xml_string .= '<url><loc>' . get_permalink($post->ID) . '</loc><lastmod>' . date('Y-m-d\TH:i:s\.000\Z', strtotime(get_post(get_the_ID())->post_modified_gmt)) . '</lastmod></url>';
    }
    $xml_string .= '</urlset>';

    ($sitemap_files = fopen('sitemaps/' . $content['xml_filename'], 'w', $_SERVER['CONTEXT_DOCUMENT_ROOT'])) or die('Unable to open file!');
    fwrite($sitemap_files, $xml_string);
    fclose($sitemap_files);
}

$cookie_name = '_sitemap';
$cookie_value = 'generated';
setcookie($cookie_name, $cookie_value, time() + 86400 * 30, '/');
if (isset($_GET['_sitemap'])) {
    header('Location: ' . home_url());
    die();
}
@endphp

@extends('layouts.app')

@section('content')
    <h1 class="text-center m-5">
        Click the Edit Page above to update, then view or load this page again to refresh the content of
        <a href="{{ home_url('sitemap.xml') }}">Sitemap.xml</a>
    </h1>


    <script>
        let referrer = document.referrer;
        if (referrer.includes('action=edit')) {
            setTimeout(() => {
                window.location.href = "{{ home_url('sitemap.xml') }}";
            }, 5000);
        }
    </script>
@endsection
