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
		?></td>

		<td class="horas_trabalhadas"><?php
		foreach ($entries as $entry) {
			if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
				echo $entry['Entry']['hours_worked'];
				}
			}
		?></td>

		<td class="datas"><?php
		foreach ($entries as $entry) {
			if ($entry['Entry']['activity_id']===$activities['Activity']['id']) {
				echo $entry['Entry']['date'];
				}
			}
		?></td>
    </table>
</div>