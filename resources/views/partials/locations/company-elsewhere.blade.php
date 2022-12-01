

<div class="row">
    @foreach ($args as $location)
        <div class="col-lg-4">
            <div class="card">
                <div class="row">
                    <div class="col-3 card-image">
                    </div>
                    <div class="col-9 py-4">
                        <a href="{{ $location['location_link'] }}">{{ $location['location_name'] }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
