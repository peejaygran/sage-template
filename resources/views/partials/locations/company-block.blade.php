@php
$_extras = new _Extras();
$post_id = $_extras->get_post_id_by_meta($company->rmv_id);
$profile_link = get_permalink($post_id);
@endphp

@if ($post_id)

    <div class="card company-block">
        <div class="card-body row justify-content-center">

            <div class="col-lg-4 logo-block px-0">
                <img src="{{ $company->rmv_logo }}" alt="">
            </div>

            <div class="col-lg-8 px-3 d-flex flex-column justify-content-between">
                <div class="row align-items-baseline">
                    <div class="col-lg-7 px-0">
                        <p class="text-center text-lg-left mb-0" style="font-size: 20px;">
                            <a href="{{ $profile_link }}">
                                {{ $company->rmv_company }}
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-5 text-center text-lg-right">
                        <p class="m-0">
                            @if (isset($company->general_reviews))
                                {{ number_format($company->review_stars, 1) }} {!! generate_stars($company->review_stars) !!}
                            @else
                                {!! generate_stars(0) !!}
                            @endif
                            <small>
                                @if (isset($company->reviews))
                                    {{ count($company->reviews) }} reviews
                                @endif
                            </small>
                        </p>
                    </div>

                    <p class="small my-2">{{ $company->rmv_pitch }}</small>
                </div>


                <div class="row services">
                    <div class="col-lg-8">
                        {{-- @if (isset($company->leads))
                        <p class="small">
                            @foreach ($company->leads as $service)
                                {!! $service !!}
                            @endforeach
                        </p>
                    @endif --}}
                    </div>
                    <div class="col-lg-4 text-center">
                        <button class="btn wp-orange px-4 py-2">compare now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endif
