<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = ['first_name', 'last_name', 'username', 'group_id', 'lesson'];

    public $timestamps = false;
    
    public function lesson() {
        return $this->belongsToMany(Lesson::class, 'users_lessons', 'user_id', 'lesson_id');

    }

    public static function searchingData($string) {

        $collection = collect(User::all());
        $filtered = $collection->where('username', $string);
        if ($filtered->count() > 0) {
            return $filtered;;
        } else return null;
    }
}
