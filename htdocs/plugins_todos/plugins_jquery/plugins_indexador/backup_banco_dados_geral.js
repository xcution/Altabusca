
// backup de banco de dados -------------------------------

function backup_banco_dados_geral(){


// endereco de script -------------------------------------

endereco_script = "backup_banco.php"; // endereco de script

// --------------------------------------------------------


// ocultando divs ----------------------------------------------

oculta_divs_admin_indexar(); // ocultando divs

// -----------------------------------------------------------------


// exibe div de backup ------------------------------------

document.getElementById("div_gerenciar_backup_hosts").style.display = "block"; // exibe div de backup

// -----------------------------------------------------------------


// exibe a barra de progresso -----------------------------

document.getElementById("classe_div_campo_progresso_admin").style.display = "block"; // exibe a barra de progresso

// --------------------------------------------------------


// monta requisicao ---------------------------------------

$.post(endereco_script, {}, function(retorno){


// mensagem -----------------------------------------------

alert(retorno); // mensagem

// --------------------------------------------------------


// limpa a sessao -----------------------------------------

limpar_sessao_atual(); // limpa a sessao

// -----------------------------------------------------------------


});

// --------------------------------------------------------


};

// --------------------------------------------------------
