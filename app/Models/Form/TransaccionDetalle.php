<?php

namespace App\Models\Form;

use Illuminate\Database\Eloquent\Model;
use App\Models\Form;
use Carbon\Carbon;
Use Exception; 
use App\User;
use DB;
class TransaccionDetalle extends Model
{
    protected $table ='tbl_pg_transaccion_detalle';
    protected $fillable =['id'];
    //public $timestamps = false;

    function insetPGTransDetalle($request,$idTransaccion){
    
        try{
                       
          $transaccionDetalle = new TransaccionDetalle();
          $transaccionDetalle->id_transaccion          = $idTransaccion;
          $transaccionDetalle->identificador_pan       = substr($request->ntarjeta,-4);
          $transaccionDetalle->cuotas_transaccion      = $request->cuotas;
          $transaccionDetalle->titular_pan             = $request->nombre ." ".$request->apellido;
          $transaccionDetalle->franquicia_pan          = $request->Franquicia;
          $transaccionDetalle->tipo_cuenta_pan         = $request->tCuenta;         
          $transaccionDetalle->save();
          $idTransaccion = $transaccionDetalle->id;  
          return $idTransaccion;      
        }catch(\Exeption $e){
            return "ERROR";
        }
      }
}
