@php
$current_post_categories = get_the_category(get_the_ID());
$posts = get_posts([
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => 'publish',
]);

$related_posts = [];

foreach ($current_post_categories as $category) {
    foreach ($posts as $post) {
        $post_categories = get_the_category($post->ID);

        foreach ($post_categories as $post_category) {
            if ($post_category->cat_ID == $category->cat_ID && $post->ID != get_the_ID() && !isset($related_posts[$post->ID]) && count($related_posts) < 3) {
                $related_posts[$post->ID] = $post;
            }
        }
    }
}

@endphp

<div class="container px-4 recent-posts">
    <h2 class="text-center">Recent Posts</h2>
    <div class="row">

        @foreach ($related_posts as $post)
            @php
                $image = wp_get_attachment_url(2430);
                if (has_post_thumbnail($post->ID)) {
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID), '');
                }
            @endphp

            <div class="col-md-4 my-4">
                <div class="card text-center px-3 py-4 ">
                    <img src="{{ $image }}">
                    <p><a href="{{ get_permalink($post->ID) }}">{{ $post->post_title }}</a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
