@php
    $_extras = new _Extras();
    $custom_post_id = $_extras->get_service_page_id_by_quote_url();
@endphp

<div style="display:none !important">
    {!! do_shortcode('[wpforms id="2458"]') !!}
</div>

<link rel="stylesheet" href="/assets/dist/css/pages/journey.css?v={{ time() }}" />
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
<script type="text/javascript" src="/assets/dist/js/journey-fence-installation.js?v={{ time() }}"></script>
<script type="text/javascript" src="/assets/dist/js/input-authentication.js?v={{ time() }}"></script>


<div class="container journey journey-pest-control mt-5 px-3 px-md-0">
    <input id="wp-nonce" type="hidden" value="{{ wp_create_nonce() }}" >

        <div class="row">
            <div class="col-lg-8">
              
                <h3>Fence Installation</h3>
                <p class="lead">Book a Service</p>
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
                
                           




                            {{-- <div class="form-group col-sm-12 py-1 fence-type">
                                <label>Fence Types ( can be multiple )</label>
                                <div class="input-group">
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Brick Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Emu Wire Or Woven Wire Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Automatic Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Hebel Modular Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Pool Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Wooden or Picket Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">PVC Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Pool Fence Minor Repairs</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Slat or Screen Gates</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Temporary Fencing</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Chain Wire/Cyclone Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Fence Painting</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Colorbond(R) Good Neighbour Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Iron Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Sliding Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Laser Cut Screens</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Picket Or Feature Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Pool Fence Safety Inspection</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Slat/Screen Fencing</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Tubular Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Colorbond(R)/Good Neighbour Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation And Repair of PVC Gates</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Glass Pool Fencing</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Noise Reduction Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Installation of Swing Gate</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Modular/Garden Wall Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Pool Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Post and Wire or Farm Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Teco Black Fence</button>
                                    <button type="button" class="btn check-button p-2 m-2 btn-outline-primary">Wooden / Pinelap / Painting Fence</button>
                                </div>
                            </div> --}}


                            {{-- <div class="form-group col-sm-12">
                                <label for="textarea_comment">Additional Information:</label>
                                <div class="form-group row px-3">
                                    <textarea id="textarea_comment" class="form-control" rows="3" placeholder="Enter ..." data-gramm="false" wt-ignore-input="true" data-quillbot-element="LHvdVEkQ9TY5qCRfD-pJy"></textarea>
                                </div>
                            </div> --}}

                        </div>
                
                        <div class="row"></div>
                
                        <button type="submit" class="btn btn-block btn-primary btn-lg mt-1 mb-4">Get My Quote</button>
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

