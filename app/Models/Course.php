<?php

namespace App\Models;

use App\Models\User;
use App\Models\LicensePlate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $primaryKey = 'codigo';
    protected $table = 'curso';
    public $timestamps = false;
    
    public function license_plate() {
        return $this->hasOne(LicensePlate::class, 'codcurso', 'codigo');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'cu_ma', 'codcurso', 'codmateria');
    }
    public function teacher(){
        return $this->belongsTo(User::class, 'responsable', 'codigo');
    }
}
