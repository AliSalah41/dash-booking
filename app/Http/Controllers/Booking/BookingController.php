<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:booking-list' . session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:booking-create' . session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:booking-edit' . session('appKey'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:booking-delete' . session('appKey'), ['only' => ['destroy']]);
    }

    public function index()
    {
       // $booking = Ticket::where('appKey', session('appKey'))->get();
        $booking = Ticket::all();
        return view('admin.booking.index', compact('booking'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
