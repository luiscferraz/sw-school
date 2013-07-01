<h1 id="titulo">Apontamento - <?php echo $entries['Entry']['id']; ?> 
<!--<?php //echo $nome_projeto; ?>-->
	<?php 
	if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
	
	echo '<span class="icon-action">';
	echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Deletar")),array('action' => 'delete', $entries['Entry']['id']),array('escape'=>false),"Você quer excluir realmente ?");
	echo '</span>';
	echo '<span class="icon-action">'; 
	echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$entries['Entry']['id'],array('escape'=>false));
	echo '</span>';
	}
	?>
</h1>


<div id="dados"> 
	<h2 id="titulodados"> Informações </h2>
	<p><span>Tipo consultoria: </span><?php echo $entries['Entry']['type_consulting']; ?></p>
	<p><span>Tipo: </span><?php echo $entries['Entry']['type']; ?></p>
	<p><span>Observações: </span><?php echo $entries['Entry']['observations']; ?></p>
</div>

<div id="dados">
	<h2 id="titulodados">Horários</h2>
	<p><span>Horas trabalhadas: </span> <?php echo $entries['Entry']['hours_worked']; ?></p>
	<p><span>Data: </span> <?php echo $entries['Entry']['date']; ?></p>
	
</div>


<div id="dados"> 
	<h2 id="titulodados"> Dados </h2>
	<p><span>Consultor: </span><?php echo $nome_consultor_logado; ?></p>
	<p><span>Atividade: </span><?php echo $nome_atividade; ?></p>
</div>

