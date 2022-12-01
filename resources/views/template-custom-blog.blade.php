<!--
    Template Name: Custom Blog Template
    Template Post Type:  Post, Page

-->

@section('assets')
    @include('partials.imports.datatables')
@endsection

@php
wp_get_recent_posts();
$author = get_userdata(get_post()->post_author);
@endphp

@extends('layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="/assets/dist/css/pages/blog.css?v={{ time() }}"> --}}

    @while (have_posts())
        @php the_post() @endphp

        <div class="container custom-blog-content p-5">
            <h1>{!! get_the_title() !!}</h1>

            <div class="author d-flex align-items-center mx-2 my-4">
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
                @include('partials.content-page')
            </div>

        </div>
    @endwhile
@endsection

<style>
    .custom-blog-content h2,
    .custom-blog-content h4 {
        padding: 10px 0;
    }

    /*.custom-blog-content h2{
        text-align: center;
    } */
    @media screen and (min-width: 768px) {
        .p-md-custom {
            padding: 3rem 7rem !important;
        }
    }
</style>
