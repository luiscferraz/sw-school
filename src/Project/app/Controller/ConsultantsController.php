<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class ConsultantsController extends AppController {
 	public $helpers = array ('Html','Form');
 	public $name = 'Consultants';
 	var $scaffold;
 	
 	
 	
 	public function index(){
 		$this->set('title_for_layout', 'Consultores');
 		$this -> layout = 'index';
 		$this -> set ('consultants', $this-> Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1),'order'=>array('Consultant.name'))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));		
 	}
 	
 	public function view($id = null){
 		 $this -> layout = 'base';
		 $this-> set ('tipo_usuario',$this->Auth->user('type'));	
 		 if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
 		$consultant =  $this->Consultant->findById($id);
 		 if (!$consultant) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this ->set('projects', $this->Consultant->ProjectConsultant->query('SELECT projects.id, projects.name, projects.description, projects.acronym FROM projects, project_consultants WHERE project_consultants.consultant_id = ' .$id. ' AND project_consultants.project_id = projects.id AND projects.removed != 1'));
        $this ->set('consultant',$consultant);
 	}
 	
 	public function add()
  {
    $this -> layout = 'base';
    if($this->request->is('post'))
    {
      if ($this->verific($this->request->data)) {
        if($this->Consultant->saveAll($this->request->data))
        {
          $this->Session->setFlash($this->flashSuccess('O usuário foi adicionado.'));
          $this->redirect(array('action' => 'index'));
        }
      } 
    }
  }

   public function verific($data){
      $ctr = 0;
      $erro ='';
      //Verificar se já existe Nome, Email e usuario.
      $name  =  $this -> Consultant -> query ("SELECT * FROM `consultants` WHERE name = '". $data['Consultant']['name']."'");
      if (empty($name)){} else { $ctr++; $erro = $erro .'Nome já existente.';};
      $email =  $this -> Consultant -> query ("SELECT * FROM `consultants` WHERE email = '". $data['Consultant']['email']."'");
      if (empty($email)){} else { $ctr++; $erro = $erro .'E-mail já existente.';};
      $username =  $this -> Consultant -> query ("SELECT * FROM `consultants` WHERE name = '". $data['User']['username']."'");
      if (empty($username)){} else { $ctr++; $erro = $erro . 'Nome de Usuário já existente.';};

      if ($ctr > 0) {
        $this -> Session -> setFlash ($this -> flashError ($erro));
        return false;
      }
      else {
        return true;
      }
   }
   public function edit($id = NULL)
   {
		$this->layout = 'base';
		$this->Consultant->id = $id;
		if (!$id) {
        	throw new NotFoundException(__('Invalid post'));
	    }
	
	    $consult = $this->Consultant->findById($id);
	    if (!$consult) {
	        throw new NotFoundException(__('Invalid post'));
	    }
		if ($this->request->is('get')) {
			$this->request->data = $this->Consultant->read();
		} 
		else {
			$this->Consultant->id = $id;
			if ($this->Consultant->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('Consultor foi editado.'));
				$this->redirect(array('action' => 'index'));
			}
		}
   }
   public function delete($id = NULL)
   {
		$this->Consultant->id = $id;
		if($this->Consultant->saveField("removed", "true")){
			$this->Session->setFlash($this->flashSuccess('O consultor foi deletado!'));
			$this->redirect(array('action' => 'index'));
		}
   }



   public function ReportPayment(){
      $this -> layout = 'base';
      if ($this-> request-> is('POST')) {
        $id =  $_POST['id'];
        $this -> set('name', $this->Consultant-> findById($id));
        $this -> set ('consultants', $this-> Consultant -> query('
              select swsdb.consultants.name AS consultant_name,
                   swsdb.projects.name AS project_name,
                     swsdb.project_consultants.value_hour_a_individual,
                     swsdb.project_consultants.value_hour_b_individual,
                     swsdb.project_consultants.value_hour_c_individual,
                     swsdb.project_consultants.value_hour_a_group,
                     swsdb.project_consultants.value_hour_b_group,
                     swsdb.project_consultants.value_hour_c_group,
                   swsdb.entries.type_consulting,
                   swsdb.entries.type,  
                   swsdb.entries.hours_worked,
                   swsdb.entries.date
              from swsdb.consultants
              inner join swsdb.project_consultants
              on swsdb.consultants.id = swsdb.project_consultants.consultant_id
              left join swsdb.projects
              on swsdb.projects.id = swsdb.project_consultants.project_id
              inner join swsdb.entries
              on swsdb.consultants.id = swsdb.entries.consultant_id
              where swsdb.consultants.id ='.$id));
      }
      else {
        $this -> set ( 'consultants' ,$this-> Consultant -> find('all'));
      }
   }



   
   //Chamada ajax
   public function ajaxMsg($obj=null){
   		$this->layout='ajax';
   		//Fazer verificação do obj de entrada enviado, ser for :
   		//uma abreviação sera 2 digitos;
   		//uma abreviação de cor sera 6 digitos;
   		//um cpf sera 14 digitos, isso por causa da mascara    	   		
   		if(strlen($obj) == 2 ) {
   			//Esse "findBy" acompanhado do nome do campo da tabela faz um seletec, com um where nele.
   			if($this->Consultant->findByAcronym($obj)){
   			$this->set('mensagem', 'true');}
   			else{
   			$this->set('mensagem','false');
   		}
   		}
   		else if(strlen($obj) == 6){
   			$obj = '#'.$obj;
   			if ($this->Consultant->findByAcronym_color($obj))
   			{
   			$this->set('mensagem', 'true');
   			}
   			else{
   			$this->set('mensagem','false');
   			}
   		}
   		else if(strlen($obj) == 14){
   			if($this->Consultant->findByCpf($obj)){
   			$this->set('mensagem','true');}
   			else{
   			$this->set('mensagem','false');
   		}
   		}	
   		else{
   			$this->set('mensagem','true');
   		}
   }
 	
 }
?>
