@include('partials.imports.datatables')

<link rel="stylesheet" href="{{ home_url('_assets/plugins/toastr/toastr.min.css') }}">
<script src="{{ home_url('_assets/plugins/toastr/toastr.min.js') }}"></script>

@php
$posts = get_posts([
    'numberposts' => -1,
    'post_type' => ['post', 'page', 'location', 'service', 'subservice'],
]);
@endphp

<h1>META</h1>

<div class="container-fluid">
    <div class="row flex-lg-row-reverse">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table id="posts" class="display" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Permalink</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{!! $post->ID !!}</td>
                                    <td>{!! $post->post_type !!}</td>
                                    <td>{!! $post->post_title !!}</td>
                                    <td>
                                        <a href="{!! get_permalink($post->ID) !!}">{!! get_permalink($post->ID) !!}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h2>Meta Update</h2>

                    <form id="post_meta">
                        <div class="form-group">
                            <label for="">Post ID</label>
                            <input type="text" disabled class="form-control" name="post_id" placeholder="e.g. 4321">
                        </div>

                        <div class="form-group">
                            <label for="">Meta Title</label>
                            <textarea disabled class="form-control" name="meta_title" rows="3" placeholder="Meta title here.."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea disabled class="form-control" name="meta_description" rows="3" placeholder="Meta description here.."></textarea>
                        </div>

                        <button type="submit" disabled class="form-control btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h2>Bulk Meta Update</h2>

                    <p class="small text-muted">
                        <span class="text-danger">Note:</span>
                        All pages for the selected post type will be updated
                    </p>
                    <form id="post_bulk_meta">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="post_type" value="page">
                                        Pages
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="post_type" value="post">
                                        Posts
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="post_type"
                                            value="location">
                                        Locations
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="post_type" value="service">
                                        Services
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="post_type"
                                            value="subservice"> Sub Services
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Meta Title</label>
                            <textarea disabled class="form-control" name="meta_title" rows="3" placeholder="Meta title here.."></textarea>
                            <div class="form-group">
                                <small class="d-none error-message err-title form-text text-danger">Meta title
                                    required*</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea disabled class="form-control" name="meta_description" rows="3" placeholder="Meta description here.."></textarea>
                            <small class="d-none error-message err-description form-text text-danger">Meta description
                                required*</small>
                        </div>

                        <button type="submit" disabled class="form-control btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h2>Locations Bulk Meta Update per Service</h2>

                    <p class="small text-muted">
                        <span class="text-danger">Note:</span>
                        All location pages for the selected service will be updated.
                    </p>
                    @php
                        $services = get_posts(['numberposts' => -1, 'post_type' => 'service']);
                    @endphp
                    <form id="service_locations_bulk_meta">
                        <div class="form-group">
                            <select class="form-control" name="service">
                                <option selected disabled>Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->ID }}">{{ $service->post_title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Meta Title</label>
                            <textarea disabled class="form-control" name="meta_title" rows="3" placeholder="Meta title here.."></textarea>
                            <div class="form-group">
                                <small class="d-none error-message err-title form-text text-danger">Meta title
                                    required*</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea disabled class="form-control" name="meta_description" rows="3"
                                placeholder="Meta description here.."></textarea>
                            <small class="d-none error-message err-description form-text text-danger">Meta description
                                required*</small>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" disabled class="form-control btn btn-primary m-1"
                                        name="update_all">
                                        Update All
                                    </button>
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" disabled class="form-control btn btn-primary m-1"
                                        name="update_empty">
                                        Update Empty
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let posts_table = $('table#posts').DataTable({
        responsive: true,
        dom: 'Qlftipr',
        initComplete: function() {
            $(this).parent('.dataTables_wrapper').find('.pagination').addClass('justify-content-lg-center');
            $(this).parent('.dataTables_wrapper').find('.dataTables_info').addClass('text-md-center');
        }
    });

    $('table#posts').on('click', 'tr', function() {
        let post = $(this).children()[0];
        let post_id = $(post).text();

        $.ajax({
            type: "post",
            url: home_url('api/index.php/_seo/ajax_get_meta_by_post_id'),
            data: {
                "post_id": post_id
            },
            success: function(response) {
                if (response) {
                    $('form#post_meta .form-control').removeAttr('disabled');
                    $('form#post_meta [name=post_id]').val(response.post_id);
                    $('form#post_meta [name=meta_title]').val(response.meta_title);
                    $('form#post_meta [name=meta_description]').val(response.meta_description);
                }
            }
        });
    });

    $('form#post_meta').on('submit', function(e) {
        e.preventDefault();

        let form_data = $(this).serialize();
        debugger;

        $.ajax({
            type: "post",
            url: home_url('api/index.php/_seo/save_post_metas'),
            data: form_data,
            success: function(response) {
                $('form#post_meta .form-control').val('');
                $('form#post_meta .form-control').attr('disabled', 'disabled');
            }
        });

    });

    $('form#post_bulk_meta').on('change', '.form-check-input', function() {
        $('form#post_bulk_meta .form-control').removeAttr('disabled');
    });

    $('form#post_bulk_meta').on('submit', function(e) {
        e.preventDefault();

        let form_data = $(this).serializeArray();
        let err = 0;
        $('form#post_bulk_meta .error-message').addClass('d-none');

        $.each(form_data, function(index, data) {

            if (data.name == "meta_title" && !data.value) {
                $('form#post_bulk_meta .err-title').removeClass('d-none');
                err++;
            }

            if (data.name == "meta_description" && !data.value) {
                $('form#post_bulk_meta .err-description').removeClass('d-none');
                err++;
            }

        });


        if (!err) {
            $.ajax({
                type: "post",
                url: home_url('api/index.php/_seo/save_metas_by_post_type'),
                data: form_data,
                success: function(response) {
                    $('form#post_bulk_meta .form-control').val('');
                    $('form#post_bulk_meta .form-check-input').prop('checked', false);
                    $('form#post_bulk_meta .form-control').attr('disabled', 'disabled');
                }
            });
        }
    });

    $('form#service_locations_bulk_meta').on('change', 'select', function() {
        $('form#service_locations_bulk_meta .form-control').removeAttr('disabled');
    });

    $('form#service_locations_bulk_meta [name=update_all]').on('click', function(e) {
        e.preventDefault();

        let form_data = $('form#service_locations_bulk_meta').serializeArray();
        let err = 0;

        $('form#service_locations_bulk_meta .error-message').addClass('d-none');

        $.each(form_data, function(index, data) {

            if (data.name == "meta_title" && !data.value) {
                $('form#service_locations_bulk_meta .err-title').removeClass('d-none');
                err++;
            }

            if (data.name == "meta_description" && !data.value) {
                $('form#service_locations_bulk_meta .err-description').removeClass('d-none');
                err++;
            }

        });

        if (!err) {
            service_locations_bulk_meta(form_data, true);
        }

    })

    $('form#service_locations_bulk_meta [name=update_empty]').on('click', function(e) {
        e.preventDefault();
        let form_data = $('form#service_locations_bulk_meta').serializeArray();
        $('form#service_locations_bulk_meta .error-message').addClass('d-none');
        service_locations_bulk_meta(form_data);
    });

    function service_locations_bulk_meta(form_data, update_all = false) {
        form_data.push({
            name: 'update_all',
            value: update_all ? 1 : 0
        });
        $.ajax({
            type: "post",
            url: home_url('api/index.php/_seo/save_location_metas_via_service'),
            data: form_data,
            success: function(response) {
                debugger;
            }
        });
    }
</script>
