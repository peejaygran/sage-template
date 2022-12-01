@php
$how_it_works = get_field('how_it_works');

if (isset($custom_post_id)) {
    $how_it_works = get_field('how_it_works', $custom_post_id);
}
@endphp

<h2 class="text-center mb-4">{{ $how_it_works['how_it_works_header'] }}</h2>
<div class="row">

    @foreach ($how_it_works['how_it_works_cards'] as $how_it_works)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <img  loading="lazy"  class="mb-2" src="{{ $how_it_works['image'] }}" alt="" width="100%"
                        style="max-height: 200px">
                    <h4>{{ $how_it_works['header'] }}</h4>
                    <p>{{ $how_it_works['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>


<div class="d-flex justify-content-center mt-2 pb-5">
    {{-- <a href="/">Find your Cleaner <i class="fas fa-arrow-right    "></i></a> --}}
    <p class="d-md-block text-center h6 pt-4">
        <a href="{{ $quote_url }}"
            class="btn text-light btn-lg btn-primary px-5 py-2_5 link-checked">
            Check Prices and Availability
        </a>
    </p>
</div>
