<div class="container full-width px-xl-5">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light pt-3">

        <a class="navbar-brand" href="{{ home_url() }}">
            <img src="{{ get_field('website_logo', 1400) }}" alt="" width="120">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        @php
            
            $menuLocations = get_nav_menu_locations();
            $id = $menuLocations['primary_navigation'];
            $primaryNav = wp_get_nav_menu_items($id);
            
            $primaryNav_children = [];
            foreach ($primaryNav as $key => $menu_item) {
                if ($menu_item->menu_item_parent) {
                    foreach ($primaryNav as $x => &$item) {
                        if ($menu_item->menu_item_parent == $item->ID) {
                            if (isset($item->menu_item_children)) {
                                $item->menu_item_children[] = $menu_item;
                            } else {
                                $item->menu_item_children = [$menu_item];
                            }
                        }
                    }
                }
            }
            
        @endphp
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">



                @foreach ($primaryNav as $_menu_item)
                    @if (!isset($_menu_item->menu_item_children) && !$_menu_item->menu_item_parent)
                        <li class="nav-item ">
                            <a class="nav-link" style="color: #343a40"
                                href="{{ $_menu_item->url && $_menu_item->url != '#' ? $_menu_item->url : get_permalink($_menu_item->ID) }}">
                                {{ $_menu_item->title ? $_menu_item->title : $_menu_item->post_title }}
                            </a>
                        </li>
                    @endif


                    @if (isset($_menu_item->menu_item_children))
                        <li class="nav-item  dropdown">

                            @if (!$_menu_item->menu_item_parent)
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    style="color: #343a40" data-toggle="dropdown" aria-expanded="false">
                                    {{ $_menu_item->title ? $_menu_item->title : $_menu_item->post_title }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @isset($_menu_item->menu_item_children)
                                        @foreach ($_menu_item->menu_item_children as $_item)
                                            <a class="dropdown-item"
                                                href="{{ $_item->url && $_menu_item->url != '#' ? $_item->url : get_permalink($_item->ID) }}">
                                                {{ $_item->title ? $_item->title : $_item->post_title }}
                                            </a>
                                        @endforeach
                                    @endisset
                                </div>
                            @endif
                        </li>
                    @endif
                @endforeach

            </ul>

            <form class="form-sm-inline navbar-nav">

                @if (!is_user_logged_in())
                    <a rel="nofollow" class="btn btn-sm py-2 service-partner rounded-1"
                        href="{{ home_url('login') }}">Become a Service Partner</a>
                @endif

                <a class="nav-link mx-xl-2 btn btn-sm btn-primary rounded-1 px-4 mb-2 mb-sm-0"
                    href='tel:{{ str_replace(' ', '', get_field('phone', 1400)) }}'>
                    <i class="fa fa-lg fa-phone"></i> {{ get_field('phone', 1400) }}
                </a>

                <a rel="nofollow" class="nav-link mx-xl-2 btn btn-sm btn-primary rounded-1 px-4 "
                    href="{{ home_url('select-service/') }}">
                    Book Now
                </a>


            </form>

        </div>


    </nav>

</div>

@if (is_user_logged_in())
    <script>
        defer('jquery', function() {
            $(window).on('scroll', function() {
                responsive_nav();
            });

            function responsive_nav() {
                $('nav.sticky-top').css('top', 0);

                if ($(window).innerWidth() > 583) {
                    $('nav.sticky-top').css('top', $('#wpadminbar').height());
                }
            }

        });

    </script>
@endif

<script>
    var url_params = new URLSearchParams(window.location.search);

</script>

@include('partials/core-web-vitals/first-visitor')

<style>
    form .login,
    form a.rounded-1 {
        font-size: 16px;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

</style>
