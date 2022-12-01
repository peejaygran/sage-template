@php

if (isset($custom_post_id)) {
    $faq_items = get_field('faq', $custom_post_id);
}

if (!isset($custom_post_id)) {
    $faq_items = get_field('faq');
}

// $categories = wp_get_post_categories(get_the_ID());
// $category = $categories ? get_cat_name($categories[0]) : '';


@endphp


<div id="faq-block" class="container faq-block pb-5" style="padding-bottom: 84px;">
    @include('partials/acf-source')

    {{-- <h2 class="text-center pb-4"> Frequently Asked Questions {{ $category ? 'about ' . $category : '' }} </h2> --}}
    <h2 class="text-center pb-4"> Frequently Asked Questions </h2>
    <div class="row faq-rows">
        @foreach ($faq_items as $key => $faq)
            <div class="col-md-6 p-4 {{ $key >= 4 ? 'd-none' : '' }}">
                <h3>Q: {{ $faq['question'] }}</h3>
                <p>A: {{ $faq['answer'] }}
                </p>
            </div>
        @endforeach
    </div>

    <div class="faq-expand text-center view-all-box text-primary read-more my-5" role="button">
        See all questions <i class="fas fa-arrow-down mx-2"></i>
    </div>
</div>
</div>

<script>

defer('jquery', function(){

    $('.faq-block .faq-expand').on('click', function() {

        if (!$('.faq-rows.expanded').length) {
            $('.faq-block .faq-rows div').each(function(index, element) {
                $(element).removeClass('d-none');
            });
            $('.faq-rows').addClass('expanded');
            $(this).html('Hide other questions <i class="fas fa-arrow-up mx-2"></i>');
        } else {
            $('.faq-block .faq-rows div').each(function(index, element) {
                if (index >= 4) {
                    $(element).addClass('d-none');
                }
            });
            $('.faq-rows').removeClass('expanded');
            $(this).html('See all questions <i class="fas fa-arrow-down mx-2"></i>');
        }
    });
})

</script>
