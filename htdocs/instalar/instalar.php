<?php




// carrega dados de servidor ----------------------------------------------------------------------------------------

include("../servidor/dados_do_servidor.php"); // carregando dados de servidor

// ------------------------------------------------------------------------------------------------------------------




// inicializa todas as funcoes --------------------------------------------------------------------------------------

include("carregar_funcoes_gerais.php"); // todas as funcoes php do site na pasta funcoes

// ------------------------------------------------------------------------------------------------------------------




// conecta mysql -----------------------------------

conecta_mysql(); // conecta mysql

// --------------------------------------------------------




// instala banco de dados e tabelas ----------------------------------------------------------------------------------

include("bd01/bd01.php"); // banco de dados e tabela

include("bd02/bd01.php"); // banco de dados e tabela

include("bd03/bd01.php"); // banco de dados e tabela

include("bd04/bd01.php"); // banco de dados e tabela

include("bd05/bd01.php"); // banco de dados e tabela

include("bd06/bd01.php"); // banco de dados e tabela

include("bd07/bd01.php"); // banco de dados e tabela

include("bd08/bd01.php"); // banco de dados e tabela

include("bd09/bd01.php"); // banco de dados e tabela

// ------------------------------------------------------------------------------------------------------------------




// desconecta mysql ------------------------------

desconecta_mysql(); // desconecta mysql

// --------------------------------------------------------




// atualiza as bibliotecas disponiveis ------------------------------------------------------------------------------

include("atualizar_bibliotecas/atualizar.php"); // atualiza bibliotecas disponiveis

// ------------------------------------------------------------------------------------------------------------------




// mensagem de instalação feita com sucesso --------------------------------------------------------------------------

$mensagem_sucesso .= "<font size='4'>"; // mensagem de sucesso
$mensagem_sucesso .= "<li>Instalação concluída com sucesso"; // mensagem de sucesso
$mensagem_sucesso .= "<br>"; // mensagem de sucesso
$mensagem_sucesso .= "<br>"; // mensagem de sucesso
$mensagem_sucesso .= "</font>"; // mensagem de sucesso
$mensagem_sucesso .= "<li>Pronto o $nome_do_sistema foi instalado com sucesso."; // mensagem de sucesso
$mensagem_sucesso .= "<li> Banco de dados, e tabelas criados com sucesso."; // mensagem de sucesso

// ------------------------------------------------------------------------------------------------------------------




// decodifica de utf-8 -------------------------------------

$mensagem_sucesso = utf8_decode($mensagem_sucesso); // decodifica de utf-8

// ---------------------------------------------------------




// mensagem ------------------------------------------------

echo $mensagem_sucesso; // mensagem

// -----------------------------------------------------------------




?>
