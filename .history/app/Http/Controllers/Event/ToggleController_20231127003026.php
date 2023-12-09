<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class ToggleController extends Controller
{
    public function toggleStatus(Request $request, $id, $value)
    {
        $item = Event::findOrFail($id);
        $item->update(['status' => $value]);

        return response()->json(['message' => 'Status toggled successfully']);
    }
}
