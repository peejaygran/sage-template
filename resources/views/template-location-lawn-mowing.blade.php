


@php
$state = get_field('location_state');
$locations = get_field('location');
$banner = get_field('location_banner');
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
            'custom_post_id' => $GLOBALS['cgv']['lawn-mowing'],
        ])
    </section>


    <div id="about-services-we-offer" class="container about-services-we-offer px-5 mb-140 col-lg-7">
        {!! apply_filters('the_content', get_post_meta(get_the_ID(), 'offered_services', true)) !!}
    </div>


    <div class="container four-blocks pt-1 mb-140">
        <h2 class="text-center mb-4">What is lawn mowing process</h2>
        @include('partials.four-blocks')
    </div>


    <div class="container bookings mb-140">
        <h3 class="text-center mb-4">Latest Lawn Mowing Bookings</h3>
        @include('partials.bookings', ['location' => $locations['location']])
    </div>


    @include('partials/optional-extras', [
        'custom_post_id' => $GLOBALS['cgv']['lawn-mowing'],
    ])


    <div class="container mb-140">
        @include('partials/main-services/other-cleaning-services', [
            'custom_post_id' => $GLOBALS['cgv']['lawn-mowing'],
        ])
    </div>


    @include('partials.why-book')


    <div class="container mb-140 pt-5">
        @include('partials.homepage.customer-reviews', [
            'post_id' => $GLOBALS['cgv']['lawn-mowing'],
        ])
    </div>


    <div class="container mb-140 pt-5">
        @include('partials/location-coverage-area')
    </div>


    @include('partials/main-services.FAQ-block')


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
