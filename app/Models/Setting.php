<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'favicon', 
        'meta_description', 
        'location', 
        'email_address_1',
        'email_address_2', 
        'facebook', 
        'instagram', 
        'twitter',
        'title', 
        'keywords',
        'google_analytics_link',
        'mobile_phone_1',
        'mobile_phone_2',
    ];
}
