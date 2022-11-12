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

    public function getLicencePlatesByFilter(Request $request, $year=false) {
        $year = $request->gestion ? $request->gestion : $year;
        $startDate = $request->startDate ?? false;
        $endDate = $request->endDate ?? false;
        $curso = $request->curso ?? false;
        $curso_parse = [];
        if ($curso) {
            $curso_parse = explode(" ", $curso);
        }
        $nivel = $request->nivel ?? false;
        $turno = $request->turno ?? false;
        $search_by = $request->search_by ?? false;
        $search_value = $request->search_value ?? false;
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
            !$startDate && $year,
            function ($query) use ($year) {
                return $query->whereYear('finscripcion', $year);
            }
        )->get();
        $students = $students->where('student.estado', 1);

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
            if ($search_by && $search_value) {
                if ($student->student->$search_by != $search_value) continue;
            }
            $results[] = $student;
        }

        return $results;
    }

    public function viewLicencePlates(Request $request) {
        $year = date('Y', strtotime(date('Y')));
        $students = $this->getLicencePlatesByFilter($request, $year);
        return view('admins.licenses-plates', [
            'students' => $students, 'startDate' => $request->startDate, 
            'endDate' => $request->endDate, 'curso' => $request->curso,
            'nivel' => $request->nivel, 'turno' => $request->turno
        ]);
    }

    public function exportLicensePlates(Request $request) {
        $year = date('Y', strtotime(date('Y')));
        $students = $this->getLicencePlatesByFilter($request, $year);
        return LicensesPlatesExport::export($students);
    }

    public function searchStudents(Request $request)
    {
        $students = Student::all();
        return view('admins.search-students', [
            "students" => $students, "search_by" => $request->search_by, 
            "search_value" => $request->search_value, "gestion" => $request->gestion
        ]);
    }

    public function createStudent()
    {
        return view('admins.create-student');
    }

}
