@php

$posts_service = array_reverse(
    get_posts([
        'numberposts' => -1,
        'post_type' => 'service',
    ]),
);

$firstload = false;
if (!isset($_COOKIE['iwashere']) && !is_user_logged_in()) {
    $firstload = true;
}

@endphp

<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <i role="button" class="fas fa-angle-left fa-2x scroll-service-list-left"></i>
        </div>

        <div class="col-10">
            <div class="row scroll-service-list px-2 flex-nowrap overflow-auto">
                @foreach ($posts_service as $service)
                    @php
                        $_service = strtolower($service->post_title);
                        $_service = preg_replace('/[^a-z0-9_\s-]/', '', $_service);
                        $_service = preg_replace('/[\s-]+/', ' ', $_service);
                        $_service = preg_replace('/[\s_]/', '-', $_service);
                        
                    @endphp

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 px-2">
                        <div id="{{ $_service }}" service-key="service_{{ $service->ID }}"
                            class="card d-flex align-items-center justify-content-center ">
                            <img src="{{ get_field('service_icon', $service->ID) }}" width="70" class="my-3">
                            @php
                                $service_name = trim(explode('-', $service->post_title)[0]);
                            @endphp
                            <strong>{{ $service_name }}</strong>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-1 d-flex align-items-center justify-content-center">
            <i role="button" class="fas fa-angle-right fa-2x scroll-service-list-right"></i>
        </div>
    </div>
</div>

@if ($firstload)
    <script>
        debugger;
        document.querySelector('.scroll-service-list').style.display = 'none';

        if (history.length > 3) {

            setTimeout(() => {
                document.querySelector('.scroll-service-list').style.display = 'flex';
            }, 6000);

        }
    </script>
@endif

<script>
    defer('jquery', function() {
        let list_card = $('.scroll-service-list .card');
        var default_view = ($(document).width() >= 576) ? 4 : 1;
        var default_preview = 0;


        $('.scroll-service-list-left').on('click', function() {
            debugger;
            $(list_card).each(function(index, element) {

                if ($(element).hasClass('current_start')) {
                    let tag = $(list_card)[index - 1];

                    if (tag != undefined) {
                        $(element).removeClass('current_start');
                        $(tag).addClass('current_start');
                        default_preview--;
                        review_scroll_action();
                        return false;
                    }

                }
            });
        });

        $('.scroll-service-list-right').on('click', function() {
            debugger;
            $(list_card).each(function(index, element) {

                if ($(element).hasClass('current_start')) {
                    let tag = $(list_card)[index + 1];

                    if (tag != undefined) {
                        $(element).removeClass('current_start');
                        $(tag).addClass('current_start');
                        default_preview++;
                        review_scroll_action();
                        return false;
                    }

                }
            });
        });

        function review_scroll_action() {

            let scroll_page_length = $('.scroll-service-list').width() / default_view;
            $('.scroll-service-list').animate({
                scrollLeft: scroll_page_length * default_preview
            }, 100);
        }
    });
</script>
