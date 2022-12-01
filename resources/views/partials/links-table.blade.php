@include('partials.imports.datatables')

@php

$posts = get_posts([
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => ['publish', 'private'],
]);
$pages = get_posts([
    'numberposts' => -1,
    'post_type' => 'page',
    'post_status' => ['publish', 'private'],
]);
$locations = get_posts([
    'numberposts' => -1,
    'post_type' => 'location',
    'post_status' => ['publish', 'private'],
]);
$services = get_posts([
    'numberposts' => -1,
    'post_type' => 'service',
    'post_status' => ['publish', 'private'],
]);
$subservices = get_posts([
    'numberposts' => -1,
    'post_type' => 'subservice',
    'post_status' => ['publish', 'private'],
]);

$all_data = [
    'post' => $posts,
    'location' => $locations,
    'service' => $services,
    'subservice' => $subservices,
    'page' => $pages,
];

$data = [];
if (isset($_GET['posts'])) {
    $data['posts'] = $posts;
}
if (isset($_GET['pages'])) {
    $data['page'] = $pages;
}
if (isset($_GET['locations'])) {
    $data['location'] = $locations;
}
if (isset($_GET['services'])) {
    $data['service'] = $services;
}
if (isset($_GET['subservices'])) {
    $data['subservice'] = $subservices;
}

if ($data) {
    $registered_posts = $data;
} else {
    $registered_posts = $all_data;
}
@endphp


<div class="pr-4 my-2">
    <div class="container-fluid border rounded py-1">
        <h2>SEO Monitor</h2>

        <form id="post_filter" action="">
            <input type="hidden" name="page" value="seo-monitor">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Filter Post Type</label>

                    <div class="row">
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="posts" id="post"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['posts']) ? 'checked' : '' }}>
                                <span class="ml-4">Posts</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="pages" id="page"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['pages']) ? 'checked' : '' }}>
                                <span class="ml-4">Pages</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="locations" id="location"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['locations']) ? 'checked' : '' }}>
                                <span class="ml-4">Locations</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="services" id="service"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['services']) ? 'checked' : '' }}>
                                <span class="ml-4">Services</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="subservices" id="subservice"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['subservices']) ? 'checked' : '' }}>
                                <span class="ml-4">Subservices</span>
                            </label>
                        </div>
                    </div>

                </div>

                <div class="form-group col-md-6">
                    <label for="">Options</label>
                    <div class="row">
                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="status" id="status"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['status']) ? 'checked' : '' }}>
                                <span class="ml-4">View Status</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="author" id="author"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['author']) ? 'checked' : '' }}>
                                <span class="ml-4">View Post Author</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="breadcrumbs" id="breadcrumbs"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['breadcrumbs']) ? 'checked' : '' }}>
                                <span class="ml-4">View Breadcrumbs</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="meta_title" id="meta_title"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['meta_title']) ? 'checked' : '' }}>
                                <span class="ml-4">View Meta Title</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="meta_description"
                                    id="meta_description" value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['meta_description']) ? 'checked' : '' }}>
                                <span class="ml-4">View Meta Description</span>
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label d-flex align-items-center">
                                <input type="checkbox" class="form-check-input" name="index" id="index"
                                    value="true" style="margin-top: 4px;"
                                    {{ isset($_GET['index']) ? 'checked' : '' }}>
                                <span class="ml-4">View Robots Tag Index</span>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-primary">Load Filter</button>
                </div>
            </div>

        </form>

        <hr>

        <table id="permalinks" class="display" style="width:100%;">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Post ID</th>
                    <th>Option</th>
                    <th>Post Permaink</th>
                    <th>Post Type</th>

                    @if (isset($_GET['index']))
                        <th>Indexable</th>
                    @endif

                    @if (isset($_GET['status']))
                        <th>Post Status</th>
                    @endif

                    @if (isset($_GET['author']))
                        <th width="150">Author</th>
                    @endif

                    @if (isset($_GET['breadcrumbs']))
                        <th width="500">Breadcrumbs</th>
                    @endif

                    @if (isset($_GET['meta_title']))
                        <th width="500">Meta Title</th>
                    @endif

                    @if (isset($_GET['meta_description']))
                        <th width="500">Meta Description</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach ($registered_posts as $key => $registered_post)
                    @foreach ($registered_post as $key => $post)
                        @php
                            $meta_title = aioseo()->meta->title->getTitle($post);
                            $meta_description = aioseo()->meta->description->getDescription($post);
                            $aioseo = aioseo()->meta->metaData->getMetaData($post);
                            $indexable = !$aioseo->robots_noindex;
                            
                            $status = '';
                            if ($post->post_status == 'private' && isset($_GET['status'])) {
                                $status = 'style=color:#f0f';
                            }
                            
                        @endphp

                        <tr {{ $status }}>

                            {{-- <td>{{ $key + 1 }}</td> --}}

                            <td>{{ $post->ID }}</td>

                            <td>
                                <a {{ $status }} target="_blank" rel="nofollow"
                                    href="{{ home_url('wp-admin/post.php?post=' . $post->ID . '&action=edit') }}">edit</a>
                            </td>

                            <td>
                                <a {{ $status }} target="_blank" rel="nofollow"
                                    href="{{ get_permalink($post->ID) }}">
                                    {{ str_replace(home_url(), '', get_permalink($post->ID)) }}</a>
                            </td>

                            <td>
                                {{ $post->post_type }}
                            </td>

                            @if (isset($_GET['index']))
                                @if ($indexable)
                                    <td style="background: #00ff0044">
                                        <span>YES</span>
                                    </td>
                                @else
                                    <td style="background: #ff000044">
                                        <span>NO</span>
                                    </td>
                                @endif
                            @endif

                            @if (isset($_GET['status']))
                                <td>
                                    {{ $post->post_status }}
                                </td>
                            @endif

                            {{-- <td></td> --}}

                            @if (isset($_GET['author']))
                                <td width="150">
                                    @if ($post->post_type == 'post')
                                        @php
                                            $user = get_user_by('ID', $post->post_author);
                                        @endphp
                                        {{ ucfirst($user->user_firstname) . ' ' . ucfirst($user->user_lastname) }}
                                    @endif
                                </td>
                            @endif

                            @if (isset($_GET['breadcrumbs']))
                                <td width="500">
                                    @php
                                        $breadcrumbs = get_field('breadcrumb_segments', $post->ID);
                                        $segments = '';
                                        if ($breadcrumbs) {
                                            foreach ($breadcrumbs as $breadcrumb) {
                                                $segments .= '<p><a href="'. $breadcrumb['segment_link'] .'"><strong class="text-danger">' . $breadcrumb['segment_title'] . ':</strong> ' . $breadcrumb['segment_link'] . ' </a></p>';
                                            }
                                        }
                                        echo $segments;
                                    @endphp
                                </td>
                            @endif

                            @if (isset($_GET['meta_title']))
                                <td>{{ $meta_title }}</td>
                            @endif

                            @if (isset($_GET['meta_description']))
                                <td>{{ $meta_description }}</td>
                            @endif

                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    a {
        color: #000;
        text-decoration: none;
    }

    .dtsb-titleRow {
        display: none !important;
    }
</style>

<script>
    $('#permalinks').DataTable({
        order: [
            [3, 'desc']
        ],
        dom: 'Qlftipr',
        responsive: true,
        pageLength: 25
    });
</script>



