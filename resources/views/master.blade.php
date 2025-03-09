<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&amp;family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('css/vendors.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <title>@yield('title')</title>
  @yield('css')
</head>

<body>
  <div class="menuFullScreen js-menuFullScreen">
    <div class="menuFullScreen__topMobile js-menuFullScreen-topMobile">
      <div class="d-flex items-center text-white js-menuFullScreen-toggle">
        <i class="icon-menu text-9"></i>
        <div class="text-15 uppercase ml-30 sm:d-none">Menu</div>
      </div>

      <div style="left: 90%;">
        <img src="{{asset($image_url.$setup->logo)}}" style="height: 70px;">
      </div>


    </div>

    <div class="menuFullScreen__mobile__bg js-menuFullScreen-mobile-bg"></div>

    <div class="menuFullScreen__left">
      <div class="menuFullScreen__bg js-menuFullScreen-bg">
        <img src="{{asset('img/menu/bg.png')}}" alt="image">
      </div>

      <button class="menuFullScreen__close js-menuFullScreen-toggle js-menuFullScreen-close-btn">
        <span class="icon">
          <span></span>
          <span></span>
        </span>
        CLOSE
      </button>

      <div class="menuFullScreen-links js-menuFullScreen-links">

        <div class="menuFullScreen-links__item">
          <a href="{{route('home')}}">
            Home
            <!-- <i class="icon-arrow-right"></i>
            <i class="icon-chevron-right"></i> -->
          </a>


          <!-- <div class="menuFullScreen-links-subnav js-menuFullScreen-subnav">

            <div class="menuFullScreen-links-subnav__item">
              <a href="index.html">Home 1</a>
            </div>

          </div> -->


        </div>

        <div class="menuFullScreen-links__item">
          <a href="{{route('about')}}">
            About us
          </a>


        </div>

        <div class="menuFullScreen-links__item">
          <a href="{{route('roomOrApartment')}}">
            Rooms or Apartments
          </a>


        </div>




        <div class="menuFullScreen-links__item">
          <a href="{{route('contact')}}">
            Contact us
          </a>
        </div>
      </div>
    </div>

    <div class="menuFullScreen__right js-menuFullScreen-right">
      <div class="text-center">
        <div class="mb-100">
          <img src="{{asset($image_url.$setup->logo)}}" style="height: 70px;">
        </div>

        <div class="text-sec lh-11 fw-500 text-40">
          {{$setup->hotel_name}}
        </div>

        <div class="mt-40">
          <div class="text-30 text-sec fw-500">
            Location
          </div>
          <div class="mt-10">
            {{$setup->address}}
          </div>
        </div>

        <div class="mt-40">
          <div class="text-30 text-sec fw-500">
            Phone Support
          </div>
          <div class="mt-10">
            <div>
              <a href="#">{{$setup->phone}}</a>
            </div>
            <div>
              <a href="#">{{$setup->email}}</a>
            </div>
          </div>
        </div>

        <div class="mt-40">
          <div class="text-30 text-sec fw-500">
            Connect With Us
          </div>
          <div class="mt-10">
            <a href="#">{{$setup->phone}}</a>
          </div>
        </div>
      </div>
    </div>

    <div class="menuFullScreen__bottomMobile js-menuFullScreen-buttomMobile">
      <a href="{{route('roomOrApartment')}}" class="button rounded-200 w-1/1 py-20 -light-1 bg-accent-2">
        BOOK YOUR STAY
      </a>

      <a href="#" class="d-flex items-center mt-40">
        <i class="icon-phone mr-10"></i>
        <span>{{$setup->phone}}</span>
      </a>

      <a href="#" class="d-flex mt-20">
        <i class="icon-map mr-10"></i>
        <span>
          {{$setup->address}}
        </span>
      </a>

      <a href="#" class="d-flex items-center mt-20">
        <i class="icon-mail mr-10"></i>
        <span>{{$setup->email}}</span>
      </a>
    </div>
  </div>


  <!-- cursor start -->
  <div class="cursor js-cursor">
    <div class="cursor__wrapper">
      <div class="cursor__follower js-follower"></div>
      <div class="cursor__label js-label"></div>
      <div class="cursor__icon js-icon"></div>
    </div>
  </div>
  <!-- cursor end -->

  <main class="">


    <header class="header -h-110 -mx-60 -blur -border-bottom-1 js-header" data-add-bg="bg-accent-1" data-x="header" data-x-toggle="-is-menu-opened">
      <div class="header__container h-full items-center">
        <div class="header__left d-flex items-center">
          <button class="d-flex items-center cursor-pointer js-menuFullScreen-toggle">
            <i class="icon-menu text-9 text-white"></i>
            <div class="text-15 uppercase text-white ml-30 sm:d-none">Menu</div>
          </button>

          <div class="d-flex items-center ml-90 xl:d-none">
            <i class="icon-phone text-20 text-white mr-30"></i>
            <div class="text-15 uppercase text-white">{{$setup->phone}}</div>
          </div>
        </div>

        <div class="header__center">
          <div class="header__logo">
            <img src="{{asset($image_url.$setup->logo)}}" style="height: 70px;">
          </div>
        </div>

        <div class="header__right d-flex items-center h-full">
          <!-- <button class="button text-white mr-30 xl:mr-0">
            EN <i class="icon-chevron-down ml-15"></i>
          </button> -->

          <div class="line -vertical bg-white-10 h-full ml-90 mr-90 xl:d-none"></div>

          <a href="{{route('roomOrApartment')}}" class="button -md -accent-1 rounded-16 xl:d-none text-white">
            BOOK YOUR STAY
          </a>
        </div>
      </div>
    </header>

    @yield('content')

    <footer class="footer -type-1 -bg-1 relative text-white">
      <div class="footer__bg -type-1">
        <div class="bg-accent-2"></div>
        <div class="bg-accent-1"></div>
      </div>

      <div class="footer__main">
        <div class="container">
          <div class="footer__grid">
            <div class="">
              <h4 class="text-30 fw-500 text-white">About Us</h4>

              <div class="text-white-60 text-15 lh-17 mt-60 md:mt-20">
                {{$setup->about_hotel}}
              </div>
            </div>

            <div class="">
              <h4 class="text-30 fw-500 text-white">Contact</h4>

              <div class="d-flex flex-column mt-60 md:mt-20">
                <div class="">
                  <a class="d-block text-15 text-white-60 lh-17" href="#">
                    {{$setup->address}}
                  </a>
                </div>
                <div class="mt-25">
                  <a class="d-block text-15 text-white-60" href="#">
                    {{$setup->email}}
                  </a>
                </div>
                <div class="mt-10">
                  <a class="d-block text-15 text-white-60" href="#">
                    {{$setup->phone}}
                  </a>
                </div>
              </div>
            </div>

            <div class="">
              <h4 class="text-30 fw-500 text-white">Links</h4>

              <div class="row x-gap-50 y-gap-15">
                <div class="col-sm-6">
                  <div class="y-gap-15 text-15 text-white-60 mt-60 md:mt-20">

                    <a class="d-block" href="{{route('about')}}">
                      About Hotel
                    </a>

                    <a class="d-block" href="{{route('roomOrApartment')}}">
                      Our Rooms
                    </a>

                    <a class="d-block" href="{{route('contact')}}">
                      Contact
                    </a>

                  </div>
                </div>

                <!-- <div class="col-sm-6">
                  <div class="y-gap-15 text-15 text-white-60 mt-60 md:mt-20">

                    <a class="d-block" href="#">
                      Privacy Policy
                    </a>

                    <a class="d-block" href="#">
                      Terms &amp; Conditions
                    </a>

                    <a class="d-block" href="#">
                      Get Directions
                    </a>

                  </div>
                </div> -->
              </div>
            </div>

            <div class="">
              <h4 class="text-30 fw-500 text-white">Newsletter Sign Up</h4>

              <p class="text-15 text-white-60 mt-60 md:mt-20">{{$setup->slogan}}</p>

              <div class="footer__newsletter mt-30">
                <input type="Email" placeholder="Your email address">
                <button><i class="icon-arrow-right text-white text-20"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer__bottom">
        <div class="container">
          <div class="row y-gap-30 justify-between md:justify-center items-center">
            <div class="col-sm-auto">
              <div class="text-15 text-center text-white-60">Copyright © 2024 by {{$setup->hotel_name}}</div>
            </div>

            <div class="col-sm-auto">
              <div class="footer__bottom_center">
                <div class="d-flex justify-center">
                  <img src="{{asset($image_url.$setup->logo)}}" style="height: 70px;">
                </div>
              </div>
            </div>

            <div class="col-sm-auto">
              <div class="row x-gap-25 y-gap-10 items-center justify-center">

                <div class="col-auto">
                  <a href="{{$setup->facebook}}" target="_blank" class="d-block text-white-60">
                    <i class="icon-facebook text-11"></i>
                  </a>
                </div>

                <div class="col-auto">
                  <a href="{{$setup->instagram}}" target="_blank" class="d-block text-white-60">
                    <i class="icon-instagram text-11"></i>
                  </a>
                </div>

                <div class="col-auto">
                  <a href="{{$setup->youtube}}" target="_blank" class="d-block text-white-60">
                    <i class="fab fa-youtube"></i>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>


  </main>

  <!-- JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
  <script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>
  <script src="{{asset('js/vendors.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>

  <script>
    function printContent(el) {
      var restorepage = $('body').html();
      var printcontent = $('#' + el).clone();
      $('body').empty().html(printcontent);
      window.print();
      $('body').html(restorepage);
      window.location.replace("/rd");
    }
  </script>
</body>


</html>