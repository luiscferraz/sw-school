/* Arquivo criado para armazenar a fun��o de busca cep do javascrip 

	- Necessario importar a biblioteca AJAX(abaixo) na pagina onde essa fun��o for usada
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	
	Autor: Daniel Henrique
*/

function getEndereco() {
	// Se o campo CEP n�o estiver vazio
	if($.trim($("#zip_code").val()) != ""){
	
	$("#ajax-loading").css('display','inline');
	/*
	Para conectar no servi�o e executar o json, precisamos usar a fun��o
	getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
	dataTypes n�o possibilitam esta intera��o entre dom�nios diferentes
	Estou chamando a url do servi�o passando o par�metro "formato=javascript" e o CEP digitado no formul�rio
	http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
	*/
	$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#zip_code").val(), function(){
	// o getScript d� um eval no script, ent�o � s� ler!
	//Se o resultado for igual a 1
	
	if (resultadoCEP["tipo_logradouro"] != '') {
		if (resultadoCEP["resultado"]) {
		// troca o valor dos elementos
			$("#address").val(unescape(resultadoCEP["tipo_logradouro"]) + " " + unescape(resultadoCEP["logradouro"]));
			$("#neighborhood").val(unescape(resultadoCEP["bairro"]));
			$("#city").val(unescape(resultadoCEP["cidade"]));
			$("#state").val(unescape(resultadoCEP["uf"]));
			$("#numero").focus();
			}
		}
		else{
			alert("Cep inexistente.")
			$("#address").val("");
			$("#neighborhood").val("");
			$("#city").val("");
			$("#state").val("opcao-marcada");
			}
		$("#ajax-loading").hide();
	});
	}
}