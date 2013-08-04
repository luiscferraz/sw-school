


<h2 id="titulo">
	Projeto - <?php echo $project['Project']['name']; ?> 
	<?php 
	if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
	
	echo '<span class="icon-action">';
	echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Deletar")),array('action' => 'delete', $project['Project']['id']),array('escape'=>false),"Você quer excluir realmente ?");
	echo '</span>';
	echo '<span class="icon-action">'; 
	echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$project['Project']['id'],array('escape'=>false));
	echo '</span>';
	}
	?>
</h2>

<div> 
	<fieldset id="dadosProjetoView">
		<h3 id="titulodados"> Dados Projeto </h3>
		<p><span>Sigla: </span> <?php echo $project['Project']['name']; ?></p>
		<p><span>Descrição: </span><?php echo $project['Project']['description']; ?></p>	
		<p><span>Projeto Pai: </span><?php echo $nameProjectFather; ?></p>
		<p><span>Empresa: </span><?php echo $nameCompany; ?>
		<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver')), array('action' => '../companies/view', $project['Project']['company_id']), array('escape'=>false, 'id'=>'link'))?>
	
		</p>
		<p><span>Gerente de projeto: </span><?php echo $nameConsultant; ?></p>
	</fieldset>

	<fieldset id="ViewhoraIndiv">
		<h3 id="titulodados"> Hora Individual </h3>
		<p><span>Hora A: </span><?php echo $project['Project']['a_hours_individual']; ?>h</span></p>
		<p><span>Hora B: </span><?php echo $project['Project']['b_hours_individual']; ?>h</p>
		<p><span>Hora C: </span><?php echo $project['Project']['c_hours_individual']; ?>h</p>
	</fieldset>

	<fieldset id="ViewhoraGrupo">
		<h3 id="titulodados"> Hora em grupo </h3>
		<p><span>Hora A: </span><?php echo $project['Project']['a_hours_group']; ?>h</span></p>
		<p><span>Hora B: </span><?php echo $project['Project']['b_hours_group']; ?>h</p>
		<p><span>Hora C: </span><?php echo $project['Project']['c_hours_group']; ?>h</p>
	</fieldset>

</div>




<h3 id="AtividadesEmProjetoPai">Atividades</h3>

<div class="activity index">

	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Descrição</th>
			<th class="responsive">Status</th>
			<th class="responsive">Data</th>
			<th class="actions">Visualizar Detalhadamente</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($activities as $activity){
				$class = null;
				if($i++ % 2 == 0){
					$class = 'class="altrow"';
				}
			
		?>

		<tr <?php echo $class; ?>>
			<td class="descrição"><?php echo $activity['Activity']['description']; ?></td>
			<td class="status"><?php echo $activity['Activity']['status']; ?></td>
			<td class="data"><?php echo $activity['Activity']['date']; ?></td>

			<div class="actions">
				<td>
					<?php
					if ($activity['Activity']['project_id']===$project['Project']['id']) {
						echo $this->html->link(
							$this->html->image("view.png", array('alt' => 'Ver')), array('action' => '../activities/view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'));
					}
					?>
				</td>
			</div>
		</tr>
		<?php } ?>
	</table>
	
</div>

<h3 id="title-subproj-view">Sub-projetos </h3>


<div class="projectindex">

	<table id="tableProject" cellpadding="0" cellspacing="0">
		<tr>
			<th id="nameProject">Nome</th>
			<th class="sigla responsive">Abreviação</th>
			<th class="empresa responsive">Empresa</th>
			<th class="horas responsive">Horas Individuais</th>
			<th class="horas responsive">Horas em Grupo</th>
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
			<td class=" horas responsive"><?php  echo $project['Project']['a_hours_individual']+$project['Project']['b_hours_individual']+$project['Project']['c_hours_individual']; ?>h</td>
			<td class=" horas responsive"><?php  echo $project['Project']['a_hours_group']+$project['Project']['b_hours_group']+$project['Project']['c_hours_group']; ?>h</td>
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