function AttachFiles(key){
	$.get(urlAjax('AjaxAttachFiles'),null,
			function(data) {   
				$.fancybox(data);
				$('.load').remove();
		})
}