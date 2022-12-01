@if (isset($pages))
    <div class="au-areas {{ sanitize_url($service) }} container-fluid text-center py-5 mb-140">
        <h2 class="mb-4">Areas we work in</h2>



        <div class="row">

            @foreach ($pages as $_page)

                <a href="{{ get_permalink($_page->ID) }}" class="col-6 col-md-4 mb-3">
                    {{ get_post_meta($_page->ID, 'location_location', true) }}
                </a>

            @endforeach


        </div>
    </div>

@endif

<style>
    .au-areas a {
        color: #183B56;
    }

</style>
