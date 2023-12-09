<?php

namespace App\Http\Controllers\HotelTicket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;

class HotelTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tickets = Ticket::with(['user', 'event', 'transportation', 'entertainment', 'hotelticket', 'tickettype'])->get();

        return view('admin.booking.index', compact('tickets'));

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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // , 'event', 'transportation', 'entertainment', 'hotelticket', 'tickettype'
        $ticket = Ticket::with(['user', 'event', 'transportation', 'entertainment', 'hotelticket', 'tickettype','airlinecountry','hotel'])->where('id',$id)->first();
        // $user = Ticket::with('user')->where('id',$id)->first();
        // // return $user;
        // $event = Ticket::with('event')->where('id',$id)->first();
        // $transportation = Ticket::with('transportation')->where('id',$id)->first();
        // $entertainment = Ticket::with('entertainment')->where('id',$id)->first();
        // $tickettype = Ticket::with('tickettype')->where('id',$id)->first();
    //  return view('admin.booking.show',compact('user','event','transportation','entertainment','tickettype'));
    return view('admin.booking.show',compact('ticket'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

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
