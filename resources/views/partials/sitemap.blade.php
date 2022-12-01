@php
// $cookie_name = '_sitemap';
// $cookie_value = 'generated';
// setcookie($cookie_name, $cookie_value, time() + 86400 * 30, '/');

$posts = get_posts([
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => 'publish',
]);

$services = get_posts([
    'numberposts' => -1,
    'post_type' => 'service',
    'post_status' => 'publish',
]);

$subservices = get_posts([
    'numberposts' => -1,
    'post_type' => 'subservice',
    'post_status' => 'publish',
]);

$locations = get_posts([
    'numberposts' => -1,
    'post_type' => 'location',
    'post_status' => 'publish',
]);

@endphp


<div class="container-fluid mb-5">

    <h1 class="text-center mb-5">Sitemap</h1>

    <div class="row">

        <div class="col-md-3">
            <h2>Blog Pages</h2>
            <ul class="px-2">
                @foreach ($posts as $post)
                    <li>
                        <a href="{{ get_permalink($post->ID) }}">{{ $post->post_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-3">
            <h2>Service Pages</h2>
            <ul class="px-2">
                @foreach ($services as $service)
                    <li>
                        <a href="{{ get_permalink($service->ID) }}">{{ $service->post_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-3">
            <h2>Sub Services</h2>
            <ul class="px-2">
                @foreach ($subservices as $subservice)
                    <li>
                        <a href="{{ get_permalink($subservice->ID) }}">{{ $subservice->post_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-3">
            <h2>Location Pages</h2>
            <ul class="px-2">
                @foreach ($locations as $location)
                    <li>
                        <a href="{{ get_permalink($location->ID) }}">{{ $location->post_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

</div>
