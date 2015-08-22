
// muda banco de dados ---------------------------

function muda_banco_dados(valor){




// obtendo o valor -------------------------------------

var valor = valor.value; // obtendo o valor

// -----------------------------------------------------------




// endereco de script --------------------------------

endereco_script = "index.php"; // endereco de script

// ----------------------------------------------------------




// monta requisicao -----------------------------------

$.post(endereco_script, {banco_dados_sessao: valor}, function(retorno){


// atualiza pagina --------------------------------------

location.reload(); // atualiza pagina

// -----------------------------------------------------------


});

// -----------------------------------------------------------


};

// -----------------------------------------------------------
