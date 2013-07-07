
<div class="projectindex">

	<table id="tableProject" class="zebra" cellpadding="0" cellspacing="0">
		<tr>
			<th id="nameProject">Nome</th>
			<th class="sigla responsive">Sigla</th>
			<th class="empresa responsive">Empresa</th>
			<th class="horas responsive">Hora Individual A</th>
			<th class="horas responsive">Hora Individual B</th>
			<th class="horas responsive">Hora Individual C</th>
			<th class="horas responsive">Hora em Grupo A</th>
			<th class="horas responsive">Hora em Grupo B</th>
			<th class="horas responsive">Hora em Grupo C</th>

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
			<td class=" horas responsive"><?php  echo $project['Project']['a_hours_individual']; ?></td>
			<td class=" horas responsive"><?php  echo $project['Project']['b_hours_individual']; ?></td>
			<td class=" horas responsive"><?php  echo $project['Project']['c_hours_individual']; ?></td>
			<td class=" horas responsive"><?php  echo $project['Project']['a_hours_group']; ?></td>
			<td class=" horas responsive"><?php  echo $project['Project']['b_hours_group']; ?></td>
			<td class=" horas responsive"><?php  echo $project['Project']['c_hours_group']; ?></td>
			<td id="actionsProject">
				<div id="actionsProject">
					<?php 
					if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
					echo $this->Html->link(
					$this->Html->image("consultor.png", array('alt' => 'Consultores Alocados','title' => 'Consultores Alocados')), array('action' => 'alocados',$project['Project']['id']), array('escape'=>false, 'id'=>'link'));
					}
					?>

					<?php echo $this->Html->link(
					$this->Html->image("rel.png", array('alt' => 'Relatórios','title' => 'Relatórios')), array('action' => 'reports',$project['Project']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("financial.png", array('alt' => 'Centro de Custos','title' => 'Centro de Custos')), array('action' => 'financial',$project['Project']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver','title' => 'Ver Projeto')), array('action' => 'view', $project['Project']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php 
					if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
					echo $this->Html->link($this->Html->image("edit.png", array('alt' => 'Editar', 'title'=>'Editar Projeto')), array('action' => 'edit', $project['Project']['id']),
					array('escape'=>false, 'id'=>'link'));
					}
					?>

					<?php 
					if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
					echo $this->Html->link($this->Html->image("delete.png", array('alt' => 'Remover','title' => 'Remover Projeto')), array('action' => 'delete', $project['Project']['id']),
					array('escape'=>false, 'id'=>'link'), "Confirmar exclusão do projeto ". $project['Project']['name'] . "?");
					}
					?>
				</div>
			</td>
			
		</tr>
		<?php } ?>
	</table>
	
</div>