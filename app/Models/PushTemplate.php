<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushTemplate extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'title',
        'content',
        'admin_notification_id'
    ];


    public function adminNotification()
    {
        return $this->belongsTo(AdminNotification::class);
    }
}
