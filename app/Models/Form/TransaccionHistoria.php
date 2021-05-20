<?php

namespace App\Models\Form;

use Illuminate\Database\Eloquent\Model;
use App\Models\Form;
use Carbon\Carbon;
Use Exception; 
use App\User;
use DB;

class TransaccionHistoria extends Model
{
    protected $table ='tbl_pg_transaccion';
    protected $fillable =['id'];

    function InsertTransaccionHistoria($resultArrayWS,$idTransaccion){
    
        try{
                       
          $InsertTransaccionHistoria = new InsertTransaccionHistoria();
          $InsertTransaccionHistoria->id_transaccion       =  $idTransaccion;
          $InsertTransaccionHistoria->codigo_cb            =  "23";//$resultArrayWS['NumRecibo'];
          $InsertTransaccionHistoria->detalle_mensaje_cb   =  "23";//$resultArrayWS['MsgResp'];
          $InsertTransaccionHistoria->observaciones        =  'Envio Transaccion';
          $InsertTransaccionHistoria->numero_autorizacion  =  "23";//$resultArrayWS['NumRecibo'];               
          $InsertTransaccionHistoria->save();
          $idTransaccion = $InsertTransaccionHistoria->id;  

          if($resultadoTX['MsgResp'] == '00'){ 
                $estadoTransaccion = "APROBADO";
          }else {
                $estadoTransaccion = "RECHAZADA";
          }

          $updateEstado = Form\Transaccion::where('id',$idTransaccion)->update(['estado_transacion' => $estadoTransaccion]);

          return $idTransaccion;      
        }catch(\Exeption $e){
            return "ERROR";
        }
    
}
