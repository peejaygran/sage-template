<div class="container-fluid banner-column">
  <div class="row">
    
    <div class="col-lg-7 p-3 p-lg-5">
      

      {{-- <header class="ml-5">
        <h1 class="font-weight-bold">Compare House Removals Companies in {{ ucwords( $location ) }}</h1>
      </header> --}}
      
      <h1 class="location-title">Compare House Removals Companies in {{ ucwords( $location ) }}</h1>
    

      
      <div class="row mt-3">

        <div class="col-1"></div>
        <div class="col-11">

            <p class="lead">
              <i class="fas fa-check mr-2"></i>
                Compare {{ ucwords( $location ) }} Removals by cost, reviews and ratings.
            </p>
  
            <p class="lead">
              <i class="fas fa-check mr-2"></i>
                Cheaper quotes from Local House Removals near {{ ucwords( $location ) }} and surrounding areas.
            </p>

        </div>
      </div>














    <div class="card d-none d-md-block center-form px-4 py-2">

      <p class="lead">Compare up to 4 quotes from trusted moving companies and save.</p>

      <form class="" style="">
            <div class="input-group">
                <input type="text" id="cta_searchbox_outline" class="form-control textbox-search location-input form-control-lg pac-target-input pl-3 mb-2" name="postcode" placeholder="Enter your postcode here" autocomplete="off">
                <span class="input-group-append">
                    <button type="button" class="btn wp-orange px-4 px-md-5 mx-lg-2 mb-2">Get a Quote</button>
                </span>
            </div>

            <p>Discover which companies match your requirements in a matter of minutes.</p>
        </form>
    </div>
      
      

    {{-- <form class="row" style=">
        <div class="input-group">
            <input type="text" id="cta_searchbox_outline" class="form-control textbox-search location-input form-control-lg pac-target-input pl-3 mb-2" name="postcode" placeholder="Enter your postcode here" autocomplete="off">
            <span class="input-group-append">
                <button type="submit" class="btn wp-seagreen px-4 px-md-5 mx-lg-2 mb-2">Compare Now</button>
            </span>
        </div>
    </form> --}}


    </div>


    {{-- _thumbnail_id --}}

    @php
    

    // get_post_meta(  get_the_ID(),   );
    

    @endphp


    
    <div class="col-lg-5 location-image-column" style="background-image: url('{!!   get_the_post_thumbnail_url()  !!}')";>
      
    </div>


{{-- 
    <div class="card center-form p-4">

      <p class="lead">Compare up to 4 quotes from trusted moving companies and save.</p>

      <form class="" style="">
            <div class="input-group">
                <input type="text" id="cta_searchbox_outline" class="form-control textbox-search location-input form-control-lg pac-target-input pl-3 mb-2" name="postcode" placeholder="Enter your postcode here" autocomplete="off">
                <span class="input-group-append">
                    <button type="button" class="btn wp-orange px-4 px-md-5 mx-lg-2 mb-2">Get a Quote</button>
                </span>
            </div>
        </form>
    </div> --}}


    

  </div>
</div>
