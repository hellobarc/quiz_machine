<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockRadio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'mock_question_id',
        'text',
        'option_text',
        'is_correct',
        'marks',
    ];
    public function mockQuestion()
    {
        return $this->belongsTo(MockQuestion::class, 'mock_question_id');
    }
}
