<h3>Pesquisa de Consultores</h3>	
<input type='text' placeholder="Pesquisar por cpf" id="pesq-cpf" class="pesquisa" onkeypress='ListGerenteCPF(this)'>
<input type='text' placeholder="Pesquisar por nome" id="pesq-nome" class="pesquisa"  onkeypress='ListGerenteNome(this)'>
<table id="tabela-pesquisa">
	<tr class="altrow">
		<th class="nome">CPF </th>
		<th class="nome">Nome</th>
		<th class="nome">Add</th>	
	</tr>
<?php foreach( $consultants as $consultant) { 
		
		echo '<tr> ' .
				'<td>' .
				$consultant['Consultant']['cpf'].
				'</td>'.
				'<td>'.
				$consultant['Consultant']['name'].
				'</td>'.
				'<td>'.
				$this->Html->link(
					$this->Html->image("test-pass-icon.png", array('alt' => 'Editar')), array('action' => 'edit',$consultant['Consultant']['id']),
					array('escape'=>false, 'id'=>'link')).
				'</td>'.
			'</tr>';			
	}   ?>

</table>