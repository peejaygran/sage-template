<!--
Template Name: Author Template
Template Post Type: Authors
-->

@php
$author_id = get_field('author_id');
$user = get_user_by('ID', $author_id);
$posts = get_posts();

$author_posts = [];
foreach ($posts as $key => $post) {
    if ($post->post_author == $author_id) {
        $author_posts[] = $post;
    }
}

@endphp

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        @include('partials.content-page')

        <div class="container author px-md-6">
            <div class="author mx-2 my-4 d-flex row  px-2">
                <div class="d-flex align-items-center justify-content-center col-md-2 my-2">
                    <img loading="lazy" src="{{ get_avatar_url($author_id) }}" alt=""
                        style="width: 120px!important;height: 120px!important;border-radius: 75px; display:none">
                    {!! get_avatar($author_id, 150, '', '', ['class' => 'author-img']) !!}
                </div>
                <div class="col-md-10 px-0">
                    <h1 class="author-header-name text-center text-md-left">
                        <a href="https://sidepost.com.au/authors/andrew/">
                            By {{ ucwords($user->user_firstname . ' ' . $user->user_lastname) }}
                        </a>

                    </h1>
                    {{-- <p class="h5 text-center text-md-left">Content Manager</p> --}}
                    <p class="col-md-11 p-0">
                        {{ $user->user_description }}
                    </p>



                </div>
            </div>
        </div>

        @foreach ($author_posts as $post)
            @php
                $image_url = wp_get_attachment_url(2430);
                if (has_post_thumbnail($post->ID)) {
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), '');
                }
            @endphp

            <div class="container written-pages px-4 px-md-6">
                <div class="container p-sm-0 px-md-6">
                    <div class="row px-md-6 py-5 page">
                        <div class="col-md-7">
                            <h2> {{ $post->post_title }}</h2>
                            <p class="short-description">
                                {!! get_the_excerpt($post->ID) !!}
                            </p>
                            <p class="author">BY {{ strtoupper($user->user_firstname . ' ' . $user->user_lastname) }}</p>
                        </div>

                        <div class="col-md-5">
                            <img src="{{ $image_url }}" class="w-100"
                                style="height: 250px; object-fit: cover; object-position: center">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endwhile
@endsection



<style>
    .author-img {
        border-radius: 50%;
    }

    .container.written-pages .row.page {
        border-top: 1px solid #e4e3e3;
    }
</style>
