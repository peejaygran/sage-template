<!--
    Template Name: Blog Template
    Template Post Type:  Post, Page

-->


@php
wp_get_recent_posts();
$author = get_userdata(get_post()->post_author);
@endphp

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/assets/dist/css/pages/blog.css?v={{ time() }}">

    @while (have_posts())
        @php the_post() @endphp

        <div class="container px-3 pt-5">

            @php
                $title = get_the_title();
            @endphp

            <h1>@php echo $title @endphp</h1>

        </div>

        <div class="container blog-content px-3 ">
            <div class="row justify-content-between">

                <div class="col-md-8 main-content">
                    <div class="author d-flex align-items-center mx-2 my-3">
                        <img class="mr-2" loading="lazy" src="{{ get_avatar_url($author->ID) }}" alt=""
                            style="width: 40px!important;height: 40px!important;border-radius: 25px;transform: translateY(-3px);">
                        <p>
                            <a href="{{ get_author_posts_url($author->ID) }}">
                                By {{ ucwords($author->display_name) }}
                            </a>
                            <span class="mx-2">{{ date('M d Y', strtotime(get_post()->post_modified_gmt)) }}</span>
                        </p>
                    </div>

                    <div>

                        @php
                            
                            $featured_img_url = get_the_post_thumbnail_url(null, 'large');
                            echo '<a class="featured-image" href="' . esc_url($featured_img_url) . '" rel="nofollow">';
                            the_post_thumbnail('large');
                            echo '</a>';
                            
                        @endphp

                        @include('partials.content-page')
                    </div>

                </div>

                <div class="col-md-4 mt-5 px-3 ">
                    @include('partials.cta.service-dropdown')

                    @include('partials.cta.check-prices-card')
                </div>
            </div>
        </div>

        @include('partials.cta.recent-post-block')
    @endwhile
@endsection

<style>
    @media screen and (min-width: 768px) {
        .p-md-custom {
            padding: 3rem 7rem !important;
        }
    }

    .featured-image img{
        margin-bottom: 20px;
    }

</style>
