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

    $('.days').dblclick(function(){
        var id = $(this).attr('id');
        $(this).html('<input type="text" id="save-calendar" style="width:100%"/>');
         /* ao pressionar uma tecla em um campo que seja de class="pula" */
        $(this).keypress(function(e){
            /*
             * verifica se o evento é Keycode (para IE e outros browsers)
             * se não for pega o evento Which (Firefox)
            */
            var tecla = (e.keyCode?e.keyCode:e.which);
            var consult =  $("#save-calendar").val();

            if ( tecla == 13) {
                $.get("entries/AjaxSalvar",{consultor: consult , info : id },
                    function(data) {   
                        if (data) {
                            location.reload();
                        }
                        else {
                            alert( 'Não foi possivel salvar !' );
                            location.reload();
                        }
                });
            }
        });
    })

		
});