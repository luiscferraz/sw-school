<?php
/*
 * Created on 08/01/2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class Project extends AppModel{
	public $name = 'Project';
	public $belongsTo = array(
		'Company'=> array(
			'className' => 'Company',
	         'fields' => array('id', 'name'),
	         'conditions' => array(),         
	         'dependent' => true
		));
	
 }
?>
