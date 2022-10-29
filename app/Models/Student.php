<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'codigo';
    protected $table = 'alumno';

    public function responsibles()
    {
        return $this->belongsToMany(Responsible::class, 'ra', 'codalumno', 'codresponsable');
    }
}
