<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">
<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&amp;family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('css/vendors.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <title>Swiss Resort</title>
</head>

<body>
  <div class="menuFullScreen js-menuFullScreen">
    <div class="menuFullScreen__topMobile js-menuFullScreen-topMobile">
      <div class="d-flex items-center text-white js-menuFullScreen-toggle">
        <i class="icon-menu text-9"></i>
        <div class="text-15 uppercase ml-30 sm:d-none">Menu</div>
      </div>

      <div class="">
        <img src="{{asset('img/general/logo-white.svg')}}" alt="logo">
      </div>

      <button class="button text-white mr-30 lg:mr-0">
        EN <i class="icon-chevron-down ml-15"></i>
      </button>
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

        <div class="menuFullScreen-links__item js-menuFullScreen-has-children">
          <a href="#">
            HOME
            <i class="icon-arrow-right"></i>
            <i class="icon-chevron-right"></i>
          </a>


          <div class="menuFullScreen-links-subnav js-menuFullScreen-subnav">

            <div class="menuFullScreen-links-subnav__item">
              <a href="index.html">Home 1</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-2.html">Home 2</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-3.html">Home 3</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-4.html">Home 4</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-5.html">Home 5</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-6.html">Home 6</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-7.html">Home 7</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-8.html">Home 8</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-9.html">Home 9</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="home-10.html">Home 10</a>
            </div>

          </div>


        </div>

        <div class="menuFullScreen-links__item js-menuFullScreen-has-children">
          <a href="#">
            ROOMS
            <i class="icon-arrow-right"></i>
            <i class="icon-chevron-right"></i>
          </a>


          <div class="menuFullScreen-links-subnav js-menuFullScreen-subnav">

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-list-1.html">Rooms list 1</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-list-2.html">Rooms list 2</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-list-3.html">Rooms list 3</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-list-4.html">Rooms list 4</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-list-5.html">Rooms list 5</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-single-1.html">Rooms single 1</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-single-2.html">Rooms single 2</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-single-3.html">Rooms single 3</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-single-4.html">Rooms single 4</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="rooms-single-5.html">Rooms single 5</a>
            </div>

          </div>


        </div>

        <div class="menuFullScreen-links__item js-menuFullScreen-has-children">
          <a href="#">
            BOOKING
            <i class="icon-arrow-right"></i>
            <i class="icon-chevron-right"></i>
          </a>


          <div class="menuFullScreen-links-subnav js-menuFullScreen-subnav">

            <div class="menuFullScreen-links-subnav__item">
              <a href="booking.html">Booking</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="cart.html">Cart</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="checkout.html">Checkout</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="restaurant.html">Restaurant</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="restaurant-single.html">Restaurant Single</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="spa-wellness.html">Spa &amp; wellness</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="meet-celebrate.html">Meet &amp; celebrate</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="activities.html">Activities</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="activities-single.html">Activities Single</a>
            </div>

          </div>


        </div>

        <div class="menuFullScreen-links__item js-menuFullScreen-has-children">
          <a href="#">
            PAGES
            <i class="icon-arrow-right"></i>
            <i class="icon-chevron-right"></i>
          </a>


          <div class="menuFullScreen-links-subnav js-menuFullScreen-subnav">

            <div class="menuFullScreen-links-subnav__item">
              <a href="about.html">About</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="contact.html">Contact</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="faq.html">FAQ</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="pricing.html">Pricing</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="terms.html">Terms</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="404.html">404 page</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="invoice.html">Invoice</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="ui-elements.html">UI Elements</a>
            </div>

          </div>


        </div>

        <div class="menuFullScreen-links__item js-menuFullScreen-has-children">
          <a href="#">
            BLOG
            <i class="icon-arrow-right"></i>
            <i class="icon-chevron-right"></i>
          </a>


          <div class="menuFullScreen-links-subnav js-menuFullScreen-subnav">

            <div class="menuFullScreen-links-subnav__item">
              <a href="blog-list-1.html">Blog list 1</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="blog-list-2.html">Blog list 2</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="blog-list-3.html">Blog list 3</a>
            </div>

            <div class="menuFullScreen-links-subnav__item">
              <a href="blog-single.html">Blog single</a>
            </div>

          </div>

        </div>


        <div class="menuFullScreen-links__item">
          <a href="contact.html">
            CONTACT
          </a>
        </div>
      </div>
    </div>

    <div class="menuFullScreen__right js-menuFullScreen-right">
      <div class="text-center">
        <div class="mb-100">
          <img src="{{asset('img/general/logo-black.svg')}}" alt="image">
        </div>

        <div class="text-sec lh-11 fw-500 text-40">
          Hotel & Spa Swiss<br>
          Resort
        </div>

        <div class="mt-40">
          <div class="text-30 text-sec fw-500">
            Location
          </div>
          <div class="mt-10">
            PO Box 16122 Collins Street West<br>
            Victoria 8007 Australia
          </div>
        </div>

        <div class="mt-40">
          <div class="text-30 text-sec fw-500">
            Phone Support
          </div>
          <div class="mt-10">
            <div>
              <a href="#">+ 01 345 647 745</a>
            </div>
            <div>
              <a href="#">info@swiss-resort.com</a>
            </div>
          </div>
        </div>

        <div class="mt-40">
          <div class="text-30 text-sec fw-500">
            Connect With Us
          </div>
          <div class="mt-10">
            <a href="#">+ 01 345 647 745</a>
          </div>
        </div>
      </div>
    </div>

    <div class="menuFullScreen__bottomMobile js-menuFullScreen-buttomMobile">
      <button class="button rounded-200 w-1/1 py-20 -light-1 bg-accent-2">
        BOOK YOUR STAY
      </button>

      <a href="#" class="d-flex items-center mt-40">
        <i class="icon-phone mr-10"></i>
        <span>+41-96567-7854</span>
      </a>

      <a href="#" class="d-flex mt-20">
        <i class="icon-map mr-10"></i>
        <span>
          PO Box 16122 Collins Street West,
          Australia
        </span>
      </a>

      <a href="#" class="d-flex items-center mt-20">
        <i class="icon-mail mr-10"></i>
        <span>info@swiss-resort.com</span>
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

  <main class="bg-light-1">


    <header class="header -h-110 -blur js-header" data-add-bg="bg-accent-2" data-x="header" data-x-toggle="-is-menu-opened">
      <div class="container">
        <div class="header__container h-full items-center">
          <div class="header__left d-flex items-center">
            <div class="d-flex items-center js-menuFullScreen-toggle">
              <i class="icon-menu text-9"></i>
              <div class="text-15 uppercase ml-30 sm:d-none">Menu</div>
            </div>

            <div class="d-flex items-center ml-60 xl:d-none">
              <i class="icon-phone text-20 mr-20"></i>
              <div class="text-15 uppercase">+41-96567-7854</div>
            </div>
          </div>

          <div class="header__center">
            <div class="header__logo">
              <img src="{{asset('img/general/logo-header-6.svg')}}" alt="logo">
            </div>
          </div>

          <div class="header__right d-flex items-center h-full">
            <button class="button mr-30 xl:mr-0">
              EN <i class="icon-chevron-down ml-15"></i>
            </button>

            <button class="button -md -accent-1 bg-white rounded-16 xl:d-none">
              BOOK YOUR STAY
            </button>
          </div>
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
                Duis vitae nulla at nisl finibus pharetra
                Nunc porttitor sapien quis euismod.
              </div>
            </div>

            <div class="">
              <h4 class="text-30 fw-500 text-white">Contact</h4>

              <div class="d-flex flex-column mt-60 md:mt-20">
                <div class="">
                  <a class="d-block text-15 text-white-60 lh-17" href="#">
                    PO Box 16122 Collins StreetWest Victoria 8007 Australia
                  </a>
                </div>
                <div class="mt-25">
                  <a class="d-block text-15 text-white-60" href="#">
                    info@swiss-resort.com
                  </a>
                </div>
                <div class="mt-10">
                  <a class="d-block text-15 text-white-60" href="#">
                    +61 3 8376 6284
                  </a>
                </div>
              </div>
            </div>

            <div class="">
              <h4 class="text-30 fw-500 text-white">Links</h4>

              <div class="row x-gap-50 y-gap-15">
                <div class="col-sm-6">
                  <div class="y-gap-15 text-15 text-white-60 mt-60 md:mt-20">

                    <a class="d-block" href="#">
                      About Hotel
                    </a>

                    <a class="d-block" href="#">
                      Our Rooms
                    </a>

                    <a class="d-block" href="#">
                      Restaurant &amp; Bar
                    </a>

                    <a class="d-block" href="#">
                      Spa &amp; Wellness
                    </a>

                    <a class="d-block" href="#">
                      Contact
                    </a>

                  </div>
                </div>

                <div class="col-sm-6">
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
                </div>
              </div>
            </div>

            <div class="">
              <h4 class="text-30 fw-500 text-white">Newsletter Sign Up</h4>

              <p class="text-15 text-white-60 mt-60 md:mt-20">Sign up for our news, deals and special offers.</p>

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
              <div class="text-15 text-center text-white-60">Copyright © 2024 by CreativeLayers</div>
            </div>

            <div class="col-sm-auto">
              <div class="footer__bottom_center">
                <div class="d-flex justify-center">
                  <img src="{{asset('img/general/logo-white.svg')}}" alt="logo">
                </div>
              </div>
            </div>

            <div class="col-sm-auto">
              <div class="row x-gap-25 y-gap-10 items-center justify-center">

                <div class="col-auto">
                  <a href="#" class="d-block text-white-60">
                    <i class="icon-facebook text-11"></i>
                  </a>
                </div>

                <div class="col-auto">
                  <a href="#" class="d-block text-white-60">
                    <i class="icon-twitter text-11"></i>
                  </a>
                </div>

                <div class="col-auto">
                  <a href="#" class="d-block text-white-60">
                    <i class="icon-instagram text-11"></i>
                  </a>
                </div>

                <div class="col-auto">
                  <a href="#" class="d-block text-white-60">
                    <i class="icon-linkedin text-11"></i>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
  <script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.5.3/dist/index.min.js"></script>
  <script src="{{asset('js/vendors.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
</body>


</html>