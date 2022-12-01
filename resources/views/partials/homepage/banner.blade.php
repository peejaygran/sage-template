@php
$banner = get_field('banner');
$firstload = false;
if (!isset($_COOKIE['iwashere']) && !is_user_logged_in()) {
    $firstload = true;
}
@endphp

<div class="container pt-4 pt-md-7 full-width">
    <div class="row">
        <div class="col">
            <h1 class="text-center col-md-7 col-xl-6 mx-auto mb-4">
                {{ $banner['title'] }}
            </h1>
            <p class="h5 font-weight-normal text-center pb-md-5">
                {{ $banner['pitch'] }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col image-banner rounded mt-5 px-0 pt-5 pt-md-0 mx-sm-5 mx-xl-7">
            <div class="col-md-9 mx-auto searchbox mb-md-5">
                <div class="container form-container p-4 p-md-5 bg-light shadow-lg">
                    <p>Looking for a house cleaning service? Get a quote right away!
                    </p>

                    <form action="{{ isset($quote_url) ? $quote_url : home_url('get-a-quote') }}" method="get">
                        <div class="container search-banner-form">

                            <div class="row search-button-row p-2 bg-white border">

                                <div class="col-md-7" style="display: flex;align-items: center;">
                                    <i class="fas fa-search"></i>
                                    <input type="text" name="postcode" id="postcode" value="{{-- $result->postcode --}}"
                                        placeholder=" e.g. 3006 Melbourne . ." class="form-control mb-lg-0 my-2 my-sm-0"
                                        style="border: none;" required="">
                                </div>

                                <div class="col-md-5 d-flex pl-lg-5 p-0">
                                    <button type="submit" class="btn btn-lg text-white ml-lg-1 w-100 py-3"
                                        style="padding-right: 0;padding-left: 0;">

                                        <span>Check Prices and Availability</span>

                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center pt-5 mx-auto p-lg-0">
                @if ($firstload)
                    <img src="{{ wp_get_attachment_url(2943) }}" class=" d-sm-none w-100" style="
    z-index: -1;
">
                    <img loading="lazy" src="{{ home_url('home-services.jpeg') }}"
                        style="
                    z-index: -1;
                "
                        class="d-none d-sm-block w-100 h-100">
                @else
                    <img loading="lazy" src="{{ home_url('home-services.jpeg') }}"
                        style="
                    z-index: -1;
                "
                        class="d-none d-sm-block w-100 h-100">
                @endif
                {{-- <img src="{{ wp_get_attachment_url(2943) }}" class=" d-sm-none w-100" style="width: 100%">
                <img loading="lazy" src="{{ wp_get_attachment_url(2944) }}" class="d-none d-sm-block w-100"> --}}
            </div>
        </div>
    </div>
</div>

<style>
    /* .search-banner-form button {
        color: #fff !important;
        background-color: #2B59C3 !important;
    }

    .search-block-button .search-banner-form button {
        background-color: #fff !important;
        color: #4d76d4 !important;
    } */

    .searchbox .form-container {
        transform: translateY(-40px);
        border-radius: 10px;
    }

    .searchbox .form-container p {
        text-align: center;
        font-size: 20px;
    }
</style>
