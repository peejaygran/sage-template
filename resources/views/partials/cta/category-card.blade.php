@php

// echo '<pre>';
// print_r($params);
// echo '</pre>';


@endphp

@php


    $posts =  get_posts_by_categories(  [  $params["category"] ] );
    global $post;
@endphp

       <div class="card p-4">
        <div class="row my-2">
            <div class="col-md-7">

                    <a href="{{ $params["link"]  }}">
                    <h2>{{ $params["title"]  }}</h2>
                    </a>


                <span>{{ count($posts) }} Articles</span>
                <p> {{  $params["content"] }}</p>
                <a href="{{ $params["link"]  }}">Read this guide</a>
            </div>

            <div class="col-md-5">
                <ul>



                    @foreach ($posts as $key => $post)

                        @php
                            setup_postdata( $post );

                        @endphp

                        @if ($key < $params["max"] )




                            <li>
                                <a href="{{ get_permalink() }}}">
                                    <div class="row my-2">
                                        <div class="col-3">

                                            {!! the_post_thumbnail( 'thumbnail', [ 'class' => 'w-100' ] ) !!}
                                        </div>
                                        <div class="col-9">
                                            {!! get_the_title() !!}
                                        </div>
                                    </div>
                                </a>
                            </li>

                        @endif



                        @php  wp_reset_postdata();   @endphp

                    @endforeach

                </ul>

                <div class="more">
                    <a href="{{ $params["link"]  }}"> More <i class="fa fa-fw fa-arrow-right"></i> </a>
                </div>
            </div>
        </div>
       </div>

