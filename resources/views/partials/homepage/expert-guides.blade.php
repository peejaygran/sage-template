<div class="container my-5 pb-5 expert-guides">
    <h3 class="text-center">Learn the ins and outs of home maintenance</h3>
    <p class="text-center mb-5">Our advice centre features expert tips and guides on everything from cleaning to carpet
        installation.</p>

    <div class="row mb-4 justify-content-center">

        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="ml-4">Recent Articles</h4>
                    <ul class="px-4">

                        @php
                            $recent_posts = wp_get_recent_posts(['numberposts' => 5, 'post_status' => 'publish']);
                        @endphp

                        @if (empty($recent_posts))
                            <li class="text-center">
                                No guides uploaded yet, <a href="{{ home_url('blog') }}">See all guides.</a>
                            </li>
                        @endif

                        @foreach ($recent_posts as $recent_post)
                            <a href="{{ get_permalink($recent_post['ID']) }}">
                                <li>{{ $recent_post['post_title'] }}</li>
                            </a>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="ml-4">Most Popular Guides</h4>

                    @php
                        $posts = get_posts([
                            'numberposts' => 5,
                            'orderby' => [
                                'meta_value_num' => 'DESC',
                                '(comment_count * 10)' => 'DESC',
                            ],
                        ]);
                    @endphp

                    <ul class="px-4">
                        @if (!$posts)
                            <li class="text-center">
                                No guides uploaded yet, <a href="{{ home_url('blog') }}">See all guides.</a>
                            </li>
                        @endif

                        @foreach ($posts as $post)
                            <li>
                                <a href="{{ get_permalink($post->ID) }}">{{ $post->post_title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="d-flex justify-content-center">

        <a href="" class="text-primary mt-4 font-weight-bold">
            See all services
            <i class="fas fa-arrow-right    "></i>
        </a>

    </div> --}}
</div>

<style>
    .expert-guides li {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
