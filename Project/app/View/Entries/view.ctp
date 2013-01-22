<h1 id="titulo">Apontamento - <?php echo $entries['Entry']['id']; ?> 
	<span class="icon-action"><?php echo $this->Html->link(
		$this->Html->image("delete.png", array("alt" => "Deletar")),
		array('action' => 'delete', $entries['Entry']['id']),
		array('escape'=>false),"Você quer excluir realmente ?");?>
	</span>
	<span class="icon-action"> <?php echo $this->Html->link(
		$this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$entries['Entry']['id'],
		array('escape'=>false)) ?>
	</span> 
</h1>


<div id="dados"> 
	<h2 id="titulodados"> Informações </h2>
	<p><span>Tipo: </span><?php echo $entries['Entry']['type_consulting']; ?></p>
	<p><span>Observações: </span><?php echo $entries['Entry']['observations']; ?></p>
</div>

<div id="dados">
	<h2 id="titulodados">Horários</h2>
	<p><span>Data: </span> <?php echo $entries['Entry']['date']; ?></p>
	<p><span>Horas trabalhadas: </span> <?php echo $entries['Entry']['hours_worked']; ?></p>
</div>


<div id="dados"> 
	<h2 id="titulodados"> Dados </h2>
	<p><span>Consultor: </span><?php echo $nome_consultor_logado; ?></p>
	<p><span>Atividade: </span><?php echo $nome_atividade; ?></p>
</div>

