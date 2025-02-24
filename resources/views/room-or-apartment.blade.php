@extends('master')
@section('title','Rooms or apartment list')
@section('content')
<section data-anim-wrap class="pageHero -type-1">
    <div class="pageHero__bg" data-anim-child="img-right cover-white delay-1">
        <img src="img/pageHero/1.png" alt="image">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="col-auto">
                <div class="pageHero__content text-center" data-split='lines' data-anim-child="split-lines delay-3">
                    <h1 class="pageHero__title text-white">Rooms & Suites</h1>
                    <p class="pageHero__text text-white">Indulge in luxury in our rooms and suites, featuring stunning views, elegant furnishings, and modern amenities.</p>
                </div>
            </div>
        </div>
    </div>


</section>
<section class="layout-pt-lg">
    <div data-anim-wrap class="container">
        @if(session()->has('message'))
        <div class="d-flex items-center justify-between bg-error-1 px-30 py-30 rounded-8">
            {{session('message')}}
        </div>
        @endif
        <div class="">
            <div data-anim-child="slide-up delay-7" class="">
                <form style="width: 59%;margin: auto;" action="{{route('roomOrApartment')}}">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="date" name="from_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="to_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <div class="searchForm__button">
                                <button type="submit" class="button -accent-1 bg-accent-2 size-50 rounded-full">Go</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-center text-center">
            <div data-split='lines' data-anim-child="split-lines delay-2" class="col-auto">
                <div class="text-15 uppercase mb-30 sm:mb-10">EXPLORE</div>
                <h2 class="text-64 md:text-40 lh-11">Rooms & Apartments</h2>
            </div>
        </div>

        <div class="row x-gap-30 y-gap-30 pt-100 sm:pt-50">

            @foreach($room_or_apartment as $item)
            <div class="col-lg-4 col-md-6">
                <a href="{{route('roomOrApartmentDetails',$item->id)}}" data-anim-child="slide-up delay-2" class="roomCard -type-2 -hover-button-center d-block bg-accent-1 rounded-16 overflow-hidden">
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

@endsection