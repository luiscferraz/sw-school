<?php //print_r($financialAll);
		//echo "";
		//echo "";
		//print_r($sumOutput);
		//echo "";
		//echo "";
		//print_r($sumInput);
		?>

<h2 id="titulo">Relatório Financeiro Geral </h2>

<div class="projectindex">

	<table id="tableProject" cellpadding="0" cellspacing="0">
		<tr>
			<th id="nameProject">Projeto</th>
			<th id="description">Descrição</th>
			<th class="input">Valores que Entraram</th>
			<th class="output">Valores que Saíram</th>
			<th class="resto">Valores que Restaram</th>
		</tr>

		<?php
			
			$i = 0;
			$id = -1;
			$totalEntrada = 0;
			$totalSaida = 0;
			$restoTotal = 0;
			foreach ($financialAll as $key => $value) 
			{
				$class = null;

				if ($value['projects']['id'] == $id) {
					continue;
				}
				else{
					$id = $value['projects']['id'];
				}

				$totalEntrada += $sumInput[$value['projects']['id']][0][0]['SUM(expenses.value)'];
				$totalSaida += $sumOutput[$value['projects']['id']][0][0]['SUM(expenses.value)'];
				$restoTotal += ($sumInput[$value['projects']['id']][0][0]['SUM(expenses.value)'] - $sumOutput[$value['projects']['id']][0][0]['SUM(expenses.value)']);
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td id="nameTableProject"><?php echo $value['projects']['name']; ?></td>
			<td id="description"><?php echo $value['projects']['description']; ?></td>
			<td class="input"><?php echo $sumInput[$value['projects']['id']][0][0]['SUM(expenses.value)']; ?></td>
			<td class="output"><?php echo $sumOutput[$value['projects']['id']][0][0]['SUM(expenses.value)']; ?></td>
			<?php $resto = $sumInput[$value['projects']['id']][0][0]['SUM(expenses.value)'] - $sumOutput[$value['projects']['id']][0][0]['SUM(expenses.value)'];?>
			<td class="resto"><?php  echo $resto; ?></td>
			
		</tr>
		<?php } ?>
	</table>
	<br>Total Entrada <?php  echo $totalEntrada; ?></br>
	<br>Total Saída <?php  echo $totalSaida; ?></br>
	<br>Resto Total <?php  echo $restoTotal; ?></br>
	
</div>