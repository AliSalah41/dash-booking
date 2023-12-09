<?php

namespace App\Http\Controllers\Package;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Package;
use App\Models\PackageItems;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:package-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:package-create'.session('appKey'), ['only' => ['create','store']]);
        $this->middleware('permission:package-edit'.session('appKey'), ['only' => ['edit','update']]);
        $this->middleware('permission:package-delete'.session('appKey'), ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = PackageItems::with('companyable')->where('appKey', session('appKey'))->get();

        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('appKey', session('appKey'))->get();

        $categories = Category::where('appKey', session('appKey'))->get();

        return view('admin.package.create', compact('companies', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'en' => [
                'details'       => $request->input('en.details'),
            ],
            'ar' => [
                'details'       => $request->input('ar.details'),
            ],
         ]; 
        $package = PackageItems::create([
            'companyable_id' => $request->company_id,
            'companyable_type' => Company::class,
            'price' => $request->price,
            'appKey' => session('appKey'),
        ]+ $data);

        return redirect()->route('package.index')->with('success', __('words.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
