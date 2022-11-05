<?php

namespace App\Models;

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
        return $this->hasOne(Student::class, 'codalumno', 'codigo');
    }
}
