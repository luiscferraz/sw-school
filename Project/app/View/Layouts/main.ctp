<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
		<?php echo $this->Html->css('reset'); ?>		
		<?php echo $this->Html->css('smoothness/jquery-ui-1.8rc3.custom'); ?>
		<?php echo $this->Html->css('jquery.weekcalendar'); ?>
		<?php echo $this->Html->css('demo'); ?>		
		<?php echo $this->Html->css('agenda'); ?>		
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	    <?php echo $this->Html->script('jquery-ui-1.8rc3.custom.min'); ?>
	    <?php echo $this->Html->script('jquery.weekcalendar'); ?>
		<?php echo $this->Html->script('agenda'); ?>	    
	    <?php echo $this->Html->script('aplicacao'); ?>
	    
	</head>
<body> 
	<?php 
                        foreach ($projects as $project) 
                            {
                                $list_projects[$project['Project']['id']] =$project['Project']['name'];
                            };
                    
                        if (!isset($list_projects)){
                            $list_projects['none'] = 'Nenhum Projeto Cadastrado';
                        }
    ?>
	
	<?php echo $this->Session->flash(); ?>
	<?php include 'includes/menu.php' ?>
	<h1>Sws - Agenda</h1>

	<div id="calendar_selection" class="ui-corner-all">
				<?php echo $this->Form->input('Project.id', array('options' => $list_projects, 'type'=>'select','label' => 'Selecionar projeto: ','required'=>'required', 'id'=>'projetos','class'=>'round')); ?>
			    <!-- <select id="projetos" class="round" >				
				<option value="1">Projeto 1</option>
				<option value="2">Projeto 2</option>
				<option value="3">Projeto 3</option> -->
			    </select> 
			</div>
	
	
		<?php //só mostrar o botão cadastrar se for usuário admin
		if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
			echo '<div id="bt-cadastrar-atividade">';	
			echo $this->Html->link("Cadastrar Atividade", array('action' => '../activities/add'),array('class'=>'botao', 'id'=>'botao-cadastrar-atividade'));
			echo '</div>';
		}
	?>	
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Data: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Hora de Inicio: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">Hora de Termino: </label><select name="end"><option value="">Select End Time</option></select>
				</li>				
				<li>
					<label for="body">Descrição: </label><input type="text" name="description" />
				</li>
				<li>
					<label for="body">Observações: </label><textarea name="body"></textarea>
				</li>
				<li>
			    <label for="consultor1">Consultor 1: </label><select name="consultor1" class="campo round"></select>
			</li>
			<li>
			    <label for="consultor2">Consultor 2: </label><select name="consultor2" class="campo round"></select>
			</li>
			<li>
			    <label for="consultor3">Consultor 3: </label><select name="consultor3" class="campo round"></select>
			</li>
			<li>
			    <label for="consultor4">Consultor 4: </label><select name="consultor4" class="campo round"></select>
			</li>
			<li>
			    <label for="projeto">Projeto: </label><select name="projeto" class="campo round"></select>
			</li>			
			</ul>
		</form>
	</div>
	
</body>
</html>