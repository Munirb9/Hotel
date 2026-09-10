<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone_number'     => 'nullable|string|max:50',
            'group_size'       => 'nullable|string|max:20',
            'preferred_date'   => 'nullable|date',
            'special_requests' => 'nullable|string',
        ]);

        // dd($request);

        // Insert into database
        Booking::create($validated);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your booking request has been submitted successfully!');
    }

    public function index()
    {
        // Fetch all bookings sorted by newest first with pagination
        $bookings = Booking::latest()->paginate(10);

        return view('bookings.index', compact('bookings'));
    }
}