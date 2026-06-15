<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'pendaftaran_id',

        'grooming',
        'motivation',
        'responsibility',
        'cooperativeness',
        'attendance',

        'job_knowledge',
        'quality_of_work',
        'job_speed',
        'initiative',
        'improvement_achieved',

        'total_score',
        'rating'
    ];
}