<div style="display:none !important">
    {!! do_shortcode('[wpforms id="1832"]') !!}
</div>

<link rel="stylesheet" href="/assets/dist/css/pages/journey.css?v={{ time() }}" />
<link rel="stylesheet" href="/assets/dist/css/pages/cta.css?v={{ time() }}" />
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
<script type="text/javascript" src="/assets/dist/js/journey.js?v={{ time() }}"></script>
<script type="text/javascript" src="/assets/dist/js/input-authentication.js?v={{ time() }}"></script>

<div class="container journey journey-default mt-5">
    <div class="row">
        <div class="col-lg-8">



            <h1>Customise your clean</h1>

            <form id="journey" action="/get-a-quote/" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group py-4">
                        <label for="txt_postcode">Your postcode</label>
                        <input id="txt_postcode" class="form-control form-control-lg auth-upper" type="text"
                            placeholder="" {{ isset($_GET['postcode']) ? 'value=' . $_GET['postcode'] : '' }}
                            required />
                    </div>

                    <hr />

                    <div class="form-group py-4 bedroom-count">
                        <label>How many <strong class="lead mx-1 font-weight-bold">bedrooms</strong> need
                            cleaning?</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary px-4 minus">-</button>
                            </div>

                            <input id="txt_bedroom_count" type="text" class="form-control form-control-lg text-center"
                                value="1 bedroom" disabled="disabled" />

                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary px-4 plus  ">+</button>
                            </div>
                        </div>
                    </div>

                    <hr />



                    <div class="form-group py-4 bathroom-count">
                        <label>How many <strong class="lead mx-1 font-weight-bold">bathrooms</strong> need
                            cleaning?</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary px-4 minus">-</button>
                            </div>

                            <input id="txt_bathroom_count" type="text" class="form-control form-control-lg text-center"
                                value="1 bathroom" disabled="disabled" />

                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary px-4 plus">+</button>
                            </div>
                        </div>

                        <p class="my-2">Your cleaner will also clean your kitchen, lounge and common areas.
                        </p>
                    </div>


                    <div class="form-group py-4 extra-task">
                        <label>Extra tasks (optional)</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-primary check-button p-4 m-4">Ironing</button>
                            <button type="button" class="btn btn-outline-primary check-button p-4 m-4">Inside
                                windows</button>
                            <button type="button" class="btn btn-outline-primary check-button p-4 m-4">Inside
                                fridge</button>
                            <button type="button" class="btn btn-outline-primary check-button p-4 m-4">Inside
                                oven</button>
                        </div>
                    </div>


                    <div class="form-group py-4 workhours">
                        <label>We recommend selecting <span>2.0 hours</span></label>
                        <p class="my-2">Based on your bedrooms, bathrooms and extra tasks</p>

                        <div class="input-group">
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">2.0</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">2.5</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">3.0</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">4.0</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">4.5</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">5.0</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">5.5</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">6.0</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">6.5</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">7.0</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">7.5</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">8.0</button>
                        </div>
                    </div>

                    <hr />

                    <div class="form-group py-4 cleaning-provider">
                        <label>Cleaning products</label>
                        <p class="my-2">Includes sprays and cloths. Your Housekeeper cannot bring a vacuum,
                            mop or bucket</p>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">Bring
                                cleaning products (+£5.00)</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">I will
                                provide</button>
                        </div>
                    </div>

                    <hr />

                    <div class="form-group py-4 frequency">
                        <label>How often?</label>
                        <p class="my-2">You can keep the same cleaner for recurring cleans. You can change or
                            cancel any time.</p>
                        <div class="input-group">
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">More than
                                weekly</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">Every
                                week</button>
                            <button type="button" class="btn btn-outline-primary switch-button btn-lg m-2">Every 2
                                weeks</button>
                            <button type="button"
                                class="btn btn-outline-primary switch-button btn-lg m-2">One-off</button>
                        </div>
                    </div>

                    <hr />

                    <div class="form-group py-4">
                        <label for="txt_email">Email</label>
                        <input id="txt_email" class="form-control form-control-lg" type="email" placeholder=""
                            required />
                    </div>

                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="check_receive_updates" checked="" />
                            <label for="check_receive_updates"> Send me updates and special offers</label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-block btn-primary btn-lg my-4">Continue</button>



                </div>
            </form>



        </div>
        <div class=" col-lg-4">

            @include('partials.cta.reviews')
            @include('partials.cta.customer-feedback')
            @include('partials.cta.faq-card')
            {{-- @include('partials.cta.booking-summary') --}}




            <div class="modal fade" id="modal_result" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h2>Your enquiry is now being processed</h2>
                            <p>We'll be right back</p>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<style>
    .modal-header {
        border-bottom: none !important;
    }

</style>
