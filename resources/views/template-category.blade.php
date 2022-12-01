{{-- Template Name: Category Template --}}

@php
$category = get_category(get_field('category')[0]);
$posts = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'post',
    'category' => $category->cat_ID,
]);

@endphp

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/assets/dist/css/pages/blog.css?v={{ time() }}">

    <div class="container my-5">
        @include('partials/blog/banner')
    </div>

    <div class="container category-container p-5">

        <div class="row">
            <div class="col-lg-8">
                {{-- <h2 class="text-center mb-5">{!! $category->name !!}</h2> --}}

                @include('partials.content-page')

                @if (!$posts)
                    <h1 class="text-center">No Posts Added Yet</h1>
                @endif
                
                <div class="row mx-lg-4">

                    @foreach ($posts as $post)
                        @php
                            $imageUrl = wp_get_attachment_url(2430);
                            if (has_post_thumbnail($post->ID)) {
                                $imageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), '');
                            }
                        @endphp
                        <div class="card p-4">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="w-100"
                                        src="{{ $imageUrl }}"style="object-fit: cover;object-position: center;height: 200;">
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body py-0">
                                        <p class="text-center mb-0 title">
                                            <a href="{{ get_permalink($post->ID) }}">{{ $post->post_title }}</a>
                                        </p>
                                        <div class="excerpt">
                                            <p class="my-0">
                                                {!! get_the_excerpt($post->ID) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

            <div class="col-lg-4 p-0">
                @include('partials.cta.service-dropdown')
                @include('partials.cta.recent-service-posts', ['recent_posts' => $posts])
            </div>

        </div>
    </div>
@endsection

<style>
    .category-container article .card img {
        height: 200px;
        width: 260px;
        border-radius: 6px;
        margin: 0 auto 20px;
    }

    .category-container article .card p.title {
        font-size: 20px;
    }
</style>
