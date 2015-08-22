
// reindexa todos os banco de dados -----------------------

function reindexar_hosts_servidor(){


// endereco de script -------------------------------------

endereco_script = "reindexar_dados.php"; // endereco de script

// --------------------------------------------------------


// monta requisicao ---------------------------------------

$.post(endereco_script, {}, function(retorno){


// reindexa todos os sites --------------------------------

func_indexar_novos_sites(1); // reindexa

// --------------------------------------------------------


});

// --------------------------------------------------------


};

// --------------------------------------------------------
