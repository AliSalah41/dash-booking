<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\UserMail;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AirlineCountry;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
// use App\Http\Controllers\UserMail;
class EmailController extends Controller
{
    public function showEmailPage()
    {
        // استرجاع بيانات المستخدمين من قاعدة البيانات
        $users = Ticket::with('user')->get();
        $events = Event::latest()->get();
        $airlines = AirlineCountry::all();
        return view('send-email', compact('users','events','airlines'));
    }


    public function event_airline($eventIds,$airlineIds)
    {
  
        if ($airlineIds == 0) {
            // Fetch all users related to the specified eventId without considering the airline
            $users_ticket = Ticket::with('user')->where('event_id', $eventIds)->get();
        } else {
            // Fetch users based on both eventId and airlineId
            $users_ticket = Ticket::with('user')->where('event_id', $eventIds)->where('airlines_counrty_id', $airlineIds)->get();
        }
        return response()->json($users_ticket);
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


    // $users_ticket = Ticket::with('user')->where('event_id',$eventIds)->where('airlines_counrty_id',$airlineIds)->get();

    foreach ($userIds as $userId) {
        $user = User::find($userId);

        if ($user) {
            // إرسال البريد
            Mail::to($user->email)->send(new UserMail($user, $emailContent));
        }
    }

    return response()->json(['success' => true]);
    // return view('send-email', compact('users_ticket'));;
}


}
