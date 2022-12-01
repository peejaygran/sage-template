<div class="category-list container pb-4">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Categories</h4>

            <ul class="list-unstyled">

                @php
                    $categories = get_categories();
                @endphp

                @foreach ($categories as $category)
                    @php
                        $posts = get_posts([
                            'numberposts' => -1,
                            'post_status' => 'publish',
                            'post_type' => 'post',
                            'category' => $category->cat_ID,
                        ]);
                    @endphp
                    <li>
                        <a href="{{ site_url() }}/advice/{{ $category->slug }}">{!! $category->name !!}</a>
                        ({!! count($posts) !!})
                    </li>
                @endforeach

            </ul>

        </div>
    </div>
</div>
