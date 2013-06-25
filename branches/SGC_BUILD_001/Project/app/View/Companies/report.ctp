

<div class="company report">

	<table cellpadding="0" class="zebra" cellspacing="0">
		<tr>
			<th>Nome</th>
			<th class="responsive">Sigla</th>
			<th class="responsive">CNPJ</th>
			<th class="responsive">Telefone1</th>
			<th class="responsive">Telefone2</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($companies as $company) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
				}
					
							
		?>

		<tr <?php echo $class; ?>>
			<td class="nome"><?php echo $company['Company']['name']; ?></td>
			<td class="sigla responsive"><?php echo $company['Company']['acronym']; ?></td>
			<td class="cnpj responsive"><?php echo $company['Company']['cnpj']; ?></td>
			<td class="telefone1 responsive"><?php echo $company['Company']['phone1']; ?></td>
			<td class="telefone2 responsive"><?php echo $company['Company']['phone2']; ?></td>

		</tr>
		<?php } ?>
	</table>
	
</div>