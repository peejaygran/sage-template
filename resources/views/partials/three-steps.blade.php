@php
$how_it_works = get_field('how_it_works');

// echo '<pre>';
// print_r($how_it_works);
// echo '</pre>';
// die();

@endphp

<h6 class="text-center mt-5 mb-4">How it works</h6>
<h2 class="text-center">{{ $how_it_works['subheader'] }}</h2>

<div class="row py-4">
    <div class="col-md-3 pb-3 pb-lg-0">
        <div class="card">
            <img class="card-img-top" src="{{ $how_it_works['first_step_group']['image'] }}" loading="lazy">
            <div class="card-body p-3">
                <h5>{{ $how_it_works['first_step_group']['header'] }}</h5>
                <p class="card-text">{{ $how_it_works['first_step_group']['description'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 pb-3 pb-lg-0">
        <div class="card ">
            <img class="card-img-top" src="{{ $how_it_works['second_step_group']['image'] }}" loading="lazy">
            <div class="card-body p-3">
                <h5>{{ $how_it_works['second_step_group']['header'] }}</h5>
                <p class="card-text">{{ $how_it_works['second_step_group']['description'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 pb-3 pb-lg-0">
        <div class="card ">
            <img class="card-img-top" src="{{ $how_it_works['third_step_group']['image'] }}" loading="lazy">
            <div class="card-body p-3">
                <h5>{{ $how_it_works['third_step_group']['header'] }}</h5>
                <p class="card-text">{{ $how_it_works['third_step_group']['description'] }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 pb-3 pb-lg-0">
        <div class="card ">
            <img class="card-img-top" src="{{ $how_it_works['fourth_step_group']['image'] }}" loading="lazy">
            <div class="card-body p-3">
                <h5>{{ $how_it_works['fourth_step_group']['header'] }}</h5>
                <p class="card-text">{{ $how_it_works['fourth_step_group']['description'] }}</p>
            </div>
        </div>
    </div>
</div>

<p class="d-md-block text-center h6 pt-4">
    <a href="{{ home_url('get-a-quote') }}" class="btn text-light btn-primary px-5 py-2_5 link-checked">
        Check Prices and Availability
    </a>
</p>
{{-- <p style="text-align: center;">
  <a href="#" style="color: #2B59C3;font-weight: 500;">Find your cleaner</a>
</p> --}}
