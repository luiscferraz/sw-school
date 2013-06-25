<table id="tabela-pesquisa" align="center">
	<tr class="altrow">
		<th class="nome">Nome</th>
		<th class="nome">Sigla</th>		
	</tr>
<?php  foreach( $consultants as $consultant) { 

		echo '<tr> ' .
				'<td>'.
				$consultant['consultants']['name'].
				'</td>'.
				'<td bgcolor="'.$consultant['consultants']['acronym_color'].'">'.
				$consultant['consultants']['acronym'].
				'</td>'.
			'</tr> ';			
	}   ?>
