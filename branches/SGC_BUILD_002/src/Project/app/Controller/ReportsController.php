<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class ReportsController extends AppController {

 	public function index(){
 		$this->set('title_for_layout', 'Relatórios');
 		$this -> layout = 'base';
 		$this-> set ('tipo_usuario',$this->Auth->user('type'));
 	}
}


?>