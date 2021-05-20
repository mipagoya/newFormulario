<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>

  <link href="coreui/css/font-awesome.min.css" rel="stylesheet">
  <link href="coreui/css/simple-line-icons.min.css" rel="stylesheet">
  <link href="coreui/css/style.css" rel="stylesheet">
 
</head>
<body style="background-color: #fff">
    <header class="navbar fondo">
        <img src="imagenes_pagoya/logo.jpg">        
    </header> 
    @php
        $item = $links[0];
    @endphp
    <div class="row" style="padding: 5px 4em">
        <input type="hidden" id="id_producto" value="{{$item->id}}">
        <input type="hidden" id="monto" value="{{$item->valor_total}}">
        <input type="hidden" id="iva" value="{{$item->impuesto}}">
        {{ csrf_field() }}       
        <div class="col-sm-7" style="background-color: #F2F3F4">
            <div class="row border">
                <div class="col-sm-12">           
                    <strong style="font-size: 20px">Datos Personales</strong>
                </div>
                <div class="col-sm-6">   
                    <label for="nombre">Nombres</label>        
                    <input type="text" id="nombre" class="form-control requerido" autocomplete="off">       
                </div>
                <div class="col-sm-6">   
                    <label for="apellido">Apellidos</label>        
                    <input type="text" id="apellido" class="form-control requerido" autocomplete="off">       
                </div>
                <div class="col-sm-6">   
                    <label for="tDoc">Tipo Documento</label>        
                    <select id="tDoc" class="form-control">
                        <option value="CC">Cédula</option>
                        <option value="CE">Cédula Extrangeria</option>
                        <option value="NIT">NIT</option>
                    </select>     
                </div>
                <div class="col-sm-6">   
                    <label for="documento">Número Documento</label>        
                    <input type="number" class="form-control requerido" id="documento" autocomplete="off">
                </div>
                <div class="col-sm-6">   
                    <label for="telefono">Teléfono</label>        
                    <input type="number" class="form-control requerido" id="telefono" autocomplete="off">
                </div>
                <div class="col-sm-6">   
                    <label for="correo">Correo Electronico</label>        
                    <input type="email" class="form-control requerido" id="correo" autocomplete="off">
                </div> 
                <div class="col-sm-12">
                    <div class="row">                       
                        <div class="col-sm-12 p-2">           
                            <strong style="font-size: 20px">Datos de pago</strong>
                        </div>
                        <div class="col-sm-4"> 
                            <label for="tCuenta">Tipo de cuenta</label>        
                            <select id="tCuenta" class="form-control">       
                                <option value="1">Ahorros</option>    
                                <option value="2">Corriente</option>    
                                <option value="3">Credito</option>    
                            </select>    
                        </div>   
                        <div class="col-sm-2"> 
                            <label for="Franquicia">Franquicia</label>        
                            <select id="Franquicia" class="form-control">       
                                <option value="90">Visa</option> 
                            </select>    
                        </div>   
                        <div class="col-sm-2"> 
                            <label for="cuotas">Cuotas</label>        
                            <select id="cuotas" class="form-control">       
                                <option value="1">1</option>    
                                <option value="2">2</option>    
                                <option value="3">3</option>    
                                <option value="4">4</option>    
                                <option value="5">5</option>    
                                <option value="6">6</option>    
                            </select>    
                        </div>    
                        <div class="col-sm-4"> 
                            <label for="ntarjeta">Número de Tarjeta</label>        
                            <input type="number" class="form-control requerido" id="ntarjeta" placeholder="**** **** **** ****" autocomplete="off" maxlength="16" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                        </div> 
                    </div>   
                    <div class="row">
                        <div class="col-sm-12 p-2">           
                            <span>Fecha de expiración</span>
                        </div>
                        <div class="col-sm-4"> 
                            <label for="mes">Mes</label>        
                            <select id="mes" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div> 
                        <div class="col-sm-4"> 
                            <label for="anio">Año</label> 
                            <select id="anio" class="form-control">
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                                <option value="28">2028</option>
                                <option value="29">2029</option>
                                <option value="30">2030</option>
                                <option value="31">2031</option>
                                <option value="32">2032</option>                              
                            </select>       
                            </div> 
                        <div class="col-sm-4"> 
                            <label for="cod">CVV</label>        
                            <input type="number" class="form-control requerido" id="cod" placeholder="CVV" autocomplete="off" maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /> 
                        </div> 
                    </div>
                </div>  
                <div class="col-sm-4 p-3"> 
                    <div class="input-group" id="div_terminos">
                        <input type="checkbox" id="terminos" class="form-control">        
                        <small>Acepto <a href="https://mipagoya.com/wp/wp-content/uploads/2020/03/Pol%c3%adticas-Pasarela-Agregadora.pdf" target="_blank">Términos y Condiciones</a></small>               
                    </div>            
                </div>            
                <div class="col-sm-3 p-3">   
                    <button class="btn btn-sm btn-success" id="pagar" style="background-color: #9cbc14" onclick="dataPagos()">Realizar Pago</button>  
                </div>                
            </div>
        </div>
        <div class="col-sm-5 bg-grisCLw p-4" style="background-color: #F2F3F4">
            <div class="row">
                <div class="col-sm-4 p-2"><strong>Concepto:</strong></div>
                <div class="col-sm-5"><span>{{$item->producto}}</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4 p-2"><strong>Valor Producto:</strong></div>
                <div class="col-sm-5"><span>$ {{number_format($item->valor)}}</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4 p-2"><strong>IVA:</strong></div>
                <div class="col-sm-5"><span>$ {{number_format($item->impuesto)}}</span></div>
            </div>
            <div class="row">
                <div class="col-sm-4 p-2"><strong>Total Compra:</strong></div>
                <div class="col-sm-5"><span>$ {{number_format($item->valor_total)}}</span></div>
            </div>            
            <div class="row p-1" style="margin-top: 110px">
                <div class="col-sm-12" id="divResultado"></div>            
            </div>            
        </div>        
    </div> 
    <script src="coreui/js/jquery.3.6.js"></script>
    <script src="coreui/js/popper.min.js"></script>
    <script src="coreui/js/bootstrap.min.js"></script> 
    <script src="coreui/js/funtioInit.js"></script> 
    
<script>
    
    $(".requerido").blur(function(){  
        let id = this.id;       
            $("#"+id+"").removeClass('border border-danger');       
            if($("#"+id+"").val() == ""){
                $("#"+id+"").addClass('border border-danger');
                $("#divResultado").html("<p>Hay campos en blanco favor validar</p>");                   
            }else{                
                switch (id){
                    case 'correo':
                        let correo = $("#"+id+"").val();
                            let expreg = new RegExp(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/);
                            if(expreg.test(correo)){            
                                $("#"+id+"").removeClass('border border-danger'); 
                                $("#alert_"+id+"").text('');
                            }else{
                                $("#"+id+"").addClass('border border-danger'); 
                                addElement(id);
                            }
                        break
                    case 'ntarjeta':
                        if($("#"+id+"").val().length == 16){
                            $("#"+id+"").removeClass('border border-danger'); 
                            $("#alert_"+id+"").text(''); 
                        }else{
                            $("#"+id+"").addClass('border border-danger');  
                            addElement(id);
                        }
                        break
                    case 'cod':
                        let cod = $("#"+id+"").val();
                                let expregCod = new RegExp(/[0-9]{3}/);
                                if(!expregCod.test(cod)){ 
                                    $("#"+id+"").addClass('border border-danger');  
                                    $("#"+id+"").val('');
                                    addElement(id);
                                }else{                                        
                                    $("#"+id+"").removeClass('border border-danger'); 
                                    $("#alert_"+id+"").text('');
                                }                                    
                        break
                    default:                            
                        break;                
                } 
            }
    });

    function addElement(id){
        
        let alert = document.createElement("p");               
            alert.setAttribute("id","alert_"+id);
            alert.setAttribute("class","text-danger");
            ;
        let texto = "";
        let obligatorio = 0;
        switch(id){
            case "correo":
                texto = "Formato de correo no valido, favor validar";
                obligatorio = 1;
                break;
            case "ntarjeta":    
                texto = "El numero de la tarjeta debe tener 16 caracteres";
                obligatorio = 1;
                break;
            case "cod":    
                texto = "El codigo de la tarjeta debe tener 3 caracteres";
                obligatorio = 1;
                break;
            default:
                obligatorio = 0;
                break;
        }

        let contAlert = document.createTextNode(texto);
            alert.appendChild(contAlert);
            $("#divResultado").append(alert);
        return obligatorio;    
    }

    function dataPagos(){
        
        $("#divResultado").html('');
        $(".requerido").removeClass('border border-danger');
        let obligatorio = 0;

        $(".requerido").each(function(){
            let id = this.id;               
            if($("#"+id+"").val() == ""){
                $("#"+id+"").addClass('border border-danger');
                $("#divResultado").html("<p class='text-danger' >Hay campos en blanco favor validar</p>");
                obligatorio++;
            }

            switch (id){
                    case 'correo':
                        let correo = $("#"+id+"").val();
                            let expreg = new RegExp(/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/);
                            if(expreg.test(correo)){            
                                $("#"+id+"").removeClass('border border-danger'); 
                                $("#alert_"+id+"").text('');
                            }else{
                                $("#"+id+"").addClass('border border-danger'); 
                                addElement(id);
                            }
                        break
                    case 'ntarjeta':
                        if($("#"+id+"").val().length == 16){
                            $("#"+id+"").removeClass('border border-danger'); 
                            $("#alert_"+id+"").text(''); 
                        }else{
                            $("#"+id+"").addClass('border border-danger');  
                            addElement(id);
                        }
                        break
                    case 'cod':
                        let cod = $("#"+id+"").val();
                                let expregCod = new RegExp(/[0-9]{3}/);
                                if(!expregCod.test(cod)){ 
                                    $("#"+id+"").addClass('border border-danger');  
                                    $("#"+id+"").val('');
                                    addElement(id);
                                }else{                                        
                                    $("#"+id+"").removeClass('border border-danger'); 
                                    $("#alert_"+id+"").text('');
                                }                                    
                        break
                    default:                            
                        break;                
                }                             
        });

        if($("#terminos").prop('checked')){
                $("#div_terminos").removeClass('border border-danger');
                check = 0;
            }else{       
                $("#div_terminos").addClass('border border-danger');
                $("#divRest").html('<p class="text-danger">Hay campos en blanco favor validar</p>');
                check = 1;
            }

        if(obligatorio == 0){
            let data = {
                nombre:         $("#nombre").val(),
                apellido:       $("#apellido").val(),
                documento:      $("#documento").val(),
                tDoc:           $("#tDoc").val(),
                telefono:       $("#telefono").val(),
                correo:         $("#correo").val(),
                tCuenta:        $("#tCuenta").val(),
                cuotas:         $("#cuotas").val(),          
                ntarjeta:       $("#ntarjeta").val(),
                mes:            $("#mes").val(),
                anio:           $("#anio").val(),
                cod:            $("#cod").val(),
                terminos:       $("#terminos").val(),
                id_producto:    $("#id_producto").val(),
                Franquicia:     $("#Franquicia").val(),
                monto:          $("#monto").val(),
                iva:            $("#iva").val()

            };
            //console.log(data);
            $("#pagar").prop('disabled', true);
            let result = ajaxResultJsonIni('procesaPago','divResultado',data);
            
            if(result == "ERROR"){
                $("#divResultado").html('<p class="text-danger">Ocurrio un error por favor comuniquese con el comercio</p>');
            }else if(result == "NO_CONEXION"){
                $("#divResultado").html('<p class="text-warning">El sistema no esta disponible por favor intentelo mas tarde</p>');
            }else{
                $("#divResultado").html('<p class="text-success">Pago realizado con exito</p>');
            }
        }
    }
</script>      
</body>  
<footer class="text-center bg-grisCLw p-2" style="margin-top: 10px; margin-left: 41px; margin-right: 41px; background-color: #F2F3F4">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <img src="{{ asset('imagenes_pagoya/PCICompliance.png') }}" height="37px" width="auto">
            <span>Copyright &copy; PAGOYA S.A.S 2020</span>
        </div>
        <div class="col-sm-2">
            <img src="{{ asset('imagenes_pagoya/marcas.png') }}" height="37px" width="auto">            
        </div>
        <div class="col-sm-2">
            <img src="{{ asset('imagenes_pagoya/credibanco.gif') }}" height="50px"  width="auto">            
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><span class="ml-auto">
            <a target="_blank" class="pl-2" href="https://mipagoya.com/wp/wp-content/uploads/2020/03/5-Poli%cc%81tica-de-Tratamiento-de-Datos-Personales-Colombia.pdf" rel="noopener">Políticas de privacidad</a>
    </span>
    <span class="ml-auto">
            <a target="_blank" class="pl-2" href="https://mipagoya.com/wp/wp-content/uploads/2020/03/Pol%c3%adticas-Pasarela-Agregadora.pdf" rel="noopener">Términos y condiciones</a>
    </span></div>
        <div class="col-sm-4"></div>
    </div>
</footer>
</html>