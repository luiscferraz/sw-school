
<?php
if( !isset($data_inicial)){
	$data_inicial = date('d-m-Y');
}
if( !isset($data_final)){
	$data_final = date('d-m-Y'); 
}
if( !isset($tipo)){
	$tipo = 'A'; 
}
if( !isset($tipo_consultoria)){
	$tipo_consultoria = 'Individual'; 
}
if( !isset($rel)){
	$rel = 'Projeto'; 
}
?>
<div class="none form_relatorio" >
<form method="post" action="reports">
	<b>Por : </b><select name="rel" style="width:15%" ?> ><option value="Projeto" <?php if ($rel == "Projeto") echo "selected='selected'";?>>Projeto</option>
								  <option value="Consultor" <?php if ($rel == "Consultor") echo "selected='selected'";?>>Consultor</option></select></br>
	<b>De : </b><input id="data-inicial" type="text" style="width:auto" value=<?php echo $data_inicial; ?> name="data_inicial" />
	<b>Até : </b><input id="data-final" type="text" style="width:auto" value=<?php echo $data_final; ?> name="data_final"  /><br>
	<b>Tipo : </b><select name="tipo" style="width:14%" ?> ><option value="Individual" <?php if ($tipo == "Individual") echo "selected='selected'";?>>Individual</option><option value="Grupo" <?php if ($tipo == "Grupo") echo "selected='selected'";?>>Grupo</option></select><br>
	<b>Tipo de Consultoria : </b><select name="tipo_consultoria" style="width:9%" ><option value="A" <?php if ($tipo_consultoria == "A") echo "selected='selected'";?> >A</option>
														  <option value="B" <?php if ($tipo_consultoria == "B") echo "selected='selected'";?>>B</option>
														  <option value="C" <?php if ($tipo_consultoria == "C") echo "selected='selected'";?>>C</option></select><br>
	<input class="botao" id="botao_relatorio_proj" type="submit" value="Aplicar" />
</form>
</div>

<?php if (($tabela <> False) and ($rel == 'Projeto')) {
?>
<div>
	<b><a id="gerar_pdf" href="#" onclick="window.print();"> Imprimir </a></b>
	<h3>Relatório de Acompanhamento de Apontamento de horas</h3>
	<table border = "3" cellpadding="0" cellspacing="0">
		<tr>
			<th class="bordaTabela" id="cor_header">Projeto</th>
			<th class="bordaTabela" id="cor_header">Consultor</th>
			<?php while (list($key, $val) = each($vetorData)) {  
			echo '<th class="bordaTabela" id="cor_header">'.$key.'</th>';  
			}
			?>
		</tr>
		
		<?php while (list($key, $val) = each($resultado)) {  ?>
			<tr>
				<td class="bordaTabela" id="cor_horaInd" colspan = "2" ><?php echo $key; ?></td><?php while (list($key4, $val4) = each( $resultado[$key]['meses'])) { ?> <td class="bordaTabela" id="cor_horaInd"><?php echo $val4; ?></td><?php } ?>
			</tr>
			<tr>
				
				<?php while (list($key2, $val2) = each($resultado[$key]['consultores'])) { ?>
				<tr><td class="bordaTabela" id="cor_saldo"></td><td  class="bordaTabela" id="cor_saldo"><?php echo $key2; ?></td> <?php while (list($key3, $val3) = each( $resultado[$key]['consultores'][$key2])) { ?> <td class="bordaTabela" id="cor_saldo"><?php echo $val3; ?></td><?php } ?></tr>
		
		<?php } ?>
			</tr>
		<?php } 

			echo '<tr class="bordaTabela" id="cor_header" >';
			
			echo '<td colspan = '.(count($vetorData)+1).'></td>';
			echo '<td>Total:'.$total_geral.'</td></tr>';	

		?>
		
	</table>
	
</div>
<?php } ?>

<?php if (($tabela <> False) and ($rel == 'Consultor')) {
?>
<div>
	<a id="gerar_pdf" href="#" onclick="window.print();"> Imprimir </a>
	<h3>Relatório de Acompanhamento de Apontamento de Horas</h3>
	<table border = "3" cellpadding="0" cellspacing="0">
		<tr>
			<th class="bordaTabela" id="cor_header">Consultor</th>
			<th class="bordaTabela" id="cor_header">Projeto</th>
			<?php while (list($key, $val) = each($vetorData)) {  
			echo '<th class="bordaTabela" id="cor_header">'.$key.'</th>';  
			}
			?>
		</tr>
		
		<?php while (list($key, $val) = each($resultado)) {  ?>
			<tr>
				<td class="bordaTabela" id="cor_horaInd" colspan = "2" ><?php echo $key; ?></td><?php while (list($key4, $val4) = each( $resultado[$key]['meses'])) { ?> <td class="bordaTabela" id="cor_horaInd"><?php echo $val4; ?></td><?php } ?>
			</tr>
			<tr>
				
				<?php while (list($key2, $val2) = each($resultado[$key]['projetos'])) { ?>
				<tr><td class="bordaTabela" id="cor_saldo"></td><td  class="bordaTabela" id="cor_saldo"><?php echo $key2; ?></td> <?php while (list($key3, $val3) = each( $resultado[$key]['projetos'][$key2])) { ?> <td class="bordaTabela" id="cor_saldo"><?php echo $val3; ?></td><?php } ?></tr>
		
		<?php } ?>
			</tr>
		<?php } 

			echo '<tr class="bordaTabela" id="cor_header" >';
			
			echo '<td colspan = '.(count($vetorData)+1).'></td>';
			echo '<td>Total:'.$total_geral.'</td></tr>';	

		?>
		
	</table>
	
</div>
<?php } ?>


