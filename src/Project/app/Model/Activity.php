<?php

	class Activity extends AppModel{
		
		public $name = 'Activity';
		public $useTable = 'activities';
		var $belongsTo = array('Project');   //Várias atividades pertencem a um projeto
		public $hasMany = array('Entry','Attachment'); //Uma atividade pode ter vários apontamentos e anexos
	   	public $hasAndBelongsToMany = array('Consultant'); //Uma atividade pode ser executada por vários
	   													  //consultores, e um consultor pode executar
	   		
	   													  //várias atividades
	   	public $validate = array(
	    	'start_hours' => '/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/i',
	    	'end_hours' => '/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/i'	
		);
	}
?>