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
         'fields' => array('id', 'name', 'phone1', 'phone2','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
	  'Financial' => array(
         'className' => 'Financial',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone1','phone2','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
	  'Sepg' => array(
         'className' => 'Sepg',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'phone1','phone2','email'),
         'conditions' => array(),       
         'dependent' => true
      ),
      'BankInfoCompany' => array(
         'className' => 'BankInfoCompany',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name_bank', 'number_agency','number_account'),
         'conditions' => array(),         
         'dependent' => true
      ),
      'Owner' => array(
         'className' => 'Owner',
         'foreignKey' => 'id',
         'fields' => array('id', 'name', 'email','phone', 'date'),
         'conditions' => array(),         
         'dependent' => true
      ),
      'Contact1' => array(
         'className' => 'Contact1',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'email','function', 'telephone'),
         'conditions' => array(),         
         'dependent' => true
      ),
      'Contact2' => array(
         'className' => 'Contact2',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'email','function', 'telephone'),
         'conditions' => array(),         
         'dependent' => true
      ),
      'Contact3' => array(
         'className' => 'Contact3',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'email','function', 'telephone'),
         'conditions' => array(),         
         'dependent' => true
      ),
      'Contact4' => array(
         'className' => 'Contact4',
         'foreignKey' => 'company_id',
         'fields' => array('id', 'name', 'email','function', 'telephone'),
         'conditions' => array(),         
         'dependent' => true
      ),
   );

}

?>
