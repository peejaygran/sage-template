@php
$menu_id = 19;
$primaryNav = wp_get_nav_menu_items($menu_id);
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

<footer class="footer bg-light">
    <div class="container pt-5">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="row">

                    @include('partials.footer-columns')

                </div>

            </div>

            <div class="col-lg-3 mx-auto mt-2 mb-5 text-center text-lg-left">
                <a href="{{ home_url() }}" class="px-3">
                    <img src="{{ get_field('website_logo', 1400) }}" alt=" logo" class="logo my-3" loading="lazy"
                        width="140">
                </a>

                <div class="container-fluid d-flex flex-column">
                    <a href="{{ home_url('login/') }}" rel="nofollow"><button type="button"
                            class="btn col-sm-7 col-lg-10 my-2 mx-auto mx-lg-0">Become a Service Partner</button></a>
                    {{-- <a href="{{ home_url('select-service') }}" rel="nofollow"><button type="button"
                        class="btn col-sm-7 col-lg-10 my-2 mx-auto mx-lg-0">Booking Page</button></a>
                <a href="{{ home_url('') }}" rel="nofollow"><button type="button"
                        class="btn col-sm-7 col-lg-10 my-2 mx-auto mx-lg-0">Gift Cards</button></a> --}}
                </div>

                <p class="need-help">Need Help?</p>
                <div class="contact-details p-2" style="font-size: 16px;">
                    <p class="mb-0 mx-2"><a href="{{ home_url('contact-us/') }}">Contact Us</a></p>

                    @php
                        $phone = get_field('phone', 1400);
                        $email = get_field('email', 1400);
                    @endphp


                    <p class="mb-0">
                        <a href="tel:{{ str_replace(' ', '', $phone) }}">
                            <i class="fas fa-phone m-2"></i> {{ $phone }}
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ "mailto:$email" }}">
                            <i class="fas fa-envelope m-2"></i> {{ $email }}
                        </a>
                    </p>

                    <div class="accounts m-2 mt-3">

                        <a href="{{ get_field('social_media_links', 1400)['linkedin'] }}" rel="nofollow"
                            target="_blank">
                            <i class="fab fa-xl fa-linkedin mr-1"></i>
                        </a>

                        <a href="{{ get_field('social_media_links', 1400)['facebook'] }}" rel="nofollow"
                            target="_blank">
                            <i class="fab fa-xl fa-facebook-square mr-1"></i>
                        </a>

                        <a href="{{ get_field('social_media_links', 1400)['twitter'] }}" rel="nofollow"
                            target="_blank">
                            <i class="fab fa-xl fa-twitter-square mr-1"></i>
                        </a>

                        <a href="{{ get_field('social_media_links', 1400)['pinterest'] }}" rel="nofollow"
                            target="_blank">
                            <i class="fab fa-xl fa-pinterest-square mr-1"></i>
                        </a>

                    </div>


                </div>
            </div>

        </div>

        <div class="row justify-content-center p-5">
            <div class=" m-0">
                <span> {{ get_field('address', 1400) }} </span>
                <a href="#" class="mx-3">Sidepost © 2022</a>
                <a href="/privacy-policy/" rel="nofollow" class="mx-3">Privacy Policy</a>
                <a href="/terms-and-conditions/" rel="nofollow" class="mx-3">Terms and Conditions</a>
            </div>
        </div>
    </div>

</footer>

<style>
    .footer {
        font-family: 'Avenir';
        color: #183B56;
    }

    .footer a {
        color: #183B56;
        line-height: 2rem;
        text-decoration: none;
        font-size: 16px;
    }

    .footer button {
        color: #183B56;
        padding: 10px;
        border: 1px solid #183b56;
    }

    .footer p.need-help {
        font-size: 24px;
        font-weight: 800;
        margin: 18px;
    }

    .footer .contact-details a i {
        color: #2B59C3;
    }

    footer li {
        list-style: none;
    }

</style>
