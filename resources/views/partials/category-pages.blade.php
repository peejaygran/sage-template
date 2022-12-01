@php


    // $query = new WP_Query( array( 
    //                                 'meta_key' => '_wp_page_template'
    //                                 , 'meta_value' => 'views/template-category.blade.php' 
    //                             ) );
    // $posts = $query->posts;


    $posts = get_pages( [
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'views/template-category.blade.php'
                        ]
                    );


    // echo '<pre>';
    // print_r($pages);
    // echo '</pre>';
    // die();
    function my_excerpt_length($length){
        return 30;
    }

    add_filter('excerpt_length', 'my_excerpt_length');

    global $post;

@endphp



<div class="container category-pages">

   <h2>Related articles</h2>

  <div class="row">

    @foreach ($posts as $post)

    @php  
      
      setup_postdata( $post );  
     
    @endphp

        <article {{ post_class("col-sm-3" ) }}>
          <div class="card">
            {!! the_post_thumbnail( 'thumbnail', [ 'class' => 'w-100' ] ) !!}
            
            <div class="card-body">

                <header>
                  <h5 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h5>
                </header>
                
                <div class="entry-summary">
                  {!! the_excerpt() !!}
                </div>
                
            </div>

          </div>

        </article>
      



    @php  wp_reset_postdata();   @endphp 
    @endforeach

  </div>
</div>