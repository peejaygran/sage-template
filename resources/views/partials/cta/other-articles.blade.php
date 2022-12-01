@php

$current_categories = get_the_category(get_the_ID());
$related_blogs = [];

$posts = get_posts([
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => 'publish',
]);

foreach ($current_categories as $key => $current_category) {
    $current_category->cat_ID;

    foreach ($posts as $post) {
        $post_categories = get_the_category($post->ID);

        foreach ($post_categories as $post_category) {
            if ($post_category->cat_ID == $current_category->cat_ID) {
                if (!isset($related_blogs[$post->ID])) {
                    $related_blogs[$post->ID] = ['id' => $post->ID, 'post_title' => $post->post_title, 'current_categories' => $current_categories, 'categories' => $post_categories];
                }
            }
        }
    }
}

@endphp

<div class="container other-articles my-4">
    <h3 class="text-center">Helping You Every Step with any cleaning job</h3>
    <p class="text-center">Our advice centre features expert guides on cleaning</p>
    <div class="row pt-3">
        <div class="col-md-6 col-lg-6 pb-3 pb-md-0">
            <div class="card p-4">
                <h5 class="text-center">{{ $service[0]->post_title }} Guides</h5>
                <ul class="list-unstyled">

                    @if (!$related_blogs)
                        <li class="text-center">
                            No guides uploaded yet, <a href="{{ home_url('blog') }}">See all guides.</a>
                        </li>
                    @endif
                    @if ($related_blogs)
                        @foreach (array_slice($related_blogs, 0, 5) as $related_blog)
                            <a href="{{ get_permalink($related_blog['id']) }}">
                                <li class="text-left">{!! $related_blog['post_title'] !!}</li>
                            </a>
                        @endforeach
                    @endif
                    {{-- <a href="#">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                    </a>
                    <a href="#">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                    </a>
                    <a href="#">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                    </a> --}}
                </ul>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 pb-3 pb-md-0">
            <div class="card p-4">
                <h5 class="text-center">Pricing Guides</h5>
                <ul class="list-unstyled">
                    <li class="text-center">No guides uploaded yet, <a href="{{ home_url('advice') }}">See all
                            guides.</a>
                    </li>
                    {{-- <a href="#">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    </a>
                    <a href="#">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                    </a>
                    <a href="#">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</li>
                    </a> --}}
                </ul>
            </div>
        </div>

    </div>

    {{-- <div class="text-center my-5">
      <a href="#" class="text-primary mt-4 read-more">
          Read more articles
          <i class="fas fa-arrow-right    "></i>
      </a>
  </div> --}}
</div>

<style>
    .other-articles li {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
