<?php

namespace App\Http\Controllers\AppContent\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\AppContent;
use App\Models\Countries;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:about-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:about-create'.session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:about-edit'.session('appKey'), ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AppContent::where('appKey', session('appKey'))->where('key', 'about')->orderBy('id','DESC')->get();
        return view('admin.AppContent.About.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AppContent.About.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequest $request)
    {
        $check = AppContent::where('appKey', session('appKey'))->where('key', 'about')->get();
        foreach($check as $check){
            if($check->local == $request->local && $check->countries_id == $request->countries_id)
                return redirect()->route('about.index')->with('success', 'About Site is already exist in the same language or the same country');
        }
        AppContent::create($request->validated()+[
            'appKey'    => session('appKey'),
            'key'       => 'about'
        ]);
        return redirect()->route('about.index')->with('success', __('words.created'));
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
        $about = AppContent::where('appKey', session('appKey'))->where('id', $id)->first();
        return view('admin.AppContent.About.update', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequest $request, $id)
    {
        $about = AppContent::where('id', $id)->where('appKey', session('appKey'))->first();
        $about->update($request->validated());
        return redirect()->route('about.index')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
