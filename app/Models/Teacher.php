<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'group_id'];

    public $timestamps = false;
    
    public function lesson() {
        return $this->belongsToMany(Lesson::class, 'teachers_lessons', 'teacher_id', 'lesson_id');
    }
}
