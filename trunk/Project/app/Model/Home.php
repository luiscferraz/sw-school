<?php

class Home extends AppModel{
	
	public $name = 'Home';
	public $hasMany = array('Activity','Project','Consultant');

}
?>