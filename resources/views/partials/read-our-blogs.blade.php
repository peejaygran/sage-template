@php
$posts = get_posts([
    'numberposts' => 3,
    'post_type' => 'post',
    'post_status' => 'publish',
]);
@endphp

<div class="container read-our-blog mb-140 px-4">
    <h2 class="text-center">Read Our Blog</h2>
    <div class="row pt-sm-5">

        @foreach ($posts as $post)
            
            @php
                $image = wp_get_attachment_url(2430);
                if (has_post_thumbnail($post->ID)) {
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID), '');
                }
            @endphp

            <div class="col-lg-4 px-4 pt-4">
                <img src="{{ $image }}" class=" rounded w-100 mb-4" height="200">
                <p class="h4">{{ $post->post_title }}</p>
                <a href="{{ get_permalink($post->ID) }}">Read More<i class="fas fa-arrow-right mx-2"></i></a>
            </div>
        @endforeach

    </div>
</div>


<style>
    .read-our-blog a {
        color: #2B59C3;
    }

    .read-our-blog p a {
        color: #183B56;
    }
</style>
