@php

$_companies = new _Companies();

$companies = $_companies->get_companies_by_location($location);

@endphp


<div class="container d-flex flex-column align-items-center">

    @foreach ($companies as $key => $company)
        @include('partials.locations.company-block', ["company" => $company ] )
    @endforeach




</div>
