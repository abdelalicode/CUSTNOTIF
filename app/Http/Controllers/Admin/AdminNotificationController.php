<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\AdminNotification;
use App\Models\EmailTemplate;
use App\Models\EmailTemplateCategory;
use App\Models\NotificationGroup;
use App\Models\PushTemplate;
use App\Models\User;
use App\Notifications\Custnotif;

class AdminNotificationController extends Controller
{
    public function index()
    {
        $notifications = AdminNotification::all();
        $templates = EmailTemplate::all();
        $categories = EmailTemplateCategory::all();
        return view('admin.allnotifications', compact('templates', 'categories', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        dd($request->all());
        // AdminNotification::create($request->validated());
        // return redirect()->route('notification.index');

        $validated = $request->validated();

        $adminNotification = AdminNotification::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        $emailTemplate = EmailTemplate::create([
            'subject' => $validated['subject'],
            'body' => $validated['body'],
            'email_template_category_id' => $validated['email_template_category_id'],
            'admin_notification_id' => $adminNotification->id,
        ]);

        $pushTemplate = PushTemplate::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'admin_notification_id' => $adminNotification->id,
        ]);

        return redirect()->route('notification.index');
    }

    public function send(AdminNotification $notification)
    {
        // dd($notification->emailTemplate->body);
        $users = User::where('role_id', 2)->get();

        foreach ($users as $user) {
            $user->notify(new Custnotif($notification));
        }

        return redirect()->route('notification.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminNotification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminNotification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, AdminNotification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminNotification $notification)
    {
        //
    }
}
