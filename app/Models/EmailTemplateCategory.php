<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplateCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function emailtemplates()
    {
        return $this->hasMany(EmailTemplate::class);
    }

    public function variables()
    {
        return $this->hasMany(Variable::class);
    }
}
