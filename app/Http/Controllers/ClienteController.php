<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Cliente;
use App\CuestionarioSalud;

class ClienteController extends Controller
{
    /**
     * @author Jose Alonso Espinares Romero
     * Muestra todos los clientes y filtra por nombre o id
     */
    public function index(Request $request){
        if ($request) {
            if ($request) {
                $query=$request->searchText;
                $clientes=\DB::table('clientes as c')->leftjoin('pago_membresia as pm','c.id','pm.idc')
                ->join('cuestionarios_salud as cs','c.id','cs.idc')
                ->select('c.id as idCliente','c.nombre as cliente','c.telefono','c.email','c.foto','pm.fecha_pagom as ultimo','cs.id as cuestionario')
                ->where('c.nombre','LIKE','%'.$query.'%')->orWhere('c.id',$query)->orderBy('c.id','desc')
                ->where('pm.fecha_pagom','(SELECT MAX(pm.fecha_pagom))')->get();
                return view('sistema.clientes.index')->with(['clientes'=>$clientes,'searchText'=>$query]);
             }
        }
    }

     /**
      * @author Jose Alonso Espinares Romero
      * Muestra en formulario para el alta de un cliente
      */
     public function formAlta(){
        $registrosExistentes = Cliente::withTrashed()->orderBy('id','desc')->take(1)->get();
        $totalExistentes = count($registrosExistentes);
        if ($totalExistentes==0) {
            $nextId = 1;
        }else{
            $nextId = $registrosExistentes[0]->id+1;
        }
        return view('sistema.clientes.formulario-alta')->with(['nextId'=>$nextId]);
     }

     /**
      * @author Jose Alonso Espinares Romero
      * Guarda en base al cliente
      */
      public function save(Request $request){

        $nombre = $request->nombre;
        $edad = $request->edad;
        $fecha_nacimiento = $request->fecha_nacimiento;
        $sexo = $request->sexo;
        $direccion = $request->direccion;
        $telefono = $request ->telefono;
        $email = $request->email;
        $ocupacion = $request->ocupacion;
        $foto = $request->foto;
        $cronica = $request->cronica;
        $respiratoria = $request->respiratoria;
        $impedimento = $request->impedimento;
        $cardiovascular = $request->cardiovascular;
        $lesion = $request->lesion;
        $osea = $request->osea;
        $salud=$request->salud;

        $this->validate($request,[
            'nombre'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'edad'=>'required|integer|numeric',
            'sexo'=>'required|alpha',
            'direccion'=>'required',
            'telefono'=>['regex:/^[0-9]{10}$/'],
            'email'=>'required|email|unique:clientes',
            'ocupacion'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
            'foto'=>'image|mimes:gif,jpeg,png',
            'cronica'=>'required',
            'respiratoria'=>'required',
            'impedimento'=>'required',
            'cardiovascular'=>'required',
            'lesion'=>'required',
            'osea'=>'required',
            'salud'=>'required'
        ]);

        $file=$request->file('foto');
        if($file!=""){
         $ldate = date('Ymd_His_');
         $img = $file->getClientOriginalName();
         $img2 = $ldate.$img;
         \Storage::disk('local')->put($img2, \File::get($file));
        }else{
            $img2= 'sin_foto.png';
        }
        try {
            $cliente = new Cliente;
            $cliente ->id=$request->id;
            $cliente ->nombre=$request->nombre;
            $cliente ->edad=$request->edad;
            $cliente ->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente ->sexo=$request->sexo;
            $cliente ->direccion=$request->direccion;
            $cliente ->telefono=$request->telefono;
            $cliente ->email=$request->email;
            $cliente ->ocupacion=$request->ocupacion;
            $cliente ->foto=$img2;
            $cliente->save();

            $cuestionario = new CuestionarioSalud;
            $cuestionario ->idc=$request->id;
            $cuestionario ->enfermedad_cronica=$cronica;
            $cuestionario ->enfermedad_respiratoria=$respiratoria;
            $cuestionario ->impedimento_fisico=$impedimento;
            $cuestionario ->enfermedad_cardiovascular=$cardiovascular;
            $cuestionario ->lesion_muscular=$lesion;
            $cuestionario ->lesion_osea=$osea;
            $cuestionario ->estado_salud=$salud;
            $cuestionario->save();

            $proceso = "Registro cliente";
            $mensaje = 'El cliente '. $cliente ->nombre.' agregado correctamente';
            return view ('sistema.mensajes.mensaje')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);

        } catch (Throwable $error) {
            echo $error;
        }
      }
}
