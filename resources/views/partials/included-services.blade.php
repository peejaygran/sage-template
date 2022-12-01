@php
$source = false;
$services = get_field('service_inclusion');

$header = '';
$services_group = [];

if (isset($custom_post_id)) {
    $main_services = get_field('service_inclusion', $custom_post_id);
    $header = $main_services['header'] ?: $header;
    $services_group = $main_services['services_group'] ?: $services_group;
    $source = true;
}

if ($services['services_group']) {
    $services_group = $services['services_group'];
    $source = false;
}
$header = isset($services['header']) ?$services['header']: $header;
$subheader = isset($services['subheader']) ?$services['subheader']: $subheader;

@endphp


@if ($services_group && $header)

    @if ($source)
        @include('partials/acf-source')
    @endif

    <h2 class="text-center">{{ $header }}</h2>

    @if (isset($services['subheader']))
        <p class="text-center">{{ $subheader }}</p>
    @endif

    <div class="container-fluid">
        <div class="row px-2 px-sm-4 pt-5 justify-content-around">
            @foreach ($services_group as $services)
                <div
                    class="col-md-6 pb-3 mb-3 pb-lg-0 p-1 {{ count($services_group) >= 4 ? 'col-lg-3' : 'col-lg-4' }}">
                    <div class="card h-100 p-3">
                        @if ($services['image'])
                            <img class="card-img-top" loading="lazy" src="{{ $services['image'] }}">
                        @endif
                        <div class="card-body p-3">
                            @if (isset($services['header_']))
                                <h4 class="text-center">{{ $services['header_'] }}</h4>
                            @endif
                            {!! $services['details'] !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- @include('partials/cta/book-now') --}}

@endif
