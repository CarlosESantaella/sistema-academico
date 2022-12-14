<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index()
    {

        // $students = Student::all();
        // foreach($students as $student){
        //     $usuario = User::firstOrCreate([
        //         'codigo' => $student->codigo,
        //         'appaterno' => $student->appaterno,
        //         'apmaterno' => $student->apmaterno,
        //         'nombres' => $student->nombres,
        //         'clave' => $student->codigo.'CLS',
        //         'fnacimiento' => $student->fnacimiento,
        //         'tipo' => 3,
        //         'ci' => $student->ci,
        //     ]);

        //     $student = Student::find($usuario->codigo);

            

        //     $student->usuario_fk = $usuario->codigo;
            


        //     $student->save();
        // }


        // die();



        return view('auth.login');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nombres' => 'required',
            'clave' => 'required',
        ]);
        
        $nombres = $request->nombres;
        $clave = $request->clave;
        // $user_type = $request->user_type;
        
        
        $user = User::where([
            ['clave', $clave],
            ['usuario', $nombres]
        ])->first();

        if($user){
            // $username_a = explode(' ', $user->nombres);
            // $first_letter_names = '';

            // foreach($username_a as $letter){
            //     $letter_a = str_split($letter, 1);
            //     $first_letter_names .= $letter_a[0];
            // }
            
            // $correct_username = $first_letter_names.str_replace(" ", "", $user->appaterno);
            
            
            //PRUEBA1 PRUEBA2
            //777777CLS

            auth()->login($user);

            if(auth()->user()->tipo == 3){

                return redirect()->route('students.edit', ['student' => auth()->user()->clave]);
            }else if(auth()->user()->tipo == 2){
                return redirect()->route('secretary.index');
            }else if(auth()->user()->tipo == 1){
                return redirect()->route('teacher.index');
            }else if(auth()->user()->tipo == 0){
                return redirect()->route('admins.index');
            }

        }else{
            return back()->with('message', 'Usuario o contrase??a incorrectos');
        }
        

        // if(!auth()->attempt($request->only('email', 'password'))){
        //     return back()->with('error_login', 'Usuario o contrase??a incorrectos');
        // }
    }

    public function logout(Request $request)
    {
        
        Auth::logout();
 
        session()->invalidate();
     
        session()->regenerateToken();
        
        return redirect()->route('login.index');
    }
    // public function nombres()
    // {
    //     return 'nombres';
    // }
}
