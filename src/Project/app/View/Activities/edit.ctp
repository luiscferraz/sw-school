
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
<a href='../../index/<?php echo $id_projeto ?>' class="botao" alt="Cancelar"> Cancelar </a>             
<h2>Editar Atividade</h2>
<h3 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h3>
<h3 id="tituloatividade">Atividade - <?php echo $nome_atividade; ?></h3>

        <?php  //provavelmente na view add, ou o equivalente para adicionar a pessoa
        echo $this->Form->create('Activities', array('action' => 'edit/'.$id.'/'.$id_projeto)); ?>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.id', array('type'=>'hidden')); ?>
                 <?php echo $this->Form->input('Activity.description', array('label' => 'Descrição <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvDescription')); ?>        
                <?php echo $this->Form->input('Activity.observations', array('type'=>'textarea','label' => 'Observações: ', 'id'=>'actvObs')); ?>
                <?php echo $this->Form->input('Activity.status', array('options' => array("Planejada" => "Planejada", "Em desenvolvimento" => "Em desenvolvimento", "Concluída" => "Concluída", "Cancelada" => "Cancelada"), 'type'=>'select', 'empty' => 'Selecione', 'label' => 'Status <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvStatus')); ?><br>
                <?php echo $this->Form->input('Activity.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 1 <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvID', 'class'=>'cosultant-atividade')); ?>
                <?php echo $this->Form->input('Activity.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 2: ', 'id'=>'actvID', 'class'=>'cosultant-atividade')); ?>
                <?php echo $this->Form->input('Activity.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 3: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>
                <?php echo $this->Form->input('Activity.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 4: ', 'id'=>'actvID', 'class'=>'cosultant-atividade')); ?>
            </fieldset>
            <fieldset id="Dados_projeto_pai">
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                <?php echo $this->Form->input('Activity.start_date', array('type'=>'text','label' => 'Data Inicial <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required ' , 'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                <?php echo $this->Form->input('Activity.end_date', array('type'=>'text','label' => 'Data Final <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required ' , 'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                <?php echo $this->Form->input('Activity.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => 'Projeto <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'id'=>'actvID','required'=>'required')); ?>

            </fieldset>
        
            <?php echo $this->Form->end('Salvar Edição'); ?>

<script type="text/javascript">
//Remover status indevidos
    var status = $("#actvStatus").val();
    if (status == 'Em desenvolvimento') {
        $("#actvStatus option[value='Planejada']").remove();
    }


</script>