<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyTranslation;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:company-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:company-create'.session('appKey'), ['only' => ['create','store']]);
        $this->middleware('permission:company-edit'.session('appKey'), ['only' => ['edit','update']]);
        $this->middleware('permission:company-delete'.session('appKey'), ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with('translations')->where('appKey', session('appKey'))->get();
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'type' => 'required',
            'price' => 'required|numeric',
            'total_available' => 'required|numeric',
            'available' => 'required|numeric',
            'image' => 'required|string',
            'en.name' => 'required|string',
            'en.details' => 'required|string',
            'ar.name' => 'required|string',
            'ar.details' => 'required|string',
        ]);

        Company::create($validatedData + ['appKey', session('appKey')]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::where('id', $id)->where('appKey', session('appKey'))->first();
        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::with('translations')->where('id', $id)->where('appKey', session('appKey'))->first();
        return view('admin.company.update', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::where('id', $id)->where('appKey', session('appKey'))->first();
        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
