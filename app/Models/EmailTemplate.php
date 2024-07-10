<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'subject',
        'body',
        'email_template_category_id',
        'admin_notification_id'
    ];

    public function templatecategory()
    {
        return $this->belongsTo(EmailTemplateCategory::class);
    }

    public function adminNotification()
    {
        return $this->belongsTo(AdminNotification::class);
    }
}
