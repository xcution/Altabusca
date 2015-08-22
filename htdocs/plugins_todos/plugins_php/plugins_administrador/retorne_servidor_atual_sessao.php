<?php


// retorna o servidor da sessao atual ---------------------

function retorne_servidor_atual_sessao(){


// inicializa sessao --------------------------------------

session_start(); // inicializa sessao

// --------------------------------------------------------


// servidor de sessao -------------------------------------

$servidor_sessao = $_SESSION['sessao_servidor_selecionado_indexar']; // servidor de sessao

// --------------------------------------------------------


// retorno ------------------------------------------------

return $servidor_sessao; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>