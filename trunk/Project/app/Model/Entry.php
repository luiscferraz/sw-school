<?php

class Entry extends AppModel{
	
	public $name = 'Entry';
	public $useTable = 'entries';
	var $belongsTo = array('Activity');   //Vários apontamentos para uma atividade

    
}
?>