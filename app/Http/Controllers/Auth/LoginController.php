<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nombres' => 'required',
            'clave' => 'required',
            'user_type' => 'required'
        ]);

        $nombres = $request->nombres;
        $clave = $request->clave;
        $user_type = $request->user_type;

        if($user_type == 3){
            
            $user = User::where('clave', $clave)->first();
            if($user){
                $username_a = explode(' ', $user->nombres);
                $first_letter_names = '';

                foreach($username_a as $letter){
                    $letter_a = str_split($letter, 1);
                    $first_letter_names .= $letter_a[0];
                }
                $correct_username = $first_letter_names.$user->appaterno;
                // die($correct_username);
                if($correct_username == $nombres){
                    //PRUEBA1 PRUEBA2
                    //777777CLS

                    auth()->login($user);

                    return redirect()->route('students.edit', ['student' => auth()->user()->clave]);

                }else{
                    return back()->with('error_login', 'Usuario o contraseña incorrectos');

                }

            }else{
                return back()->with('error_login', 'Usuario o contraseña incorrectos');
            }
        }
        // else if(){

        // }else if(){

        // }else if(){

        // }
        
        // if(!auth()->attempt($request->only('email', 'password'))){
        //     return back()->with('error_login', 'Usuario o contraseña incorrectos');
        // }
    }
    public function nombres()
    {
        return 'nombres';
    }
}
