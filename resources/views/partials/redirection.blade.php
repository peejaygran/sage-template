@php

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$permalink = $actual_link;

if (strpos($permalink, '.png') !== true && strpos($permalink, '.jpg') !== true && strpos($permalink, '.jpeg') !== true) {
    //if http with www
    if (strpos($permalink, 'http://www.') !== false) {
        $permalink = str_replace('http://www.', 'https://', $permalink);
    }

    //if https with www
    if (strpos($permalink, 'https://www.') !== false) {
        $permalink = str_replace('https://www.', 'https://', $permalink);
    }

    //if http only
    if (strpos($permalink, 'http://sidepost') !== false) {
        $permalink = str_replace('http://sidepost', 'https://sidepost', $permalink);
    }

    // echo '<pre class="xxxx" style="display:none">';
    // print_r(trim($permalink, '/') . '/');
    // echo '</pre>';
    // die();
    if ($actual_link != $permalink) {
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . trim($permalink, '/') . '/');
        die();
    }
}
@endphp
