<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $fillable = [
        'src',
        'link',
        'channel_name',
        'describe',
        'describe_en',
        'display',
        'location',
    ];
}
