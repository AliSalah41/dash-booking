<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

use function App\helpers\appKey;

class AdminController extends Controller
{
    public function __construct()
    {
        // dd(Session::get('appKey'));
        $this->middleware('permission:admin-list'.session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:admin-create'.session('appKey'), ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit'.session('appKey'), ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete'.session('appKey'), ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(session('appKey'));
        $admins = Admin::where('appKey', Auth::user()->appKey)->paginate(10);
        // $admins = Admin::paginate(10);
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'appKey'=>  session('appKey')
        ];
        $admin = Admin::create($data);

        $admin->assignRole($request->input('roles'));
        return redirect()->route('admin.index')->with('success', __('words.admin_created'));
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
        // $admin = Admin::where('id',$id)->where('appKey', session('appKey'))->first();
        $admin = Admin::where('id',$id)->first();
        $roles = Role::pluck('name','name')->all();
        return view('admin.update', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->validated();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        // $admin = Admin::where('id',$id)->where('appKey', session('appKey'))->update($data);
        $admin = Admin::where('id',$id)->update($data);

        $admin = Admin::findOrFail($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $admin->assignRole($request->input('roles'));

        return redirect()->route('admin.index')->with('success', __('words.admin_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Admin::where('id', $id)->where('appKey', Auth::user()->appKey)->delete();
        Admin::where('id', $id)->delete();
        return redirect()->route('admin.index')
                        ->with('success', __('words.admin_deleted'));
    }



    public function activation($id){
        // dd($request->id);
        $admin = Admin::findOrFail($id);
        if($admin->is_active){
            $admin->is_active = 0;
        }else{
            $admin->is_active = 1;
        }
        $admin->save();
        return response()->json(['success'=>__('words.updated')]);
    }

    // public function activation($id){
    //     $admin = Admin::findOrFail($id);
    //     $message = __('words.admin_active');
    //     if($admin->is_active){
    //         $admin->update(['is_active' => 0]);
    //         $message = __('words.admin_not_active');
    //     }
    //     else
    //         $admin->update(['is_active' => 1]);

    //     return redirect()->route('admin.index')
    //                     ->with('success',$message);
    // }
}
