<link rel="stylesheet"  href="/assets/dist/css/pages/blog.css" type="text/css">

<div class="blog-page pt-5">

    <div class="container">
        <div class="row">

            <div class="col-lg-8 pr-lg-4 pb-5">

                <article @php post_class() @endphp>



                    <header>
                        <h1 class="entry-title">{!! get_the_title() !!}</h1>
                        @include('partials/entry-meta')
                    </header>


                    <div class="pb-4">
                        {!!  get_the_post_thumbnail() !!}
                    </div>



                    <div class="entry-content">
                        @php the_content() @endphp
                    </div>
                    <footer>
                        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
                    </footer>
                    @php comments_template('/partials/comments.blade.php') @endphp

                </article>
                {{-- @include('partials/cta/compare-companies') --}}

            </div>

            <div class="col-lg-4 pl-lg-4">
                @include('partials/cta/category-list')
                {{-- @include('partials/cta/other-posts')
                @include('partials/cta/search-box')

                @include('partials/cta/follow-us') --}}

            </div>

        </div>
    </div>

</div>
