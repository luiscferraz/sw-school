<p align="center">Pesquisa de Consultores</p>	
<p align="center">
<input id="pesq-nome" type='text' placeholder="Pesquisar por nome" onkeypress='ListConsultorNome(this)'>
</p>
<table id="tabela-pesquisa" align="center">

	<tr class="altrow">
		<th class="nome">Nome</th>
		<th class="nome">Sigla</th>		
	</tr>
<?php foreach( $consultants as $consultant) { 
		
		echo '<tr> ' .
				'<td>'.
				$consultant['Consultant']['name'].
				'</td>'.
				'<td bgcolor="'.$consultant['Consultant']['acronym_color'].'">'.
				$consultant['Consultant']['acronym'].
				'</td>'.
			'</tr> ';			
	}   ?>

</table>