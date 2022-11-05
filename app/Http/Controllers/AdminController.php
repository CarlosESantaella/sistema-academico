<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Student;
use App\Models\LicensePlate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }
    public function viewLicencePlates() {
        // $students_arr = [];
        // $students = User::get();
        // foreach ($students as $key => $student) {
        //     $matricula = $student->student();
        //     $student["matricula"] = $matricula;
        //     $students_arr[] = $student;
        // }
        // echo json_encode($students_arr);

        $students = LicensePlate::with(["student", "course"])->get();


        die();

        return view('admins.lp', ['students' => $students]);
    }


}
