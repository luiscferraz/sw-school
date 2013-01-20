					
<?php 
                        foreach ($projects as $project) 
                            {
                                $list_projects[$project['Project']['id']] =$project['Project']['name'];
                            };
                    
                        foreach ($companies as $company) 
                            {
                                $list_companies[$company['Company']['id']] =$company['Company']['name'];
                            };
                        if (!isset($list_projects)){
                            $list_projects['none'] = 'Nenhum Projeto Cadastrado';
                        }
                        if(!isset($list_companies)){
                            $list_companies['none'] = 'Nenhuma Empresa Cadastrada';
                        }
                    ?>
<h1>Editar Projeto</h1>

        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
		echo $this->Form->create('Projects', array('action' => 'edit')); ?>
            <fieldset id="Dados_projeto_pai">
				<?php echo $this->Form->input('Project.id', array('type' => 'hidden')); ?>
				<?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
				<?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
				<?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
				<?php echo $this->Form->input('Project.a_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas A: ','required'=>'required','id'=>'hora_a',)); ?>
				<?php echo $this->Form->input('Project.b_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas B: ', 'id'=>'hora_b')); ?>
				<?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas C: ', 'id'=>'hora_c')); ?>
				
				<?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas em grupo: ', 'id'=>'hora_c')); ?>
				<?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
				<?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?>

            </fieldset>
            <fieldset id="botaoGerente">
                    
            	<label>Gerente de Projeto: </label>
                <input id="bt-add-gerente" style="display:none" type="button" value="Escolher Gerente de Projeto" onclick='ListGerentes();'>
                <div class="input text" id="box-gerente">
					<p>Erick
					<?php echo $this->Html->image('delete.png',array('alt'=>'Deletar Gerente', 'title'=> 'Deletar Gerente', 'onclick'=> 'deleteGerente()')); ?>
					
					<?php echo $this->Form->input('Project.consultant_id',array('type' => 'hidden')); ?>
					
				</div> 
            </fieldset>
            <?php echo $this->Form->end('Salvar Edição'); ?>

