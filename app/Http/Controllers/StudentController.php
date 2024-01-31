<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function fetchStudents()
    {
        $students = Student::whereBetween('id', [33, 44])->orderBy('id', 'desc')->get();

        return $students;
    }
}
