<?php

namespace App\Http\Controllers\AppContent\Phone;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppContentRequest;
use App\Models\AppContent;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:companyPhone-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:companyPhone-create'.session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:companyPhone-edit'.session('appKey'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:companyPhone-delete'.session('appKey'), ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = AppContent::where('appKey', Auth::user()->appKey)->where('key', 'phone')->orderBy('id','DESC')->get();
        return view('admin.AppContent.Phone.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AppContent.Phone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppContentRequest $request)
    {
        $check = AppContent::where('appKey', session('appKey'))->where('key', 'phone')->get();
        foreach($check as $check){
            if($check->local == $request->local || $check->countries_id == $request->countries_id)
                return redirect()->route('phones.index')->with('success', 'Phone Number is already exist in the same language or the same country');
        }
        AppContent::create($request->validated()+[
            'appKey' => session('appKey'),
            'key'   => 'phone',
        ]);
        return redirect()->route('phones.index')->with('success', __('words.phone_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = AppContent::where('id', $id)->where('key', 'phone')->where('appKey', session('appKey'))->first();
        return view('admin.AppContent.Phone.update', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppContentRequest $request, $id)
    {
        $phone = AppContent::where('id', $id)->where('key', 'phone')->where('appKey', session('appKey'))->first();
        $phone->update($request->validated());
        return redirect()->route('phones.index')->with('success', __('words.phone_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = AppContent::where('id', $id)->where('key', 'phone')->where('appKey', session('appKey'))->first();
        $phone->delete();
        return redirect()->route('phones.index')->with('success', __('words.phone_deleted'));
    }
}
