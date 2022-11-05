<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewLicencePlates() {
        $students_arr = [];
        $students = User::get();
        foreach ($students as $key => $student) {
            $matricula = $student->student();
            $student["matricula"] = $matricula;
            $students_arr[] = $student;
        }
        echo json_encode($students_arr);
        die();
    }
}
