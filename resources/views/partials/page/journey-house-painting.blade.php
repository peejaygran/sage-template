@php
    $_extras = new _Extras();
    $custom_post_id = $_extras->get_service_page_id_by_quote_url();
@endphp
<div style="display:none !important">
    {!! do_shortcode('[wpforms id="2140"]') !!}
</div>

<link rel="stylesheet" href="/assets/dist/css/pages/journey.css?v={{ time() }}" />
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}" />
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
<script type="text/javascript" src="/assets/dist/js/journey-house-painting.js?v={{ time() }}"></script>
<script type="text/javascript" src="/assets/dist/js/input-authentication.js?v={{ time() }}"></script>

<div class="container journey journey-house-painting mt-5 px-3 px-md-0">
    <div class="row">
        <div class="col-lg-6">
            <h3>House Painting Price</h3>
            <p class="lead">Interior House Paint INSTANT Quote</p>

            <hr />

            <form id="journey" action="/journey/" method="post" enctype="multipart/form-data">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="txt_name">Name</label>
                            <input id="txt_name" class="form-control form-control-lg auth-title" type="text" placeholder="" required="" />
                        </div>
                        <div class="form-group bedroom-count col-sm-6">
                            <label for="txt_house_size">Total area to be painted:</label>
                            <div class="form-group row px-3">
                                <input id="txt_house_size" class="form-control form-control-lg auth-upper auth-numeric col-8" type="text" placeholder="House size" required="" />
                
                                <select name="unit" class="unit form-control form-control-lg col-4">
                                    <option value="meter">m²</option>
                                    <option value="squares">Squares</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="form-group bathroom-count col-sm-6">
                            <div class="form-group">
                                <label for="txt-postcode">Post code</label>
                                <input id="txt-postcode" class="form-control form-control-lg"  value="{{  isset( $_GET['postcode'])? $_GET['postcode'] :''    }}" type="text" placeholder="" required="" />
                            </div>
                        </div>
                
                        <div class="form-group col-sm-6">
                            <label for="txt_phone">Phone</label>
                            <input id="txt_phone" class="form-control form-control-lg auth-phone" type="text" placeholder="" required="" />
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="txt_email">Email</label>
                            <input id="txt_email" class="form-control form-control-lg" type="email" placeholder="" required="" />
                        </div>
                    </div>
                
                    <div class="row"></div>
                
                    <button type="submit" class="btn btn-block btn-primary btn-lg mt-3 mb-4">Get My Quote</button>
                </div>
                
                
            </form>
        </div>
        <div class="col-lg-4">

            @if ($custom_post_id)
                 @include('partials.cta.customer-feedback')
@include('partials.cta.faq-card')
            @endif

            @include('partials.journey-modal')
            
        </div>
    </div>
</div>
