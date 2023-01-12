<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockPassage extends Model
{
    use HasFactory;
    protected $fillable = [
        'mock_id',
        'title',
        'passage',
        'image',
    ];
}
