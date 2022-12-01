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

            <div class="d-sm-none">
                @include('partials.cta.search-button', ['size' => '2_column'])
                <div class="w-100"
                    style="background-image: url(https://sidepost.com.au/wp-content/uploads/2022/05/47883849_youtube-profile-1.png);background-repeat: no-repeat;background-size: cover;height: 200px;border-radius: 10px;margin-top: 20px;">
                </div>
            </div>

            <div class="row mt-3">
                <ul style="list-style-type:none;">
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Pick a schedule that suits you - weekly, fortnightly or monthly
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Highly experienced cleaners who police-vetted and insured
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Book on weekends and public holidays at no extra cost
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            No locked-in contracts - cancel or pause anytime
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Environmentally safe and budget-friendly pricing
                        </p>
                    </li>
                    <li>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            Manage your regular cleaning schedule online with ease
                        </p>
                    </li>
                </ul>
            </div>

            <div class="d-none d-sm-block">
                @include('partials.cta.search-button', ['size' => '2_column'])
            </div>

        </div>
        <div class="featured col-lg-6 d-none d-lg-flex p-1">

            <img src="{{ $banner['images']['image_1'] }}" alt="cleaning-floor" loading="lazy" class="h-100">
            <img src="{{ $banner['images']['image_2'] }}" alt="handy-tools" loading="lazy"
                style="position: absolute;left: 50%;">
            <img src="{{ $banner['images']['image_3'] }}" alt="repairer-woman" loading="lazy"
                style="position: absolute; bottom:0; left: 50%;">
        </div>
    </div>
</section>
