<h3>Pesquisa de Consultores</h3>	
<input type='text' placeholder="Pesquisar por nome" id="pesq-nome" class="pesquisa"  onkeypress='ListGerenteNome(this)'>
<table  class="zebra" id="tabela-pesquisa">
	<tr class="altrow">
		<th class="nome">Nome</th>
		<th class="nome">Add</th>	
	</tr>
<?php foreach( $consultants as $consultant) { 
		
		echo '<tr> ' .

				'<td>'.
				$consultant['Consultant']['name'].
				'</td>'.
				'<td>'.
				
					 $this->Html->image("test-pass-icon.png", array('alt' => 'Editar','onclick'=>'addConsultorGerente('.$consultant['Consultant']['id'].',"'.$consultant['Consultant']['name'].'")'))
					.'</td>'.
			'</tr>';			
	}   ?>

</table>