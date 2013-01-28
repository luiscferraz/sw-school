
<div id="consultantindex">

	<table class="tabela-vazia" cellpadding="0" cellspacing="0">
		<tr>
			<th>Nome</th>
			<th class="cpf responsive">CPF</th>
			<th class="email responsive">Email</th>
			<th class="telefone responsive">Telefone 1</th>
			<th class="telefone2 responsive">Telefone 2</th>
			<th class="corsigla responsive">Cor-Sigla</th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($consultants as $consul) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td class="nome"><?php echo $consul['Consultant']['name']; ?></td>
			<td class="cpf responsive"><?php echo $consul['Consultant']['cpf']; ?></td>
			<td class="email responsive"><?php echo $consul['Consultant']['email']; ?></td>
			<td class="telefone responsive"><?php echo $consul['Consultant']['phone1']; ?></td>
			<td class="telefone responsive"><?php echo $consul['Consultant']['phone2']; ?>
			<td class="cor responsive" style="background-color:<?php echo $consul['Consultant']['acronym_color']; ?>"><?php echo $consul['Consultant']['acronym_color']; ?>
			<div>
				<td class="actions">
					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver')),
					array('action' => 'view', $consul['Consultant']['id']),
					array('escape'=>false, 'class'=>'link'))?>

					<?php 
					if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
					echo $this->Html->link($this->Html->image("edit.png",array('alt' => 'Editar')),
					array('action' => 'edit', $consul['Consultant']['id']),
					array('escape'=>false, 'class'=>'link'));
					}
					?>

					<?php 
					if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
					echo $this->Html->link($this->Html->image("delete.png",array('alt' => 'Remover')),
					array('action' => 'delete', $consul['Consultant']['id']),
					array('escape'=>false, 'class'=>'link'),
					"Confirmar exclusão do consultor ". $consul['Consultant']['name'] . "?");
					}
					?></td>
			</div>
		</tr>
		<?php } ?>
	</table>
	
</div>
