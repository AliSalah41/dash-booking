<?php

namespace App\Http\Controllers\Entertainment;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entertainment;

class EntertainmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        return view('admin.Entertainment.create', ['event' => $event, 'entertainments' => $event->entertainments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $eventId)
    {
            //    return $eventId;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'start_dateTime' => 'required',
            'end_dateTime' => 'required',
            'price' => 'required',

        ]);

      //  $entertainment = Entertainment::where('event_id', $eventId)->first();
    //   $entertainment = new Entertainment();
//       Entertainment::create([
//     'title' => $request->title,
//     'description' => $request->description,
//     'address' => $request->address,
//     'start_dateTime' => $request->start_dateTime,
//     'end_dateTime' => $request->end_dateTime,
//     'price' => $request->price,
//      'event_id' => $eventId,
//  ]);

 Entertainment::updateOrCreate(
    [
        'event_id' => $eventId,

    ],
    [
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'address' => $request->input('address'),
        'start_dateTime' => $request->input('start_dateTime'),
        'end_dateTime' => $request->input('end_dateTime'),
        'price' => $request->input('price'),
    ]
);

if ($request->has('en')) {
    // Redirect to the 'show' route
    return redirect()->route('btn.show',  $eventId)->with('success', 'Entertainment updated successfully');
// Create and save multiple EventTime records
// return redirect()->route('hotels.create')->with('success', __('words.created'));
}else{
    return redirect()->route('show', ['event' =>  $eventId])->with('success', 'Entertainment created successfully');
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
