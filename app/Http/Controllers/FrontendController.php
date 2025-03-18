<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Library\SslCommerz\SslCommerzNotification;

class FrontendController extends Controller
{

    public function index()
    {
        $data = [];
        $about = Http::get($this->api . '/ws-about');
        $facilities = Http::get($this->api . '/hotel-facilities');
        $room_or_apartment = Http::get($this->api . '/room-or-apartments');
        $testimonial = Http::get($this->api . '/ws-testimonial');

        $data['about'] = $about->ok() ? json_decode($about->body()) : [];
        $data['facilities'] = $facilities->ok() ? json_decode($facilities->body()) : [];
        $data['room_or_apartment'] = $room_or_apartment->ok() ? json_decode($room_or_apartment->body()) : [];
        $data['testimonial'] = $testimonial->ok() ? json_decode($testimonial->body()) : [];
        // dd($data['room_or_apartment']);
        return view('index', $data);
    }

    public function about()
    {
        $data = [];
        $about = Http::get($this->api . '/ws-about');
        $facilities = Http::get($this->api . '/hotel-facilities');
        $testimonial = Http::get($this->api . '/ws-testimonial');

        $data['about'] = $about->ok() ? json_decode($about->body()) : [];
        $data['facilities'] = $facilities->ok() ? json_decode($facilities->body()) : [];
        $data['testimonial'] = $testimonial->ok() ? json_decode($testimonial->body()) : [];
        return view('about', $data);
    }
    public function roomOrApartment(Request $request)
    {
        $data = [];

        $dateTimestamp1 = strtotime($request->from_date);
        $dateTimestamp2 = strtotime($request->to_date);

        if ($dateTimestamp1 > $dateTimestamp2) {
            session()->flash('message', 'From date must be grated than to date.');
            return back();
        }
        $dates['from_date'] = $request->from_date;
        $dates['to_date'] = $request->to_date;

        $room_or_apartment = Http::accept('application/json')->get($this->api . '/room-or-apartments', $dates);
        $facilities = Http::get($this->api . '/hotel-facilities');

        $data['facilities'] = $facilities->ok() ? json_decode($facilities->body()) : [];
        $data['room_or_apartment'] = $room_or_apartment->ok() ? json_decode($room_or_apartment->body()) : [];
        // dd($data['room_or_apartment']);
        return view('room-or-apartment', $data);
    }
    public function roomOrApartmentDetails($id)
    {
        $data = [];
        $room_or_apartment = Http::get($this->api . '/room-or-apartment-details/' . $id);
        // $facilities = Http::get($this->api . '/hotel-facilities');

        // $data['facilities'] = $facilities->ok() ? json_decode($facilities->body()) : [];
        if ($room_or_apartment->ok()) {
            $data['room'] = json_decode($room_or_apartment->body());
        } else {
            return back()->with('No data found');
        }

        return view('room-or-apartment-details', $data);
    }

    public function checkRoomAvailability(Request $request)
    {

        $check = DB::table('room_reservation_details')
            ->where('room_or_apartment_id', $request->room_id)
            ->join('room_reservations', 'room_reservation_details.room_reservation_id', '=', 'room_reservations.id')
            ->where('room_reservations.check_in', '<=', $request->from_date)
            ->where('room_reservations.check_out', '>', $request->from_date)
            ->first();

        if (!$check) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function applyPromoCode(Request $request)
    {
        $data = DB::table('promo_codes')
            ->where('promo_code', $request->promo_code)
            ->whereDate('start_date', '<=', date('Y-m-d'))
            ->whereDate('end_date', '>=', date('Y-m-d'))
            ->where('status', 'Active')
            ->first();

        if ($data) {
            return response()->json(['status' => true, 'item' => $data]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function checkCustomerExistence(Request $request)
    {
        $customer = DB::table('customers')->where('phone', $request->phone)->first();

        if ($customer) {
            return response()->json([
                'status' => true,
                'customer' => $customer
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }
    public function roomReservation(Request $request)
    {
        // dd($request->all());

        $post_data = array();
        $post_data['total_amount'] = $request->paid_amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid();
        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->c_full_name;
        $post_data['cus_email'] = $request->c_email;
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->c_phone;
        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";
        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        $discount_info = json_decode($request->discount_info);
        $latest_bill = DB::table('room_reservations')->orderBy('id', 'desc')->first();

        if (isset($latest_bill)) {
            $invoice_number = date("y") . str_pad((int) $latest_bill->invoice + 1, 5, "0", STR_PAD_LEFT);
            $invoice        = 1 + $latest_bill->invoice;
        } else {
            $invoice_number = date("y") . str_pad((int) 1, 5, "0", STR_PAD_LEFT);
            $invoice        = 1;
        }

        if (!$request->customer_id) {
            $customer_id = DB::table('customers')->insertGetId([
                'name' => $request->c_full_name,
                'email' => $request->c_email,
                'phone' => $request->c_phone,
                'address' => $request->c_address,
                'gender' => $request->c_gender,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $due = (int)$request->subtotal - (int)$request->paid_amount;

        $reservation_id = DB::table('room_reservations')->insertGetId([
            'invoice_number' => $invoice_number,
            'invoice' => $invoice,
            'check_in' => $request->rf_from_date,
            'check_out' => $request->rf_to_date,
            'discount_info' => $request->discount_info,
            'belonging_days' => $request->days,
            'discount' => $discount_info ? $discount_info->discount : null,
            'discount_type' => $discount_info ? $discount_info->discount_type : null,
            'discount_amount' => $discount_info ? $request->discounted_amount : 0,
            'total' => $request->total,
            'subtotal' => $request->total,
            'paid_amount' => $post_data['total_amount'],
            'due' => $due,
            'customer_id' => $request->customer_id ? $request->customer_id : $customer_id,
            'transaction_id' => $post_data['tran_id'],
            'status' => 'Pending',
            'currency' => $post_data['currency'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $room = DB::table('room_or_apartmets')->where('id', $request->room_id)->first();

        $reseved_room_id = DB::table('room_reservation_details')->insertGetId([
            'room_reservation_id' => $reservation_id,
            'room_type' => $request->room_type,
            'room_or_apartment_id' => $request->room_id,
            'adult' => $room->adult ?? 0,
            'child' => $room->child ?? 0,
            'price' => $room->price ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $post_data['customer_id'] = $request->customer_id ? $request->customer_id : $customer_id;
        $post_data['reservation_id'] = '$reservation_id';
        $post_data['room_id'] = $request->room_id;
        $post_data['reservation_details_id'] = $reseved_room_id;

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

        // $data = [];
        // $data['customer'] = DB::table('customers')->where('id', $request->customer_id ? $request->customer_id : $customer_id)->first();
        // $data['reservation'] = DB::table('room_reservations')->where('id', $reservation_id)->first();
        // $data['room'] = $room;
        // $data['reserved_room'] = DB::table('room_reservation_details')->where('id', $reseved_room_id)->first();
        // $data['message'] = 'Reservation completed successfully';

        // session()->put('data', $data);
        // return to_route('moneyReceipt');
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('room_reservations')
            ->where('transaction_id', $tran_id)
            ->select('id', 'transaction_id', 'status', 'currency', 'paid_amount', 'customer_id')->first();



        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {

                $update_product = DB::table('room_reservations')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing', 'card_issuer' => $request->input('card_issuer')]);


                $resv = DB::table('room_reservations as rrs')
                    ->where('rrs.id', $order_details->id)
                    ->join('customers as cs', 'rrs.customer_id', '=', 'cs.id')
                    ->join('room_reservation_details as rrds', 'rrs.id', '=', 'rrds.room_reservation_id')
                    ->select([
                        'rrs.*',

                        'cs.id as cc_id',
                        'cs.name as cc_name',
                        'cs.email as cc_email',
                        'cs.phone as cc_phone',
                        'cs.country as cc_country',
                        'cs.state as cc_state',
                        'cs.city as cc_city',
                        'cs.address as cc_address',
                        'cs.gender as cc_gender',
                        'cs.age as cc_age',
                        'cs.identity_type as cc_identity_type',
                        'cs.identity_number as cc_identity_number',
                        'cs.identity_image as cc_identity_image',
                        'cs.owner_id as cc_owner_id',
                        'cs.created_at as cc_created_at',
                        'cs.updated_at as cc_updated_at',

                        'rrds.id as rd_id',
                        'rrds.room_reservation_id as rd_room_reservation_id',
                        'rrds.room_type as rd_room_type',
                        'rrds.room_or_apartment_id as rd_room_or_apartment_id',
                        'rrds.adult as rd_adult',
                        'rrds.child as rd_child',
                        'rrds.belonging_days as rd_belonging_days',
                        'rrds.price as rd_price',
                        'rrds.created_at as rd_created_at',
                        'rrds.updated_at as rd_updated_at'
                    ])
                    ->first();

                session()->flash('data', $resv);
                return to_route('moneyReceipt');
            }
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            $resv = DB::table('room_reservations as rrs')
                ->where('rrs.id', $order_details->id)
                ->join('customers as cs', 'rrs.customer_id', '=', 'cs.id')
                ->join('room_reservation_details as rrds', 'rrs.id', '=', 'rrds.room_reservation_id')
                ->select([
                    'rrs.*',

                    'cs.id as cc_id',
                    'cs.name as cc_name',
                    'cs.email as cc_email',
                    'cs.phone as cc_phone',
                    'cs.country as cc_country',
                    'cs.state as cc_state',
                    'cs.city as cc_city',
                    'cs.address as cc_address',
                    'cs.gender as cc_gender',
                    'cs.age as cc_age',
                    'cs.identity_type as cc_identity_type',
                    'cs.identity_number as cc_identity_number',
                    'cs.identity_image as cc_identity_image',
                    'cs.owner_id as cc_owner_id',
                    'cs.created_at as cc_created_at',
                    'cs.updated_at as cc_updated_at',

                    'rrds.id as rd_id',
                    'rrds.room_reservation_id as rd_room_reservation_id',
                    'rrds.room_type as rd_room_type',
                    'rrds.room_or_apartment_id as rd_room_or_apartment_id',
                    'rrds.adult as rd_adult',
                    'rrds.child as rd_child',
                    'rrds.belonging_days as rd_belonging_days',
                    'rrds.price as rd_price',
                    'rrds.created_at as rd_created_at',
                    'rrds.updated_at as rd_updated_at'
                ])
                ->first();

            session()->flash('data', $resv);
            return to_route('moneyReceipt');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('room_reservations')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'paid_amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('room_reservations')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('room_reservations')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'paid_amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('room_reservations')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('room_reservations')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'paid_amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('room_reservations')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

    public function moneyReceipt()
    {
        if (!session()->has('data')) {
            return to_route('roomOrApartment');
        }
        return view('money-receipt');
    }
    public function contact()
    {
        $data = [];

        return view('contact', $data);
    }

    public function saveMessage(Request $request)
    {
        $data = [];
        $data['_token'] = $request->_token;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        $response = Http::accept('application/json')->post($this->api . '/save-message', $data);

        if ($response->ok()) {
            session()->flash('message', 'Your query submitted successfully.');
            return to_route('contact');
        } else {
            session()->flash('message', 'Something went wrong! Please try again later.');
            return to_route('contact');
        }
    }
}
