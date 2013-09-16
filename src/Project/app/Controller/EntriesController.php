  <?php
class EntriesController extends AppController{
	
	public $helpers = array ('Html','Form');
 	public $name = 'Entries';
 	var $scaffold;

 	
 	public function index($id = null){
 		if ($id != null) {
			$this->set('title_for_layout', 'Apontamento');
	 		$this -> layout = 'basemodalint';
	 		$this -> set ('entries', $this-> Entry->find('all', array('conditions'=> array('Entry.removed !=' => 1, 'Entry.activity_id =' => $id),'order'=>array('entry.date DESC','Consultant.name','Entry.type_consulting','Entry.hours_worked DESC','Activity.description'))));
			$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.id =' => 'Entry.consultant_id'))));		 
			$this-> set ('activities',$this->Entry->Activity->find('all', array('conditions'=> array('Activity.id =' => 'Entry.activity_id'))));	
			$this-> set ('tipo_usuario',$this->Auth->user('type'));	
			$this-> set ('id_consultor_logado', $this->Auth->user('consultant_id'));
			$this ->set('activity',$this-> Nome_Atividade($id));

 			$id_projeto=$this->Entry->Activity->Project->query("SELECT activities.project_id FROM projects, activities WHERE activities.project_id = projects.id and activities.id = ".$id);
			$this-> set ('id_projeto', $id_projeto[0]['activities']['project_id']);

			$id_atividade=$this->Entry->Activity->Project->query("SELECT activities.id FROM projects,activities WHERE activities.project_id = projects.id and activities.id = ".$id);
			$this-> set ('id_atividade', $id_atividade[0]['activities']['id']);
			
			
			$nome_projeto = $this->Entry->Activity->Project->query("SELECT projects.name FROM projects, activities WHERE activities.project_id = projects.id and activities.id = ".$id);	
			$this-> set ('nome_projeto', $nome_projeto[0]['projects']['name']);


			}		
 	}


 	public function backindex($id = null){
 		if ($id != null) {
			$this->set('title_for_layout', 'Apontamento');
	 		$this -> layout = 'basemodalint';
	 		$this -> set ('entries', $this-> Entry->find('all', array('conditions'=> array('Entry.removed !=' => 1, 'Entry.activity_id =' => $id),'order'=>array('entry.date DESC','Consultant.name','Entry.type_consulting','Entry.hours_worked DESC','Activity.description')))); 
			$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.id =' => 'Entry.consultant_id'))));		 
			$this-> set ('activities',$this->Entry->Activity->find('all', array('conditions'=> array('Activity.id =' => 'Entry.activity_id'))));	
			$this-> set ('tipo_usuario',$this->Auth->user('type'));	
			$this-> set ('id_consultor_logado', $this->Auth->user('consultant_id'));
			$this ->set('activity',$this-> Nome_Atividade($id));
			

 			$id_projeto=$this->Entry->Activity->Project->query("SELECT activities.project_id FROM projects, activities WHERE           activities.project_id = projects.id and activities.id = ".$id);
			$this-> set ('id_projeto', $id_projeto[0]['activities']['project_id']);

			$id_atividade=$this->Entry->Activity->Project->query("SELECT activities.id FROM projects,activities WHERE activities.project_id = projects.id and activities.id = ".$id);
			$this-> set ('id_atividade', $id_atividade[0]['activities']['id']);
			
			
			$nome_projeto = $this->Entry->Activity->Project->query("SELECT projects.name FROM projects, activities WHERE activities.project_id = projects.id and activities.id = ".$id);	
			$this-> set ('nome_projeto', $nome_projeto[0]['projects']['name']);


			}		
 	}
 	
 	public function add($id_atividade,$id_projeto){
	 	$this->layout = 'basemodalint';
	 	$this-> set ('id_projeto',$id_projeto);
	 	$this-> set ('id_atividade',$id_atividade);
		$data_atividade = $this->Entry->Activity->query("SELECT start_date, end_date FROM activities WHERE activities.id = ".$id_atividade);
		$this-> set ('activities',$this->Entry->Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1),'order'=>array('Project.name','Activity.description'))));
		$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1))));

		$this-> set ('id_consultor_logado',$this->Auth->user('consultant_id'));
		$this -> set ('nome_consultor_logado', $this-> Nome_Consultor_Logado($this->Auth->user('consultant_id')));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));
		$nome_projeto_atividade = $this->Entry->Activity->Project->query("SELECT projects.name, activities.description FROM projects, activities WHERE activities.project_id = projects.id and activities.id = ".$id_atividade);	
		$this -> set('nome_projeto', $nome_projeto_atividade[0]['projects']['name']);
		$this-> set ('nome_atividade', $nome_projeto_atividade[0]['activities']['description']);

	 	if($this->request->is('post')){
	 		$this->request->data['Entry']['date'] = $this -> inverteIngles($this->request->data['Entry']['date']);
			if ($this -> verifica_entries($this->request->data, $data_atividade[0]['activities']['start_date'],$data_atividade[0]['activities']['end_date'])) {
				if($this->Entry->saveAll($this->request->data)){
	 				$this->Session->setFlash($this->flashSuccess('O apontamento foi adicionado com sucesso.'));
          			$this->redirect(array('action' => '../activities/index/'.$id_projeto));
	 			}

	 		else{
				$this->Session->setFlash($this->flashError('Erro ao cadastrar apontamento!'));
			}
		}

		else{
				$this->request->data['Entry']['date'] = $this -> inverteIngles($this->request->datadata['Entry']['date']);
				$this->Session->setFlash($this->flashError('Data do Apontamento está fora do período proposto para a atividade. Solicite a correção do prazo ao Administrador!'));
			}
	 }
	 	else{
	 		$this->Session->setFlash($this->Session->setFlash($this->flashError('O apontamento não foi adicionado. Tente novamente!')));

	 	}
 	}



	    public function inverteIngles($data) {
 		$dataApontamento = $this->request->data['Entry']['date'];
		list ($dia, $mes, $ano) = split ('[/.-]', $dataApontamento);
		$data_novo = $ano . '-' . $mes . '-' . $dia;
		return $data_novo;
 	}
 	    public function invertePortugues($data) {
 		$dataApontamento = $this->request->data['Entry']['date'];
		list ($dia, $mes, $ano) = split ('[/.-]', $dataApontamento);
		$data_novo = $ano . '-' . $mes . '-' . $dia;
		return $data_novo;
 	}
	 	private function Nome_Consultor_Logado($id){

			$name = $this->Entry->Consultant->findById($id);
			if (!$name){
			return '';
			}
			else{
			return $name['Consultant']['name'];
 		 	}
		}
			
		private function Nome_Atividade($id){
			$name = $this->Entry->Activity->findById($id);
			return $name['Activity']['description'];
 		 	}
 		
 		
			
 	
 	public function delete($id = NULL, $id_atividade){
		$this->Entry->id = $id;
		$this-> set ('id_atividade',$id_atividade);
		if($this->Entry->saveField("removed", "true")){
			$this->Session->setFlash($this->flashSuccess('O apontamento foi removido com sucesso!'));
			$this->redirect(array('action' => 'index/'.$id_atividade));
		}
	}

 	public function approve($id = NULL, $id_atividade){
		$this->Entry->id = $id;
		$this-> set ('id_atividade',$id_atividade);
		if($this->Entry->saveField("approved",1)){
			$this->Session->setFlash($this->flashSuccess('O apontamento foi aprovado!'));
			$this->redirect(array('action' => 'index/'.$id_atividade));
		}
	}
	
	public function edit($id = NULL, $id_atividade){
		


		$this->layout = 'basemodalint';
		$this-> set ('id',$id);
		$this-> set ('id_atividade',$id_atividade);
		$this-> set ('activities',$this->Entry->Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1),'order'=>array('Project.name','Activity.description'))));
		$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1))));
		$this-> set ('id_consultor_logado',$this->Auth->user('consultant_id'));
		$this -> set ('nome_consultor_logado', $this-> Nome_Consultor_Logado($this->Auth->user('consultant_id')));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));
		$this->Entry->id = $id;
		
		if ($this->request->is('get')) {
			$this->request->data = $this->Entry->read();
			 $this->request->data['Entry']['date'] = $this -> invertePortugues($this->request->data['Entry']['date']);

		}
		else{
			$this->Entry->id = $id;
			 $this->request->data['Entry']['date'] = $this -> inverteIngles($this->request->data['Entry']['date']);
			if ($this->Entry->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('Atividade foi editada.'));
				$this->redirect(array('action' => 'index/'.$id_atividade));
			}
			else {
				$this->redirect(array('action' => 'index/'.$id_atividade));
			}

		}
		$nome_projeto = $this->Entry->Activity->Project->query("SELECT projects.name FROM projects, activities, entries WHERE activities.project_id = projects.id and entries.activity_id = activities.id and entries.id = ".$id);	
			$this-> set ('nome_projeto', $nome_projeto[0]['projects']['name']);

		$nome_atividade = $this->Entry->Activity->Project->query("SELECT activities.description FROM projects, activities, entries WHERE activities.project_id = projects.id and entries.activity_id = activities.id and entries.id = ".$id);	
			$this-> set ('nome_atividade', $nome_atividade[0]['activities']['description']);	   
	}

	public function view($id){

		$this->Entry->id = $id;
		$this->layout = 'basemodalint';
		$Apontamento =  $this->Entry->findById($id);
		$this -> set ('nome_consultor_logado', $this-> Nome_Consultor_Logado($Apontamento['Entry']['consultant_id']));
		$this -> set ('nome_atividade', $this-> Nome_Atividade($Apontamento['Entry']['activity_id']));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));
		//$this ->set('activity',$this-> Nome_Atividade($id));	


		$nome_projeto = $this->Entry->Activity->Project->query("SELECT projects.name FROM projects, activities, entries WHERE activities.project_id = projects.id and entries.activity_id = activities.id and entries.id = ".$id);	
			$this-> set ('nome_projeto', $nome_projeto[0]['projects']['name']);

		$nome_atividade = $this->Entry->Activity->Project->query("SELECT activities.description FROM projects, activities, entries WHERE activities.project_id = projects.id and entries.activity_id = activities.id and entries.id = ".$id);	
			$this-> set ('nome_atividade', $nome_atividade[0]['activities']['description']);

		$id_atividade = $this->Entry->Activity->Project->query("SELECT entries.activity_id FROM projects, activities, entries WHERE activities.project_id = projects.id  and entries.activity_id = activities.id and entries.id = ".$id);
			$this-> set ('id_atividade', $id_atividade[0]['entries']['activity_id']);

	    if ($this->request->is('get')) {
	        $this->set('entries', $this->Entry->read());
	    }
	}


	public function verifica_entries($data, $data_inicial_atividade, $data_final_atividade) {
	
		//Data do apontamento não pode estar fora do período proposto para a atividade.
		if ((($data['Entry']['date']) > $data_final_atividade) or (($data['Entry']['date']) < $data_inicial_atividade)) {
			return false;
		} else { 
			return true;
		}
	}

	public function reports(){
	$this->set('title_for_layout', 'Relatório de apontamento');
	$this -> layout = 'base';
	
	if ($this -> request -> is('post')) {
					if (array_key_exists('rel', $_POST)) {
						$rel =  $_POST['rel'];
						$this -> set('rel', $rel);
					}
					
					if (array_key_exists('data_inicial', $_POST)) {
						$data_inicial =  $_POST['data_inicial'];
						$this -> set('data_inicial', $data_inicial);
					}
					if (array_key_exists('data_final', $_POST)) {
						$data_final =  $_POST['data_final'];
						$this -> set('data_final', $data_final);
					}
					if (array_key_exists('tipo_consultoria', $_POST)) {
						$tipo_consultoria =  $_POST['tipo_consultoria'];
						$this -> set('tipo_consultoria', $tipo_consultoria);
					}
					if (array_key_exists('tipo', $_POST)) {
						$tipo =  $_POST['tipo'];
						$this -> set('tipo', $tipo);
					}
				
	list ($dia, $mes, $ano) = split ('[/.-]',  $data_inicial);
	$data_inicial = $ano . '-' . $mes . '-' . $dia;
	list ($dia, $mes, $ano) = split ('[/.-]',  $data_final);
	$data_final = $ano . '-' . $mes . '-' . $dia;	
	
	//$data_inicial = '2013-01-01';
	//$data_final = '2013-10-31';
	//$tipo_consultoria = 'A';
	//$tipo = 'Individual';
	$pesquisa = $this->Entry->query("select projects.name, consultants.name, entries.date, entries.type_consulting, entries.hours_worked from consultants, projects, activities, entries 
								where entries.consultant_id = consultants.id and projects.id = activities.project_id and entries.activity_id = activities.id
								and entries.type_consulting = '".$tipo_consultoria."' and type = '".$tipo."'
								and entries.date between '".$data_inicial."' and '".$data_final."'
								order by projects.name, consultants.name");
								
	$resultado = Array();
	//vamos montar um array de 4 dimensoes (array(array(array(array))))
	//o formato sera: 
	//Array [ projeto1 [numero_consultores, meses [horas_mes1, horas_mes2, horas_mes_x, total_horas] consultores [consultor1 [horas_mes1, horas_mes2, horas_mes_x, total_horas] ,consultor2 [horas_mes1, horas_mes2, horas_mes_x, total_horas], ...]]
	//		  projeto2 [numero_consultores, meses [horas_mes1, horas_mes2, horas_mes_x, total_horas] consultores [consultor1 [horas_mes1, horas_mes2, horas_mes_x, total_horas] ,consultor2 [horas_mes1, horas_mes2, horas_mes_x, total_horas], ...]]
	
	
	$vetorData1 = explode("-", $data_inicial);
	$vetorData1[0] = (int)$vetorData1[0];
	$vetorData1[1] = (int)$vetorData1[1];
	$vetorData1[2] = (int)$vetorData1[2];
	$vetorData2 = explode("-", $data_final);
	$vetorData2[0] = (int)$vetorData2[0];
	$vetorData2[1] = (int)$vetorData2[1];
	$vetorData2[2] = (int)$vetorData2[2];
	$vetorData = Array();
	$CheckVetorData = False;
	while ($CheckVetorData == False) {
		$vetorData[$vetorData1[0].'-'.$vetorData1[1]] = 0;
		if (($vetorData1[0] == $vetorData2[0]) and ($vetorData1[1] == $vetorData2[1])) {
			$CheckVetorData = True;
		}
		
		if ($vetorData1[1] == '12') {
			$vetorData1[1] = '1';
			$vetorData1[0] = $vetorData1[0] + 1;
			}
		else {
			$vetorData1[1] = $vetorData1[1] + 1;
		}
    }
	$vetorData['Total'] = 0;
	$this-> set ('vetorData', $vetorData);
	$total_geral = 0;
	
	if ($rel == 'Projeto') {
	
	foreach ($pesquisa as $projeto){
	
		if (!(array_key_exists($projeto['projects']['name'], $resultado))){	
			$resultado[$projeto['projects']['name']] = Array();
			$resultado[$projeto['projects']['name']]['numero_consultores'] = 1;
			$resultado[$projeto['projects']['name']]['meses'] = $vetorData;
			$resultado[$projeto['projects']['name']]['consultores'] = Array();
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']] = $vetorData;
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']]['Total'] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['meses']['Total'] =  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
		} else {
			if (!(array_key_exists($projeto['consultants']['name'], $resultado[$projeto['projects']['name']]['consultores']))){		
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']] = $vetorData;
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];			
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['projects']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']]['Total'] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['meses']['Total'] = $resultado[$projeto['projects']['name']]['meses']['Total'] +  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['numero_consultores'] = $resultado[$projeto['projects']['name']]['numero_consultores'] + 1;
			}
			else {
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['projects']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']]['Total'] =  $resultado[$projeto['projects']['name']]['consultores'][$projeto['consultants']['name']]['Total'] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['projects']['name']]['meses']['Total'] = $resultado[$projeto['projects']['name']]['meses']['Total'] +  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
			}
		}
	}
	
	} else {
	foreach ($pesquisa as $projeto){
	
		if (!(array_key_exists($projeto['consultants']['name'], $resultado))){	
			$resultado[$projeto['consultants']['name']] = Array();
			$resultado[$projeto['consultants']['name']]['numero_projetos'] = 1;
			$resultado[$projeto['consultants']['name']]['meses'] = $vetorData;
			$resultado[$projeto['consultants']['name']]['projetos'] = Array();
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']] = $vetorData;
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses']['Total'] =  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
		} else {
			if (!(array_key_exists($projeto['projects']['name'], $resultado[$projeto['consultants']['name']]['projetos']))){		
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']] = $vetorData;
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];			
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses']['Total'] = $resultado[$projeto['consultants']['name']]['meses']['Total'] +  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['numero_projetos'] = $resultado[$projeto['consultants']['name']]['numero_projetos'] + 1;
			}
			else {
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] =  $resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses']['Total'] = $resultado[$projeto['consultants']['name']]['meses']['Total'] +  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
			}
		}
	}
	
	
	}
	
	$this-> set ('total_geral', $total_geral);
	$this-> set ('resultado', $resultado);
	$this -> set('tabela', True);
	} else {
	$this -> set('tabela', False);
}
}

	public function reports2(){
	$this->set('title_for_layout', 'Relatório de apontamento');
	$this -> layout = 'base';
	
	if ($this -> request -> is('post')) {
					if (array_key_exists('data_inicial', $_POST)) {
						$data_inicial =  $_POST['data_inicial'];
						$this -> set('data_inicial', $data_inicial);
					}
					if (array_key_exists('data_final', $_POST)) {
						$data_final =  $_POST['data_final'];
						$this -> set('data_final', $data_final);
					}
					if (array_key_exists('tipo_consultoria', $_POST)) {
						$tipo_consultoria =  $_POST['tipo_consultoria'];
						$this -> set('tipo_consultoria', $tipo_consultoria);
					}
					if (array_key_exists('tipo', $_POST)) {
						$tipo =  $_POST['tipo'];
						$this -> set('tipo', $tipo);
					}
				
	list ($dia, $mes, $ano) = split ('[/.-]',  $data_inicial);
	$data_inicial = $ano . '-' . $mes . '-' . $dia;
	list ($dia, $mes, $ano) = split ('[/.-]',  $data_final);
	$data_final = $ano . '-' . $mes . '-' . $dia;	
	
	//$data_inicial = '2013-01-01';
	//$data_final = '2013-10-31';
	//$tipo_consultoria = 'A';
	//$tipo = 'Individual';
	$pesquisa = $this->Entry->query("select projects.name, consultants.name, entries.date, entries.type_consulting, entries.hours_worked from consultants, projects, activities, entries 
								where entries.consultant_id = consultants.id and projects.id = activities.project_id and entries.activity_id = activities.id
								and entries.type_consulting = '".$tipo_consultoria."' and type = '".$tipo."'
								and entries.date between '".$data_inicial."' and '".$data_final."'
								order by consultants.name, projects.name");
								
	$resultado = Array();
	//vamos montar um array de 4 dimensoes (array(array(array(array))))
	//o formato sera: 
	//Array [ projeto1 [numero_consultores, meses [horas_mes1, horas_mes2, horas_mes_x, total_horas] consultores [consultor1 [horas_mes1, horas_mes2, horas_mes_x, total_horas] ,consultor2 [horas_mes1, horas_mes2, horas_mes_x, total_horas], ...]]
	//		  projeto2 [numero_consultores, meses [horas_mes1, horas_mes2, horas_mes_x, total_horas] consultores [consultor1 [horas_mes1, horas_mes2, horas_mes_x, total_horas] ,consultor2 [horas_mes1, horas_mes2, horas_mes_x, total_horas], ...]]
	
	
	$vetorData1 = explode("-", $data_inicial);
	$vetorData1[0] = (int)$vetorData1[0];
	$vetorData1[1] = (int)$vetorData1[1];
	$vetorData1[2] = (int)$vetorData1[2];
	$vetorData2 = explode("-", $data_final);
	$vetorData2[0] = (int)$vetorData2[0];
	$vetorData2[1] = (int)$vetorData2[1];
	$vetorData2[2] = (int)$vetorData2[2];
	$vetorData = Array();
	$CheckVetorData = False;
	while ($CheckVetorData == False) {
		$vetorData[$vetorData1[0].'-'.$vetorData1[1]] = 0;
		if (($vetorData1[0] == $vetorData2[0]) and ($vetorData1[1] == $vetorData2[1])) {
			$CheckVetorData = True;
		}
		
		if ($vetorData1[1] == '12') {
			$vetorData1[1] = '1';
			$vetorData1[0] = $vetorData1[0] + 1;
			}
		else {
			$vetorData1[1] = $vetorData1[1] + 1;
		}
    }
	$vetorData['Total'] = 0;
	$this-> set ('vetorData', $vetorData);
	$total_geral = 0;
	foreach ($pesquisa as $projeto){
	
		if (!(array_key_exists($projeto['consultants']['name'], $resultado))){	
			$resultado[$projeto['consultants']['name']] = Array();
			$resultado[$projeto['consultants']['name']]['numero_projetos'] = 1;
			$resultado[$projeto['consultants']['name']]['meses'] = $vetorData;
			$resultado[$projeto['consultants']['name']]['projetos'] = Array();
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']] = $vetorData;
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses']['Total'] =  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
		} else {
			if (!(array_key_exists($projeto['projects']['name'], $resultado[$projeto['consultants']['name']]['projetos']))){		
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']] = $vetorData;
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];			
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] =   $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses']['Total'] = $resultado[$projeto['consultants']['name']]['meses']['Total'] +  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['numero_projetos'] = $resultado[$projeto['consultants']['name']]['numero_projetos'] + 1;
			}
			else {
			$data_pesquisa = explode("-", $projeto['entries']['date']);
			$data_pesquisa[0] = (int)$data_pesquisa[0];
			$data_pesquisa[1] = (int)$data_pesquisa[1];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] = $resultado[$projeto['consultants']['name']]['meses'][$data_pesquisa[0].'-'.$data_pesquisa[1]] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] =  $resultado[$projeto['consultants']['name']]['projetos'][$projeto['projects']['name']]['Total'] + $projeto['entries']['hours_worked'];
			$resultado[$projeto['consultants']['name']]['meses']['Total'] = $resultado[$projeto['consultants']['name']]['meses']['Total'] +  $projeto['entries']['hours_worked'];
			$total_geral = $total_geral + $projeto['entries']['hours_worked'];
			}
		}
	}
	$this-> set ('total_geral', $total_geral);
	$this-> set ('resultado', $resultado);
	$this -> set('tabela', True);
	} else {
	$this -> set('tabela', False);
}
}


}
?>


