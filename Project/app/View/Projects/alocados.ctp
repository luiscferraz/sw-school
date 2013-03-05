

<h1>Consultores Alocados </h1>

<h3>Projeto -  <?php echo $nameProject ?></h2>
<div class="projectindex">
	<input type="button" value="Alocar Consultor" id="bt-alocar-consultor"  onclick='listConsultores();' />
	<table   class="zebra" cellpadding="0" cellspacing="0" id=" <?php echo $id_projeto; ?>">
		<tr>
			<th id="nameProject">Nome</th>
			<th>Valor Hora A </th>
			<th>Valor Hora B </th>
			<th>Valor Hora C </th>
			<th>Valor Hora A Grupo </th>
			<th>Valor Hora B Grupo </th>
			<th>Valor Hora C Grupo </th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			

			//print_r($nameConsultants);

			$i = 0;
			foreach ($consultants as $consultant) 
			{					
				

		?>

		<tr id="<?php echo $consultant['ProjectConsultant']['consultant_id']; ?>"> 
			<td id="nameTableProject">
				<?php 
				foreach ($nameConsultants as $key) {
					if ($key['Consultant']['id'] == $consultant['ProjectConsultant']['consultant_id'])
						echo $key['Consultant']['name'];
					}				
				?>
			</td>
			<td class="edit hora-a" >
				
				<p><?php echo $consultant['ProjectConsultant']['value_hour_a_individual']; ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_a_individual']; ?></textarea>
			</td>
			<td class="edit hora-b">
				
				<p><?php echo $consultant['ProjectConsultant']['value_hour_b_individual']; ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_b_individual']; ?></textarea>	
			</td>
			<td class="edit hora-c">
			
				<p><?php echo $consultant['ProjectConsultant']['value_hour_c_individual'];  ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_c_individual']; ?></textarea>
			</td>
			<td class="edit grupo-a">
			
				<p><?php echo $consultant['ProjectConsultant']['value_hour_a_group'];  ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_a_group']; ?></textarea>	
			</td>
			<td class="edit grupo-b">
			
				<p><?php echo $consultant['ProjectConsultant']['value_hour_b_group'];  ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_b_group']; ?></textarea>	
			</td>
			<td class="edit grupo-c">
			
				<p><?php echo $consultant['ProjectConsultant']['value_hour_c_group'];  ?></p>
				<textarea style="display:none"><?php echo $consultant['ProjectConsultant']['value_hour_c_group']; ?></textarea>	
			</td>
			<td>
				<div id="actionsProject">
					<?php //echo $this->Html->link(
					echo $this->Html->image("save.png", array('alt' => 'Salvar','title' => 'Salvar','id'=>$consultant['ProjectConsultant']['consultant_id'],'class'=>$consultant['ProjectConsultant']['id'], 'onclick'=>'salvar(this)')) //, array('#'),
					//array('escape'=>false, 'id'=>'link'));
					?>
					
					<?php echo $this->Html->link(
					$this->Html->image("delete.png", array('alt' => 'Remover','title' => 'Remover Consultor')), array('action' => 'deleteconsultor', $consultant['ProjectConsultant']['id']),
					array('escape'=>false, 'id'=>'link'), "Confirmar exclusão do projeto ?");
					?>
				</div>
			</td>
			
		</tr>
		<?php } ?>
	</table>
	
</div




