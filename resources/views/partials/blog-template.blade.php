@php
$count = 20;
@endphp

<div class="categories py-5">
    <section class="container p-lg-0">
        <div class="row">
            <div class="col-lg-8 p-0">
                <section class="blog-cards">
                    @for ($i = 0; $i < $count; $i++)
                        {{-- @foreach ($posts as $post) --}}
                        <div class="container-fluid articles border mb-5">
                            <div class="row px-3 py-4">
                                <div class="col-4 d-none d-lg-flex display-photo"
                                    style="background-image: url(https://sidepost.com.au/wp-content/uploads/2022/04/cleaning-img.jpg)">
                                </div>
                                <div class="col-12 col-lg-8 px-3">
                                    <a href="#">
                                        <h3>How to Deep Clean for a Spotlessly Clean Bathroom</h3>
                                    </a>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    </p>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6 p-0">
                                                <p><i class="fa fa-calendar mr-1" aria-hidden="true"></i>15/02/2022</p>
                                            </div>
                                            <div class="col-6 p-0">
                                                <a href="#" class="float-right">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    @endfor



                </section>
            </div>
            <div class="col-lg-4 pl-lg-4">

                @include('partials.cta.categories')
                @include('partials.cta.side-button')

            </div>
        </div>
    </section>
</div>
