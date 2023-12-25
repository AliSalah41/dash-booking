<?php

namespace App\Http\Controllers\AppContent\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppContentRequest;
use App\Models\AppContent;
use App\Models\Countries;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:companyEmail-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:companyEmail-create'.session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:companyEmail-edit'.session('appKey'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:companyEmail-delete'.session('appKey'), ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = AppContent::where('appKey', session('appKey'))->where('key', 'email')->orderBy('id','DESC')->get();
        return view('admin.AppContent.Email.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AppContent.Email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppContentRequest $request)
    {
        $check = AppContent::where('appKey', session('appKey'))->where('key', 'emails')->get();
        foreach($check as $check){
            if($check->local == $request->local || $check->countries_id == $request->countries_id)
                return redirect()->route('about.index')->with('success', 'This E-Mail is already exist in the same language or the same country');
        }
        AppContent::create($request->validated()+[
            'appKey' => session('appKey'),
            'key'   => 'email',
        ]);
        return redirect()->route('emails.index')->with('success', __('words.email_created'));
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
        $email = AppContent::where('id', $id)->where('key', 'email')->where('appKey', session('appKey'))->first();
        return view('admin.AppContent.Email.update', compact('email'));
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
        $email = AppContent::where('id', $id)->where('key', 'email')->where('appKey', session('appKey'))->first();
        $email->update($request->validated());
        return redirect()->route('emails.index')->with('success', __('words.email_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = AppContent::where('id', $id)->where('key', 'email')->where('appKey', session('appKey'))->first();
        $email->delete();
        return redirect()->route('emails.index')->with('success', __('words.email_deleted'));
    }
}
