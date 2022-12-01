{{-- Template Name: Location Template --}}



@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        @include('partials.content-page')


        <div class="container location-page-banner py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1>House Cleaning Sydney - Home Cleaning in Sydney Near You</h1>
                    <h2>Book qualified and experienced cleaners in Sydney today</h2>
                    <div class="row mt-3">

                        <div class="col-11">
                            <p>
                                <i class="fa fa-check mr-2"></i>
                                Performed by highly trained and professional
                            </p>
                            <p>
                                <i class="fa fa-check mr-2"></i>
                                A 7-days-per-week flexible schedule,even
                            </p>
                            <p>
                                <i class="fa fa-check mr-2"></i>
                                Environmentally safe, Efficient 7 Budget friendly
                            </p>
                            <p>
                                <i class="fa fa-check mr-2"></i>
                                Parts of your home cleaned
                            </p>
                            <p>
                                <i class="fa fa-check mr-2"></i>
                                No minimum contract
                            </p>
                            <p>
                                <i class="fa fa-check mr-2"></i>
                                Easy online management of your service
                            </p>
                        </div>
                    </div>


                    @include('partials.cta.search-button')



                    <p class="small pt-2">
                        <strong>Excellent</strong>
                        <span class="star-block-review">
                            <i class="fas fa-star full-star"></i>
                            <i class="fas fa-star full-star"></i>
                            <i class="fas fa-star full-star"></i>
                            <i class="fas fa-star full-star"></i>
                            <i class="fas fa-star half-star"></i>
                        </span>
                        over <strong>120</strong> reviews on <i class="fas fa-star half-star" style="color: teal;"></i>
                        <strong>Trustpilot</strong>
                    </p>
                </div>
                <div class="col-md-6 d-none d-lg-flex">
                    <img src="https://sidepost.com.au/wp-content/uploads/2022/04/cleaner-scaled.jpg"
                        alt="location-banner" loading="lazy" width="100%" height="100%" class="border">
                </div>
            </div>
        </div>


        @include('partials.menu-block')



        <div class="container p-5 how-it-works text-center">
            <p>How it works</p>
            <h2 class="text-center">Hassle-free House cleans</h2>
            @include('partials.how-it-works')
            <div class="justify-content-center d-flex my-4">
                {{-- <a href="#" class="btn text-white btn-warning">Find your cleaner</a> --}}
                <p class="d-md-block text-center h6 pt-4">
                    <a href="{{ $quote_url }}"
                        class="btn text-light btn-lg btn-primary px-5 py-2_5 link-checked">
                        Check Prices and Availability
                    </a>
                </p>
            </div>
        </div>

        <div class="container p-5">
            <h2 class="text-center">Explore the selection of cleaning services that we provide in Sydney</h2>
            <p>Lorem ipsum dolor sit amet. Et minima saepe in quas neque qui unde commodi. Sit dolorem fuga vel perferendis
                neque
                qui galisum quod et omnis ipsum est ratione alias hic dolor vitae est fugit asperiores. Eos odio Quis qui
                unde eius
                vel maiores iste qui quia dicta.</p>

            <h3>End of lease cleaning</h3>
            <p>Lorem ipsum dolor sit amet. Et minima saepe in quas neque qui unde commodi. Sit dolorem fuga vel perferendis
                neque
                qui galisum quod et omnis ipsum est ratione alias hic dolor vitae est fugit asperiores. Eos odio Quis qui
                unde eius
                vel maiores iste qui quia dicta.</p>

            <h3>Upholstery cleaning</h3>
            <p>Lorem ipsum dolor sit amet. Et minima saepe in quas neque qui unde commodi. Sit dolorem fuga vel perferendis
                neque
                qui galisum quod et omnis ipsum est ratione alias hic dolor vitae est fugit asperiores. Eos odio Quis qui
                unde eius
                vel maiores iste qui quia dicta.</p>

            <h3>Spring cleaning</h3>
            <p>Lorem ipsum dolor sit amet. Et minima saepe in quas neque qui unde commodi. Sit dolorem fuga vel perferendis
                neque
                qui galisum quod et omnis ipsum est ratione alias hic dolor vitae est fugit asperiores. Eos odio Quis qui
                unde eius
                vel maiores iste qui quia dicta.</p>
        </div>


        @include('partials.main-services.included-services')

        @include('partials.bookings')

        <div class="container py-4">
            <h2 class="text-center">Other Cleaning Services we Offer</h2>
            <p class="px-5 text-center">Whatever your cleaning needs are, we've got you covered. Click through to find out
                more about our range of cleaning services. You can also click here to calculate the price of your cleaning
                service.
            </p>

            @include('partials.main-services.other-cleaning-services')
            <p class="text-center">Housekeeping services</p>
        </div>

        <div class="container p-5">
            <h3>Why book a home Sydney cleaning services with Sidepost?</h3>
            <div class="row">
                <div class="col-lg-8">
                    <p>Lorem ipsum dolor sit amet. Sit magnam asperiores ea aliquid enim sed quae tempore hic voluptas
                        repellat hic repellendus enim non eligendi assumenda. Non esse debitis ut voluptatem sunt a enim
                        voluptatem At doloribus iure et molestiae voluptates aut assumenda voluptatum sed ipsum enim. Ea
                        voluptas deleniti id quaerat ipsam sed dolorum obcaecati id dolor sunt.

                        Est voluptatibus distinctio et omnis nemo non tempore quibusdam non iste consequatur cum
                        perspiciatis laudantium. Sed aspernatur voluptatem id perspiciatis suscipit et voluptatem explicabo
                        est quibusdam sequi sed enim omnis et laudantium quas eum quia voluptas!</p>

                    <p>Lorem ipsum dolor sit amet. Et minima saepe in quas neque qui unde commodi. Sit dolorem fuga vel
                        perferendis neque qui galisum quod et omnis ipsum est ratione alias hic dolor vitae est fugit
                        asperiores. Eos odio Quis qui unde eius vel maiores iste qui quia dicta.</p>
                </div>

                <div class="col-lg-4">
                    <img src="https://sidepost.com.au/wp-content/uploads/2022/04/cleaner-scaled.jpg"
                        loading="lazy" class="w-100 ">
                </div>
            </div>

            <div class=" my-4">
                <a href="#" class="btn text-white btn-warning">BOOK A CLEANER</a>
            </div>

        </div>


        <div class="container py-5">
            <h3 class="text-center">Happy cleaning customers all over Sydney</h3>
            <div class="row pt-4">
                <div class="col-sm-4">
                    <img src="https://sidepost.com.au/wp-content/uploads/2022/04/cleaner-scaled.jpg"
                        class="w-100 mb-2">
                    <p>
                        <i class="fa fa-quote-right mr-3"></i>Excellent clean by the team from Calibre.
                        They were very friendly and did an amazing job cleaning our bed house. Thanks!
                    </p>
                    <p>-Ronald L. in Austin, TX</p>
                </div>
                <div class="col-sm-4">
                    <img src="https://sidepost.com.au/wp-content/uploads/2022/04/cleaner-scaled.jpg"
                        class="w-100 mb-2">
                    <p>
                        <i class="fa fa-quote-right mr-3"></i>Excellent clean by the team from Calibre.
                        They were very friendly and did an amazing job cleaning our bed house. Thanks!
                    </p>
                    <p>-Ronald L. in Austin, TX</p>
                </div>
                <div class="col-sm-4">
                    <img src="https://sidepost.com.au/wp-content/uploads/2022/04/cleaner-scaled.jpg"
                        class="w-100 mb-2">
                    <p>
                        <i class="fa fa-quote-right mr-3"></i>Excellent clean by the team from Calibre.
                        They were very friendly and did an amazing job cleaning our bed house. Thanks!
                    </p>
                    <p>-Ronald L. in Austin, TX</p>
                </div>
            </div>




        </div>

        <div class="container py-5">
            <h3 class="text-center">Sidepost House Cleaning Sydney Office Details and Coverage Area</h3>
            <div class="row py-4">
                <div class="col-sm-6">
                    <img src="https://sidepost.com.au/wp-content/uploads/2022/04/cleaner-scaled.jpg"
                        class="w-100 mb-2">
                </div>
                <div class="col-1">
                </div>
                <div class="col-sm-5">
                    <ul class="list-unstyled">
                        <li>Local line: 1300 991 368</li>
                        <li>Email: support@sidepost.com</li>
                        <li>Working Hours:</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>Postal Code Coverage:</p>
                </div>
                <div class="col-sm-10">
                    <p>200, 221, 800, 801, 803, 200, 221, 800, 801, 803, 200, 221, 800, 801, 803, 200, 221, 800, 801, 803,
                        200, 221, 800, 801, 803, 200,
                        221, 800, 801, 803, 200, 221, 800, 801, 803, 200, 221, 800, 801, 803</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>Areas we cover within the city:</p>
                </div>
                <div class="col-sm-10">
                    <p>Milsons Point, Lavender Bay, Kirribilli, Sydney CBD, Wollstonecraft, Waverton, Edgecliff,
                        North Sydney, Woollahra and the whole of Sydney area.
                    </p>
                </div>
            </div>

            <h5>Our locations we cover nearby Sydney:</h5>
            <div class="row">
                <div class="col-6 col-sm-4 col-lg-2 pb-2">
                    <button type="button" class="btn btn-block btn-primary">Wollongon</button>
                </div>
                <div class="col-6 col-sm-4 col-lg-2 pb-2">
                    <button type="button" class="btn btn-block btn-primary">Newcastle</button>
                </div>
                <div class="col-6 col-sm-4 col-lg-2 pb-2">
                    <button type="button" class="btn btn-block btn-primary">Canberra</button>
                </div>
                <div class="col-6 col-sm-4 col-lg-2 pb-2">
                    <button type="button" class="btn btn-block btn-primary">Gold Coast</button>
                </div>
                <div class="col-6 col-sm-4 col-lg-2 pb-2">
                    <button type="button" class="btn btn-block btn-primary">Logan City</button>
                </div>
                <div class="col-6 col-sm-4 col-lg-2 pb-2">
                    <button type="button" class="btn btn-block btn-primary">Melbourne</button>
                </div>
            </div>
        </div>

        <div class="container col-md-10 col-lg-6 my-2">
            @include('partials.cta.search-button')
        </div>



        @include('partials.main-services.FAQ-block')

        <h2 class="text-center py-3">Other Home and Garden Services</h2>
        @include('partials.working-services')


        <div class="container text-center other-articles my-4">
            <h3>Helping You Every Step with any cleaning job</h3>
            <p>Our advice centre features expert guides on cleaning</p>
            <div class="row">
                <div class="col-md-4 pb-3 pb-md-0">
                    <div class="card p-3">
                        <h5>Home Cleaning Guides</h5>
                        <ul class="list-unstyled">
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 pb-3 pb-md-0">
                    <div class="card p-3">
                        <h5>Home Cleaning Guides</h5>
                        <ul class="list-unstyled">
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5>Home Cleaning Guides</h5>
                        <ul class="list-unstyled">
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                            <a href="#">
                                <li>15 Secrets to Cleaning Your Home</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="#"><button type="button" class="btn text-white btn-warning">READ MORE ARTICLES</button></a>
            </div>
        </div>


        <div class="container py-4">
            <h5 class="text-center">Get more time for yourself, leave the housework to a prodessional cleaner in Sydney
            </h5>

            <div class="container col-md-10 col-lg-6 mb-4">
                @include('partials.cta.get-started')

                <p class="small pt-2">
                    <strong>Excellent</strong>
                    <span class="star-block-review">
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star full-star"></i>
                        <i class="fas fa-star half-star"></i>
                    </span>
                    over <strong>120</strong> reviews on <i class="fas fa-star half-star" style="color: teal;"></i>
                    <strong>Trustpilot</strong>
                </p>
            </div>


        </div>
    @endwhile
@endsection
