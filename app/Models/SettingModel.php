<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $fillable = [
        'logo',
        'address',
        'address_en',
        'phone',
        'email',
        'website',
        'zalo',
        'tiktok',
        'facebook',
        'youtube',
        'map',
    ];
}
