@extends('master')
@section('title', config('app.name'))
@section('css')
<style>
    .table.-type-2 th {
        padding: 5px 0;
    }

    .table.-type-2 td {
        padding: 5px 0;
    }

    tr>td:last-child {
        text-align: right;
    }

    tr>th:last-child {
        text-align: right;
    }
</style>
@endsection
@section('content')
<!-- {{print_r(session('data'))}} -->
<section class="layout-pt-lg layout-pb-lg">
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-8 col-lg-10">

                <h2 class="text-64 md:text-40 capitalize">Money Receipt</h2>
                @if(!session()->has('data'))
                <div class="bg-info-1 px-30 py-30 rounded-8" style="text-align: center;margin-top:3rem;">
                    <h4>Go to <a href="{{route('home')}}">Home</a></h4>
                </div>
                @endif
            </div>
            @if(session()->has('data'))
            <div class="col-xl-10 col-lg-11 mt-40" style="margin-top: 5rem;">


                <div class="bg-white" id="printSection">
                    <div class="px-100 md:px-20">
                        <div class="row justify-between">
                            <div class="col-10">
                                <div class="text-sec text-30 fw-500">{{$setup->hotel_name}}</div>
                                <div class="text-15 fw-500 mt-20">{{$setup->phone.', '.$setup->email}}</div>
                                <div class="text-15">{{$setup->address}}</div>
                            </div>
                            <div class="col-2">
                                <img src="{{$image_url.$setup->logo}}" style="margin-top: 40px;">
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="row justify-between items-center">
                                    <div class="col-auto">
                                        <div class="text-30 fw-500">Invoice # <span>{{session('data')->invoice_number}}</span></div>

                                        <div class="text-sec text-30 fw-500">Check In# {{\Carbon\Carbon::parse(session('data')->check_in)->format('d-m-Y')}}</div>

                                        <div class="text-sec text-30 fw-500">Check Out# {{\Carbon\Carbon::parse(session('data')->check_out)->format('d-m-Y')}}</div>
                                        <p>Invoice created: {{\Carbon\Carbon::parse(session('data')->created_at)->format('d-m-Y')}}</p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-sec text-30 fw-500">Customer</div>
                                        <div class="text-15 fw-500 mt-20">{{session('data')->cc_name}}</div>
                                        <div class="text-15 ">{{session('data')->cc_phone}}</div>
                                        <div class="text-15 ">{{session('data')->cc_address}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                        $room_type=DB::table('room_or_apartmets as ros')
                        ->where('ros.id',session('data')->rd_room_or_apartment_id)
                        ->join('room_categories as rcs','ros.room_category_id','=','rcs.id')
                        ->select([
                        'ros.room_category_id',
                        'ros.room_number',
                        'rcs.name'
                        ])
                        ->first();
                        @endphp
                        <div class="row pt-50">
                            <div class="col-12">
                                <table class="table -type-2 col-12">
                                    <thead class="bg-light-1">
                                        <tr>
                                            <th class="fw-500">Type</th>
                                            <th class="fw-500">Description</th>
                                            <th class="fw-500">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <td class="text-15">{{session('data')->rd_room_type}}</td>

                                            <td class="text-15">{{$room_type->name??'Deluxe Room'}}</td>

                                            <td class="text-15 fw-500">৳{{number_format(session('data')->total)}}</td>


                                        </tr>




                                        <tr>
                                            <td>PAID BY: <i>{{session('data')->card_issuer}}</i></td>
                                            <td class="fw-500" style="text-align: right;">Total</td>
                                            <td class="fw-500">৳{{number_format(session('data')->subtotal)}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Discount</td>
                                            <td class="fw-500">৳{{number_format(session('data')->discount_amount)}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Subtotal</td>
                                            <td class="fw-500">৳{{number_format(session('data')->subtotal)}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Paid</td>
                                            <td class="fw-500">৳{{number_format(session('data')->paid_amount)}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Due</td>
                                            <td class="fw-500">৳{{number_format(session('data')->due)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="border-light-1-top py-40">
                        <div class="row x-gap-60 y-gap-10 justify-center">
                            <div class="col-auto">
                                <p class="text-15">{{$setup->slogan}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-center" style="margin-top: 3rem;" onclick="printContent('printSection')">
                <button class="button -md -dark-1 bg-accent-1 text-white">Print this invoice</button>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection