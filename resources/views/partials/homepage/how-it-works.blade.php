<div class="container pt-5 mb-5">
    <p class="text-center small">How it works</p>
    <h2 class="text-center mb-4">Get a house cleaning quote in 3 easy steps</h2>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <img class="mb-2" src="{{ wp_get_attachment_url(741) }}" alt="" width="100%"
                        style="max-height: 200px">
                    <h4>Match</h4>
                    <p>
                        Just enter your postcode. We’ll pair you with the best local cleaner and give you a price
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <img class="mb-2" src="{{ wp_get_attachment_url(743) }}" alt="" width="100%"
                        style="max-height: 200px">
                    <h4>Manage</h4>
                    <p>
                        Customise and schedule your clean - every week or whenever suits you. You’re in full control
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <img class="mb-2" src="{{ wp_get_attachment_url(742) }}" alt="" width="100%"
                        style="max-height: 200px">
                    <h4>Marvel</h4>
                    <p>
                        At your spotless house and lack of stress. Plus there’s no hassle with cash - we’ll bill your
                        card when
                        the clean’s complete.
                </div>
            </div>
            </p>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-2 pb-5">
        {{-- <a href="/">Find your Cleaner <i class="fas fa-arrow-right    "></i></a> --}}
        <p class="d-md-block text-center h6 pt-4">
            <a href="{{ $quote_url }}" class="btn btn-lg text-light btn-primary px-5 py-2_5 link-checked">
                Check Prices and Availability
            </a>
        </p>
    </div>
</div>
