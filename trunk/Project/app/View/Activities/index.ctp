﻿<div class="activity index">

	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Descrição</th>
			<th class="responsive">Status</th>
			<th class="responsive">Data</th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($activities as $activity) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td class="descrição"><?php echo $activity['Activity']['description']; ?></td>
			<td class="status"><?php echo $activity['Activity']['status']; ?></td>
			<td class="data"><?php echo $activity['Activity']['date']; ?></td>

			<div class="actions">
				<td>
					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver')), array('action' => 'view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("edit.png", array('alt' => 'Editar')), array('action' => 'edit', $activity['Activity']['id']),
					array('escape'=>false, 'id'=>'link'))?>
					
                 							
					<?php echo $this->Html->link(
					$this->Html->image("attachment.png", array('alt' => 'Anexar','onClick' => 'ListAttachments('.$activity['Activity']['id'].')')));
					?> 

					<?php echo $this->Html->link(
					$this->Html->image("delete.png", array('alt' => 'Remover')), array('action' => 'delete', $activity['Activity']['id']),
					array('escape'=>false, 'id'=>'link'), "Confirmar exclusão da atividade?");
					?></td>
			</div>
		</tr>
		<?php } ?>
	</table>
	
</div>