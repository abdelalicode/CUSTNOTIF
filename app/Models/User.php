<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->initNotificationSettings();
        });
    }

    public function initNotificationSettings()
    {
        $adminNotifications = AdminNotification::all();

        foreach ($adminNotifications as $notification) {
            $this->adminNotifications()->attach($notification->id, ['push_enabled' => true, 'email_enabled' => true]);
        }
    }

    

    public function adminNotifications()
    {
        return $this->belongsToMany(AdminNotification::class, 'user_notification_settings', 'user_id' , 'admin_notification_id')
                    ->withPivot('push_enabled', 'email_enabled');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
