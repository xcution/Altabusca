<?php


// carrega bibliotecas ------------------------------------

include("../../servidor/dados_do_servidor.php"); // dados do servidor

include($arquivos_sistema[2]); // carregando bibliotecas

// --------------------------------------------------------


// destroe a sessao atual ---------------------------------

destroe_sessao_geral(); // destroe a sessao atual

// --------------------------------------------------------


// mensagem de sucesso ------------------------------------

echo "Sessão limpa com sucesso!"; // mensagem de sucesso

// --------------------------------------------------------


?>