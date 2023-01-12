<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockAudio extends Model
{
    use HasFactory;
    protected $fillable = [
        'mock_id',
        'title',
        'audio',
        'image',
    ];
}
