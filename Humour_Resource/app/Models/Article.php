<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'category_id' => 'integer',
        'read_time' => 'integer',
    ];
}