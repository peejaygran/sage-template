<div class="row blog-banner flex-column align-items-center justify-content-center pb-5 mb-5">

    <h1>{!! get_the_title() !!}</h1>

    @include('partials.content-page')

</div>

<div class="row menu-banner pb-4">
    <div class="col-md-8 mx-auto">
        @include('partials.cta.search-button')
    </div>

    <div class="container-fluid mb-2">

        <div class="row flex-md-nowrap justify-content-center text-center">
            @php
                $_categories = get_categories();
                $priority_menu = [18, 17, 5, 7];
            @endphp

            @foreach (array_reverse($_categories) as $key => $_category)
                @if (in_array($_category->term_id, $priority_menu))
                    <a class="text-light col-md-2 my-2 m-md-0"
                        href="{{ site_url() }}/advice/{{ $_category->slug }}/">{!! $_category->name !!}</a>
                @endif
            @endforeach
            {{-- <a class="text-light col-4" href="#">More</a> --}}
            <div class="col-md-2 dropdown my-2 m-md-0">
                <a class="text-light dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    More
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        @foreach ($_categories as $key => $_category)
                            @if (!in_array($_category->term_id, $priority_menu))
                                <a class="dropdown-item"
                                    href="{{ site_url() }}/advice/{{ $_category->slug }}/">{!! $_category->name !!}</a>
                            @endif
                        @endforeach
                    </div>
            </div>
        </div>

        {{-- <div class="scrollmenu mx-4">

            @php $_categories = array_reverse(get_categories()); @endphp

            @foreach ($_categories as $key => $_category)
                @php
                    $priority_menu = [18, 17, 5, 7];
                @endphp

                @if (in_array($_category->term_id, $priority_menu))
                    <a class="text-light"
                        href="{{ site_url() }}/advice/{{ $_category->slug }}">{!! $_category->name !!}</a>
                @endif
            @endforeach

            <a class="text-light" href="#">More</a>

            <div class="lSAction">
                <a class="lSPrev"><i class="fa fa-less-than"></i></a>
                <a class="lSNext"><i class="fa fa-greater-than"></i></a>
            </div>
        </div> --}}

    </div>

</div>

<style>
    .lSAction a:hover {
        color: #c4c4c4 !important;
    }

</style>


<script>
    var active_default = $('.scrollmenu a')[0];
    $(active_default).addClass('start');

    $('.lSAction a').on('click', function() {
        if ($(this).hasClass('lSPrev')) {
            if ($('.scrollmenu a.start').prev().length) {
                let tag = $('.scrollmenu a.start').prev();
                let tagname = tag[0].nodeName;
                if (tagname.toLowerCase() == "a") {
                    $('.scrollmenu a.start').removeClass('start');
                    $(tag).addClass('start');
                    do_scroll();
                }
            }
        }

        if ($(this).hasClass('lSNext')) {
            if ($('.scrollmenu a.start').next().length) {
                let tag = $('.scrollmenu a.start').next();
                let tagname = tag[0].nodeName;
                if (tagname.toLowerCase() == "a") {
                    $('.scrollmenu a.start').removeClass('start');
                    $(tag).addClass('start');
                    do_scroll();
                }
            }
        }

    });

    function do_scroll() {
        var scroll_length = 0;
        $('.scrollmenu a').each(function(index, element) {
            if ($(element).hasClass('start')) {
                return false;
            }
            scroll_length += $(element).outerWidth();
        });

        $('.scrollmenu').animate({
            scrollLeft: scroll_length
        }, 100);
    }
</script>
