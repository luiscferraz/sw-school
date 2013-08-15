<?php 
    foreach ($projects as $project) {        
        $list_projects[$project['projects']['id']] =$project['projects']['name'];
        };                    
    if (!isset($list_projects)){
		$list_projects['none'] = 'Nenhum Projeto Cadastrado';
    }
?>
<?php 
    foreach ($consultants as $consultant) {        
        $list_consultants[$consultant['Consultant']['id']] =$consultant['Consultant']['name'];
        };                    
    if (!isset($list_consultants)){
		$list_consultants['none'] = 'Nenhum Consultor Cadastrado';
    }
?>
<?php 
	foreach($attachments as $attachment){
						
		$list_attachments[$attachment['Attachment']['id']] = $attachment['Attachment']['file_name'];
	};
	if (!isset($list_attachments)){
		$list_attachments['none'] = 'Nenhum anexo';
	}
?>
<a href='../../activities/index/<?php echo $id ?>' class="botao" alt="Cancelar"> Cancelar </a>   
<h2>Cadastrar Atividade</h2>
<h3 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h3>
  
        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
        echo $this->Form->create('Activities', array('action' => 'add/'.$id)); ?>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.project_id', array('type'=>'hidden', 'value' => $id)); ?>
                <?php echo $this->Form->input('Activity.description', array('label' => 'Descrição <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'id'=>'actvDesc', 'required' => 'required')); ?>        
                <?php echo $this->Form->input('Activity.observations', array('type'=>'textarea','label' => 'Observações: ', 'id'=>'actvObs')); ?>
                <?php echo $this->Form->input('Activity.status', array('options' => array("Planejada" => "Planejada", "Em desenvolvimento" => "Em desenvolvimento", "Concluida" => "Concluída", "Cancelada" => "Cancelada"), 'type'=>'select', 'empty' => 'Selecione', 'label' => 'Status <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'id'=>'actvStatus', 'required' => 'required')); ?><br>
                <?php echo $this->Form->input('Activity.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 1 <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'id'=>'actvID','class'=>'cosultant-atividade', 'required' => 'required')); ?>
				<?php echo $this->Form->input('Activity.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 2: ', 'id'=>'actvID','class' =>'cosultant-atividade')); ?>
				<?php echo $this->Form->input('Activity.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 3: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>
				<?php echo $this->Form->input('Activity.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 4: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>

				</fieldset>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                <?php echo $this->Form->input('Activity.start_date', array('type'=>'text','label' => 'Data <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
            </fieldset>
        
            <?php echo $this->Form->end('Confirmar Cadastro'); ?>
            

        </div>
    </div>

