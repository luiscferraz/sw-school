<h2 id="titulo">Relatório Financeiro do Projeto <?php echo $financialPerProject[0]['projects']['name'] ?> </h2>

<div class="projectindex">

	<table id="tableProject" cellpadding="0" cellspacing="0">
		<tr>
			<!-- <th id="nameProject">Projeto</th> -->
			<th class="description">Descrição</th>
			<th class="type">Tipo</th>
			<th class="value">Valor</th>
			<!-- <th class="resto">Valores que Restaram</th> -->
		</tr>

		<?php
			
			$i = 0;
			$type = '';
			foreach ($financialPerProject as $key => $value) 
			{
				$class = null;

				if ($value['expenses']['type'] == 'e') {
					$type = 'Entrada';
				}
				else{
					$type = 'Saída';
				}
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td class="description"><?php echo $value['expenses']['description']; ?></td>
			<td class="type"><?php echo $type; ?></td>
			<td class="value"><?php echo $value['expenses']['value']; ?></td>
			
		</tr>
		<?php } ?>
	</table>
	<br>Total Entrada <?php  echo $sumInput[0][0]['SUM(expenses.value)']; ?></br>
	<br>Total Saída <?php  echo $sumOutput[0][0]['SUM(expenses.value)']; ?></br>
	<br>Diferença Total <?php  echo $sumInput[0][0]['SUM(expenses.value)'] - $sumOutput[0][0]['SUM(expenses.value)']; ?></br>
	
</div>