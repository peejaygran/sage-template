@include('partials.imports.datatables')

<link rel="stylesheet" href="{{ home_url('_assets/plugins/toastr/toastr.min.css') }}">
<script src="{{ home_url('_assets/plugins/toastr/toastr.min.js') }}"></script>

<h1>Links Data</h1>

<div class="container-fluid mb-2">
    <div class="row">
        <button post-type="post" class="cache-meta btn btn-primary m-1">
            Cache Posts Meta
        </button>
        <button post-type="page" class="cache-meta btn btn-primary m-1">
            Cache Pages Meta
        </button>
        <button post-type="location" class="cache-meta btn btn-primary m-1">
            Cache Locations Meta
        </button>
        <button post-type="service" class="cache-meta btn btn-primary m-1">
            Cache Services Meta
        </button>
        <button post-type="subservice" class="cache-meta btn btn-primary m-1">
            Cache Sub Services Meta
        </button>
    </div>
</div>


<script>
    $('.cache-meta').on('click', function() {
        let post_type = $(this).attr('post-type');
        toastr.info('caching all ' + post_type + 's, this will take a minutes');
        $.ajax({
            type: "post",
            url: home_url('api/index.php/_links/cache_meta_by_post_type'),
            data: {
                "post_type": post_type
            },
            success: function(response) {
                toastr.success('All ' + post_type + 's cached');
            }
        });
    });
</script>


{{-- <div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table id="meta-details" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
            </div>
        </div>
    </div>
</div> --}}


<script>
    // $('#meta-details').DataTable();
</script>
