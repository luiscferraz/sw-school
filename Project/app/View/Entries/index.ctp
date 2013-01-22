<div class="entry index">

	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Tipo</th>
			<th class="responsive">Data</th>
			<th class="responsive">Horas Trabalhadas</th>
			<th class="responsive">Consultor</th>
			<th class="responsive">Atividade</th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($entries as $entry) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td class="tipo"><?php echo $entry['Entry']['type_consulting']; ?></td>
			<td class="data"><?php echo $entry['Entry']['date']; ?></td>
			<td class="horas trabalhadas"><?php echo $entry['Entry']['hours_worked']; ?></td>
			<td class="atividade"><?php echo $entry['Activity']['type']; ?></td>
			<td class="consultor"><?php echo $entry['Consultant']['name']; ?></td

			<div class="actions">
				<td>
					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver')), array('action' => 'view', $entry['Entry']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("edit.png", array('alt' => 'Editar')), array('action' => 'edit', $entry['Entry']['id']),
					array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("delete.png", array('alt' => 'Remover')), array('action' => 'delete', $entry['Entry']['id']),
					array('escape'=>false, 'id'=>'link'), "Confirmar exclusão do apontamento?");
					?></td>
			</div>
		</tr>
		<?php } ?>
	</table>
	
</div>