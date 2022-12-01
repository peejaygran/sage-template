@if (!is_current_user('owner') && !is_current_user('administrator'))
    @include('not-allowed');
@endif

@php
if (isset($_GET['page'])) {
    $pages = get_posts(['numberposts' => -1, 'post_type' => 'page', 'post_status' => 'publish']);
    foreach ($pages as $key => $page) {
        if (get_page_template_slug($page->ID) == 'views/template-dashboard.blade.php') {
            if (strpos(strtolower($page->post_title), strtolower($_GET['page'])) !== false) {
                header('Location: ' . get_permalink($page->ID));
                die();
            }
        }
    }
}
@endphp

<!doctype html>
<html {!! get_language_attributes() !!}>

@include('partials.head')

<body id="page-top" @php body_class() @endphp>

    {{-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}
    {{-- <link href="{{ home_url('dashboard-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{home_url('_assets/plugins/fontawesome-free/css/all.css')}}"> --}}
    <link href="{{ home_url('dashboard-assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @include('dashboard.parts')
    <script src="{{ home_url('dashboard-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ home_url('dashboard-assets/js/sb-admin-2.min.js') }}"></script>

    @if (is_current_user('administrator'))
        @php
            wp_footer();
            // show_admin_bar(false);
        @endphp
    @endif

</body>

</html>
