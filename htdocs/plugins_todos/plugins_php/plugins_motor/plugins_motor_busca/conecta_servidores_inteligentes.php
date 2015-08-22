<?php


// conecta se aos servidores inteligentes ------------------------

function conecta_servidores_inteligentes(){




// globals ------------------------------------------------------------------

global $banco_servidor_busca_inteligente; // banco de dados e servidor

global $usuario_mysql_conectar; // usuario mysql

global $senha_mysql_conectar; // senha mysql

global $conexao_busca_inteligente; // conexoes abertas em busca inteligente

// ------------------------------------------------------------------------------




// contador ----------------------------------------------------------------

$contador = 0; // contador

// ------------------------------------------------------------------------------




// obtendo servidores e banco de dados --------------------------

for($contador == $contador; $contador <= count($banco_servidor_busca_inteligente); $contador++){




// banco de dados ------------------------------------------------------

$banco_dados = $banco_servidor_busca_inteligente[$contador][0]; // banco de dados

// ----------------------------------------------------------------------------




// servidor ------------------------------------------------------------------

$servidor = $banco_servidor_busca_inteligente[$contador][1]; // servidor

// ----------------------------------------------------------------------------




// conecta ao servidor e banco de dados ----------------------

if($banco_dados != null and $servidor != null){




// servidor online ou offline ------------------------------------------

$servidor_online = retorne_servidor_online($servidor); // servidor online ou offline

// ----------------------------------------------------------------------------




// conecta ao servidor ------------------------------------------------

if($servidor_online == true){

$conexao_busca_inteligente[$contador] = mysql_connect($servidor, $usuario_mysql_conectar, $senha_mysql_conectar);

};

// ----------------------------------------------------------------------------




// seleciona banco de dados --------------------------------------

if($servidor_online == true){

mysql_select_db($banco_dados, $conexao_busca_inteligente[$contador]); // seleciona banco de dados de servidor

};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




};

// ------------------------------------------------------------------------


?>