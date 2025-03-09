@extends('master')
@section('title','Single room details')
@section('content')
<style>
    .contactForm .form-input label {
        position: fixed;
    }

    select,
    input:not([type="range"]),
    textarea {
        border: 1px solid var(--color-border);
        outline: none;
        width: 100%;
        background-color: transparent;
    }

    .form-control {
        font-size: 17px;
        line-height: 1.4;
        height: 62px;
        background-color: white;
        border: 1px solid var(--color-border);
        padding: 0 20px;
    }
</style>
<section data-anim-wrap class="pageHero -type-2">
    <div data-anim-child="img-right cover-white delay-1" class="pageHero__bg">
        <img src="{{asset('img/pageHero/2.png')}}" alt="image">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="col-auto">
                <div class="pageHero__content text-center" data-split='lines' data-anim-child="split-lines delay-3">
                    <div class="pageHero__subtitle text-white">৳{{$room->price}} PER NIGHT</div>
                    <h1 class="pageHero__title text-white">{{$room->room_category->name??''}}</h1>
                    <p class="pageHero__text text-white">Indulge in luxury in our rooms and suites, featuring stunning views, elegant furnishings, and modern amenities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row y-gap-40 justify-between">
            <div class="col-xl-7 col-lg-7">
                <div class="fw-500 mb-30 md:mb-20">৳{{$room->price}} PER NIGHT</div>
                <h2 class="text-40">About accommodation</h2>
                <div class="d-flex x-gap-50 md:x-gap-20 pt-40 md:pt-30">

                    <div class="d-flex items-center text-accent-1">
                        <i class="icon-size text-20 mr-10"></i>
                        {{$room->diameter}} m<sup>2</sup>
                    </div>

                    <div class="d-flex items-center text-accent-1">
                        <i class="icon-guest text-20 mr-10"></i>
                        {{$room->capacity}} GUEST
                    </div>

                    <div class="d-flex items-center text-accent-1">
                        <i class="icon-bed-2 text-20 mr-10"></i>
                        {{$room->bed}} BED
                    </div>

                    <div class="d-flex items-center text-accent-1">
                        <i class="icon-bath text-20 mr-10"></i>
                        {{$room->bath}} BATH
                    </div>

                </div>

                <div class="line -horizontal bg-border mt-50 mb-50"></div>

                <p>
                    Sit arcu odio aenean vitae eu egestas. Gravida commodo non sem diam faucibus justo dolor. Consectetur nunc scelerisque ut enim tristique sed. At leo urna eu quam cursus dolor. In bibendum sit scelerisque mattis cum.
                    <br><br>
                    Adipiscing et vel tempor elementum dignissim urna. Eu sem sed enim habitant libero ultricies sagittis. Malesuada viverra netus diam vehicula nulla. Neque mattis lacus sed tristique. Luctus ipsum lobortis sed odio ut ultricies adipiscing nisi nulla. Turpis aliquam feugiat tortor rutrum diam molestie vel pharetra.
                    <br><br>
                    Fames massa tortor sit nisl sit. Duis nulla tempus quisque et diam condimentum nisl. Rhoncus quisque elementum nulla lorem at turpis vitae quisque. Vulputate duis vel et odio hendrerit magna. Nec lacus dui egestas sit. Vulputate tincidunt viverra viverra etiam porta facilisis. Diam dui euismod eget donec. Pharetra leo sed felis urna. At a viverra urna elementum tristique ac integer pretium. Vel tincidunt sed mi nulla lectus sagittis.
                </p>


                <!-- <div class="line -horizontal bg-border mt-50 mb-50"></div>
                <h2 class="text-40">Availability</h2>

                <div class="js-calendar pt-40">
                    <div class="searchMenu-date -searchForm js-calendar-el" data-slider-cols-2="true">
                        <div class="searchMenu-date__field shadow-2">
                            <div class="rounded-4">
                                <div class="elCalendar js-calendar-el-calendar"></div>
                            </div>
                        </div>
                    </div>
                </div> -->

                @if(count($room->facilities)>0)
                <div class="line -horizontal bg-border mt-50 mb-50"></div>
                <h2 class="text-40">What's included in this suite?</h2>
                <div class="row x-gap-50 y-gap-20 pt-40">
                    <div class="col-sm-6">
                        <ul class="ulList -type-1">
                            @foreach($room->facilities as $fa)
                            <li>{{$fa->name}}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                @endif

                <div class="line -horizontal bg-border mt-50 mb-50"></div>
                <h2 class="text-40">Room Rules</h2>
                <ul class="ulList -type-1 pt-40">
                    <li>Check-in from 9:00 AM - anytime</li>
                    <li>Check-out: 11:00 AM</li>
                    <li>Self-check-in with lockbox</li>
                    <li>No smoking</li>
                    <li>Pets are allowed</li>
                </ul>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="d-flex items-center justify-between  px-30 py-30 rounded-8" id="abMessage" style="display: none;">

                </div>
                @if(session()->has('message'))
                {{session('message')}}
                @endif
                <div class="sidebar -rooms-single px-40 py-40 md:px-30 md:py-30 border-1 shadow-1">
                    <h3 class="text-30 mb-30">Book Your Room</h3>

                    <div class="row y-gap-30">
                        <div class="col-md-6">

                            <div class="form-input ">
                                <label class="">From</label>
                                <input type="date" required class="form-control" id="from_date">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-input ">
                                <label class="">To</label>
                                <input type="date" required class="form-control" id="to_date">
                            </div>

                        </div>
                    </div>




                    <button class="button -md bg-accent-2 -dark-1 w-1/1 mt-40" onclick="checkRoomAvailability(this,'{{$room->id}}')" data-url="{{route('checkRoomAvailability')}}">Check Availability</button>

                </div>
                <form action="{{route('roomReservation')}}" method="post" id="reservationForm" style="display: none;">
                    @csrf
                    <input type="hidden" id="rf_from_date" name="rf_from_date" value="">
                    <input type="hidden" id="rf_to_date" name="rf_to_date" value="">
                    <input type="hidden" name="room_id" value="{{$room->id}}">
                    <input type="hidden" name="customer_id" value="" id="customer_id">
                    <input type="hidden" name="room_type" value="{{$room->type}}">
                    <input type="hidden" name="days" value="" id="days">
                    <input type="hidden" name="discount_info" id="discount_info">
                    <div class="sidebar -rooms-single px-40 py-40 md:px-30 md:py-30 border-1 shadow-1">
                        <h3 class="text-30 mb-30">Booking details</h3>

                        <div class="row y-gap-30">
                            <div class="col-md-12">

                                <div class="form-input ">
                                    <!-- <label class="">Phone</label> -->
                                    <input type="text" required class="form-control" placeholder="Enter your phone number" name="c_phone" id="c_phone" onkeyup="checkCustomerExistence(this)" data-url="{{route('checkCustomerExistence')}}">
                                </div>

                            </div>
                            <div class="col-md-12">

                                <div class="form-input ">
                                    <!-- <label class="">Full Name</label> -->
                                    <input type="text" required class="form-control" placeholder="Enter your full name" name="c_full_name" id="c_full_name">
                                </div>

                            </div>
                            <div class="col-md-12">

                                <div class="form-input ">
                                    <!-- <label class="">Email</label> -->
                                    <input type="email" required class="form-control" placeholder="Enter your email" name="c_email" id="c_email">
                                </div>

                            </div>
                            <div class="col-md-12">

                                <div class="form-input ">
                                    <!-- <label class="">Your Address</label> -->
                                    <input type="text" required class="form-control" placeholder="Enter your address" name="c_address" id="c_address">
                                </div>

                            </div>
                            <div class="col-md-5">

                                <div class="form-input ">
                                    <!-- <label class="">Your Gender</label> -->
                                    <select name="c_gender" id="c_gender" class="form-control" require>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-7">

                                <div class="form-input ">
                                    <!-- <label class="">Promo Code</label> -->
                                    <div class="d-flex justify-content-start">
                                        <input type="text" class="form-control" placeholder="Coupon " name="c_promo" id="c_promo">
                                        <button class="button -md bg-info-2" onclick="applyPromoCode(this)" data-url="{{route('applyPromoCode')}}" type="button"><i class="fas fa-check-square"></i></button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-input ">
                                    <label class="">Total Amount</label>
                                    <input type="number" name="total" id="form_total" value="0" readonly class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-input ">
                                    <label class="">Subtotal</label>
                                    <input type="number" name="subtotal" value="0" class="form-control" id="c_subtotal" readonly>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-input ">
                                    <label class="">Discount(tk)</label>
                                    <input type="number" name="discounted_amount" id="c_discounted_amount" value="0" readonly class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-input ">
                                    <label class="">Min. Payable Amount</label>
                                    <input type="number" name="paid_amount" value="0" class="form-control" id="payable_amount">
                                </div>

                            </div>
                        </div>




                        <button class="button -md bg-info-2 -dark-1 w-1/1 mt-40" style="color: white;" type="submit">Make Your Reservation</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{--<section class="layout-pt-lg layout-pb-lg bg-light-1">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">OUR SERVICES</div>
                <h2 class="text-64 md:text-40">Hotel Facilities</h2>
            </div>
        </div>

        <div class="row y-gap-40 justify-between pt-100 sm:pt-50">

            <div data-anim-child="slide-up delay-4" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="icon-wifi"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">Wifi &amp; Internet</h4>
                </div>
            </div>

            <div data-anim-child="slide-up delay-5" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="icon-bus"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">Airport Transfer</h4>
                </div>
            </div>

            <div data-anim-child="slide-up delay-6" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="icon-tv"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">Smart TV</h4>
                </div>
            </div>

            <div data-anim-child="slide-up delay-7" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="icon-bed"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">Breakfast in Bed</h4>
                </div>
            </div>

            <div data-anim-child="slide-up delay-8" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="icon-laundry"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">Laundry Services</h4>
                </div>
            </div>

            <div data-anim-child="slide-up delay-9" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="icon-housekeeper"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">Housekeeper Services</h4>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="layout-pt-lg layout-pb-lg bg-accent-1">
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">
                <div class="text-15 uppercase text-white mb-30 sm:mb-10">EXPLORE</div>
                <h2 class="text-64 md:text-40 text-white">Gallery</h2>
            </div>
        </div>
    </div>

    <div class="relative container">
        <div class="row justify-center pt-100 sm:pt-50">
            <div class="col-lg-10 col-md-11">
                <div class="ss-scale-2 js-section-slider" data-gap="100" data-slider-cols="xl-1 lg-1 md-1 sm-1 base-1" data-loop data-nav-prev="js-slider1-prev" data-nav-next="js-slider1-next" data-pagination="js-slider1-pagination">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="ratio ratio-16:9">
                                <img src="img/about/20/1.png" alt="image" class="img-ratio">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ratio ratio-16:9">
                                <img src="img/about/20/2.png" alt="image" class="img-ratio">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="ratio ratio-16:9">
                                <img src="img/about/20/3.png" alt="image" class="img-ratio">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-between items-center pt-100 sm:pt-50">
            <div class="col-auto">
                <button class="button -outline-white size-80 md:size-60 flex-center text-white rounded-full js-slider1-prev">
                    <i class="icon-arrow-left text-24 md:text-19"></i>
                </button>
            </div>

            <div class="col-auto">
                <div class="pagination -type-1 -light js-slider1-pagination"></div>
            </div>

            <div class="col-auto">
                <button class="button -outline-white size-80 md:size-60 flex-center text-white rounded-full js-slider1-next">
                    <i class="icon-arrow-right text-24 md:text-19"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<section data-anim-wrap class="layout-pt-lg layout-pb-lg">
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">
                <div data-anim-child="slide-up delay-2" class="mb-40">
                    <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_428_953)">
                            <path d="M9.67883 38C6.64234 38 4.27007 36.9524 2.56204 34.8571C0.854015 32.6667 0 29.4286 0 25.1429C0 20.6667 0.99635 16.381 2.98905 12.2857C5.07664 8.19048 8.01825 4.14286 11.8139 0.142864C11.9088 0.0476213 12.0511 0 12.2409 0C12.5255 0 12.7153 0.142858 12.8102 0.428574C13 0.619048 13.0474 0.857143 12.9526 1.14286C10.6752 4.19048 9.10949 7.14286 8.25548 10C7.49635 12.7619 7.11679 15.8571 7.11679 19.2857C7.11679 21.8571 7.44891 23.8571 8.11314 25.2857C8.77737 26.7143 9.67883 28 10.8175 29.1429L5.40876 30.1429C5.31387 28.5238 5.74088 27.2857 6.68978 26.4286C7.73358 25.5714 9.06205 25.1429 10.6752 25.1429C12.6679 25.1429 14.1861 25.7143 15.2299 26.8571C16.3686 28 16.938 29.5714 16.938 31.5714C16.938 33.6667 16.2737 35.2857 14.9453 36.4286C13.7117 37.4762 11.9562 38 9.67883 38ZM31.5985 38C28.562 38 26.1898 36.9524 24.4818 34.8571C22.8686 32.6667 22.062 29.4286 22.062 25.1429C22.062 20.5714 23.0584 16.2381 25.0511 12.1429C27.0438 8.04762 29.9854 4.04762 33.8759 0.142864C33.9708 0.0476213 34.1131 0 34.3029 0C34.5876 0 34.7774 0.142858 34.8723 0.428574C35.062 0.619048 35.1095 0.857143 35.0146 1.14286C32.7372 4.19048 31.1715 7.14286 30.3175 10C29.5584 12.7619 29.1788 15.8571 29.1788 19.2857C29.1788 21.8571 29.4635 23.9048 30.0328 25.4286C30.6971 26.8571 31.5985 28.0952 32.7372 29.1429L27.4708 30.1429C27.3759 28.5238 27.8029 27.2857 28.7518 26.4286C29.7007 25.5714 31.0292 25.1429 32.7372 25.1429C34.7299 25.1429 36.2482 25.7143 37.292 26.8571C38.4307 28 39 29.5714 39 31.5714C39 33.6667 38.3358 35.2857 37.0073 36.4286C35.7737 37.4762 33.9708 38 31.5985 38Z" fill="#122223" />
                        </g>
                        <defs>
                            <filter id="filter0_d_428_953" x="0" y="0" width="45" height="44" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="6" dy="6" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_428_953" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_428_953" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
                <div data-split='lines' data-anim-child="split-lines delay-3">
                    <div class="text-15 uppercase mb-30 sm:mb-15">VOICE FROM OUR GUESTS</div>
                    <h2 class="text-64 md:text-40 lh-065">Testimonials</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="relative container">
        <div class="row justify-center pt-100 sm:pt-50">
            <div class="col-xl-8 col-lg-10">
                <div class="overflow-hidden js-testimonialsSlider-1">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div data-split='lines' data-anim-child="split-lines delay-4" class="text-center">
                                <div class="text-sec text-40 md:text-24">
                                    “Some places are so good to stay in, you don&#39;t want to generate a rush on them. The Swiss Resort lodge hotel in London is one of them.”
                                </div>
                                <div class="mt-50">Ali Tufan - Trip Advisor</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-split='lines' data-anim-child="split-lines delay-4" class="text-center">
                                <div class="text-sec text-40 md:text-24">
                                    “Some places are so good to stay in, you don&#39;t want to generate a rush on them. The Swiss Resort lodge hotel in London is one of them.”
                                </div>
                                <div class="mt-50">Ali Tufan - Trip Advisor</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-split='lines' data-anim-child="split-lines delay-4" class="text-center">
                                <div class="text-sec text-40 md:text-24">
                                    “Some places are so good to stay in, you don&#39;t want to generate a rush on them. The Swiss Resort lodge hotel in London is one of them.”
                                </div>
                                <div class="mt-50">Ali Tufan - Trip Advisor</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-split='lines' data-anim-child="split-lines delay-4" class="text-center">
                                <div class="text-sec text-40 md:text-24">
                                    “Some places are so good to stay in, you don&#39;t want to generate a rush on them. The Swiss Resort lodge hotel in London is one of them.”
                                </div>
                                <div class="mt-50">Ali Tufan - Trip Advisor</div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div data-split='lines' data-anim-child="split-lines delay-4" class="text-center">
                                <div class="text-sec text-40 md:text-24">
                                    “Some places are so good to stay in, you don&#39;t want to generate a rush on them. The Swiss Resort lodge hotel in London is one of them.”
                                </div>
                                <div class="mt-50">Ali Tufan - Trip Advisor</div>
                            </div>
                        </div>

                    </div>

                    <div data-anim-child="slide-up delay-3" class="navAbsolute">
                        <button class="size-80 flex-center rounded-full js-testimonialsSlider-1-prev">
                            <i class="icon-arrow-left text-24"></i>
                        </button>

                        <button class="size-80 flex-center rounded-full js-testimonialsSlider-1-next">
                            <i class="icon-arrow-right text-24"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div data-anim-child="slide-up delay-3" class="testimonialsPagination -type-1 pt-100 js-testimonialsSlider-1-pagination">

            <div class="testimonialsPagination__item is-active">
                <div><img src="img/avatars/1/1.png" alt="person"></div>
            </div>

            <div class="testimonialsPagination__item ">
                <div><img src="img/avatars/1/2.png" alt="person"></div>
            </div>

            <div class="testimonialsPagination__item ">
                <div><img src="img/avatars/1/3.png" alt="person"></div>
            </div>

            <div class="testimonialsPagination__item ">
                <div><img src="img/avatars/1/4.png" alt="person"></div>
            </div>

            <div class="testimonialsPagination__item ">
                <div><img src="img/avatars/1/5.png" alt="person"></div>
            </div>

        </div>
    </div>
</section>

<section class="layout-pt-lg layout-pb-lg bg-light-1">
    <div data-anim-wrap class="container">
        <div class="row y-gap-30 justify-between items-end">
            <div data-anim-child="slide-up delay-1" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">EXPLORE</div>
                <h2 class="text-64 md:text-40 lh-065">Similar Rooms</h2>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-auto">
                <button class="button -type-1">
                    <i class="-icon icon-arrow-circle-right text-30"></i>
                    VIEW ALL MORE
                </button>
            </div>
        </div>

        <div class="relative mt-100 sm:mt-50">
            <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-3 lg-3 md-2 sm-1 base-1" data-nav-prev="js-slider2-prev" data-nav-next="js-slider2-next">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div data-anim-child="slide-up delay-4">
                            <a href="rooms-single-1.html" class="roomCard -type-2 -hover-button-center">
                                <div class="roomCard__image -no-rounded ratio ratio-45:54 -hover-button-center__wrap">
                                    <img src="img/cards/rooms/2/1.png" alt="image" class="img-ratio">

                                    <div class="roomCard__price round-0 text-15 fw-500 bg-white text-accent-1">$499 / NIGHT</div>

                                    <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                        <span class="text-15 fw-500 text-white">BOOK NOW</span>
                                    </div>
                                </div>

                                <div class="roomCard__content mt-30">
                                    <div class="d-flex justify-between items-end">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24">Luxury Suite</h3>
                                    </div>

                                    <div class="d-flex x-gap-20 pt-30">

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-size text-20 mr-10"></i>
                                            30M2
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-guest text-20 mr-10"></i>
                                            2 GUEST
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bed-2 text-20 mr-10"></i>
                                            1 BED
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bath text-20 mr-10"></i>
                                            1 BATH
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim-child="slide-up delay-4">
                            <a href="rooms-single-2.html" class="roomCard -type-2 -hover-button-center">
                                <div class="roomCard__image -no-rounded ratio ratio-45:54 -hover-button-center__wrap">
                                    <img src="img/cards/rooms/2/2.png" alt="image" class="img-ratio">

                                    <div class="roomCard__price round-0 text-15 fw-500 bg-white text-accent-1">$499 / NIGHT</div>

                                    <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                        <span class="text-15 fw-500 text-white">BOOK NOW</span>
                                    </div>
                                </div>

                                <div class="roomCard__content mt-30">
                                    <div class="d-flex justify-between items-end">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24">Double Room</h3>
                                    </div>

                                    <div class="d-flex x-gap-20 pt-30">

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-size text-20 mr-10"></i>
                                            30M2
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-guest text-20 mr-10"></i>
                                            2 GUEST
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bed-2 text-20 mr-10"></i>
                                            1 BED
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bath text-20 mr-10"></i>
                                            1 BATH
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim-child="slide-up delay-4">
                            <a href="rooms-single-3.html" class="roomCard -type-2 -hover-button-center">
                                <div class="roomCard__image -no-rounded ratio ratio-45:54 -hover-button-center__wrap">
                                    <img src="img/cards/rooms/2/3.png" alt="image" class="img-ratio">

                                    <div class="roomCard__price round-0 text-15 fw-500 bg-white text-accent-1">$499 / NIGHT</div>

                                    <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                        <span class="text-15 fw-500 text-white">BOOK NOW</span>
                                    </div>
                                </div>

                                <div class="roomCard__content mt-30">
                                    <div class="d-flex justify-between items-end">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24">Deluxe Suite</h3>
                                    </div>

                                    <div class="d-flex x-gap-20 pt-30">

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-size text-20 mr-10"></i>
                                            30M2
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-guest text-20 mr-10"></i>
                                            2 GUEST
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bed-2 text-20 mr-10"></i>
                                            1 BED
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bath text-20 mr-10"></i>
                                            1 BATH
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim-child="slide-up delay-4">
                            <a href="rooms-single-4.html" class="roomCard -type-2 -hover-button-center">
                                <div class="roomCard__image -no-rounded ratio ratio-45:54 -hover-button-center__wrap">
                                    <img src="img/cards/rooms/2/4.png" alt="image" class="img-ratio">

                                    <div class="roomCard__price round-0 text-15 fw-500 bg-white text-accent-1">$499 / NIGHT</div>

                                    <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                        <span class="text-15 fw-500 text-white">BOOK NOW</span>
                                    </div>
                                </div>

                                <div class="roomCard__content mt-30">
                                    <div class="d-flex justify-between items-end">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24">Luxury Suite</h3>
                                    </div>

                                    <div class="d-flex x-gap-20 pt-30">

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-size text-20 mr-10"></i>
                                            30M2
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-guest text-20 mr-10"></i>
                                            2 GUEST
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bed-2 text-20 mr-10"></i>
                                            1 BED
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bath text-20 mr-10"></i>
                                            1 BATH
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div data-anim-child="slide-up delay-4">
                            <a href="rooms-single-5.html" class="roomCard -type-2 -hover-button-center">
                                <div class="roomCard__image -no-rounded ratio ratio-45:54 -hover-button-center__wrap">
                                    <img src="img/cards/rooms/2/5.png" alt="image" class="img-ratio">

                                    <div class="roomCard__price round-0 text-15 fw-500 bg-white text-accent-1">$499 / NIGHT</div>

                                    <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                                        <span class="text-15 fw-500 text-white">BOOK NOW</span>
                                    </div>
                                </div>

                                <div class="roomCard__content mt-30">
                                    <div class="d-flex justify-between items-end">
                                        <h3 class="roomCard__title lh-065 text-40 md:text-24">Double Room</h3>
                                    </div>

                                    <div class="d-flex x-gap-20 pt-30">

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-size text-20 mr-10"></i>
                                            30M2
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-guest text-20 mr-10"></i>
                                            2 GUEST
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bed-2 text-20 mr-10"></i>
                                            1 BED
                                        </div>

                                        <div class="d-flex items-center text-accent-1">
                                            <i class="icon-bath text-20 mr-10"></i>
                                            1 BATH
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="navAbsolute -type-2">
                <button class="button -outline-accent-1 size-80 md:size-60 flex-center rounded-full js-slider2-prev">
                    <i class="icon-arrow-left text-24"></i>
                </button>

                <button class="button -outline-accent-1 size-80 md:size-60 flex-center rounded-full js-slider2-next">
                    <i class="icon-arrow-right text-24"></i>
                </button>
            </div>
        </div>
    </div>
</section>--}}

<script>
    var room_price = '{{$room->price}}';
    var diffDays = 0;
    var form_total = 0;
    var subtotal = 0;
    var discounted_amount = 0;

    function checkRoomAvailability(e, room_id) {
        var url = $(e).data('url');
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();



        if (!from_date || !to_date) {
            $("#abMessage").show();
            $("#abMessage").addClass('bg-error-1');
            $("#abMessage").html("The from date and to date is required.");
        }

        let date1 = new Date($("#from_date").val());
        let date2 = new Date($("#to_date").val());

        let diffTime = Math.abs(date2 - date1);
        diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        form_total = Math.ceil(diffDays * room_price);

        console.log(diffDays, form_total);

        $("#days").val(diffDays ?? 0);
        $("#form_total").val(form_total);
        $("#c_subtotal").val(form_total);
        $("#c_discounted_amount").val(0);

        if (diffDays > 1) {
            $("#payable_amount").attr('min', room_price);
            $("#payable_amount").attr('max', form_total);
            $("#payable_amount").val(room_price);
        } else {
            $("#payable_amount").attr('min', room_price);
            $("#payable_amount").attr('max', form_total);
            $("#payable_amount").val(form_total);
        }

        $.ajax({
            url: url,
            type: "POST",
            data: {
                room_id: room_id,
                from_date: from_date,
                to_date: to_date,
            },
            dataType: "json",
            success: function(data) {
                // console.log('ss',data);
                if (data.status != true) {
                    $("#abMessage").show();
                    $("#abMessage").addClass('bg-error-1');
                    $("#abMessage").html("This room is not available on your searching date range!Please contact with us over the phone.");
                    $("#reservationForm").hide();
                    $("#rf_from_date").val('');
                    $("#rf_to_date").val('');
                } else {
                    $("#abMessage").show();
                    $("#abMessage").addClass('bg-success-1');
                    $("#abMessage").html("This room is available on your searching date range.");
                    $("#reservationForm").show();
                    $("#rf_from_date").val(from_date);
                    $("#rf_to_date").val(to_date);
                }
            },
        });
    };

    function applyPromoCode(e) {
        var promo_code = $("#c_promo").val();
        var url = $(e).data('url');


        $.ajax({
            url: url,
            type: "POST",
            data: {
                promo_code: promo_code,
            },
            dataType: "json",
            success: function(data) {
                // console.log('ss',data);
                if (data.status != true) {
                    alert('Invalid promo code applied.');

                } else {
                    alert('Promo code applied successfully.');

                    var qData = data.item;
                    $("#discount_info").val(JSON.stringify(qData));
                    if (qData) {
                        if (qData.discount_type == 'Percentage') {
                            discounted_amount = Math.ceil((form_total * qData.discount) / 100);
                        } else {
                            discounted_amount = form_total - qData.discount;
                        }

                        subtotal = form_total - discounted_amount;

                        $("#c_subtotal").val(subtotal);
                        $("#c_discounted_amount").val(discounted_amount);

                        if (diffDays > 1) {
                            $("#payable_amount").attr('min', room_price);
                            $("#payable_amount").attr('max', form_total);
                            $("#payable_amount").val(room_price);
                        } else {
                            $("#payable_amount").attr('min', form_total);
                            $("#payable_amount").attr('max', form_total);
                            $("#payable_amount").val(form_total);
                        }
                    }
                }
            },
        });
    };

    function checkCustomerExistence(e) {
        var url = $(e).data('url');
        var phone = $("#c_phone").val();


        $.ajax({
            url: url,
            type: "POST",
            data: {
                phone: phone,
            },
            dataType: "json",
            success: function(data) {
                if (data.status == true) {
                    $("#customer_id").val(data.customer.id);
                    $("#c_full_name").val(data.customer.name);
                    $("#c_email").val(data.customer.email);
                    $("#c_address").val(data.customer.address);
                    document.getElementById("c_gender").value = data.customer.gender;
                } else {
                    $("#customer_id").val('');
                    $("#c_full_name").val('');
                    $("#c_email").val('');
                    $("#c_address").val('');
                    document.getElementById("c_gender").value = null;
                }
            },
        });
    };
</script>
@endsection