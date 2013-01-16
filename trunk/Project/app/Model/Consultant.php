<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class Consultant extends AppModel{
 	public $name = 'Consultant';
 	var $hasOne = array('Address');
 	public $validate = array(
    'cpf' => array(
        'rule'    => 'isUnique',
        'message' => 'CPF ja existe'
    )
);
 }
?>
