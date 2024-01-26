<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function fetchStudents()
    {
        $students = Student::whereBetween('id', [33, 44])->orderBy('id', 'desc')->get();
        return $students;
    }
}
