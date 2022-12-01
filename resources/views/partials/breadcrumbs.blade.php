@php 
$segments = get_field("breadcrumb_segments");  

// echo '<pre>';
// print_r($segments);
// echo '</pre>';
// die();

@endphp

<ol class="breadcrumb  d-flex float-sm-right">
    <li class="breadcrumb-item"><a href="{{ site_url() }}">Sidepost</a></li>
  
    @if ($segments)
        @foreach ( $segments as $_segment )
            <li class="breadcrumb-item"><a href="{{  $_segment["segment_link"] }}">{{  $_segment["segment_title"] }}</a></li>
        @endforeach
    @endif

    
</ol>
