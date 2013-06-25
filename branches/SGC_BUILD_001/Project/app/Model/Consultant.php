<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class Consultant extends AppModel{
 	public $name = 'Consultant';
 	var $hasOne = array('Address', 'User');
 	var $hasMany = array('ProjectConsultant');
	//var $belongsTo = array('Project');
 	public $validate = array(
    'cpf' => array(
        'rule'    => 'isUnique',
        'message' => 'CPF ja existe.'
    ),
    'email' => array(
        'rule'    => 'isUnique',
        'message' => 'E-mail ja Cadastrado'
    )
);
 }
?>
