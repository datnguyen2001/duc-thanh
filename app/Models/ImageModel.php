<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = [
        'src',
        'link',
        'name',
        'name_en',
        'describe',
        'describe_en',
        'display',
        'location',
    ];
}
