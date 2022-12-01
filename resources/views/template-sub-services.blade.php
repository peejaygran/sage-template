<!--
  Template Name: Sub Services Template
  Template Post Type: Sub Service
-->
@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp

        @include('partials.content-page')

        @php
            $banner = get_field('banner');
        @endphp

        <section class="location-banner container p-4 p-md-0 mt-md-5 ">
            <div class="row">
                @include('partials.breadcrumbs')

                <div class="col-lg-6 ">

                    <h1 class="h2">{{ $banner['header'] }}</h1>
                    <h4>{{ $banner['subheader'] }} </h4>

                    @if (count($banner['images']) >= 1)
                        <img src="{{ $banner['images'][0]['image'] }}" class="d-md-none w-100"
                            style="height: 350px; object-fit: cover; object-position: center;">
                    @endif

                    <div class="row mt-3">
                        <ul class="list-unstyled">
                            @foreach ($banner['checklist'] as $item)
                                <li>
                                    <p>
                                        <i class="fas fa-check-circle"></i>
                                        {{ $item['list'] }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @include('partials.cta.search-button', ['size' => '2_column'])

                </div>

                <div class="featured col-md-6 d-none d-lg-block pl-5">

                    @if (count($banner['images']) >= 3)
                        @include('locations.banner-3-images', ['images' => $banner['images']])
                    @elseif(count($banner['images']) == 2)
                        @include('locations.banner-2-images', ['images' => $banner['images']])
                    @elseif(count($banner['images']) == 1)
                        @include('locations.banner-image', ['images' => $banner['images']])
                    @endif

                </div>

            </div>
        </section>


        @include('partials.menu-block')

        <div class="container mb-140">
            @include('partials.steps')
        </div>

        @php
            $about_service = apply_filters('the_content', get_post_meta(get_the_ID(), 'about_service', true));
        @endphp

        @if ($about_service)
            <div class="container about-sub-service mb-140">
                <div class="row">
                    <div class="col-md-2 col-lg-3">
                    </div>
                    <div class="col-md-8 col-lg-6 px-4 p-lg-0">

                        {!! $about_service !!}

                    </div>
                    <div class="col-md-2 col-lg-3">
                    </div>
                </div>
            </div>
        @endif

        @php
            $why_book = get_field('why_book');
        @endphp

        @if ($why_book)
            <div class="container why-book py-5 mb-140">
                <div class="row">
                    <div class="col-md-2 col-lg-3">
                    </div>
                    <div class="col-md-8 col-lg-6 px-4 p-lg-0">
                        {!! $why_book !!}
                    </div>
                    <div class="col-md-2 col-lg-3">
                    </div>
                </div>
            </div>
        @endif


        @php
            $additional_service = apply_filters('the_content', get_post_meta(get_the_ID(), 'book_additional_services', true));
        @endphp

        @if ($additional_service)
            {{-- <h1>lKNLKASNDLK</h1> --}}

            <div class="container book-now py-5 mb-140">
                <div class="row">
                    <div class="col-md-2 col-lg-3">
                    </div>
                    <div class="col-md-8 col-lg-6 px-4 p-lg-0">
                        {!! $additional_service !!}
                    </div>
                    <div class="col-md-2 col-lg-3">
                    </div>
                </div>
            </div>
        @endif

        @php
            $two_column_block = get_field('2_column_block');
        @endphp

        @if ($two_column_block['header'] && $two_column_block['details'])
            <div class="container end-of-lease-service mb-140">
                <div class="row text-center pb-5">
                    <div class="col-2">
                    </div>


                    <div class="col-sm-8">
                        <h2>{{ $two_column_block['header'] }}</h2>
                        <p>{{ $two_column_block['subheader'] }}</p>
                    </div>

                    <div class="col-2">
                    </div>
                </div>

                <div class="row pt-4">

                    <div class="col-lg-6">
                        {!! $two_column_block['details'] !!}
                    </div>

                    @if ($two_column_block['images'])
                        {{-- <div class="col-lg-6 d-none d-lg-flex" style="position:relative; min-height: 600px"> --}}
                        <div class="col-lg-6 d-none d-lg-flex" style="position:relative">

                            <img src="{{ $two_column_block['images'][0]['image'] }}" alt="image" loading="lazy"
                                width="40%" loading="lazy"
                                style="position:absolute; top:40%; left:40%;border-radius: 12px; max-height: 150px">
                            <img src="{{ $two_column_block['images'][1]['image'] }}" alt="image" loading="lazy"
                                width="40%" loading="lazy"
                                style="position:absolute; bottom:50%; right:50%;border-radius: 12px; max-height: 150px">
                        </div>
                    @endif

                </div>
            </div>
        @endif

        <div class="container service-included">

            <section id="included-cleaning-service" class="included-services container px-sm-5 mb-140">
                @include('partials.included-services')
            </section>
        </div>
        <div class="container mb-140 whats-included">
            @php
                $included_services = get_field('whats_included');
            @endphp
            {!! apply_filters('the_content', get_post_meta(get_the_ID(), 'whats_included', true)) !!}
        </div>
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


        <div class="container mb-140 pt-5">

            @include('partials.homepage.customer-reviews')

        </div>


        @php
            $main_service = get_field('main_service')[0];
            
            // $_seo = new _Seo();
            // $posts = $_seo->get_all_location_pages([
            //     'include_locations' => true,
            //     'include_service_page' => true,
            // ]);
            
            // $services_locations = [];
            // foreach ($posts as $_post) {
            //     if (isset($_post->service_page->ID) == $main_service->ID) {
            //         $services_locations[] = $_post;
            //     }
            // }
            
            $locations = get_posts([
                'numberposts' => -1,
                'post_type' => 'location',
                'post_status' => 'publish',
            ]);
            
            $main_service = get_field('main_service')[0];
            
            // foreach ($main_services as $main_service) {
            foreach ($locations as $location) {
                $main_service_location = get_fields($location->ID)['main_service']['service'][0];
            
                if ($main_service_location) {
                    if ($main_service_location->ID == $main_service->ID) {
                        // $locations = get_field('location', $location->ID);
                        $services_locations[] = $location;
                    }
                }
                // }
            }
            // }
        @endphp

        <div class="au-areas container text-center py-5">
            <h2 class="mb-4">Areas we work in</h2>
            <div class="row">
                @foreach ($services_locations as $_page)
                    <a href="{{ get_permalink($_page->ID) }}" class="col-sm-6 col-md-4 mb-3">
                        {{ get_post_meta($_page->ID, 'location_location', true) }}
                    </a>
                @endforeach
            </div>
        </div>


        @php
            $service_name = get_field('main_service');
        @endphp

        @if (strtolower($service_name[0]->post_title) == 'house cleaning')
            @include('partials/optional-extras', ['custom_post_id' => $service_name[0]->ID])
        @endif


        <div class="pt-5">
            <h2 class="text-center py-3">Other Housekeeping Services</h2>
            @include('partials.homepage.home-services', ['custom_post_id' => 1039])
        </div>


        @php
            $faq = get_field('faq');
        @endphp

        @if (isset($faq) && $faq)
            @include('partials/main-services.FAQ-block')
        @endif


        @include('partials.cta.search-block-button')

        <div class="container find-cleaner py-4 text-center" style="background-color: #FFFCF7;">
            <p class="text-center pb-0">Reviews</p>

            <div class="container col-md-10 col-lg-6 my-4">
                <p class="small pt-2">
                    <strong>Excellent</strong>
                    <span class="star-block-review">
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star half-star"></i>
                    </span>
                    over <strong>120</strong> reviews on <i class="fas fa-star half-star" style="color: teal;"></i>
                    <strong>Trustpilot</strong>
                </p>
            </div>

        </div>
    @endwhile
@endsection
