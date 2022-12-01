<div class="container-fluid coverage px-0">

    <section class="pt-4 pt-md-7">
        <h1 class="text-center col-md-7 col-xl-9 mx-auto mb-4">
            Discover Sidepost Home Services Coverage Across Australia
        </h1>
        <p class="h5 font-weight-normal text-center px-5 px-sm-2 pb-5">
            Wondering if Sidepost is available near you? Simply enter your postcode below to check prices and
            avilability for your area.
        </p>


        <div class="container coverage-banner mt-5">
            <div class="col-md-8 mx-auto">
                @include('partials.cta.search-button')
            </div>
            <div class="d-flex justify-content-center pb-3">
                <img src="{{ wp_get_attachment_url(1264) }}" class="banner-image">
            </div>
        </div>

    </section>

    @include('partials.cta.reviews-logo')

    <section class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-md-9">
                <h2 class="text-center pb-3">Find Cleaning, Painting, Fencing and more services in your area</h2>
                <p class="mb-0">Sidepost's home service company covers a wide range of services to help keep
                    your home
                    or vehicle spick and span. There's no job too big or complex for our team, from car detailing and
                    car washing to house cleaning and house painting. Simply select the services you need, and we'll
                    dispatch our nearest top-rated contractors or cleaners right to your doorstep - it's that easy!

                    We also operate in all major Australian cities and suburbs, so whether you're in the bustling
                    metropolis of Sydney or the more relaxed setting of Brisbane, Sidepost can help you find the
                    services you need.

                </p>

                <div class="book-now justify-content-center d-flex pt-5">
                    <button type="button" class="px-5 py-3 btn text-white ml-md-1" data-toggle="modal"
                        data-target="#booknow-coverage">Book Now</button>
                </div>

            </div>

        </div>
    </section>

    @include('partials.scroll-service-list', ['custom_post_id' => 1039])

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

    @foreach ($services_locations as $service => $_services_location_pages)
        <div service-name="{{ strtolower($service) }}" class="au-areas d-none container-fluid text-center py-5">
            {{-- <h2 class="mb-4">Areas we work in</h2> --}}
            <h2 class="coverage_service_title mb-4" style="text-transform:capitalize;">Coverage Areas</h2>
            <div class="row">

                @php
                    
                    $location_pages = [];
                    foreach ($_services_location_pages as $_page) {
                        $location = get_post_meta($_page->ID, 'location_location', true);
                    
                        if (!isset($location_pages[$location])) {
                            $location_pages[$location] = $_page->ID;
                        }
                    }
                    ksort($location_pages);
                    // echo '<pre>';
                    // print_r($location_pages);
                    // echo '</pre>';
                    $sorted_location_pages = [];
                    foreach ($location_pages as $key => $location_page) {
                        $sorted_location_pages[] = [
                            'ID' => $location_page,
                            'location' => $key,
                        ];
                    }
                    $location_pages = array_chunk($sorted_location_pages, ceil(count($location_pages) / 3));
                    
                @endphp

                @for ($j = 0; $j < count($location_pages[0]); $j++)
                    @for ($i = 0; $i < count($location_pages); $i++)
                        @if (isset($location_pages[$i][$j]))
                            <a href="{{ get_permalink($location_pages[$i][$j]['ID']) }}"
                                class="col-sm-6 col-md-4 mb-3">
                                {{ $location_pages[$i][$j]['location'] }}
                            </a>
                        @else
                            <div class="cell-filler col-sm-6 col-md-4 mb-3"></div>
                        @endif
                    @endfor
                @endfor

            </div>
        </div>
    @endforeach

    @include('partials.cta.search-block-button')
</div>

<script>
    let service_hash = location.hash;

    $(document).ready(function() {

        setTimeout(function() {
            $(".scroll-service-list .card:first").click();
            if (service_hash) {
                $(service_hash).click();
                let scroll_page_length = $('.scroll-service-list').width() / default_view;
                $('.scroll-service-list').animate({
                    scrollLeft: scroll_page_length * $(service_hash).attr('service-key')
                }, 100);
            }
        }, 1000);

        $(".scroll-service-list .card").on("click", function() {

            debugger;
            $(".scroll-service-list .card").removeClass("active");
            $(".au-areas").addClass("d-none");

            $(this).addClass("active");
            $(this).addClass("current_start");
            var service_name = $(this).find("strong").text().toLowerCase();
            $('.coverage_service_title').text(service_name + ' Coverage Areas');
            var selector = 'div[service-name="' + service_name + '"]';
            $(selector).removeClass("d-none");
        })

    });
</script>

<style>
    @media screen and (max-width: 576px) {

        .coverage-banner img.banner-image {
            width: 90%;
        }
    }

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

@php
$_services = get_posts([
    'numberposts' => -1,
    'post_type' => 'service',
]);
@endphp
<!-- Modal -->
<div class="modal fade mt-5" id="booknow-coverage" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="d-flex align-items-center justify-content-center search-button-row border rounded p-2">
                    <i class="fas fa-search"></i>
                    <input type="text" name="postcode" placeholder="Enter your Postcode"
                        class="form-control border-0 mb-lg-0 my-2 my-sm-0" required="">
                    <span class="d-none searchbox-input-error text-danger">Required postcode.</span>

                </div>

                <p class="h5 mt-4">Choose a service:
                    <span class="d-none searchbox-service-error text-danger">Required one service.</span>
                </p>

                <div class="container-fluid overflow-auto" style="height: 300px !important">
                    <div class="row overflow-auto">
                        @foreach ($_services as $service)
                            @php
                                $service_banner = get_field('services_banner', $service->ID);
                                $service_quote_url = $service_banner['get_a_quote_url']['url'];
                            @endphp
                            <div class="col-4 p-1">
                                <div class="card booknow-card h-100" form_url="{{ $service_quote_url }}">
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ get_field('service_icon', $service->ID) ?: '' }}" alt="">
                                        <p class="text-center m-0">
                                            <a href="#"> {{ $service->post_title }} </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    $('.booknow-card').each(function(index, service) {
        $(service).on('click', function(e) {
            e.preventDefault();
            $('.booknow-card').each(function(index, _service) {
                $(_service).removeClass('active bg-lightgray');
            });

            $(service).addClass('active bg-lightgray');

            debugger;
            let postcode = false;

            if ($('#booknow-coverage input').val()) {

                debugger;
                postcode = $('#booknow-coverage input').val();

                $('.searchbox-input-error').addClass('d-none');
                if ($('#booknow-coverage .booknow-card.active').length) {

                    let form_url = $('#booknow-coverage .booknow-card.active').attr('form_url');

                    window.location.href = form_url + '?postcode=' + postcode;

                } else {
                    $('.searchbox-service-error').removeClass('d-none');
                }

            } else {
                $('.searchbox-input-error').removeClass('d-none');
            }
        });
    });
</script>
