	
<?php 
    foreach ($activities as $activity) {        
        $list_activities[$activity['Activity']['id']] =$activity['Activity']['type'];
        };                    
    if (!isset($list_activities)){
		$list_activities['none'] = 'Nenhuma Atividade Cadastrada';
    }
?>			
<h1>Editar Apontamento</h1>

        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
		echo $this->Form->create('Entries', array('action' => 'edit')); ?>
         <fieldset id="Dados_projeto_pai">
				<?php echo $this->Form->input('Entry.id', array('type'=>'hidden')); ?>
				<?php echo 'Consultor logado: ', $nome_consultor_logado ?><br><br>
				<?php echo $this->Form->input('Entry.consultant_id',array('type'=>'text','default'=>$id_consultor_logado, 'type'=>'hidden'));?>								                
                <?php echo $this->Form->input('Entry.date', array('type'=>'text','label' => 'Data: ', 'id'=>'datepicker')); ?><br>
                <?php echo $this->Form->input('Entry.observations', array('type'=>'textarea','label' => 'Observações: ', 'id'=>'actvObs')); ?>
            </fieldset>
            <fieldset id="Dados_projeto_pai">
				<?php echo $this->Form->input('Entry.activity_id', array('options' => $list_activities,'empty' => 'Selecione', 'type'=>'select','label' => 'Atividade: ', 'id'=>'actvID')); ?><br>
				<?php echo $this->Form->input('Entry.type_consulting', array('options' => array("A"=>"A","B"=>"B", "C"=>"C"),'label' => 'Tipo de consultoria: ', 'id'=>'entryType')); ?> <br>
                <?php echo $this->Form->input('Entry.hours_worked', array('type'=>'text', 'label' => 'Horas Trabalhadas: ','required'=>'required', 'id'=>'entryHourWorked')); ?>
			</fieldset>
            <?php echo $this->Form->end('Salvar Edição'); ?>

