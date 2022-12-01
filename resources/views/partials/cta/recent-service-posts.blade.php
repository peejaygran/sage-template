<div class="card mt-4" style="box-shadow: 0 0 1px rgb(0 0 0 / 0%), 0 1px 3px rgb(0 0 0 / 8%);border: none;">
    <div class="card-body">
        <h4>Recent Posts</h4>

        @if (empty($recent_posts))
            <p class="text-center">No recent posts yet</p>
        @else
            @foreach ($recent_posts as $post)
                @php
                    
                    $image = wp_get_attachment_url(2430);
                    
                    if (has_post_thumbnail($post->ID)) {
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')[0];
                    }
                @endphp

                <div class="row align-items-center my-2">

                    <img src="{{ $image }}" width="50" height="40">

                    <div class="col-8 px-2">
                        <a href="{{ get_permalink($post->ID) }}">
                            <p class="small m-0">{{ $post->post_title }}</p>
                        </a>
                    </div>

                </div>
            @endforeach
        @endif


        <div class="text-center mt-3">
            <a href="">See More</a>
        </div>

    </div>
</div>
