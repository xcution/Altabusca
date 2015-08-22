<?php


// monta a div gerenciar backup de hosts ------------------

function monta_div_gerenciar_backup_hosts(){


// servidor de sessao ----------------------------------------------------

$servidor_sessao = retorne_servidor_atual_sessao(); // servidor de sessao

global $tabela_dados; // tabelas de banco de dados

global $banco_dados_nomes_array; // banco de dados

// -----------------------------------------------------------------------


// valida servidor de sessao ------------------------------

if($servidor_sessao == null){
	
return null; // retorno nulo
	
};

// -----------------------------------------------------------------------


// imagem backup ------------------------------------------

$imagem_backup .= "<div class='classe_div_imagem_backup_admin'>"; // imagem de backup
$imagem_backup .= "<img src='imagens/backup.png' title='Backup'>"; // imagem de backup
$imagem_backup .= "</div>"; // imagem de backup

// --------------------------------------------------------


// campo backup dados -------------------------------------

$campo_backup_dados .= "<div class='classe_div_campo_backup_dados'>"; // campo backup dados
$campo_backup_dados .= "Backup de banco de dados"; // campo backup dados
$campo_backup_dados .= "&nbsp;"; // campo backup dados
$campo_backup_dados .= "<br>"; // campo backup dados
$campo_backup_dados .= "<br>"; // campo backup dados
$campo_backup_dados .= "<input type='button' class='btn btn-success' value='Backup' onclick='backup_banco_dados_geral();'>"; // campo backup dados
$campo_backup_dados .= "&nbsp;"; // campo backup dados
$campo_backup_dados .= "<input type='button' class='btn btn-primary' value='Restaurar backup' onclick='restaurar_backup_indexar();'>"; // campo backup dados
$campo_backup_dados .= "</div>"; // campo backup dados

// --------------------------------------------------------


// campo progresso ----------------------------------------

$campo_progresso .= "<div id='classe_div_campo_progresso_admin'>"; // campo progresso
$campo_progresso .= "<img src='imagens/carregando.gif' title='Aguarde...'>"; // campo progresso
$campo_progresso .= "</div>"; // campo progresso

// --------------------------------------------------------


// conecta ao banco de dados -------------------------------

conecta_banco_dados($banco_dados_nomes_array[8]); // conecta ao banco de dados

// ---------------------------------------------------------


// numero do banco de dados -------------------------------

$numero_banco = retorna_numero_banco_dados_nome(mudar_banco_dados(null)); // numero do banco de dados

// --------------------------------------------------------


// query ---------------------------------------------------

$query = "select *from $tabela_dados[0] where tipo_host='$numero_banco';"; // query

// ---------------------------------------------------------


// numero de hosts ----------------------------------------

$numero_hosts = retorne_numero_linhas_query($query); // numero de hosts

// --------------------------------------------------------


// campo informa dados de backup --------------------------

$campo_informa_dados_backup .= "<div class='classe_div_campo_informa_dados_backup'>"; // campo informa dados de backup
$campo_informa_dados_backup .= "Banco de dados: "; // campo informa dados de backup
$campo_informa_dados_backup .= mudar_banco_dados(null); // campo informa dados de backup
$campo_informa_dados_backup .= "<br>"; // campo informa dados de backup
$campo_informa_dados_backup .= "Número de hosts: "; // campo informa dados de backup
$campo_informa_dados_backup .= $numero_hosts; // campo informa dados de backup
$campo_informa_dados_backup .= "</div>"; // campo informa dados de backup

// --------------------------------------------------------


// codigo html bruto --------------------------------------

$codigo_html_bruto .= "<div class='classe_div_painel_administrador_acao' id='div_gerenciar_backup_hosts'>"; // codigo html bruto
$codigo_html_bruto .= $imagem_backup; // codigo html bruto
$codigo_html_bruto .= $campo_backup_dados; // codigo html bruto
$codigo_html_bruto .= $campo_informa_dados_backup; // codigo html bruto
$codigo_html_bruto .= $campo_progresso; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto

// --------------------------------------------------------


// adiciona titulo ----------------------------------------

$codigo_html_bruto = "<div class='div_titulo_campos_gerais'>Backup de banco de dados</div>".$codigo_html_bruto; // adiciona titulo

// --------------------------------------------------------


// retorno ------------------------------------------------

return $codigo_html_bruto; // retorno

// --------------------------------------------------------


};

// --------------------------------------------------------


?>