@php
$phone = get_field('phone', 1400);
@endphp

<div class="strip-menu container-fluid px-md-6 ">
    <div class="row p-4 mx-md-5">
        <div
            class="col-lg-8 d-flex align-items-center justify-content-around justify-content-lg-start m-lg-0 text-center px-md-4">
            <a href="#about-services-we-offer" class="text-light mr-lg-4 mr-xl-5">How it Works</a>
            <a href="#included-cleaning-service" class="text-light mr-lg-4 mr-xl-5">Cleaning Services</a>
            <a href="#other-home-services" class="text-light">Coverage Area</a>
        </div>

        <div class="col-lg-4 d-none d-md-flex justify-content-md-center justify-content-lg-end mt-md-4 mt-lg-0">
            <a href="tel:{{ str_replace(' ', '', $phone) }}" class="text-light font-weight-bold h5 m-0"> <i
                    class="fa fa-lg fa-phone"></i>{{ $phone }}</a>
        </div>
    </div>
</div>

<div class="col-md-6 col-lg-3 d-inline d-md-none align-items-center">
    <a href="tel:{{ str_replace(' ', '', $phone) }}" class="mx-auto"
        style="text-align: center;display: list-item;"><i class="fas fa-phone mr-2"></i>{{ $phone }}</a>
</div>
