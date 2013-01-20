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
			<td id="nameTableProject"><?php echo $consultant['ProjectConsultant']['consultant_id']; ?></td>
			<td class="sigla"><?php echo $consultant['ProjectConsultant']['value_hour_a']; ?></td>
			<td class="empresa"><?php echo $consultant['ProjectConsultant']['value_hour_b']; ?></td>
			<td class="horas"><?php echo $consultant['ProjectConsultant']['value_hour_c'];  ?></td>
			<td class="horas"><?php echo $consultant['ProjectConsultant']['value_hour_group'];  ?></td>
			<td>
				<div id="actionsProject">
					
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