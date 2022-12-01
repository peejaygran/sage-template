@php
$why_book = get_field('why_book_sidepost_service');
@endphp
@if ($why_book['header'] && $why_book['description'])
    <div class="container mb-140">
        <div class="row justify-content-around mb-2 align-items-center">
            <div class="col-md-5 d-flex flex-column justify-content-center pb-4">
                <h2 class="text-center text-md-left mb-4">
                    {{ $why_book['header'] }}
                </h2>
                <img class="d-md-none mb-3" src="{{ $why_book['image'] ? $why_book['image'] : wp_get_attachment_url(1382) }}" alt="" width="100%">

                {!! $why_book['description'] !!}

                
                <a rel="nofollow" href="{{ $quote_url }}">
                    <button type="button" class="col-12 col-lg-6 btn btn-lg bg-primary text-light">Book a
                        cleaner</button>
                </a>
            </div>

            <div class="col-md-6">
                {{-- <img class="d-none d-md-block"
                    src="{{ $why_book['image'] ? $why_book['image'] : wp_get_attachment_url(1382) }}" alt=""
                    width="100%"> --}}

                    <img class="d-none d-md-block"
                    src="{{ $why_book['image']}}" width="100%">
            </div>
        </div>
    </div>
@endif

{{-- @php
$why_book_sidepost = get_field('why_book_sidepost_service');
@endphp


@if ($why_book_sidepost['header'] && $why_book_sidepost['description'] && $why_book_sidepost['image'])
    <div class="container mb-140 px-4">
        <div class="row">
            <div class="col-lg-6">
                <h2>{{ $why_book_sidepost['header'] }}</h2>
                <p>{{ $why_book_sidepost['description'] }}</p>

                <div class="book-now pt-5">
                    <button type="button" class="px-5 py-3 btn text-white ml-md-1 book-now ">Book
                        Now</button>
                </div>

            </div>
            <div class="col-lg-6">
                <img src="{{ $why_book_sidepost['image'] }}" alt="" class="w-100 pt-4 pt-sm-0">
            </div>
        </div>


    </div>
@endif

<style>
    button.book-now {
        background-color: #2B59C3;
        border: none;
        cursor: pointer;
        font-size: 14px;
        border-radius: 8px;
    }

</style> --}}
