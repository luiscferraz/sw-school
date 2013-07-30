$(document).ready(function(){

$(".slidingDiv").hide();
$('.show').click(function(){
var id = $(this).attr('id');
$(".slidingDiv").hide();
$("#div_"+id).slideToggle();
});

});
$(document).ready(function() {
/*
* Simple image gallery. Uses default settings
*/
$('.fancybox').fancybox({'frameWidth' : 600, 'autoDimensions' : false, 'width' : 600});
$.fancybox.update()
});



$('document').ready(function(){

	//$('#tabela_agenda td').dblclick(function(){
	//	$('#tabela_agenda td input').remove();
	//	$(this).html('<input type="text" style="width: 12px;">')});

    $( "#data-agenda" ).datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true,
    										showOtherMonths: true,
    										selectOtherMonths: true, 
    										dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'], 
    										dayNamesMin: ['D','S','T','Q','Q','S','S','D'],	
    										dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'], 
    										monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'], 
    										monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    								});


    $('.days').tipsy();

    $('.days').dblclick(function () {
        var conteudoOriginal = $(this).text();
        var string = $(this).attr("id");
        $(this).addClass("celulaEmEdicao");
        $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
        $(this).children().first().focus();		
        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var novoConteudo = $(this).val();
                if (novoConteudo == '') {
                    novoConteudo = 'NULO';
                };
				string = string+'.'+novoConteudo;							
                //$(this).parent().text(novoConteudo);				
                $(this).parent().removeClass("celulaEmEdicao");				
				string = string.replace("/", "-");
				string = string.replace("/", "-");				
				tratar_string(string);	
            }
        });
         
    $(this).children().first().blur(function(){	
        $(this).parent().text(conteudoOriginal);
        $(this).parent().removeClass("celulaEmEdicao");
    });	
    });

 function tratar_string(string){
		var url = window.location.toString();
		url = limparUrlHome(url);
        $.ajax({
            async: false,
            url: url+"Home/edition_agenda/"+string, //URL que puxa os dados
            dataType: "json", //Tipo de Retorno
            success: function(json){ //Se ocorrer tudo certo                      
			     mensagem = json.mensagem;
			     if (mensagem != 'ok'){
				    alert(mensagem);
			     }
            }      
        });
        //location.reload();
        $('#botao-aplicar-data').click();
        
        }
		
function limparUrlHome(url){
        n =  url.search('home');
        url = url.slice(0,n);
        return url;
}


		
});

function listConsultores (){
		var url = window.location.toString();
		url = limparUrlHome2(url);
		$.get(url+'Home/AjaxListConsultants',null,
				function(data) {   
					$.fancybox(data);
					$('.load').remove();
			})
}

function ListConsultorNome(key){
	var name =  $(key).val();
	if (name != '') {
		var url = window.location.toString();
		url = limparUrlHome2(url);
		$.get(url+"Home/AjaxListConsultantNome/"+name,null,
				function(data) {   
					$('#tabela-pesquisa').html(data);
					$('.load').remove();
			});
	}
}


function limparUrlHome2(url){
        n =  url.search('home');
        url = url.slice(0,n);
        return url;
}
