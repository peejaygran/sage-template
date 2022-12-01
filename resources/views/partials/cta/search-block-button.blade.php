@php
$location = get_field('location');
@endphp

{{-- @if ($location) --}}
    <div class="search-block-button container-fluid bg-primary p-md-5">
        <div class="row flex-column align-items-center justify-content-center px-2 py-5 px-sm-5 py-sm-5">

            <h4 class="mb-5 text-center text-light">
                Get more time for yourself, leave the housework to a professional home service expert
                {{-- {{ isset($location['location']) ? $location['location'] : 'Sydney' }} --}}
            </h4>

            <div class="col-md-8">
                @include('partials.cta.search-button')
            </div>

        </div>
    </div>
{{-- @endif --}}
