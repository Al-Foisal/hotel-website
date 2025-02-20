@extends('master')
@section('title','Be charming person enjoying your mindset with our luxury')
@section('content')
<section data-anim-wrap class="pageHero -type-2 -items-center">
    <div data-anim-child="img-right cover-white delay-1" class="pageHero__bg">
        <img src="img/pageHero/4.png" alt="image">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="col-auto">
                <div data-split='lines' data-anim="split-lines delay-3" class="pageHero__content text-center">
                    <!-- <div class="pageHero__subtitle text-white uppercase mb-20">SINCE 1998</div> -->
                    <h1 class="pageHero__title lh-11 capitalize text-white">About {{$setup->hotel_name}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-lg">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-10 col-lg-11">
                <div data-split='lines' data-anim="split-lines delay-2">
                    <div class="text-15 mb-20">
                        {{$setup->hotel_name}}
                    </div>
                    <h2 class="text-64 md:text-40 capitalize">
                        {{$setup->slogan}}
                    </h2>

                    <p class="lh-17 px-90 lg:px-0 pt-40">
                        {{$setup->about_hotel}}
                    </p>
                </div>

                <!-- <div class="row y-gap-30 justify-between pt-60 md:pt-40">

                    <div data-split='lines' data-anim="split-lines delay-7" class="col-auto">
                        <h3 class="text-64 md:text-30">12m+</h3>
                        <div class="uppercase lh-1 mt-20">Happy Customers</div>
                    </div>

                    <div data-split='lines' data-anim="split-lines delay-9" class="col-auto">
                        <h3 class="text-64 md:text-30">22</h3>
                        <div class="uppercase lh-1 mt-20">Luxe ROOMS</div>
                    </div>

                    <div data-split='lines' data-anim="split-lines delay-11" class="col-auto">
                        <h3 class="text-64 md:text-30">14</h3>
                        <div class="uppercase lh-1 mt-20">PRIVATE POOL</div>
                    </div>

                    <div data-split='lines' data-anim="split-lines delay-13" class="col-auto">
                        <h3 class="text-64 md:text-30">17</h3>
                        <div class="uppercase lh-1 mt-20">RESTAURANTS</div>
                    </div>

                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-lg layout-pb-lg">
    <div class="container">
        @foreach($about as $item)
        @if($loop->even)
        <div data-anim-wrap class="row y-gap-40 justify-between items-center pt-100 sm:pt-50">
            <div data-anim="img-right cover-white delay-1" class="col-xl-6 col-lg-6">
                <img src="{{asset($image_url.$item->image)}}" alt="image" style="height:570px;width:570px;">
            </div>

            <div data-split='lines' data-anim="split-lines delay-3" class="col-xl-5 col-lg-6">
                <h3 class="text-40 md:text-30 capitalize">
                    {{$item->name}}
                </h3>

                <p class="lh-17 pt-40">
                    {{$item->details}}
                </p>
            </div>
        </div>
        @else
        <div data-anim-wrap class="row y-gap-40 justify-between items-center pt-100 sm:pt-50">


            <div data-split='lines' data-anim="split-lines delay-3" class="col-xl-5 col-lg-6">
                <h3 class="text-40 md:text-30 capitalize">
                    {{$item->name}}
                </h3>

                <p class="lh-17 pt-40">
                    {{$item->details}}
                </p>
            </div>
            <div data-anim="img-right cover-white delay-1" class="col-xl-6 col-lg-6">
                <img src="{{asset($image_url.$item->image)}}" alt="image" style="height:570px;width:570px;">
            </div>
        </div>
        @endif
        @endforeach
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

<section class="cta -type-1 pb-100" style="margin-bottom: 5rem;">
    <div class="cta__bg">
        <img src="img/cta/4/1.png" alt="image">
    </div>

    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">
                <h2 class="text-92 lg:text-64 md:text-30 text-white">
                    Luxury Awaits.<br class="lg:d-none"> Book Your Stay Today!
                </h2>

                <button class="button -md -type-2 bg-accent-2 -accent-1 mx-auto mt-40">BOOK NOW</button>
            </div>
        </div>
    </div>
</section>
@endsection