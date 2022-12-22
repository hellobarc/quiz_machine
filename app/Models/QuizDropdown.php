<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class QuizDropdown extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_id',
        'text',
        'option_text',
        'is_correct',
        // 'is_dropdown',
        // 'correct_answer',
        // 'is_newline',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
