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
    protected $table = 'responsable';
    protected $dates = ['fnacimiento'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'ra', 'codresponsable', 'codalumno');
    }

}
