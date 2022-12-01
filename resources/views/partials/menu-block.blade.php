@include('partials.featured-logo')

@php
$phone = get_field('phone', 1400);
if (get_post()->post_type == 'subservice') {
    $quote_url = get_field('services_banner', get_field('main_service')[0]->ID)['get_a_quote_url']['url'];
}
@endphp

<div class="container-fluid overview-block px-md-5">
    <div class="row py-4">
        <div
            class="col-lg-5 d-flex align-items-center justify-content-around justify-content-lg-start mb-4 m-lg-0 p-2 pl-lg-5">
            <a href="#about-services-we-offer" class="text-light mr-lg-4 mr-xl-5">Overview</a>
            <a href="#included-cleaning-service" class="text-light mx-4 mr-lg-4 mr-xl-5">Related Services</a>
            <a href="#service-areas-block" class="text-light mr-lg-4 mr-xl-5">Coverage</a>
        </div>
        <div class="col-lg-7 container-fluid">
            <div class="row">
                <div class="col-sm-6 col-lg-8 d-flex justify-content-end mb-3 mb-sm-0">
                    <a rel="nofollow" href="{{ $quote_url }}"
                        class="text-dark font-weight-bold rounded py-3 px-2 px-md-5 mx-auto mx-md-0 check-prices">Check
                        Prices and Availability</a>
                </div>
                <div class="col-sm-6 col-lg-4 d-flex align-items-center">
                    <a href="tel:{{ str_replace(' ', '', $phone) }}" class="text-light mx-auto"><i
                            class="fas fa-phone mr-2"></i>{{ $phone }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
