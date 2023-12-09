<?php

namespace App\Http\Controllers;

use App\Models\AirLine;
use App\Models\AirLineTime;
use App\Models\Event;
use Illuminate\Http\Request;

class AirPortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airports = AirLine::orderBy('id', 'Desc')->get();

        return view('admin.Airports.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::where('appKey', session('appKey'))->get();

        return view('admin.Airports.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id.*'=>'required|exists:events,id',
            'country' => 'required',
            'airport_from' => 'required',
            'airport_to' => 'required'
        ]);

        foreach ($request->event_id as $id){
            AirLine::create([
                'event_id' => $id,
                'country' => $request->country,
                'airport_from' => $request->airport_from,
                'airport_to' => $request->airport_to
            ]);
        }

        return redirect()->route('airports.index')->with('success', __('words.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $airline = AirLine::with('Times')->where('id', $id)->first();

        return view('admin.Airports.show', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $airline = AirLine::with('Times')->where('id', $id)->first();

        $events = Event::where('appKey', session('appKey'))->get();

        return view('admin.Airports.update', compact('airline', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'event_id'=>'required|exists:events,id',
            'country' => 'required',
            'airport_from' => 'required',
            'airport_to' => 'required'
        ]);
        $airline = AirLine::with('Times')->where('id', $id)->first();

        $airline->update([
            'event_id' => $id,
            'country' => $request->country,
            'airport_from' => $request->airport_from,
            'airport_to' => $request->airport_to
        ]);

        return redirect()->route('airports.index')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $airline = AirLine::find($id);
        $airline->delete();
        return redirect()->route('airports.index')->with('success', __('words.deleted'));
    }

    public function createTime(Request $request){
        $request->validate([
            'depart.*' =>'required',
            'returnn.*' =>'required',
        ]);

        for ($i=0; $i<count($request->depart); $i++){
            AirLineTime::create([
                'airline_id' => $request->airline_id,
                'depart' => $request->depart[$i],
                'returnn' => $request->returnn[$i]
            ]);
        }

        return redirect()->back()->with('success', __('words.created'));
    }

    public function deleteTime($id){
        $time = AirLineTime::find($id);
        $time->delete();
        return redirect()->back()->with('success', __('words.deleted'));
    }

}
