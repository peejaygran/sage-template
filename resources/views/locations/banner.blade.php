@php
$banner = get_field('location_banner');

@endphp
<section class="location-banner container p-4 p-md-0 mt-md-5 ">
    <div class="row">
        @include('partials.breadcrumbs')

        <div class="col-lg-6 ">

            <h1>{{ $banner['header'] }}</h1>
            <h4 class="my-4">{{ $banner['subheader'] }} </h4>

            @if (count($banner['images']) >= 1)
                <div class="d-sm-none">
                    <div class="w-100" style="height: 200px;border-radius: 10px;margin-top: 20px;">
                        <img loading="lazy" class="img-cover" src="{{ $banner['images'][0]['image'] }}">

                    </div>

                </div>
            @endif

            <div class="row mt-3">
                <ul class="list-unstyled mb-0">
                    @foreach ($banner['checklist'] as $item)
                        <li>
                            <p>
                                <i class="fas fa-check-circle"></i>
                                {{ $item['list'] }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>

            <a href="https://www.trustpilot.com/review/sidepost.com.au"
                class="d-flex align-items-center mx-3 mb-md-4"><span class="mr-2">Excellent</span>
                @include('partials.svgs.trustpilot-svg-stars', ['width' => 100])
            </a>

            @include('partials.cta.search-button', ['size' => '2_column'])

        </div>

        <div class="featured col-md-6 d-none d-lg-block pl-5">

            {{-- @php
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
            @endif

        </div>

    </div>
</section>
