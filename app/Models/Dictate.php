<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dictate extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'dicta';
    public $timestamps = false;

    public function professor()
    {
        return $this->belongsTo(User::class, 'idusuario', 'codigo');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'idcurso', 'codigo');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'idmateria', 'codigo');
    }
}
