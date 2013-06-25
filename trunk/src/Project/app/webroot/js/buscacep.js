/* Arquivo criado para armazenar a função de busca cep do javascrip 

	- Necessario importar a biblioteca AJAX(abaixo) na pagina onde essa função for usada
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	
	Autor: Daniel Henrique
*/

function getEndereco() {
	// Se o campo CEP não estiver vazio
	if($.trim($("#zip_code").val()) != ""){
	
	$("#ajax-loading").css('display','inline');
	/*
	Para conectar no serviço e executar o json, precisamos usar a função
	getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
	dataTypes não possibilitam esta interação entre domínios diferentes
	Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
	http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
	*/
	$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#zip_code").val(), function(){
	// o getScript dá um eval no script, então é só ler!
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