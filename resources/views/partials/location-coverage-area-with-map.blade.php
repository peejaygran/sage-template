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


<h2 class="mw-800 text-center mx-auto">Sidepost {{ $service_name }} {{ $locations['location'] }} Office Details and
    Coverage Area</h2>

<div class="row">


    <div class="col-md-8 mb-3 py-3">

        {{-- <h1>test</h1> --}}
        @include('partials.google-map', ['location' => $locations['location']])

        {{-- <div id="location-page-map">


                
            </div> --}}

    </div>


    <div class="col-md-4 py-3">


        <div class="card">
            <div class="card-body">

                @php
                    
                    $email = get_field('email', 1400);
                    $phone = get_field('phone', 1400);
                @endphp

                <p>
                    <strong>Phone: </strong>
                    <a href="tel:{{ str_replace(' ', '', $phone) }}">{{ $phone }}</a>
                </p>

                <p>
                    <strong>Email: </strong>
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </p>

                <p class="font-weight-bold">Working Hours:</p>

                @php
                    $working_hours = get_field('working_hours', 1400);
                @endphp

                <table>
                    @foreach ($working_hours as $working_hour)
                        <tr>
                            <td class="p-1">{{ $working_hour['days'] }}</td>
                            <td class="p-1">{{ $working_hour['hours'] }}</td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td>Sat. </td>
                        <td>09am.-08pm.</td>
                    </tr>
                    <tr>
                        <td>Sun. </td>
                        <td>09am.-08pm.</td>
                    </tr> --}}
                </table>

            </div>
        </div>



    </div>


    {{-- ------ --}}
    <div class="col-md-8 mb-3">

        <p class="lead mt-4">Postal Code Coverage:</p>


        <div class="d-block">

            @foreach ($postcodes as $key => $_postcode)
                @if ($key < 18)
                    <span class="mr-2">{{ $_postcode['postcode'] }}{{ $key < 18 - 1 ? ',' : '' }}</span>
                @endif
            @endforeach

        </div>






        <p class="lead mt-4">Areas we cover within the city:</p>

        <div class="d-block">
            @foreach ($suburbs as $key => $_suburb)
                @if ($key < 14)
                    <span class="mr-2">{{ $_suburb['suburb'] }}{{ $key < 14 - 1 ? ',' : '' }}</span>
                @endif
            @endforeach
        </div>











        and the whole of {{ $locations['location'] }} area
        <p class="lead mt-4">Other locations we cover nearby {{ $locations['location'] }}:</p>

        <div class="row">



            @php
                
                $coverage = [];
                
                $_seo = new _Seo();
                $location_posts = $_seo->get_all_location_pages([
                    'nearby_to' => get_the_ID(),
                    'include_locations' => true,
                    'include_service_page' => true,
                ]);
                
                $services_locations = [];
                
                foreach ($location_posts as $_post) {
                    if (isset($_post->service_page->ID)) {
                        $post_service_name = get_post_meta($_post->service_page->ID, 'service_name', true);
                
                        if ($post_service_name == $service_name) {
                            $coverage[] = $_post;
                        }
                    }
                }
                
            @endphp


            @foreach ($coverage as $key => $area)
                @if ($key > 0 && $key < 9)
                
                    <a title="{{ $service_name }} - {{ $area->location['location'] }}"
                        href="{{ get_permalink($area->ID) }}" class="bubble">
                        <span>{{ $area->location['location'] }}</span>
                    </a>
                @endif
            @endforeach





        </div>



        <p class="lead mt-4">Most Popular locations:</p>
        <div class="row">



            @php
                
                $static_coverage_locations = ['sydney', 'melbourne', 'brisbane', 'perth', 'adelaide', 'gold coast', 'newcastle', 'canberra', 'central coast'];
                $static_coverage = [];
                $available_static_location_names = [];
                
                foreach ($location_posts as $_post) {
                    if (isset($_post->service_page->ID)) {
                        $post_service_name = get_post_meta($_post->service_page->ID, 'service_name', true);
                
                        if (strtolower($post_service_name) == strtolower($service_name) && in_array(trim(strtolower($_post->location['location'])), $static_coverage_locations)) {
                            $static_coverage[trim(strtolower($_post->location['location']))] = $_post;
                            $available_static_location_names[] = trim(strtolower($_post->location['location']));
                        }
                    }
                }
                
            @endphp


            @foreach ($static_coverage_locations as $key => $_area)
                {{-- makes sure to NOT show the current page --}}
                @if (trim(strtolower($_area)) != trim(strtolower($locations['location'])))
                    {{-- if page is available --}}
                    @if (in_array($_area, $available_static_location_names))
                        <a title="{{ $service_name }} - {{ $static_coverage[$_area]->location['location'] }}"
                            href="{{ get_permalink($static_coverage[$_area]->ID) }}" class="bubble">
                            <span>{{ ucwords($static_coverage[$_area]->location['location']) }}</span>
                        </a>
                    @else
                        {{-- if NO page is available --}}
                        <a title="{{ $service_name }} - {{ $_area }}" href="#" class="bubble">
                            <span>{{ ucwords($_area) }}</span>
                        </a>
                    @endif
                @endif
            @endforeach










        </div>






    </div>























    <div class="col-md-6 pt-4">
        @include('partials.cta.search-button', ['size' => '2_column'])
    </div>

</div>




@include('partials.map')





<style>
    .capsule-wrapper {
        border-radius: 25px;
    }
</style>
