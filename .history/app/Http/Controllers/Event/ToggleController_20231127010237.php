<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class ToggleController extends Controller
{
    public function toggleStatus($id, $value)
    {

        dd
        try {
            $item = Event::findOrFail($id);
            $item->update(['status' => $value]);

            // You can return any data that you want to use in your Blade view
            return response()->json(['message' => 'Status toggled successfully', 'status' => $value]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error toggling status'], 500);
        }
    }
}
