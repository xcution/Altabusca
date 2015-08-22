
// progresso de indexacao ------------------------------------------

function progresso_indexacao(){




// monta requisicao --------------------------------------------------

$.post("progresso_indexacao.php", {}, function(retorno){




// retorno ---------------------------------------------------------------

document.getElementById("barra_progresso_indexar_sites").value = retorno; // barra de progresso

document.getElementById("span_progresso_indexar_sites").innerHTML = retorno + "%"; // porcentagem

// -------------------------------------------------------------------------




});

// -------------------------------------------------------------------------








};

// -------------------------------------------------------------------------
