<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class QuizRadio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_id',
        'text',
        'option_text',
        'is_correct',
        'marks',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
