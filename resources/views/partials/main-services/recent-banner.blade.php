@php
$leadformheader = get_field('lead_form_header');
$lead_form_description = get_field ('lead_form_description');
$leadform = get_field('lead_form_shortcode');

if (!isset($services_banner)) {
    $services_banner = get_field('services_banner');
}

$banner_header = $services_banner['banner_header'];
$banner_subheader = $services_banner['banner_subheader'];
$banner_list = $services_banner['banner_list_bulltet'];
$banner_image = $services_banner['banner_image'];

$quotexs_url = '#';
if ($services_banner['get_a_quote_url']['url']) {
    $quote_url = $services_banner['get_a_quote_url']['url'];
}

@endphp


<div style="background-color: #ffeecf">

<div class="container main-services-banner">
    <div class="p-4 p-md-5">
        <div class="row">

            @include('partials.breadcrumbs')

            <div class="col-lg-6 pr-lg-5 col-md-6 d-lg-block">
                <h1>{{ $banner_header }}</h1>
                <h2 class="my-4 h4 text-center text-sm-left">{{ $banner_subheader }}</h2>

                <div class="d-sm-none">
                    {{-- @include('partials.cta.search-button', ['size' => '2_column']) --}}
                    <!-- <div class="w-100" style="height: 200px;border-radius: 10px;margin-top: 20px;">
                        <img loading="lazy" class="img-cover" src="{{ $banner_image[0]['image'] }}">

                    </div> -->
                </div>

                <div class="row mt-3">


                    <ul style="list-style-type:none;margin-left: 0px;padding-left: 18px; margin-bottom:0;">




                        @if ($banner_list)

                            @foreach ($banner_list as $item)
                                <li>
                                    <p>
                                        <i class="fas fa-check-circle"></i>
                                        {{ $item['list'] }}
                                    </p>
                                </li>
                            @endforeach


                        @endif

                    </ul>

                </div>

                <div class="p-0">
                    <a href="https://www.trustpilot.com/review/sidepost.com.au"
                        class="d-flex align-items-center mx-3 mb-md-4"><span class="mr-2">Excellent</span>
                        @include('partials.svgs.trustpilot-svg-stars', ['width' => 100])
                    </a>
                </div>

                @include('partials.cta.search-button', ['size' => '2_column'])

            </div>

            <div class="featured col-md-6 d-lg-block">

            <!-- {{-- @php
            echo '<pre>';
            print_r($banner['images']);
            echo '</pre>';
            @endphp --}}
            @if (count($banner['images']) >= 3)
                @include('locations.banner-3-images', ['images' => $banner['images']])
            @elseif(count($banner['images']) == 2)
                @include('locations.banner-2-images', ['images' => $banner['images']])
            @elseif(count($banner['images']) == 1)
                @include('locations.banner-image', ['images' => $banner['images']])
            @endif -->
            <div class="col-12 col-lg-8">
                <div class="lead-form shadow">
                    <div class="lead-form-title-wrapper">
                        <h2 class="lead-form-title">{{ $leadformheader }}</h2>
                        <p class="lead-form-subtitle">{{$lead_form_description}}</p>
                        
                    </div>
                    
                    <?php the_field('lead_form_shortcode'); ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

 </div>
