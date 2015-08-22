<?php


// carrega os servidores online ----------------------------------------

function carregar_servidores_online(){




// globals ------------------------------------------------------------------

global $banco_servidor_busca_inteligente; // banco de dados e servidor

global $usuario_mysql_conectar; // usuario mysql

global $senha_mysql_conectar; // senha mysql

global $conexao_busca_inteligente; // conexoes abertas em busca inteligente

global $imagem_servidor_basico; // imagens de servidor

// ------------------------------------------------------------------------------




// servidor de sessao ----------------------------------------------------

$servidor_sessao = retorne_servidor_atual_sessao(); // servidor de sessao

// -----------------------------------------------------------------------




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




// campo para indexar sites --------------------------------------

if($servidor == $servidor_sessao){

$campo_indexar_sites .= "<button class='btn btn-success btn-xs' onclick='func_indexar_novos_sites($contador);'>Indexar novos sites</button>"; // campo para indexar sites
$campo_indexar_sites .= "&nbsp;"; // campo para indexar sites

};

// ------------------------------------------------------------------------




// campo para selecionar servidor --------------------------------

$campo_selecionar_servidor .= "<button class='btn btn-primary btn-xs' onclick='funcao_selecionar_servidor_indexar($contador);'>Selecionar</button>"; // campo para selecionar servidor
$campo_selecionar_servidor .= "&nbsp;"; // campo para selecionar servidor

// --------------------------------------------------------------------------


// campo limpar sessao ------------------------------------

$campo_limpa_sessao .= "<input type='button' class='btn btn-danger btn-xs' value='Limpar sessão' onclick='limpar_sessao_atual();'>"; // campo limpa sessao
$campo_limpa_sessao .= "<br>"; // campo limpa sessao
$campo_limpa_sessao .= "<br>"; // campo limpa sessao

// --------------------------------------------------------


// servidor online ou offline ------------------------------------------

$servidor_online = retorne_servidor_online($servidor); // servidor online ou offline

// ----------------------------------------------------------------------------




// conecta ao servidor ------------------------------------------------

if($servidor_online == true){

$conexao_busca_inteligente[$contador] = mysql_connect($servidor, $usuario_mysql_conectar, $senha_mysql_conectar);

};

// ------------------------------------------------------------------------




// seleciona banco de dados --------------------------------------

if($servidor_online == true){

mysql_select_db($banco_dados, $conexao_busca_inteligente[$contador]); // seleciona banco de dados de servidor

};

// --------------------------------------------------------------------------




// conecta ao servidor ------------------------------------------------

if($servidor_online == true){

$div_campo_servidor .= "<div class='div_servidor'>"; // div de campo de servidor
$div_campo_servidor .= "<span id='span_numero_servidor_novo_index_$contador' style='display: none'>$servidor</span>"; // div de campo de servidor
$div_campo_servidor .= $imagem_servidor_basico[0]; // div de campo de servidor
$div_campo_servidor .= "<br>"; // div de campo de servidor
$div_campo_servidor .= carrega_informacoes_servidor_online($servidor); // div de campo de servidor
$div_campo_servidor .= $campo_selecionar_servidor; // div de campo de servidor
$div_campo_servidor .= $campo_indexar_sites; // div de campo de servidor
$div_campo_servidor .= $campo_limpa_sessao; // div de campo de servidor
$div_campo_servidor .= "On-line: $servidor"; // div de campo de servidor
$div_campo_servidor .= campo_reindexar_hosts(); // div de campo de servidor
$div_campo_servidor .= "</div>"; // div de campo de servidor

}else{

$div_campo_servidor .= "<div class='div_servidor'>"; // div de campo de servidor
$div_campo_servidor .= "<span id='span_numero_servidor_novo_index_$contador' style='display: none'>$servidor</span>"; // div de campo de servidor
$div_campo_servidor .= $imagem_servidor_basico[1]; // div de campo de servidor
$div_campo_servidor .= "<br>"; // div de campo de servidor
$div_campo_servidor .= "Off-line: $servidor"; // div de campo de servidor
$div_campo_servidor .= "</div>"; // div de campo de servidor

};

// ----------------------------------------------------------------------------




// limpando dados necessarios --------------------------------------

$campo_indexar_sites = null; // limpando dados necessarios

$campo_selecionar_servidor = null; // limpando dados necessarios

// ----------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




};

// --------------------------------------------------------------------------




// div de servidor ------------------------------------------------------

$div_servidor_status .= "<div id='div_servidores_disponiveis_indexar'>"; // div de servidor
$div_servidor_status .= $div_campo_servidor; // div de servidor
$div_servidor_status .= "</div>"; // div de servidor

// --------------------------------------------------------------------------




// adiciona titulo ----------------------------------------

$div_servidor_status = "<div class='div_titulo_campos_gerais'>Servidores disponíveis</div>".$div_servidor_status; // adiciona titulo

// --------------------------------------------------------------------------




// retorno ----------------------------------------------------------------

return $div_servidor_status; // retorno

// --------------------------------------------------------------------------




};

// ----------------------------------------------------------------------------


?>