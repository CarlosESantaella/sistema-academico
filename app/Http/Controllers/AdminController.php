<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Student;
use App\Models\LicensePlate;
use Illuminate\Http\Request;
use App\Exports\LicensesPlatesExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index() {
        return view('admins.index');
    }

    public function viewLicencePlates($startDate=false, $endDate=false) {
        $students = LicensePlate::with(["student", "course", "student.responsibles"]);

        // Filter by date
        if ($startDate && $endDate) {
            $students = LicensePlate::with(["student", "course"])->parents()
                ->where('finscripcion', '>=', $startDate)
                ->where('finscripcion', '<=', $endDate)->get();
        }else {
            $students = LicensePlate::with(["course", "student", "student.responsibles"])->get();
        }



        return view('admins.licenses-plates', ['students' => $students]);
    }

    public function exportLicensePlates($startDate=false, $endDate=false) {
        return Excel::download(new LicensesPlatesExport($startDate, $endDate), 'matriculas.xlsx');
    }

}
