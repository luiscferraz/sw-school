<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class ProjectConsultant extends AppModel{
 	public $name = 'ProjectConsultant';
 	var $useTable = 'project_consultants';
	var $belongsTo = array('Project', 'Consultant');
 }
?>
