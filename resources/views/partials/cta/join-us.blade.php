@php
$phone = get_field('phone', 1400);
@endphp

<div class="container">
    <div class="row justify-content-around mb-2">
        <div class="col-md-5 d-flex flex-column justify-content-center pb-4">
            <h2 class="text-center text-md-left mb-4">Run a home service? Join our ever-growing team at Sidepost</h2>
            <img class="d-md-none mb-3" src="{{ wp_get_attachment_url(2051) }}" alt="" width="100%">
            <p class="text-center text-md-left mb-5">
                Looking to provide cleaning or other services through Sidepost? We're always looking for like-minded
                individuals to join our team and our franchise network. Be your own boss and have the support structure
                of a large organisation behind you.
            </p>

            <div>
                <button type="button" class="col-12 col-lg-6 btn btn-lg bg-primary text-light learn-more"><a
                        class="nav-link text-light" href="tel:{{ str_replace(' ', '', $phone) }}">
                        <i class="fa fa-lg fa-phone"></i> {{ $phone }}
                    </a></button>
            </div>
        </div>

        <div class="col-md-6">
            <img class="d-none d-md-block" src="{{ wp_get_attachment_url(2051) }}" alt="" width="100%" loading="lazy">
        </div>
    </div>
</div>
