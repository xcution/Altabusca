

// seleciona o servidor de indexacao -----------------------------------------

function funcao_selecionar_servidor_indexar(contador){




// servidor a receber novos sites --------------------------

servidor = document.getElementById("span_numero_servidor_novo_index_" + contador).innerHTML; // servidor a receber novos sites

// -----------------------------------------------------------------




// monta requisicao --------------------------------------------------------------

$.post("selecionar_servidor_indexar.php", {servidor: servidor}, function(retorno){




// mensagem ------------------------------------------------

alert("Você selecionou "+ retorno + ", esta página será atualizada."); // informa o servidor selecionado

// ---------------------------------------------------------------




// atualiza pagina -------------------------------------------

location.reload(); // atualiza pagina

// ---------------------------------------------------------------




});

// -----------------------------------------------------------------------------------








};

// ------------------------------------------------------------------------------------
