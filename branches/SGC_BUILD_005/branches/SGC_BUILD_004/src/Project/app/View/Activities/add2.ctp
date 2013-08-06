<?php 
    foreach ($projects as $project) {        
        $list_projects[$project['projects']['id']] =$project['projects']['name'];
        };                      
?>
<?php 
    foreach ($consultants as $consultant) {        
        $list_consultants[$consultant['Consultant']['id']] =$consultant['Consultant']['name'];
        };                     
?>

<h1>Cadastrar Atividade</h1>
<h2 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h2>
    <div id="content">
        <div class="conteudo">
        <?php
        echo $this->Form->create('Activities', array('action' => 'add2/'.$id)); ?>
            <fieldset id="Dados_projeto_pai2">
                <?php echo $this->Form->input('Activity.project_id', array('type'=>'hidden', 'value' => $id)); ?>
                <?php echo $this->Form->input('Activity.description', array('label' => 'Descrição: ', 'id'=>'actvDesc', 'required' => 'required')); ?> 
                <?php echo $this->Form->input('Consultant.acronym', array('label' => 'Abreviação do Nome: ','required'=>'required', 'id'=>'acronym','onblur'=>'checkAcronym(this)')); ?>
                
                <input type="button" value="Pesquisar sigla" id="botao-pesquisar-consultor2"  class='botao' onclick='listConsultores();' />  

            </fieldset>
            <fieldset id="Dados_projeto_pai3">
                <?php echo $this->Form->input('Activity.start_hours', array('type'=>'text','label' => 'Hora Inicial: ','required'=>'required', 'id'=>'actvStartHour')); ?>
                <?php echo $this->Form->input('Activity.end_hours', array('type'=>'text', 'label' => 'Hora Final: ','required'=>'required', 'id'=>'actvEndHour')); ?>
                <?php echo $this->Form->input('Activity.date', array('type'=>'text','label' => 'Data: ', 'id'=>'datepicker')); ?>
            </fieldset>

            <fieldset id="botao_salvar">
                <?php echo $this->Form->end('Confirmar Cadastro'); ?>
            </fieldset>  

        </div>
    </div>

