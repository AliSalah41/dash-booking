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
        public function activation($id)
        {
            $user = User::where('id', $id)->where('appKey', session('appKey'))->first();
            $message = __('words.client_active');
    
            if ($user->is_active) {
                $user->update(['is_active' => 0]);
                $message = __('words.client_not_active');
            } else
                $user->update(['is_active' => 1]);
    
            return redirect()->route('users.index')
                ->with('success', $message);
        }
    }
}
