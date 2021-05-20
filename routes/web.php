<?php

Route::get('/','FormularioController@linkInvalid');
Route::get('form', 'FormularioController@linkPay');
Route::post('procesaPago', 'FormularioController@processesPay');
Route::get('WSConsultarBitacoras', 'FormularioController@WSConsultarBitacoras');




