<h1 id="titulo">Atividade - <?php echo $activities['Activity']['id']; ?> 
	<span class="icon-action"><?php echo $this->Html->link(
		$this->Html->image("delete.png", array("alt" => "Deletar")),
		array('action' => 'delete', $activities['Activity']['id']),
		array('escape'=>false),"Você quer excluir realmente ?");?>
	</span>
	<span class="icon-action"> <?php echo $this->Html->link(
		$this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$activities['Activity']['id'],
		array('escape'=>false)) ?>
	</span> 
</h1>


<div id="dados"> 
	<h2 id="titulodados"> Informações </h2>
	<p><span>Descrição: </span><?php echo $activities['Activity']['type']; ?></p>
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

