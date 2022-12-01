<div class="container-fluid main-services-banner pb-5">
  <div class="container">
     <div class="row">

        @include('partials.breadcrumbs')

        <div class="col-lg-6 pr-lg-5">
           <h1>{{ $banner_header }}</h1>
           <h2 class="my-4 h4 text-center text-sm-left">{{ $banner_subheader }}</h2>
           <div class="d-sm-none">
              {{-- @include('partials.cta.search-button', ['size' => '2_column']) --}}
              <div class="w-100"  style="height: 200px;border-radius: 10px;margin-top: 20px;">
                 {{-- <img loading="lazy" class="img-cover" src="{{ $banner_image[0]['image'] }}"> --}}
              </div>
           </div>
           <div class="row mt-3">
              <ul style="list-style-type:none;margin-left: 0px;padding-left: 18px; margin-bottom:0;">
                 @if ($banner_list)
                 @foreach ($banner_list as $item)
                 <li>
                    <p>
                       <i class="fas fa-check-circle"></i>
                       {{ $item['list'] }}
                    </p>
                 </li>
                 @endforeach
                 @endif
              </ul>
           </div>

           @include('partials.cta.search-button', ['size' => '2_column'])

        </div>
        {{--
        <div class="col-lg-6 d-none d-lg-flex p-1 pannel-image">
           --}}
           <div class="featured col-md-6 d-none d-lg-block pl-5">
              @if (count($banner_image) >= 3)
              @include('locations.banner-3-images', ['images' => $banner_image])
              @elseif(count($banner_image) == 2)
              @include('locations.banner-2-images', ['images' => $banner_image])
              @elseif(count($banner_image) == 1)
              @include('locations.banner-image', ['images' => $banner_image])
              @endif
           </div>
        </div>
     </div>
  </div>

<style>

    .breadcrumb {
        background: none!important;
        width: 100%;
    }

    .breadcrumb-item a {
        color: #183b56;
    }

    .main-services-banner {
        background-color: #ffeecf;
        color: #183b56;
    }

    .main-services-banner h1 {
        font-size: 40px;
        font-weight: 600;
    }

    form .login,
    form a.rounded-1{
        font-size:16px;
    }


    @media screen and (max-width: 576px) {
        h1 {
          font-size: 32px !important;
          text-align: center;
        }
        .main-services-banner .container {
          padding-top: 30px!important;
        }
        .h4 {
          font-size: 20px !important;
          font-weight: bold!important;
        }
    }

    </style>
