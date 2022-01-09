<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('registered_courses')->with('registered_courses.course')->get();
        // dd($students->toArray());
        return view('student.index')->with('students', $students);
    }

    public function indexConditioned()
    {
        $min_credit = 2;
        $students = Student::with('registered_courses')
                   ->with(['registered_courses.course'=>function($query) use($min_credit){
                       $query->where('credit', '>=', $min_credit);
                   }]) 
                   ->get();
        // dd($students->toArray());
        return view('student.index')->with('students', $students);
    }
}
