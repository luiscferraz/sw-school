

<?php ?>

<?php 
	if($_POST) { 
		
?>		<table class="zebra">
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
								<?php echo ($consultant['project_consultants']['value_hour_'.strtolower($consultant['entries']['type_consulting']).'_individual'] * $consultant['entries']['hours_worked']);
								?>
							</td>
						<?php } else {?>
							<td>
								<?php echo ($consultant['project_consultants']['value_hour_'.strtolower($consultant['entries']['type_consulting']).'_group'] * $consultant['entries']['hours_worked']);
								?>
							</td>
						<?php } ?>
					</tr>
			<?php } ?>	
			</tbody>
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