<div class="card card-primary card-outline p-2">

    <div class="card-body">
        <h2 class="text-primary text-center aaa">Professional Home Services at your Door

        </h2>

        <form action="{{ home_url('select-service') }}" method="GET">
            <div class="row search-button-row p-2 my-3 bg-white">

                <div class="col-md-7 p-0" style="display: flex;align-items: center;">

                    <i class="fas fa-search"></i>
                    <input type="text" name="postcode" placeholder="Enter your postcode"
                        class="form-control mb-lg-0 my-2 my-sm-0" style="border: none;" required="">
                </div>

                <div class="col-md-5 d-flex  p-0">
                    <button type="submit" class="btn text-white ml-lg-1 w-100 py-3"
                        style="padding-right: 0;padding-left: 0;background-color: #2b59c3;">
                        <span>Check Prices</span>
                    </button>
                </div>

            </div>
        </form>

        <p class="text-center h5">Get it all done with Sidepost - House cleaning, fencing, painting, and more.</p>

    </div>

</div>
