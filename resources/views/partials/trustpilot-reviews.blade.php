@php
$_reviews = new _Reviews();
$tp_reviews = $_reviews->get_tp_reviews();

// echo '<pre>';
// print_r( $tp_reviews );
// echo '</pre>';

@endphp

<div class="container-fluid trustpilot-reviews px-5 justify-content-center d-flex">
    <div class="col-10">
        <h2 class="text-center col-xl-8 mx-auto">
            Used by over 80,000 customers
        </h2>
        <p class="h5 text-center my-4">Check out what our customers have to say about our services.
        </p>
        <div class="row px-md-5 py-4" style="border: 1px solid #80808047;">
            <div class="col-md-3 pb-4 pb-md-0 text-center align-items-center justify-content-center">
                <h5>Excellent</h5>
                <p class="star-block-review mx-2 mt-2">
                    @include('partials.svgs.trustpilot-svg-stars')
                </p>

                <p class="mb-0 mb-md-2 mt-0">Based on 2,610 reviews</p>
                <i class="fa-solid fa-star"></i> <span>Trustpilot</span>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center">
                <i role="button" class="fas fa-angle-left scroll-service-list-left"></i>
            </div>
            <div class="col col-lg-7">
                <div class="row scroll-service-list px-2 flex-nowrap overflow-auto">
                    @foreach ($tp_reviews as $review)
                        @php
                            // timeago($review->customer_review_date);
                        @endphp
                        <div class="col-12 col-md-6 my-2 px-2 star-block-review-updated">
                            <span>
                                @include('partials.svgs.trustpilot-svg-stars', [
                                    'rate' => $review->customer_review_rate,
                                    'width' => 100,
                                ])
                            </span>
                            <div class="updated-date">{{ $review->customer_review_date }}</div>
                            <div class="updated-header">Very positive experience</div>
                            <div class="updated-text">{{ stripslashes($review->customer_review_content) }}</div>
                            <div class="updated-name">{{ $review->customer_avatar }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center">
                <i role="button" class="fas fa-angle-right scroll-service-list-right"></i>
            </div>
        </div>
    </div>
</div>

<script>
    defer('jquery', function() {

        var pane_review_viewed = 2;
        $(window).on("load resize orientationchange", function(event) {
            if ($(window).width() < 768) {
                pane_review_viewed = 1;
            }
        });


        var panel_reviews_active = 0;
        var panel_reviews_width = $('.scroll-service-list').width() / 2;
        var panel_reviews_content = $('.star-block-review-updated').length;


        $('.scroll-service-list-left').on('click', function() {
            console.log(panel_reviews_active);
            if (panel_reviews_active > 0) {
                panel_reviews_active--;
            }
            $('.scroll-service-list').animate({
                scrollLeft: panel_reviews_active * panel_reviews_width
            }, 100);
        });
        $('.scroll-service-list-right').on('click', function() {
            console.log(panel_reviews_active);
            if (panel_reviews_active < (panel_reviews_content - pane_review_viewed)) {
                panel_reviews_active++;
            }
            $('.scroll-service-list').animate({
                scrollLeft: panel_reviews_active * panel_reviews_width
            }, 100);
        });

    });


    $('.updated-date').each(function(index, date) {
        let date_value = $(date).text();
        let date_formatted = moment(date_value).format('MMM D, YYYY')
        let days_ago = moment(date_value).fromNow();
        let days = days_ago.replace(' days ago', '');

        if (days_ago.includes('hours ago') || days_ago.includes('a day ago')) {
            days = 0;
        }
        if (days < 7) {
            $(date).text(days_ago);
        } else {
            $(date).text(date_formatted);
        }
        // $(date).text(days_ago);
    });
</script>

<style>
    .star-block-review i {
        padding: 4px;
        color: #fff;
    }

    .star-block-review .full-star {
        background: teal;
    }

    .trustpilot-reviews i.fa-solid.fa-star {
        color: teal;
    }



    .star-block-review .half-star {
        background: linear-gradient(90deg, teal, lightgray 70%);
    }

    .trustpilot-reviews i.fas.fa-angle-left,
    .trustpilot-reviews i.fas.fa-angle-right {
        font-size: 18px;
    }

    .star-block-review-updated {
        font-size: 8px;
    }

    .star-block-review-updated i {
        padding: 4px;
        color: #fff;
    }

    .star-block-review-updated .full-star {
        background: teal;
    }

    .updated-date {
        color: rgba(0, 0, 0, 0.6);
        position: absolute;
        right: 30px;
        top: -1px;
        font-size: 12px;
    }

    .star-block-review-updated .updated-header {
        font-size: 16px;
        font-weight: 700;
        height: 16px;
        margin: 10px 0 6px;

        text-overflow: ellipsis;

        width: 100%;
    }

    .star-block-review-updated .updated-text {
        font-size: 15px;
        line-height: 16px;
        margin: 14px 0 8px;
        max-height: 32px;
        overflow: hidden;
        text-overflow: ellipsis;
        word-wrap: break-word;
    }

    .star-block-review-updated .updated-name {
        height: 14px;
        left: 20px;
        text-align: left;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: calc(100% - 20px);
        z-index: 2;
        font-size: 12px;
    }

    @media screen and (max-width: 992px) {
        .updated-date {
            right: 16px;
        }

        .star-block-review i {
            font-size: 15px;
        }

        .trustpilot-reviews i.fas.fa-angle-left,
        .trustpilot-reviews i.fas.fa-angle-right {
            top: -26px;
        }
    }

    @media screen and (max-width: 576px) {
        .star-block-review-updated i {
            font-size: 10px !important;
        }

        .trustpilot-reviews i.fas.fa-angle-left,
        .trustpilot-reviews i.fas.fa-angle-right {
            top: -2px;
        }
    }
</style>
