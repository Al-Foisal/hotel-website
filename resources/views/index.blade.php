@extends('master')
@section('title','Be charming person enjoying your mindset with our luxury')
@section('content')
<section data-anim-wrap class="hero -type-6">
    <div data-anim-child="img-right cover-light-1 delay-2" class="hero__bg rounded-16">
        <img src="{{asset('img/hero/6/1.png')}}" alt="image" class="img-ratio">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="col-auto">
                <div class="hero__content text-center">
                    <div data-anim-child="slide-up delay-4" class="hero__subtitle text-white">
                        STAY WITH US FEEL LIKE HOME
                    </div>

                    <h1 data-anim-child="slide-up delay-5" class="hero__title text-white">
                        {{$setup->slogan}}
                    </h1>

                    <!-- <div data-anim-child="slide-up delay-6" class="d-flex justify-center mt-40 md:mt-20">
                        <button class="hero__button d-flex flex-column items-center">
                            <div class="size-80 flex-center rounded-full bg-accent-1-50 blur-1 border-white-10">
                                <i class="icon-play text-21 fw-500 text-white"></i>
                            </div>

                            <div class="text-13 text-white mt-20">PLAY INTRO VIDEO</div>
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-8 col-lg-10">
                <div data-split='lines' data-anim-child="split-lines delay-2">
                    <div class="text-15 uppercase mb-30 sm:mb-10">
                        {{$setup->hotel_name}}
                    </div>
                    <h2 class="text-64 md:text-40 capitalize">
                        {{$setup->slogan}}
                    </h2>
                </div>

                <div data-anim-child="slide-up delay-4" class="row justify-center">
                    <div class="col-lg-8">
                        <p class="mt-40 md:mt-20">
                            {{$setup->about_hotel}}
                        </p>
                    </div>
                </div>

                <div data-anim-child="slide-up delay-5">
                    <a href="{{route('roomOrApartment')}}" class="button -type-1 mx-auto mt-50 md:mt-30">
                        <i class="-icon">
                            <svg width="50" height="30" viewBox="0 0 50 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.8 28.0924C43.3451 28.0924 49.4616 21.9759 49.4616 14.4308C49.4616 6.88577 43.3451 0.769287 35.8 0.769287C28.255 0.769287 22.1385 6.88577 22.1385 14.4308C22.1385 21.9759 28.255 28.0924 35.8 28.0924Z" stroke="#122223" />
                                <path d="M33.4808 10.2039L32.9985 10.8031L37.2931 14.2623H0.341553V15.0315H37.28L33.0008 18.4262L33.4785 19.0285L39 14.6492L33.4808 10.2039Z" fill="#122223" />
                            </svg>
                        </i>
                        Book now
                    </a>
                </div>
            </div>
        </div>

        <div class="row x-gap-50 y-gap-30 pt-100 sm:pt-50">
            @if($about[0])
            <div class="col-lg-4 col-sm-6">
                <div data-anim-child="img-right cover-light-1 delay-2" class="rounded-16">
                    <img src="{{asset($image_url.$about[0]->image)}}" alt="image" class="rounded-16 col-12"style="height: 457px;width:357px;">
                </div>
                <div data-anim-child="fade delay-5" class="text-17 mt-30">{{$about[0]->name}}</div>
            </div>
            @endif
            @if($about[1])
            <div class="col-lg-4 col-sm-6">
                <div class="pt-100 md:pt-0">
                    <div data-anim-child="img-right cover-light-1 delay-3" class="rounded-16">
                        <img src="{{asset($image_url.$about[1]->image)}}" alt="image" class="rounded-16 col-12" style="height: 457px;width:357px;">
                    </div>
                </div>
            </div>
            @endif
            @if($about[2])
            <div class="col-lg-4 col-sm-6">
                <div data-anim-child="img-right cover-light-1 delay-4" class="rounded-16">
                    <img src="{{asset($image_url.$about[2]->image)}}" alt="image" class="rounded-16 col-12" style="height: 457px;width:357px;">
                </div>
                <div data-anim-child="fade delay-5" class="text-17 mt-30">{{$about[2]->name}}</div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="layout-pt-lg layout-pb-lg bg-light-1">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">OUR SERVICES</div>
                <h2 class="text-64 md:text-40">Hotel Facilities</h2>
            </div>
        </div>

        <div class="row y-gap-40 justify-between pt-100 sm:pt-50">

            @foreach($facilities as $item)
            <div data-anim-child="slide-up delay-4" class="col-lg-auto col-md-4 col-6">
                <div class="iconCard -type-1 -hover-1 text-center">
                    <div class="iconCard__icon text-50">
                        <div class="iconCard__icon__circle bg-white"></div>
                        <i class="{{$item->icon}}"></i>
                    </div>
                    <h4 class="text-24 sm:text-21 lh-1 mt-30 sm:mt-15">{{$item->name}}</h4>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>

<!-- <section class="layout-pb-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">WHAT TO DO ON THIS ISLAND</div>
                <h2 class="text-64 md:text-40">Unforgettable Experience</h2>
            </div>
        </div>

        <div class="pt-100 sm:pt-50">
            <div class="relative js-section-slider" data-gap="30" data-slider-cols="xl-4 lg-4 md-3 sm-2 base-1" data-nav-prev="js-slider4-prev" data-nav-next="js-slider4-next">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-2" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/1.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Bike Rides</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-4" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/2.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Golf</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-6" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/3.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Snowsports</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-8" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/4.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Climbing</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-10" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/5.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Bike Rides</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-12" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/6.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Golf</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="#" data-anim-child="img-right cover-light-1 delay-14" class="baseCard -type-1 -hover-image-scale">
                            <div class="baseCard__image ratio ratio-33:45 rounded-16">
                                <div class="-hover-image-scale__image">
                                    <img src="{{asset('img/cards/1/7.png')}}" alt="image" class="img-ratio">
                                </div>
                            </div>
                            <div class="baseCard__content d-flex flex-column justify-end text-center">
                                <h4 class="text-30 md:text-25 text-white">Snowsports</h4>
                                <div class="text-white mt-10">$280/Person</div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="navAbsolute -type-4">
                    <button class="size-80 flex-center bg-accent-1-50 blur-1 rounded-full js-slider4-prev">
                        <i class="icon-arrow-left text-24 text-white"></i>
                    </button>

                    <button class="size-80 flex-center bg-accent-1-50 blur-1 rounded-full js-slider4-next">
                        <i class="icon-arrow-right text-24 text-white"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section data-anim-wrap class="cta -type-1">
    <div class="cta__bg px-60 sm:px-15">
        <div data-anim-child="img-right cover-light-1 delay-1" class="rounded-16">
            <img src="{{asset('img/cta/8/1.png')}}" alt="image" class="rounded-16">
        </div>
    </div>

    <div class="container">
        <div data-anim-child="slide-up delay-4" class="row justify-center text-center">
            <div class="col-auto">
                <h2 class="text-92 lg:text-64 sm:text-40 text-white">
                    Luxury Awaits.<br class="lg:d-none"> Book Your Stay Today!
                </h2>

                <a  href="{{route('roomOrApartment')}}" class="button -md -type-2 bg-accent-2 -accent-1 rounded-16 mx-auto mt-40 md:mt-30">BOOK NOW</a>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">EXPLORE</div>
                <h2 class="text-64 md:text-40 lh-11">Rooms & Apartments</h2>
            </div>
        </div>

        <div class="row x-gap-30 y-gap-30 pt-100 sm:pt-50">

            @foreach($room_or_apartment as $item)
            <div class="col-lg-4 col-md-6">
                <a href="rooms-single-1.html" data-anim-child="slide-up delay-2" class="roomCard -type-2 -hover-button-center d-block bg-accent-1 rounded-16 overflow-hidden">
                    <div class="roomCard__image -no-line ratio ratio-45:43 -hover-button-center__wrap">
                        <img src="{{asset($image_url.$item->image)}}" alt="image" class="img-ratio">

                        <div class="roomCard__price text-15 fw-500 bg-white text-accent-1 rounded-8">৳{{$item->price}}/ NIGHT</div>

                        <div class="-hover-button-center__button flex-center size-130 rounded-full bg-accent-1-50 blur-1 border-white-10">
                            <span class="text-15 fw-500 text-white">BOOK NOW</span>
                        </div>
                    </div>

                    <div class="roomCard__content text-center px-30 py-30">
                        <h3 class="roomCard__title lh-065 text-40 md:text-24 text-white">{{$item->room_type->name??''}}</h3>

                        <p class="text-white mt-30">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod.
                        </p>

                        <div class="d-flex x-gap-20 justify-center pt-30">

                            <div class="d-flex items-center text-white">
                                <i class="icon-size text-20 mr-10"></i>
                                {{$item->diameter}} m<sup>2</sup>
                            </div>

                            <div class="d-flex items-center text-white">
                                <i class="icon-guest text-20 mr-10"></i>
                                {{$item->capacity}}
                            </div>

                            <div class="d-flex items-center text-white">
                                <i class="icon-bed-2 text-20 mr-10"></i>
                                {{$item->bed}}
                            </div>

                            <div class="d-flex items-center text-white">
                                <i class="icon-bath text-20 mr-10"></i>
                                {{$item->bath}}
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- <section class="layout-pt-lg">
    <div class="container">
        <div data-anim-wrap class="row y-gap-30 items-center">
            <div data-anim-child="img-right cover-light-1 delay-2" class="col-md-6">
                <div class="ratio ratio-1:1">
                    <img src="{{asset('img/about/19/1.png')}}" alt="image" class="img-ratio rounded-16">
                </div>
            </div>

            <div class="col-lg-4 col-md-5 offset-md-1">
                <i data-anim-child="slide-up delay-5" class="d-block icon-restaurant text-30 mb-30"></i>
                <h3 data-anim-child="slide-up delay-6" class="text-40 md:text-30 lh-065">Restaurant & Bar</h3>
                <p data-anim-child="slide-up delay-7" class="text-17 lh-17 mt-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                <div data-anim-child="slide-up delay-8">
                    <div class="text-17 fw-500 mt-50 md:mt-30">Open Daily: 7:00 pm - 24:00</div>
                </div>

                <div data-anim-child="slide-up delay-8">
                    <button class="button -md -type-2 bg-accent-1 -white rounded-16 text-accent-2 mt-50 md:mt-30">DINING WITH US</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-lg">
    <div class="container">
        <div data-anim-wrap class="row y-gap-30 items-center">
            <div class="col-md-5">
                <i data-anim-child="slide-up delay-5" class="d-block icon-rocks text-30 mb-30"></i>
                <h3 data-anim-child="slide-up delay-6" class="text-40 md:text-30 lh-065">Spa & Wellness</h3>
                <p data-anim-child="slide-up delay-7" class="text-17 lh-17 mt-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                <div data-anim-child="slide-up delay-8">
                    <button class="button -md -type-2 -outline-black text-black rounded-16 mt-50 md:mt-30">discover more</button>
                </div>
            </div>

            <div data-anim-child="img-right cover-light-1 delay-2" class="col-md-6 offset-md-1">
                <div class="ratio ratio-1:1">
                    <img src="{{asset('img/about/19/2.png')}}" alt="image" class="img-ratio rounded-16">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-lg layout-pb-lg">
    <div class="container">
        <div data-anim-wrap class="row y-gap-30 items-center">
            <div data-anim-child="img-right cover-light-1 delay-2" class="col-md-6">
                <div class="ratio ratio-1:1">
                    <img src="{{asset('img/about/19/3.png')}}" alt="image" class="img-ratio rounded-16">
                </div>
            </div>

            <div class="col-lg-4 col-md-5 offset-md-1">
                <i data-anim-child="slide-up delay-5" class="d-block icon-gym text-30 mb-30"></i>
                <h3 data-anim-child="slide-up delay-6" class="text-40 md:text-30 lh-065">Fitness Center</h3>
                <p data-anim-child="slide-up delay-7" class="text-17 lh-17 mt-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

                <div data-anim-child="slide-up delay-8">
                    <button class="button -md -type-2 -outline-black text-black rounded-16 mt-50 md:mt-30">discover more</button>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section data-anim-wrap class="relative z-0 layout-pt-md layout-pb-md " style="margin-top: 5rem;margin-bottom: 5rem;">
    <div class="sectionBg -type-2 overflow-hidden">
        <div class="sectionBg__bg bg-accent-1 rounded-16"></div>
        <img src="{{asset('img/cta/8/1.png')}}" alt="image">
    </div>

    <div class="container">
        <div class="row y-gap-30">
            <div class="col-xl-6 col-lg-7">
                <div class="overflow-hidden js-section-slider" data-gap="30" data-slider-cols="xl-1 lg-1 md-1 sm-1 base-1" data-pagination="js-slider3-pagination">
                    <div class="swiper-wrapper">
                        @foreach($testimonial as $item)
                        <div class="swiper-slide">
                            <div data-anim-child="slide-up delay-1" class="mb-50 md:mb-20">
                                <svg width="45" height="44" viewBox="0 0 45 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_524_698)">
                                        <path d="M9.67883 38C6.64234 38 4.27007 36.9524 2.56204 34.8571C0.854015 32.6667 0 29.4286 0 25.1429C0 20.6667 0.99635 16.381 2.98905 12.2857C5.07664 8.19048 8.01825 4.14286 11.8139 0.142864C11.9088 0.0476213 12.0511 0 12.2409 0C12.5255 0 12.7153 0.142858 12.8102 0.428574C13 0.619048 13.0474 0.857143 12.9526 1.14286C10.6752 4.19048 9.10949 7.14286 8.25548 10C7.49635 12.7619 7.11679 15.8571 7.11679 19.2857C7.11679 21.8571 7.44891 23.8571 8.11314 25.2857C8.77737 26.7143 9.67883 28 10.8175 29.1429L5.40876 30.1429C5.31387 28.5238 5.74088 27.2857 6.68978 26.4286C7.73358 25.5714 9.06205 25.1429 10.6752 25.1429C12.6679 25.1429 14.1861 25.7143 15.2299 26.8571C16.3686 28 16.938 29.5714 16.938 31.5714C16.938 33.6667 16.2737 35.2857 14.9453 36.4286C13.7117 37.4762 11.9562 38 9.67883 38ZM31.5985 38C28.562 38 26.1898 36.9524 24.4818 34.8571C22.8686 32.6667 22.062 29.4286 22.062 25.1429C22.062 20.5714 23.0584 16.2381 25.0511 12.1429C27.0438 8.04762 29.9854 4.04762 33.8759 0.142864C33.9708 0.0476213 34.1131 0 34.3029 0C34.5876 0 34.7774 0.142858 34.8723 0.428574C35.062 0.619048 35.1095 0.857143 35.0146 1.14286C32.7372 4.19048 31.1715 7.14286 30.3175 10C29.5584 12.7619 29.1788 15.8571 29.1788 19.2857C29.1788 21.8571 29.4635 23.9048 30.0328 25.4286C30.6971 26.8571 31.5985 28.0952 32.7372 29.1429L27.4708 30.1429C27.3759 28.5238 27.8029 27.2857 28.7518 26.4286C29.7007 25.5714 31.0292 25.1429 32.7372 25.1429C34.7299 25.1429 36.2482 25.7143 37.292 26.8571C38.4307 28 39 29.5714 39 31.5714C39 33.6667 38.3358 35.2857 37.0073 36.4286C35.7737 37.4762 33.9708 38 31.5985 38Z" fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_524_698" x="0" y="0" width="45" height="44" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dx="6" dy="6" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.1 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_524_698" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_524_698" result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </div>

                            <div data-split='lines' data-anim-child="split-lines delay-3">
                                <div class="text-sec text-40 lg:text-30 md:text-24 text-white">
                                    “{{$item->details}}”
                                </div>
                            </div>

                            <div data-anim-child="slide-up delay-6" class="d-flex items-center mt-50 md:mt-20">
                                <img src="{{asset($image_url.$item->image)}}" alt="image" class="size-80">
                                <div class="ml-20">
                                    <div class="text-white">{{$item->person_name}}</div>
                                    <div class="text-15 text-white">{{$item->person_designation }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div data-anim-child="slide-up delay-7" class="d-flex items-center pt-50 pb-10">
                        <div class="pagination -type-1 -light js-slider3-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="layout-pt-md layout-pb-md">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-10 col-lg-11">
                <div class="row y-gap-30 justify-between">

                    <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">12m+</h3>
                        <div class="uppercase lh-1 mt-30">Happy Customers</div>
                    </div>

                    <div data-split='lines' data-anim-child="split-lines delay-4" class="col-auto">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">22</h3>
                        <div class="uppercase lh-1 mt-30">Luxe ROOMS</div>
                    </div>

                    <div data-split='lines' data-anim-child="split-lines delay-6" class="col-auto">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">14</h3>
                        <div class="uppercase lh-1 mt-30">PRIVATE POOL</div>
                    </div>

                    <div data-split='lines' data-anim-child="split-lines delay-8" class="col-auto">
                        <h3 class="text-92 lg:text-60 md:text-30 lh-065">17</h3>
                        <div class="uppercase lh-1 mt-30">RESTAURANTS</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="px-60" style="margin-bottom: 5rem;">
    <div class="line -horizontal bg-border"></div>
</div>

<!-- <section class="layout-pt-lg pb-30">
    <div data-anim-wrap class="px-60 md:px-20">
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">@swiss-resort</div>
                <h2 class="text-64 md:text-40">Follow us on Instagram</h2>
            </div>
        </div>

        <div class="row y-gap-30 pt-100 sm:pt-50">

            <div class="w-1/5 md:w-1/2 sm:w-1/1">
                <a href="#" class="ratio ratio-1:1" data-anim-child="img-right cover-light-1 delay-2">
                    <img src="{{asset('img/inst/1/1.png')}}" alt="image" class="img-ratio rounded-16">
                </a>
            </div>

            <div class="w-1/5 md:w-1/2 sm:w-1/1">
                <a href="#" class="ratio ratio-1:1" data-anim-child="img-right cover-light-1 delay-4">
                    <img src="{{asset('img/inst/1/2.png')}}" alt="image" class="img-ratio rounded-16">
                </a>
            </div>

            <div class="w-1/5 md:w-1/2 sm:w-1/1">
                <a href="#" class="ratio ratio-1:1" data-anim-child="img-right cover-light-1 delay-6">
                    <img src="{{asset('img/inst/1/3.png')}}" alt="image" class="img-ratio rounded-16">
                </a>
            </div>

            <div class="w-1/5 md:w-1/2 sm:w-1/1">
                <a href="#" class="ratio ratio-1:1" data-anim-child="img-right cover-light-1 delay-8">
                    <img src="{{asset('img/inst/1/4.png')}}" alt="image" class="img-ratio rounded-16">
                </a>
            </div>

            <div class="w-1/5 md:w-1/2 sm:w-1/1">
                <a href="#" class="ratio ratio-1:1" data-anim-child="img-right cover-light-1 delay-10">
                    <img src="{{asset('img/inst/1/5.png')}}" alt="image" class="img-ratio rounded-16">
                </a>
            </div>

        </div>
    </div>
</section> -->
@endsection