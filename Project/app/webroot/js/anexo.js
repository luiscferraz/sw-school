$('document').ready(function(){
	
	$('.edit').live('click',function(e){
		$(this).html(createInput($(this).parent('p').html()));
		$('.edit p').show();
		$('.edit textarea').hide();
		$(this).children('p').hide();
		$(this).children('textarea').show();
		$(this).children('textarea').focus();
	});
	$('.edit textarea').keyup(function(){
			var hr = $(this).val();
			$(this).siblings('p').html(hr);
		})


})



function createInput(html){
	html ='<textarea> '+html+' </textarea>'
	return html;
}



//gif para carregamento ajax
$(document).ajaxStart(function() {
	   $('body').append('<img src="'+limparUrl('img/loading.gif')+'" class="load">');
});


function limparUrl(pag){
	var url = window.location.toString();
	n =  url.search('attachments');
	url = url.slice(0,n);
	return url+'/'+pag;
	
}

function ListAttachments(key){
	$.get(urlAjax('AjaxListFiles'),null,
			function(data) {
				//alert(data)   ;
				$.fancybox(data);
				$('.load').remove();
		})
}

//evitar erros de url ajax
function urlAjax(pag){
	var url = window.location.toString();
	
	if (url.search('add') != '-1'){
		url = url.replace('add',pag);
	}
	else if(url.search('edit') != '-1'){
		url = url.replace('edit',pag);
	}
	else {
		url = url.replace('alocados',pag);
	}
	
	return url;
}


 