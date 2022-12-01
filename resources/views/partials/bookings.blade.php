@php
$latest_bookings = get_field('latest_booking');
@endphp

<div class="row py-3">

    <div class="col-lg-4">
        <div class="card my-3">
            <div class="card-body">
                <h5>{{ $latest_bookings['first_booking']['header'] ?: 'Small house' }}</h5>
                <div class="mt-3 mb-4">
                    <span><i class="fas fa-map-marker-alt mr-2"></i>{{ $location }}</span>
                    <span class="m-2">
                        <i
                            class="fas fa-calendar-alt ml-3 mr-2"></i>{{ $latest_bookings['first_booking']['date'] ?: '9 Jan, 2021' }}
                    </span>
                </div>

                <p>{{ $latest_bookings['first_booking']['description'] ?: '2 bedrooms and bathroom that need to be cleaned on a weekly basis. Surfaces need dusting and wiping.' }}
                </p>
                <p>Service: <strong>{{ $latest_bookings['first_booking']['service'] ?: 'Regular Cleaning' }}</strong>
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card my-3">
            <div class="card-body">
                <h5>{{ $latest_bookings['second_booking']['header'] ?: 'Small house' }}</h5>
                <div class="mt-3 mb-4">
                    <span><i class="fas fa-map-marker-alt mr-2"></i>{{ $location }}</span>
                    <span class="m-2">
                        <i
                            class="fas fa-calendar-alt ml-3 mr-2"></i>{{ $latest_bookings['second_booking']['date'] ?: '15 April, 2021' }}
                    </span>
                </div>

                <p>{{ $latest_bookings['second_booking']['description'] ?: '3 bedrooms, 2 living areas and 2 bathrooms to be cleaned every 2 weeks. I would also like the windows cleaned on a quarterly basis.' }}
                </p>
                <p>Service:
                    <strong>{{ $latest_bookings['second_booking']['service'] ?: 'Regular Cleaning + Window Cleaning (Quarterly)' }}</strong>
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card my-3">
            <div class="card-body">
                <h5>{{ $latest_bookings['third_booking']['header'] ?: 'Small house' }}</h5>
                <div class="mt-3 mb-4">
                    <span><i class="fas fa-map-marker-alt mr-2"></i>{{ $location }}</span>
                    <span class="m-2">
                        <i
                            class="fas fa-calendar-alt ml-3 mr-2"></i>{{ $latest_bookings['third_booking']['date'] ?: '16 May, 2021' }}
                    </span>
                </div>

                <p>{{ $latest_bookings['third_booking']['description'] ?: 'I am looking for a one-off deep clean of my 4 bedroom house in preparation for a party.' }}
                </p>
                <p>Service:
                    <strong>{{ $latest_bookings['third_booking']['service'] ?: 'One-Off Deep Cleaning' }}</strong>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row second-block">
    <div class="col-6 col-lg-3">
        <div class="card text-center my-3">
            <div class="card-body">
                <p class="m-0"><strong>300+</strong></p>
                <p>Jobs done/month</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card text-center my-3">
            <div class="card-body">
                <p class="m-0"><strong>700+</strong></p>
                <p>Home spruced up</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card text-center my-3">
            <div class="card-body">
                <p class="m-0"><strong>1500+</strong></p>
                <p>Unique properties cleaned</p>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card text-center my-3">
            <div class="card-body">
                <p class="m-0"><strong>300+</strong></p>
                <p>Average job duration</p>
            </div>
        </div>
    </div>
</div>
@include('partials.cta.check-price')
