<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

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
        'templete',
    ];
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
    public function quizRadio()
    {
        return $this->hasmany(QuizRadio::class, 'quiz_id');
    }

}
