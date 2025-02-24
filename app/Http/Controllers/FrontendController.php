<?php

namespace App\Http\Controllers;

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
