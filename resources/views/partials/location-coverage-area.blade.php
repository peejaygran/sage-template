@php

$_areas = new _Areas();

$nearby_areas = $_areas->get_nearby_areas([
    'lat' => $locations['lat'],
    'lng' => $locations['lng'],
]);

$suburbs = $_areas->get_suburbs($nearby_areas, 'population');
$postcodes = $_areas->get_postcodes($nearby_areas, 'population');

$service_name = get_field('service_name', $service[0]->ID);

$service_link = strtolower($service_name);
$service_link = preg_replace('/[^a-z0-9_\s-]/', '', $service_link);
$service_link = preg_replace('/[\s-]+/', ' ', $service_link);
$service_link = preg_replace('/[\s_]/', '-', $service_link);
@endphp


<h2 class="text-center">Sidepost {{ $service_name }} {{ $locations['location'] }} Office Details and
    Coverage Area</h2>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mb-3">
            <p class="font-weight-bold">Postal Code Coverage:</p>


            @foreach ($postcodes as $key => $_postcode)
                @if ($key < 18)
                    <span class="mr-2">{{ $_postcode['postcode'] }}{{ $key < 18 - 1 ? ',' : '' }}</span>
                @endif
            @endforeach


            <p class="font-weight-bold my-2">Areas we cover within the city:</p>

            @foreach ($suburbs as $key => $_suburb)
                @if ($key < 14)
                    <span class="mr-2">{{ $_suburb['suburb'] }}{{ $key < 14 - 1 ? ',' : '' }}</span>
                @endif
            @endforeach
            and the whole of {{ $locations['location'] }} area




            <p class="font-weight-bold my-2">Other locations we cover nearby {{ $locations['location'] }}:</p>

            <div class="row">
                @php
                    $coverage = ['Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Adelaide', 'Gold Coast', 'Newcastle', 'Canberra'];
                @endphp

                @foreach ($coverage as $area)
                    @php
                        $location_link = strtolower($area);
                        $location_link = preg_replace('/[^a-z0-9_\s-]/', '', $location_link);
                        $location_link = preg_replace('/[\s-]+/', ' ', $location_link);
                        $location_link = preg_replace('/[\s_]/', '-', $location_link);
                        $location_link = $service_link . '/' . $location_link;                        
                    @endphp

                    <div class="col-6">
                        <a href="{{ home_url('services/' . $location_link) }}" class="d-flex align-items-center">
                            <span>{{ $area . ' ' . $service_name }}</span>
                            <i class="fas fa-angle-right ml-3"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-4 py-3">
            <div class="card">
                <div class="card-body">
                    <p><strong>Local Line: </strong>1300 991 368</p>
                    <p><strong>Email: </strong>support@saidepost.com</p>
                    <p class="font-weight-bold">Working Hours:</p>

                    <table>
                        <tr>
                            <td>Mon.-Fri. </td>
                            <td>09am.-08pm.</td>
                        </tr>
                        <tr>
                            <td>Sat. </td>
                            <td>09am.-08pm.</td>
                        </tr>
                        <tr>
                            <td>Sun. </td>
                            <td>09am.-08pm.</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-6 pt-4">
            @include('partials.cta.search-button', ['size' => '2_column'])
        </div>

    </div>
</div>

<style>
    .capsule-wrapper {
        border-radius: 25px;
    }

</style>
