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

<h1>Cadastrar Atividade</h1>
<h2 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h2>
    <div id="content">
        <div class="conteudo">
        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
        echo $this->Form->create('Activities', array('action' => 'add/'.$id)); ?>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.project_id', array('type'=>'hidden', 'value' => $id)); ?>
                <?php echo $this->Form->input('Activity.description', array('label' => 'Descrição: ', 'id'=>'actvDesc', 'required' => 'required')); ?>        
                <?php echo $this->Form->input('Activity.observations', array('type'=>'textarea','label' => 'Observações: ', 'id'=>'actvObs')); ?>
                <?php echo $this->Form->input('Activity.status', array('options' => array("Planejada" => "Planejada", "Em desenvolvimento" => "Em desenvolvimento", "Concluida" => "Concluída", "Cancelada" => "Cancelada"), 'type'=>'select', 'empty' => 'Selecione', 'label' => 'Status: ', 'id'=>'actvStatus', 'required' => 'required')); ?><br>
                <?php echo $this->Form->input('Activity.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 1: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>
				<?php echo $this->Form->input('Activity.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 2: ', 'id'=>'actvID','class' =>'cosultant-atividade')); ?>
				<?php echo $this->Form->input('Activity.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 3: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>
				<?php echo $this->Form->input('Activity.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 4: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>

				</fieldset>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial: ','required'=>'required', 'id'=>'actvStartHour')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final: ','required'=>'required', 'id'=>'actvEndHour')); ?>
                <?php echo $this->Form->input('Activity.date', array('type'=>'text','label' => 'Data: ', 'id'=>'datepicker')); ?>
            </fieldset>
        
            <?php echo $this->Form->end('Confirmar Cadastro'); ?>
            

        </div>
    </div>

