<div class="container location-list">
    <h2 class="text-center"> Looking For A Removals Company Elsewhere? </h2>

    <div class="row d-flex justify-content-center">


        @php
            $_seo = new _Seo();
            $_maps = new _Maps();

            $location_pages = $_seo->get_all_location_pages();

            $location_page_lat = get_field('location_group_lat');
            $location_page_lng = get_field('location_group_lng');

            foreach ($location_pages as &$_location_page) {
                
                $_location_page["distance"] = $_maps->getDistanceBetweenPoints( 
                                                                                [$location_page_lat,$location_page_lng ], 
                                                                                [   $_location_page["location_coordinates_lat"],$_location_page["location_coordinates_lng"], ]    
                                                                            );
            }

            array_multisort(    array_column($location_pages, "distance"), SORT_ASC, $location_pages);

        @endphp


        @foreach ($location_pages as $key => $location_page)

            @if ( $location_page["location_name"] && $key < 9 )
                    @include('partials.locations.location-card', [  
                                                                    "location_name" => $location_page["location_name"]
                                                                    ,"location_featured_thumb" => $location_page["location_featured_thumb"]
                                                                    ,"location_url" =>  get_permalink( $location_page["location_post_id"])
                                                                    ] )
            @endif
            
        @endforeach



        <div class="lazyload" style="width: 1px; height: 1px" data-src="%s">
            <img class="spinner" width="1" height="1" src="{!! $location_page["location_featured_thumb"] !!}"/>
        </div>


    </div>



</div>

    

    {{-- <div class="row"> --}}

        {{-- @if ($locations_list)

            @foreach ($locations_list as $location)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="row">
                            <div class="col-3 card-image">
                            </div>
                            <div class="col-9 py-4">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        @endif --}}

        @php
            $_companies = new _Companies();
            $companies = $_companies->get_companies_by_location($location);
        @endphp
{{-- 
        <div class="row">

            <div class="col-lg-4">
                @include('partials.cta.category-list')
            </div>
            <div class="col-lg-8">
                <div class="card p-0">

                    <div class="row m-0 card-body p-0">
                        <div class="col-lg-4"
                            style="background-image: url(&quot;https://getmovingexperts.co.uk/wp-content/uploads/2022/02/man-with-van-man-and-van-price.jpeg&quot;);background-size: cover;background-repeat: no-repeat;">
                        </div>

                        <div class="col-lg-8 px-3 ">
                            <p class=" text-center text-lg-left mt-3 mb-0" style="font-size: 20px;">
                                rmv_company
                            </p>
                            <small class="font-italic">'insert pitch here'</small>
                            <p class="description mb-1" style="font-size: 14px;">We have built up an unbeatable
                                reputation.
                                Professional moving services that can make house moves as
                                hassle-free as possible. Committed to offering the best moving services at a competitive
                                price.</p>
                            <div class="location">
                                <i class="fa fa-map-marker-alt mb-3"></i> <span>location here </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> --}}

    {{-- </div> --}}










