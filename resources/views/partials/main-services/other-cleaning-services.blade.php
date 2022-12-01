@php

$_services = get_field('services_we_offer');
$header = '';
$subheader = '';
$services = [];

$header = isset($_services['header']) ? $_services['header'] : $header;
$subheader = isset($_services['subheader']) ? $_services['subheader'] : $subheader;
$services = isset($_services['services']) ? $_services['services'] : $services;

if (isset($custom_post_id)) {
    $main_services = get_field('services_we_offer', $custom_post_id);
    $header = isset($main_services['header']) ? $main_services['header'] : '';
    $subheader = isset($main_services['subheader']) ? $main_services['subheader'] : '';
    $services = isset($main_services['services']) ? $main_services['services'] : [];
}

$sub_services = get_posts([
    'numberposts' => -1,
    'post_type' => 'subservice',
    'post_status' => 'publish',
]);
$main_services = get_posts([
    'numberposts' => -1,
    'post_type' => 'service',
    'post_status' => 'publish',
]);

$sub_services_per_main_services = [];

foreach ($main_services as $main_service) {
    if (!isset($sub_services_per_main_services[$main_service->ID])) {
        $sub_services_per_main_services[$main_service->ID]['service_name'] = $main_service->post_title;
    }
}

foreach ($sub_services as $sub_service) {
    $main_services = get_field('main_service', $sub_service->ID);

    foreach ($main_services as $main_service) {
        $sub_services_per_main_services[$main_service->ID]['sub_service'][] = $sub_service;
    }
}

$main_subservices = false;
if (isset($sub_services_per_main_services[get_the_ID()]['sub_service'])) {
    $main_subservices = $sub_services_per_main_services[get_the_ID()]['sub_service'];
}
if (isset($custom_post_id)) {
    if (isset($sub_services_per_main_services[$custom_post_id]['sub_service'])) {
        $main_subservices = $sub_services_per_main_services[$custom_post_id]['sub_service'];
    }
}
@endphp

@if ($main_subservices || $services)

    @if (isset($custom_post_id))
        @include('partials/acf-source')
    @endif

    <h2 class="text-center">{{ $header }}</h2>
    <p class="px-5 text-center">{{ $subheader }}
    </p>

    <div class="text-center other-cleaning-services row justify-content-center py-4">

        @if ($main_subservices)
            @foreach ($main_subservices as $main_subservice)
                @php
                    
                    $imageUrl = wp_get_attachment_url(2430);
                    if (isset(get_field('banner', $main_subservice->ID)['images'][0]['image'])) {
                        $imageUrl = get_field('banner', $main_subservice->ID)['images'][0]['image'];
                    }
                    if (has_post_thumbnail($main_subservice->ID)) {
                        $imageUrl = wp_get_attachment_url(get_post_thumbnail_id($main_subservice->ID), '');
                    }
                @endphp
                <div class="col-sm-6 col-lg-4 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ $imageUrl }}" loading="lazy" class="w-100 mb-2" style="min-height: 200px;">
                            {{-- <p><a href="{{ $service_link }}">{{ $service['service_name'] }}</a></p> --}}
                            <p class="mb-1">

                                {{-- {{ get_permalink($main_subservice->ID) }} --}}
                                <a class="font-weight-bold h4" href="{{ get_permalink($main_subservice->ID) }}">
                                    {{ get_field('sub_service_name', $main_subservice->ID) }}
                                </a>
                            </p>

                            @if (get_the_excerpt($main_subservice->ID))
                                <p style="font-size:16px;">{!! get_the_excerpt($main_subservice->ID) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @elseif($services)
            @foreach ($services as $service)
                <div class="col-sm-6 col-lg-4 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <img src="{{ $service['image'] }}" loading="lazy" class="w-100 mb-2"
                                style="min-height: 200px;">
                            {{-- <p><a href="{{ $service_link }}">{{ $service['service_name'] }}</a></p> --}}
                            <p><a class="font-weight-bold h4"
                                    href="{{ $service['service_link'] }}">{{ $service['service_name'] }}</a></p>
                            {{-- <img src="{{ $service['image'] }}" loading="lazy" class="w-100 h-50"> --}}
                            <p style="font-size:16px;">{{ $service['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endif
