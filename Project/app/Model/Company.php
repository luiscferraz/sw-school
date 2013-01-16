<?php

class Company extends AppModel {

   public $useTable = 'companies';

   //public $hasOne = 'Documento';

   public $hasOne = array(
      'Address' => array(
         'className' => 'Address',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'address', 'number','neighborhood','city','state','complement','zip_code'),
         'conditions' => array(),         
         'dependent' => true
      ),
	  'Sponsor' => array(
         'className' => 'Sponsor',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
	  'Financial' => array(
         'className' => 'Financial',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
	  'Sepg' => array(
         'className' => 'Sepg',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone','email'),
         'conditions' => array(),       
         'dependent' => true
      )
   );

}

?>
