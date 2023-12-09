<?php

namespace App\Http\Controllers\Hotel;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\HotelRequest;
use App\Http\Controllers\Controller;
use App\Models\Event;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $hotels = Hotel::all();

        // return view('admin.Hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        // return $event;

        return view('admin.Hotels.create', ['event' => $event, 'hotels' => $event->hotels]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, $eventId)
    {

        //return $request->all();
        $request->validate([
            'single_room' => 'required|numeric',
            'double_room' => 'required|numeric',
            'triple_room' => 'required|numeric',
        ]);

        // Check if a hotel already exists for the specified event
       // $hotel = Hotel::where('event_id', $eventId)->first();

        Hotel::updateOrCreate(
            [
                'event_id' => $eventId,
                'room_type' => 'single_room',
            ],
            [
                'price' => $request->input('single_room'),
            ]
        );

        Hotel::updateOrCreate(
            [
                'event_id' => $eventId,
                'room_type' => 'double_room',
            ],
            [
                'price' => $request->input('double_room'),
            ]
        );

        Hotel::updateOrCreate(
            [
                'event_id' => $eventId,
                'room_type' => 'double_room',
            ],
            [
                'price' => $request->input('double_room'),
            ]
        );

        Hotel::updateOrCreate(
            [
                'event_id' => $eventId,
                'room_type' => 'triple_room',
            ],
            [
                'price' => $request->input('triple_room'),
            ]
        );
        Hotel::updateOrCreate(
            [
                'event_id' => $eventId,
                'room_type' => 'Quadruple_room',
            ],
            [
                'price' => $request->input('Quadruple_room'),
            ]
        );


    // Check if the 'ho' parameter is present in the URL
    if ($request->has('ho')) {
        // Redirect to the 'show' route
        return redirect()->route('btn.show',$eventId)->with('success', 'Hotel updated successfully');
    }
    else{
        $event_id = $eventId;
        return redirect()->route('transportations.create', ['event' => $event_id])->with('success','Hotel created successfully');
    }

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
