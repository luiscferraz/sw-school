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
$consultant_id = 'Activity.consultant'. $consultant_id . '_id';
?>
                
<h4>Projeto - <?php echo $nome_projeto; ?> </h4>
<h4>Atividade - <?php echo $nome_atividade; ?></h4>
<!--$id_projeto, $per, $dia, $mes, $ano, $sigla_consultor-->

  
        <?php  
        echo $this->Form->create('Activities', array('action' => 'edit/'.$id.'/'.$id_projeto)); ?>
            <fieldset id="Dados_projeto_pai2">
                <?php echo $this->Form->input('Activity.id', array('type'=>'hidden')); ?>
                 <?php echo $this->Form->input('Activity.description', array('label' => 'Descrição: ', 'id'=>'actvDescription')); ?> 
                <?php echo $this->Form->input('Activity.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 1 <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvID', 'class'=>'cosultant-atividade')); ?>
                <?php echo $this->Form->input('Activity.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 2: ', 'id'=>'actvID', 'class'=>'cosultant-atividade')); ?>
                <?php echo $this->Form->input('Activity.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 3: ', 'id'=>'actvID','class'=>'cosultant-atividade')); ?>
                <?php echo $this->Form->input('Activity.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => 'Consultor 4: ', 'id'=>'actvID', 'class'=>'cosultant-atividade')); ?>
                 <!--< ?php echo $this->Form->input('Consultant.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronym', 'default' => $sigla_consultor)); ?>

                 <input type="button" value="Pesquisar sigla" id="botao-pesquisar-consultor"  class='botao' onclick='listConsultores();' />-->
               
            
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial: ','required'=>'required', 'id'=>'actvStartHour')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final: ','required'=>'required', 'id'=>'actvEndHour')); ?>
                <?php echo $this->Form->input('Activity.start_date', array('type'=>'text','label' => 'Data Inicial: ', 'id'=>'datepicker')); ?>
                <?php echo $this->Form->input('Activity.end_date', array('type'=>'text','label' => 'Data Final: ', 'id'=>'datepicker2')); ?>
                
            </fieldset>
            
            <fieldset id="botao_salvar">
                <?php echo $this->Form->end(array('label' => 'Salvar Edição', 'onclick' => 'parent.$.fancybox.close();')); ?>
            </fieldset>
    
<script type="text/javascript">
//Remover status indevidos
    var status = $("#actvStatus").val();
    if (status == 'Em desenvolvimento') {
        $("#actvStatus option[value='Planejada']").remove();
    }

</script>