<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AirlineCountry;
use App\Http\Controllers\Controller;
use App\Http\Requests\AirLineCountryRequest;

class AirlineCountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:airline-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:airline-create'.session('appKey'), ['only' => ['create','store']]);
        $this->middleware('permission:airline-edit'.session('appKey'), ['only' => ['edit','update']]);
        $this->middleware('permission:airline-delete'.session('appKey'), ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airline_countries = AirlineCountry::all();

        return view('admin.Airlines.index', compact('airline_countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Airlines.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AirLineCountryRequest $request)
    {
        // return $request;
        // $request->validate([

        //     'airline' => 'required|string',
        // ]);
        $ValidareData=$request->validated();
       AirlineCountry::create( $ValidareData);
       return redirect()->route('airlineCountry.index')->with('success', __('words.created'));
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
        $airline_country = AirlineCountry::find($id);
        return view('admin.Airlines.update', compact('airline_country'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AirLineCountryRequest $request, string $id)
    {
        $airlineCountry = AirlineCountry::find($id);
        $validatedData =$request->validated();
        $airlineCountry->update($validatedData);

        return redirect()->route('airlineCountry.index')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $airlineCountry = AirlineCountry::find($id);
        $airlineCountry->delete();

        return redirect()->route('airlineCountry.index')->with('success', ' deleted successfully');
    }
}
