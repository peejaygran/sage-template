@php
$posts = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'post',
]);
$pages = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'page',
]);
$services = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'service',
]);
$locations = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'location',
]);
@endphp

<div class="container">
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-striped ">
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>POST TYPE</th>
                </tr>

                @foreach (array_merge($posts, $pages, $services, $locations) as $post)
                    <tr>
                        <td>{{ $post->ID }}</td>
                        <td>{{ $post->post_title }}</td>
                        <td>
                            <form action="">
                                <select class="form-control" name="post_type">
                                    <option value="" selected>{{ $post->post_type }}</option>
                                </select>
                                <input type="hidden" name="post_id" value="{{ $post->ID }}">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>
</div>
