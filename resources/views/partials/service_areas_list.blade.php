<div class="container ">
    <div class="row justify-content-center my-3 px-3 px-sm-0 area-row">
        @foreach ($locations as $location)
            @php
                $location_link = trim(strtolower($location['location']));
                $location_link = preg_replace('/[^a-z0-9_\s-]/', '', $location_link);
                $location_link = preg_replace('/[\s-]+/', ' ', $location_link);
                $location_link = preg_replace('/[\s_]/', '-', $location_link) . '/';
                
                $service_link = trim($service_link);
                $service_link = substr($service_link, 0, 1) == '/' ? home_url(substr($service_link, 1)) : $service_link;
                $service_link = str_contains($service_link, 'http') ? $service_link : home_url($service_link);
                $service_link = str_replace('dry-cleaning/', 'dry-cleaning-and-ironing/', $service_link);
                $service_link = str_replace('ironing-service/', 'dry-cleaning-and-ironing/', $service_link);
                $location_link = substr($service_link, -1) == '/' ? $location_link : '/' . $location_link;
                
                $_service = strtolower($service);
                $_service = trim($_service);
                $_service = preg_replace('/[^a-z0-9_\s-]/', '', $_service);
                $_service = preg_replace('/[\s-]+/', ' ', $_service);
                $_service = preg_replace('/[\s_]/', '-', $_service);
                
                // echo '<pre>';
                // print_r($service_link);
                // echo '</pre>';
                
            @endphp

            <div class="col-sm-6 col-md-3">
                <a href="{{ $service_link . $location_link }}">
                    {{ $location['location'] }} {{ $service }} <i class="fas fa-angle-right ml-2"></i>
                </a>
            </div>
        @endforeach

    </div>

</div>

<div class="justify-content-center d-flex">
    <a href="{{ home_url('coverage/#' . $_service) }}" class="btn text-light bg-primary py-2_5 px-5">View all
        {{ $service }}
        Service Areas</a>
</div>

<style>
    .service-areas p {
        align-items: center;
        display: flex;
    }

    .area-row a {
        color: #183b56;
        line-height: 2;
        justify-content: space-between;
        display: flex;
        align-items: center;
    }
</style>
