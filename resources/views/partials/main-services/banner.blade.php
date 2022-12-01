@php

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

<div class="container-fluid main-services-banner">
    <div class="p-4 p-md-5">
        <div class="row">

            @include('partials.breadcrumbs')

            <div class="col-lg-6 pr-lg-5">
                <h1>{{ $banner_header }}</h1>
                <h2 class="my-4 h4 text-center text-sm-left">{{ $banner_subheader }}</h2>

                <div class="d-sm-none">
                    {{-- @include('partials.cta.search-button', ['size' => '2_column']) --}}
                    <div class="w-100" style="height: 200px;border-radius: 10px;margin-top: 20px;">
                        <img loading="lazy" class="img-cover" src="{{ $banner_image[0]['image'] }}">

                    </div>
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

            {{-- <div class="col-lg-6 d-none d-lg-flex p-1 pannel-image"> --}}
            <div class="featured col-md-6 d-none d-lg-block pl-5">
                @if (count($banner_image) >= 3)
                    @include('locations.banner-3-images', ['images' => $banner_image])
                @elseif(count($banner_image) == 2)
                    @include('locations.banner-2-images', ['images' => $banner_image])
                @elseif(count($banner_image) == 1)
                    @include('locations.banner-image', ['images' => $banner_image])
                @endif
            </div>
        </div>
    </div>
</div>
