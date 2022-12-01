<!--
    Template Name: Profile Template
-->

@php
$company_details = json_decode(file_get_contents('https://whatremovals.co.uk/dashboard/operators/get_profile/' . get_field('company_id')));
$company = $company_details->profile;
$reviews = $company_details->reviews;
@endphp

<script>
    var map_location = `{{ $company->rmv_address }}`;
</script>

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp

        <div class="template-profile">
            <div class="container">
                <!-- Heading Row-->
                <div class="row gx-4 gx-lg-5 align-items-center border-bottom my-5 pb-5">
                    <div class="col-lg-3 d-flex align-items-center justify-content-center" style="height:200px;">
                        <img  loading="lazy" class="img-fluid rounded max-100 mb-4 mb-lg-0" src="{!! $company->rmv_logo !!}" alt="">
                    </div>
                    <div class="col-lg-9">
                        <h1 class="font-weight-light text-center text-lg-left">{!! get_the_title() !!}</h1>
                        @if ($company->rmv_pitch)
                            <p class="px-3">
                                {!! $company->rmv_pitch !!}
                            </p>
                        @else
                            <p class="px-3">
                                {!! $company->rmv_short_description !!}
                            </p>
                        @endif
                        <div class="col-8 col-md-4 mx-auto mx-lg-0">
                            <a href="https://whatremovals.co.uk/enquiries?company={{ get_field('company_id') }}"
                                role="button" target="_blank" rel="no-follow" class="btn wp-orange w-100">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">

                    <div class="col-md-4">

                        <h3 class="text-center font-weight-bold">Services</h3>

                        @if ($company->rmv_leads)
                            @if (in_array(1, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-building circle-badge mr-1" title="Apartment / Flat moves"></i> --}}
                                    Apartment / Flat moves
                                </p>
                            @endif
                            @if (in_array(2, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-home circle-badge mr-1" title="House Moves"></i> --}}
                                    House Moves
                                </p>
                            @endif
                            @if (in_array(3, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-home circle-badge mr-1" title="Bungalow"></i> --}}
                                    Bungalow
                                </p>
                            @endif
                            @if (in_array(4, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-warehouse circle-badge mr-1" title="Moves from / to a Storage Facility"></i> --}}
                                    Moves from / to a Storage Facility
                                </p>
                            @endif
                            @if (in_array(5, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-couch circle-badge mr-1" title="Single or Multiple Furniture"></i> --}}
                                    Single or Multiple Furniture
                                </p>
                            @endif
                            @if (in_array(7, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-warehouse-alt circle-badge mr-1" title="Storage Unit"></i> --}}
                                    Storage Unit
                                </p>
                            @endif
                            @if (in_array(8, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-phone-office circle-badge mr-1" title="Office"></i> --}}
                                    Office
                                </p>
                            @endif
                            @if (in_array(9, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-trash circle-badge mr-1" title="Rubbish Clearance"></i> --}}
                                    Rubbish Clearance
                                </p>
                            @endif
                            @if (in_array(10, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-info-circle circle-badge mr-1" title="Others"></i> --}}
                                    Others
                                </p>
                            @endif
                            @if (in_array(11, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-car circle-badge mr-1" title="Car Transport"></i> --}}
                                    Car Transport
                                </p>
                            @endif
                            @if (in_array(12, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-motorcycle circle-badge mr-1" title="Motobike Transport"></i> --}}
                                    Motobike Transport
                                </p>
                            @endif
                            @if (in_array(13, json_decode($company->rmv_leads)))
                                <p class="text-center">
                                    {{-- <i class="fas fa-shopping-cart circle-badge mr-1" title="Purchase Deliveries"></i> --}}
                                    Purchase Deliveries
                                </p>
                            @endif
                        @else
                            <p class="text-center">Services unavailable at the moment</p>
                        @endif
                    </div>

                    <div class="col-md-8">
                        {{-- @include('partials.initmap') --}}
                        <div id="local_map" class="border" style="height: 400px;"></div>
                    </div>
                </div>

                @if ($company->rmv_description)
                    <div class="row gx-4 gx-lg-5">

                        <div class="col-md-4 p-0 order-md-1">

                            @include('partials.profile.company-details')

                            @include('partials.profile.business-hour')

                        </div>


                        <div class="col-md-8 order-md-0 px-3 pr-md-5 pb-2">

                            <h4 class="font-weight-bold text-center">Overview</h4>
                            {!! stripslashes($company->rmv_description) !!}

                            @include('partials.profile.gallery')

                            @include('partials.profile.reviews')

                        </div>

                    </div>
                @endif

            </div>

            @include('partials.cta.get_quotes')
        </div>
    @endwhile
@endsection
