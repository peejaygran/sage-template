@php
    $_extras = new _Extras();
    $custom_post_id = $_extras->get_service_page_id_by_quote_url();
@endphp


<div style="display:none !important">
    {!! do_shortcode('[wpforms id="2238"]') !!}
</div>

<link rel="stylesheet" href="/assets/dist/css/pages/journey.css?v={{ time() }}" />
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}" />
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
<script type="text/javascript" src="/assets/dist/js/journey-pool-cleaning.js?v={{ time() }}"></script>
<script type="text/javascript" src="/assets/dist/js/input-authentication.js?v={{ time() }}"></script>

<div class="container journey journey-pool-cleaning mt-5 px-3 px-md-0">
    <input id="wp-nonce" type="hidden" value="{{ wp_create_nonce() }}" >
    <div class="row">
        <div class="col-lg-6">
            <h3>Find Local Pool Cleaners</h3>
            <p class="lead">Pool Cleaning INSTANT Quote</p>

            <hr />

            <form id="journey" action="/journey-pool-cleaning/" method="post" enctype="multipart/form-data">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="txt_name">Name</label>
                            <input id="txt_name" class="form-control form-control-lg auth-title" type="text" placeholder="" required="" />
                        </div>


                        <div class="form-group bathroom-count col-sm-6">
                            <div class="form-group">
                                <label for="txt-postcode">Post code</label>
                            <input id="txt-postcode" class="form-control form-control-lg" value="{{  isset( $_GET['postcode'])? $_GET['postcode'] :''    }}" type="text" placeholder="" required="" />
                            </div>
                        </div>
                
                        <div class="form-group col-sm-6">
                            <label for="txt_phone">Phone</label>
                            <input id="txt_phone" class="form-control form-control-lg auth-phone" type="text" placeholder="" required="" />
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="txt_email">Email</label>
                            <input id="txt_email" class="form-control form-control-lg" type="email" placeholder="" required="" />
                        </div>

                        <div class="form-group  col-sm-12">
                            <label for="textarea_comment">Additional comments:</label>
                            <div class="form-group row px-3">
                                <textarea id="textarea_comment" class="form-control" rows="3" placeholder="Enter ..." data-gramm="false" wt-ignore-input="true"></textarea>
                            </div>
                        </div>

                    </div>
                
                    <div class="row"></div>
                
                    <button type="submit" class="btn btn-block btn-primary btn-lg mt-3 mb-4">Get My Quote</button>
                </div>
                
                
            </form>
        </div>
        <div class="col-lg-6">

            @if ($custom_post_id)
                 @include('partials.cta.customer-feedback')
@include('partials.cta.faq-card')
            @endif

            @include('partials.journey-modal')
            
        </div>
    </div>
</div>
