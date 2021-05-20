<?php

namespace App\Models\Form;

use Illuminate\Database\Eloquent\Model;
use App\Models\Form;
use Carbon\Carbon;
Use Exception; 
use App\User;
use DB;

class Transaccion extends Model
{
    protected $table ='tbl_pg_transaccion';
    protected $fillable =['id'];
    //public $timestamps = false;

    function insetPGTrans($request){
      
      try{
        $transaccion = new Transaccion();
        $transaccion->id_link                   = $request->id_producto;
        $transaccion->medio_pago                = "Enlace";
        $transaccion->ip_trasaccion             = \Request::ip();
        $transaccion->estado_transacion         = "INICIAL";
        $transaccion->nombre_cliente            = $request->nombre;
        $transaccion->apellido_cliente          = $request->apellido;
        $transaccion->identificacion_cliente    = $request->documento;
        $transaccion->tipo_documento_cliente    = $request->tDoc;
        $transaccion->telefono_cliente          = $request->telefono;
        $transaccion->email_cliente             = $request->correo;
        $transaccion->save();
        $idTransaccion = $transaccion->id;

        return $idTransaccion;      
      }catch(\Exeption $e){
          return "ERROR";
      }
    }
}
