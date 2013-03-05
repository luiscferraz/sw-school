

<?php ?>

<?php 
	if($_POST) { 
		
?>		
		<h1><?php echo $name['Consultant']['name'] ; ?></h1>
		<table class="zebra">
			<thead>
				<tr>
					<th>Nome do Projeto</th>
					<th>Atividade</th>
					<th>Tipo Consultoria</th>
					<th>Modo</th>
					<th>Data</th>
					<th>Horas trabalhadas</th>
					<th>Valor</th>
				</tr>
			</thead>
			<tbody>
			<?php $totalvalor = 0; $totalhoras = 0; ?>
			<?php foreach ($consultants as $consultant) { ?>

					<tr>

						<Td><?php echo $consultant['projects']['project_name'] ?></td>
						<td></td>	
						<td><?php echo $consultant['entries']['type_consulting'] ?></td>
						<td><?php echo $consultant['entries']['type'] ?></td>
						<td><?php echo $consultant['entries']['date'] ?></td>
						<td><?php echo $consultant['entries']['hours_worked'] ?></td>
						<?php if($consultant['entries']['type'] == 'Individual'){ ?>
							<td>
								<?php $valor =  ($consultant['project_consultants']['value_hour_'.strtolower($consultant['entries']['type_consulting']).'_individual'] * $consultant['entries']['hours_worked']);
									echo $valor;
								?>
							</td>
						<?php } else {?>
							<td>
								<?php $valor = ($consultant['project_consultants']['value_hour_'.strtolower($consultant['entries']['type_consulting']).'_group'] * $consultant['entries']['hours_worked']);
									echo $valor;
								?>
							</td>
						<?php } ?>
					</tr>
			<?php 
				$totalhoras += $consultant['entries']['hours_worked'];
				$totalvalor += $valor;  ?>
			<?php } ?>	
			</tbody>
			<thead>
				<tr>
					<th>Total:</th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><?php echo $totalhoras ?></th>
					<th><?php echo $totalvalor ?></th>
				</tr>
			</thead>
		</table>
<?php	 }
	else{ ?>
		<form method="post" action="">
			<select name="id">
				<?php foreach ($consultants as $consultant) {
					print_r($consultant);
					echo '<option value="'.$consultant['Consultant']['id'].'">'.$consultant['Consultant']['name'].'</option>';
				} ?>
			</select>
			<input type="submit" value="Gerar relatório">
		</form>
	<?php }; ?>