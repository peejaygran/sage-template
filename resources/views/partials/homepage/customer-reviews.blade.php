@php
$customer_reviews = [];

$customer_reviews = get_field('customer_reviews');

if (isset($post_id)) {
    $customer_reviews = get_field('customer_reviews', $post_id);
}

if (isset($custom_post_id)) {
    $customer_reviews = get_field('customer_reviews', $custom_post_id);
}

$firstload = false;
if (!isset($_COOKIE['iwashere']) && !is_user_logged_in()) {
    $firstload = true;
}

@endphp


@if ($customer_reviews)
    <div class="customer_reviews_block container mb-140">
        <div class="paginated-customer-reviews px-3">

            <div class="row align-items-center justify-content-center justify-content-md-between mb-5 px-3 text-center">

                <div class="quotation-icon">
                    <i class="fas fa-quote-left text-light"></i>
                </div>

                <h2>Read what our customers have to say about our work </h2>

                <div class="review-pagination d-none d-md-block">
                    <i role="button" class="prev fas fa-arrow-left fa-2x mx-2 text-muted-arrow"></i>
                    <i role="button" class="next fas fa-arrow-right fa-2x mx-2"></i>
                </div>

            </div>

            <div class="row reviews flex-nowrap overflow-hidden mx-3 mx-sm-5">

                @foreach ($customer_reviews as $review)
                    <div class="review-wrapper col-auto col-sm-6 d-flex flex-column">

                        <div class="review-content">
                            <h4>{{ $review['reviews']['review_conclusion'] }}</h4>
                            <p>
                                {{ $review['reviews']['review_content'] }}
                            </p>
                        </div>

                        @if ($review['reviews']['customer_name'])
                            <div class="container-fluid">
                                <div class="row customer">
                                    <div
                                        class="col-sm-3 col-md-2 p-0 pl-sm-3 d-flex justify-content-center pb-2 pb-sm-0">
                                        <div class="border rounded-circle p-4 d-flex align-items-center justify-content-center"
                                            style="max-width: 50px;max-height: 50px;">
                                            <p class="m-0"> {{ $review['reviews']['customer_name'][0] }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-md-10 text-center text-sm-left">
                                        <p class="name font-weight-bold h5">{{ $review['reviews']['customer_name'] }}
                                        </p>
                                        <p class="client">
                                            {{ isset($review['reviews']['customer_location']) ? $review['reviews']['customer_location'] : '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach


            </div>

            <div class="review-pagination d-md-none d-flex justify-content-center">
                <i role="button" class="prev fas fa-arrow-left fa-2x mx-2 text-muted-arrow"></i>
                <i role="button" class="next fas fa-arrow-right fa-2x mx-2"></i>
            </div>
        </div>
    </div>
@endif

@if ($firstload)
    <script>
        document.querySelector('.customer_reviews_block').style.display = 'none';

        if (history.length > 3) {

            setTimeout(() => {
                document.querySelector('.customer_reviews_block').style.display = 'block';
            }, 6000);

        }
    </script>
@endif


<script>
    defer('jquery', function() {
        var default_view = 2;
        $(window).on('scroll', function() {
            default_view = ($(window).width() < 576) ? 1 : 2;
        });
        var default_preview = 0;

        function prev_muting() {
            if (default_preview <= 0) {
                $('.review-pagination .prev').addClass('text-muted-arrow');
            }
            if (default_preview > 0) {
                $('.review-pagination .prev').removeClass('text-muted-arrow');
            }

            if (default_preview > $('.review-wrapper').length - 3) {
                $('.review-pagination .next').addClass('text-muted-arrow');
            }
            if (default_preview <= $('.review-wrapper').length - 3) {
                $('.review-pagination .next').removeClass('text-muted-arrow');
            }
            review_scroll_action();
        }

        $('.review-pagination .prev').on('click', function() {
            if (default_preview > 0) {
                default_preview--;
            }
            prev_muting();
        });

        $('.review-pagination .next').on('click', function() {
            if (default_preview <= $('.review-wrapper').length - 3) {
                default_preview++;
            }
            prev_muting();
        });

        function review_scroll_action() {
            let scroll_page_length = $('.reviews').width() / default_view;
            $('.reviews').animate({
                scrollLeft: scroll_page_length * default_preview
            }, 100);
        }

        $(window).on('resize orientationchange', function() {
            review_scroll_action();
        });
    });
</script>
