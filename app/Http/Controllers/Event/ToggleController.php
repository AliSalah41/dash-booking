<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ToggleController extends Controller
{

        public function activation($id)
        {
            $user = Event::where('id', $id)->where('appKey', session('appKey'))->first();
            $message = __('words.client_active');
    
            if ($user->status) {
                $user->update(['status' => 0]);
                $message = __('words.client_not_active');
            } else
                $user->update(['status' => 1]);
    
            return redirect()->route('show')
                ->with('success', $message);
    }
}
