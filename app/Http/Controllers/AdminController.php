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
        $students = LicensePlate::with(["student", "course"])->get();
        return view('admins.licenses-plates', ['students' => $students]);
    }


}
