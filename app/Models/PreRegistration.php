<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreRegistration extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'preinscripciones';
    protected $primaryKey = 'id';

    public function students()
    {
        return $this->belongsTo(Student::class, 'fk_alumno', 'codigo');
    }
}
