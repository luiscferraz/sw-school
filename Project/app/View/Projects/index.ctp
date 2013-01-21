
<div class="projectindex">

	<table id="tableProject" cellpadding="0" cellspacing="0">
		<tr>
			<th id="nameProject">Nome</th>
			<th class="sigla responsive">Abreviação</th>
			<th class="empresa responsive">Empresa</th>
			<th class="horas responsive">Horas</th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($projects as $project) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td id="nameTableProject"><?php echo $project['Project']['name']; ?></td>
			<td class="sigla responsive"><?php echo $project['Project']['acronym']; ?></td>
			<td class="empresa responsive"><?php echo $project['Company']['name']; ?></td>
			<td class=" horas responsive"><?php  echo $project['Project']['a_hours']+$project['Project']['b_hours']+$project['Project']['c_hours']; ?></td>
			<td>
				<div id="actionsProject">
					<?php echo $this->Html->link(
					$this->Html->image("consultor.png", array('alt' => 'Consultores Alocados','title' => 'Consultores Alocados')), array('action' => 'alocados',$project['Project']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver','title' => 'Ver Projeto')), array('action' => 'view', $project['Project']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("edit.png", array('alt' => 'Editar', 'title'=>'Editar Projeto')), array('action' => 'edit', $project['Project']['id']),
					array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("delete.png", array('alt' => 'Remover','title' => 'Remover Projeto')), array('action' => 'delete', $project['Project']['id']),
					array('escape'=>false, 'id'=>'link'), "Confirmar exclusão do projeto ". $project['Project']['name'] . "?");
					?>
				</div>
			</td>
			
		</tr>
		<?php } ?>
	</table>
	
</div>