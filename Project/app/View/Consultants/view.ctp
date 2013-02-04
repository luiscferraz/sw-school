
<h1 id="titulo">Consultor - <?php echo $consultant['Consultant']['name']; ?> 
<?php 
	if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
	
	echo '<span class="icon-action">';
	echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Deletar")),array('action' => 'delete', $consultant['Consultant']['id']),array('escape'=>false),"Você quer excluir realmente ?");
	echo '</span>';
	echo '<span class="icon-action">'; 
	echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$consultant['Consultant']['id'],array('escape'=>false));
	echo '</span>';
	}
	?>
</h1>

<div id="dados"> 
	<h2 id="titulodados"> Dados Pessoais </h2>
	<p><span>Nome: </span> <?php echo $consultant['Consultant']['name']; ?></p>
	<p><span>CPF: </span><?php echo $consultant['Consultant']['cpf']; ?></p>
	<p><span>Abreviação: </span><?php echo $consultant['Consultant']['acronym']; ?></p>
	<p><span>Cor: </span><spam id="colorview" style="background-color:<?php echo $consultant['Consultant']['acronym_color']; ?>"><?php echo $consultant['Consultant']['acronym_color']; ?></spam></p>
	<p><span>Telefone: </span><?php echo $consultant['Consultant']['phone1']; ?></p>
	<p><span>Celular: </span><?php echo $consultant['Consultant']['phone2']; ?></p>
	<p><span>E-mail: </span><?php echo $consultant['Consultant']['email']; ?></p>
</div>

<div id="endereco">
	<h2 id="tituloendereco">Endereço</h2>
	<p><span>Endereço: </span><?php echo $consultant['Address']['address']; ?></p>
	<p><span>Número: </span><?php echo $consultant['Address']['number']; ?></p>
	<p><span>Complemento: </span><?php echo $consultant['Address']['complement']; ?></p>
	<p><span>Bairro: </span><?php echo $consultant['Address']['neighborhood']; ?></p>
	<p><span>CEP: </span><?php echo $consultant['Address']['zip_code']; ?></p>
	<p><span>Cidade: </span><?php echo $consultant['Address']['city']; ?></p>
	<p><span>Estado: </span><?php echo $consultant['Address']['state']; ?></p>
</div>

<div id='consultant'>
	<?php echo $this->Html->image('consultant.jpg')?>
</div>

<table class="tabela-vazia" cellpadding="0" cellspacing="0">
		<tr>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Sigla</th>
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
			<td><?php echo $project['projects']['name']; ?></td>
			<td><?php echo $project['projects']['description']; ?></td>
			<td><?php echo $project['projects']['acronym']; ?></td>
			<div>
				<td class="actions">
					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver')),
					array('action' => '../projects/view', $project['projects']['id']),
					array('escape'=>false, 'class'=>'link'))?>
				</td>
			</div>
		</tr>
		<?php } ?>
	</table>