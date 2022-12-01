@include('partials.redirection')

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('metas')
    <link rel="shortcut icon" href="{{ get_field('website_favicon', 1400) }}" type="image/x-icon">
    @if ($_SERVER['HTTP_HOST'] == 'sidepost.com.au')
        @include('partials.imports')
    @endif

    @php wp_head() @endphp

    @yield('assets')

    @yield('breadcrumbs-schema')

</head>

<script>
    function home_url(request_uri) {
        let _link = "{{ home_url() }}";
        if (request_uri) {
            return _link + "/" + request_uri;
        }
        return _link;
    }

    function load_bound_links() {
        debugger;
        var xmlHttp = null;
        var allLinks = [];

        function httpGet(theUrl) {
            xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", theUrl, true);
            xmlHttp.send(null);
            xmlHttp.onreadystatechange = ProcessRequest;
        }

        function ProcessRequest() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                var container = document.createElement("p");
                container.innerHTML = xmlHttp.responseText;
                var anchors = container.getElementsByTagName("a");

                for (var i = 0; i < anchors.length; i++) {
                    var href = anchors[i].href;
                    var exists = 0;

                    for (var j = 0; j < allLinks.length; j++) {
                        if (allLinks[j] == href) {
                            exists = 1;
                        }
                    }


                    if (
                        exists == 0 && href.includes(home_url()) &&
                        !href.includes(home_url('wp-')) &&
                        !href.includes('#wp-toolbar') &&
                        href.charAt(href.length - 1) != '#'
                    ) {
                        allLinks.push(href);
                    }
                }

                let inbound = '';
                if (document.referrer) {
                    inbound = document.referrer;
                }

                $.ajax({
                    type: "post",
                    url: home_url('api/index.php/_seo/cache_bound_links'),
                    data: {
                        "link": window.location.href,
                        "inbound": inbound,
                        "outbound": allLinks
                    },
                    success: function(response) {}
                });
            }
        }

        httpGet(window.location.href);
    }

    function defer(resource, method) {

        if (resource == "google") {


            google_interval = setInterval(function() {
                console.log("google: checking libraries..");

                if (typeof(window.google) !== 'undefined') {
                    clearInterval(google_interval);
                    method();
                }
            }, 100);


        } else if (resource == "jquery") {
            // load_bound_links();

            var _jquery_interval = setInterval(function() {
                console.log("jquery: checking libraries..");
                if (window.jQuery !== undefined) {

                    clearInterval(_jquery_interval);
                    method();
                }
            }, 100);

        } else if (resource == "jquery-google") {



            var _jquery_google_interval = setInterval(function() {

                console.log("jquery-google: checking libraries..");
                if (window.jQuery !== undefined && typeof(window.google) !== undefined) {

                    clearInterval(_jquery_google_interval);
                    method();
                }
            }, 100);


        } else if (resource == "wait-3-sec") {


            setTimeout(function() {
                method();
            }, 3000);



        }
    }
</script>
