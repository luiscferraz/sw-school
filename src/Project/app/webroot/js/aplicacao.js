//Quando o documento (pagina) estiver Ready(carregado) ele chama as funções

$('document').ready(function(){


    $('.cosultant-atividade').blur(function(){
    	var selecionado = $(this).val();
    	
    	//mostrar todos os options disponiveis
    	$('.cosultant-atividade').children('option').show();
    	//esconder o option selecionado nos selects
    	$('.cosultant-atividade').children('option[value='+selecionado+']').hide();
    	//mostrar o option selecionado no select usado
    	$(this).children('option[value='+selecionado+']').show();

	    $(".cosultant-atividade").each(function() {
	    		var selecionado = $(this).val();
			    $('.cosultant-atividade').children('option[value='+selecionado+']').hide();
    			$(this).children('option[value='+selecionado+']').show();
		});
    });


	//Menu
	var flag = false;
	$('#botao_home').click(function(e){
		if (flag==false){
			$('#Menu_Home').animate({'margin-left':'-230px'});	
			flag = true;
		}
		else{
			$('#Menu_Home').animate({'margin-left':'-500px'});	
			flag =false;
		}		
	});
	$('#Menu_Home').click(function(e){
		e.stopPropagation();
	})
	$('html').click(function(){
		flag = false;
		$('#Menu_Home').animate({'margin-left':'-500px'});	
	});
	//end menu

	
	//Mascaras
	$("#cpf").mask("999.999.999-99");
	$("#phone1").mask("(99)9999-9999");
	$("#phone2").mask("(99)9999-9999");
	$("#zip_code").mask("99.999-999");
	$('#cnpj').focus();
        $("#cnpj").mask("99.999.999/9999-99");
	$("#phone_financial").mask("(99)9999-9999");
	$("#phone_sponsor").mask("(99)9999-9999");
	$("#phone_sepg").mask("(99)9999-9999");		
	$(".actvStartHour").mask("99:99");
	$(".actvEndHour").mask("99:99");
	$("#fundation").mask("99/99/9999");
	$("#Owner_data").mask("99/99/9999");
	$("#Owner_phone").mask("(99)9999-9999");
	$("#Contact_phone").mask("(99)9999-9999");
	$("#datepicker").mask("99/99/9999");
	

	
	//end mascaras

	//Buscar Endereço ao digitar o CEP
	$('#zip_code').keypress(function(){
		var cep = $(this).val();
		cep = cep.replace('-','');
		cep = cep.replace('.','');
		cep = cep.replace('_','');
		var tamanho = cep.length;
		if(tamanho == 8){
			//Função de buscar endereço pelo cep
			getEndereco();
		}
	});
	//end buscar cep

	
	 
	 
	 //Função Do campo de cor, escolhendo a cor e edicionando ao campo como background a cor e o valor hexadecimal
	 $('#acronym_color').ColorPicker({
		 	///var elemento = this;
			color: '#000001',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#acronym_color').css('backgroundColor', '#' + hex);
				$('#acronym_color').val('#'+hex);
			}
		});
	 
	 //total de horas
	 SomarHorasProjeto();
	 SomarHorasGrupoProjeto();
	 

	 //calendario no campo data na tela de atividades
	$('.datepick').each(function(){
    $(this).datepicker();
	});
	
	//Somando as horas das finanças do projeto
	var totalentrada = 0;
	$(".entrada").each(function() {
    		var selecionado = $(this).html();
		    totalentrada = totalentrada + parseInt(selecionado);
	});

	var totalsaida = 0;
	$(".saida").each(function() {
    		var selecionado = $(this).html();
		    totalsaida = totalsaida + parseInt(selecionado);
	});

	$("#total-entrada").val(totalentrada);
	$("#total-saida").val(totalsaida);
	$("#total-financas").val( totalentrada - totalsaida );

	if ((totalentrada - totalsaida) >= 0 ) {
		$("#total-financas").css('backgroundColor', '#cbffad');
	}
	else {
		$("#total-financas").css('backgroundColor', '#ff4949');
	}

	 
	
	
});

setTimeout(
		function() {
			$('.flash').fadeOut('fast');
			}, 
		4000);

//Checar se abreviação já é utilizada

function checkAcronym(src){
	d = src;
	var acronym = $(d).val();
	$.get("ajaxMsg/"+acronym,null,
		function(data) {   
			if(data == 'true'){
				d.setCustomValidity("Abreviação já utilizada");
			}
			else {
				d.setCustomValidity("");
			}
	});
};

//Somar horas do projeto
function SomarHorasProjeto(){
	 var total = 0;
	 if($('#hora_a').val() != ''){
	 total = parseInt($('#hora_a').val());
	 }
	 if($('#hora_b').val() != ''){
	 total = total + parseInt($('#hora_b').val());
	 }
	 if($('#hora_c').val() != ''){
	 total = total + parseInt($('#hora_c').val());
	 }
	 $('#total-de-horas p').html(total);
};
function SomarHorasGrupoProjeto(){
	 var total = 0;
	 if($('#hora_a_group').val() != ''){
	 total = parseInt($('#hora_a_group').val());
	 }
	 if($('#hora_b_group').val() != ''){
	 total = total + parseInt($('#hora_b_group').val());
	 }
	 if($('#hora_c_group').val() != ''){
	 total = total + parseInt($('#hora_c_group').val());
	 }
	 $('#total-de-horas-grupo p').html(total);
};


function anularConsultant(obt){
	$(obt).attr('id')
}






//Funções para Atividades.

// jQuery(document).ready(function($) {
// 	var date = new Date();
// 	//Hora final não pode ser menor que a hora inicial.
// 	$('#actvEndHour').blur(function(){
// 		var start = $('#actvStartHour').val();
// 		var end = $('#actvEndHour').val();
// 		if (start >= end ) {
// 			 $('#actvStartHour').val(' ') 
// 			 $('#actvEndHour').val(' ');
// 		}
// 	});

// 	//Se a atividade for 'Em desenvolvimento'  a data não pode ser depois do dia do cadastramento.
// 	$('#ActivitiesAddForm input').blur(function(){
// 		var status = $('#actvStatus').val();
// 		var datenow =  new Date();
// 		var datepicker = $('#datepicker').val();
// 		datenow.setFullYear( datepicker.substr(6,4), datepicker.substr(3,2), datepicker.substr(0,2));
		
// 		if( date > datenow) {
// 			alert('er');
// 		}

// 	});
// });