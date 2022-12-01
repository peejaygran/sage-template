{{-- shortcode to get display featured image --}}
@php
$link = get_the_post_thumbnail_url(get_the_ID());
@endphp

<figure class="wp-block-image">
    <img  loading="lazy"  src="{{ $link }}" alt="">
</figure>
