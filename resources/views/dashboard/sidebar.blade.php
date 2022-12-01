@php
$menu_id = 21;
$sidebar_menu = wp_get_nav_menu_items($menu_id);
$dashboard_sidebar = [];

foreach ($sidebar_menu as $menu) {
    if ($menu->menu_item_parent) {
        $dashboard_sidebar[$menu->menu_item_parent]->child_items[] = $menu;
    }
    if (!$menu->menu_item_parent) {
        $dashboard_sidebar[$menu->db_id] = $menu;
        $dashboard_sidebar[$menu->db_id]->child_items = [];
    }
}

$pages = get_posts(['numberposts' => -1, 'post_type' => 'page', 'post_status' => 'publish']);
@endphp

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion h-auto" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ home_url() }}">
        <div class="sidebar-brand-icon">
            {{-- <div class="sidebar-brand-icon rotate-n-15"> --}}
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <svg width="45" height="45" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg"
                stroke="#fff">
                <path
                    d="M22.5 46C34.9264 46 45 35.7025 45 23C45 10.2975 34.9264 0 22.5 0C10.0736 0 0 10.2975 0 23C0 35.7025 10.0736 46 22.5 46Z"
                    fill="#2B59C3" />
                <path
                    d="M23.3025 11.1374C22.9205 10.7883 22.3353 10.7884 21.9534 11.1374L11.8206 20.3965C11.4837 20.7044 11.7015 21.2656 12.1579 21.2656H13.7996V31.0671H31.4564V21.2656H33.0981C33.5545 21.2656 33.7723 20.7044 33.4354 20.3965L23.3025 11.1374ZM25.8868 28.7259C25.8284 28.7259 25.7699 28.7239 25.712 28.7216C24.4501 28.6696 23.3367 28.0589 22.6269 27.1363C22.1195 26.4756 21.8183 25.6556 21.8183 24.7674C21.8183 22.6382 23.5467 20.9022 25.712 20.813C25.6538 20.8105 25.5952 20.8088 25.5369 20.8088C23.2901 20.8088 21.4684 22.581 21.4684 24.7674C21.4684 25.7534 21.84 26.6543 22.453 27.3476C21.7071 28.1912 20.6021 28.7259 19.3686 28.7259C17.122 28.7259 15.3 26.9536 15.3 24.7674C15.3 22.8532 16.6966 21.2564 18.5524 20.8885C19.0736 19.2875 20.6128 18.1271 22.4308 18.1271C24.226 18.1271 25.7482 19.2586 26.2885 20.8283C28.3474 21.0242 29.9555 22.713 29.9555 24.7674C29.9557 26.9536 28.1343 28.7259 25.8868 28.7259Z"
                    fill="url(#paint0_linear_3_2)" />
                <defs>
                    <linearGradient id="paint0_linear_3_2" x1="27.0386" y1="14.5279" x2="33.5594" y2="57.3295"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="white" stop-opacity="0.94" />
                        <stop offset="0.6896" stop-color="#FFEFD0" />
                    </linearGradient>
                </defs>
            </svg>

        </div>
        <div class="sidebar-brand-text mx-3">Sidepost</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    {{-- @foreach (array_reverse($pages) as $page)
        @if (get_page_template_slug($page->ID) == 'views/template-dashboard.blade.php')
            <li class="nav-item">
                <a class="nav-link" href="{{ get_permalink($page->ID) }}">
                    {!! get_field('sidebar_icon', $page->ID) !!}
                    <span>{{ $page->post_title }}</span></a>
            </li>
        @endif
    @endforeach --}}


    @foreach ($dashboard_sidebar as $menu)
        @if (!$menu->child_items)
            <li class="nav-item">
                <a class="nav-link" href="{{ $menu->url }}">
                    {!! get_field('sidebar_icon', $menu->object_id) !!}
                    <span>{{ $menu->title }}</span></a>
            </li>
        @endif

        @if ($menu->child_items)
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    {!! get_field('sidebar_icon', $menu->child_items[0]->object_id) !!}
                    <span>{{ $menu->title }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @foreach ($menu->child_items as $menu)
                            <a class="collapse-item px-0" href="{{ $menu->url }}">{{ $menu->title }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
        @endif
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->



<style>
    #accordionSidebar a:hover {
        color: #fff !important;
    }
</style>
