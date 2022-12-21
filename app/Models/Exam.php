<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Level;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'level_id',
        'category_id',
        'thumbnail',
        'short_description',
        'instruction',
        'time_limit',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
