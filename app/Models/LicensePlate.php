<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LicensePlate extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'codigo';
    protected $table = 'matricula';

    public function student()
    {
        return $this->belongsTo(Student::class, 'codalumno', 'codigo');
    }

    public function course() {
        return $this->belongsTo(Course::class, 'codcurso', 'codigo');
    }
}
