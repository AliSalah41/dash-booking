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
       // return $checks->isEmpty();
        if ($checks->isEmpty()) {
            return view('admin.notFound.index')->with('error', 'No data found to display.');
        }

         return view('admin.Checks.index', compact('checks'));

    }

    public function show(string $id)
    {

        $check = check_in::where('id',$id)->first();
        if (!$check) {
            return view('admin.notFound.index')->with('error', 'This element not found.');
        }
        // return $check;
          return view('admin.Checks.show', compact('check'));


    }
}
