<div class="price-page">

    <div class="container-fluid pt-5 mb-5"
        style="background-color: #ffeecf;height: 470px;margin-bottom: 240px !important;">
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 text-center">
                <h1 class="mb-0">Domestic & Home</h1>
                <h1>Improvement Services Prices</h1>
                <p class="my-4">Flat rate prices | No lock in contracts | Lorem Ipsum</p>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        <div class="container price-image mt-4 px-2 col-9">
            <div class="d-flex justify-content-center px-md-5">
                <img src="{{ get_the_post_thumbnail_url(get_the_ID()) }}" alt="" loading="lazy">
            </div>
        </div>
    </div>

    <div class="container price-detail pt-3 pt-md-0 pb-0 pb-md-5">
        <div class="text-center mt-3">
            <h2 class="mt-5 mb-4">Click on your service below to view its detailed price list</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Present semper
                tristique
                auctor. Donec
                facilisis elit mi. Proin ultricies rhoncus auctor. Vivamus blandit enim consectetur, placerat magna
                et,
                gravida lorem. In dignissim convallis diam u euismod.

            </p>
        </div>
    </div>


    {{-- @include('partials.scroll-service-list', ['custom_post_id' => 1039]) --}}

    @php
        
        $_seo = new _Seo();
        $posts = $_seo->get_all_location_pages([
            'include_locations' => true,
            'include_service_page' => true,
        ]);
        
        $services_locations = [];
        
        foreach ($posts as $_post) {
            if (isset($_post->service_page->ID)) {
                $service_name = get_post_meta($_post->service_page->ID, 'service_name', true);
                $services_locations[$service_name][] = $_post;
            }
        }
    @endphp

    @include('partials.scroll-service-list')

    {{-- @foreach ($services_locations as $service => $_services_location_pages)
        <div class="au-areas container-fluid text-center py-5">
            @include('partials.pricing-tables')
        </div>
        @endforeach --}}
    <div class="au-areas container-fluid text-center py-5">
        @include('partials.pricing-tables')
    </div>

    <script>
        $(document).ready(function() {



            setTimeout(function() {
                $(".scroll-service-list .card:first").click();
            }, 1000);

            $(".scroll-service-list .card").on('click', function() {
                debugger;
                let table_key = $(this).attr('service-key');

                $('.tables').addClass('d-none');

                if ($('[service-table-key=' + table_key + ']').length) {
                    $('[service-table-key=' + table_key + ']').removeClass('d-none');
                    $('.no-pricing-table').addClass('d-none');
                } else {
                    $('[service-table-key=' + table_key + ']').addClass('d-none');
                    $('.no-pricing-table').removeClass('d-none');
                }

                $(".scroll-service-list .card").removeClass('active');
                $(this).addClass('active');

            });

        });
    </script>

    @include('partials.cta.search-block-button')

    {{-- @include('partials.cta.reviews-logo') --}}


</div>

<link rel="stylesheet" href="/assets/dist/css/pages/main.css?v={{ time() }}">
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}">
<link rel="stylesheet" href="/assets/dist/css/pages/coverage.css?v={{ time() }}">


<style>
    .scroll-service-list .card {
        cursor: pointer;
    }

    .scroll-service-list .card:hover {
        background: #f8f8f8;
    }

    .scroll-service-list .card.active {
        background: #f8f8f8;
        border-top: 1px solid #2c5ac2 !important;
        border-left: 1px solid #2c5ac2 !important;
        border-right: 1px solid #2c5ac2 !important;
    }

</style>
