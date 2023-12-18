<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\UserMail;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AirlineCountry;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
// use App\Http\Controllers\UserMail;
class EmailController extends Controller
{
    public function showEmailPage()
    {
        // استرجاع بيانات المستخدمين من قاعدة البيانات
        $users = User::all();
        $events = Event::latest()->get();
        $airlines = AirlineCountry::all();
        return view('send-email', compact('users','events','airlines'));
    }



    public function sendEmail(Request $request)
{
    $request->validate([
        'userId' => 'required|array',
        'userId.*' => 'exists:users,id', // Ensure that each selected user exists
        'emailContent' => 'required',

    ]);
    $userIds = $request->input('userId');
    $emailContent = $request->input('emailContent');

    foreach ($userIds as $userId) {
        $user = User::find($userId);

        if ($user) {
            // إرسال البريد
            Mail::to($user->email)->send(new UserMail($user, $emailContent));
        }
    }

    return response()->json(['success' => true]);
}


}
