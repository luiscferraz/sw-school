<p align="center"><b>Pesquisa de Consultores</b></p>	
<p align="center">
<input id="pesq-nome" type='text' placeholder="Pesquisar por nome" onkeypress='ListConsultorNome(this)'>
</p>
<table id="tabela-pesquisa" align="center">

	<tr class="altrow">
		<th class="nome"><b>Nome</b></th>
		<th class="nome"><b>Sigla</b></th>		
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