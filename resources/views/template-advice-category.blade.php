<!--
    Template Name: Advice Category
    Template Post Type: Post, Page
-->

@php
$count = 20;
@endphp

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/assets/dist/css/pages/blog.css?v={{ time() }}">
    @while (have_posts())
        @php the_post() @endphp

        <div class="categories py-5">

            <div class="container mb-5">
                @include('partials/blog/banner')
            </div>

            <section class="container py-3">


                <div class="row justify-content-center pl-3">
                    <div class="col-lg-8 pr-4 pl-0">

                        @include('partials/category-listing') 

                        {{-- @php
                            $active_categories = get_the_category();
                            $active_category_ids = [];
                            foreach ($active_categories as $_active_category) {
                                $active_category_ids[] = $_active_category->cat_ID;
                            }
                        @endphp

                        @include('partials/category-listing', [
                            'categories' => $active_category_ids,
                        ]) --}}

                    </div>
                    <div class="col-lg-4 pr-4 pl-0 sidebar-card">

                        @include('partials.cta.service-dropdown')

                        @include('partials.cta.check-prices-card')

                        {{-- @include('partials/cta/recent-posts-card') --}}


                    </div>
                </div>
            </section>
        </div>

        {{-- @include('partials.content-page') --}}
    @endwhile
@endsection


<style>
    .sidebar-card .card ul li a {
        color: #183b56;
        font-weight: 100;
    }

    .container.articles img{
        height: 200px;
    }
</style>
