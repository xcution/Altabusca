<?php


// div para gerenciar hosts que seram indexados ------

function div_gerenciar_hosts_indexar(){




// globals ----------------------------------------------------------------------

global $imagem_servidor_basico; // imagens de servidor

global $nome_banco_novos_hosts; // nome do banco de dados de novos hosts

global $nome_banco_novos_sites_indexar; // nome do banco de dados com novos sites a serem indexados

// --------------------------------------------------------------------------------




// servidor de sessao ----------------------------------------------------

$servidor_sessao = retorne_servidor_atual_sessao(); // servidor de sessao

// -----------------------------------------------------------------------




// valida servidor de sessao ------------------------------

if($servidor_sessao == null){
	
return null; // retorno nulo
	
};

// -----------------------------------------------------------------------




// atualiza dados de sessao com servidor selecionado ------------

$servidor = $_SESSION['sessao_servidor_selecionado_indexar']; // servidor

// --------------------------------------------------------------------------------




// conecta ao servidor ------------------------------------------------------

conecta_servidor_especifico($servidor); // conecta ao servidor

// --------------------------------------------------------------------------------




// banco de dados a indexar ----------------------------------------------

$div_banco_index .= "<div id='div_banco_index'>"; // banco de dados a indexar
$div_banco_index .= $imagem_servidor_basico[3]; // banco de dados a indexar
$div_banco_index .= carregar_dados_banco_dados_inteligente($nome_banco_novos_sites_indexar); // banco de dados a indexar
$div_banco_index .= "</div>"; // banco de dados a indexar

// --------------------------------------------------------------------------------




// div com novos hosts ------------------------------------------------------

$div_banco_novos_hosts .= "<div id='div_banco_novos_hosts'>"; // div com novos hosts
$div_banco_novos_hosts .= $imagem_servidor_basico[4]; // div com novos hosts
$div_banco_novos_hosts .= carregar_dados_banco_dados_inteligente($nome_banco_novos_hosts); // div com novos hosts
$div_banco_novos_hosts .= "&nbsp;"; // div com novos hosts
$div_banco_novos_hosts .= "Mover novos sites para indexar >>"; // div com novos hosts
$div_banco_novos_hosts .= "&nbsp;"; // div com novos hosts
$div_banco_novos_hosts .= "</div>"; // div com novos hosts

// --------------------------------------------------------------------------------




// div para mover dados entre banco de dados ------------------------

$div_iniciar_processo_mover_dados .= "<div id='div_iniciar_processo_mover_dados'>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "<button class='btn btn-primary' id='botao_iniciar_processo_mover_dados' onclick='funcao_mover_dados_novos_para_indexar();'>Mover dados</button>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "<input type='button' class='btn btn-danger' id='botao_iniciar_processo_apagar_dados' value='Apagar hosts' onclick='apagar_hosts_tabela_indexar();'>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "<span id='span_iniciar_processo_mover_dados'>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= $imagem_servidor_basico[5]; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "Aguarde..."; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "</span>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "</div>"; // div para mover dados entre banco de dados

// --------------------------------------------------------------------------------




// div com barra de progresso --------------------------------------------

$div_barra_progresso .= "<div id='div_barra_progresso_indexar'>"; // div com barra de progresso
$div_barra_progresso .= "<progress id='barra_progresso_indexar_sites' max='100' value='0'></progress>"; // div com barra de progresso
$div_barra_progresso .= "&nbsp;"; // div com barra de progresso
$div_barra_progresso .= "<span id='span_progresso_indexar_sites'>0%</span>"; // div com barra de progresso
$div_barra_progresso .= "<br>"; // div com barra de progresso
$div_barra_progresso .= "<span id='span_progresso_indexar_sites_imagem'>"; // div com barra de progresso
$div_barra_progresso .= "<div id='div_console_progresso_indexar'>Inicializando...</div>"; // div com barra de progresso
$div_barra_progresso .= $imagem_servidor_basico[5]; // div com barra de progresso
$div_barra_progresso .= "</span>"; // div com barra de progresso
$div_barra_progresso .= "</div>"; // div com barra de progresso

// --------------------------------------------------------------------------------




// div para adicionar novo host --------------------------------------------

$div_adicionar_novo_host_site .= "<div id='div_adicionar_novo_host_site'>"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "Host ou url:"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "&nbsp;"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "<input type='text' id='campo_adicionar_novo_host_site' placeholder='Endereço de site' onkeypress='if(window.event.keyCode==13){adiciona_novo_site_tabela_indexar();;};'>"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "&nbsp;"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "<button class='btn btn-success' onclick='adiciona_novo_site_tabela_indexar();'>Adicionar</button>"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "</div>"; // div para adicionar novo host

// --------------------------------------------------------------------------------




// div de gerenciamento --------------------------------------

if($servidor != null){


$div_gerenciar .= "<div id='div_gerenciar_hosts_indexar_muda_servidor'>"; // div de gerenciamento
$div_gerenciar .= "Escolha em qual banco de dados deseja indexar, ou adicionar novos hosts."; // div de gerenciamento
$div_gerenciar .= "<br>"; // div de gerenciamento
$div_gerenciar .= "<br>"; // div de gerenciamento
$div_gerenciar .= $imagem_servidor_basico[4]; // div de gerenciamento
$div_gerenciar .= campo_select_muda_tipo_busca(); // div de gerenciamento
$div_gerenciar .= "</div>"; // div de gerenciamento
$div_gerenciar .= $div_adicionar_novo_host_site; // div de gerenciamento
$div_gerenciar .= "<div id='div_gerenciar_hosts_indexar'>"; // div de gerenciamento
$div_gerenciar .= $div_banco_novos_hosts; // div de gerenciamento
$div_gerenciar .= $div_banco_index; // div de gerenciamento
$div_gerenciar .= $div_iniciar_processo_mover_dados; // div de gerenciamento
$div_gerenciar .= "</div>"; // div de gerenciamento
$div_gerenciar .= $div_barra_progresso; // div de gerenciamento


}else{


$div_gerenciar .= "<div id='div_gerenciar_hosts_indexar'>"; // div de gerenciamento
$div_gerenciar .= "Selecione um servidor e <a href='index.php' class='btn btn-success btn-xs'>clique aqui</a>."; // div de gerenciamento
$div_gerenciar .= "</div>"; // div de gerenciamento


};

// ------------------------------------------------------------------


// adiciona div de acao ---------------------------------------------

$div_gerenciar = "<div class='classe_div_painel_administrador_acao'>$div_gerenciar</div>"; // adiciona div de acao

// ------------------------------------------------------------------


// adiciona titulo ----------------------------------------

$div_gerenciar = "<div class='div_titulo_campos_gerais'>Indexar hosts</div>".$div_gerenciar; // adiciona titulo

// --------------------------------------------------------


// retorno --------------------------------------------------------

return $div_gerenciar; // retorno

// ------------------------------------------------------------------




};

// ------------------------------------------------------------------


?>