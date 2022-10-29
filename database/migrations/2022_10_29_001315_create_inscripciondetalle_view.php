<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateInscripciondetalleView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `inscripciondetalle` AS select `dbtapia`.`alumno`.`codigo` AS `codigo`,concat(`dbtapia`.`alumno`.`nombres`,' ',`dbtapia`.`alumno`.`appaterno`,' ',`dbtapia`.`alumno`.`apmaterno`) AS `estudiante`,concat(`dbtapia`.`curso`.`gnumeral`,' ',`dbtapia`.`curso`.`paralelo`) AS `numcurso`,`dbtapia`.`curso`.`nivel` AS `nivel`,`dbtapia`.`curso`.`turno` AS `turno`,case `dbtapia`.`alumno`.`sexo` when 'M' then 'Masculino' when 'F' then 'Femenino' end AS `sexo`,concat(`dbtapia`.`usuario`.`nombres`,' ',`dbtapia`.`usuario`.`appaterno`,' ',`dbtapia`.`usuario`.`apmaterno`) AS `responsable`,`dbtapia`.`matricula`.`gestion` AS `gestion`,`dbtapia`.`matricula`.`finscripcion` AS `finscripcion` from (((`dbtapia`.`matricula` join `dbtapia`.`alumno` on(`dbtapia`.`matricula`.`codalumno` = `dbtapia`.`alumno`.`codigo`)) join `dbtapia`.`curso` on(`dbtapia`.`matricula`.`codcurso` = `dbtapia`.`curso`.`codigo`)) join `dbtapia`.`usuario` on(`dbtapia`.`matricula`.`codusuario` = `dbtapia`.`usuario`.`codigo`))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `inscripciondetalle`");
    }
}
