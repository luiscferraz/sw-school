$(document).ready(function() {


    var $calendar = $('#calendar');
    var id = 10;

    $calendar.weekCalendar({
	displayOddEven:true,
	timeslotsPerHour : 2,
	allowCalEventOverlap : true,
	overlapEventsSeparate: true,
	firstDayOfWeek : 0,
	timeslotHeight: 25,
	hourLine: true,
	businessHours :{
	    start: 8,
	    end: 18,
	    limitDisplay: true
	},
	daysToShow : 14,
	switchDisplay: {
	    '1 semana': 7,
	    '2 semanas': 14,
	    '3 semanas': 21,
	    '4 semanas': 28
	},
	buttonText: {
	    today: 'hoje',
	    lastWeek: 'anterior',
	    nextWeek: 'próximo'
	},

	height : function($calendar) {
	    return $(window).height() - $("h1").outerHeight() - 1;
	},
	eventRender : function(calEvent, $event) {
	    $event.css({
		"backgroundColor" : calEvent.color,
		"border" : '1px solid #000'
	    });
	    $event.find(".wc-time").css({
		"backgroundColor" : calEvent.color,
		"border" : '0px'
	    });
	},
	eventHeader: function(calEvent, calendar) {
	    return calEvent.sigla;
	},
	editable : function(calEvent, $event) {
	    return (calEvent.readOnly != true) && (calEvent.start.getTime() > new Date().getTime());
	},
	draggable : function(calEvent, $event) {
	    return false;
	},
	droppable : function($weekDay) {
	    return true;
	//return new Date().getTime() > $weekDay.data('startDate').getTime();
	},
	resizable : function(calEvent, $event) {
	    return this.editable(calEvent, $event);
	},
	eventNew : function(calEvent, $event) {
	    var $dialogContent = $("#event_edit_container");
	    resetForm($dialogContent);
	    var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
	    var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
	    var titleField = $dialogContent.find("input[name='title']");
	    var bodyField = $dialogContent.find("textarea[name='body']");


	    $dialogContent.dialog({
		modal: true,
		title: "Nova Atividade",
		resizable: false,
		close: function() {
		    $dialogContent.dialog("destroy");
		    $dialogContent.hide();
		    $('#calendar').weekCalendar("removeUnsavedEvents");
		},
		buttons: {
		    salvar : function() {
			calEvent.id = id;
			id++;
			calEvent.start = new Date(startField.val());
			calEvent.end = new Date(endField.val());
			calEvent.title = titleField.val();
			calEvent.body = bodyField.val();

			$calendar.weekCalendar("removeUnsavedEvents");
			$calendar.weekCalendar("updateEvent", calEvent);
			$dialogContent.dialog("close");
		    }
		}
	    }).show();

	    $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
	    setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));

	},
	eventDrop : function(calEvent, $event) {
	},
	eventResize : function(calEvent, $event) {
	},
	eventClick : function(calEvent, $event) {

	    if (!this.editable(calEvent, $event)) {
		return;
	    }

	    var $dialogContent = $("#event_edit_container");
	    resetForm($dialogContent);
	    var startField = $dialogContent.find("select[name='start']").val(calEvent.start);
	    var endField = $dialogContent.find("select[name='end']").val(calEvent.end);
	    var titleField = $dialogContent.find("input[name='title']").val(calEvent.title);
	    var bodyField = $dialogContent.find("textarea[name='body']");
	    bodyField.val(calEvent.body);

	    $dialogContent.dialog({
		modal: true,
		title: "Editar - " + calEvent.title,
		resizable: false,
		close: function() {
		    $dialogContent.dialog("destroy");
		    $dialogContent.hide();
		    $('#calendar').weekCalendar("removeUnsavedEvents");
		},
		buttons: {
		    salvar : function() {
			calEvent.start = new Date(startField.val());
			calEvent.end = new Date(endField.val());
			calEvent.title = titleField.val();
			calEvent.body = bodyField.val();

			$calendar.weekCalendar("updateEvent", calEvent);
			$dialogContent.dialog("close");
		    },
		    deletar : function() {
			$calendar.weekCalendar("removeEvent", calEvent.id);
			$dialogContent.dialog("close");
		    }
		}
	    }).show();

	    $dialogContent.find(".date_holder").text($calendar.weekCalendar("formatDate", calEvent.start));
	    setupStartAndEndTimeFields(startField, endField, calEvent, $calendar.weekCalendar("getTimeslotTimes", calEvent.start));
	    $(window).resize().resize(); //fixes a bug in modal overlay size ??

	},
	eventMouseover : function(calEvent, $event) {
	},
	eventMouseout : function(calEvent, $event) {
	},
	noEvents : function() {

	},
	data : function(start, end, callback) {
	    var dataSource = $('#projetos').val();

	    callback(getEventData(dataSource));
	}
    });

    $('#projetos').change(function() {
	$calendar.weekCalendar('refresh');
    });

    function resetForm($dialogContent) {
	$dialogContent.find("input").val("");
	$dialogContent.find("textarea").val("");
    }

    function getEventData(dataSource) {
	var year = new Date().getFullYear();
	var month = new Date().getMonth();
	var day = new Date().getDate();

//	var eventData3 = {
//	    events : [
//	    {
//		'id':1,
//		"color":"#4325ba",
//		"sigla":"DV",
//		'start': new Date(year, month, day, 12),
//		'end': new Date(year, month, day, 13, 00),
//		'title':'Lunch with Ashley'
//	    },

//	    {
//		'id':5,
//		"color":"#432553",
//		"sigla":"MD",
//		'start': new Date(year, month, day + 1, 14),
//		'end': new Date(year, month, day + 1, 15),
//		'title':'Product kickoff'
//	    }
//	    ]
//	};
	
	//buscar a descricao de uma atividade
	descricao_atividade = ler_atividades(dataSource);
	
	//cria um(ns) evento(s) do calendario, com a descricao achada
	
	var eventData1 = {events : 
	[{
	'id':1,
	"color":"#432553",
	"sigla":"",
	'start': new Date(year, month, day + 1, 9),
	'end': new Date(year, month, day + 1, 11),
	'title':descricao_atividade}]
	};//aqui poderia continuar outro evento {id...} ou isto estar dentro de um for pra fazer varios
	//depois que montar o evento, retorna pra a tela
    return eventData1;

    }

	function ler_atividades(id_projeto){

		$.ajax({
			 async: false,
	         url: "http://localhost/Home/atividades_agenda/"+id_projeto, //URL que puxa os dados
	         dataType: "json", //Tipo de Retorno
	         success: function(json){ //Se ocorrer tudo certo   			
			 	descricao = json.descricao;		 		
	         }      
	    });
		//return descricao;
	}


    /*
    * Sets up the start and end time fields in the calendar event
    * form for editing based on the calendar event being edited
    */
    function setupStartAndEndTimeFields($startTimeField, $endTimeField, calEvent, timeslotTimes) {

	$startTimeField.empty();
	$endTimeField.empty();

	for (var i = 0; i < timeslotTimes.length; i++) {
	    var startTime = timeslotTimes[i].start;
	    var endTime = timeslotTimes[i].end;
	    var startSelected = "";
	    if (startTime.getTime() === calEvent.start.getTime()) {
		startSelected = "selected=\"selected\"";
	    }
	    var endSelected = "";
	    if (endTime.getTime() === calEvent.end.getTime()) {
		endSelected = "selected=\"selected\"";
	    }
	    $startTimeField.append("<option value=\"" + startTime + "\" " + startSelected + ">" + timeslotTimes[i].startFormatted + "</option>");
	    $endTimeField.append("<option value=\"" + endTime + "\" " + endSelected + ">" + timeslotTimes[i].endFormatted + "</option>");

	    $timestampsOfOptions.start[timeslotTimes[i].startFormatted] = startTime.getTime();
	    $timestampsOfOptions.end[timeslotTimes[i].endFormatted] = endTime.getTime();

	}
	$endTimeOptions = $endTimeField.find("option");
	$startTimeField.trigger("change");
    }

    var $endTimeField = $("select[name='end']");
    var $endTimeOptions = $endTimeField.find("option");
    var $timestampsOfOptions = {
	start:[],
	end:[]
    };

    //reduces the end time options to be only after the start time options.
    $("select[name='start']").change(function() {
	var startTime = $timestampsOfOptions.start[$(this).find(":selected").text()];
	var currentEndTime = $endTimeField.find("option:selected").val();
	$endTimeField.html(
	    $endTimeOptions.filter(function() {
		return startTime < $timestampsOfOptions.end[$(this).text()];
	    })
	    );

	var endTimeSelected = false;
	$endTimeField.find("option").each(function() {
	    if ($(this).val() === currentEndTime) {
		$(this).attr("selected", "selected");
		endTimeSelected = true;
		return false;
	    }
	});

	if (!endTimeSelected) {
	    //automatically select an end date 2 slots away.
	    $endTimeField.find("option:eq(1)").attr("selected", "selected");
	}

    });
});
