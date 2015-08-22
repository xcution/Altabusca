
// apaga hosts da tabela indexar --------------------------

function apagar_hosts_tabela_indexar(){


// endereco de script -------------------------------------

endereco_script = "apaga_hosts_indexar.php"; // endereco de script

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

