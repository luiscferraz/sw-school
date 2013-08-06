<?php
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
    'username' => array(
        'rule'    => 'isUnique',
        'message' => 'Usuário ja Cadastrado'
    	)
    );
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

}

?>
