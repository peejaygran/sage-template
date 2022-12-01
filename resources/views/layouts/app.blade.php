<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')

<body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')

    <div class="wrap container-fluid px-0" role="document">
        <div class="content">
            <main class="main">
                @yield('content')
            </main>
            @if (App\display_sidebar())
                <aside class="sidebar">
                    @include('partials.sidebar')
                </aside>
            @endif
        </div>
    </div>

    @php do_action('get_footer') @endphp
    @include('partials.footer')


    @if (is_current_user('administrator'))
        @php wp_footer() @endphp
    @endif

</body>

</html>
