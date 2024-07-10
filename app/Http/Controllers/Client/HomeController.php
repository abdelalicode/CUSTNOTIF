<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\NotifGroupCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {
        return view('client.home');
    }


    public function userSettings()
    {
        $user = Auth::user()->load('adminNotifications'); 
        return view('client.settings', compact('user'));

        // $cat = NotifGroupCategory::all()->load('notificationGroups.users');

        // $authUserId = Auth::id();

        // $cat = NotifGroupCategory::with(['notificationGroups.users' => function ($query) use ($authUserId) {
        //     $query->where('users.id', $authUserId);
        // }])->get();

        // dd($cat[0]->notificationGroups[0]->users[0]->pivot->push_enabled);
    }



    public function updateNotificationSettings(Request $request)
    {
        $group_id = $request->group_id;
        $channel_type = $request->channel_type;
        $user = Auth::user();

        $user->adminNotifications()->updateExistingPivot($group_id, ["{$channel_type}_enabled" => $request->enabled]);
        return redirect()->back()->with('status', 'Notification settings updated successfully.');
    }
}