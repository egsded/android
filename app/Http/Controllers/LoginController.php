<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Login;
use Session;

class LoginController extends Controller
{
    function viewLogin(Request $request)
    {
        $vato = DB::table('usuarios')->first();
        return view('TalleresUTT.Login.login', compact('vato'));	
    }

    function login(Request $request)
    {
        dd($vato);
        $vato = DB::table('usuarios')->first();
        //dd($vato->contraseña);
        //$Login = new Login();
        $usuario = $request->get('usuario');
        //dd($usuario);
        $pass = $request->get('password');
        //dd($pass);

        if ($vato->usuario == $usuario && $vato->contraseña == $pass) {
           return view('TalleresUTT.Talleres.talleres');
        }

        return back();   
    }

    function viewRegistroUsuario()
    {
    	return view('TalleresUTT.Login.registro');
    }
    function registrarse(Request $request)
    {
		/*$this->validate($request, [
		    'usuario' => 'required|max:255|color',
		    'password' => 'required',], 

		    ['usuario.required' => 'Ingrese un usuario',
    		'password.required' => 'Ingrese una contraseña',]);*/



        $usuario = new Login();
		$usuario->usuario = $request->get('usuario');
		$usuario->contraseña = $request->get('password');
		$usuario->save();

		return view('TalleresUTT.Login.login');
    
	}

}
