<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockFillBlank extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'mock_question_id',
        'text',
        'is_show',
        'blank_answer',
        'marks',
        'instruction',
    ];
    public function mockQuestion()
    {
        return $this->belongsTo(MockQuestion::class, 'mock_question_id');
    }
}
