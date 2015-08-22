<?php


// destroe a sessao geral ---------------------------------

function destroe_sessao_geral(){


// inicia a sessao ----------------------------------------

session_start(); // inicia a sessao

// --------------------------------------------------------
	
	
// limpa array de sessao com array vazio ------------------

$_SESSION = array(); // limpa array de sessao com array vazio

// --------------------------------------------------------


// finaliza e destroe a sessao ----------------------------

session_destroy(); // finaliza e destroe a sessao

// --------------------------------------------------------


};

// --------------------------------------------------------


?>