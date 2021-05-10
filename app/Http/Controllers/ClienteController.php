<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Cliente;
use App\CuestionarioSalud;
use PDF;

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
                ->select('c.id as idCliente','c.nombre as cliente','c.telefono','c.email','c.foto','c.deleted_at','pm.fecha_pagom as ultimo','cs.id as cuestionario')
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
         $img2 = $ldate.'file-'.$img;
         \Storage::disk('local')->put($img2, \File::get($file));
        }else{
            $img2= 'sin_foto.jpg';
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
            return view ('sistema.mensajes.mensaje-cliente')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);

        } catch (Throwable $error) {
            echo $error;
        }
      }

      /**
       * @author Jose Alonso Espinares
       * Obtiene el usuario seleccionado y lo regresa junto el formulario para el update
       */
      public function obtenerPorId($id)
      {
          $cliente = \DB::table('clientes as c')->join('cuestionarios_salud as cs','c.id','cs.idc')
          ->select('c.*','cs.id as idCuest','cs.*')->where('c.id',$id)->get();
          if(sizeof($cliente)>0){
              return view('sistema.clientes.formulario-update')->with(['cliente'=>$cliente[0]]);
          }else{
            return view('sistema.mensajes.mensaje-cliente')->with(['proceso'=>"Ver cliente",
            'mensaje'=>'No se encontro al usuario que busca']);
          }
      }

      /**
      * @author Jose Alonso Espinares Romero
      * Guarda en base al cliente
      */
      public function guardaCambios(Request $request){

        $id=$request->id;
        $cuestionario=$request->idCuest;
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
            'email'=>'required|email',
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
        }
        try {
            $cliente = Cliente::find($id);
            $cliente ->nombre=$request->nombre;
            $cliente ->edad=$request->edad;
            $cliente ->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente ->sexo=$request->sexo;
            $cliente ->direccion=$request->direccion;
            $cliente ->telefono=$request->telefono;
            $cliente ->email=$request->email;
            $cliente ->ocupacion=$request->ocupacion;
            if ($file!="") {
                $cliente->foto = $img2;
            }
            $cliente->save();

            $cuestionario = CuestionarioSalud::find($cuestionario);
            $cuestionario ->enfermedad_cronica=$cronica;
            $cuestionario ->enfermedad_respiratoria=$respiratoria;
            $cuestionario ->impedimento_fisico=$impedimento;
            $cuestionario ->enfermedad_cardiovascular=$cardiovascular;
            $cuestionario ->lesion_muscular=$lesion;
            $cuestionario ->lesion_osea=$osea;
            $cuestionario ->estado_salud=$salud;
            $cuestionario->save();

            $proceso = "Cambios cliente";
            $mensaje = 'Se han modificado los datos del cliente.';
            return view ('sistema.mensajes.mensaje-cliente')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);

        } catch (Throwable $error) {
            echo $error;
        }
      }
      /**
       * @author Jose Alonso Espinares
       * Coloca estampa de eliminación logica al registro
       */
      public function eliminacionLogica($id)
      {
          Cliente::find($id)->delete();
          $proceso = "Desactivación Cliente";
          $mensaje = 'El registro  ha sido desactivado';
          return view('sistema.mensajes.mensaje-cliente')
          ->with('proceso',$proceso)
          ->with('mensaje',$mensaje);
      }
      /**
       * @author Jose Alonso Espinares
       * Elimina el registro de la base de datos
       */
      public function delete($id)
      {
            Cliente::withTrashed()->where('id',$id)->forceDelete();
            $proceso = "Eliminación Cliente";
            $mensaje = 'El registro  ha sido eliminado';
            return view('sistema.mensajes.mensaje-cliente')
            ->with('proceso',$proceso)
            ->with('mensaje',$mensaje);
      }
      /**
       * @author Jose Alonso Espinares
       * Elimina estampa de eliminación
       */
      public function restore($id)
      {
          Cliente::withTrashed()->where('id',$id)->restore();
          $proceso = "Activación Cliente";
          $mensaje="Registro restaurado correctamente";
          return view('sistema.mensajes.mensaje-cliente')
          ->with('proceso',$proceso)
          ->with('mensaje',$mensaje);
      }

      /**
       * @author Jose Alonso Espinares
       * Genera el cuestionario de salud asignado al cliente seleccionado
       */
      public function generarCuestionario($id){
          $cuestionario = \DB::table('cuestionarios_salud as cs')
          ->leftjoin('clientes as c','cs.idc','c.id')
          ->select('cs.*','c.nombre as cliente','c.foto')
          ->where('cs.idc',$id)->get();
          if(sizeof($cuestionario)>0){
              $data = $cuestionario[0];
              $pdf = \PDF::loadView('sistema.pdf.cuestionario-salud',compact('data'));
              return $pdf->download('cuestionario-'.$cuestionario[0]->cliente.'.pdf');
          }else{
              return view('sistema.mensajes.mensaje-cliente')->with(['proceso'=>"Cuestionario Salud",
              'mensaje'=>'No existe el usuario que selecciono']);
          }
      }
}
