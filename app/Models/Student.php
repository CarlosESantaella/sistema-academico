<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'codigo';

    public function responsibles()
    {
        return $this->belongsToMany(Responsible::class, 'responsibles_students', 'codalumno', 'codresponsable');
    }
}
