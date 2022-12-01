@php
    $_extras = new _Extras();
    $custom_post_id = $_extras->get_service_page_id_by_quote_url();
@endphp

<div style="display:none !important">
    {!! do_shortcode('[wpforms id="2388"]') !!}
</div>

<link rel="stylesheet" href="/assets/dist/css/pages/journey.css?v={{ time() }}" />
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}" />
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
<script type="text/javascript" src="/assets/dist/js/journey-pressure-washing.js?v={{ time() }}"></script>
<script type="text/javascript" src="/assets/dist/js/input-authentication.js?v={{ time() }}"></script>

<div class="container journey journey-pressure-washing mt-5 px-3 px-md-0">
    <input id="wp-nonce" type="hidden" value="{{ wp_create_nonce() }}" >
    
        <div class="row">
            <div class="col-lg-8">
                <h3>Pressure Washing</h3>
                <p class="lead">Book a Service</p>
        
                <hr />
        
                <form id="journey" action="./" method="post" enctype="multipart/form-data">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="txt_name">Name</label>
                                <input id="txt_name" class="form-control form-control-lg auth-title" type="text" placeholder="" required="" />
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
                
                            <div class="form-group col-sm-12">
                                <label for="txt_email">Email</label>
                                <input id="txt_email" class="form-control form-control-lg" type="email" placeholder="" required="" />
                            </div>
                
                            <div class="form-group col-sm-12 pt-4 pb-2 services">
                                <label>Please choose services ( can be multiple )</label>
                                <div class="input-group">
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Paver Cleaning</button>
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Concrete Cleaning</button>
                
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Driveway Cleaning</button>
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Building Washing</button>
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Exterior House Washing</button>
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Patio Cleaning</button>
                                    <button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Deck Maintenance</button><button type="button" class="btn check-button p-2 m-1 btn-outline-primary">Driveway Oil Stain Removal</button>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="textarea_comment">Additional Information:</label>
                                <div class="form-group row px-3">
                                    <textarea id="textarea_comment" class="form-control" rows="3" placeholder="Enter ..." data-gramm="false" wt-ignore-input="true" data-quillbot-element="LHvdVEkQ9TY5qCRfD-pJy"></textarea>
                                </div>
                            </div>
                        </div>
                
                        <div class="row"></div>
                
                        <button type="submit" class="btn btn-block btn-primary btn-lg mt-1 mb-4">Get My Quote</button>
                    </div>
                </form>
                
                
                
                
            </div>
            <div class="col-lg-4">

                @if ($custom_post_id)
                    @include('partials.cta.customer-feedback')
                     @include('partials.cta.customer-feedback')
@include('partials.cta.faq-card')
                    
                @endif
    
                @include('partials.journey-modal')
                
            </div>
        </div>
        
    
</div>
