<style type="text/css">
    .st0 {
        fill: #00B67A;
    }

    .st1 {
        fill: #DCDCE6;
    }

    .st2 {
        fill: #FFFFFF;
    }
</style>

@if (isset($rate) && $rate >= 0 && $rate <= 5)

    <svg {{ isset($width) ? 'width=' . $width : '' }} xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
        viewBox="0 0 512 96" style="enable-background:new 0 0 512 96;" xml:space="preserve">
        <g id="Trustpilot_ratings_4halfstar-RGB">
            <g>

                @php
                    $decimal = 0;
                    if (is_float($rate)) {
                        $decimal = 1;
                    }
                @endphp

                <rect id="Rectangle-path" class="st0" width="96" height="96" />
                @for ($i = 0; $i < floor($rate) - 1; $i++)
                    <rect x="{{ 104 * ($i + 1) }}" class="st0" width="96" height="96" />
                @endfor

                @if ($decimal)
                    <g id="Half" transform="translate(416.000000, 0.000000)">
                        <rect x="48" class="st1" width="48" height="96" />
                        <rect class="st0" width="48" height="96" />
                    </g>
                @endif

                @for ($i = 0; $i < floor($rate) + $decimal; $i++)
                    @if ($i == 0)
                        <path id="Shape" class="st2"
                            d="M48,64.7L62.6,61l6.1,18.8L48,64.7z M81.6,40.4H55.9L48,16.2l-7.9,24.2H14.4l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L81.6,40.4L81.6,40.4L81.6,40.4L81.6,40.4z" />
                    @elseif($i == 1)
                        <path class="st2"
                            d="M152,64.7l14.6-3.7l6.1,18.8L152,64.7z M185.6,40.4h-25.7L152,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L185.6,40.4L185.6,40.4L185.6,40.4L185.6,40.4z" />
                    @elseif($i == 2)
                        <path class="st2"
                            d="M256,64.7l14.6-3.7l6.1,18.8L256,64.7z M289.6,40.4h-25.7L256,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L289.6,40.4L289.6,40.4L289.6,40.4L289.6,40.4z" />
                    @elseif($i == 3)
                        <path class="st2"
                            d="M360,64.7l14.6-3.7l6.1,18.8L360,64.7z M393.6,40.4h-25.7L360,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L393.6,40.4L393.6,40.4L393.6,40.4L393.6,40.4z" />
                    @elseif($i == 4)
                        <path class="st2"
                            d="M464,64.7l14.6-3.7l6.1,18.8L464,64.7z M497.6,40.4h-25.7L464,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L497.6,40.4L497.6,40.4L497.6,40.4L497.6,40.4z" />
                    @endif
                @endfor
            </g>
        </g>
    </svg>
@endif

@if (!isset($rate))
    <svg {{ isset($width) ? 'width=' . $width : '' }} xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
        viewBox="0 0 512 96" style="enable-background:new 0 0 512 96;" xml:space="preserve">
        <g id="Trustpilot_ratings_4halfstar-RGB">
            <g>
                <rect id="Rectangle-path" class="st0" width="96" height="96" />
                <rect x="104" class="st0" width="96" height="96" />
                <rect x="208" class="st0" width="96" height="96" />
                <rect x="312" class="st0" width="96" height="96" />
                <g id="Half" transform="translate(416.000000, 0.000000)">
                    <rect x="48" class="st1" width="48" height="96" />
                    <rect class="st0" width="48" height="96" />
                </g>
                <path id="Shape" class="st2"
                    d="M48,64.7L62.6,61l6.1,18.8L48,64.7z M81.6,40.4H55.9L48,16.2l-7.9,24.2H14.4l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L81.6,40.4L81.6,40.4L81.6,40.4L81.6,40.4z" />
                <path class="st2"
                    d="M152,64.7l14.6-3.7l6.1,18.8L152,64.7z M185.6,40.4h-25.7L152,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L185.6,40.4L185.6,40.4L185.6,40.4L185.6,40.4z" />
                <path class="st2"
                    d="M256,64.7l14.6-3.7l6.1,18.8L256,64.7z M289.6,40.4h-25.7L256,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L289.6,40.4L289.6,40.4L289.6,40.4L289.6,40.4z" />
                <path class="st2"
                    d="M360,64.7l14.6-3.7l6.1,18.8L360,64.7z M393.6,40.4h-25.7L360,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L393.6,40.4L393.6,40.4L393.6,40.4L393.6,40.4z" />
                <path class="st2"
                    d="M464,64.7l14.6-3.7l6.1,18.8L464,64.7z M497.6,40.4h-25.7L464,16.2l-7.9,24.2h-25.7l20.8,15l-7.9,24.2    l20.8-15l12.8-9.2L497.6,40.4L497.6,40.4L497.6,40.4L497.6,40.4z" />
            </g>
        </g>
    </svg>
@endif
