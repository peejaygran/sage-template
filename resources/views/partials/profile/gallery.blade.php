<link rel="stylesheet" href="{{ home_url('assets/plugins/lightslider/src/css/lightslider.css') }}">
<script src="{{ home_url('assets/plugins/lightslider/src/js/lightslider.js') }}"></script>

@if (json_decode($company->rmv_gallery))
    <h4 class="font-weight-bold text-center mt-3">Gallery</h4>

    <div class="container-fluid profile-gallery">
        <div class="row">
            <div class="col item">
                <ul id="content-slider" class="content-slider d-flex align-items-center" style="max-height:300px">
                    @foreach (json_decode($company->rmv_gallery) as $image_id)
                        @php $image_link = json_decode(file_get_contents('https://whatremovals.co.uk/dashboard/welcome/get_img_link/'.$image_id.'?s=thumbnail')) @endphp
                        @if (!empty($image_link->link))
                            <li class="d-flex align-items-center justify-content-center">
                                <img src="{{ $image_link->link[0] }}" alt=""
                                    style="max-height: 100%; max-width: 100%;">
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if (count(json_decode($company->rmv_gallery)) < 3)
    <script>
        $("#content-slider").lightSlider({
            item: 2,
            keyPress: true
        })
    </script>
@endif

@if (count(json_decode($company->rmv_gallery)) >= 3)
    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                item: 3,
                keyPress: true,
                responsive: [{
                    breakpoint: 786,
                    settings: {
                        item: 2,
                        slideMove: 1,
                        slideMargin: 6,
                    }
                }]
            });
        });
    </script>
@endif


<style>
    #content-slider {
        min-height: 200px;
    }

</style>
