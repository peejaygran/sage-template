<div class="faq">
    <div class="faq-banner container mt-5">
        <div class="row">

            <div class="col-8">
                <h1>Frequently Asked Questions</h1>
            </div>

            <div class="col-4">
                <form class="faq-search-form" action="">
                    <div class="form-group search-animate">
                        <input type="search" class="faq-search-box form-control" name="" id="" placeholder="">
                        <span class="text-muted">Search</span>
                        <button type="submit" class="faq-search-btn btn btn-wp-orange py-1">
                            <i class="fas fa-search    "></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="faq-body container">
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-md-6">
                    @include('partials.faq.faq-list')
                </div>

                <div class="col-md-6">
                    <img src="https://img.freepik.com/free-vector/faqs-concept-illustration_114360-5245.jpg?size=626&ext=jpg"
                        alt="" width="100%">
                </div>
            </div>
        </div>
    </div>

</div>


@include('partials.cta.three-steps')





<style>
    .search-animate {
        position: relative;
    }

    .search-animate input {
        padding-right: 2rem;
        border: none;
        border-bottom: 1px solid;
        border-radius: 0;
    }

    .search-animate button {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .search-animate span {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0.5rem;
        transition: all 200ms;
    }

</style>

<script>
    $(".search-animate input").blur(function() {
        if (!$(this).val()) {
            $(".search-animate span").css({
                "top": "50%",
                "font-size": "16px"
            });
        }
    });

    $(".search-animate input").focus(function() {
        $(".search-animate span").css({
            "position": "absolute",
            "top": 0,
            "font-size": "80%"

        })
    });

    $('.faq-search-form').on('submit', function(e) {
        e.preventDefault();

        if ($('.faq-search-box').val() == '') {
            return false;
        }

        let search_ctr = 0;
        $('.faq-accordion .accordion-content p').each(function(index, element) {
            // debugger;
            if ($(element).text().includes($('.faq-search-box').val())) {
                $(element).parent().siblings('.accordion-button').click();
                search_ctr++;
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(element).offset().top - 200
                }, 500);
                return false;
            }
            let title = $(element).parent().siblings('.accordion-button').children('.accordion-title')
                .text();
            if (title.includes($('.faq-search-box').val())) {
                $(element).parent().siblings('.accordion-button').click();
                search_ctr++;
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(element).offset().top - 200
                }, 500);
                return false;
            }
        });

        if (!search_ctr) {
            toastr.error('No search found');
        }
    });
</script>
