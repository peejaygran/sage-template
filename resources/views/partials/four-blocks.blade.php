@if (!isset($hardcode))
    <div class="row py-4 justify-content-center d-flex">
        @foreach ($step_process as $process)
            <div class="col-sm-6 col-lg-3 pb-4 pb-lg-0 mb-5">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <h3>{!! $process['number'] !!}</h3>
                        <h6>{!! $process['title'] !!}</h6>
                        <p>{!! $process['description'] !!}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endif

@if (isset($hardcode))
    <div class="row py-4">
        <div class="col-sm-6 col-lg-3 pb-4 pb-lg-0">
            <div class="card h-100">
                <div class="card-body p-3">
                    <h3>01</h3>
                    <h6>Choose your location</h6>
                    <p>We operate in Melbourne, Sydney, Perth and Brisbane.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 pb-4 pb-lg-0">
            <div class="card h-100">
                <div class="card-body p-3">
                    <h3>02</h3>
                    <h6>Choose a cleaning service and book online</h6>
                    <p>Use our online booking form or the GoFantastic app to book your cleaning service.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 pb-4 pb-lg-0">
            <div class="card h-100">
                <div class="card-body p-3">
                    <h3>03</h3>
                    <h6>We send a Fantastic pro to your place</h6>
                    <p>You get an in-house team to guide and advocate for you through questions</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 pb-4 pb-lg-0">
            <div class="card h-100">
                <div class="card-body p-3">
                    <h3>04</h3>
                    <h6>Enjoy a clean home</h6>
                    <p>The Fantastic housekeepers will do all the work and you will enjoy the extra time and sweet
                        results.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
