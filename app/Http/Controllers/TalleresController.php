<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Taller;

class TalleresController extends Controller
{
	function viewTalleres(){
		return view('TalleresUTT.Talleres.registroTalleres');
	}
    function talleres(Request $request){

    	$taller = DB::table('tallleres')->get();
    	$collection = collect($taller[0]->nombre);
    	
    	//dd($request->get('optradio'));
    	$talleres = new Taller();
    	$talleres->nombre = $request->get('nombre');
    	$talleres->encargado = $request->get('encargado');
    	$talleres->tipos_taller = $request->get('tipo');
    	$talleres->descripcion = $request->get('descripcion');
    	$talleres->horarios = $request->get('horarios');
    	$talleres->icono = $request->get('icono');
    	$talleres->eventos_id_evento = $request->get('nombre');
    	$talleres->save();
    	
    	return $collection;
    }

    function view(){

    }
    //talleres input
    //Tipo.. combobox
    //Icono.. radiobutton
    //Evento.. Ninguno
}
