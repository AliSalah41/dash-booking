<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list' . session('appKey'), ['only' => ['index']]);
        $this->middleware('permission:user-create' . session('appKey'), ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit' . session('appKey'), ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete' . session('appKey'), ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('appKey', session('appKey'))->get();

        if ($users->isEmpty()) {
            return view('admin.notFound.index')->with('error', 'No data found to display.');
        }
        return view(session('dashboard') . '.admin.User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nickName' => 'required|string|max:255',
            'email' => 'required|email|' . Rule::unique('users', 'email'),
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|max:255',
            'birth' => 'required|date',
        ]);

        User::create([
            'name' => $request->name,
            'nickName' => $request->nickName,
            'phone' => $request->phone,
            'email' => $request->email,
            'birth' => $request->birth,
            'password' => $request->password,
            'appKey' => session('appKey'),
        ]);

        return redirect()->route('users.index')->with('success', __('words.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $user = User::where('appKey', session('appKey'))->where('id', $id)->first();
        // return $user;
        // dd($user);

        if (!$user) {
            // return "a";
            return view('admin.notFound.index')->with('error', ' user not found.');
        }
        // return "b";
        return view('admin.User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.User.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nickName' => 'required|string|max:255',
            'email' =>  'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric',
            'password' => 'required|string|min:8|max:255',
            'birth' => 'required|date',
        ]);
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'nickName' => $request->nickName,
            'phone' => $request->phone,
            'email' => $request->email,
            'birth' => $request->birth,
            'password' => $request->password,
        ]);

        return redirect()->route('users.index')->with('success', __('words.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where("id", $id)->where('appKey', session('appKey'))->delete();

        return redirect()->back()
            ->with('success', __('words.client_deleted'));
    }


    public function activation($id)
    {
        $user = User::where('id', $id)->where('appKey', session('appKey'))->first();
        $message = __('words.client_active');

        if ($user->is_active == 1) {
            $user->update(['is_active' => 0]);
            $message = __('words.client_not_active');
        } else {
            $user->update(['is_active' => 1]);
        }
        return redirect()->route('users.index')
            ->with('success', $message);
    }
}
