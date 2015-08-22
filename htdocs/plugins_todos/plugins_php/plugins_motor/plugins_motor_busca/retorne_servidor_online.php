
/* Usage: 
$status =  retorne_servidor_online('http://domain.com',80)
or
$status =  retorne_servidor_online('IPAddress',80)
*/



<?php


// retorna se o servidor esta online ou offline ----------------------------

function retorne_servidor_online($endereco_servidor){




// globals --------------------------------------------------------------------------

global $porta_padrao_conexao_servidor_inteligente; // porta de conexao

// --------------------------------------------------------------------------------------




// porta de acesso --------------------------------------------------------------

$porta = $porta_padrao_conexao_servidor_inteligente; // porta de acesso

// --------------------------------------------------------------------------------------




// status ----------------------------------------------------------------------------

$status = array(false, true); // status

// --------------------------------------------------------------------------------------




// verifica ----------------------------------------------------------------------------

$conexao_remota = @fsockopen($endereco_servidor, $porta, $errno, $errstr, 2); // verifica

// --------------------------------------------------------------------------------------




// verifica resposta de servidor e retorna ----------------------------------

if(!$conexao_remota){


return $status[0]; // retorno


}else{ 


return $status[1]; // retorno


};

// --------------------------------------------------------------------------------------




};

// --------------------------------------------------------------------------------------




?>