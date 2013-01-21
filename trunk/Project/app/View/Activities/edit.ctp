					
<h1>Editar Projeto</h1>

        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
		echo $this->Form->create('Projects', array('action' => 'edit')); ?>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.type', array('label' => 'Tipo: ', 'id'=>'actvType')); ?>        
                <?php echo $this->Form->input('Activity.observations', array('type'=>'textarea','label' => 'Observações: ', 'id'=>'actvObs')); ?>
                
                <?php echo $this->Form->input('Activity.status', array('options' => array("initiated"=>"Iniciada","in progress"=>"Em desenvolvimento", "completed"=>"Concluída"), 'type'=>'select', 'empty' => 'Selecione', 'label' => 'Status: ', 'id'=>'actvStatus')); ?>
            </fieldset>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial: ','required'=>'required', 'id'=>'actvStartHour')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final: ','required'=>'required', 'id'=>'actvEndHour')); ?>
                <?php echo $this->Form->input('Activity.date', array('type'=>'text','label' => 'Data: ', 'id'=>'actvDate')); ?>
                <?php echo $this->Form->input('Activity.hours_worked', array('type'=>'text', 'label' => 'Horas Trabalhadas: ','required'=>'required', 'id'=>'actvHourWorked')); ?>
                <?php echo $this->Form->input('Activity.project_id', array('type'=>'text','label' => 'ID Projeto', 'id'=>'actvID')); ?>
            </fieldset>
        
            <?php echo $this->Form->end('Salvar Edição'); ?>

