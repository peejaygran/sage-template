@php
$source = false;
$how_it_works = get_field('how_it_works');
$header = '';
// $subheader = '';
$cards = [];

if (isset($custom_post_id)) {
    $main_how_it_works = get_field('how_it_works', $custom_post_id);
    $header = isset($main_how_it_works['how_it_works_header']) ? $main_how_it_works['how_it_works_header'] : $header;
    // $subheader = isset($main_how_it_works['how_it_works_subheader']) ? $main_how_it_works['how_it_works_subheader'] : $subheader;
    $cards = isset($main_how_it_works['how_it_works_cards']) ? $main_how_it_works['how_it_works_cards'] : $cards;
    $source = true;
}

if (isset($how_it_works['how_it_works_cards'])) {
    $cards = $how_it_works['how_it_works_cards'];
    $source = false;
}
$header = isset($how_it_works['how_it_works_header']) ? $how_it_works['how_it_works_header'] : $header;
// $subheader = isset($how_it_works['how_it_works_subheader']) ? $how_it_works['how_it_works_subheader'] : $subheader;

@endphp

@if ($cards && $header)

    <p class="text-center mb-4 h5 mt-5">How it works</p>

    <h2 class="text-center {{ $subheader ? '' : 'mb-4' }}">{{ $header }}</h2>

    {{-- <p class="text-center {{ $subheader ? 'mb-4' : '' }}">{{ $subheader }}</p> --}}

    @if ($source)
        @include('partials/acf-source')
    @endif

    <div class="row py-4 justify-content-center">
        @foreach ($cards as $card)
            <div class="col-sm-6 col-lg-3 pb-3 pb-lg-0">
                <div class="card h-100" style="background-color: #F9FBFE;border: none;">
                    <div class="card-body p-3">

                        <img class="w-100 mb-4 rounded" src="{{ $card['image'] }}" loading="lazy"
                            style="height: 160px; object-fit: cover; object-position: center;">

                        <h5>{{ $card['header'] }}</h5>

                        <p>{{ $card['description'] }}</p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="check-price justify-content-center d-flex pt-4 mb-140">
        <a href="{{home_url('select-service/')}}" rel="nofollow" class="btn btn-primary text p-3" style="border-radius: 8px;">Check Prices and
            Availability</a>
    </div>



    {{-- <p class="d-md-block text-center h6 pt-4">
        <a href="{{     $quote_url     }}"
            class="btn btn-lg text-light btn-primary px-5 py-2_5">
            Check Prices and Availability
        </a>
    </p> --}}
@endif
