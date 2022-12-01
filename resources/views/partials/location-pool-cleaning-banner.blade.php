@php
$banner = get_field('location_banner');
@endphp

<section class="location-banner container p-4 p-md-0 mt-md-5 ">
    <div class="row">

        @include('partials.breadcrumbs')

        <div class="col-lg-6 ">
            <h1 class="h2">{{ $banner['header'] }}</h1>
            <h4>{{ $banner['subheader'] }}
            </h4>
            <div class="row mt-3">
                <ul style="list-style-type:none;">
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Schedule your pool cleanings weekly, bi-weekly, or monthly.
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Certified pool cleaners who are insured and bonded
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            No additional charges when booking weekends or public holidays
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            No long-term contracts that you have to sign - cancel anytime
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Easy online account management
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Pool maintenance to keep your swimming pool clean and sparkling all season long!
                        </p>
                    </li>
                </ul>
            </div>
            @include('partials.cta.search-button', ['size' => '2_column'])
        </div>
        <div class="featured col-md-6 d-none d-lg-block pl-5">
            <div class="row">
                <div class="col mb-4">
                    <img loading="lazy" src="{{ $banner['images']['image_1'] }}">
                </div>
                <div class="col">
                    <img  loading="lazy" src="{{ $banner['images']['image_2'] }}">
                </div>
            </div>
        </div>
    </div>
</section>
