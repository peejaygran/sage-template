@php
    $_extras = new _Extras();
    $custom_post_id = $_extras->get_service_page_id_by_quote_url();
@endphp

<div style="display:none !important">
    {!! do_shortcode('[wpforms id="2076"]') !!}
</div>

<link rel="stylesheet" href="/assets/dist/css/pages/journey.css?v={{ time() }}" />
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}" />
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
<script type="text/javascript" src="/assets/dist/js/journey-house-cleaning.js?v={{ time() }}"></script>
<script type="text/javascript" src="/assets/dist/js/input-authentication.js?v={{ time() }}"></script>

<div class="container journey journey-house-cleaning mt-5 px-3 px-md-0">
    <div class="row">
        <div class="col-lg-8">
            <h3>House Cleaning Price</h3>
            <p class="lead">Get an instant quote for your next house clean</p>

            <hr />

            <form id="journey" action="/journey/" method="post" enctype="multipart/form-data">
                <div class="card-body p-0 m-0">
                    <div class="form-group service-type">
                        <label>What type of clean are you looking for?*</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-primary btn-primary switch-button py-3 my-3">House Clean</button>
                            <button type="button" class="btn btn-outline-primary switch-button p-md-3 m-3">End of Lease Clean</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group bedroom-count col-sm-6">
                            <label>How many <strong class="lead mx-1 font-weight-bold">bedrooms</strong> need cleaning?</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary px-4 minus">-</button>
                                </div>

                                <input id="txt_bedroom_count" type="text" class="form-control form-control-lg text-center" value="1 bedroom" disabled="disabled" />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary px-4 plus">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group bathroom-count col-sm-6">
                            <label>How many <strong class="lead mx-1 font-weight-bold">bathrooms</strong> need cleaning?</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary px-4 minus">-</button>
                                </div>

                                <input id="txt_bathroom_count" type="text" class="form-control form-control-lg text-center" value="1 bathroom" disabled="disabled" />

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary px-4 plus">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group bedroom-count col-sm-6">
                            <div class="form-group">
                                <label for="txt_name">Name:</label>
                                <input id="txt_name" class="form-control form-control-lg auth-title" type="text" placeholder="" required />
                            </div>
                        </div>

                        <div class="form-group bathroom-count col-sm-6">
                            <div class="form-group">
                                <label for="txt_phone">Phone:</label>
                                <input id="txt_phone" class="form-control form-control-lg auth-phone" type="text" placeholder="" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="txt_email">Email</label>
                            <input id="txt_email" class="form-control form-control-lg" type="email" placeholder="" required />
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="txt_postcode">Postcode</label>
                            <input id="txt_postcode" class="form-control form-control-lg" type="text" placeholder="" required />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block btn-primary btn-lg mt-3 mb-4">See My Price</button>
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
