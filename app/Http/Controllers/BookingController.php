<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $rooms = Rooms::all();
        $forms = Booking::with('room')->get();

        return view('booking.index', compact('rooms', 'forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'email' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'noofpeople' => 'required',
            'room_id' => 'required',
            'user_id'=>'required'
            
        ]);
        // $users = new Booking();

        // Assign the user_id based on the authenticated user
        // $users->user_id = Auth::id();
    
        // Assign other validated data to booking attributes
        // ...
    
        // $users->save();
        Booking::create($data);
        return redirect(route('bookingview'))->with('success', 'Room Booked Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Request $request)
    {
        $forms = Booking::find($request->dataid);
        $forms->delete();
        return redirect(route('booking.index'))->with('success', 'Booked data deleted');
    }
}
