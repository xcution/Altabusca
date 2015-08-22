
// progresso de indexacao ------------------------------------------

function progresso_indexacao_console(){




// monta requisicao --------------------------------------------------

$.post("progresso_indexacao_console.php", {}, function(retorno){




// retorno ---------------------------------------------------------------

document.getElementById("div_console_progresso_indexar").innerHTML = retorno; // site sendo indexado

// -------------------------------------------------------------------------




});

// -------------------------------------------------------------------------








};

// -------------------------------------------------------------------------
