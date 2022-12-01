


@php
$state = get_field('location_state');
$locations = get_field('location');
@endphp

@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/assets/dist/css/pages/locations.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/home.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/main.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/service.css?v={{ time() }}">


    @include('partials.location-pool-cleaning-banner')

    @include('partials.featured-logo')

    @include('partials.strip-menu')


    <section class="three-steps container mb-140">
        <p class="text-center mt-5 mb-4 h6">How it works</p>
        @include('partials.dynamic-how-it-works', [
            'custom_post_id' => $GLOBALS['cgv']['pool-cleaning'],
        ])
    </section>


    <div id="about-services-we-offer" class="container about-services-we-offer px-5 mb-140 col-lg-7">
        {!! apply_filters('the_content', get_post_meta(get_the_ID(), 'offered_services', true)) !!}
    </div>


    <section id="included-cleaning-service" class="included-services container px-sm-5 mb-140">
        <h2 class="text-center">What's included in a {{ $locations['location'] }} pool clean?</h2>
        @include('partials.included-services', [
            'custom_post_id' => $GLOBALS['cgv']['pool-cleaning'],
        ])
    </section>

    @php
    $two_column_block = get_field('2_column_block', $GLOBALS['cgv']['pool-cleaning']);
    $content_row = $two_column_block['content'];
    @endphp

    @if ($content_row)
        <div class="container p-5 mb-140" style="background-color: #fffcf7;">
            <div class="container">
                <h2 class="text-center pb-5">{{ $two_column_block['header'] }}</h2>

                @foreach ($content_row as $row)
                    <div class="row">
                        <div class="col-md-5">
                            <h3>{{ $row['title'] }}</h3>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <p>{{ $row['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    <div class="container bookings mb-140">
        <h3 class="text-center mb-4">Latest Pool Cleaning Bookings</h3>
        @include('partials.bookings', ['location' => $locations['location']])
    </div>


    @include('partials/optional-extras', [
        'custom_post_id' => $GLOBALS['cgv']['pool-cleaning'],
    ])


    <div class="container mb-140">
        @include('partials/main-services/other-cleaning-services', [
            'custom_post_id' => $GLOBALS['cgv']['pool-cleaning'],
        ])
    </div>



    @include('partials.why-book')


    <div class="container mb-140 pt-5">
        @include('partials.homepage.customer-reviews', [
            'post_id' => $GLOBALS['cgv']['pool-cleaning'],
        ])
    </div>


    @php
    $subheader = get_field('sub_header');
    $service_areas_list = get_field('service_areas_list');
    @endphp

    @if ($service_areas_list)
        @foreach ($service_areas_list as $area)
            <div class="container mb-5 p-md-5">
                <h2 class="text-center">{{ $area['service'] }} Service Areas</h2>
                <p>{{ $subheader }}</p>
                {{-- @include('partials.service_areas_list') --}}
                @include('partials.service_areas_list', [
                    'service' => $area['service'],
                    'locations' => $area['top_locations'],
                ])
            </div>
        @endforeach
    @endif

    <div class="container mb-140 pt-5">
        @include('partials/location-coverage-area')
    </div>


    @include('partials.main-services.FAQ-block', [
        'custom_post_id' => 1570,
        'hide' => true,
    ])


    <div id="other-home-services" class="pt-5">
        <h2 class="text-center pb-4">Other Home Services</h2>
        @include('partials.homepage.home-services', [
            'custom_post_id' => 1039,
            'hide' => true,
        ])
    </div>


    @include('partials.cta.other-articles')


    @include('partials/cta/search-block-button')
@endsection
