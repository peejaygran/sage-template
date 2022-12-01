<div class="container-fluid">

    <div class="row align-items-center" style="background-color: #f8f5f2; min-height: 250px;">
        <div class="col-12">
            <h1 class="text-center">Have Questions? We've Got Answers.</h1>

            <h3 class="text-center font-weight-normal">
                Get in touch with our customer service team through whichever channel works best for you
            </h3>
        </div>
    </div>

    <div class="container pt-4">
        <div class="row flex-md-row-reverse">

            <div class="col-md-4 mb-5">
                <form action="">
                    <h3 class="font-weight-normal">Send us a message</h3>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea class="form-control" name="" id="" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn form-control" style="border: 0!important;
                        font-family: roboto,sans-serif;
                        background: #2784be;
                        font-weight: bold;
                        color: #fff!important;
                        font-size: 18px;
                        box-shadow: 0 6px 10px rgba(0,0,0,.09)!important;
                        border-radius: 2px!important;
                        border-bottom: 4px solid #0769a7!important;
                        width: 100%!important;
                        margin: 25px 0 0!important;">Send</button>
                </form>
            </div>

            <div class="col-md-8 row mb-5">
                <div class="col-12">
                    <h2 class="font-weight-normal mb-4">Get in touch</h2>
                </div>

                <div class="col-md-6">
                    <h5>MELBOURNE</h5>
                    {{-- <p class="m-0">Suite 3540, 805/220 Collins Street</p>
                    <p>Melbourne, VIC 3000</p> --}}

                    <p class="m-0"> 20/20-22 Hardner Street, Mount Waverley, Melbourne, Victoria , VIC 3149</p>
                </div>
                                <div class="col-12 mb-5">
                    <h5>WHERE WE SERVICE</h5>
                    <p><a href="{{ home_url('coverage') }}" class=""
                            style="text-decoration: underline; color:#183b56;">See All
                            Locations</a></p>
                </div>
                <div class="col-6">
                    <h5>EMAIL</h5>
                    <p>{{ $email = get_field('email', 1400) }}</p>
                </div>
                <div class="col-6">
                    <h5>PHONE</h5>
                    <p>{{ $phone = get_field('phone', 1400) }}</p>
                </div>
                <div class="col-6">
                    <h5>OPENING HOURS</h5>
                    <p class="m-0">Monday - Sunday</p>
                    <p>8am - 6pm</p>
                </div>
                <div class="col-6">
                    <h5>LOOKING FOR A QUOTE?</h5>
                    <p>
                        See our <a href="{{ home_url('pricing') }}" class=""
                            style="text-decoration: underline; color:#183b56;">flat rate cleaning
                            prices</a>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
