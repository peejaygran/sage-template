@php

$location_coverage = get_field('location_coverage');
sort($location_coverage);
// echo '<pre>';
// print_r($location_coverage);
// echo '</pre>';
// $location_coverage = ['Albury', 'Armidale', 'Bathurst', 'Blue', 'Broken', 'Cessnock', 'Dubbo', 'Grafton', 'Lithgow', 'Newcastle', 'Orange', 'Queanbeyan', 'Sydney', 'Tamworth', 'Wagga Wagga', 'Wallogon'];
@endphp

<div class="container location-coverage-list {{ (!$location_coverage) ? 'd-flex' : '' }}">
    <div class="row list-characters justify-content-between px-3">

        @foreach (range('A', 'Z') as $alphabet)
            @php $location_counter = 0; @endphp
            @foreach ($location_coverage as $coverage)
                @if (strtoupper($coverage['location'][0]) == $alphabet)
                    @php $location_counter++; @endphp
                @endif
            @endforeach

            @if ($location_counter)
                <a href="#location-{{ $alphabet }}">{{ $alphabet }}</a>
            @endif

            @if (!$location_counter)
                <a href="#">{{ $alphabet }}</a>
            @endif
        @endforeach
    </div>

    <div class="row">

        @php
            $column_limit = floor(count($location_coverage) / 3);
            $character_in_processing = false;
            $character_in_processing_count = 0;
            $open_column = false;
        @endphp

        @foreach ($location_coverage as $key => $coverage)
            @if ($character_in_processing_count >= $column_limit)
                @php $character_in_processing_count = 0; @endphp
            @endif

            @if ($character_in_processing_count == 0)
                <div class="col-4">
            @endif

            @php
                if (!$character_in_processing) {
                    $character_in_processing = strtoupper($coverage['location'][0]);
                    echo '<p id="location-' . $character_in_processing . '">' . $character_in_processing . '</p>';
                    $character_in_processing_count++;
                }
                
                if ($character_in_processing) {
                    if ($character_in_processing != strtoupper($coverage['location'][0])) {
                        $character_in_processing = strtoupper($coverage['location'][0]);
                        echo '<p id="location-' . $character_in_processing . '">' . $character_in_processing . '</p>';
                        $character_in_processing_count++;
                    }
                }
            @endphp

            <a href="">
                <p>{{ $coverage['location'] }}</p>
            </a>

            @if ($character_in_processing_count >= $column_limit)
    </div>
    @endif
    @endforeach

</div>
</div>
