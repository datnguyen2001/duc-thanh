<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'src',
        'index',
    ];
    public function products()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }
}
