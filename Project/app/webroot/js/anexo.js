function ListAttachments(key){
	$.get(urlAjax('AjaxListFiles'),null,
			function(data) {   
				$.fancybox(data);
				$('.load').remove();
		})
}

var input = $("input:file").css({background:"yellow", border:"3px red solid"});
    $("div").text("For this type jQuery found " + input.length + ".")
            .css("color", "red");
    $("form").submit(function () { return false; }); // so it won't submit
 