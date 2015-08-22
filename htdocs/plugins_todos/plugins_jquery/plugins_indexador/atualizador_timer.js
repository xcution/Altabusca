

// contador de avanco para indexar novos sites ----------

var contador_servidor_execucao = 0; // contador de avanco para indexar novos sites

// --------------------------------------------------------------------




// temporizador ---------------------------------------------------

var temporizador = null; // temporizador

// ---------------------------------------------------------------------








// timer ----------------------------------------------------------------------

function temporizador_1(){




// para temporizador -----------------------------------------

clearInterval(temporizador); // para temporizador

// -----------------------------------------------------------------




// progresso de indexacao ----------------------------------------------

if(processamento_indexacao_concluido == true){




progresso_indexacao(); // progresso de indexacao

progresso_indexacao_console(); // progresso de indexacao console

func_indexar_novos_sites(contador_servidor_execucao); 

retorna_processamento_indexacao_concluido(); // retorna se o processo de indexacao foi concluido




}else{




// oculta barra de progresso --------------------------------

document.getElementById("div_barra_progresso_indexar").style.display = "none"; // oculta barra de progresso

// -----------------------------------------------------------------




// alerta de mensagem -------------------------------------

alert("Indexação concluída com sucesso."); // alerta de mensagem

// -----------------------------------------------------------------




// apaga os hosts da tabela indexar -----------------------

apagar_hosts_tabela_indexar(); // apaga os hosts da tabela indexar

// -----------------------------------------------------------------




};

// ------------------------------------------------------------------------------




};

// ------------------------------------------------------------------------------

