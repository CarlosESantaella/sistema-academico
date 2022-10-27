<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Responsible extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'codigo';

    public function students()
    {
        return $this->belongsToMany(Student::class, 'responsibles_students', 'codresponsable', 'codalumno');
    }

}
