@php

$hide_card = isset($hide) ? $hide : true;

$available_services = false;

if (isset($params['custom_post_id'])) {
    $custom_post_id = $params['custom_post_id'];
}

if (isset($custom_post_id)) {
    $available_services = get_field('static_services', $custom_post_id);
}

if (!isset($custom_post_id)) {
    $available_services = get_field('static_services');
}

@endphp
@if ($available_services)
    <div class="container top-rated-home-services mb-140">
        <p class="text-center">Whatever home service you require, Sidepost has it covered. We've got top-rated
            cleaners and contractors all across Australia, ready to help you get your home into tip-top shape.
        </p>

        <div class="row mx-2" toggle-data-action="accordion">

            @foreach ($available_services as $key => $_service)
                <div class="col-md-4 p-2">
                    <div class="card shadow h-100 service-card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="icon-wrapper-primary">
                                <img src="{{ wp_get_attachment_url($_service['service_icon']['ID']) }}" alt="">
                            </div>
                            <h2 class="text-center h4">
                                <a href="{{ $_service['service_page_url'] }}">{{ $_service['service_name'] }}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        @if ($hide_card)
            <div class="row justify-content-center">
                <p role="button" href="/" class="font-weight-bold text-primary mt-5 read-more" toggle-data="accordion">
                    See all services <i class="fas fa-angle-double-down d-block text-center"></i>
                </p>
            </div>
        @endif
    </div>
@endif

<style>
    .top-rated-home-services .card {
        border: none;
    }

    .service-card a {
        color: #183B56 !important;
    }

    .service-card a:hover {
        color: #2B59DB !important;
    }

    p.read-more,
        {
        color: #2B59C3 !important;
        font-weight: 500;
        font-size: 18px !important;
    }

</style>

@if ($hide_card)
    <script>
        defer('jquery', function() {
            var columns = $('.row[toggle-data-action="accordion"]').children();
            var accordion_viewAll = false;

            function hideAccordion(columns) {
                
                $(columns).each(function(index, element) {
                    if (index >= 6) {
                        $(element).addClass('d-none');
                    }
                });
                accordion_viewAll = false;
            }

            function showAccordion(columns) {
                
                $(columns).each(function(index, element) {
                    $(element).removeClass('d-none');
                });
                accordion_viewAll = true;
            }

            $(document).ready(function() {
                hideAccordion(columns);
            });

            $('p[role="button"][toggle-data="accordion"]').on('click', function() {
                
                if (accordion_viewAll) {
                    hideAccordion(columns);
                    $(this).html(
                        'See all services <i class="fas fa-angle-double-down d-block text-center mt-2"></i>'
                    );
                } else {
                    showAccordion(columns);
                    $(this).html(
                        '<i class="fas fa-angle-double-up d-block text-center mb-2"></i> Hide all services '
                    );
                }
            });
        });
    </script>
@endif
