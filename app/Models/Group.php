<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity_of_students', 'executive_teacher'];

    public $timestamps = false;

    public function teacher() {
        return $this->hasOne(Teacher::class, 'teacher_id', 'executive_teacher');
    }
}
