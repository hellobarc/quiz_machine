<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'exam_id',
        'title',
        'instruction',
        'quiz_type',
        'marks',
        'status',
    ];
}
