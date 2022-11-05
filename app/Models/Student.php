<?php

namespace App\Models;

use App\Models\User;
use App\Models\LicensePlate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user(){
        return $this->belongsToMany(User::class, 'matricula', 'codalumno', 'codusuario');
    }

    public function licenses_plates(){
        return $this->hasOne(LicensePlate::class, 'codalumno', 'codigo');
    }

}
