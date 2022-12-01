<div class="home-banner container-fluid p-5 text-center">
    <h1>Professional Home Services at your door</h1>
    <h2 class="my-3">Cleaning, painting,fencing and more home and garden services- available now!</h2>
    <div class="container col col-md-10 col-lg-6 my-4">
        <form action="#" method="post">
            <div class="container-fluid">

                <div class="row search-button-row p-2"
                    style="box-shadow: 0 0 6px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);">

                    <div class="col-md-6 p-0" style="display: flex;align-items: center;">

                        <i class="fas fa-search"></i><input type="text" name="message" placeholder="e.g 300"
                            class="form-control mb-3 mb-md-0" style="border: none;">
                    </div>

                    <div class="col-md-6 p-0 d-flex">
                        <a href="{{ home_url('get-a-quote') }}">
                            <button type="button" class="btn text-white ml-md-1 w-100"
                                style="background-color: #2B59C3;">Check Prices and Availability</button>
                        </a>
                    </div>

                </div>

            </div>
        </form>

        <style>
            .row.search-button-row {
                background-color: #80808021;
            }

        </style>

    </div>

</div>
