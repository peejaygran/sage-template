@php

if ((isset($_GET['view_page']) && !is_numeric($_GET['view_page'])) || (isset($_GET['view_page']) && $_GET['view_page'] == 1)) {
    header('Location: ' . home_url('advice'));
    die();
}

$offset = 0;
if (isset($_GET['view_page'])) {
    $offset = 10 * ($_GET['view_page'] - 1);
}

$posts = wp_get_recent_posts([
    'numberposts' => -1,
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'offset' => $offset,
]);

if (!$posts) {
    header('Location: ' . home_url('advice'));
    die();
}

$total_posts = count(
    get_posts([
        'numberposts' => -1,
        'post_type' => 'post',
        'post_status' => 'publish',
    ]),
);

$posts_pages = ceil($total_posts / 10);
@endphp




<div class="blog-cards">

    @foreach ($posts as $post)
        @php
            
            setup_postdata($post);
            
            $image_url = wp_get_attachment_url(2430);
            if (has_post_thumbnail($post['ID'])) {
                $image_url = wp_get_attachment_url(get_post_thumbnail_id($post['ID']), '');
            }
            
        @endphp

        <article class="container-fluid articles rounded mb-4 px-3">
            <div class="row p-3">

                <div class="col-lg-5 pb-4 d-flex align-items-center">

                    <img src="{{ $image_url }}" alt="" class="w-100 rounded">

                </div>

                <div class="col-12 col-lg-7">

                    <header>
                        <h4 class="entry-title"><a
                                href="{{ get_permalink($post['ID']) }}">{{ $post['post_title'] }}</a></h4>
                    </header>

                    <p class="entry-summary">
                        {{-- {!! the_excerpt() !!} --}}
                        {!! get_the_excerpt($post['ID']) !!}

                    </p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 p-0">
                                <time class="updated" datetime="{{ date('c', strtotime($post['post_date'])) }}">
                                    {{ date('M d, Y', strtotime($post['post_date'])) }}
                                </time>
                            </div>
                            <div class="col-6 p-0">
                                <a href="{{ get_permalink($post['ID']) }}" class="float-right">
                                    Read more
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        @php  wp_reset_postdata();   @endphp
    @endforeach

</div>


<nav aria-label="Page navigation">
    <ul class="pagination justify-content-end">
        <li class="page-item prev"><a class="page-link" href="#">Previous</a></li>

        @for ($index = 1; $index <= $posts_pages; $index++)
            @php
                $active_page = '';
                if (isset($_GET['view_page']) && $_GET['view_page'] == $index) {
                    $active_page = 'active main_view';
                }
                
                if (!isset($_GET['view_page']) && $index == 1) {
                    $active_page = 'active main_view';
                }
                
            @endphp

            <li class="page-item page d-none {{ $active_page }}">
                <button class="page-link page-count"
                    data-url="{{ $index == 1 ? home_url('advice') : home_url('advice?view_page=' . $index) }}">
                    {{ $index }}
                </button>
            </li>
        @endfor

        <li class="page-item next"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>


<script>
    defer('jquery', function() {

        $(document).ready(function() {
            $('.page-count').on('click', function() {
                window.location.href = $(this).attr('data-url');
            });

            let page_length = 0;
            prev_page_length = $('ul.pagination li.page.active').prevAll('.page').slice(0, 5).length;
            debugger;
            $('ul.pagination li.page.active').removeClass('d-none');
            let viewElements = $('ul.pagination li.page.active').prevAll('.page').slice(0, 5).add($(
                    'ul.pagination li.page.active').nextAll('.page')
                .slice(0, 9 - prev_page_length));
            $(viewElements).each(function(index, element) {
                $(element).removeClass('d-none');
            });
        });

        $('ul.pagination li.prev').on('click', function(e) {
            e.preventDefault();

            if ($('ul.pagination li.page.main_view').prev('.page').length) {
                $('ul.pagination li.page').each(function(index, element) {
                    $(element).addClass('d-none');
                    if ($(element).hasClass('main_view')) {
                        $(element).prev().addClass('main_view');
                        $(element).removeClass('main_view');
                    }
                });

                let next_page = $('ul.pagination li.page.main_view').nextAll().slice(0, 9);
                $('ul.pagination li.page.main_view').removeClass('d-none')
                $(next_page).each(function(index, element) {
                    $(element).removeClass('d-none');
                });
            }

        });

        $('ul.pagination li.next').on('click', function(e) {
            e.preventDefault();

            debugger;
            let next_page = $('ul.pagination li.page.main_view').nextAll().slice(0, 10);

            if ($('ul.pagination li.page.main_view').next('.page').length && next_page.length >= 10) {

                let move_next = false;

                $('ul.pagination li.page').each(function(index, element) {
                    $(element).addClass('d-none');
                    if ($(element).hasClass('main_view') && !move_next) {
                        move_next = true;
                        $(element).next().addClass('main_view');
                        $(element).removeClass('main_view');
                    }
                });

                $('ul.pagination li.page.main_view').removeClass('d-none')
                $(next_page).each(function(index, element) {
                    $(element).removeClass('d-none');
                });
            }
        });

    });
</script>

<style>
    .articles {
        box-shadow: 0 0 1px rgb(0 0 0 / 0%), 0 1px 3px rgb(0 0 0 / 8%);
    }

    .articles a {
        color: #2B59C3;
    }
</style>
