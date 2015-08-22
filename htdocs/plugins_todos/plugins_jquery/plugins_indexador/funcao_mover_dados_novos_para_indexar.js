

//  mover hosts novos para indexar -----------------------

function funcao_mover_dados_novos_para_indexar(){




// exibe barra de progresso --------------------------------

document.getElementById("span_iniciar_processo_mover_dados").style.display = "inline"; // exibe barra de progresso

// -----------------------------------------------------------------




// oculta o botao ----------------------------------------------

document.getElementById("botao_iniciar_processo_mover_dados").style.display = "none"; // oculta o botao 

document.getElementById("botao_iniciar_processo_apagar_dados").style.display = "none"; // oculta o botao 

// -----------------------------------------------------------------




// oculta todas as divs --------------------------------------------

oculta_divs_admin_indexar(); // oculta todas as divs

// -----------------------------------------------------------------




// exibe a div -----------------------------------------------------

document.getElementById("div_gerenciar_hosts_indexar").style.display = "block"; // exibe a div

// -----------------------------------------------------------------




// monta requisicao ------------------------------------------

$.post("funcao_mover_dados_novos_para_indexar.php", {}, function(retorno){




// oculta barra de progresso -------------------------------

document.getElementById("span_iniciar_processo_mover_dados").style.display = "none"; // oculta barra de progresso

// -----------------------------------------------------------------




// atualiza pagina -------------------------------------------

location.reload(); // atualiza pagina

// ---------------------------------------------------------------




});

// -----------------------------------------------------------------








};

// -------------------------------------------------------------------
