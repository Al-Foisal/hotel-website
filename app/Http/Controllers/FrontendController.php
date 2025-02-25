<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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


        DB::beginTransaction();
        try {
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
                ]);
            }
            $due = (int)$request->total - (int)$request->paid_amount;

            $reservation_id = DB::table('room_reservations')->insertGetId([
                'invoice_number' => $invoice_number,
                'invoice' => $invoice,
                'check_in' => $request->rf_from_date,
                'check_out' => $request->rf_to_date,
                'total' => $request->total,
                'subtotal' => $request->total,
                'paid_amount' => $request->paid_amount,
                'due' => $due,
                'customer_id' => $request->customer_id ? $request->customer_id : $customer_id
            ]);


            $room = DB::table('room_or_apartmets')->where('id', $request->room_id)->first();

            $reseved_room_id = DB::table('room_reservation_details')->insertGetId([
                'room_reservation_id' => $reservation_id,
                'room_type' => $request->room_type,
                'room_or_apartment_id' => $request->room_id,
                'adult' => $room->adult ?? 0,
                'child' => $room->child ?? 0,
                'price' => $room->price ?? 0,
            ]);

            $data = [];
            $data['customer'] = DB::table('customers')->where('id', $request->customer_id ? $request->customer_id : $customer_id)->first();
            $data['reservation'] = DB::table('room_reservations')->where('id', $reservation_id)->first();
            $data['room'] = $room;
            $data['reserved_room'] = DB::table('room_reservation_details')->where('id', $reseved_room_id)->first();
            $data['message'] = 'Reservation completed successfully';

            DB::commit();

            session()->put('data', $data);
            return to_route('moneyReceipt');
        } catch (Exception $th) {
            DB::rollBack();

            session()->flash('message', $th->getMessage());
            return back();
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
