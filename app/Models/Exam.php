<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_id',
        'category_id',
        'thumbnail',
        'short_description',
        'instruction',
        'time_limit',
    ];

}
