<?php




// iniciando sessao ------------------------------------------

session_start(); // iniciando sessao

// ------------------------------------------------------------------




// sessao de indexacao ------------------------------------

$porcentagem = $_SESSION['sessao_porcentagem_indexa']; // sessao de indexacao

$porcentagem = round($porcentagem) + 1; // arredonda

// ----------------------------------------------------------------




// exibe porcentagem ----------------------------------------

echo $porcentagem; // exibe porcentagem

// ----------------------------------------------------------------




?>