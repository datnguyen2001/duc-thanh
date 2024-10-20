<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDetailModel extends Model
{
    use HasFactory;
    protected $table = 'image_detail';
    protected $fillable = [
        'image_id',
        'src',
        'describe',
        'describe_en',
        'display',
        'location',
    ];
}
