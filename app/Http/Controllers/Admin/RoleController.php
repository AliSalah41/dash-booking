<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:role-list'.session('appKey'), ['only' => ['index','store']]);
        $this->middleware('permission:role-create'.session('appKey'), ['only' => ['create','store']]);
        $this->middleware('permission:role-edit'.session('appKey'), ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete'.session('appKey'), ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $roles = Role::orderBy('id','DESC')->where('appKey', session('appKey'))->paginate(5);
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permissions = Permission::where('appKey', session('appKey'))->get();
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'appKey'    => session('appKey'),
        ]);

        $role = Role::create(['name' => $request->input('name'), 'appKey' => session('appKey')]);
        // $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success', __('words.role_created'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id', $id)->where('appKey', session('appKey'))->first();
        // $role = Role::where('id', $id)->first();
        // $permissions = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('appKey', session('appKey'))->where('id', $id)->first();
        $permissions = Permission::where('appKey', session('appKey'))->get();
        // $role = Role::where('id', $id)->first();
        // $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::where('appKey', session('appKey'))->where('id', $id)->first();
        // $role = Role::where('id', $id)->first();
        $role->name = $request->input('name');
        $role->save();
        $permission=[];
        foreach($request->input('permission') as $key => $val):
            array_push($permission, $key);
        endforeach;
        $role->syncPermissions($permission);

        return redirect()->route('roles.index')
                        ->with('success', __('words.role_updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->where('appKey', session('appKey'))->delete();
        // DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success', __('words.role_deleted'));
    }
}
