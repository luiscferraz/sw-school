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

		
});