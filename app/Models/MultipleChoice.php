<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'quiz_id',
        'text',
        'option_text',
        'is_correct',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
