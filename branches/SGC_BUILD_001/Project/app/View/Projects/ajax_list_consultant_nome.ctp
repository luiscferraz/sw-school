<table  class="zebra" id="tabela-pesquisa">
	<tr class="altrow">
		<th class="nome">Nome</th>
		<th class="nome">Add</th>	
	</tr>
<?php  foreach( $consultants as $consultant) { 

		echo '<tr> ' .
				'<td>'.
				$consultant['consultants']['name'].
				'</td>'.
				'<td>'.
				$this->Html->link(
					$this->Html->image("test-pass-icon.png", array('alt' => 'Editar')), array('action' => 'edit',$consultant['consultants']['id']),
					array('escape'=>false, 'id'=>'link')).
				'</td>'.
			'</tr>';			
	}   ?>
