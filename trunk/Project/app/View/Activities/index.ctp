<?php
header('Content-Type: text/html; charset=UTF-8');
?>
	<table class="zebra" id="tabela_atividades" cellpadding="0" cellspacing="0">
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
					foreach($attachments as $attachment){
						
						$list_attachments[$attachment['Attachment']['id']] = $attachment['Attachment']['file_name'];
						
						
					}
				}
					
							
		?>

		<tr <?php echo $class; ?>>

			<td class="descrição"><?php echo $activity['Activity']['description']; ?></td>
			<td class="status"><?php echo $activity['Activity']['status']; ?></td>
			<td class="data"><?php echo $activity['Activity']['date']; ?></td>

			
				<td>
					<div class="actions">
					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver')), array('action' => 'view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php 
						if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
							echo $this->Html->link($this->Html->image("edit.png", array('alt' => 'Editar')), array('action' => 'edit', $activity['Activity']['id']),
							array('escape'=>false, 'id'=>'link'));
						}
					?>					
					                							
					<?php 
						if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
							echo $this->Html->link($this->Html->image("delete.png", array('alt' => 'Remover')), array('action' => 'delete', $activity['Activity']['id']),
							array('escape'=>false, 'id'=>'link'), "Confirmar exclusão da atividade?");
						}
					?>
					
					
					
					<?php echo $this->Html->image("attachment.png",array('alt'=>'Anexar','onClick'=>'ListAttachments('.$activity['Activity']['id'].')'));?>

					<a href="\Entries\add"><img src="..\img\clock.png" alt="Apontar" id="btnRelogio"></a>
					
					
					<!--<input id="botaoAnexo" type="button" value="Anexar" onClick='ListAttachments(<?php $attachment['Attachment']['activity_id'] ?>);' <img src="img/attachment.png" /></input> -->

					</div>
				</td>
			
		</tr>
		<?php } ?>
	</table>
