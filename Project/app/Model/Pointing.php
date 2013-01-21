<?php

class Pointing extends AppModel{
	
	public $name = 'Pointing';
	public $useTable = 'pointings';
	var $belongsTo = array('Activity');   //Vários apontamentos para uma atividade

    
}
?>