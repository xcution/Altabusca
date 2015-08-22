<?php


// retorna o numero do banco de dados por nome ------------

function retorna_numero_banco_dados_nome($nome_banco){


// globals ------------------------------------------------

global $banco_dados_nomes_array; // nomes de banco de dados

// --------------------------------------------------------


// numero do banco de dados -------------------------------

switch($nome_banco){


case $banco_dados_nomes_array[0]: // produtos
return 1; // retorno
break;


case $banco_dados_nomes_array[4]: // jogos
return 2; // retorno
break;


case $banco_dados_nomes_array[5]: // aplicativos
return 3; // retorno
break;


case $banco_dados_nomes_array[6]: // noticias
return 4; // retorno
break;


case $banco_dados_nomes_array[7]: // sistemas operacionais
return 5; // retorno
break;


default:
return null; // retorno nulo

};

// --------------------------------------------------------


};

// --------------------------------------------------------


?>