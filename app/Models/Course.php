<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $primaryKey = 'codigo';
    protected $table = 'curso';
    
    public function license_plate() {
        return $this->belongsTo(LicensePlate::class, 'codcurso', 'codigo');
    }
}
