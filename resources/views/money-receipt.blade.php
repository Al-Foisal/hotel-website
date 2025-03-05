@extends('master')
@section('title','Contact with us')
@section('content')

<section class="layout-pt-lg layout-pb-lg">
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-8 col-lg-10">

                <h2 class="text-64 md:text-40 capitalize">Money Receipt</h2>
                @if(session()->has('data'))
                <div class="bg-info-1 px-30 py-30 rounded-8" style="text-align: center;margin-top:3rem;">
                    <h4>{{session('data')['message']}}</h4>
                </div>
                @endif
            </div>
            @if(session()->has('data'))
            <div class="col-xl-10 col-lg-11 mt-40" style="margin-top: 5rem;">


                <div class="bg-white" id="printSection">
                    <div class="px-100 py-100 md:px-20">
                        <div class="row justify-between">
                            <div class="col-12">
                                <div class="text-sec text-30 fw-500">{{$setup->hotel_name}}</div>
                                <div class="text-15 fw-500 mt-20">{{$setup->phone.', '.$setup->email}}</div>
                                <div class="text-15">{{$setup->address}}</div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="row justify-between items-center">
                                    <div class="col-auto">
                                        <div class="text-30 fw-500">Invoice # <span>{{session('data')['reservation']->invoice_number}}</span></div>

                                        <div class="text-sec text-30 fw-500">Check In# {{\Carbon\Carbon::parse(session('data')['reservation']->check_in)->format('d-m-Y')}}</div>

                                        <div class="text-sec text-30 fw-500">Check Out# {{\Carbon\Carbon::parse(session('data')['reservation']->check_out)->format('d-m-Y')}}</div>
                                        <p>Invoice created: {{\Carbon\Carbon::parse(session('data')['reservation']->created_at)->format('d-m-Y')}}</p>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-sec text-30 fw-500">Customer</div>
                                        <div class="text-15 fw-500 mt-20">{{session('data')['customer']->name}}</div>
                                        <div class="text-15 ">{{session('data')['customer']->phone}}</div>
                                        <div class="text-15 ">{{session('data')['customer']->address}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                        $room_type=DB::table('room_categories')->where('id',session('data')['room']->room_category_id)->first()->name;
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

                                            <td class="text-15">{{session('data')['reserved_room']->room_type}}</td>

                                            <td class="text-15">{{$room_type}}</td>

                                            <td class="text-15">৳{{session('data')['reservation']->subtotal}}</td>


                                        </tr>




                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Total</td>
                                            <td class="fw-500">৳{{session('data')['reservation']->subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Paid</td>
                                            <td class="fw-500">৳{{session('data')['reservation']->paid_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="fw-500" style="text-align: right;">Due</td>
                                            <td class="fw-500">৳{{session('data')['reservation']->due}}</td>
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