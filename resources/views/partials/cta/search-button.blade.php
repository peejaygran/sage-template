@php
if (get_post_type() == 'location') {
    $_areas = new _Areas();
    $locations = get_field('location');
    $result = $_areas->get_postcode_by_location($locations['location']);
}

@endphp

@if (get_post_type() == 'location')
    <form action="{{ isset($quote_url) ? $quote_url : home_url('get-a-quote') }}" method="get">
        <div class="container-fluid search-banner-form">
            <input type="hidden" name="postcode" id="postcode" value="{{ $result->postcode ?: '' }}">

            <button type="submit" class="btn btn-lg ml-lg-1 w-100 p-3 block-button">
                <span>Check Prices and Availability</span>
            </button>
        </div>
    </form>
@else
    <form action="{{ isset($quote_url) ? $quote_url : home_url('select-service') }}" method="get">
        <div class="container search-banner-form p-0">

            @if (isset($size) == '2_column')
                <div class="row search-button-row p-2 bg-white shadow-lg">

                    <div class="col-md-6 p-2" style="display: flex;align-items: center;">

                        <i class="fas fa-search"></i>

                        <input type="text" name="postcode" placeholder="Enter your postcode"
                            class="form-control mb-lg-0" style="border: none;" required>
                    </div>

                    <div class="col-md-6 d-flex px-0">
                        <button type="submit" class="btn btn-lg text-white ml-lg-1 w-100 p-3">

                            <span>Check Prices and Availability</span>

                        </button>
                    </div>

                </div>
            @else
                <div class="row search-button-row p-2 bg-white shadow-lg">

                    <div class="col-md-7" style="display: flex;align-items: center;">

                        <i class="fas fa-search"></i>
                        <input type="text" name="postcode" placeholder="Enter your postcode"
                            class="form-control mb-lg-0 my-2 my-sm-0" style="border: none;" required>
                    </div>

                    <div class="col-md-5 d-flex pl-lg-5 p-0">
                        <button type="submit" class="btn btn-lg text-white ml-lg-1 w-100 py-3"
                            style="padding-right: 0;padding-left: 0;">

                            <span>Check Prices and Availability</span>

                        </button>
                    </div>

                </div>
            @endif
        </div>
    </form>
@endif


<style>
    .search-banner-form button {
        background-color: #2b59c3;
        color: white;
    }

    .search-block-button button {
        background-color: white;
        color: #2b59c3;
    }

    .search-block-button button.block-button:hover {
        background-color: white !important;
        color: #2b59c3 !important;
    }


    .row.search-button-row {
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        border-radius: 8px;
    }

    .row.search-button-row button {
        font-size: 16px;
        background-color: #2B59C3;
    }
</style>
