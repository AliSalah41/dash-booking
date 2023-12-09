<?php

namespace App\Http\Controllers\Transportation;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transportation;

class TransportationController extends Controller
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
        // return $event;
        return view('admin.Transportation.create', ['event' => $event, 'transportations' => $event->transportations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'price' => 'required|numeric',

        ]);
// dd($request->has('tr'));
      //  $transport = Transportation::where('event_id', $eventId)->first();
        Transportation::updateOrCreate(
            [
                'event_id' => $eventId,

            ],
            [
                'price' => $request->input('price'),
            ]
        );

            // Check if the 'ho' parameter is present in the URL
    if ($request->has('tr')) {
        // Redirect to the 'show' route
        return redirect()->route('btn.show',$eventId)->with('success', 'Transportation updated successfully');
    }else{
        return redirect()->route('entertainments.create', ['event' => $eventId])->with('success', 'Transportation price created successfully');
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
