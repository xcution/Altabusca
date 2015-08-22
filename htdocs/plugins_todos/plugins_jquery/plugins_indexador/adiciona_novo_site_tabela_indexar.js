
// adiciona um novo site a ser indexado ---------------------------------------

function adiciona_novo_site_tabela_indexar(){




// obtem endereco de site --------------------------------------------------------

var site_endereco = document.getElementById("campo_adicionar_novo_host_site").value; // obtem endereco de site

// ---------------------------------------------------------------------------------------




// monta requisicao ----------------------------------------------------------------

$.post("adiciona_novo_site_tabela_indexar.php", {site_endereco: site_endereco}, function(retorno){




// retorno -----------------------------------------------------------------------------

alert(retorno); // retorno

// ---------------------------------------------------------------------------------------




// atualiza pagina -------------------------------------------

location.reload(); // atualiza pagina

// ---------------------------------------------------------------




});

// ---------------------------------------------------------------------------------------








};

// ---------------------------------------------------------------------------------------
