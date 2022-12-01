@php
$recent_posts = wp_get_recent_posts(['numberposts' => 5, 'post_type' => 'post', 'post_status' => 'publish']);
@endphp

<div class="card mt-4" style="box-shadow: 0 0 1px rgb(0 0 0 / 0%), 0 1px 3px rgb(0 0 0 / 8%);border: none;">
    <div class="card-body">
        <h4>Recent Posts</h4>

        @foreach ($recent_posts as $post)
            @php
                $image = wp_get_attachment_url(2430);

                if (has_post_thumbnail($post['ID'])) {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']), 'thumbnail')[0];
                }
            @endphp

            <div class="row my-2">

                <div class="col-4 pr-0">
                    <img src="{{ $image }}" width="80" height="55">

                </div>

                <div class="col-8 px-2">
                    <a href="{{ get_permalink($post['ID']) }}">
                        <p>{{ $post['post_title'] }}</p>
                    </a>
                </div>

            </div>
        @endforeach


        <div class="text-center mt-3">
            <a href="">See More</a>
        </div>

    </div>
</div>
