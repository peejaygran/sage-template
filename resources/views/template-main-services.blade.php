<!--
    Template Name: Services Template
    Template Post Type: post, page, service
-->

@php
// wp_enqueue_style('main-services.css', '/assets/dist/css/pages/main-services.css?v=' . time(), false, null);
@endphp

<link rel="stylesheet" id="main-services" href="/assets/dist/css/pages/main-services.css?v=' {{ time() }}"
    type="text/css" media="all">

@php
$services_banner = get_field('services_banner');
$quotexs_url = '#';
if ($services_banner['get_a_quote_url']['url']) {
    $quote_url = $services_banner['get_a_quote_url']['url'];
}
@endphp

@extends('layouts.app')

@section('breadcrumbs-schema')
    @include('partials.schemas.services')
@endsection

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        <script>
            is_service_template = true;
        </script>

        @include('partials/main-services/banner')


        @include('partials/menu-block')


        <section class="container three-steps px-3 mb-140 pt-5">
            @include('partials/steps')
        </section>

        <section id="about-services-we-offer full-width" style="background-color:  #fffcf7;">
            <div class="container about-services-we-offer px-4 col-lg-7 mb-140 py-4">
                {!! get_field('about_service') !!}
            </div>
        </section>


        @php
            $process = get_field('step_process');
            // echo '<pre>';
            // print_r($services_banner);
            // echo '</pre>';
        @endphp

        @if ($process['process'])
            <div class="container four-blocks pt-1 mb-140">
                @if ($process['header'])
                    <h2 class="text-center mb-4">{{ $process['header'] }}</h2>
                    {{-- @else
                    <h2 class="text-center mb-4">What is {{ $service[0]->post_title }} process</h2> --}}
                @endif
                @include('partials.four-blocks', ['step_process' => $process['process']])
            </div>
        @endif


        <section id="included-cleaning-service" class="included-services container px-3 px-sm-5 mb-140">
            @include('partials/included-services')
        </section>

        @php
            $service_name = get_field('service_name');
        @endphp

        @if (strtolower($service_name) == 'house cleaning')
            @include('partials/optional-extras')
        @endif



        <section class="container mb-140 px-3">


            @include('partials/main-services/other-cleaning-services')

        </section>

        @include('partials/main-services.professional-cleaners')


        @include('partials/homepage.customer-reviews')

        @php $service_areas_list = get_field('service_areas_list'); @endphp

        @if ($service_areas_list)
            @foreach ($service_areas_list as $area)
                @if ($area['service'] && $area['top_locations'])
                    <div class="container mb-5 p-md-5" id="service-areas-block">
                        <h2 class="text-center">{{ $area['service'] }} Service Areas</h2>

                        @include('partials.service_areas_list', [
                            'service' => $area['service'],
                            'service_link' => $area['service_link'],
                            'locations' => $area['top_locations'],
                        ])

                    </div>
                @endif
            @endforeach
        @endif

        @include('partials.homepage.areas')


        <div id="other-home-services" class="pt-5 px-3">
            <h2 class="text-center pb-4">Other Home Services</h2>
            @include('partials.homepage.home-services', [
                'custom_post_id' => 1039,
                'hide' => true,
            ])
        </div>




        @include('partials/main-services.FAQ-block')

        @include('partials.cta.search-block-button')
    @endwhile
@endsection

<style>
    .breadcrumb {
        background: none !important;
        width: 100%;
    }

    .breadcrumb-item a {
        color: #183b56;
    }

    .main-services-banner {
        background-color: #ffeecf;
        color: #183b56;
    }

    .main-services-banner h1 {
        font-size: 40px;
        font-weight: 600;
    }

    @media screen and (max-width: 576px) {
        .main-services-banner h1 {
            font-size: 32px !important;
            text-align: center;
        }

        .main-services-banner .container {
            padding-top: 30px !important;
        }

        .main-services-banner .h4 {
            font-size: 20px !important;
            font-weight: bold !important;
        }
    }


    @media (max-width: 544px) {
        .breadcrumb a {
            font-size: calc(35% + 1vw + 1vh);
        }
    }
</style>
