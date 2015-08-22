<?php




// dados de formulario ----------------------------------------------

$servidor = $_POST['servidor']; // servidor informado

// ------------------------------------------------------------------------




// inicia sessao --------------------------------------------------------

session_start(); // inicia sessao

// ------------------------------------------------------------------------




// atualiza dados de sessao com servidor selecionado ------

$_SESSION['sessao_servidor_selecionado_indexar'] = $servidor; // servidor

// ------------------------------------------------------------------------




// informa o servidor selecionado --------------------------------

echo $servidor; // informa o servidor selecionado

// ------------------------------------------------------------------------




?>