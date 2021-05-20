<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Carbon\Carbon;
use nusoap_client;
use App\User;
use DB;


class FormularioController extends Controller
{

    private $_fechaActual ='';    
    private $_SERVICE_URL = "";    
    private $_parameterUser = array();     

    public function __construct() {               
          
        $this->_fechaActual = Carbon::now();
    
    }

    function linkInvalid(){        
        return view('form/linkNoValido');
    }

    function linkPay(Request $request){       
        if(!isset($request->id)){
            return view('form/linkNoValido');
        }
        $link = $request->id;
        $stateLink = new Form\Link();
        $links = $stateLink->validateLink($link);

        if($links == "ERROR"){
            return view('form/linkNoValido'); 
        }elseif(count($links) == 0){
            return view('form/linkNoValido');
        }else{
            return view('form/linkPago',compact('links'));
        }       
    }

    function processesPay(Request $request){

        //dd($request->all());
       $terminos = $request->terminos;

       if($terminos =="on"){
           $PGtrasaccion = new Form\Transaccion();
           $idTransaccion = $PGtrasaccion->insetPGTrans($request);

           if($idTransaccion != "ERROR"){
                $PGtrasaccionDetalle = new Form\TransaccionDetalle();
                $idTransaccionDetalle = $PGtrasaccionDetalle->insetPGTransDetalle($request,$idTransaccion);
                if($idTransaccionDetalle !=  "ERROR"){
                   $resultWs = $this->sendWSPaafo($request,$idTransaccion);

                   if($resultWs != false){
                        $resultArrayWS = var_export($resultWs,true); //Captura respuesta VPN
                    
                        $PGtrasaccionHistoria = new Form\TransaccionHistoria();
                        $insertPGtrasaccionHistoria = $PGtrasaccionHistoria->InsertTransaccionHistoria($resultArrayWS,$idTransaccion);

                   }else{

                    $updateEstado = Form\Transaccion::where('id',$idTransaccion)->update(['estado_transacion' =>'NO_CONEXION']);
                       return "NO_CONEXION";
                   }
                }
           }

           return $insertPGtrasaccion;
       }

    }


    private  function sendWSPaafo($request,$idTransaccion){
               
        $certificado = app_path(). '/cert/certificate.crt';
		$certificadoKey = app_path(). '/cert/certificateKey.key';

        $url = 'https://172.19.200.15/webservicevisa/autorizarcompra.asmx?wsdl';
    
        $client = new nusoap_client($url,'wsdl'); 
      
        $param=array(
			'Usuario' 		=> "PAGOYAPAGOYA01",
			'Clave' 		=> "PAGOYAPAGOYA01",
			'NumTarjeta'	=> $request->ntarjeta,
			'Mes' 			=> $request->mes,
			'Ano' 			=> $request->anio,
			'Monto' 		=> $request->monto,
			'Iva' 			=> $request->iva,
			'NumCuotas' 	=> $request->cuotas,
			'CodReferencia' => $idTransaccion,
			'TipoCuenta' 	=> $request->tCuenta,
			'Franquicia' 	=> $request->Franquicia,
			'CVV2' 			=> $request->cod,
		);
        
		$client->setCredentials("","","certificate",
		    array(
		          "sslcertfile"  => $certificado,
		          "sslkeyfile"  => $certificadoKey,
		          "passphrase"  => "convenios",
		          "verifypeer"  => 0, //OPTIONAL
		          "verifyhost"  => 0   //OPTIONAL
		    )
        ); 
       
        $resultado = $client->call('AuthorizeCVV2', $param);
       // dd($resultado);
        return $resultado; 
    }
}
