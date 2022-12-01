@php
$categories = get_categories();
$_categories = [];

$posts = get_posts([
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => 'publish',
]);

@endphp

<div class="card-categories card card-primary card-outline">

    @foreach ($categories as $category)
        @php $_categories[$category->name]['count'] = 0; @endphp

        @foreach ($posts as $post)
            @php
                $post_categories = get_the_category($post->ID);
                
                foreach ($post_categories as $post_category) {
                    if ($post_category->cat_ID == $category->cat_ID) {
                        $image = wp_get_attachment_url(2430);
                        if (has_post_thumbnail($post->ID)) {
                            $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID), '');
                        }
                
                        $_categories[$category->name]['count']++;
                
                        $_categories[$category->name]['post'][] = [
                            'post_id' => $post->ID,
                            'post_title' => $post->post_title,
                            'image_url' => $image,
                            'post_url' => get_permalink($post->ID),
                        ];
                    }
                }
            @endphp
        @endforeach
    @endforeach

    @foreach ($_categories as $key => $_category)
        <div class="card collapsed-card rounded-0 m-0">
            <div class="card-header d-flex align-items-center" data-card-widget="collapse">
                <p class="card-title font-weight-bold">{!! $key !!} ( {{ $_category['count'] }} ) </p>
                <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool font-weight-bold" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">

                @if (!isset($_category['post']))
                    <p class="text-center">No posts added yet.</p>
                @else
                    @foreach ($_category['post'] as $key => $post)
                        <div class="d-flex align-items-center">
                            <img class="rounded mr-2" src="{{ $post['image_url'] }}" alt="" width="40"
                                height="30">
                            <p class="inline-block small m-0">
                                <a href="{{ $post['post_url'] }}"> {!! $post['post_title'] !!}
                                </a>
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach

</div>