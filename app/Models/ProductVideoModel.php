<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVideoModel extends Model
{
    use HasFactory;
    protected $table = 'product_video';
    protected $fillable = [
        'product_id',
        'src',
        'link',
        'channel_name',
        'describe',
        'describe_en',
        'display',
    ];
}
