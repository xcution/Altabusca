

//  indexa novos sites -------------------------------------------

function func_indexar_novos_sites(contador){




// contador de servidor em execucao -----------------------

contador_servidor_execucao = contador; // contador de servidor em execucao

// --------------------------------------------------------------------




// temporizador --------------------------------------------------

temporizador = setInterval(temporizador_1, 1000); // temporizador

// --------------------------------------------------------------------




// servidor a receber novos sites --------------------------

servidor = document.getElementById("span_numero_servidor_novo_index_" + contador).innerHTML; // servidor a receber novos sites

// -----------------------------------------------------------------




// exibe barra de progresso --------------------------------

document.getElementById("div_barra_progresso_indexar").style.display = "block"; // exibe barra de progresso

// -----------------------------------------------------------------




// ocultando divs ----------------------------------------------

oculta_divs_admin_indexar(); // ocultando divs

// -----------------------------------------------------------------




// monta requisicao ------------------------------------------

$.post("indexar_novos_sites.php", {servidor: servidor}, function(retorno){




// retorno ---------------------------------------------------------------

document.getElementById("div_console_progresso_indexar").innerHTML = retorno; // site sendo indexado

// -------------------------------------------------------------------------




});

// ----------------------------------------------------------------








};

// ---------------------------------------------------------------
