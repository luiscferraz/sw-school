$('document').ready(function(){

$('table td').dblclick(function(){
$('table td input').remove();
        $(this).html('<input type="text" style="width: 12px;">')});
		
});