<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachingService extends Model
{
    protected $guarded = [];

    protected $casts = [
        'full_details_json' => 'array',
    ];
}