<?php

namespace App\Models;

use App\Models\LicensePlate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $primaryKey = 'codigo';
    protected $table = 'curso';
    
    public function license_plate() {
        return $this->hasOne(LicensePlate::class, 'codcurso', 'codigo');
    }
}
