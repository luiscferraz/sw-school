<h1>Cadastrar Apontamento</h1>
    <div id="content">
        <div class="conteudo">

        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
		echo $this->Form->create('Entries', array('action' => 'add')); ?>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Entry.date', array('type'=>'text','label' => 'Data: ', 'id'=>'datepicker')); ?>
                <?php echo $this->Form->input('Entry.type', array('label' => 'Tipo: ', 'id'=>'entryType')); ?>        
                <?php echo $this->Form->input('Entry.observations', array('type'=>'textarea','label' => 'Observações: ', 'id'=>'actvObs')); ?>
            </fieldset>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Entry.hours_worked', array('type'=>'text', 'label' => 'Horas Trabalhadas: ','required'=>'required', 'id'=>'entryHourWorked')); ?>
                <?php echo $this->Form->input('Entry.consultant_id', array('type'=>'select','label' => 'Consultor:', 'id'=>'entryID')); ?>
                <?php echo $this->Form->input('Entry.activity_id', array('type'=>'select','label' => 'Atividade:', 'id'=>'entryID')); ?>
            </fieldset>

            <?php echo $this->Form->end('Confirmar Cadastro'); ?>

        </div>
    </div>

