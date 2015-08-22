<?php


// altera banco de dados busca inteligente -

function altera_banco_dados_busca_inteligente(){


// globals ---------------------------------------------

global $nome_banco; // nome do banco de dados indexados

// --------------------------------------------------------


// dados de formulario ----------------------------

$banco_dados_sessao = remove_html($_POST['banco_dados_sessao']); // banco de dados a utilizar

// --------------------------------------------------------


// nome do banco de dados indexados -----

$nome_banco  = mudar_banco_dados(null); // nome do banco de dados indexados

// --------------------------------------------------------


// valida banco de dados de sessao ---------

if($banco_dados_sessao != null){


// atualiza a sessao -------------------------------

echo mudar_banco_dados($banco_dados_sessao); // atualiza a sessao

// -------------------------------------------------------


// saindo ---------------------------------------------

die; // saindo...

// -------------------------------------------------------


};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>