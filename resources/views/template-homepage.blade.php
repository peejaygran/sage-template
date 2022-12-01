{{-- Template Name: Homepage Template --}}

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp

        @include('partials.homepage.banner')

        @include('partials.homepage.3-block-scope')

        <div class="container">
            <h2 class="text-center">Select from one of our fantastic home services</h2>
            {{-- <p class="text-center mb-5 px-2">
                Whatever your house needs, we've got you covered. We've got cleaners and trades people for every job.
            </p> --}}
            @include('partials.homepage.home-services', ['custom_post_id' => 1039])
        </div>

        {{-- @include('partials.homepage.areas') --}}

        @php
            $service_areas_list = get_field('service_areas_list');
        @endphp

        @foreach ($service_areas_list as $area)
            @php $subheader = $area['sub_header']; @endphp
            <div class="container mb-5 p-md-4">
                <h2 class="text-center">{{ $area['service'] }} Service Areas</h2>
                @if ($subheader)
                    <p class="text-center">{{ $subheader }}</p>
                @endif
                @include('partials.service_areas_list', [
                'service' => $area['service'],
                'service_link' => $area['service_link'],
                'locations' => $area['top_locations'],
                ])
            </div>
        @endforeach

        <div class="mb-140 w-100 py-4 px-3 p-md-5" style="background-color: #fffcf7;">
                @include('partials.homepage.about')
        </div>

        <div class="container mb-4 mb-140 px-4">
            @include('partials.steps', ['custom_post_id' => $GLOBALS['cgv']['house-cleaning']])
        </div>

        {{-- @include('partials.homepage.how-it-works') --}}

        @include('partials.homepage.why-choose')

        <div class="mb-214">
            @include('partials.homepage.customer-reviews')
        </div>


        <div class="mb-140 w-100 py-4 px-3 p-md-5 " style="background-color: #fffcf7;">
            @include('partials.cta.join-us')
        </div>

        {{-- @include('partials.homepage.table-compare') --}}

        @if (isset($_GET['debug']))
            <div class="mb-140">
                @include('partials.trustpilot-reviews')
            </div>
        @endif

        @include('partials.content-page')

        @include('partials.homepage.expert-guides')

        @include('partials.cta.search-block-button')
    @endwhile
@endsection
