<?php

namespace App\Http\Controllers\confirmTicket;

use App\Http\Controllers\Controller;
use App\Models\Confirm_Ticket;
use App\Models\Hotel_Ticket;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ConfirmTicketController extends Controller
{
 /**
     * Display a listing of the resource.
     */


     public function __construct()
     {



         $this->middleware('permission:confirm-list' . session('appKey'), ['only' => ['index']]);
         $this->middleware('permission:confirm-create' . session('appKey'), ['only' => ['create', 'store']]);
         $this->middleware('permission:confirm-edit' . session('appKey'), ['only' => ['edit', 'update']]);
         $this->middleware('permission:confirm-delete' . session('appKey'), ['only' => ['destroy']]);
     }

    public function index()
    {
        $tickets = Ticket::with([ 'event', 'transportation', 'entertainment', 'hotel', 'airlinecountry'])->get();

        return view('admin.confirm.index', compact('tickets'));

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
        //  $confirm_ticket = Confirm_Ticket::with([ 'event', 'transportation', 'entertainment', 'hotel', 'airlinecountry','tickets'])->where('id',$id)->first();
        //  $hotel_tickets =Hotel_Ticket::with([ 'tickets', 'hotels'])->where('id',$id)->first();
        $ticket = Ticket::with([ 'event', 'transportation', 'entertainment', 'hotel', 'airlinecountry','user'])->where('id',$id)->first();
        // $hotel_ticket =Hotel_Ticket::with(['hotels'])->where('ticket_id',$id)->first();
        // return $ticket;
        $hotel_ticket =Hotel_Ticket::with(['hotels'])->where('ticket_id',$id)->first();
        // return $hotel_ticket;
          return view('admin.confirm.show', compact('ticket','hotel_ticket'));


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
