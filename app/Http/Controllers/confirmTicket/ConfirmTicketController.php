<?php

namespace App\Http\Controllers\confirmTicket;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Hotel_Ticket;
use Illuminate\Http\Request;
use App\Models\Confirm_Ticket;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

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
        $tickets = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry'])->get();


        if ($tickets->isEmpty()) {
            return view('admin.notFound.index')->with('error', 'No data found to display.');
        }

        return view('admin.confirm.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function accept(string $orignal_id)
    {
        $ticket = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry', 'user'])
            ->where('id', $orignal_id)
            ->first();

        Notification::create([
            'user_id' =>   $ticket->user->id,
            'message' => 'Modifications to the ticket have been approved',
            'event' => 'room_mate',
            'is_read' => 0

        ]);
        $ticket->delete();




        return redirect()->route('index.edit_ticket')
            ->with('success', 'Accepted successfully!');
    }
    public function ignore(string $edit_ticket_id)
    {
        $ticket = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry', 'user'])
            ->where('id', $edit_ticket_id)
            ->first();

        Notification::create([
            'user_id' =>   $ticket->user->id,
            'message' => 'Modifications to the ticket have not been approved',
            'event' => 'room_mate',
            'is_read' => 0

        ]);
        $ticket->delete();

        return redirect()->route('index.edit_ticket')
            ->with('success', 'ignored successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    public function show_edit_ticket(string $id)
    {
        Notification::dash()->where('event','edit_ticket')->where('model_id',$id)->update(['is_read'=>1]);

        //  $hotel_tickets =Hotel_Ticket::with([ 'tickets', 'hotels'])->where('id',$id)->first();
        $ticket = Ticket::with([
            'editTicket',
            'editTicket.event','editTicket.transportation','editTicket.entertainment','editTicket.hotelTicket','editTicket.airlinecountry'
            ,'event', 'transportation', 'entertainment', 'hotelTicket', 'airlinecountry', 'user'])
            ->where('id', $id)->orderByDesc('updated_at')
            ->firstOrFail();



        // Access the related edit ticket
        $editTicket = $ticket->editTicket;

        // Access the original ticket
        $originalTicket = $ticket;
//        return $editTicket;

        //    $updated_ticket = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry'])
        //    ->has('originalTicket')
        //    ->where('id', $id)
        //    ->first();
        //    return $ticket;

        //    $ticket = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry', 'user'])->where('id', $id)->first();
        if (!$originalTicket || !$editTicket) {
            return view('admin.notFound.index')->with('error', 'No tickets found.');
        }
        // Get hotel_ticket for originalTicket
        $originalHotelTicket = Hotel_Ticket::where('ticket_id', $originalTicket->id)
            ->first();

        // Get hotel_ticket for editTicket
        $editHotelTicket = Hotel_Ticket::where('ticket_id', $editTicket->id)
            ->first();

        return view('admin.Edit_tickets.show', compact('originalTicket', 'editTicket', 'originalHotelTicket', 'editHotelTicket'));
    }
    public function index_edit_ticket()
    {

        // Retrieve the edit_ticket
        // $edit_ticket = Ticket::find('edit_ticket');


        // // Retrieve tickets where any value in edit_ticket column equals any value in id column
        // $tickets = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry'])->where('id',$edit_ticket_values)
        //     ->get();
        // return Ticket::find(1)->editTicket;
        $tickets = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry'])

            ->has('editTicket')
            ->get();


        // return  $tickets;


        return view('admin.Edit_tickets.index', compact('tickets'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //  $confirm_ticket = Confirm_Ticket::with([ 'event', 'transportation', 'entertainment', 'hotel', 'airlinecountry','tickets'])->where('id',$id)->first();
        //  $hotel_tickets =Hotel_Ticket::with([ 'tickets', 'hotels'])->where('id',$id)->first();
        $ticket = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry', 'user'])->where('id', $id)->first();
        if (!$ticket) {
            return view('admin.notFound.index')->with('error', 'No tickets found.');
        }
        $user_ticket = $ticket->user->id;

        // return $user_ticket;
        // $hotel_ticket =Hotel_Ticket::with(['hotels'])->where('ticket_id',$id)->first();
        // return $ticket;
        $hotel_ticket = Hotel_Ticket::with(['hotels'])->where('ticket_id', $id)->first();
        // return $hotel_ticket;
        return view('admin.confirm.show', compact('ticket', 'hotel_ticket', 'user_ticket'));
    }

    public function rc(string $id)
    {

        //  $confirm_ticket = Confirm_Ticket::with([ 'event', 'transportation', 'entertainment', 'hotel', 'airlinecountry','tickets'])->where('id',$id)->first();
        //  $hotel_tickets =Hotel_Ticket::with([ 'tickets', 'hotels'])->where('id',$id)->first();
        $ticket = Ticket::with(['event', 'transportation', 'entertainment', 'hotel', 'airlinecountry', 'user'])->where('id', $id)->first();
        // if (!$ticket) {
        //     return view('admin.notFound.index')->with('error', 'No tickets found.');
        // }
        $user_ticket = $ticket->user;

        // return $user_ticket;
        // $hotel_ticket =Hotel_Ticket::with(['hotels'])->where('ticket_id',$id)->first();
        // return $ticket;
        $hotel_ticket = Hotel_Ticket::with(['hotels'])->where('ticket_id', $id)->first();
        // return $hotel_ticket;
        return view('id', compact('ticket', 'hotel_ticket', 'user_ticket'));
    }
    // public function showQR(string $id)
    // {

    //     //  $confirm_ticket = Confirm_Ticket::with([ 'event', 'transportation', 'entertainment', 'hotel', 'airlinecountry','tickets'])->where('id',$id)->first();
    //     //  $hotel_tickets =Hotel_Ticket::with([ 'tickets', 'hotels'])->where('id',$id)->first();
    //     $ticket = Ticket::with(['user'])->where('id',$id)->first();
    //     if (!$ticket) {
    //         return view('admin.confirm.index')->with('error', 'No tickets found.');
    //     }
    //     $user_ticket = $ticket->user->id;

    //     // return $user_ticket;
    //     // $hotel_ticket =Hotel_Ticket::with(['hotels'])->where('ticket_id',$id)->first();
    //     // return $ticket;
    //     // $hotel_ticket =Hotel_Ticket::with(['hotels'])->where('ticket_id',$id)->first();
    //     // return $hotel_ticket;
    //       return view('admin.confirm.show', compact('ticket','hotel_ticket'));


    // }

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
