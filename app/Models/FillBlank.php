<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class FillBlank extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_id',
        'text',
        'is_blank',
        'blank_answer',
        'is_newline',
        'instruction',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
