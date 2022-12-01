

@php
$banner = get_field('location_banner');
$locations = get_field('location');
$state = $locations['state'];
@endphp

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/assets/dist/css/pages/locations.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/home.css?v={{ time() }}">
    <link rel="stylesheet" href="/assets/dist/css/pages/main.css?v={{ time() }}">

    @include('partials.location-cleaning-banner')

    @include('partials.featured-logo')

    @include('partials.strip-menu')

    <section class="three-steps container mb-140">
        @include('partials/steps', ['custom_post_id' => $GLOBALS['cgv']['house-cleaning']])
    </section>


    <div id="about-services-we-offer" class="container about-services-we-offer px-4 px-md-5 mb-140 col-lg-7">
        {!! apply_filters('the_content', get_post_meta(get_the_ID(), 'offered_services', true)) !!}
    </div>


    <section id="included-cleaning-service" class="included-services container px-sm-5 mb-140">
        @include('partials.included-services', [
            'custom_post_id' => $GLOBALS['cgv']['house-cleaning'],
        ])
    </section>

    @include('partials.why-book')

    <div class="container bookings mb-140">
        <h3 class="text-center mb-4">Latest housing cleaning bookings from our clients</h3>
        @include('partials.bookings', ['location' => $locations['location']])
    </div>



    @include('partials/optional-extras', [
        'custom_post_id' => $GLOBALS['cgv']['house-cleaning'],
    ])


    <div class="container mb-140">
        @include('partials/main-services/other-cleaning-services', [
            'custom_post_id' => $GLOBALS['cgv']['house-cleaning'],
        ])
    </div>


    <div class="container mb-140 pt-5">
        @include('partials.homepage.customer-reviews', [
            'post_id' => $GLOBALS['cgv']['house-cleaning'],
        ])
    </div>


    <div class="container mb-140 pt-5">
        @include('partials/location-coverage-area')
    </div>


    @include('partials/main-services.FAQ-block', [
        'custom_post_id' => $GLOBALS['cgv']['house-cleaning'],
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
    {{-- @include('partials/cta/search-full-width') --}}
@endsection
