<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaModel extends Model
{
    use HasFactory;
    protected $table = 'meta';
    protected $fillable = [
        'title',
        'description',
        'image',
        'type',
    ];
}
