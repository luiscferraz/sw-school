<?php


class CompaniesController extends AppController {
	
	public $uses = 'Company';
	public $name = 'Companies';
	
	public function index(){
		$this->set('title_for_layout', 'Empresas');
		$this -> layout = 'index';
		$this->set('companies', $this->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));				
	}
	
	public function add()
  {
    $this->set('title_for_layout', 'Empresas');
    $this -> layout = 'basemodalint';
    if($this->request->is('post'))
    {
      if ($this->verific($this->request->data)) {
 	
        if($this->Company->saveAll($this->request->data))
        {
          $this->Session->setFlash($this->flashSuccess('A empresa foi adicionado.'));
          $this->redirect(array('action' => 'index'));
        }
      } 
    }
  }
	
	public function edit($id = NULL){

		$this->layout = 'base';

		$this->Company->id = $id;



		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$comp = $this->Company->findById($id);

		if (!$comp) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is('get')) {
			$this->request->data = $this->Company->read();
			}
			else {
				$this->Company->id = $id;
				if ($this->verific2($this->request->data)) {
				if ($this->Company->saveAll($this->request->data)) {
					$this->Session->setFlash($this->flashSuccess('Empresa atualizada!'));
					$this->redirect(array('action' => 'index'));
					}
				}
				}
				
	}

	
	
	public function delete($id = NULL){
		$this->Company->id = $id;
		$this->Company->saveField('removed',1);
		$this->Session->setFlash($this->flashSuccess('Empresa removida com sucesso!'));
		$this->redirect('/Companies');
	}
	

	public function view($id){
		$this->set('title_for_layout', 'Empresas');
		$this->Company->id = $id;
		$this->layout = 'basemodalint';
		$this-> set ('tipo_usuario',$this->Auth->user('type'));	
		
	    if ($this->request->is('get')) {
	        $this->set('company', $this->Company->read());
	    }
	}
	
	public function report(){
		$this->set('title_for_layout', 'Empresas');
		$this -> layout = 'index';
		$this->set('companies', $this->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));				
	}


	public function ajaxMsg($agencia=null, $conta=null, $id=null){
   		$this->layout='ajax';


   		if ($id <0){
   			$achouConta  =  $this -> Company -> query ("SELECT * FROM companies_bank_infos WHERE number_account = '".$conta."' and number_agency = '".$agencia."'");
			if (empty($achouConta)){
				$this->set('mensagem','false');
   			} 
   			else {
				$this->set('mensagem','true');
			}
   		}
   		else{
   			$achouConta = $this-> Company->query("SELECT * FROM companies_bank_infos WHERE number_account = '".$conta."' and number_agency = '".$agencia."' and id <> '".$id."'");
   			if (empty($achouConta)){
   				$this->set('mensagem', 'false');

   			}
   			else{
   				$this->set('mensagem','true');
   			}
   		}


	}

   public function verific($data){
      $ctr = 0;
      $erro ='';
      //Verificar se já existe Conta.
     
	  $achouConta  =  $this -> Company -> query ("SELECT * FROM companies_bank_infos WHERE number_account = '".$data['BankInfoCompany']['number_account']."' and number_agency = '".$data['BankInfoCompany']['number_agency']."'");
      if (empty($achouConta)){} else { $ctr++; $erro = $erro . 'Esta conta nesta agência já existe no sistema.';};
	  
	  if ($ctr > 0) {
        $this -> Session -> setFlash ($this -> flashError ($erro));
        return false;
      }
      else {
        return true;
      }
   }
	
  public function verific2($data){
      $ctr = 0;
      $erro ='';
      //Verificar se já existe Conta.
      
	  $achouConta  =  $this -> Company -> query ("SELECT * FROM companies_bank_infos WHERE id <> '". $data['BankInfoCompany']['id']."' and number_account = '".$data['BankInfoCompany']['number_account']."' and number_agency = '".$data['BankInfoCompany']['number_agency']."'");
      if (empty($achouConta)){} else { $ctr++; $erro = $erro . 'Esta conta nesta agência já existe no sistema.';};
	  
	  if ($ctr > 0) {
        $this -> Session -> setFlash ($this -> flashError ($erro));
        return false;
      }
      else {
        return true;
      }
   }
	
	
}


?>
