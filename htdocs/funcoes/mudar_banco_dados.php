<?php


// muda o banco de dados -----------------------

function mudar_banco_dados($numero_banco){


// globals ----------------------------------------------

global $banco_dados_nomes_array; // bancos de dados gerais

// --------------------------------------------------------


// inicializa a sessao ------------------------------

session_start(); // inicializa a sessao

// --------------------------------------------------------


// nome de banco de dados de sessao -----

$nome_banco_sessao = md5("muda_banco_sessao"); // nome de banco de dados de sessao

// --------------------------------------------------------


// valida numero de banco de dados --------

if($numero_banco != null){


// atualiza a sessao -------------------------------

$_SESSION[$nome_banco_sessao] = $banco_dados_nomes_array[$numero_banco]; // atualiza a sessao

// -------------------------------------------------------


}else{


// valida sessao ------------------------------------

if($_SESSION[$nome_banco_sessao] != null){


// retorna o padrao -------------------------------

return $_SESSION[$nome_banco_sessao]; // retorna o padrao

// ------------------------------------------------------


}else{


// atualiza a sessao ------------------------------

$_SESSION[$nome_banco_sessao] = $banco_dados_nomes_array[0]; // atualiza a sessao

// ------------------------------------------------------


// retorna o padrao ------------------------------

return $_SESSION[$nome_banco_sessao]; // retorna o padrao

// ------------------------------------------------------


};

// -------------------------------------------------------


};

// -------------------------------------------------------


// havalia se banco e valido --------------------

if($banco_dados_nomes_array[$numero_banco] == null){


// atualiza a sessao -------------------------------

$_SESSION[$nome_banco_sessao] = $banco_dados_nomes_array[0]; // atualiza a sessao

// --------------------------------------------------------


// retorna o padrao --------------------------------

return $_SESSION[$nome_banco_sessao]; // retorna o padrao

// -------------------------------------------------------


};

// -------------------------------------------------------


// retorna o padrao -------------------------------

return $_SESSION[$nome_banco_sessao]; // retorna o padrao

// ------------------------------------------------------


};

// ------------------------------------------------------


?>