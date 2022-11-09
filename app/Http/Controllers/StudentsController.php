<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Responsible;
use App\Models\ResponsibleStudent;
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
        if($request->hasFile('image')){
            $img_path = $request->file('image')->store('public/students/img');
            $file_name = str_replace('public/students/img/', '', $img_path);
            if(Storage::exists('public/students/img/'.$request->foto)){
                Storage::delete('public/students/img/'.$request->foto);
            }
        }else{
            $file_name = $request->foto;
        }

        // Students
        $student = Student::create([
            "codigo" => 123321456,
            "rude" => $request->rude,
            "foto" => $file_name,
            "appaterno" => strtoupper($request->appaterno),
            "apmaterno" => strtoupper($request->apmaterno),
            "fnombre" => strtoupper($request->fnombre),
            "nit" => $request->nit,
            "nombres" => strtoupper($request->nombres),
            "ci" => strtoupper($request->documento),
            "exp_ci" => strtoupper($request->expedido_del_ci),
            "pasaporte" => strtoupper($request->pasaporte),
            "fnacimiento" => $request->fecha_nacimiento,
            "sexo" => strtoupper($request->sexo),
            "oficialia" => strtoupper($request->oficialia_n),
            "libro" => strtoupper($request->libro_n),
            "partida" => strtoupper($request->partida_n),
            "folio" => strtoupper($request->folio_n),
            "paisnac" => strtoupper($request->paisnac),
            "provnac" => strtoupper($request->provnac),
            "depnac" => strtoupper($request->depnac),
            "locnac" => strtoupper($request->locnac),
            "provincia" => strtoupper($request->provincia),
            "zona" => strtoupper($request->zona),
            "seccion" => strtoupper($request->seccion),
            "calle" => strtoupper($request->calle),
            "numero" => strtoupper($request->numero),
            "localidad" => strtoupper($request->localidad),
            "telefono" => strtoupper($request->telefono),
            "sie" => strtoupper($request->sie),
            "correo_institucional" => strtoupper($request->correo_institucional),
            "celular" => $request->celular_alumno,
            "pertenece" => strtoupper($request->etnia),
            "nsalud" => strtoupper($request->salud),
            "transporte" => strtoupper($request->transporte),
            "tiempo" => strtoupper($request->tiempo)
        ]);

        // Parents
        if($request->relacion_1){

            // Verificar si ya existe el responsable

            $responsible_1 = Responsible::updateOrCreate(
                [
                    "ci" => strtoupper($request->ci_1)
                ],
                [
                    "relacion" => strtoupper($request->relacion_1),
                    "exp_ci" => strtoupper($request->expedido_del_ci_1),
                    "appaterno" => strtoupper($request->appaterno_1),
                    "apmaterno" => strtoupper($request->apmaterno_1),
                    "nombres" => strtoupper($request->nombres_1),
                    "idioma" => strtoupper($request->idioma_1),
                    "ocupacion" => strtoupper($request->ocupacion_1),
                    "ginstruccion" => strtoupper($request->ginstruccion_1),
                    "telefono" => strtoupper($request->telefono_1),
                    "celular" => strtoupper($request->celular_1),
                    "mail" => strtoupper($request->email_1),
                    "fnacimiento" => $request->fecha_de_nacimiento_1
                ]
            );

            ResponsibleStudent::create([
                "codalumno" => $student->id,
                "codresponsable" => $responsible_1->id
            ]);
        }

        if($request->relacion_2){

            $responsible_2 = Responsible::updateOrCreate(
                [
                    "ci" => strtoupper($request->ci_2)
                ],
                [
                    "relacion" => strtoupper($request->relacion_2),
                    "exp_ci" => strtoupper($request->expedido_del_ci_2),
                    "appaterno" => strtoupper($request->appaterno_2),
                    "apmaterno" => strtoupper($request->apmaterno_2),
                    "nombres" => strtoupper($request->nombres_2),
                    "idioma" => strtoupper($request->idioma_2),
                    "ocupacion" => strtoupper($request->ocupacion_2),
                    "ginstruccion" => strtoupper($request->ginstruccion_2),
                    "telefono" => strtoupper($request->telefono_2),
                    "celular" => strtoupper($request->celular_2),
                    "mail" => strtoupper($request->email_2),
                    "fnacimiento" => $request->fecha_de_nacimiento_2
                ]
            );

            ResponsibleStudent::create([
                "codalumno" => $student->id,
                "codresponsable" => $responsible_2->id
            ]);
        }

        return redirect()->route('students.edit', ['student' => $student->codigo.'CLS'])->with('message', 'Información actualizada correctamente');
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
        // $student = Student::where('codigo', $id)->get();
        // die($id);
        $student = User::where('clave', $id)->firstOrFail()->student()->firstOrFail();
        // $student = User::where('clave', $id)->firstOrFail();
        // echo $student;
        if($student->estado == 0){
            
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('login.index')->with('message', 'Su cuenta se escuentra deshabilitada, gracias por haberse matriculado en periodos anteriores!');
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
        
        // die($request->depnac);
        // student data
        $student->foto = $file_name;
        $student->appaterno = strtoupper($request->appaterno);
        $student->apmaterno = strtoupper($request->apmaterno);
        $student->nombres = strtoupper($request->nombres);
        $student->ci = strtoupper($request->documento);
        $student->exp_ci = strtoupper($request->expedido_del_ci);
        $student->pasaporte = strtoupper($request->pasaporte);
        $student->fnacimiento = $request->fecha_nacimiento;
        $student->sexo = strtoupper($request->sexo);
        $student->oficialia = strtoupper($request->oficialia_n);
        $student->libro = strtoupper($request->libro_n);
        $student->partida = strtoupper($request->partida_n);
        $student->folio = strtoupper($request->folio_n);
        $student->paisnac = strtoupper($request->paisnac);
        $student->provnac = strtoupper($request->provnac);
        $student->depnac = strtoupper($request->depnac);
        $student->locnac = strtoupper($request->locnac);
        $student->provincia = strtoupper($request->provincia);
        $student->zona = strtoupper($request->zona);
        $student->seccion = strtoupper($request->seccion);
        $student->calle = strtoupper($request->calle);
        $student->numero = strtoupper($request->numero);
        $student->localidad = strtoupper($request->localidad);
        $student->telefono = strtoupper($request->telefono);
        $student->sie = strtoupper($request->sie);
        $student->correo_institucional = strtoupper($request->correo_institucional);
        $student->celular =$request->celular_alumno;

        //social aspects
        $student->pertenece = strtoupper($request->etnia);
        $student->nsalud = strtoupper($request->salud);
        $student->transporte = strtoupper($request->transporte);
        $student->tiempo = strtoupper($request->tiempo);

        // institution of origin


        // enroll


        //billing



        //parents
        $responsible_1 = Responsible::find($request->codigo_1);
        $responsible_2 = Responsible::find($request->codigo_2);

        if($responsible_1){

            $responsible_1->relacion = strtoupper($request->relacion_1);
            $responsible_1->ci = strtoupper($request->ci_1);
            $responsible_1->exp_ci = strtoupper($request->expedido_del_ci_1);
            $responsible_1->appaterno = strtoupper($request->appaterno_1);
            $responsible_1->apmaterno = strtoupper($request->apmaterno_1);
            $responsible_1->nombres = strtoupper($request->nombres_1);
            $responsible_1->idioma = strtoupper($request->idioma_1);
            $responsible_1->ocupacion = strtoupper($request->ocupacion_1);
            $responsible_1->ginstruccion = strtoupper($request->ginstruccion_1);
            $responsible_1->telefono = strtoupper($request->telefono_1);
            $responsible_1->celular = strtoupper($request->celular_1);
            $responsible_1->mail = strtoupper($request->email_1);
            $responsible_1->fnacimiento = $request->fecha_de_nacimiento_1;
            $responsible_1->save();
        }
        if($responsible_2){

            $responsible_2->relacion = strtoupper($request->relacion_2);
            $responsible_2->ci = strtoupper($request->ci_2);
            $responsible_2->exp_ci = strtoupper($request->expedido_del_ci_2);
            $responsible_2->appaterno = strtoupper($request->appaterno_2);
            $responsible_2->apmaterno = strtoupper($request->apmaterno_2);
            $responsible_2->nombres = strtoupper($request->nombres_2);
            $responsible_2->idioma = strtoupper($request->idioma_2);
            $responsible_2->ocupacion = strtoupper($request->ocupacion_2);
            $responsible_2->ginstruccion = strtoupper($request->ginstruccion_2);
            $responsible_2->telefono = strtoupper($request->telefono_2);
            $responsible_2->celular = strtoupper($request->celular_2);
            $responsible_2->mail = strtoupper($request->email_2);
            $responsible_2->fnacimiento = $request->fecha_de_nacimiento_2;
            $responsible_2->save();
        }

        $student->save();
        
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

    public function viewCerts() 
    {
        $files = Storage::files('public/students/certs');
        $newFiles = [];

        foreach($files as $file){
            $file = $file;
            if(strpos($file, auth()->user()->codigo) !== false){
                $newFiles[] = $file;
            }
        }

        return view('students.certs', ["files" => $newFiles]);
    }

}
