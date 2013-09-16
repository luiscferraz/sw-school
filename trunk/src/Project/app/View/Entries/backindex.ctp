<a href="../../activities/index/<?php echo $id_projeto ?>" class="botao" alt="Voltar">Voltar </a>
<h3 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h3>
<h3 id="tituloatividade">Atividade - <?php echo $activity; ?></h3>




<div class="entry index">

	<table  class="zebra" cellpadding="0" cellspacing="0">
		<tr>
			<th class="responsive">Consultor</th>
			<th class="responsive">Data</th>			
		</tr>

		<?php
			
			$i = 0;
			foreach ($entries as $entry) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>



		<tr <?php echo $class; ?>>
			<td class="consultor"></td>
			<td class="data"></td>
			
			
		</tr>
		<?php } ?>
	</table>
	
</div>
