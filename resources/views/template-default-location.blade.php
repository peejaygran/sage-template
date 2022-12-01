<!--
    Template Name: Location ( Default )
    Template Post Type: location
-->
<link rel="stylesheet" href="/assets/dist/css/pages/locations.css?v={{ time() }}">
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}">
<link rel="stylesheet" href="/assets/dist/css/pages/home.css?v={{ time() }}">
<link rel="stylesheet" href="/assets/dist/css/pages/main.css?v={{ time() }}">
<link rel="stylesheet" href="/assets/dist/css/pages/service.css?v={{ time() }}">


@php
// wp_enqueue_style('locations.css', '/assets/dist/css/pages/locations.css?v=' . time(), false, null);
// wp_enqueue_style('cta.css', '/assets/dist/css/pages/cta.css?v=' . time(), false, null);
// wp_enqueue_style('home.css', '/assets/dist/css/pages/home.css?v=' . time(), false, null);
// wp_enqueue_style('service.css', '/assets/dist/css/pages/service.css?v=' . time(), false, null);
@endphp

@php
$service = get_field('main_service')['service'];
$locations = get_field('location');

if (isset($service[0]->ID)) {
    $custom_post_id = $service[0]->ID;
}

$quote_url = '#';
if (isset($custom_post_id)) {
    $services_banner = get_field('services_banner', $custom_post_id);

    if (isset($services_banner['get_a_quote_url'])) {
        $quote_url = $services_banner['get_a_quote_url']['url'];
    }
}

@endphp

@extends('layouts.app')

@section('breadcrumbs-schema')
    @include('partials.schemas.locations')
@endsection

@section('assets')
    {{-- external assets here --}}
@endsection

@section('content')
    @while (have_posts())
        @php the_post() @endphp

        <div class="acf-parent-source"></div>
        @include('locations.banner')

        @include('partials.featured-logo')

        @include('partials.strip-menu')

        {{-- <input id="service_page_id" type="hidden" value="{{ $service[0]->ID }}"> --}}

        <section class="three-steps container mb-140 pt-5">
            @include('partials/steps', ['custom_post_id' => $service[0]->ID])
        </section>

        <div id="about-services-we-offer" class="container about-services-we-offer px-4 px-md-5 mb-140 col-lg-7">
            @if (get_field('about_service'))
                {!! get_field('about_service') !!}
            @elseif(get_field('about_service', $service[0]->ID))
                @include('partials/acf-source', ['custom_post_id' => $service[0]->ID])
                {!! get_field('about_service', $service[0]->ID) !!}
            @endif
        </div>

        <section id="included-cleaning-service" class="included-services container px-sm-5 mb-140">
            @include('partials.included-services')
        </section>

        @php
            $process = get_field('step_process');
        @endphp
        @if ($process['process'])
            <div class="container four-blocks pt-1 mb-140">
                @if ($process['header'])
                    <h2 class="text-center mb-4">{{ $process['header'] }}</h2>
                @else
                    <h2 class="text-center mb-4">What is {{ $service[0]->post_title }} process</h2>
                @endif
                @include('partials.four-blocks', ['step_process' => $process['process']])
            </div>
        @endif


        @include('partials.locations.2-column-block')

        <div class="container bookings mb-140">
            <h3 class="text-center mb-4">Latest {{ $service[0]->post_title }} bookings from our clients</h3>
            @include('partials.bookings', ['location' => $locations['location']])
        </div>


        @php
            $excluded_services = ['air conditioning', 'building and pest inspections'];
        @endphp

        @if (!in_array(strtolower($service[0]->post_title), $excluded_services))
            @include('partials/optional-extras', [
                'custom_post_id' => $service[0]->ID,
            ])
        @endif



        <div class="container mb-140">
            @include('partials/main-services/other-cleaning-services', [
                'custom_post_id' => $service[0]->ID,
            ])
        </div>

        @include('partials.why-book')

        @php
            $reviews = get_field('customer_reviews');
        @endphp

        @include('partials.homepage.customer-reviews')

        <div class="container location-coverage mb-140 pt-5">
            {{-- @include('partials/location-coverage-area') --}}
            @include('partials/location-coverage-area-with-map')
        </div>

        @include('partials/main-services.FAQ-block', [
            'custom_post_id' => $service[0]->ID,
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
    @endwhile
@endsection

