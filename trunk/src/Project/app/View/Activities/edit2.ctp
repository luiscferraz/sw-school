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
                
<h1>Editar Atividade</h1>
<h2 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h2>
<h2 id="tituloatividade">Atividade - <?php echo $nome_atividade; ?></h2>

        <?php  
        echo $this->Form->create('Activities', array('action' => 'edit2/'.$id.'/'.$id_projeto)); ?>
            <fieldset id="Dados_projeto_pai2">
                <?php echo $this->Form->input('Activity.id', array('type'=>'hidden')); ?>
                 <?php echo $this->Form->input('Activity.description', array('label' => 'Descrição: <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'required'=>'required', 'id'=>'actvDescription')); ?> 
                 <?php echo $this->Form->input('Consultant.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronym')); ?>

                 <input type="button" value="Pesquisar sigla" id="botao-pesquisar-consultor"  class='botao' onclick='listConsultores();' />           
               
            </fieldset>
            <fieldset id="Dados_projeto_pai3">
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvStartHour')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id'=>'actvEndHour')); ?>
                <?php echo $this->Form->input('Activity.date', array('type'=>'text','label' => 'Data <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'required'=>'required', 'id'=>'datepicker')); ?>
                
            </fieldset>
            
            <fieldset id="botao_salvar">
                <?php echo $this->Form->end('Salvar Edição'); ?>
            </fieldset>

<script type="text/javascript">
//Remover status indevidos
    var status = $("#actvStatus").val();
    if (status == 'Em desenvolvimento') {
        $("#actvStatus option[value='Planejada']").remove();
    }

</script>