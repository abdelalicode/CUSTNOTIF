<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'description'
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($notification) {
            $notification->initializeNotificationSettings();
        });
    }

    public function initializeNotificationSettings()
    {
        $users = User::where('role_id', 2)->get();

        foreach ($users as $user) {
            $this->users()->attach($user->id, ['push_enabled' => true , 'email_enabled' =>true]);
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_notification_settings', 'admin_notification_id', 'user_id')
                ->withPivot('push_enabled', 'email_enabled');
    }

    public function emailTemplate()
    {
        return $this->hasOne(EmailTemplate::class);
    }

    public function pushTemplate()
    {
        return $this->hasOne(PushTemplate::class);
    }

   
}
