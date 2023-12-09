<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ToggleController extends Controller
{
    public function toggleStatus($id, $value)
    {

        dd($value);
        try {
            // Log received parameters
            Log::info('Received parameters: ID=' . $id . ', Value=' . $value);
    
            $item = Event::findOrFail($id);
            $item->update(['status' => $value]);
    
            // Log success
            Log::info('Status toggled successfully');
    
            return response()->json(['message' => 'Status toggled successfully', 'status' => $value]);
        } catch (\Exception $e) {
            // Log error
            Log::error('Error toggling status: ' . $e->getMessage());
    
            return response()->json(['error' => 'Error toggling status'], 500);
        }
    }
}
