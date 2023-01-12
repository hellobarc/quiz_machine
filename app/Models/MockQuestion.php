<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'mock_id',
        'question_title',
        'question_type',
        'module',
        'passage_id',
    ];
}
