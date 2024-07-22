<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'category_id',
        'describe',
        'describe_en',
        'content',
        'content_en',
        'src',
        'display',
    ];
}
