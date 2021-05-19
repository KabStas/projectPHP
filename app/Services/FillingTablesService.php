<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\QueryRequest;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Group;

class FillingTablesService {


    public function fillingTables() {

        User::create([
            'first_name' => 'Ivan', 
            'last_name' => 'Ivanov', 
            'group_id' => 1 
        ]);
        User::create([
            'first_name' => 'Sergey', 
            'last_name' => 'Sergeev', 
            'group_id' => 1  
        ]);

        Lesson::create([
            'lesson_name' => 'PHP', 
            'lesson_number' => 7  
        ]);

        Teacher::create([
            'first_name' => 'Boris ',
            'last_name' => 'Borisov',
            'group_id' => 1  
        ]);

        dd(Group::create([
            'name' => 'GTO',
            'quantity_of_students' => 25,
            'executive_teacher' => 1
        ]));
    }
}