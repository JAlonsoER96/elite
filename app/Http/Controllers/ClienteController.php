<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * @author Jose Alonso Espinares Romero
     * Muestra todos los clientes activos
     */
    public function index(){
        $clientes = Cliente::where('baja','0')->orderBy('id','desc')->get();
        return view('sistema.clientes.index');
    }

     /**
      * @author Jose Alonso Espinares Romero
      * Muestra en formulario para el alta de un cliente
      */
     public function formAlta(){
         $clientes = \DB::select('select * from clientes Order By id desc');
         $totalClientes = count($clientes);
         if ($totalClientes>0) {
             $nextId = $totalClientes+1;
         }else{
             $nextId = 1;
         }
     }
}
