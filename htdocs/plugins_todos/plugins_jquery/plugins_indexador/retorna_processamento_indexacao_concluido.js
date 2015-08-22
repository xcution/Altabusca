

// processo de indexacao concluido -------------------------------------

var processamento_indexacao_concluido = true; // processo de indexacao concluido

// ---------------------------------------------------------------------------------








// retorna se o processo de indexacao foi concluido -----------------

function retorna_processamento_indexacao_concluido(){








// monta requisicao ---------------------------------------------------------

$.post("retorna_processamento_indexacao_concluido.php", {}, function(retorno){




// retorno ---------------------------------------------------------------------

if(retorno == true){


processamento_indexacao_concluido = false; // nao pode indexar mais


};

// -------------------------------------------------------------------------------




});

// ------------------------------------------------------------------------------








};

// -------------------------------------------------------------------------------
