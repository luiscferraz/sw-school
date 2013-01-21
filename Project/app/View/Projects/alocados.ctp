<h1>Consultores Alocados </h1>

<h3>Projeto -  <?php echo $nameProject ?></h2>
<div class="projectindex">

	<input type="button" value="Alocar Consultor" id="bt-alocar-consultor"  onclick='listConsultores();' />
	<table id="tableProject" cellpadding="0" cellspacing="0">
		<tr>
			<th id="nameProject">Nome</th>
			<th>Valor Horas A </th>
			<th>Valor Hora B </th>
			<th>Valor Hora C </th>
			<th>Valor Hora Grupo </th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($consultants as $consultant) 
			{		
				
				
		?>

		<tr>
			<td id="nameTableProject">
				<?php echo $this->Form->create('Projects', array('action' => 'alocados')); ?>
				<?php echo $this->Form->input('ProjectConsultant.id', array('type'=>'hidden')); ?>
				<?php echo $this->Form->input('ProjectConsultant.consultant_id', array('type'=>'hidden')); ?>
				<?php echo $this->Form->input('ProjectConsultant.project_id', array('type'=>'hidden')); ?>
				<?php echo $consultant['ProjectConsultant']['consultant_id']; ?>
				<?php echo $this->Form->end('Salvar'); ?>
			</td>
			<td class="edit">
				<?php echo $this->Form->input('ProjectConsultant.value_hour_a', array('type'=>'hidden')); ?>
				<p><?php echo $consultant['ProjectConsultant']['value_hour_a']; ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_a']; ?></textarea>
			</td>
			<td class="edit">
				<?php echo $this->Form->input('ProjectConsultant.value_hour_b', array('type'=>'hidden')); ?>
				<p><?php echo $consultant['ProjectConsultant']['value_hour_b']; ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_b']; ?></textarea>	
			</td>
			<td class="edit">
			<?php echo $this->Form->input('ProjectConsultant.value_hour_c', array('type'=>'hidden')); ?>
				<p><?php echo $consultant['ProjectConsultant']['value_hour_c'];  ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_c']; ?></textarea>
			</td>
			<td class="edit">
			<?php echo $this->Form->input('ProjectConsultant.value_hour_group', array('type'=>'hidden')); ?>
				<p><?php echo $consultant['ProjectConsultant']['value_hour_group'];  ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_group']; ?></textarea>	
			</td>
			<td>
				<div id="actionsProject">
					<?php echo $this->Form->end('Salvar'); ?>
					<?php echo $this->Html->link(
					$this->Html->image("delete.png", array('alt' => 'Remover','title' => 'Remover Consultor')), array('action' => 'delete', ''),
					array('escape'=>false, 'id'=>'link'), "Confirmar exclusão do projeto ?");
					?>
				</div>
			</td>
			
		</tr>
		<?php } ?>
	</table>
	
</div>