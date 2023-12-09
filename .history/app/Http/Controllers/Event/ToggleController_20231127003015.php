<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToggleController extends Controller
{
    public function toggleStatus(Request $request, $id, $value)
    {
        $item = YourModel::findOrFail($id);
        $item->update(['status' => $value]);

        return response()->json(['message' => 'Status toggled successfully']);
    }
}