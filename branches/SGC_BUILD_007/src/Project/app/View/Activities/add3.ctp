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
<a href='../../home' class="botao" alt="Cancelar"> Cancelar </a>
<?php echo $this->Form->create('Activities', array('action' => 'add3')); ?>
    <H2>Cadastro de Atividades</H2>
    <fieldset id="cadastro">
        <fieldset id="projeto">
             Projeto:
        </fieldset>
        <fieldset id="atividade">
            Descrição:
        </fieldset>
        <fieldset id="consultor">
            Consultor 1:
        </fieldset>
        <fieldset id="consultor">
            Consultor 2:
        </fieldset>
        <fieldset id="consultor">
            Consultor 3:
        </fieldset>
        <fieldset id="consultor">
            Consultor 4: 
        </fieldset>
        <fieldset id="hora1">
            Hora Inicial: 
        </fieldset>
        <fieldset id="hora1">
            Hora Final: 
        </fieldset>
        <fieldset id="data1">
            Data Inicial: 
        </fieldset>
        <fieldset id="data1">
            Data Final: 
        </fieldset>
    </fieldset>
            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.0.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.0.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.0.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.0.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.0.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.0.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.0.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.0.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.0.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.0.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>

            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.1.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.1.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.1.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.1.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.1.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.1.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.1.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.1.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.1.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.1.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>



            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.2.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.2.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.2.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.2.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.2.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.2.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.2.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.2.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.2.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.2.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>

            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.3.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.3.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.3.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.3.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.3.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.3.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.3.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.3.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.3.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.3.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.4.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.4.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.4.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.4.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.4.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.4.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.4.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.4.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.4.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.4.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.5.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.5.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.5.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.5.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.5.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.5.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.5.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.5.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.5.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.5.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.6.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.6.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.6.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.6.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.6.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.6.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.6.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.6.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.6.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.6.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
            <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.7.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.7.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.7.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.7.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.7.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.7.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.7.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.7.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.7.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.7.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
                        <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.8.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.8.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.8.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.8.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.8.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.8.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.8.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.8.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.8.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.8.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
                        <fieldset id="cadastro">
                <fieldset id="projeto">
                <?php echo $this->Form->input('Activity.9.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px','required'=>'required')); ?>
                </fieldset>
                <fieldset id="atividade">
                <?php echo $this->Form->input('Activity.9.description', array('label' => '', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                </fieldset>   
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.9.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade', 'required' => 'required')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.9.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.9.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset id="consultor">
                <?php echo $this->Form->input('Activity.9.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.9.start_hours', array('type'=>'text','label' => '','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="hora1">
                <?php echo $this->Form->input('Activity.9.end_hours', array('type'=>'text', 'label' => '','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.9.start_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset id="data1">
                <?php echo $this->Form->input('Activity.9.end_date', array('type'=>'text','label' => '', 'required'=>'required', 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>
        
            <?php echo $this->Form->end('Confirmar Cadastro'); ?>
            

        </div>
    </div>

