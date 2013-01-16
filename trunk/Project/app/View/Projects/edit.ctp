
<h1>Editar Projeto</h1>
<?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
		echo $this->Form->create('Project', array('action' => 'edit')); ?>
			<div>
				<fieldset id="dados_projeto">
					<legend>Dados do Projeto</legend>
					
					<?php 
					
						foreach ($projects as $project) 
							{
								if( $project['Project']['parent_project_id'] != $this->data['Project']['id'] ){
									if( $project['Project']['id'] != $this->data['Project']['id'] ){
										$list_projects[$project['Project']['id']] =$project['Project']['name'];
									}
								}
							};
					
						foreach ($companies as $company) 
							{
								$list_companies[$company['Company']['id']] =$company['Company']['name'];
							};
						if (!isset($list_projects)){
							$list_projects['none'] = 'Nenhum Projeto Cadastrado';
						}
						elseif(!isset($list_companies)){
							$list_companies['none'] = 'Nenhuma Empresa Cadastrada';
						}
					?>
						<?php echo $this->Form->input('Project.id', array('type' => 'hidden')); ?>
								
						<?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
						<?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
						<?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
						<?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
						<?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?>
						
				</fieldset>
				<fieldset id="horas">
					<legend>Horas</legend>
					<?php echo $this->Form->input('Project.a_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas A: ','required'=>'required','id'=>'hora_a',)); ?>
						
					<?php echo $this->Form->input('Project.b_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas B: ', 'id'=>'hora_b')); ?>
					
					<?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas C: ', 'id'=>'hora_c')); ?>
					<p> </p>
					<div id="total-de-horas">Total de horas : <p style="color:#000"></p></div>
				</fieldset>
			</div>
			
			<?php echo $this->Form->end('Atualizar'); ?>
	