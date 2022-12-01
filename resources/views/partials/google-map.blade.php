@if (isset($location))
    @php
        $location = urlencode(str_replace('-', ' ', $location) . ', Australia');
        $source = "https://maps.google.com/maps?q=$location&t=&z=9&ie=UTF8&iwloc=&output=embed";
    @endphp
    <div class="mapouter w-100">
        <div class="gmap_canvas w-100">
            <iframe width="100%" height="500" id="gmap_canvas" src="{{ $source }}" frameborder="0" scrolling="no"
                marginheight="0" marginwidth="0"></iframe>

            {{-- <a href="https://putlocker-is.org">putlocker</a> --}}

            <br>

            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    height: 500px;
                    width: 600px;
                }
            </style>

            {{-- <a href="https://www.embedgooglemap.net">google maps insert</a> --}}

            <style>
                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    height: 500px;
                    width: 600px;
                }
            </style>
        </div>
    </div>
@endif
