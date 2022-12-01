
@php

$active_categories = get_the_category();

// echo '<pre>';
// print_r($active_categories);
// echo '</pre>';
// die();

$IDs = array_column($active_categories,'name' );
$posts = get_posts_by_categories($IDs);

global $post;

@endphp

<div class="other-posts container pb-4">
  <div class="card">
      <h4 class="text-center">Other Posts</h4>

      <ul>


        @foreach ($posts as $post)

            <li>
              <a href="{{ get_permalink() }}">

                  <div class="row my-2">
                    <div class="col-sm-3 col-lg-4 col-md-3 mb-3">
                      {!! the_post_thumbnail( 'thumbnail', [ 'class' => 'w-100' ] ) !!}
                    </div>

                    <div class="col-sm-9 col-lg-8 col-md-9">
                      {!! get_the_title() !!}
                    </div>

                  </div>

                </a>
            </li>

        @php  wp_reset_postdata();   @endphp
        @endforeach

      </ul>

  </div>
</div>
