
// funcao visualiza imagem upload ---------------------------------

function visualizar_imagens_upload_postagem(evt) {

var files = evt.target.files; // FileList object
for (var i = 0, f; f = files[i]; i++) {
if (!f.type.match('image.*')) {
continue;
}
var reader = new FileReader();
reader.onload = (function(theFile) {
return function(e) {
var span = document.createElement('span');
span.innerHTML = ['<img class="imagem_miniatura_iniciar_publicacao_post" src="', e.target.result, '"/>'].join('');
document.getElementById('output_imagens_upload_publicacao').insertBefore(span, null);
};
})(f);
reader.readAsDataURL(f);
}

};

// -------------------------------------------------------------------------------


// avalia se elemento existe ----------------------------------------

if(document.getElementById('campo_file_upload_postagem') != null){

document.getElementById('campo_file_upload_postagem').addEventListener('change', visualizar_imagens_upload_postagem, false);

};

// ----------------------------------------------------------------------------

