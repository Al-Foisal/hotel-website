<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function roomOrApartment()
    {
        $data = [];
        $room_or_apartment = Http::get($this->api . '/room-or-apartments');
        $facilities = Http::get($this->api . '/hotel-facilities');

        $data['facilities'] = $facilities->ok() ? json_decode($facilities->body()) : [];
        $data['room_or_apartment'] = $room_or_apartment->ok() ? json_decode($room_or_apartment->body()) : [];
        return view('room-or-apartment', $data);
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

        dd($response);
    }
}
