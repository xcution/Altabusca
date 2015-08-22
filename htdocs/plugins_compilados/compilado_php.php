<?php
function comando_executa($query){
if($query != null){
$comando = mysql_query($query); // comando
}else{
return null; // retorno nulo
};
return $comando; // retorna comando
};
function conecta_banco_dados($nome_banco_dados){
mysql_select_db($nome_banco_dados); // conectando ao banco de dados
};
function conecta_mysql(){
global $conexao_mysql_conectar; // variavel de conexao
global $servidor_mysql_conectar; // servidor
global $usuario_mysql_conectar; // usuario
global $senha_mysql_conectar; // senha
$conexao_mysql_conectar = mysql_connect($servidor_mysql_conectar, $usuario_mysql_conectar, $senha_mysql_conectar); // conectando-se
mysql_select_db(mudar_banco_dados(null)); // seleciona o banco de dados
};
function criar_pasta($pasta){
if($pasta != null or is_dir($pasta) == false){
if(file_exists($pasta) == false){
mkdir($pasta, 0777, true); // criando pasta
};
};
};
function data_atual(){
$data_atual = Date("d-m-y G:i:s"); // data atual
return $data_atual; // retorna data
};
function desconecta_mysql(){
global $conexao_mysql_conectar; // variavel de conexao mysql
mysql_close($conexao_mysql_conectar); // fechando conexao mysql com o servidor
};
function destroe_sessao_geral(){
session_start(); // inicia a sessao
$_SESSION = array(); // limpa array de sessao com array vazio
session_destroy(); // finaliza e destroe a sessao
};
function exclui_arquivo_unico($endereco_arquivo){
if($endereco_arquivo != null){
unlink($endereco_arquivo); // removendo arquivo
};
};
function func_salvar_arquivo($endereco, $conteudo){
$arquivo = fopen($endereco, "w+"); // abrindo ponteiro de arquivo
fwrite($arquivo, $conteudo); // escrevendo arquivo
fclose($arquivo); // fechando arquivo
};
function mudar_banco_dados($numero_banco){
global $banco_dados_nomes_array; // bancos de dados gerais
session_start(); // inicializa a sessao
$nome_banco_sessao = md5("muda_banco_sessao"); // nome de banco de dados de sessao
if($numero_banco != null){
$_SESSION[$nome_banco_sessao] = $banco_dados_nomes_array[$numero_banco]; // atualiza a sessao
}else{
if($_SESSION[$nome_banco_sessao] != null){
return $_SESSION[$nome_banco_sessao]; // retorna o padrao
}else{
$_SESSION[$nome_banco_sessao] = $banco_dados_nomes_array[0]; // atualiza a sessao
return $_SESSION[$nome_banco_sessao]; // retorna o padrao
};
};
if($banco_dados_nomes_array[$numero_banco] == null){
$_SESSION[$nome_banco_sessao] = $banco_dados_nomes_array[0]; // atualiza a sessao
return $_SESSION[$nome_banco_sessao]; // retorna o padrao
};
return $_SESSION[$nome_banco_sessao]; // retorna o padrao
};
function remove_comentarios($codigo_entrada){
$codigo_entrada = preg_replace('!/\*.*?\*/!s', '', $codigo_entrada); // removendo
$codigo_entrada = preg_replace('#^\s*//.+$#m', "", $codigo_entrada); // removendo
$codigo_entrada = preg_replace('/\n\s*\n/', "\n", $codigo_entrada); // removendo
return $codigo_entrada; // retorno
};
function remove_linhas_em_branco($conteudo_remover_linhas){
$conteudo_remover_linhas = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $conteudo_remover_linhas); // removendo linhas em branco
return $conteudo_remover_linhas; // retorno
};
function retorna_arquivos_pasta($endereco_pasta, $extencao){
$pasta_diretorio = new RecursiveDirectoryIterator($endereco_pasta); // pasta de arquivos
$lista_arquivos = new RecursiveIteratorIterator($pasta_diretorio); // lista de arquivos
$arquivos_encontrados = array(); // array com lista de arquivos
foreach ($lista_arquivos as $informacao_arquivo) {
$extencao_arquivo = ".".pathinfo($informacao_arquivo, PATHINFO_EXTENSION); // extencao de arquivo
if($extencao == $extencao_arquivo or $extencao == null){
$arquivos_encontrados[] = $informacao_arquivo->getPathname(); // atualiza lista de retorno
};
};
return $arquivos_encontrados; // retorno
};
function retorne_dados_query($query){
$comando = comando_executa($query); // comando
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
return $dados; // retorno
};
function retorne_numero_linhas_comando($comando){
return mysql_num_rows($comando); // retorna numero de linhas
};
function retorne_numero_linhas_query($query){
$comando = comando_executa($query); // comando
return retorne_numero_linhas_comando($comando); // retorno com numero de linhas
};
function upload_arquivo($destino_arquivo, $extensao_array){
if(substr($destino_arquivo, strlen($destino_arquivo) - 1) != "/"){
$destino_arquivo .= "/"; // adiciona barra
};
$nome_temp = $_FILES['arquivo_upload']['tmp_name']; // nome temporario do arquivo
$nome_original = $_FILES['arquivo_upload']['name']; // nome original
$tamanho_arquivo = $_FILES['arquivo_upload']['size']; // tamanho de arquivo
$extensao_arquivo = ".".strtolower(pathinfo($nome_original, PATHINFO_EXTENSION)); // extensao
$novo_nome = md5(data_atual().$nome_original).$extensao_arquivo; // novo nome do arquivo
$endereco_upload = $destino_arquivo.$novo_nome; // endereco final de arquivo de upload
if($tamanho_arquivo == 0 or $nome_original == null){
return null; // retorno nulo
};
$pode_continuar = false; // pode continuar upload
foreach($extensao_array as $extensao){
$extensao = strtolower($extensao); // converte para minusculo
if($extensao != null and $extensao == $extensao_arquivo){
$pode_continuar = true; // pode continuar upload
};
};
if($pode_continuar == true){
move_uploaded_file($nome_temp, $endereco_upload); // movendo arquivo para servidor
if(file_exists($endereco_upload) == true){
return $endereco_upload; // retorna endereco de arquivo
}else{
return null; // retorno nulo
};
}else{
return null; // retorno nulo
};
};
function utf8_decodificar($texto_decodificar){
if(mb_detect_encoding($texto_decodificar, 'utf-8', true) == true){
$texto_decodificar = utf8_decode($texto_decodificar); // decodifica utf-8
};
return $texto_decodificar; // retorno de texto decodificado
};
function constroe_pagina_admin(){
$conteudo_pagina_admin .= "<div class='div_opcoes_administrador'>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='cadlista/' title='Importar lista de sites'>Importar lista de sites</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='gerencia_ajuda/' title='Gerenciar ajuda'>Gerenciar ajuda</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='remove_host/' title='Remover hosts'>Remover hosts</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='indexar/' title='Indexar sites'>Indexar sites</a>"; // opcoes
$conteudo_pagina_admin .= "</div>"; // opcoes
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Administrador"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $conteudo_pagina_admin; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function constroe_pagina_gerencia_ajuda(){
$conteudo_pagina_admin .= "<div class='div_opcoes_administrador'>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='publica_ajuda/' title='Publicar ajuda'>Publicar ajuda</a>"; // opcoes
$conteudo_pagina_admin .= "<li>"; // opcoes
$conteudo_pagina_admin .= "<a href='gerencia_publicacoes/' title='Gerenciar publicações'>Gerenciar publicações</a>"; // opcoes
$conteudo_pagina_admin .= "</div>"; // opcoes
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Gerenciar ajuda"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $conteudo_pagina_admin; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function retorna_numero_banco_dados_nome($nome_banco){
global $banco_dados_nomes_array; // nomes de banco de dados
switch($nome_banco){
case $banco_dados_nomes_array[0]: // produtos
return 1; // retorno
break;
case $banco_dados_nomes_array[4]: // jogos
return 2; // retorno
break;
case $banco_dados_nomes_array[5]: // aplicativos
return 3; // retorno
break;
case $banco_dados_nomes_array[6]: // noticias
return 4; // retorno
break;
case $banco_dados_nomes_array[7]: // sistemas operacionais
return 5; // retorno
break;
default:
return null; // retorno nulo
};
};
function campo_reindexar_hosts(){
if(retorne_servidor_atual_sessao() == null){
return null; // retorno nulo
};
$numero_hosts = retorne_numero_reindexar(); // numero de hosts a reindexar
$codigo_html_bruto .= "<div class='classe_div_campo_reindexar_hosts'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='button' class='btn btn-info' value='Reindexar tudo' onclick='reindexar_hosts_servidor();'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "Banco de dados: "; // codigo html bruto
$codigo_html_bruto .= mudar_banco_dados(null); // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "Hosts: $numero_hosts"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function carregar_dados_banco_dados_inteligente($nome_banco_dados){
global $nome_prefixo_tabela_novo_host; // tabela de hosts
mysql_select_db($nome_banco_dados); // seleciona banco de dados
$query = "select *from $nome_prefixo_tabela_novo_host;"; // query
$comando = comando_executa($query); // comando
$numero_linhas = mysql_num_rows($comando); // numero de linhas
$conteudo_retorno .= "<span class='label label-primary'>"; // conteudo de retorno
$conteudo_retorno .= $numero_linhas; // conteudo de retorno
$conteudo_retorno .= "</span>"; // conteudo de retorno
return $conteudo_retorno; // retorno
};
function carregar_servidores_online(){
global $banco_servidor_busca_inteligente; // banco de dados e servidor
global $usuario_mysql_conectar; // usuario mysql
global $senha_mysql_conectar; // senha mysql
global $conexao_busca_inteligente; // conexoes abertas em busca inteligente
global $imagem_servidor_basico; // imagens de servidor
$servidor_sessao = retorne_servidor_atual_sessao(); // servidor de sessao
$contador = 0; // contador
for($contador == $contador; $contador <= count($banco_servidor_busca_inteligente); $contador++){
$banco_dados = $banco_servidor_busca_inteligente[$contador][0]; // banco de dados
$servidor = $banco_servidor_busca_inteligente[$contador][1]; // servidor
if($banco_dados != null and $servidor != null){
if($servidor == $servidor_sessao){
$campo_indexar_sites .= "<button class='btn btn-success btn-xs' onclick='func_indexar_novos_sites($contador);'>Indexar novos sites</button>"; // campo para indexar sites
$campo_indexar_sites .= "&nbsp;"; // campo para indexar sites
};
$campo_selecionar_servidor .= "<button class='btn btn-primary btn-xs' onclick='funcao_selecionar_servidor_indexar($contador);'>Selecionar</button>"; // campo para selecionar servidor
$campo_selecionar_servidor .= "&nbsp;"; // campo para selecionar servidor
$campo_limpa_sessao .= "<input type='button' class='btn btn-danger btn-xs' value='Limpar sessão' onclick='limpar_sessao_atual();'>"; // campo limpa sessao
$campo_limpa_sessao .= "<br>"; // campo limpa sessao
$campo_limpa_sessao .= "<br>"; // campo limpa sessao
$servidor_online = retorne_servidor_online($servidor); // servidor online ou offline
if($servidor_online == true){
$conexao_busca_inteligente[$contador] = mysql_connect($servidor, $usuario_mysql_conectar, $senha_mysql_conectar);
};
if($servidor_online == true){
mysql_select_db($banco_dados, $conexao_busca_inteligente[$contador]); // seleciona banco de dados de servidor
};
if($servidor_online == true){
$div_campo_servidor .= "<div class='div_servidor'>"; // div de campo de servidor
$div_campo_servidor .= "<span id='span_numero_servidor_novo_index_$contador' style='display: none'>$servidor</span>"; // div de campo de servidor
$div_campo_servidor .= $imagem_servidor_basico[0]; // div de campo de servidor
$div_campo_servidor .= "<br>"; // div de campo de servidor
$div_campo_servidor .= carrega_informacoes_servidor_online($servidor); // div de campo de servidor
$div_campo_servidor .= $campo_selecionar_servidor; // div de campo de servidor
$div_campo_servidor .= $campo_indexar_sites; // div de campo de servidor
$div_campo_servidor .= $campo_limpa_sessao; // div de campo de servidor
$div_campo_servidor .= "On-line: $servidor"; // div de campo de servidor
$div_campo_servidor .= campo_reindexar_hosts(); // div de campo de servidor
$div_campo_servidor .= "</div>"; // div de campo de servidor
}else{
$div_campo_servidor .= "<div class='div_servidor'>"; // div de campo de servidor
$div_campo_servidor .= "<span id='span_numero_servidor_novo_index_$contador' style='display: none'>$servidor</span>"; // div de campo de servidor
$div_campo_servidor .= $imagem_servidor_basico[1]; // div de campo de servidor
$div_campo_servidor .= "<br>"; // div de campo de servidor
$div_campo_servidor .= "Off-line: $servidor"; // div de campo de servidor
$div_campo_servidor .= "</div>"; // div de campo de servidor
};
$campo_indexar_sites = null; // limpando dados necessarios
$campo_selecionar_servidor = null; // limpando dados necessarios
};
};
$div_servidor_status .= "<div id='div_servidores_disponiveis_indexar'>"; // div de servidor
$div_servidor_status .= $div_campo_servidor; // div de servidor
$div_servidor_status .= "</div>"; // div de servidor
$div_servidor_status = "<div class='div_titulo_campos_gerais'>Servidores disponíveis</div>".$div_servidor_status; // adiciona titulo
return $div_servidor_status; // retorno
};
function carrega_informacoes_servidor_online($servidor){
global $imagem_servidor_basico; // imagens de servidor
global $nome_banco; // nome do banco de dados
global $numero_maximo_registros_busca_inteligente; // numero maximo de registros permitidos
$numero_registros = retorne_numero_registros_banco_dados($nome_banco); // numero de registros atual
$porcentagem = ($numero_registros * 100) / $numero_maximo_registros_busca_inteligente; // calcula porcentagem
$porcentagem = round($porcentagem, 2); // arredonda
$informacoes_retorno .= div_porcentagem_hd($porcentagem); // informacoes de retorno
return $informacoes_retorno; // retorno
};
function div_gerenciar_hosts_indexar(){
global $imagem_servidor_basico; // imagens de servidor
global $nome_banco_novos_hosts; // nome do banco de dados de novos hosts
global $nome_banco_novos_sites_indexar; // nome do banco de dados com novos sites a serem indexados
$servidor_sessao = retorne_servidor_atual_sessao(); // servidor de sessao
if($servidor_sessao == null){
return null; // retorno nulo
};
$servidor = $_SESSION['sessao_servidor_selecionado_indexar']; // servidor
conecta_servidor_especifico($servidor); // conecta ao servidor
$div_banco_index .= "<div id='div_banco_index'>"; // banco de dados a indexar
$div_banco_index .= $imagem_servidor_basico[3]; // banco de dados a indexar
$div_banco_index .= carregar_dados_banco_dados_inteligente($nome_banco_novos_sites_indexar); // banco de dados a indexar
$div_banco_index .= "</div>"; // banco de dados a indexar
$div_banco_novos_hosts .= "<div id='div_banco_novos_hosts'>"; // div com novos hosts
$div_banco_novos_hosts .= $imagem_servidor_basico[4]; // div com novos hosts
$div_banco_novos_hosts .= carregar_dados_banco_dados_inteligente($nome_banco_novos_hosts); // div com novos hosts
$div_banco_novos_hosts .= "&nbsp;"; // div com novos hosts
$div_banco_novos_hosts .= "Mover novos sites para indexar >>"; // div com novos hosts
$div_banco_novos_hosts .= "&nbsp;"; // div com novos hosts
$div_banco_novos_hosts .= "</div>"; // div com novos hosts
$div_iniciar_processo_mover_dados .= "<div id='div_iniciar_processo_mover_dados'>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "<button class='btn btn-primary' id='botao_iniciar_processo_mover_dados' onclick='funcao_mover_dados_novos_para_indexar();'>Mover dados</button>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "<input type='button' class='btn btn-danger' id='botao_iniciar_processo_apagar_dados' value='Apagar hosts' onclick='apagar_hosts_tabela_indexar();'>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "<span id='span_iniciar_processo_mover_dados'>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= $imagem_servidor_basico[5]; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "&nbsp;"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "Aguarde..."; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "</span>"; // div para mover dados entre banco de dados
$div_iniciar_processo_mover_dados .= "</div>"; // div para mover dados entre banco de dados
$div_barra_progresso .= "<div id='div_barra_progresso_indexar'>"; // div com barra de progresso
$div_barra_progresso .= "<progress id='barra_progresso_indexar_sites' max='100' value='0'></progress>"; // div com barra de progresso
$div_barra_progresso .= "&nbsp;"; // div com barra de progresso
$div_barra_progresso .= "<span id='span_progresso_indexar_sites'>0%</span>"; // div com barra de progresso
$div_barra_progresso .= "<br>"; // div com barra de progresso
$div_barra_progresso .= "<span id='span_progresso_indexar_sites_imagem'>"; // div com barra de progresso
$div_barra_progresso .= "<div id='div_console_progresso_indexar'>Inicializando...</div>"; // div com barra de progresso
$div_barra_progresso .= $imagem_servidor_basico[5]; // div com barra de progresso
$div_barra_progresso .= "</span>"; // div com barra de progresso
$div_barra_progresso .= "</div>"; // div com barra de progresso
$div_adicionar_novo_host_site .= "<div id='div_adicionar_novo_host_site'>"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "Host ou url:"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "&nbsp;"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "<input type='text' id='campo_adicionar_novo_host_site' placeholder='Endereço de site' onkeypress='if(window.event.keyCode==13){adiciona_novo_site_tabela_indexar();;};'>"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "&nbsp;"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "<button class='btn btn-success' onclick='adiciona_novo_site_tabela_indexar();'>Adicionar</button>"; // div para adicionar novo host
$div_adicionar_novo_host_site .= "</div>"; // div para adicionar novo host
if($servidor != null){
$div_gerenciar .= "<div id='div_gerenciar_hosts_indexar_muda_servidor'>"; // div de gerenciamento
$div_gerenciar .= "Escolha em qual banco de dados deseja indexar, ou adicionar novos hosts."; // div de gerenciamento
$div_gerenciar .= "<br>"; // div de gerenciamento
$div_gerenciar .= "<br>"; // div de gerenciamento
$div_gerenciar .= $imagem_servidor_basico[4]; // div de gerenciamento
$div_gerenciar .= campo_select_muda_tipo_busca(); // div de gerenciamento
$div_gerenciar .= "</div>"; // div de gerenciamento
$div_gerenciar .= $div_adicionar_novo_host_site; // div de gerenciamento
$div_gerenciar .= "<div id='div_gerenciar_hosts_indexar'>"; // div de gerenciamento
$div_gerenciar .= $div_banco_novos_hosts; // div de gerenciamento
$div_gerenciar .= $div_banco_index; // div de gerenciamento
$div_gerenciar .= $div_iniciar_processo_mover_dados; // div de gerenciamento
$div_gerenciar .= "</div>"; // div de gerenciamento
$div_gerenciar .= $div_barra_progresso; // div de gerenciamento
}else{
$div_gerenciar .= "<div id='div_gerenciar_hosts_indexar'>"; // div de gerenciamento
$div_gerenciar .= "Selecione um servidor e <a href='index.php' class='btn btn-success btn-xs'>clique aqui</a>."; // div de gerenciamento
$div_gerenciar .= "</div>"; // div de gerenciamento
};
$div_gerenciar = "<div class='classe_div_painel_administrador_acao'>$div_gerenciar</div>"; // adiciona div de acao
$div_gerenciar = "<div class='div_titulo_campos_gerais'>Indexar hosts</div>".$div_gerenciar; // adiciona titulo
return $div_gerenciar; // retorno
};
function div_porcentagem_hd($porcentagem){
global $imagem_servidor_basico; // imagens de servidor
$div_retorno .= ""; // div retorno
$div_retorno .= "<div class='classe_div_painel_administrador_acao'>"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= $imagem_servidor_basico[2]; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "&nbsp;"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "<progress max='100' value='$porcentagem'></progress>"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "&nbsp;"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= $porcentagem; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "%"; // div retorno
$div_retorno .= ""; // div retorno
$div_retorno .= "</div>"; // div retorno
$div_retorno .= ""; // div retorno
return $div_retorno; // retorno
};
function monta_div_gerenciar_backup_hosts(){
$servidor_sessao = retorne_servidor_atual_sessao(); // servidor de sessao
global $tabela_dados; // tabelas de banco de dados
global $banco_dados_nomes_array; // banco de dados
if($servidor_sessao == null){
return null; // retorno nulo
};
$imagem_backup .= "<div class='classe_div_imagem_backup_admin'>"; // imagem de backup
$imagem_backup .= "<img src='imagens/backup.png' title='Backup'>"; // imagem de backup
$imagem_backup .= "</div>"; // imagem de backup
$campo_backup_dados .= "<div class='classe_div_campo_backup_dados'>"; // campo backup dados
$campo_backup_dados .= "Backup de banco de dados"; // campo backup dados
$campo_backup_dados .= "&nbsp;"; // campo backup dados
$campo_backup_dados .= "<br>"; // campo backup dados
$campo_backup_dados .= "<br>"; // campo backup dados
$campo_backup_dados .= "<input type='button' class='btn btn-success' value='Backup' onclick='backup_banco_dados_geral();'>"; // campo backup dados
$campo_backup_dados .= "&nbsp;"; // campo backup dados
$campo_backup_dados .= "<input type='button' class='btn btn-primary' value='Restaurar backup' onclick='restaurar_backup_indexar();'>"; // campo backup dados
$campo_backup_dados .= "</div>"; // campo backup dados
$campo_progresso .= "<div id='classe_div_campo_progresso_admin'>"; // campo progresso
$campo_progresso .= "<img src='imagens/carregando.gif' title='Aguarde...'>"; // campo progresso
$campo_progresso .= "</div>"; // campo progresso
conecta_banco_dados($banco_dados_nomes_array[8]); // conecta ao banco de dados
$numero_banco = retorna_numero_banco_dados_nome(mudar_banco_dados(null)); // numero do banco de dados
$query = "select *from $tabela_dados[0] where tipo_host='$numero_banco';"; // query
$numero_hosts = retorne_numero_linhas_query($query); // numero de hosts
$campo_informa_dados_backup .= "<div class='classe_div_campo_informa_dados_backup'>"; // campo informa dados de backup
$campo_informa_dados_backup .= "Banco de dados: "; // campo informa dados de backup
$campo_informa_dados_backup .= mudar_banco_dados(null); // campo informa dados de backup
$campo_informa_dados_backup .= "<br>"; // campo informa dados de backup
$campo_informa_dados_backup .= "Número de hosts: "; // campo informa dados de backup
$campo_informa_dados_backup .= $numero_hosts; // campo informa dados de backup
$campo_informa_dados_backup .= "</div>"; // campo informa dados de backup
$codigo_html_bruto .= "<div class='classe_div_painel_administrador_acao' id='div_gerenciar_backup_hosts'>"; // codigo html bruto
$codigo_html_bruto .= $imagem_backup; // codigo html bruto
$codigo_html_bruto .= $campo_backup_dados; // codigo html bruto
$codigo_html_bruto .= $campo_informa_dados_backup; // codigo html bruto
$codigo_html_bruto .= $campo_progresso; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto = "<div class='div_titulo_campos_gerais'>Backup de banco de dados</div>".$codigo_html_bruto; // adiciona titulo
return $codigo_html_bruto; // retorno
};
function retorne_numero_reindexar(){
global $tabela_dados; // tabela de banco de dados
if(mudar_banco_dados(null) == null){
return null; // retorno nulo
};
$query = "select *from $tabela_dados[0];"; // query
return retorne_numero_linhas_query($query); // retorno
};
function retorne_servidor_atual_sessao(){
session_start(); // inicializa sessao
$servidor_sessao = $_SESSION['sessao_servidor_selecionado_indexar']; // servidor de sessao
return $servidor_sessao; // retorno
};
function carrega_topicos_ajuda(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $pasta_arquivos; // pasta de arquivos
global $nome_do_sistema; // nome do sistema
global $endereco_url_arquivos_extras; // endereco de urls extras
$limite = limit_query_topicos(); // limite de query
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$query[0] = "select *from $nome_prefixo_tabela_ajuda where conteudo_post like '%$termo_pesquisa%' $limite;"; // query
$query[1] = "select *from $nome_prefixo_tabela_ajuda where conteudo_post like '%$termo_pesquisa%';"; // query
$comando = comando_executa($query[0]); // comando
$contador = 0; // contador
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Tópicos disponíveis"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$titulo_post = $dados['titulo_post']; // dados
$conteudo_post = $dados['conteudo_post']; // dados
$token_imagens = $dados['token_imagens']; // dados
$numero_imagens = $dados['numero_imagens']; // dados
$data_publicou = $dados['data_publicou']; // dados
$url_topico_ajuda = $endereco_url_arquivos_extras[2]."?topico=$id"; // url de topico de ajuda
if($id != null){
$conteudo_topico .= "<li>"; // conteudo de topico
$conteudo_topico .= "<a href='$url_topico_ajuda' title='$titulo_post'>"; // conteudo de topico
$conteudo_topico .= $titulo_post; // conteudo de topico
$conteudo_topico .= "</a>"; // conteudo de topico
$conteudo_topico = div_especial_basica_campos($conteudo_topico); // adiciona div especial de campos
$codigo_html_bruto .= $conteudo_topico; // atualiza codigo de retorno
};
$conteudo_topico = null; // limpa conteudo de topico
};
$numero_linhas = retorne_numero_linhas_query($query[1]); // numero de linhas
$codigo_html_bruto .= paginacao_topicos($numero_linhas); // codigo html bruto
$codigo_html_bruto = formulario_pesquisa_ajuda().$codigo_html_bruto; // adiciona formulario de pesquisa
return $codigo_html_bruto; // retorno
};
function formulario_pesquisa_ajuda(){
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$codigo_html_bruto .= "<div class='div_formulario_pesquisa_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Pesquisar ajuda"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "<form action='index.php' method='get'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' value='$termo_pesquisa' class='form-control' placeholder='Pesquisar ajuda' name='termo_pesquisa'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary btn-xs' value='Buscar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function monta_pacote_imagens_ajuda($token_imagens){
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda
global $endereco_url_site_global; // endereco de url de site
$query = "select *from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query
$comando = comando_executa($query); // comando
$contador = 0; // contador
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$token_imagens = $dados['token_imagens']; // dados
$conteudo_imagem = $dados['conteudo_imagem']; // dados
$destino_imagem = $dados['destino_imagem']; // dados
$data_publicou = $dados['data_publicou']; // dados
$destino_imagem = basename($destino_imagem); // url da imagem
$destino_imagem = $endereco_url_site_global[4].$destino_imagem; // url da imagem
if($id != null){
$imagem_montada .= "<div class='div_imagem_publicacao_ajuda'>"; // imagem montada
$imagem_montada .= "<img src='$destino_imagem' class='imagem_publicacao_ajuda'>"; // imagem montada
$imagem_montada .= "<br>"; // imagem montada
$imagem_montada .= "<div class='div_conteudo_publicacao_ajuda'>"; // imagem montada
$imagem_montada .= $conteudo_imagem; // imagem montada
$imagem_montada .= "</div>"; // imagem montada
$imagem_montada .= "</div>"; // imagem montada
$codigo_html_bruto .= $imagem_montada; // codigo html bruto
$imagem_montada = null; // limpa imagem montada
};
};
return $codigo_html_bruto; // retorno
};
function monta_topico_ajuda(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $pasta_arquivos; // pasta de arquivos
global $nome_do_sistema; // nome do sistema
$id_topico = retorne_numero_topico_ajuda(); // numero do id de topico de ajuda
if($id_topico == null){
return null; // retorno nulo
};
$query[0] = "select *from $nome_prefixo_tabela_ajuda where id='$id_topico';"; // query
$comando = comando_executa($query[0]); // comando
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$titulo_post = $dados['titulo_post']; // dados
$conteudo_post = $dados['conteudo_post']; // dados
$token_imagens = $dados['token_imagens']; // dados
$numero_imagens = $dados['numero_imagens']; // dados
$data_publicou = $dados['data_publicou']; // dados
$data_publicou = converte_data_amigavel($data_publicou); // data de publicacao
$pacote_imagens = monta_pacote_imagens_ajuda($token_imagens); // pacote de imagens de publicacao
$codigo_html_bruto .= "<div class='div_conteudo_publicacao_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= $titulo_post; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= $conteudo_post; // codigo html bruto
$codigo_html_bruto .= $pacote_imagens; // codigo html bruto
$codigo_html_bruto .= div_especial_basica_campos($data_publicou); // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function retorne_numero_topico_ajuda(){
return remove_html($_GET['topico']); // retorna numero de topico de ajuda
};
function atualiza_imagem_publicacao_ajuda(){
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $pasta_arquivos; // pasta de arquivos
$id_post = remove_html($_POST['id_post']); // id do post
$tipo_atualizar = remove_html($_POST['tipo_atualizar']); // tipo de atualizacao
$numero_imagens_atualizar = retorne_numero_imagens_publicar(); // numero da imagens a atualizar
if($numero_imagens_atualizar == 0 or $id_post == null){
return null; // retorno nulo
};
if($tipo_atualizar == 3){
$query = "select *from $nome_prefixo_tabela_ajuda where id='$id_post';"; // query
}else{
$query = "select *from $nome_prefixo_tabela_ajuda_imagens where id='$id_post';"; // query
};
$dados = retorne_dados_query($query); // dados de query
$id = $dados['id']; // dados
$destino_imagem = $dados['destino_imagem']; // dados
$token_imagens = $dados['token_imagens']; // token da imagem
exclui_arquivo_unico($destino_imagem); // remove imagem antiga
upload_de_imagem_album_ajuda($pasta_arquivos[1], $token_imagens); // upload de nova imagem
};
function atualiza_publicacao_ajuda(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda
$id_post = remove_html($_POST['id_post']); // id do post
$id_topico = remove_html($_POST['id_topico']); // id de topico
$titulo_post = remove_html($_POST['titulo_post']); // titulo do post
$conteudo_post = remove_html($_POST['conteudo_post']); // conteudo do post
$tipo_atualizar = remove_html($_POST['tipo_atualizar']); // tipo de atualizacao
switch($tipo_atualizar){
case 1:
$query = "update $nome_prefixo_tabela_ajuda set titulo_post='$titulo_post', conteudo_post='$conteudo_post' where id='$id_post';"; // query
break;
case 2:
$query = "update $nome_prefixo_tabela_ajuda_imagens set conteudo_imagem='$conteudo_post' where id='$id_post';"; // query
break;
};
atualiza_imagem_publicacao_ajuda(); // atualiza a imagem de publicacao de ajuda
$comando = comando_executa($query); // executa comando
switch($tipo_atualizar){
case 1:
header("Location: editar.php?topico=$id_post"); // volta para a pagina
break;
case 2:
header("Location: editar.php?topico=$id_topico"); // volta para a pagina
break;
default:
header("Location: editar.php?topico=$id_post"); // volta para a pagina
};
};
function campo_excluir_imagem_publicacao($id, $id_topico){
$codigo_html_bruto .= "<form action='excluir_imagem_post.php' method='post'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_post' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_topico' value='$id_topico'>"; // codigo html bruto
$codigo_html_bruto .= "Excluir esta imagem"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='checkbox' name='chk_confirma_exclusao' value='1'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "Confirmar exclusão"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-danger' value='Excluir imagem'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto = div_especial_mensagem_sistema("Excluir imagem", $codigo_html_bruto); // adiciona div especial
return $codigo_html_bruto; // retorno
};
function campo_excluir_publicacao_ajuda($id, $token_imagens){
$codigo_html_bruto .= "<form action='excluir_publicacao.php' method='post'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='checkbox' name='chk_confirma_exclusao' value='1'>"; // codigo html bruto
$codigo_html_bruto .= "&nbsp;"; // codigo html bruto
$codigo_html_bruto .= "Confirmar exclusão"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' value='Excluir publicação' class='btn btn-danger'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_post' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='token_imagens' value='$token_imagens'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto = div_especial_mensagem_sistema("Excluir tópico", $codigo_html_bruto); // adiciona mensagem de sistema
return $codigo_html_bruto; // retorno
};
function carrega_publicacoes_ajuda_editar(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $pasta_arquivos; // pasta de arquivos
global $nome_do_sistema; // nome do sistema
$limite = limit_query_topicos(); // limite de query
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$query[0] = "select *from $nome_prefixo_tabela_ajuda where conteudo_post like '%$termo_pesquisa%' $limite;"; // query
$query[1] = "select *from $nome_prefixo_tabela_ajuda where conteudo_post like '%$termo_pesquisa%';"; // query
$comando = comando_executa($query[0]); // comando
$contador = 0; // contador
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Tópicos cadastrados"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$titulo_post = $dados['titulo_post']; // dados
$conteudo_post = $dados['conteudo_post']; // dados
$token_imagens = $dados['token_imagens']; // dados
$numero_imagens = $dados['numero_imagens']; // dados
$data_publicou = $dados['data_publicou']; // dados
$url_topico_ajuda = "editar.php?topico=$id"; // url de topico de ajuda
if($id != null){
$conteudo_topico .= "<li>"; // conteudo de topico
$conteudo_topico .= "<a href='$url_topico_ajuda' title='$titulo_post'>"; // conteudo de topico
$conteudo_topico .= $titulo_post; // conteudo de topico
$conteudo_topico .= "</a>"; // conteudo de topico
$conteudo_topico = div_especial_basica_campos($conteudo_topico); // adiciona div especial de campos
$codigo_html_bruto .= $conteudo_topico; // atualiza codigo de retorno
};
$conteudo_topico = null; // limpa conteudo de topico
};
$numero_linhas = retorne_numero_linhas_query($query[1]); // numero de linhas
$codigo_html_bruto .= paginacao_topicos($numero_linhas); // codigo html bruto
$codigo_html_bruto = formulario_pesquisa_ajuda().$codigo_html_bruto; // adiciona formulario de pesquisa
return $codigo_html_bruto; // retorno
};
function editar_topico_ajuda(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $pasta_arquivos; // pasta de arquivos
global $nome_do_sistema; // nome do sistema
$id_topico = retorne_numero_topico_ajuda(); // numero do id de topico de ajuda
if($id_topico == null){
return null; // retorno nulo
};
$query[0] = "select *from $nome_prefixo_tabela_ajuda where id='$id_topico';"; // query
$comando = comando_executa($query[0]); // comando
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$titulo_post = $dados['titulo_post']; // dados
$conteudo_post = $dados['conteudo_post']; // dados
$token_imagens = $dados['token_imagens']; // dados
$numero_imagens = $dados['numero_imagens']; // dados
$data_publicou = $dados['data_publicou']; // dados
$data_publicou = converte_data_amigavel($data_publicou); // data de publicacao
$pacote_imagens = monta_pacote_imagens_ajuda_editar($token_imagens); // pacote de imagens de publicacao
$campo_adicionar_imagens .= "<form action='atualizar.php' method='post' enctype='multipart/form-data'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<br>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='submit' class='btn btn-success' value='Enviar imagens'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='hidden' name='tipo_atualizar' value='3'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "<input type='hidden' name='id_post' value='$id'>"; // campo adicionar imagens
$campo_adicionar_imagens .= "</form>"; // campo adicionar imagens
$campo_adicionar_imagens = constroe_div_especial_geral("Adicione mais imagens", $campo_adicionar_imagens, null); // campo adicionar imagens
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= $titulo_post; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= "<form action='atualizar.php' method='post'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='tipo_atualizar' value='1'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='hidden' name='id_post' value='$id'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='titulo_post' class='form-control' value='$titulo_post' placeholder='Título'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='15' rows='5' name='conteudo_post' class='form-control' placeholder='Publique aqui'>$conteudo_post</textarea>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary' value='Atualizar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= $campo_adicionar_imagens; // codigo html bruto
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto);
$codigo_html_bruto .= $pacote_imagens; // codigo html bruto
$codigo_html_bruto .= div_especial_basica_campos($data_publicou); // codigo html bruto
$codigo_html_bruto .= campo_excluir_publicacao_ajuda($id, $token_imagens); // campo excluir postagem
return $codigo_html_bruto; // retorno
};
function exclui_imagem_publicacao_ajuda(){
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda
$id_post = remove_html($_POST['id_post']); // id do post
$confirma_exclusao = remove_html($_POST['chk_confirma_exclusao']); // id do post
if($confirma_exclusao != 1 or $id_post == null){
return null; // retorno nulo
};
$query[0] = "select *from $nome_prefixo_tabela_ajuda_imagens where id='$id_post';"; // query
$query[1] = "delete from $nome_prefixo_tabela_ajuda_imagens where id='$id_post';"; // query
$comando = comando_executa($query[0]); // comando
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$contador = 0; // contador
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$destino_imagem = $dados['destino_imagem']; // dados
if($destino_imagem != null){
exclui_arquivo_unico($destino_imagem); // excluindo arquivo
};
};
comando_executa($query[1]); // exclui imagem na tabela
};
function exclui_publicacao_ajuda(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda
$id_post = remove_html($_POST['id_post']); // id do post
$confirma_exclusao = remove_html($_POST['chk_confirma_exclusao']); // id do post
$token_imagens = remove_html($_POST['token_imagens']); // token de imagens
if($confirma_exclusao != 1 or $id_post == null){
return null; // retorno nulo
};
$query[0] = "select *from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query
$query[1] = "delete from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query
$query[2] = "delete from $nome_prefixo_tabela_ajuda where id='$id_post';"; // query
$comando = comando_executa($query[0]); // comando
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$contador = 0; // contador
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$token_imagens = $dados['token_imagens']; // dados
$conteudo_imagem = $dados['conteudo_imagem']; // dados
$destino_imagem = $dados['destino_imagem']; // dados
$data_publicou = $dados['data_publicou']; // dados
if($destino_imagem != null){
exclui_arquivo_unico($destino_imagem); // excluindo arquivo
};
};
comando_executa($query[1]); // exclui referencia de imagens na tabela
comando_executa($query[2]); // exclui publicacao
};
function gerencia_publicacoes(){
$codigo_html_bruto .= carrega_publicacoes_ajuda_editar(); // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto
$titulo = "Publicações de ajuda"; // titulo
$codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); // adiciona div especial
return $codigo_html_bruto; // retorno
};
function monta_pacote_imagens_ajuda_editar($token_imagens){
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda
global $endereco_url_site_global; // endereco de url de site
$id_topico = retorne_numero_topico_ajuda(); // numero do id de topico de ajuda
$query = "select *from $nome_prefixo_tabela_ajuda_imagens where token_imagens='$token_imagens';"; // query
$comando = comando_executa($query); // comando
$contador = 0; // contador
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$id = $dados['id']; // dados
$token_imagens = $dados['token_imagens']; // dados
$conteudo_imagem = $dados['conteudo_imagem']; // dados
$destino_imagem = $dados['destino_imagem']; // dados
$data_publicou = $dados['data_publicou']; // dados
$destino_imagem = basename($destino_imagem); // url da imagem
$destino_imagem = $endereco_url_site_global[4].$destino_imagem; // url da imagem
if($id != null){
$campo_imagem_publicacao .= "<form action='atualizar.php' method='post' enctype='multipart/form-data'>"; // imagem montada
$campo_imagem_publicacao .= "<input type='hidden' name='tipo_atualizar' value='2'>"; // imagem montada
$campo_imagem_publicacao .= "<input type='hidden' name='id_post' value='$id'>"; // imagem montada
$campo_imagem_publicacao .= "<input type='hidden' name='id_topico' value='$id_topico'>"; // imagem montada
$campo_imagem_publicacao .= "<div class='div_imagem_publicacao_ajuda'>"; // imagem montada
$campo_imagem_publicacao .= "<img src='$destino_imagem' class='imagem_publicacao_ajuda'>"; // imagem montada
$campo_imagem_publicacao .= "<br>"; // imagem montada
$campo_imagem_publicacao .= "<input type='file' name='foto[]'>"; // imagem montada
$campo_imagem_publicacao .= "<br>"; // imagem montada
$campo_imagem_publicacao .= "<textarea cols='15' rows='5' name='conteudo_post'>$conteudo_imagem</textarea>"; // imagem montada
$campo_imagem_publicacao .= "<br>"; // imagem montada
$campo_imagem_publicacao .= "<input type='submit' value='Salvar' class='btn btn-primary'>"; // imagem montada
$campo_imagem_publicacao .= "</div>"; // imagem montada
$campo_imagem_publicacao .= "</form>"; // imagem montada
$campo_imagem_publicacao .= campo_excluir_imagem_publicacao($id, $id_topico); // imagem montada
$campo_imagem_publicacao = div_especial_basica_campos($campo_imagem_publicacao); // adiciona div especial
$codigo_html_bruto .= $campo_imagem_publicacao; // codigo html bruto
$campo_imagem_publicacao = null; // limpa imagem montada
};
};
return $codigo_html_bruto; // retorno
};
function cadastra_imagem_ajuda($token_imagens, $destino_imagem){
global $nome_prefixo_tabela_ajuda_imagens; // tabela de imagens de ajuda
$id_post = remove_html($_POST['id_post']); // id do post
$tipo_atualizar = remove_html($_POST['tipo_atualizar']); // tipo de atualizacao
$data = data_atual(); // data atual
if($id_post == null){
$query = "insert into $nome_prefixo_tabela_ajuda_imagens values(null, '$token_imagens', null, '$destino_imagem', '$data');"; // query
}else{
$query = "update $nome_prefixo_tabela_ajuda_imagens set destino_imagem='$destino_imagem' where id='$id_post';"; // query atualiza
};
if($tipo_atualizar == 3){
$query = "insert into $nome_prefixo_tabela_ajuda_imagens values(null, '$token_imagens', null, '$destino_imagem', '$data');"; // query
};
$comando = comando_executa($query); // comando
};
function campo_entrada_conteudo_ajuda(){
global $endereco_url_arquivos_extras; // url de arquivos php
$campo_adicionar_imagens = "<input type='file' name='foto[]' id='campo_file_upload_postagem' onchange='publicacao_imagens_selecionadas();' multiple>"; // campo adicionar imagens
$codigo_html_bruto .= "<form action='$endereco_url_arquivos_extras[1]' method='post' enctype='multipart/form-data'>"; // codigo html bruto
$codigo_html_bruto .= "<input type='text' name='titulo_post' placeholder='Título'>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<textarea cols='10' rows='8' name='conteudo_post' class='form-control' placeholder='Publique aqui'></textarea>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary' value='Publicar'>"; // codigo html bruto	
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $campo_adicionar_imagens; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= "<output id='output_imagens_upload_publicacao'></output>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto	
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial
return $codigo_html_bruto; // retorno
};
function campo_publica_ajuda(){
$codigo_html_bruto .= "<div class='div_conteudo_publicacao_ajuda'>"; // codigo html bruto
$codigo_html_bruto .= "<div class='div_titulo_campos_gerais'>"; // codigo html bruto
$codigo_html_bruto .= "Publicar ajuda"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= campo_entrada_conteudo_ajuda(); // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function publica_ajuda(){
global $nome_prefixo_tabela_ajuda; // tabela de ajuda
global $pasta_arquivos; // pasta de arquivos
$titulo_post = remove_html($_POST['titulo_post']); // titulo de post
$conteudo_post = remove_html($_POST['conteudo_post']); // conteudo
if($titulo_post == null or $conteudo_post == null){
return null; // retorno nulo
};
$token_imagens = gera_idalbum_postagem_usuario(); // token de imagens
$data = data_atual(); // data atual
$numero_imagens = retorne_numero_imagens_publicar(); // numero de imagens
$query = "insert into $nome_prefixo_tabela_ajuda values(null, '$titulo_post', '$conteudo_post', '$token_imagens', '$numero_imagens', '$data');"; // query
$comando = comando_executa($query); // comando
criar_pasta($pasta_arquivos[1]); // cria pasta de imagens se nao existir
upload_de_imagem_album_ajuda($pasta_arquivos[1], $token_imagens); // faz upload de imagens
};
function upload_de_imagem_album_ajuda($destino_da_imagem, $token_imagens){
global $tamanho_escala_imagem_ajuda; // tamanho em escala de imagem de album
global $pasta_arquivos; // pasta de arquivos
$data_atual = data_atual(); // data atual
$numero_imagens_enviando = retorne_numero_imagens_publicar(); // dados de formulario
$fotos = $_FILES['foto']; // array com fotos
$contador = 0; // contador
$extensoes_disponiveis[] = ".jpeg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".jpg"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".png"; // extensoes de imagens disponiveis
$extensoes_disponiveis[] = ".gif"; // extensoes de imagens disponiveis
for($contador == $contador; $contador <= $numero_imagens_enviando; $contador++){
$nome_imagem = $fotos['tmp_name'][$contador]; // nome imagem
$nome_imagem_real = $fotos['name'][$contador]; // nome imagem
$extensao_imagem = ".".strtolower(pathinfo($nome_imagem_real, PATHINFO_EXTENSION)); // extencao 
$nome_imagem_final = md5($nome_imagem_real.$data_atual).$extensao_imagem; // nome final de imagem
$endereco_final_salvar_imagem = $destino_da_imagem.$nome_imagem_final; // endereco final de imagem
$extensao_permitida = retorne_elemento_array_existe($extensoes_disponiveis, $extensao_imagem); // informa se a extensao de imagem e permitida
if($nome_imagem != null and $nome_imagem_real != null and $extensao_permitida == true){
$image = new SimpleImage(); // nova classe
$image->load($nome_imagem); // carrega imagem
$image->scale($tamanho_escala_imagem_ajuda); // escala ou tamanho de imagem
$image->save($endereco_final_salvar_imagem); // destino final de imagem
$destino_imagem = $pasta_arquivos[1].$nome_imagem_final; // destino de imagem
cadastra_imagem_ajuda($token_imagens, $destino_imagem); // cadastra a imagem no banco de dados
};
};
};
function cadlist($endereco_arquivo){
$lista_retorno = null; // lista de retorno
$numero_adicionados = 0; // numero de sites adicionados
$handle = @fopen($endereco_arquivo, "r"); // ponteiro para arquivo
if ($handle) { // se o arquivo existir
while (!feof($handle)) { // se o arquivo for valido
$buffer = fgets($handle, 4096); // obtendo linha de arquivo
$buffer = trim($buffer); // remove espacos em branco
cadastra_novo_host_indexar($buffer); // cadastra
$lista_retorno .= $buffer."<br>"; // atualiza lista de retorno
$numero_adicionados++; // atualiza numero de adicionados
};
fclose($handle); // fecha arquivo
};
$lista_retorno = "<font size='6px'>Adicionados: $numero_adicionados sites</font> <br><br>". $lista_retorno; // informa quantos foram adicionados
return $lista_retorno; // retorna lista
};
function campo_select_altera_banco_dados(){
global $banco_dados_nomes_array; // banco de dados
$dados_select_sessao = mudar_banco_dados(null); // dados sessao
switch($dados_select_sessao){
case $banco_dados_nomes_array[0]: // opcao
$opcao[0] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[1]: // opcao
$opcao[1] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[2]: // opcao
$opcao[2] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[4]: // opcao
$opcao[3] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[5]: // opcao
$opcao[4] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[6]: // opcao
$opcao[5] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[7]: // opcao
$opcao[6] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[8]: // opcao
$opcao[7] = "selected"; // selecionado
break;
};
$campo_select .= "Banco de dados: "; // campo select
$campo_select .= "<select class='modo_pesquisa' id='campo_select_tipo_busca_dados' onchange='muda_banco_dados(this);'>"; // campo select
$campo_select .= "<option value='0' $opcao[0]>Produtos</option>"; // campo select
$campo_select .= "<option value='1' $opcao[1]>Hosts</option>"; // campo select
$campo_select .= "<option value='2' $opcao[2]>Indexar</option>"; // campo select
$campo_select .= "<option value='4' $opcao[3]>Jogos</option>"; // campo select
$campo_select .= "<option value='5' $opcao[4]>Aplicativos</option>"; // campo select
$campo_select .= "<option value='6' $opcao[5]>Notícias</option>"; // campo select
$campo_select .= "<option value='7' $opcao[6]>Sistemas operacionais</option>"; // campo select
$campo_select .= "<option value='8' $opcao[7]>Backups</option>"; // campo select
$campo_select .= "</select>"; // campo select
$campo_select = div_especial_basica_campos($campo_select); // adiciona div especial
return $campo_select; // retorno
};
function campo_select_muda_tipo_busca(){
global $banco_dados_nomes_array; // banco de dados
$dados_select_sessao = mudar_banco_dados(null); // dados sessao
switch($dados_select_sessao){
case $banco_dados_nomes_array[0]: // opcao
$opcao[0] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[4]: // opcao
$opcao[1] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[5]: // opcao
$opcao[2] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[6]: // opcao
$opcao[3] = "selected"; // selecionado
break;
case $banco_dados_nomes_array[7]: // opcao
$opcao[4] = "selected"; // selecionado
break;
};
$campo_select .= "<select class='modo_pesquisa' id='campo_select_tipo_busca_dados' onchange='muda_banco_dados(this);'>"; // campo select
$campo_select .= "<option value='0' $opcao[0]>Produtos</option>"; // campo select
$campo_select .= "<option value='4' $opcao[1]>Jogos</option>"; // campo select
$campo_select .= "<option value='5' $opcao[2]>Aplicativos</option>"; // campo select
$campo_select .= "<option value='6' $opcao[3]>Notícias</option>"; // campo select
$campo_select .= "<option value='7' $opcao[4]>Sistemas operacionais</option>"; // campo select
$campo_select .= "</select>"; // campo select
return $campo_select; // retorno
};
function campo_select_muda_tipo_busca_cadastro(){
$campo_select .= "<select name='tipo_site' class='modo_pesquisa'>"; // campo select
$campo_select .= "<option value='1'>Produtos</option>"; // campo select
$campo_select .= "<option value='2'>Jogos</option>"; // campo select
$campo_select .= "<option value='3'>Aplicativos</option>"; // campo select
$campo_select .= "<option value='4'>Notícias</option>"; // campo select
$campo_select .= "<option value='5'>Sistemas operacionais</option>"; // campo select
$campo_select .= "</select>"; // campo select
return $campo_select; // retorno
};
function constroe_formulario_upload($url_script_upload, $multiplos_uploads, $id_campo_upload, $campos_formulario){
if($multiplos_uploads == true){
$campo_file .= "<br>"; // campo file
$campo_file .= "<input type='file' name='arquivo_upload' id='$id_campo_upload' multiple>"; // campo file
$campo_file .= "<br>"; // campo file
$campo_file .= "<br>"; // campo file
}else{
$campo_file .= "<br>"; // campo file
$campo_file .= "<input type='file' name='arquivo_upload' id='$id_campo_upload'>"; // campo file
$campo_file .= "<br>"; // campo file
$campo_file .= "<br>"; // campo file
};
$codigo_html_bruto .= "<div class='classe_formulario_upload'>"; // codigo html bruto
$codigo_html_bruto .= "<form action='$url_script_upload' method='post' enctype='multipart/form-data'>"; // codigo html bruto
$codigo_html_bruto .= $campos_formulario; // codigo html bruto
$codigo_html_bruto .= $campo_file; // codigo html bruto
$codigo_html_bruto .= "<input type='submit' class='btn btn-primary btn-xs' value='Enviar'>"; // codigo html bruto
$codigo_html_bruto .= "</form>"; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function retorne_numero_itens_array_post(){
$contador = 0; // contador
foreach($_POST as $key=>$value){
if($value != null){
$contador++; // atualizando contador
};
};
return $contador; // retorno
};
class SimpleImage {
   var $image;
   var $image_type;
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
}
function constroe_div_especial_geral($titulo, $conteudo, $div_id){
$codigo_html_bruto .= "<div class='div_especial_geral_titulo'>"; // codigo html bruto
$codigo_html_bruto .= $titulo; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
$codigo_html_bruto .= ""; // codigo html bruto
$codigo_html_bruto .= "<div class='div_especial_geral_conteudo' id='$div_id'>"; // codigo html bruto
$codigo_html_bruto .= $conteudo; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function converte_data_amigavel($data){
if($data == null){
return null; // retorno nulo
};
$data_explode = explode("-", $data); // data
$time = mktime(0, 0, 0, $data_explode[1]); // time
$nome_mes = strftime("%b", $time); // nome abreviado do mes
$numero_dia = $data_explode[0]; // numero do dia da data
$mes = $nome_mes; // mes
$dia = $data_explode[0]; // dia
$ano = $data_explode[2]; // ano
$dia_semana = date('w', mktime(0,0,0, $data_explode[1], $data_explode[0], $data_explode[2])); // data completa
$semana = array(
'0' => 'Domingo', 
'1' => 'Segunda-Feira',
'2' => 'Terça-Feira',
'3' => 'Quarta-Feira',
'4' => 'Quinta-Feira',
'5' => 'Sexta-Feira',
'6' => 'Sábado'
);
$mes_extenso = array(
'Jan' => 'Janeiro',
'Feb' => 'Fevereiro',
'Mar' => 'Marco',
'Apr' => 'Abril',
'May' => 'Maio',
'Jun' => 'Junho',
'Jul' => 'Julho',
'Aug' => 'Agosto',
'Nov' => 'Novembro',
'Sep' => 'Setembro',
'Oct' => 'Outubro',
'Dec' => 'Dezembro'
);
$data_completa = $semana[$dia_semana].", {$dia} de ".$mes_extenso[$mes]." de 20{$ano}";
return $data_completa; // retorno
};
function div_especial_basica_campos($conteudo){
$codigo_html_bruto .= "<div class='div_especial_basica_campos'>"; // codigo html bruto
$codigo_html_bruto .= $conteudo; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function div_especial_mensagem_sistema($titulo, $mensagem_sistema){
$codigo_html_bruto .= "<div class='div_especial_mensagem_sistema'>"; // codigo html bruto
$codigo_html_bruto .= "<b>$titulo</b>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $mensagem_sistema; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function div_especial_sucesso($titulo, $mensagem_sistema){
$codigo_html_bruto .= "<div class='div_especial_mensagem_sistema_sucesso'>"; // codigo html bruto
$codigo_html_bruto .= "<b>$titulo</b>"; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= $mensagem_sistema; // codigo html bruto
$codigo_html_bruto .= "</div>"; // codigo html bruto
return $codigo_html_bruto; // retorno
};
function enviar_email($email_destino, $assunto_mensagem, $corpo_mensagem){
mail($email_destino, $assunto_mensagem , $corpo_mensagem); // enviando email
};
function func_retorne_urls_hosts_direfentes($endereco_url){
$dados_url_principal = parse_url($endereco_url); // obtem dados de url
$host_url_principal = $dados_url_principal['host']; // host de url principal
$html = file_get_contents($endereco_url); // codigo html
$dom = new DOMDocument; // cria documento html
@$dom->loadHTML($html); // obtem elementos html
$links = $dom->getElementsByTagName('a'); // obtendo links
$array_resultados = array(); // array com resultados 
foreach ($links as $link){
$url = $link->getAttribute('href'); // url...
if($url != null){
$array_resultados[] = $url; // atualiza array...
};
};
$array_resultados = array_unique($array_resultados); // remove duplicatas
$array_retorno = array(); // array de retorno
foreach($array_resultados as $url){
if($url != null){
$dados = parse_url($url); // obtem dados de url
$host_url = $dados['host']; //host de url
if($host_url != $host_url_principal){
$array_retorno[] = $url; // atualiza retorno...
};
};
};
return $array_retorno; // retorno
};
function gera_idalbum_postagem_usuario(){
$data_atual = data_atual(); // data atual
$string_codificar = $data_atual; // string a ser codificada
$idalbum_imagens = md5($string_codificar);
return $idalbum_imagens; // retorno
};
function limit_query_topicos(){
global $limite_resultados_pagina_topicos; // numero de limite
$pagina_atual = pagina_atual_get(); // pagina atual
$pagina_atual = $pagina_atual * $limite_resultados_pagina_topicos; // calcula limit
$limite = "order by id desc limit $pagina_atual, $limite_resultados_pagina_topicos"; // limite
return $limite; // retorno
};
function paginacao_topicos($numero_resultados){
global $limite_resultados_pagina_topicos; // numero maximo de resultados por paginas
global $numero_resultado_topico_muda_index; // numero de paginas proximas paginas que podem ser exibidas
$pagina_numero = pagina_atual_get(); // pagina atual
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$numero_paginas = ($numero_resultados / $limite_resultados_pagina_topicos); // calculando
$numero_paginas = round($numero_paginas); // arredonda
if($numero_paginas <= 1){
return null; // retorno nulo
};
$contador[0] = $pagina_numero - 5; // contador
$contador[1] = 0; // subcontador de numero de links por pagina
for($contador[0] == $contador[0]; $contador[0] <= $numero_paginas; $contador[0]++){
$proxima_pagina_numero = $contador[0]; // proxima pagina
$proxima_pagina_numero_texto = $proxima_pagina_numero + 1; // texto de link
if($proxima_pagina_numero >= 0){
$contador[1]++; // atualiza subcontador de links
};
if($contador[1] > $numero_resultado_topico_muda_index){
break; // saindo de for
};
if($pagina_numero != $proxima_pagina_numero){
$url_pagina .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&pagina_numero=$proxima_pagina_numero' class='btn btn-primary btn-xs'>"; // url de pagina
$url_pagina .= $proxima_pagina_numero_texto; // url de pagina
$url_pagina .= "</a>"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
}else{
$url_pagina .= "<font size='7'><b>"; // url de pagina
$url_pagina .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&pagina_numero=$proxima_pagina_numero'>"; // url de pagina
$url_pagina .= $proxima_pagina_numero_texto; // url de pagina
$url_pagina .= "</a>"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "</b></font>"; // url de pagina
};
if($proxima_pagina_numero < 0){
$url_pagina = null; // url de pagina
};
};
$pagina_anterior = $pagina_numero - 1; // pagina anterior
$pagina_posterior = $proxima_pagina_numero + 1; // proxima pagina
if($pagina_anterior > -1){
$links[0] = "<a href='index.php?termo_pesquisa=$termo_pesquisa&pagina_numero=$pagina_anterior'>Anterior</a>"; // primeiro link
};
if($pagina_posterior < $numero_paginas){
$links[1] = "<a href='index.php?termo_pesquisa=$termo_pesquisa&pagina_numero=$pagina_posterior'>Mais</a>"; // ultimo link
};
$lista_links_retorno .= "<div class='div_lista_links_retorno'>"; // lista com links de retorno
$lista_links_retorno .= $links[0] ; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= $url_pagina; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= $links[1]; // lista com links de retorno
$lista_links_retorno .= "</div>"; // lista com links de retorno
return $lista_links_retorno; // retorno
};
function remove_html($codigo_html_html){
$codigo_html_html = addslashes($codigo_html_html); // remove aspas duplas
$codigo_html_html = strip_tags($codigo_html_html); // remove codigo html
return $codigo_html_html; // retorno
};
function retorne_numero_imagens_publicar(){
$contador = 0; // contador
foreach($_FILES['foto']['name'] as $nome_imagem){
if($nome_imagem != null){
$contador++; // atualiza contador
};
};
return $contador; // retorno
};
function altera_banco_dados_busca_inteligente(){
global $nome_banco; // nome do banco de dados indexados
$banco_dados_sessao = remove_html($_POST['banco_dados_sessao']); // banco de dados a utilizar
$nome_banco  = mudar_banco_dados(null); // nome do banco de dados indexados
if($banco_dados_sessao != null){
echo mudar_banco_dados($banco_dados_sessao); // atualiza a sessao
die; // saindo...
};
};
function limit_query_geral(){
global $numero_maximo_resultados_pagina_busca_inteligente; // numero de limite
$pagina_atual = pagina_atual_get(); // pagina atual
$pagina_atual *= $numero_maximo_resultados_pagina_busca_inteligente; // calcula limit
$limite = "order by id desc limit $pagina_atual, $numero_maximo_resultados_pagina_busca_inteligente"; // limite
return $limite; // retorno
};
function limit_query_geral_sem_id(){
global $numero_maximo_resultados_pagina_busca_inteligente; // numero de limite
$pagina_atual = pagina_atual_get(); // pagina atual
$pagina_atual *= $numero_maximo_resultados_pagina_busca_inteligente; // calcula limit
$limite = "limit $pagina_atual, $numero_maximo_resultados_pagina_busca_inteligente"; // limite
return $limite; // retorno
};
function adicionar_novo_host($endereco_url_site){
global $nome_banco; // nome do banco de dados a salvar
global $numero_maximo_registros_busca_inteligente; // numero maximo de registros por banco de dados
global $banco_dados_atingiu_limite_resposta; // informa se para ou continua adicao de novos sites
global $array_links_host_diferente; // array com links de hosts diferentes
if($endereco_url_site == null){
return false; // retorna falso
};
$dados_cabecalho_host_url = parse_url($endereco_url_site); // dados
$protocolo_host_site = $dados_cabecalho_host_url['scheme']; // protocolo do host do site
if($protocolo_host_site == null){
$endereco_url_site = "http://".$endereco_url_site; // adiciona protocolo http ao host do site
};
mysql_select_db($nome_banco); // seleciona banco de dados
$numero_registros_banco_dados = retorne_numero_registros_banco_dados($nome_banco); // retorna o numero de registros no banco de dados
if($numero_registros_banco_dados > $numero_maximo_registros_busca_inteligente){
$banco_dados_atingiu_limite_resposta = true; // informa para parar
};
$codigo_html_site = url_get_contents($endereco_url_site); // codigo html do site
$codigo_html_site = codificacao_unicode($codigo_html_site); // codificando
$dados_gerais_site = retorne_dados_gerais_site($codigo_html_site, $endereco_url_site); // dados gerais do site
$enderecos_url_site_array = retorna_links_endereco_url($codigo_html_site, $endereco_url_site); // enderecos url de site
$imagens_site_array_url = retorna_imagens_endereco_url($codigo_html_site, $endereco_url_site); // imagens do site
$dados_links = separa_dados_obtidos_links_salvar($enderecos_url_site_array); // dados de links
if(count($dados_links) == 0){
return null; // retorno nulo
};
$contador = 0; // contador
for($contador == $contador; $contador <= count($dados_links); $contador++){
$titulo_link_lista .= $dados_links[$contador][0]; // titulos de links
$url_link_lista .= $dados_links[$contador][1]; // titulos de links
};
$contador = 0; // contador
for($contador == $contador; $contador <= count($array_links_host_diferente); $contador++){
$titulo_link_host_diferente_lista .= $dados_links[$contador][0]; // titulos de links
$url_link_host_diferente_lista .= $dados_links[$contador][1]; // titulos de links
};
$dados_imagens = $imagens_site_array_url; // dados array de imagens
$contador = 0; // contador
for($contador == $contador; $contador <= count($dados_imagens); $contador++){
$dados_array_imagem = $dados_imagens[$contador]; // dados
$imagem_url_lista .= $dados_array_imagem[$contador][0]; // url
$imagem_titulo_lista .= $dados_array_imagem[$contador][1]; // titulo
$imagem_alt_lista .= $dados_array_imagem[$contador][2]; // alt
};
$titulo_site = $dados_gerais_site['title']; // titulo do site
$url_pagina = $endereco_url_site; // url da pagina
$descricao_site = $dados_gerais_site['description'];// descricao do site
$palavras_chave_site = $dados_gerais_site['keywords']; // palavras chave do site
$host_site = retorna_host_url($endereco_url_site); // host do site
$tabela_salvar_site = retorne_tabela_salvar_site(); // tabela para salvar o site
$data = date('d:m:y'); // data
$host_site = remove_html($host_site); // remove codigo especial
$url_pagina = remove_html($url_pagina); // remove codigo especial
$titulo_site = remove_html($titulo_site); // remove codigo especial
$palavras_chave_site = remove_html($palavras_chave_site); // remove codigo especial
$descricao_site = remove_html($descricao_site); // remove codigo especial
$url_link_lista = remove_html($url_link_lista); // remove codigo especial
$url_link_host_diferente_lista = remove_html($url_link_host_diferente_lista); // remove codigo especial
$imagem_url_lista = remove_html($imagem_url_lista); // remove codigo especial
$conteudo_site = remove_html($codigo_html_site); // remove codigo especial
$data = remove_html($data); // remove codigo especial
$query_atualizar_tabela .= "'null', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$url_pagina', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$host_site', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$titulo_site', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$palavras_chave_site', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$descricao_site', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$url_link_lista', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$url_link_host_diferente_lista', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$imagem_url_lista', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$conteudo_site', "; // query para atualizar tabela
$query_atualizar_tabela .= "'$data'"; // query para atualizar tabela
$host_cadastrado_resposta = retorne_host_cadastrado_existe($host_site); // resposta se o host esta cadastrado ou e novo
if($host_site != null){
$query[1] = "delete from $tabela_salvar_site where host_site='$host_site';"; // query para remover dados
$query[2] = "insert into $tabela_salvar_site values($query_atualizar_tabela);"; // query
if($host_cadastrado_resposta == false){
comando_executa($query[2]); // executa o comando query
}else{
comando_executa($query[1]); // executa o comando query
comando_executa($query[2]); // executa o comando query
};
};
$mensagem_sucesso .= "$host_site"; // mensagem de sucesso
$mensagem_sucesso .= "&nbsp;"; // mensagem de sucesso
$mensagem_sucesso .= "adicionado com sucesso."; // mensagem de sucesso
echo $mensagem_sucesso; // mensagem de sucesso
};
function cadastra_novo_host_indexar($endereco_host){
global $conexao_mysql_conectar; // variavel de conexao
global $nome_banco_novos_hosts; // nome de prefixo de banco de dados
global $nome_prefixo_tabela_novo_host; // nome de prefixo de tabela
global $numero_maximo_registros_busca_inteligente; // numero de hosts por tabela
global $nome_banco; // banco de dados de sites
$banco_dados = mysql_select_db($nome_banco_novos_hosts, $conexao_mysql_conectar); // banco de dados 
$numero_hosts_novos_cadastrados = retorna_numero_novos_hosts_indexar($conexao_mysql_conectar); // informa numero de novos hosts cadastrados
$query[1] = "select *from $nome_prefixo_tabela_novo_host where host_site='$endereco_host';"; // query
$query[2] = "insert into $nome_prefixo_tabela_novo_host values('$endereco_host');"; // query
$comando = comando_executa($query[1], $conexao_mysql_conectar);; // executa comando
$numero_linhas = mysql_num_rows($comando); // numero de linhas
if($endereco_host != null and $numero_linhas == 0 and $numero_maximo_registros_busca_inteligente > $numero_hosts_novos_cadastrados){
$comando = comando_executa($query[2], $conexao_mysql_conectar); // executa comando
};
mysql_select_db($nome_banco); // seleciona banco de dados
};
function codificacao_unicode($texto_decodificar){
if(mb_detect_encoding($texto_decodificar, 'utf-8', true) == false){
$texto_decodificar = utf8_encode($texto_decodificar); // codifica utf-8
};
return $texto_decodificar; // retorna o codigo
};
function conecta_servidor_especifico($servidor_mysql_conectar){
global $conexao_mysql_conectar; // variavel de conexao
global $usuario_mysql_conectar; // usuario
global $senha_mysql_conectar; // senha
$conexao_mysql_conectar = mysql_connect($servidor_mysql_conectar, $usuario_mysql_conectar, $senha_mysql_conectar); // conectando-se
};
function puxar_subimagens($endereco_url_principal){
global $numero_maximo_subimagens_pagina; // numero maximo de subimagens por pagina
$host_site = retorna_host_url($endereco_url_principal); // host do site
$array_retorno_imagens = array(); // array de retorno com imagens
$requisicao_http = curl_init(); // cria sessao http
curl_setopt($requisicao_http, CURLOPT_URL, $endereco_url_principal);// The url to get imagens from
curl_setopt($requisicao_http, CURLOPT_RETURNTRANSFER, true);// We want to get the respone
$resultados_requisicao = curl_exec($requisicao_http); // resultados
$regex='|<img.*?src="(.*?)"|'; // codigo para pegar epanas imagem
preg_match_all($regex, $resultados_requisicao, $parts); // pegando imagens
$imagens_encontrados = $parts[1]; // imagens encontrados
$contador = 0; // contador
foreach($imagens_encontrados as $url_imagem){
$titulo_imagem = basename($url_imagem); // titulo da imagem
if($url_imagem != null){
if(retorna_host_url($url_imagem) == null){
$url_imagem = "http://$host_site".$url_imagem; // completa imagem
};
$array_retorno_imagens[$url_imagem] = $titulo_imagem; // url de imagem
$contador++; // atualizando contador
if($contador > $numero_maximo_subimagens_pagina){
break; // parando laco
};
};
};
curl_close($requisicao_http); // fechando
return $array_retorno_imagens; // retorno
};
function puxar_sublinks($endereco_url_principal){
global $numero_maximo_sublinks_pagina; // numero maximo de sublinks por pagina
global $busca_sublinks_ativada; // informa se a busca por subpaginas esta ativada ou desativada
$array_retorno_links = array(); // array de retorno com links
if($busca_sublinks_ativada == false){
return $array_retorno_links; // retorno nulo
};
$host_site = retorna_host_url($endereco_url_principal); // host do site
$requisicao_http = curl_init(); // cria sessao http
curl_setopt($requisicao_http, CURLOPT_URL, $endereco_url_principal);// The url to get links from
curl_setopt($requisicao_http, CURLOPT_RETURNTRANSFER, true);// We want to get the respone
$resultados_requisicao = curl_exec($requisicao_http); // resultados
$regex='|<a.*?href="(.*?)"|'; // codigo para pegar epanas link
preg_match_all($regex, $resultados_requisicao, $parts); // pegando links
$links_encontrados = $parts[1]; // links encontrados
$contador = 0; // contador
foreach($links_encontrados as $url_link){
if($url_link != null){
if(retorna_host_url($url_link) == null){
$url_link = "http://$host_site".$url_link; // completa link
};
$array_retorno_links[] = $url_link; // atualiza array de retorno
$contador++; // atualizando contador
if($contador > $numero_maximo_sublinks_pagina){
break; // parando laco
};
};
};
curl_close($requisicao_http); // fechando
return $array_retorno_links; // retorno
};
function puxa_links_host_diferente($site_url, $link_site, $titulo_link_site){
global $array_links_host_diferente; // array com links de hosts diferentes
$host[0] = retorna_host_url($site_url); // host de site
$host[1] = retorna_host_url($link_site); // host de link
$host_diferente = $host[1]; // endereco de host diferente
if($host[0] != $host[1]){
if(retorne_elemento_array_existe($array_links_host_diferente, $host_diferente) == false){
$array_links_host_diferente[$host_diferente] = $titulo_link_site; // atualiza array
cadastra_novo_host_indexar($host_diferente); // cadastrando hosts
};
};
};
function retorna_host_url($endereco_url_site){
$dados_host = parse_url($endereco_url_site); // dados do host
$host_site =  $dados_host['host']; // obtendo o host
$host_site = str_replace("www.", null, $host_site); // remove www.
$host_site = addslashes($host_site); // remove acentos se houver
return $host_site; // retorna o  host do site
};
function retorna_imagens_endereco_url($codigo_html_site, $endereco_url_site){
global $separador_dados_tabela; // separador de informacoes
global $busca_subimagens_ativada; // informa se a busca por subpaginas esta ativada ou desativada
global $numero_maximo_links_pagina; // numero maximo de links por pagina
$array_dados_retorno = array(); // array com dados de retorno
$dom = new domDocument; // dom com objetos do codigo html
@$dom->loadHTML($codigo_html_site); // obtendo codigo html de site
$dom->preserveWhiteSpace = false; // representa documento html por completo
$endereco_sites = $dom->getElementsByTagName('img'); // obtendo dom por tag
foreach ($endereco_sites as $tag){
$imagem_url = $tag->getAttribute('src'); // url de imagem
$imagem_titulo = $tag->getAttribute('title'); // titulo de imagem
$imagem_alt = $tag->getAttribute('title'); // alt de imagem
$dados_array_imagem[][0] = $imagem_url.$separador_dados_tabela; // url
$dados_array_imagem[][1] = $imagem_titulo.$separador_dados_tabela; // titulo
$dados_array_imagem[][2] = $imagem_alt.$separador_dados_tabela; // alt
if($imagem_url != null and retorne_elemento_array_existe($array_dados_retorno, $imagem_url) == false){
$array_dados_retorno[] = $dados_array_imagem; // atualizando array com links de pagina
};
$tamanho_array = count($array_dados_retorno); // tamanho do array
if($tamanho_array > $numero_maximo_links_pagina){
break; // saindo de foreach
};
};
if($busca_subimagens_ativada == true){
$links_subpaginas = retorna_links_endereco_url_sem_sublinks($codigo_html_site, $endereco_url_site);
foreach($links_subpaginas as $url_subpagina => $titulo_subpagina){
$dados_array_subimagem = puxar_subimagens($url_subpagina); // atualiza array de retorno com subimagens
foreach($dados_array_subimagem as $url_subimagem => $titulo_subimagem){
$dados_array_imagem[][0] = $url_subimagem.$separador_dados_tabela; // url
$dados_array_imagem[][1] = $titulo_subimagem.$separador_dados_tabela; // titulo
$dados_array_imagem[][2] = $titulo_subimagem.$separador_dados_tabela; // alt
if($url_subimagem != null){
$array_dados_retorno[] = $dados_array_imagem; // atualizando array com links de pagina
};
$tamanho_array = count($array_dados_retorno); // tamanho do array
if($tamanho_array > retorne_tamanho_pode_indexar_site()){
break; // saindo de foreach
};
};
};
};
return $array_dados_retorno; // retorno
};
function retorna_links_endereco_url($codigo_html_site, $endereco_url_site){
global $numero_maximo_links_pagina; // numero maximo de links por pagina
$host_site = retorna_host_url($endereco_url_site); // host do site
$array_dados_retorno = array(); // array com dados de retorno
$array_dados_buffer = array(); // dados de array de buffer temporario
$dom = new domDocument; // dom com objetos do codigo html
@$dom->loadHTML($codigo_html_site); // obtendo codigo html de site
$dom->preserveWhiteSpace = false; // representa documento html por completo
$endereco_sites = $dom->getElementsByTagName('a'); // obtendo dom por tag
foreach ($endereco_sites as $url_link_principal){
$endereco_url = $url_link_principal->getAttribute('href'); // endereco url
$endereco_url_normal = $url_link_principal->getAttribute('href'); // endereco url normal
if(retorna_host_url($endereco_url) == null){
$endereco_url = "http://$host_site".$endereco_url; // completa link
};
$titulo_link = $url_link_principal->childNodes->item(0)->nodeValue; // titulo do link
$host_url_link = retorna_host_url($endereco_url); // endereco host de url de link
puxa_links_host_diferente($endereco_url_site, $endereco_url, $titulo_link); // puxa links de host diferentes
if(retorne_elemento_array_existe($array_dados_retorno, $endereco_url) == false and $endereco_url_normal != null and $titulo_link != null and $host_site == $host_url_link){
$array_dados_retorno[$endereco_url] = $titulo_link; // atualizando array com links de pagina
};
$tamanho_array = count($array_dados_retorno); // tamanho do array
if($tamanho_array > $numero_maximo_links_pagina){
break; // saindo de foreach
};
};
$array_dados_buffer = $array_dados_retorno; // aloca resultados no buffer
foreach($array_dados_buffer as $endereco_url_buffer => $titulo_buffer){
$sublinks_array = puxar_sublinks($endereco_url_buffer); // urls de url principal
foreach($sublinks_array as $url_sublink){
$titulo_sublink = basename($url_sublink); // titulo de sublink
$host_url_link = retorna_host_url($url_sublink); // endereco host de url de link
puxa_links_host_diferente($endereco_url_site, $url_sublink, $titulo_sublink); // puxa links de host diferentes
if(retorne_elemento_array_existe($array_dados_retorno, $url_sublink) == false and $url_sublink != null and $host_site == $host_url_link){
$array_dados_retorno[$url_sublink] = $titulo_sublink; // atualizando array com links de pagina
};
};
$tamanho_array = count($array_dados_retorno); // tamanho do array
if($tamanho_array > retorne_tamanho_pode_indexar_site()){
break; // saindo de foreach
};
};
return $array_dados_retorno; // retorno
};
function retorna_links_endereco_url_sem_sublinks($codigo_html_site, $endereco_url_site){
$host_site = retorna_host_url($endereco_url_site); // host do site
$array_dados_retorno = array(); // array com dados de retorno
$dom = new domDocument; // dom com objetos do codigo html
@$dom->loadHTML($codigo_html_site); // obtendo codigo html de site
$dom->preserveWhiteSpace = false; // representa documento html por completo
$endereco_sites = $dom->getElementsByTagName('a'); // obtendo dom por tag
foreach ($endereco_sites as $url_link_principal){
$endereco_url = $url_link_principal->getAttribute('href'); // endereco url
if(retorna_host_url($endereco_url) == null){
$endereco_url = "http://$host_site".$endereco_url; // completa link
};
$titulo_link = $url_link_principal->childNodes->item(0)->nodeValue; // titulo do link
if(retorne_elemento_array_existe($array_dados_retorno, $endereco_url) == false){
$array_dados_retorno[$endereco_url] = $titulo_link; // atualizando array com links de pagina
};
};
return $array_dados_retorno; // retorno
};
function retorna_numero_novos_hosts_indexar($conexao_mysql_conectar){
global $nome_prefixo_tabela_novo_host; // nome de prefixo de tabela
$query = "select *from $nome_prefixo_tabela_novo_host;"; // query
$comando = comando_executa($query, $conexao_mysql_conectar); // executa comando
$numero_linhas = mysql_num_rows($comando); // numero de linhas
return $numero_linhas; // retorno
};
function retorne_dados_gerais_site($codigo_html_site, $endereco_url_site){
$meta_tags = get_meta_tags($endereco_url_site); // meta tags do site
$pagina = $codigo_html_site; // codigo html de pagina
$titulo_inicio = strpos($pagina,'<title>')+7; // incio de titulo
$tamanho_titulo = strpos($pagina,'</title>')-$titulo_inicio; // tamanho de titulo
$meta_tags ['title'] = substr($pagina, $titulo_inicio, $tamanho_titulo); // obtem titulo completo
return $meta_tags; // retorno
};
function retorne_elemento_array_existe($array_pesquisa, $valor_pesquisa){
if(count($array_pesquisa) == 0){
return false; // retorna falso
};
foreach($array_pesquisa as $valor_array){
if($valor_array == $valor_pesquisa){
return true; // retorna verdadeiro
};
};
return false; // retorna falso nesse nivel
};
function retorne_host_cadastrado_existe($host_site){
$tabela_salvar_site = retorne_tabela_salvar_site(); // tabela para salvar o site
$query = "select *from $tabela_salvar_site where host_site='$host_site';"; // query
$comando = comando_executa($query); // comando
$numero_linhas = mysql_num_rows($comando); // numero de linhas
if($numero_linhas > 0){
return true; // esta cadastrado
}else{
return false; // nao esta cadastrado
};
};
function retorne_host_tabela_indexar_existe($host_site){
global $nome_prefixo_tabela_novo_host; // nome de prefixo de tabela
$query = "select *from $nome_prefixo_tabela_novo_host where host_site='$host_site';"; // query
$comando = comando_executa($query); // comando
$numero_linhas = mysql_num_rows($comando); // numero de linhas
if($numero_linhas > 0){
return true; // esta cadastrado
}else{
return false; // nao esta cadastrado
};
};
function retorne_numero_registros_banco_dados($nome_banco_dados){
conecta_banco_dados($nome_banco_dados); // conecta-se ao banco de dados
$tabela = retorne_tabela_salvar_site(); // tabela salvar site
$query = "select *from $tabela;"; // query
return retorne_numero_linhas_query($query); // retorno
};
function retorne_tabela_salvar_site(){
global $tabela_dados; // tabela de dados
return $tabela_dados[0]; // retorna tabela de dados
};
function retorne_tamanho_pode_indexar_site(){
global $numero_maximo_links_pagina; // numero maximo de links por pagina inicial
global $numero_maximo_sublinks_pagina; // numero maximo de sublinks por pagina
global $numero_maximo_subimagens_pagina; // numero maximo de subimagens por pagina
$tamanho[0] = $numero_maximo_links_pagina * $numero_maximo_sublinks_pagina; // links
$tamanho[1] = $numero_maximo_links_pagina * $numero_maximo_subimagens_pagina; // imagens
$tamanho_total = $tamanho[0] + $tamanho[1]; // tamanho total
return $tamanho_total; // retorno
};
function separa_dados_obtidos_links_salvar($array_dados){
global $separador_dados_tabela; // separador de informacoes
$array_retorno = array(); // array de retorno
$contador = 0; // contador
if(sizeof($array_dados) > 0){
foreach($array_dados as $key=>$value){
$titulo_url_array = $value.$separador_dados_tabela; // titulo
$url_array = $key.$separador_dados_tabela; // conteudo
if($url_array != null and $titulo_url_array != null){
$array_retorno[$contador][0] = $titulo_url_array; // titulo
$array_retorno[$contador][1] = $url_array; // url
$contador++; // atualizando contador
};
};
};
return $array_retorno; // retorno de array
};
function strip_html_tags( $text )
{
	$text = preg_replace(
		array(
			'@<head[^>]*.*?</head>@siu',
			'@<style[^>]*.*?</style>@siu',
			'@<script[^>]*?.*?</script>@siu',
			'@<object[^>]*?.*?</object>@siu',
			'@<embed[^>]*?.*?</embed>@siu',
			'@<applet[^>]*?.*?</applet>@siu',
			'@<noframes[^>]*?.*?</noframes>@siu',
			'@<noscript[^>]*?.*?</noscript>@siu',
			'@<noembed[^>]*?.*?</noembed>@siu',
			'@<((br)|(hr))@iu',
			'@</?((address)|(blockquote)|(center)|(del))@iu',
			'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
			'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
			'@</?((table)|(th)|(td)|(caption))@iu',
			'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
			'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
			'@</?((frameset)|(frame)|(iframe))@iu',
		),
		array(
			' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
			"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
			"\n\$0", "\n\$0",
		),
		$text );
	return strip_tags( $text );
}
function url_get_contents($url_site) {
$ch = curl_init(); // nova conexao curl_init
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url_site);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);   
$data = curl_exec($ch); // obtendo dados 
curl_close($ch); // fecha conexao
return $data; // retorna dados
};
function buscar_host($nome_conexao){
global $numero_maximo_resultados_pagina_busca_inteligente; // numero maximo de resultados por pagina
global $resultados_busca_termos; // resultados de busca inteligente
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa
$busca_exata = retorne_busca_exata(); // tipo de busca
if($termo_pesquisa == null){
return null; // valida termo de pesquisa
};
$termo_pesquisa = utf8_decodificar($termo_pesquisa); // codifica para utf-8
$dados_array_retorno = array(); // dados de array de retorno
$query = retorna_query_pesquisa($termo_pesquisa); // query
$comando = comando_executa($query[0], $nome_conexao); // comando
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$dados_pacote = monta_pacote_retorno_busca($comando); // dados de pacote
$numero_resultados_validos = retorne_numero_linhas_query($query[1]); // numero de resultados validos
foreach($dados_pacote as $conteudo_pacote){
if($conteudo_pacote != null){
$lista_resultados_retorno .= $conteudo_pacote; // atualizando
};
};
if($busca_exata == 1){
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "Para otimizar a pesquisa de imagens, "; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "apenas links de imagens que contenham <b>$termo_pesquisa</b> serão exibidas!"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=0&busca_exata=0' class='btn btn-primary btn-xs'><b>busca aproximada</b></a>"; // informacao sobre pesquisa de imagem
}else{
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<br>"; // informacao sobre pesquisa de imagem
$informacao_sobre_pesquisa_imagem .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=0&busca_exata=1' class='btn btn-success btn-xs'><b>Busca exata!</b></a>"; // informacao sobre pesquisa de imagem
};
$div_com_resultados_organizados .= "<div class='div_com_resultados_organizados'>"; // div com resultados organizados
$div_com_resultados_organizados .= $lista_resultados_retorno; // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados
$div_com_resultados_organizados .= "<div class='div_com_resultados_organizados'>"; // div com resultados organizados
$div_com_resultados_organizados .= "<br>"; // div com resultados organizados
$div_com_resultados_organizados .= criar_tags_busca_inteligente(); // div com resultados organizados
$div_com_resultados_organizados .= proximas_paginas_busca_inteligente($numero_resultados_validos); // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados
$lista_resultados_retorno = $div_com_resultados_organizados; // adiciona resultados ja organizados
$resultados_busca_termos .= $lista_resultados_retorno ; // atualizando
$div_com_resultados_organizados = null; // div com resultados organizados
$div_com_resultados_organizados .= "<div class='div_com_resultados_organizados'>"; // div com resultados organizados
$div_com_resultados_organizados .= "<div class='div_numero_resultados_busca_inteligente'>"; // div com resultados organizados
$div_com_resultados_organizados .= "Encontrados aproximadamente"; // div com resultados organizados
$div_com_resultados_organizados .= "&nbsp;"; // div com resultados organizados
$div_com_resultados_organizados .= "("; // div com resultados organizados
$div_com_resultados_organizados .= $numero_resultados_validos; // div com resultados organizados
$div_com_resultados_organizados .= ")"; // div com resultados organizados
$div_com_resultados_organizados .= "&nbsp;"; // div com resultados organizados
$div_com_resultados_organizados .= "sites contendo <b>$termo_pesquisa</b>."; // div com resultados organizados
$div_com_resultados_organizados .= $informacao_sobre_pesquisa_imagem; // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados
$div_com_resultados_organizados .= "</div>"; // div com resultados organizados
$resultados_busca_termos = $div_com_resultados_organizados.$resultados_busca_termos; // atualiza resultado final
};
function conecta_servidores_inteligentes(){
global $banco_servidor_busca_inteligente; // banco de dados e servidor
global $usuario_mysql_conectar; // usuario mysql
global $senha_mysql_conectar; // senha mysql
global $conexao_busca_inteligente; // conexoes abertas em busca inteligente
$contador = 0; // contador
for($contador == $contador; $contador <= count($banco_servidor_busca_inteligente); $contador++){
$banco_dados = $banco_servidor_busca_inteligente[$contador][0]; // banco de dados
$servidor = $banco_servidor_busca_inteligente[$contador][1]; // servidor
if($banco_dados != null and $servidor != null){
$servidor_online = retorne_servidor_online($servidor); // servidor online ou offline
if($servidor_online == true){
$conexao_busca_inteligente[$contador] = mysql_connect($servidor, $usuario_mysql_conectar, $senha_mysql_conectar);
};
if($servidor_online == true){
mysql_select_db($banco_dados, $conexao_busca_inteligente[$contador]); // seleciona banco de dados de servidor
};
};
};
};
function criar_tags_busca_inteligente(){
$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa
global $nome_do_sistema; // nome do sistema
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa
$lista_retorno_tags = null; // links de retorno com tags de pesquisa
foreach($array_termos_pesquisa as $termo_pesquisa_array){
$url_termo_pesquisa = "index.php?termo_pesquisa=$termo_pesquisa_array&modo_pesquisa=$modo_pesquisa&busca_exata=1"; // url com termo de pesquisa
if(strlen($termo_pesquisa_array) > 3){
$lista_retorno_tags .= "<a href='$url_termo_pesquisa' title='$termo_pesquisa_array' class='btn btn-primary btn-xs'>$termo_pesquisa_array</a>"; // atualizando lista
$lista_retorno_tags .= "&nbsp;"; // atualizando lista
};
};
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<div class='div_sugestoes_pesquisa_inteligente'>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<font size='5'>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "Sugestões de pesquisa do $nome_do_sistema"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "</font>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<br>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "Se você não encontrou o que queria, clique numa das sugestões abaixo."; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "<br>"; // div de retorno
$div_retorno .= "<br>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= $lista_retorno_tags; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= "</div>"; // div de retorno
$div_retorno .= ""; // div de retorno
$div_retorno .= ""; // div de retorno
return $div_retorno; // retorno
};
function monta_pacote_retorno_busca($comando){
$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa
global $tamanho_maximo_descricao_exibir_site_pesquisa; // tamanho de caracteres de descricao
global $tamanho_limite_busca_inteligente_query; // este e o tamanho limite na busca query, isto evita uma busca desnecessaria em todo o banco de dados
global $tamanho_maximo_titulo_resultado_pesquisa; // tamanho maximo de titulo de pesquisa
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$contador = 0; // contador
$dados_array_retorno = array(); // dados de array de retorno
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$host_site = $dados['host_site']; // dados de tabela
$url_pagina = $dados['url_pagina']; // dados de tabela
$titulo_site = codificacao_unicode($dados['titulo_site']); // dados de tabela
$description_site = codificacao_unicode($dados['description_site']); // dados de tabela
$links_internos_site = $dados['links_internos_site']; // dados de tabela
$imagens_site_geral = $dados['imagens_site_geral']; // dados de tabela
$conteudo_site = codificacao_unicode($dados['conteudo_site']); // conteudo do site
if(strlen($titulo_site) > $tamanho_maximo_titulo_resultado_pesquisa){
$titulo_site = substr($titulo_site, 0, $tamanho_maximo_titulo_resultado_pesquisa)."..."; // limita tamanho de titulo
};
$link_termo_busca = retorne_primeiro_link_array_pesquisa_inteligente($links_internos_site, $termo_pesquisa, $host_site); // primeiro link com termo de busca
if($link_termo_busca != null){
$link_encontrado_resposta = true; // link encontrado
}else{
$link_encontrado_resposta = false; // link nao encontrado
};
if($link_encontrado_resposta == true){
$titulo_site = "<a href='$link_termo_busca' title='$titulo_site' target='_blank' class='classe_link_titulo_pesquisa'>$titulo_site</a>"; // adiciona link a titulo
}else{
$titulo_site = "<a href='$url_pagina' title='$titulo_site' target='_blank' class='classe_link_titulo_pesquisa'>$titulo_site</a>"; // adiciona link a titulo
};
if(strlen($description_site) > $tamanho_maximo_descricao_exibir_site_pesquisa){
$description_site = substr($description_site, 0, $tamanho_maximo_descricao_exibir_site_pesquisa)."...";
};
if($modo_pesquisa == 2){
$imagens_busca = separa_imagens_busca($imagens_site_geral, $host_site); // separando imagens_busca
};
if($host_site != null){
if($modo_pesquisa != 2){
$conteudo_host .= "<div class='div_resultado_busca_inteligente_web'>"; // conteudo do host
$conteudo_host .= $titulo_site; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= "<b>"; // conteudo do host
$conteudo_host .= $host_site; // conteudo do host
$conteudo_host .= "</b>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= $description_site; // conteudo do host
$conteudo_host .= "</div>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
}else{
if(count($imagens_busca) > 0){
$conteudo_host .= "<div class='div_resultado_busca_inteligente_imagens'>"; // conteudo do host
$conteudo_host .= $titulo_site; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= "<b>"; // conteudo do host
$conteudo_host .= $host_site; // conteudo do host
$conteudo_host .= "</b>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= $description_site; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= "<br>"; // conteudo do host
$conteudo_host .= $imagens_busca; // conteudo do host
$conteudo_host .= "</div>"; // conteudo do host
};
};
};
if($modo_pesquisa == 2){
$dados_array_retorno[$contador] = $conteudo_host; // atualizando tabela
}else{
if($link_encontrado_resposta == true){
$dados_array_retorno[$contador] = $conteudo_host; // atualizando tabela
};
};
$conteudo_host = null; // limpando dados antigos
};
if(count($dados_array_retorno) > 0){
$dados_array_retorno = array_reverse($dados_array_retorno); // inverte a ordem de resultados
};
return $dados_array_retorno; // retorno de dados
};
function pagina_atual_get(){
$pagina_numero = $_GET['pagina_numero']; // numero de pagina
$pagina_numero = remove_html($pagina_numero); // remove html
if(is_numeric($pagina_numero) == false){
$pagina_numero = 0; // pagina zero
};
return $pagina_numero; // retorno
};
function proximas_paginas_busca_inteligente($numero_resultados){
global $numero_maximo_resultados_pagina_busca_inteligente; // numero maximo de resultados por paginas
global $numero_proximas_pagina_mudar_index; // numero de paginas proximas paginas que podem ser exibidas
$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa
$pagina_numero = pagina_atual_get(); // pagina atual
$busca_exata = retorne_busca_exata(); // busca exata
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$numero_paginas = ($numero_resultados / $numero_maximo_resultados_pagina_busca_inteligente); // calculando
$numero_paginas = round($numero_paginas); // arredonda
if($numero_paginas <= 1){
return null; // retorno nulo
};
$contador[0] = $pagina_numero - 5; // contador
$contador[1] = 1; // subcontador de numero de links por pagina
for($contador[0] == $contador[0]; $contador[0] <= $numero_paginas; $contador[0]++){
$proxima_pagina_numero = $contador[0]; // proxima pagina
$proxima_pagina_numero_texto = $proxima_pagina_numero + 1; // texto de link
if($proxima_pagina_numero >= 0){
$contador[1]++; // atualiza subcontador de links
};
if($contador[1] > $numero_proximas_pagina_mudar_index){
break; // saindo de for
};
if($pagina_numero != $proxima_pagina_numero){
$url_pagina .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$proxima_pagina_numero&busca_exata=$busca_exata' class='btn btn-primary btn-xs'>"; // url de pagina
$url_pagina .= $proxima_pagina_numero_texto; // url de pagina
$url_pagina .= "</a>"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
}else{
$url_pagina .= "<font size='7'><b>"; // url de pagina
$url_pagina .= "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$proxima_pagina_numero&busca_exata=$busca_exata'>"; // url de pagina
$url_pagina .= $proxima_pagina_numero_texto; // url de pagina
$url_pagina .= "</a>"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "&nbsp;"; // url de pagina
$url_pagina .= "</b></font>"; // url de pagina
};
if($proxima_pagina_numero < 0){
$url_pagina = null; // url de pagina
};
};
$pagina_anterior = $pagina_numero - 1; // pagina anterior
$pagina_posterior = $proxima_pagina_numero + 1; // proxima pagina
if($pagina_anterior > -1){
$links[0] = "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$pagina_anterior&busca_exata=$busca_exata'>Anterior</a>"; // primeiro link
};
if($pagina_posterior < $numero_paginas){
$links[1] = "<a href='index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=$modo_pesquisa&pagina_numero=$pagina_posterior&busca_exata=$busca_exata'>Mais</a>"; // ultimo link
};
$lista_links_retorno .= "<div class='div_lista_links_retorno'>"; // lista com links de retorno
$lista_links_retorno .= $links[0] ; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= $url_pagina; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= "&nbsp;"; // lista com links de retorno
$lista_links_retorno .= $links[1]; // lista com links de retorno
$lista_links_retorno .= "</div>"; // lista com links de retorno
return $lista_links_retorno; // retorno
};
function retorna_query_pesquisa($termo_pesquisa){
global $tamanho_limite_busca_inteligente_query; // este e o tamanho limite na busca query, isto evita uma busca desnecessaria em todo o banco de dados
$pagina_numero = pagina_atual_get(); // numero da pagina atual
$tabela = retorne_tabela_salvar_site(); // tabela
$pagina_atual = $pagina_numero; // pega pagina atual
if($pagina_atual == null or is_numeric($pagina_atual) == false or $pagina_atual < 0){
$pagina_atual = 0; // zera contadores de pagina
$pagina_numero = 0; // zera contadores de pagina
};
$query_limite_inicio = $pagina_numero * $tamanho_limite_busca_inteligente_query; // inicio de query
$query_limite_fim = $tamanho_limite_busca_inteligente_query; // fim de query
$condicao_limite = "LIMIT $query_limite_inicio, $query_limite_fim"; // condicao de limite
$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa
$numero_termos_pesquisa = count($array_termos_pesquisa); // numero de termos de pesquisa
$contador_termos_pesquisa = 1; // contador de termos de pesquisa
if(retorne_modo_pesquisa() == 1){
$campos_tabela_pesquisar[0] .= "host_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or url_pagina like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or titulo_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or keywords_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or description_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or links_internos_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or links_externos_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or conteudo_site like '%$termo_pesquisa%' "; // campos de pesquisa
}else{
$campos_tabela_pesquisar[0] .= "host_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or url_pagina like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or titulo_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or keywords_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or description_site like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or imagens_site_geral like '%$termo_pesquisa%' "; // campos de pesquisa
$campos_tabela_pesquisar[0] .= "or conteudo_site like '%$termo_pesquisa%' "; // campos de pesquisa
};
if(retorne_modo_pesquisa() == 1){
$campos_tabela_pesquisar[1] .= "links_internos_site like '%$termo_pesquisa%' "; // campos de pesquisa
}else{
$campos_tabela_pesquisar[1] .= "imagens_site_geral like '%$termo_pesquisa%' "; // campos de pesquisa
};
if($numero_termos_pesquisa == 1){
if(retorne_busca_exata() == 1){
$campos_pesquisa = $campos_tabela_pesquisar[1]; // exata
}else{
$campos_pesquisa = $campos_tabela_pesquisar[0]; // todos
};
}else{
foreach($array_termos_pesquisa as $termo_pesquisa_array){
if($termo_pesquisa_array != null){
if(retorne_busca_exata() == 1){
if(retorne_modo_pesquisa() == 1){
if($contador_termos_pesquisa == 1){
$contador_termos_pesquisa++; // atualiza contador
$campos_pesquisa = " links_internos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
}else{
$campos_pesquisa .= "or links_internos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
};
}else{
if($contador_termos_pesquisa == 1){
$contador_termos_pesquisa++; // atualiza contador
$campos_pesquisa = " imagens_site_geral like '%$termo_pesquisa_array%' "; // campos de pesquisa
}else{
$campos_pesquisa .= "or imagens_site_geral like '%$termo_pesquisa_array%' "; // campos de pesquisa
};
};
}else{
if(retorne_modo_pesquisa() == 1){
if($contador_termos_pesquisa == 1){
$contador_termos_pesquisa++; // atualiza contador
$une_tabelas = "or "; // codigo unir tabelas
}else{
$une_tabelas = null; // codigo unir tabelas
};
$campos_pesquisa .= "host_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or url_pagina like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or titulo_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or keywords_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or description_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or links_internos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or links_externos_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or conteudo_site like '%$termo_pesquisa_array%' $une_tabelas"; // campos de pesquisa
}else{
if($contador_termos_pesquisa == 1){
$contador_termos_pesquisa++; // atualiza contador
$une_tabelas = "or "; // codigo unir tabelas
}else{
$une_tabelas = null; // codigo unir tabelas
};
$campos_pesquisa .= "host_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or url_pagina like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or titulo_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or keywords_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or description_site like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or imagens_site_geral like '%$termo_pesquisa_array%' "; // campos de pesquisa
$campos_pesquisa .= "or conteudo_site like '%$termo_pesquisa_array%' $une_tabelas"; // campos de pesquisa
};
};
};
};
};
$querys_retorno[0] = "select *from $tabela where $campos_pesquisa $condicao_limite;"; // limite
$querys_retorno[1] = "select *from $tabela where $campos_pesquisa;"; // completa
return $querys_retorno; // retorno
};
function retorna_texto_contem_palavra_chave($conteudo_site, $termo_pesquisa){
$conteudo_site = remove_html($conteudo_site); // remove codigo html
$index_inicio = strpos($conteudo_site, $termo_pesquisa); // obtendo index de termo chave
$index_fim = 256; // index final
if($index_inicio != null){
$sub_conteudo = substr($conteudo_site, $index_inicio, $index_fim)."..."; // obtendo subconteudo
}else{
$sub_conteudo = null; // retorno nulo
};
$sub_conteudo = "<div class='div_termo_pesquisa_encontrado'>$sub_conteudo</div>"; // adiciona div
return $sub_conteudo; // retorno
};
function retorna_url_imagem_string($url_link){
$pattern = '/[\w\-]+\.(jpg|png|gif|jpeg)/'; // condicao
$result = preg_match($pattern, $url_link, $matches); // pegando enderecos de imagens
if($matches[0] != null){
$matches[0] = $url_link; // setando url...
};
return $matches[0]; // retorno
};
function retorne_array_site_contem_termo_pesquisa($array_termos_pesquisa, $url_link){
$host_url_link = retorna_host_url($url_link); // retorna o host da url
$titulo_link = basename($url_link); // titulo do link
$titulo_link = strtolower($titulo_link); // converte titulo para minusculo
$array_retorno = array(); // array de retorno
foreach($array_termos_pesquisa as $termo_pesquisa_array){
if(retorne_modo_pesquisa() == 2){
$url_link = retorna_url_imagem_string($url_link); // url de imagem
};
if($url_link == null){
return null; // retorno nulo
};
if(retorne_busca_exata() == 1){
if(strpos($url_link, $termo_pesquisa_array) == true){
$array_retorno[0] = true; // retorno verdadeiro
$array_retorno[1] = $url_link; // endereco de link
break; // parando foreach
}else{
$array_retorno[0] = false; // retorno falso
$array_retorno[1] = $url_link; // sem link
break; // parando foreach
};
}else{
if(strpos($url_link, $termo_pesquisa_array) == true or strpos($url_link, $termo_pesquisa_array) == false){
$array_retorno[0] = false; // retorno verdadeiro
$array_retorno[1] = $url_link; // endereco de link
break; // parando foreach
};
};
};
return $array_retorno; // retorna array 
};
function retorne_array_termos_pesquisa($termo_pesquisa){
$array_termos_pesquisa = explode(" ", $termo_pesquisa); // criando array
return $array_termos_pesquisa; // retorno com array
};
function retorne_busca_exata(){
$busca_exata = remove_html($_GET['busca_exata']); // busca exata
if($busca_exata == null or is_numeric($busca_exata) == false){
$busca_exata = 1; // busca exata padrao
};
return $busca_exata; // retorno
};
function retorne_modo_pesquisa(){
$modo_pesquisa = remove_html($_GET['modo_pesquisa']); // modo de pesquisa
if($modo_pesquisa == null or is_numeric($modo_pesquisa) == false){
$modo_pesquisa = 1; // padrao busca por links
};
return $modo_pesquisa; // retorna o modo de pesquisa
};
function retorne_numero_registros_tabela($query){
$comando = comando_executa($query); // comando
return mysql_num_rows($comando); // numero de linhas
};
function retorne_primeiro_link_array_pesquisa_inteligente($lista_links, $termo_pesquisa, $host_site){
global $separador_dados_tabela; // separador de dados na tabela
$busca_exata = retorne_busca_exata(); // busca exata
$link_retorno = null; // link de retorno
$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa
$array_links = explode($separador_dados_tabela, $lista_links); // cria array de links
$array_links = array_unique($array_links); // remove duplicatas se houver
if($busca_exata == 1){
$procurar_ocorrencia_termo = true; // busca exata
}else{
$procurar_ocorrencia_termo = false; // busca nao exata
};
foreach($array_links as $url_link){
$host_url_link = retorna_host_url($url_link); // retorna o host da url
if($host_url_link == $host_site){
$resposta_array_contem_link = retorne_array_site_contem_termo_pesquisa($array_termos_pesquisa, $url_link); // resposta se o array contem o primeiro link
$termo_encontrado_resposta = $resposta_array_contem_link[0]; // termo encontrado dentro de array de links
}else{
$termo_encontrado_resposta = false; // termo nao encontrado
};
if($termo_encontrado_resposta == $procurar_ocorrencia_termo){
$link_retorno = $url_link; // link de retorno
break; // parando laco foreach
};
};
return $link_retorno; // retorno com link
};
function retorne_servidor_online($endereco_servidor){
global $porta_padrao_conexao_servidor_inteligente; // porta de conexao
$porta = $porta_padrao_conexao_servidor_inteligente; // porta de acesso
$status = array(false, true); // status
$conexao_remota = @fsockopen($endereco_servidor, $porta, $errno, $errstr, 2); // verifica
if(!$conexao_remota){
return $status[0]; // retorno
}else{ 
return $status[1]; // retorno
};
};
function separa_imagens_busca($imagens_site_geral, $host_site){
global $separador_dados_tabela; // separador de dados em tabela
global $numero_maximo_imagens_host_busca_inteligente; // numero maximo de imagens a exibir por host de pesquisa no modo imagens
$busca_exata = retorne_busca_exata(); // busca exata
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$array_termos_pesquisa = retorne_array_termos_pesquisa($termo_pesquisa); // array com termos de pesquisa
$array_imagens = explode($separador_dados_tabela, $imagens_site_geral); // array de dados de imagens
$array_imagens = array_unique($array_imagens); // removendo duplicatas
$contador = 0; // contador de resultados encontrados
if($busca_exata == 1){
$procurar_ocorrencia_termo = true; // busca exata
}else{
$procurar_ocorrencia_termo = false; // busca nao exata
};
foreach($array_imagens as $url_imagem){
$host_imagem = retorna_host_url($url_imagem); // host de imagem
if($host_imagem == null){
$url_imagem = "http://".$host_site."/".$url_imagem; // completa url de imagem em caso de host nulo
};
$titulo_imagem = basename($url_imagem); // titulo da imagem
if($host_imagem != null){
$imagem_encontrada .= "<a href='$url_imagem' target='_blank'>"; // imagem encontrada
$imagem_encontrada .= "<img class='imagem_resposta_busca_inteligente' src='$url_imagem' alt='$titulo_imagem' title='$titulo_imagem'>"; // imagem encontrada
$imagem_encontrada .= "</a>"; // imagem encontrada
};
$titulo_imagem = strtolower($titulo_imagem); // converte titulo de imagem para minusculo
$termo_encontrado_resposta = retorne_array_site_contem_termo_pesquisa($array_termos_pesquisa, $url_imagem); // termo encontrado dentro de array de links
$termo_encontrado_resposta = $termo_encontrado_resposta[0]; // verifica se encontrou o link da imagem
if($termo_encontrado_resposta == $procurar_ocorrencia_termo){
$imagem_completa .= $imagem_encontrada; // imagem completa
$contador++; // atualiza o contador
if($contador >= $numero_maximo_imagens_host_busca_inteligente){
return $imagem_completa; // retorno
};
};
$imagem_encontrada = null; // limpando
};
return $imagem_completa; // retorno
};
function termo_pesquisa_get(){
$termo_pesquisa = $_GET['termo_pesquisa']; // termo de pesquisa
$termo_pesquisa = remove_html($termo_pesquisa); // remove html
$termo_pesquisa = strtolower($termo_pesquisa); // converte para minusculo
return $termo_pesquisa; // retorno
};
function barra_pesquisa_pagina_inicial(){
global $nome_do_sistema; // nome do sistema
$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa
global $opcoes_busca_site; // opcoes de busca
global $imagem_de_logotipo_meio; // imagem de logotipo do meio
global $endereco_url_site_global; // enderecos urls
$link_adicionar_site = "<a href='$endereco_url_site_global[7]' title='Seu site aqui'>Seu site aqui</a>"; // link adicionar site
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
switch($modo_pesquisa){
case 1:
$pesquisa_selecionada[$modo_pesquisa] = "selected"; // modo de pesquisa
break;
case 2:
$pesquisa_selecionada[$modo_pesquisa] = "selected"; // modo de pesquisa
break;
case 3:
$pesquisa_selecionada[$modo_pesquisa] = "selected"; // modo de pesquisa
break;
};
$select_modo_pesquisa .= "<select class='modo_pesquisa' name='modo_pesquisa'>"; // select de modo de pesquisa
$select_modo_pesquisa .= "<option value='1' $pesquisa_selecionada[1]>$opcoes_busca_site[1]</option>"; // select de modo de pesquisa
$select_modo_pesquisa .= "<option value='2' $pesquisa_selecionada[2]>$opcoes_busca_site[2]</option>"; // select de modo de pesquisa
$select_modo_pesquisa .= "<option value='3' $pesquisa_selecionada[3]>$opcoes_busca_site[3]</option>"; // select de modo de pesquisa
$select_modo_pesquisa .= "</select>"; // select de modo de pesquisa
$barra_pesquisa .= "<div id='div_pesquisa_pagina_inicial'>"; // barra de pesquisa
$barra_pesquisa .= "<form action='index.php' method='get'>"; // barra de pesquisa
$barra_pesquisa .= $imagem_de_logotipo_meio; // barra de pesquisa
$barra_pesquisa .= "<br>"; // barra de pesquisa
$barra_pesquisa .= "<input type='text' name='termo_pesquisa' id='barra_pesquisa_pagina_inicial' value='$termo_pesquisa' placeholder='Tablet, celular, computador' class='form-control'>"; // barra de pesquisa
$barra_pesquisa .= "<br>"; // barra de pesquisa
$barra_pesquisa .= "<input type='submit' class='btn btn-primary' value='Pesquisar'>"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "<input type='button' class='btn btn-default' value='Limpar' onclick='limpar_caixa_busca_pesquisa();'>"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= $select_modo_pesquisa; // barra de pesquisa
$barra_pesquisa .= campo_select_muda_tipo_busca(); // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= "&nbsp;"; // barra de pesquisa
$barra_pesquisa .= $link_adicionar_site; // barra de pesquisa
$barra_pesquisa .= "<input type='hidden' value='0' name='pagina_numero'>"; // barra de pesquisa
$barra_pesquisa .= "<input type='hidden' value='1' name='busca_exata'>"; // barra de pesquisa
$barra_pesquisa .= "</form>"; // barra de pesquisa
$barra_pesquisa .= "</div>"; // barra de pesquisa
return $barra_pesquisa; // retorno
};
function barra_rodape_pagina_inicial(){
global $nome_do_sistema; // nome do sistema
global $url_do_servidor; // url de servidor
global $imagem_de_logotipo; // imagem de logotipo
global $endereco_url_site_global; // enderecos urls de sites
global $endereco_url_arquivos_extras; // url de arquivos extras
$barra_rodape .= "<div id='div_barra_rodape_pagina_inicial'>"; // barra de rodape de pagina inicial
$barra_rodape .= $imagem_de_logotipo; // barra de rodape de pagina inicial
$barra_rodape .= "<br>"; // barra de rodape de pagina inicial
$barra_rodape .= "<br>"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$url_do_servidor' title='$nome_do_sistema'>$nome_do_sistema</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_site_global[2]' title='Sobre'>Sobre $nome_do_sistema</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_site_global[3]' title='Termos e privacidade'>Termos e privacidade</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_site_global[1]' title='Investidores'>Investidores</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "-"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "&nbsp;"; // barra de rodape de pagina inicial
$barra_rodape .= "<a href='$endereco_url_arquivos_extras[2]' title='AJuda'>Ajuda</a>"; // barra de rodape de pagina inicial
$barra_rodape .= "</div>"; // barra de rodape de pagina inicial
return $barra_rodape; // retorno
};
function barra_topo_pagina_inicial(){
global $url_do_servidor; // url de servidor
global $url_servico_externo; // urls de servicos
global $endereco_url_site_global; // endereco de urls de site interno
$links[0] = "<a href='$url_servico_externo[0]' title='' class='classe_links_topo'>Dinngle</a>"; // link
$links[1] = "<a href='$endereco_url_site_global[6]' title='Navegador Internet Globe' class='classe_links_topo'>Internet Globe</a>"; // link
$links[2] = "<a href='$url_do_servidor?modo_pesquisa=2' title='' class='classe_links_topo'>Imagens</a>"; // link
$links[3] = "<a href='' title='' class='classe_links_topo'></a>"; // link
$links[4] = "<a href='' title='' class='classe_links_topo'></a>"; // link
$barra_topo .= "<div id='div_barra_topo_pagina_inicial'>"; // barra do topo
$barra_topo .= $links[0]; // barra do topo
$barra_topo .= $links[1]; // barra do topo
$barra_topo .= $links[2]; // barra do topo
$barra_topo .= $links[3]; // barra do topo
$barra_topo .= $links[4]; // barra do topo
$barra_topo .= "</div>"; // barra do topo
return $barra_topo; // retorno
};
function monta_pagina_basica($conteudo_pagina){
global $nome_do_sistema; // nome do sistema
global $descricao_basica_site_meta_tag; // descricao do site
global $nome_desenvolvedor_projeto; // nome do desenvolvedor
global $tags_site; // tags do site
global $endereco_url_arquivos; // endereco url de arquivos
$titulo_pagina = $nome_do_sistema; // titulo da pagina
$codigo_html_pagina .= "<html>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<head>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta charset='UTF-8'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='description' content='$descricao_basica_site_meta_tag'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='author' content='$nome_desenvolvedor_projeto'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='keywords' content='$tags_site'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<link rel='stylesheet' type='text/css' href='$endereco_url_arquivos[3]'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<link rel='stylesheet' type='text/css' href='$endereco_url_arquivos[1]'>"; // codigo html da pagina inicial
$codigo_html_pagina .= ""; // codigo html da pagina inicial
$codigo_html_pagina .= ""; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='viewport' content='width=device-width'/>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<title>"; // codigo html da pagina inicial
$codigo_html_pagina .= $titulo_pagina; // codigo html da pagina inicial
$codigo_html_pagina .= "</title>"; // codigo html da pagina inicial
$codigo_html_pagina .= "</head>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<body>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<div class='div_corpo_pagina'>"; // codigo html da pagina
$codigo_html_pagina .= barra_topo_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= "<div id='div_painel_principal_pagina_inicial'>"; // codigo html da pagina inicial
$codigo_html_pagina .= $conteudo_pagina; // codigo html da pagina inicial
$codigo_html_pagina .= "</div>"; // codigo html da pagina inicial
$codigo_html_pagina .= barra_rodape_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= "</div>"; // codigo html da pagina
$codigo_html_pagina .= "</body>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<script type='text/javascript' src='$endereco_url_arquivos[0]'></script>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<script type='text/javascript' src='$endereco_url_arquivos[2]'></script>"; // codigo html da pagina inicial
$codigo_html_pagina .= "</html>"; // codigo html da pagina inicial
return $codigo_html_pagina; // retorno
};
function monta_pagina_inicial(){
$modo_pesquisa = retorne_modo_pesquisa(); // modo de pesquisa
$pagina_numero = pagina_atual_get(); // pagina atual
$busca_exata = retorne_busca_exata(); // busca exata
global $nome_do_sistema; // nome do sistema
global $url_do_servidor; // url de servidor
global $resultados_busca_termos; // resultados de pesquisa
global $opcoes_busca_site; // opcoes de busca
global $descricao_basica_site_meta_tag; // descricao do site
global $nome_desenvolvedor_projeto; // nome do desenvolvedor
global $tags_site; // tags do site
global $endereco_url_arquivos; // endereco url de arquivos
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$titulo_pagina = $nome_do_sistema; // titulo da pagina
$url_pesquisa_completa[1] = "index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=1&busca_exata=$busca_exata"; // url de pesquisa completa
$url_pesquisa_completa[2] = "index.php?termo_pesquisa=$termo_pesquisa&modo_pesquisa=2&busca_exata=$busca_exata"; // url de pesquisa completa
if($termo_pesquisa != null){
$pesquisa_atual .= "<div class='div_modos_pesquisa'>"; // pesquisa atual
$pesquisa_atual .= "<a href='$url_pesquisa_completa[1]' class='classe_links_opcoes_busca' title='Web'>$opcoes_busca_site[1]</a>"; // pesquisa atual
$pesquisa_atual .= "<a href='$url_pesquisa_completa[2]' class='classe_links_opcoes_busca' title='Imagens'>$opcoes_busca_site[2]</a>"; // pesquisa atual
$pesquisa_atual .= "</div>"; // pesquisa atual
$pesquisa_atual .= "<br>"; // pesquisa atual
$pesquisa_atual .= "<div class='div_termo_pesquisa_atual'>"; // pesquisa atual
$pesquisa_atual .= "Pesquisando por "; // pesquisa atual
$pesquisa_atual .= "<a href='$url_pesquisa_completa[1]' title='$termo_pesquisa'>"; // pesquisa atual
$pesquisa_atual .= "<b>"; // pesquisa atual
$pesquisa_atual .= $termo_pesquisa; // pesquisa atual
$pesquisa_atual .= "</b>"; // pesquisa atual
$pesquisa_atual .= "</a>"; // pesquisa atual
$pesquisa_atual .= "</div>"; // pesquisa atual
$pesquisa_atual .= $resultados_busca_termos; // pesquisa atual
};
$codigo_html_pagina .= "<html>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<head>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta charset='UTF-8'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='description' content='$descricao_basica_site_meta_tag'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='author' content='$nome_desenvolvedor_projeto'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='keywords' content='$tags_site'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<link rel='stylesheet' type='text/css' href='$endereco_url_arquivos[3]'>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<link rel='stylesheet' type='text/css' href='$endereco_url_arquivos[1]'>"; // codigo html da pagina inicial
$codigo_html_pagina .= ""; // codigo html da pagina inicial
$codigo_html_pagina .= ""; // codigo html da pagina inicial
$codigo_html_pagina .= "<meta name='viewport' content='width=device-width'/>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<title>"; // codigo html da pagina inicial
$codigo_html_pagina .= $titulo_pagina; // codigo html da pagina inicial
$codigo_html_pagina .= "</title>"; // codigo html da pagina inicial
$codigo_html_pagina .= "</head>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<body>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<div class='div_corpo_pagina'>"; // codigo html da pagina
$codigo_html_pagina .= barra_topo_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= "<div id='div_painel_principal_pagina_inicial'>"; // codigo html da pagina inicial
$codigo_html_pagina .= barra_pesquisa_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= $pesquisa_atual; // codigo html da pagina inicial
$codigo_html_pagina .= "</div>"; // codigo html da pagina inicial
$codigo_html_pagina .= barra_rodape_pagina_inicial(); // codigo html da pagina inicial
$codigo_html_pagina .= "</div>"; // codigo html da pagina
$codigo_html_pagina .= "</body>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<script type='text/javascript' src='$endereco_url_arquivos[0]'></script>"; // codigo html da pagina inicial
$codigo_html_pagina .= "<script type='text/javascript' src='$endereco_url_arquivos[2]'></script>"; // codigo html da pagina inicial
$codigo_html_pagina .= "</html>"; // codigo html da pagina inicial
return $codigo_html_pagina; // retorno
};
function carrega_hosts_remover(){
$codigo_html_bruto = monta_lista_hosts_remover(); // codigo html bruto
$codigo_html_bruto = div_especial_basica_campos($codigo_html_bruto); // adiciona div especial
return $codigo_html_bruto; // retorno
};
function monta_lista_hosts_remover(){
global $tabela_dados; // tabela de banco de dados
$limit_query = limit_query_geral_sem_id(); // limit de query
$termo_pesquisa = termo_pesquisa_get(); // termo de pesquisa
$query[0] = "select *from $tabela_dados[0] where host_site like '%$termo_pesquisa%' $limit_query;"; // query
$query[1] = "select *from $tabela_dados[0] where host_site like '%$termo_pesquisa%';"; // query
$comando = comando_executa($query[0]); // comando
$numero_linhas = retorne_numero_linhas_comando($comando); // numero de linhas
$contador = 0; // contador
for($contador == $contador; $contador <= $numero_linhas; $contador++){
$dados = mysql_fetch_array($comando, MYSQL_ASSOC); // dados
$host_site = $dados['host_site']; // host de site
if($host_site != null){
$campo_host .= "Host:"; // campo de host
$campo_host .= "&nbsp;"; // campo de host
$campo_host .= "<a href='http://$host_site' target='_blank'>$host_site</a>"; // campo de host
$campo_host .= "<br>"; // campo de host
$campo_host .= "<input type='button' value='Excluir' onclick='exclui_host_site($contador);' class='btn btn-danger btn-xs'>"; // campo de host
$campo_host .= "<input type='hidden' id='host_site_excluir_$contador' value='$host_site'>"; // campo de host
$campo_host .= "<br>"; // campo de host
$campo_host = div_especial_basica_campos($campo_host); // adiciona div especial
$lista_hosts .= $campo_host; // atualiza lista de hosts
$campo_host = null; // limpa campo de host
};
};
$numero_resultados = retorne_numero_linhas_query($query[1]);
$formulario_pesquisa .= "Pesquise por um host a ser removido."; // formulario de pesquisa
$formulario_pesquisa .= "<br>"; // formulario de pesquisa
$formulario_pesquisa .= "<form action='index.php' method='get'>"; // formulario de pesquisa
$formulario_pesquisa .= "<input type='text' name='termo_pesquisa' value='$termo_pesquisa'>"; // formulario de pesquisa
$formulario_pesquisa .= "<br>"; // formulario de pesquisa
$formulario_pesquisa .= "<input type='submit' value='Pesquisar' class='btn btn-primary'>"; // formulario de pesquisa
$formulario_pesquisa .= "&nbsp;"; // formulario de pesquisa
$formulario_pesquisa .= "<a href='index.php' class='btn btn-success'>Nova pesquisa</a>"; // formulario de pesquisa
$formulario_pesquisa .= "</form>"; // formulario de pesquisa
$formulario_pesquisa = div_especial_basica_campos($formulario_pesquisa); // adiciona div especial
$codigo_html_bruto .= $formulario_pesquisa; // codigo html bruto
$codigo_html_bruto .= campo_select_altera_banco_dados(); // codigo html bruto
$codigo_html_bruto .= $lista_hosts; // codigo html bruto
$codigo_html_bruto .= "<br>"; // codigo html bruto
$codigo_html_bruto .= proximas_paginas_busca_inteligente($numero_resultados); // codigo html bruto
$titulo = "Hosts a serem removidos"; // titulo
$codigo_html_bruto = constroe_div_especial_geral($titulo, $codigo_html_bruto, null); // adiciona div especial
return $codigo_html_bruto; // retorno
};
function remove_host(){
global $tabela_dados; // tabela de banco de dados
$nome_banco  = mudar_banco_dados(null); // nome do banco de dados indexados
conecta_banco_dados($nome_banco); // conecta ao banco de dados
$host_site = remove_html($_POST['host_site']); // host de site
$query = "delete from $tabela_dados[0] where host_site='$host_site';"; // query
comando_executa($query); // executa query
};
?>