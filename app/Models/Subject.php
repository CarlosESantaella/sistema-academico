<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'materia';
    protected $primaryKey = 'codigo';
    public $timestamps = false;


}
