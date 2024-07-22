<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyModel extends Model
{
    use HasFactory;
    protected $table = 'policy';
    protected $fillable = [
        'name',
        'name_en',
        'content',
        'content_en',
        'index',
    ];
}
