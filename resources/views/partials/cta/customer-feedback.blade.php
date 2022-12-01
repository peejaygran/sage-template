@php
$customer_reviews = false;

$customer_reviews = get_field('customer_reviews');

if (isset($post_id)) {
    $customer_reviews = get_field('customer_reviews', $post_id);
}

if (isset($custom_post_id)) {
    $customer_reviews = get_field('customer_reviews', $custom_post_id);
}


@endphp

@if ($customer_reviews)
    
    @php
        $chosen_key = array_rand( $customer_reviews, 1);
        $review = $customer_reviews[$chosen_key];
    @endphp

    <div class="reviews container px-0 my-5">
        <div class="card p-4">
            <div class="row">
                <div class="col-2">
                    <div class="circle">
                        {{  substr($review['reviews']['customer_name'], 0,1) }}
                    </div>
                </div>
                <div class="col-10 px-4">

                    @if ($review['reviews']['review_conclusion'])
                        <h4>"{{ $review['reviews']['review_conclusion'] }}"</h4>
                    @endif
                    


                    <small>{{ $review['reviews']['review_content'] }}</small>
                    <p class="my-2">{{ $review['reviews']['customer_name']  }}, 
                        {{ isset($review['reviews']['customer_location']) ? $review['reviews']['customer_location'] : '' }}
                    </p>

                    <span class="star-block-review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

@endif

<style>
    .reviews .card {
    background-color: #f1f6fd;
    border: none !important;
    border-radius: 0% !important;
  }
  .reviews .star-block-review .fa-star {
    color: #2B59C3;
  }
  .reviews h4 {
    color: #2B59C3;
  }
</style>


<script>
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
</script>
