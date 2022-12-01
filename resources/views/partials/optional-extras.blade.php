@php
$source = false;
$extra_services = [];

if (isset($custom_post_id)) {
    $extra_services = get_field('services_extra', $custom_post_id) ? get_field('services_extra', $custom_post_id) : [];
    $source = true;
}

if (get_field('services_extra')) {
    $extra_services = get_field('services_extra');
    $source = false;
}
@endphp


@if ($extra_services)

    <div class="container optional-extras mb-140 px-4">

        @if ($source)
            @include('partials/acf-source')
        @endif

        <h2 class="text-center">Optional Extras</h2>
        <p class="text-center">Add extras and customise your cleaning service to meet your needs:</p>

        <div class="container-fluid">

            <div class="row">
                @foreach ($extra_services as $_extra_service)
                    <div class="extra-service col-sm-6 container-fluid my-1 pt-3 m-0">

                        <div class="row">
                            <div class="col-4 col-sm-8 col-md-4 col-lg-2 mx-auto mb-2 mb-md-0">
                                <img  loading="lazy" src="{{ $_extra_service['service_extra_icon'] }}" class="w-100">
                            </div>

                            <div class="col-md-8 col-lg-10 text-center text-md-left">
                                <h4>
                                    {{-- <a href="{{ $_extra_service['service_extra_url'] }}"> --}}
                                        {{ $_extra_service['service_extra_name'] }}
                                    {{-- </a> --}}
                                </h4>
                                <p>{{ $_extra_service['service_extra_desc'] }}</p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

        {{-- @include('partials.cta.check-price') --}}
    </div>

@endif


<style>
    .optional-extras a {
        color: #183b56;
    }

</style>
