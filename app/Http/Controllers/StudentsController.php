<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Responsible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Auth::logout();
 
        // session()->invalidate();
     
        // session()->regenerateToken();
     
        // return redirect('/login');

        // $student = Student::where('codigo', $id)->get();
        $student = User::where('clave', $id)->firstOrFail()->student()->firstOrFail();
        if($student->estado == 0){
            
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('login.index')->with('message', 'Su cuenta se escuentra deshabilitada');
        }   
        $responsibles = Student::findOrFail($student->codigo)->responsibles()->get();

        return view('students.edit-student', ["student" => $student, "responsibles" => $responsibles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        if($request->hasFile('image')){

            $img_path = $request->file('image')->store('public/students/img');
            $file_name = str_replace('public/students/img/', '', $img_path);
            
            if(Storage::exists('public/students/img/'.$student->foto)){
                Storage::delete('public/students/img/'.$student->foto);
            }
        }else{
            $file_name = $student->foto;
        }

        // student data
        $student->foto = $file_name;
        $student->appaterno = $request->appaterno;
        $student->apmaterno = $request->apmaterno;
        $student->nombres = $request->nombres;
        $student->ci = $request->documento;
        $student->pasaporte = $request->pasaporte;
        $student->fnacimiento = $request->fecha_nacimiento;
        $student->sexo = $request->sexo;
        $student->oficialia = $request->oficialia_n;
        $student->libro = $request->libro_n;
        $student->partida = $request->partida_n;
        $student->folio = $request->folio_n;
        $student->paisnac = $request->npais;
        $student->provnac = $request->nprovincia;
        $student->depnac = $request->ndepartamento;
        $student->locnac = $request->nlocalidad;
        $student->provincia = $request->provincia;
        $student->zona = $request->zona;
        $student->seccion = $request->seccion;
        $student->calle = $request->calle;
        $student->numero = $request->numero;
        $student->localidad = $request->localidad;
        $student->telefono = $request->telefono;
        $student->sie = $request->sie;

        //social aspects
        $student->pertenece = $request->etnia;
        $student->nsalud = $request->salud;
        $student->transporte = $request->transporte;
        $student->tiempo = $request->tiempo;

        // institution of origin



        // enroll


        //billing



        //parents
        $responsible_1 = Responsible::find($request->codigo_1);
        $responsible_2 = Responsible::find($request->codigo_2);

        $responsible_1->relacion = $request->relacion_1;
        $responsible_1->ci = $request->ci_1;
        $responsible_1->appaterno = $request->appaterno_1;
        $responsible_1->apmaterno = $request->apmaterno_1;
        $responsible_1->nombres = $request->nombres_1;
        $responsible_1->idioma = $request->idioma_1;
        $responsible_1->ocupacion = $request->ocupacion_1;
        $responsible_1->ginstruccion = $request->ginstruccion_1;
        $responsible_1->telefono = $request->telefono_1;
        $responsible_1->celular = $request->celular_1;
        $responsible_1->mail = $request->email_1;
        
        $responsible_2->relacion = $request->relacion_2;
        $responsible_2->ci = $request->ci_2;
        $responsible_2->appaterno = $request->appaterno_2;
        $responsible_2->apmaterno = $request->apmaterno_2;
        $responsible_2->nombres = $request->nombres_2;
        $responsible_2->idioma = $request->idioma_2;
        $responsible_2->ocupacion = $request->ocupacion_2;
        $responsible_2->ginstruccion = $request->ginstruccion_2;
        $responsible_2->telefono = $request->telefono_2;
        $responsible_2->celular = $request->celular_2;
        $responsible_2->mail = $request->email_2;
        



        $student->save();
        $responsible_1->save();
        $responsible_2->save();
        
        return redirect()->route('students.edit', ['student' => $student->codigo.'CLS'])->with('message', 'Información actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeState(Request $request, $id)
    {


        $student = Student::find($id);
        
        $student->estado = $request->estado;

        $student->save();


    }
}
