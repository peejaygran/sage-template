@php
$professional_company = get_field('company_reliability_block');

@endphp



<div class="container-fluid mb-140 justify-content-center px-3 professional-cleaners">
    <h2 class="text-center mb-5">{{ $professional_company['header'] }}</h2>
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="card col-lg-4 p-4 shadow m-2" style="z-index: 99;">
                <p class="card-title">{{ $professional_company['card'][0]['header'] }}</p>

                <p>{{ $professional_company['card'][0]['description'] }}</p>
            </div>

            <div class="card col-lg-4 p-4 shadow m-2" style="z-index: 99;">
                <p class="card-title">{{ $professional_company['card'][1]['header'] }}</p>
                <p>{{ $professional_company['card'][1]['description'] }}</p>
            </div>
        </div>
        <div class="row cleaners-block" style="justify-content: space-around;transform: translateY(-30px);">
            <div class="card col-lg-4 p-4 shadow m-2">
                <p class="card-title">{{ $professional_company['card'][2]['header'] }}</p>
                <p>{{ $professional_company['card'][2]['description'] }}</p>
            </div>

            <div class="card col-lg-4 p-4 shadow m-2">
                <p class="card-title">{{ $professional_company['card'][3]['header'] }}</p>
                <p>{{ $professional_company['card'][3]['description'] }}</p>
            </div>
        </div>
    </div>
    <img loading="lazy" src="{{ wp_get_attachment_url(3568) }}" class="w-100">


</div>

<style>
    .professional-cleaners p.card-title {
        font-weight: 800;
        font-size: 24px;
        line-height: 140%;
    }
</style>
