@php
$current_category = get_category(get_queried_object()->term_id);
@endphp

@extends('layouts.app')

@section('content')
    <div class="container p-2">

        <div class="container p-5">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="text-center">{{$current_category->name}}</h2>
                    <p>Do you want to know how to prepare and move quickly? Are you trying to find a solution to make moving
                        easier and less stressful? If that’s the case, some of these moving tips could help you start your
                        moving process. Take some time to learn about these brilliant moving tips, tricks, and organising
                        ideas that may help you set the tone for your move.</p>

                    <div class="row">



                        <div class="col-md-10 my-4">
                            <div class="card text-center px-3 py-4 h-100">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="https://sidepost.com.au/wp-content/uploads/2022/06/pick-paint-color.png"
                                            class="w-100">
                                    </div>
                                    <div class="col-8">
                                        <p><a
                                                href="https://sidepost.com.au/advice/how-to-pick-paint-colors-use-paint-to-fix-a-rooms-appearance/">How
                                                to Pick Paint Colors: Use Paint To Fix a Room's Appearance</a>
                                        </p>
                                        <p>insert short description here...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-md-4">
                    @include('partials.cta.category-list')
                </div>
            </div>
        </div>

    </div>
@endsection
