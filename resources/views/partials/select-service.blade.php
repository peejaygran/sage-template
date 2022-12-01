@php
$postcode = isset($_GET['postcode']) ? '?postcode=' . $_GET['postcode'] : '';
@endphp
<div class="container my-5">

    <p class="h2 text-center">Book a service for your home today</p>
    <p class="text-center">get a no obligation quote</p>

    @php
        $services = get_posts([
            'numberposts' => -1,
            'post_type' => 'service',
        ]);
    @endphp

    <div class="container my-5">
        <div class="custom-suggest border rounded p-2">
            <div class="d-flex align-items-center">
                <i class="fas fa-search m-2"></i>
                <input type="search" class="suggested-fields form-control border-0 shadow-none"
                    placeholder="What do you want help with?">
            </div>
            <ul class="suggested-items list-unstyled overflow-auto border-top d-none" style="max-height: 198px">
                @foreach ($services as $service)
                    @php
                        $banner = get_field('services_banner', $service->ID);
                        $quotes = $banner['get_a_quote_url'];
                    @endphp
                    <a href="{{ $quotes['url'] . $postcode }}">
                        <li class="px-2 px-md-5 py-2">{{ $service->post_title }}</li>
                    </a>
                @endforeach

                <li class="no-searched text-center text-muted d-none px-2 px-md-5 py-2">No Result Found</li>
            </ul>
        </div>
    </div>

    <p class="text-center mt-3">- popular services -</p>


    <div class="col-md-10 d-flex flex-wrap align-items-center justify-content-center mx-auto">
        @php
            $popular_services = get_field('popular_services');
        @endphp

        @foreach ($services as $service)
            @if (in_array($service->ID, $popular_services))
                @php
                    $banner = get_field('services_banner', $service->ID);
                    $quotes = $banner['get_a_quote_url'];
                @endphp

                <a href="{{ $quotes['url'] . $postcode }}" class="pillbox-suggest">
                    <img src="{{ get_field('service_icon', $service->ID) }}" alt="{{ $service->post_title }} Image"
                        width="30" height="30" class="d-none d-md-inline-block mr-2">
                    {{ $service->post_title }}
                </a>
            @endif
        @endforeach

    </div>

</div>

<style>
    .pillbox-suggest {
        color: #394e66;
        background: #f0f3f7;
        border-radius: 20px;
        margin: 4px;
        padding: 10px 14px;
        font-size: 14px;
        cursor: pointer;
    }

    .custom-suggest .suggested-items li:hover {
        background: #c4c4c4;
    }
</style>

<script>
    defer('jquery', function() {

        $('.custom-suggest .suggested-fields').on('focus', function() {
            $('.custom-suggest .suggested-items').removeClass('d-none')
        });

        $('.custom-suggest .suggested-fields').on('keyup change', function() {
            let user_search = $(this).val();

            $('.custom-suggest .suggested-items a').removeClass('d-none');
            $('.custom-suggest .suggested-items a li').each(function(index, element) {
                let item = $(element).text();

                if (!item.toLowerCase().includes(user_search.toLowerCase())) {
                    $(this).parent().addClass('d-none');
                }
            });

            let search_count = 0;
            $('.custom-suggest .suggested-items li').each(function(index, element) {
                if ($(element).parent().hasClass('d-none')) {
                    search_count++;
                }
            });

            if (search_count >= $('.custom-suggest .suggested-items a').length) {
                $('.custom-suggest .no-searched').removeClass('d-none');
            } else {
                $('.custom-suggest .no-searched').addClass('d-none');
            }

        });

        $(document).click(function(event) {
            if (!$(event.target).parents('.custom-suggest').length) {
                $('.custom-suggest .suggested-items').addClass('d-none');
            }
        });
    });
</script>
