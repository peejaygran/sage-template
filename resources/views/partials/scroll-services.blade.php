<div class="container-fluid p-0">
    <div class="row scroll-services-areas p-2 flex-nowrap overflow-auto">
        @if ($service_areas)
            @foreach ($service_areas as $service_area)
                <div class="col-auto col-sm-6 col-lg-4 my-2">
                    <div class="card">
                        <div class="card-body p-4">

                            <h5 class="card-title">{{ $service_area['location'] }}</h5>

                            <small class="card-text mb-2">
                                {{ $service_area['content'] }}
                            </small>

                            <a href="#" class="float-right">
                                <button class="btn btn-light text-primary font-weight-bold mt-4">
                                    Get a look
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>


<style>
    .scroll-services-areas .card {
        background: #fff6b5;
        border-radius: 8px;
    }

</style>
