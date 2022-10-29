<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'password' => 'required',
            'user_type' => 'required'
        ]);

        $user = $request->user;
        $password = $request->password;
        $user_type = $request->user_type;

        if($user_type == 'estudiante'){

        }
        // else if(){

        // }else if(){

        // }else if(){

        // }
        
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('error_login', 'Usuario o contraseña incorrectos');
        }

        return redirect()->
    }
}
