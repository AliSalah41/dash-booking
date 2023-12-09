<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Ticket;
use App\Models\check_in;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function index()
    {
        $checks = check_in::with([ 'ticket'])->get();

         return view('admin.Checks.index', compact('checks'));

    }

    public function show(string $id)
    {

        $check = check_in::where('id',$id)->first();
        // return $check;
          return view('admin.Checks.show', compact('check'));


    }
}
