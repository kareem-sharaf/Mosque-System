<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Subject;
use App\Models\User;


class  studentService
{

    public function getstudent($student_id)
    {
        $student = Student::where('id', $student_id)->first();
        if ($student) {
            return $student;
        } else{
            return null;
        }
    }


    public function search($name)
    {
        return Student::where('name', 'like', '%' . $name . '%')
            ->get();
    }






}
