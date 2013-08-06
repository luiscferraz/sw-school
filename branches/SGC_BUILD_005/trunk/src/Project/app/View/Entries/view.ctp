<h2>Apontamentos</h2>
<h3 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h3>
<h3 id="tituloatividade">Atividade - <?php echo $nome_atividade; ?></h3>
<!--<h2 id="tituloatividade">Atividade - <?php //echo $activity; ?></h2>-->

	<?php 
	if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
	
	echo '<span class="icon-action">';
	echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Deletar", 'title' => 'Excluir')),array('action' => 'delete', $entries['Entry']['id']),array('escape'=>false),"Você quer excluir realmente ?");
	echo '</span>';
	echo '<span class="icon-action">'; 
	echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Editar", 'title' => 'Editar')),array('action' => 'edit', $entries['Entry']['id'],$entries['Entry']['activity_id']),array('escape'=>false, 'id'=>'link'));
	echo '</span>';
	}
	?>
<!--</h1>-->


<div id="dados"> 
	<h3 id="titulodados"> Informações </h3>
	<p><span>Tipo consultoria: </span><?php echo $entries['Entry']['type_consulting']; ?></p>
	<p><span>Tipo: </span><?php echo $entries['Entry']['type']; ?></p>
	<p><span>Observações: </span><?php echo $entries['Entry']['observations']; ?></p>
</div>

<div id="dados">
	<h3 id="titulodados">Horários</h3>
	<p><span>Horas trabalhadas: </span> <?php echo $entries['Entry']['hours_worked']; ?></p>
	<p><span>Data: </span> <?php echo implode('-', array_reverse(explode('-', $entries['Entry']['date']))); ?></p>
</div>


<div id="dados"> 
	<h3 id="titulodados"> Dados </h3>
	<p><span>Consultor: </span><?php echo $nome_consultor_logado; ?></p>
	<p><span>Atividade: </span><?php echo $nome_atividade; ?></p>
</div>
