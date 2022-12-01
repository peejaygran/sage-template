<h4 class="font-weight-bold mt-4">Company Reviews</h4>

@foreach ($reviews as $key => $review)
    @php
        if ($key >= 5) {
            break;
        }
    @endphp

    <div id="post-review-{{ $review->review_id }}" class="post">
        <div class="user-block">
            @if ($review->profile_photo_url && $review->review_type == 'google')
                <img class="img-circle img-bordered-sm" src="{{ $review->profile_photo_url }}" alt="user image">
            @else
                <span class="img img-circle img-bordered-sm overflow-hidden" role="img">
                    <div
                        class="wp-orange d-flex align-items-center justify-content-center text-center rounded-circle w-100 h-100">
                        {{ $review->author_name[0] }}</div>
                </span>
            @endif
            <span class="username">
                <a href="{{ $review->author_url }}"> {{ $review->author_name }}</a>
                {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
            </span>
            {{-- <span class="description">Shared publicly - 7:30 PM today</span> --}}
            <span class="description">Shared publicly -
                {{ date('F j, Y', strtotime($review->review_datetime)) }}</span>
        </div>

        <p class="small">
            {{ $review->review_content }}
        </p>
        <p>
            <a href="#" class="link-black text-sm mr-2">
                {!! generate_stars($review->review_rating) !!}
            </a>
            {{-- <a href="#" class="link-black text-sm">
                Reviewed by {{ ucfirst($review->review_type) }}
            </a> --}}

            @if ($review->review_type)
                <span class="float-right">
                    <a href="#" class="link-black text-sm">
                        Reviewed on {{ ucfirst($review->review_type) }}
                        {{-- <i class="far fa-comments mr-1"></i> Comments (0) --}}
                    </a>
                </span>
            @endif
        </p>
        {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
    </div>
@endforeach

<style>
    .user-block span.img {
        float: left;
        height: 40px;
        width: 40px;
        over
    }

</style>
