@php
$how_it_works = get_field('faq');

if (isset($params['custom_post_id']) && $params['custom_post_id']) {
    $how_it_works = get_field('faq', $params['custom_post_id']);
}

@endphp

@if ($how_it_works)
    @include('partials/acf-source')
    <div class="container mb-140">
        <div class="row">
            <div class="col-md-6">
                <h1>Most Popular Questions</h1>
            </div>

            <div class="col-md-6">
                @foreach ($how_it_works as $key => $faq)
                    <div class="card rounded-0 bg-lightblue mb-3" data-toggle="collapse"
                        data-target="#faq_collapse_{{ $key }}" style="transition: all 500ms ease-in-out">
                        <div class="card-body">
                            <div class="question-wrapper d-flex justify-content-between align-items-center">
                                <p class="font-weight-bold m-0">{{ $faq['question'] }}</p>
                                <i class="fas fa-angle-down font-weight-bold ml-1"></i>
                            </div>

                            <div id="faq_collapse_{{ $key }}" class="collapse"
                                style="transition: all 500ms ease-in-out">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script>
        defer('jquery', function() {
            $('div[data-toggle="collapse"]').on('click', function() {

                if ($(this).find('i').hasClass('fa-angle-up')) {
                    $(this).addClass('bg-lightblue');
                    $(this).removeClass('shadow');
                    $(this).find('.question-wrapper').removeClass('mb-3');
                    $(this).find('i').removeClass('fa-angle-up');
                    $(this).find('i').addClass('fa-angle-down');

                } else if ($(this).find('i').hasClass('fa-angle-down')) {
                    $(this).removeClass('bg-lightblue');
                    $(this).addClass('shadow');
                    $(this).find('.question-wrapper').addClass('mb-3');
                    $(this).find('i').removeClass('fa-angle-down');
                    $(this).find('i').addClass('fa-angle-up');

                } else {
                    $(this).find('.question-wrapper').removeClass('mb-3');
                    $(this).find('i').removeClass('fa-angle-up');
                    $(this).find('i').addClass('fa-angle-down');
                }
            });
        })
    </script>
@endif
