<?php

class Entry extends AppModel{
	
	public $name = 'Entry';
	public $useTable = 'entries';
	var $belongsTo = array('Activity','Consultant');   //V�rios apontamentos para uma atividade
	

    
}
?>