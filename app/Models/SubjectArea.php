<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectArea extends Model
{
    use HasFactory;

    protected $guarded =  [];
    protected $table = 'area';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'codarea', 'codigo');
    }
}
