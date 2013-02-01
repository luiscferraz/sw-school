<h1 id="titulo">Atividade - <?php echo $activities['Activity']['id']; ?> 

<?php 
	if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
	
	echo '<span class="icon-action">';
	echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Deletar")),array('action' => 'delete', $activities['Activity']['id']),array('escape'=>false),"Você quer excluir realmente ?");
	echo '</span>';
	echo '<span class="icon-action">'; 
	echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$activities['Activity']['id'],array('escape'=>false));
	echo '</span>';
	}
	?>
	
</h1>


<div id="dados"> 
	<h2 id="titulodados"> Informações </h2>
	<p><span>Descrição: </span><?php echo $activities['Activity']['description']; ?></p>
	<p><span>Status: </span><?php echo $activities['Activity']['status']; ?></p>
	<p><span>Observações: </span><?php echo $activities['Activity']['observations']; ?></p>
	<p><span>Consultores: </span></p>
	<p><?php echo $consultor1 ?></p>
	<p><?php echo $consultor2 ?></p>
	<p><?php echo $consultor3 ?></p>
	<p><?php echo $consultor4 ?></p>
</div>

<div id="dados">
	<h2 id="titulodados">Horários</h2>
	<p><span>Hora inicial: </span> <?php echo $activities['Activity']['start_hours']; ?></p>
	<p><span>Hora final: </span> <?php echo $activities['Activity']['end_hours']; ?></p>
	<p><span>Data: </span> <?php echo $activities['Activity']['date']; ?></p>
</div>

<h2 id="ApontamentosEmAtividades">
	Apontamentos 
</h2>

<div class="entry_index">

	<table cellpadding="0" cellspacing="0">
		<tr>
			<th class="responsive">Consultor</th>
			<th>Tipo</th>
			<th class="responsive">Horas Trabalhadas</th>
			<th class="responsive">Data</th>			
			<th class="actions">Ações</th>
			<th class="responsive">Aprovação</th>
		</tr>

		<td class="nome"><?php
		foreach ($entries as $entry) {
			if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
				echo $entry['Consultant']['name'];
				}
			}
		?>

		</td>

		<td class="tipo"><?php
		foreach ($entries as $entry) {
			if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
				echo $entry['Entry']['type_consulting'];
				}
			}
		?>

		</td>

		<td class="horas_trabalhadas"><?php
		foreach ($entries as $entry) {
			if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
				echo $entry['Entry']['hours_worked'];
				}
			}
		?>

		</td>

		<td class="datas"><?php
		foreach ($entries as $entry) {
			if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
				echo $entry['Entry']['date'];
				}
			}
		?>

		</td>

		<div class="actions">
				<td>
					<?php 
						foreach ($entries as $entry) {
							if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
								echo $this->html->link(
									$this->html->image("view.png", array('alt' => 'Ver')), array('action' => '../entries/view', $entry['Entry']['id']), array('escape'=>false, 'id'=>'link'));
							}
						}
					?>

					<?php 
						foreach ($entries as $entry) {
							if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
								echo $this->html->link(
									$this->html->image("edit.png", array('alt' => 'Editar')), array('action' => '../entries/edit', $entry['Entry']['id']), array('escape'=>false, 'id'=>'link'));
							}
						}
					?>

					<!--<?php echo $this->Html->link(
					$this->Html->image("attachment.png", array('alt' => 'Anexar')), array('onClick' => 'ListAttachments('.$activity['Activity']['id'].')'),
					array('escape'=>false, 'id'=>'link'));?> -->
					
					<input id="link" type="button" value="Anexar" onclick='ListAttachments();'>

					<!--<?php
						foreach ($activities as $activity) {
							if ($activity['Activity']['project_id']===$project['Project']['id']) {
						echo $this->Html->link(
						$this->Html->image("delete.png", array('alt' => 'Remover')), array('action' => 'delete', $activity['Activity']['id']),array('escape'=>false, 'id'=>'link'), "Confirmar exclusão da atividade?");
						}
							}
								?> -->
				</td>
			</div>

    </table>
</div>