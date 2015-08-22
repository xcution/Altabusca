
// exclui host de site ------------------------------------

function exclui_host_site(numero_id){


// endereco de script -------------------------------------

endereco_script = "exclui_host_site.php"; // endereco de script

// --------------------------------------------------------


// host a remover -----------------------------------------

host_site = document.getElementById("host_site_excluir_" + numero_id).value; // host a remover

// --------------------------------------------------------


// confirma se remove -------------------------------------

if(confirm("Remover " + host_site + "?") == false){
	
return false; // retorno falso

};

// --------------------------------------------------------


// monta requisicao ---------------------------------------

$.post(endereco_script, {host_site: host_site}, function(retorno){


// atualiza pagina ----------------------------------------

location.reload(); // atualiza pagina

// --------------------------------------------------------


});

// --------------------------------------------------------


};

// --------------------------------------------------------
