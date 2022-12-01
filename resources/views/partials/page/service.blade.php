@php
$banner = get_field('banner');
$firstload = false;
if (!isset($_COOKIE['iwashere']) && !is_user_logged_in()) {
    $firstload = true;
}
@endphp

<div class="container service pt-7 px-0">
    <h1 class="text-center col-md-7 col-xl-8 mx-auto mb-4">
        Discover our services
    </h1>
    <p class="h5 col-md-8 mx-auto font-weight-normal text-center pb-3 pb-md-5">
        Wondering if Sidepost is available near you? Simply enter your postcode below to check prices and avilability
        for your area.
    </p>
    {{-- <p class="h5 font-weight-normal text-center pb-5"> below to check prices and avilability for your area.
 </p> --}}


    <div class="container service-banner rounded mt-5 pt-md-0">
        <div class="col-md-9 mx-auto searchbox">
            @include('partials.cta.search-button')
        </div>
        <div class="d-flex justify-content-center mx-auto pt-5 p-lg-0">
            @if ($firstload)
                <img src="{{ wp_get_attachment_url(2943) }}" class=" d-sm-none w-100" style="width: 100%">
                <img loading="lazy" src="{{ home_url('wp-content/uploads/2022/07/services.png') }}" class="d-none d-sm-block w-100">
            @else
                <img loading="lazy" src="{{ home_url('wp-content/uploads/2022/07/services.png') }}" class="d-none d-sm-block w-100">
            @endif
        </div>
    </div>


    @include('partials.cta.reviews-logo')
    <div class="pt-5">
        @include('partials.homepage.home-services', ['custom_post_id' => 1039, 'hide' => false])
    </div>

    <div class="container four-blocks pt-1 mb-140">
        <h2 class="text-center mb-4">How expert domestic cleaning services are done</h2>
        @include('partials.four-blocks', ['hardcode' => true])
    </div>

    @include('partials.two-column-service-block')

    @include('partials/optional-extras', ['custom_post_id' => $GLOBALS['cgv']['house-cleaning']])

    @include('partials.homepage.areas')

    <div class="mb-140">
        @include('partials.homepage.customer-reviews', [
            'post_id' => $GLOBALS['cgv']['house-cleaning'],
        ])
    </div>
    {{-- <div class="row trust-us pt-5" style="background-color: #ffeecf;">
        <div class="col-md-6 d-none d-md-block text-center">
            <img src="{{ wp_get_attachment_url(1289) }}" alt="service-img" loading="lazy" width="80%">
        </div>
        <div class="col-md-6 px-4">
            <h3 class="mb-4">Housekeepers to trust - we ensure that your service is provided by:</h3>
            <ul>
                <li>Conscientious, reliable and hard-working individuals.</li>
                <li>Comprehensively insured against damages.</li>
                <li>Smartly uniformed, friendly and polite.</li>
                <li>Interviewed, vetted and trained by the Fantastic Academy.</li>
                <li>Always happy to meet your specific cleaning requirements.</li>
            </ul>
            <div class="ml-3 mt-5 d-none d-md-block">
                <img src="{{ wp_get_attachment_url(1285) }}" alt="" width="60%" height="40%">
            </div>
        </div>
    </div> --}}

</div>

@include('partials/cta/search-block-button')
