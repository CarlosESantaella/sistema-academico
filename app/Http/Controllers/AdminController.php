<?php

namespace App\Http\Controllers;

use DateTime;

use App\Models\User;
use App\Models\Student;
use App\Models\LicensePlate;
use Illuminate\Http\Request;
use App\Exports\LicensesPlatesExport;

class AdminController extends Controller
{
    public function index() {
        return view('admins.index');
    }

    public function getLicencePlatesByFilter(Request $request) {
        $startDate = $request->startDate ?? false;
        $endDate = $request->endDate ?? false;
        $curso = $request->curso ?? false;
        $curso_parse = [];
        if ($curso) {
            $curso_parse = explode(" ", $curso);
        }
        $nivel = $request->nivel ?? false;
        $turno = $request->turno ?? false;
        $year = date('Y', strtotime(date('Y')));
        $students = LicensePlate::with([
            "course",
            "student",
            "student.responsibles"
        ])->when(
            $startDate,
            function ($query) use ($startDate) {
                return $query->where('finscripcion', '>=', $startDate);
            }
        )->when(
            $endDate,
            function ($query) use ($endDate) {
                return $query->where('finscripcion', '<=', $endDate);
            }
        )->when(
            !$startDate,
            function ($query) use ($year) {
                return $query->whereYear('finscripcion', $year);
            }
        )->get();

        $results = [];

        // Filter
        foreach ($students as $key => $student) {
            if ($curso) {
                if ($student->course->gnumeral != $curso_parse[0] || 
                    $student->course->paralelo != $curso_parse[1]) {
                        continue;       
                }
            }
            if ($nivel) {
                if ($student->course->nivel != $nivel) continue;
            }
            if ($turno) {
                if ($student->course->turno != $turno) continue;
            }
            $results[] = $student;
        }

        return $results;
    }

    public function viewLicencePlates(Request $request) {
        $students = $this->getLicencePlatesByFilter($request);
        
        return view('admins.licenses-plates', [
            'students' => $students, 'startDate' => $request->startDate, 
            'endDate' => $request->endDate, 'curso' => $request->curso,
            'nivel' => $request->nivel, 'turno' => $request->turno
        ]);
    }

    public function exportLicensePlates(Request $request) {
        $students = $this->getLicencePlatesByFilter($request);

        return LicensesPlatesExport::export($students);
    }

    public function searchStudents()
    {

        $students = LicensePlate::with([
            "course",
            "student",
            "student.responsibles"
        ])->get();

        return view('admins.search-students', ["students" => $students]);
    }

    public function createStudent()
    {
        return view('admins.create-student');
    }

}
