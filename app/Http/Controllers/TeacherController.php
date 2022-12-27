<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teachers.index');
    }

    public function searchStudents(Request $request)
    {
        $students = Student::all();
        return view('teachers.search-students', [
            "students" => $students, "search_by" => $request->search_by, 
            "search_value" => $request->search_value, "gestion" => $request->gestion
        ]);
    }

    public function createStudent()
    {
        
        return view('teachers.create-student');
    }
    public function registration(Request $request)
    {
        
        
        return view('teachers.registration');
    }
}
