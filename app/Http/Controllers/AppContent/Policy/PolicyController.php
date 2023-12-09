<?php

namespace App\Http\Controllers\AppContent\Policy;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppContentRequest;
use App\Models\AppContent;
use App\Models\Countries;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:policy-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:policy-create'.session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:policy-edit'.session('appKey'), ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies = AppContent::where('appKey', session('appKey'))->where('key', 'policy')->orderBy('id','DESC')->get();
        return view('admin.AppContent.Policy.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AppContent.Policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppContentRequest $request)
    {
        $check = AppContent::where('appKey', session('appKey'))->where('key', 'policy')->get();
        foreach($check as $check){
            if($check->local == $request->local || $check->countries_id == $request->countries_id)
                return redirect()->route('about.index')->with('success', 'Policy is already exist in the same language or the same country');
        }
        AppContent::create($request->validated()+[
            'appKey' => session('appKey'),
            'key'   => 'policy'
        ]);
        return redirect()->route('policy.index')->with('success', __('words.policy_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policy = AppContent::where('id', $id)->where('key', 'policy')->where('appKey', session('appKey'))->first();
        return view('admin.AppContent.Policy.update', compact('policy'));
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
        $policy = AppContent::where('id', $id)->where('key', 'policy')->where('appKey', session('appKey'))->first();
        $policy->update($request->validated());
        return redirect()->route('policy.index')->with('success', __('words.policy_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // AppContent::findOrFail($id)->delete();
        // return redirect()->route('policy.index')->with('success', 'Policy is deleted Successfully');
    }
}
