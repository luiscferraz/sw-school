<h1>Período</h1>

<form id="form_relatori_proj" method="post" action="">
	<input type="hiden" value="<?php echo $idproject ?>" name="report[id]" style="display:none">
	<input type="radio" checked name="report[time]" value="all" style="width:auto">Tudo<br>
	<input type="radio" name="report[time]" value="date" style="width:auto">De : 
	<input type="text" style="width:auto" name="report[dateInit]" value="" class="date"> atÃ© <input type="text" value="" name="report[dateEnd]" style="width:auto" class="date">
	<input class="botao" id="botao_relatorio_proj" type="submit" value="Aplicar" />
</form>


<?php if ($filters) { ?>
	<select>
		<option value="membro">Membro</option>
		<option value="atividade">Atividade</option>
		<option value="categoria">Categoria</option>
		<option value="projeto">Projeto</option>
	</select>
<?php print_r($consulting_A);
echo "<br><br><br><br>";?>

<!--  	<?php print_r($consulting_B);
echo "<br><br><br><br>";?>
	<?php print_r($consulting_C);
echo "<br><br><br><br>";?> -->

<?php print_r($hours_A_ind);
echo "<br><br><br><br>";?>
		<?php print_r($hours_A_group);
echo "<br><br><br><br>";?>
<!-- 	<?php print_r($hours_B_ind);
echo "<br><br><br><br>";?>
	<?php print_r($hours_B_group);
echo "<br><br><br><br>";?>
	<?php print_r($hours_C_ind);
echo "<br><br><br><br>";?>
	<?php print_r($hours_C_group);
echo "<br><br><br><br>";?>
<?php } ?> --> 

<!-- Zona de teste -->
<?php
		echo "Horas contratadas em grupo: ";
		echo $consulting_A[0]['projects']['a_hours_group'];
        echo "<br>";
        echo "Horas contratadas individuais: ";
        echo $consulting_A[0]['projects']['a_hours_individual'];
        echo "<br>";

    for ($na=0; $na<=count($consulting_A)-1; $na++){
        $ta = ($consulting_A[$na]);
        echo "<br><br>";
     	
        // print_r($ta);
        echo "Id da atividade: ";
        echo $ta['activities']['id'];
        echo "<br>";
        echo "Atividade: ";
        echo $ta['activities']['description'];
        echo "<br>";
        echo "Consultor: ";
        echo $ta['consultants']['name'];
        echo "<br>";
        echo "Data: ";
        echo $ta['activities']['date'];
        echo "<br>";
        echo "Tipo: ";
        echo $ta['entries']['type'];
        echo "<br>";
        echo "Qtd de Horas: ";
        echo $ta['entries']['hours_worked'];
        echo "<br>";
        echo "<br><br>";

    }
    	echo "Horas Realizadas em Grupo: ";
    	echo $consulting_A['projects']['hours_a_performed_group'];
    	echo "<br><br>";
    	echo "Saldo de Horas em Grupo: ";
    	echo $consulting_A['projects']['balance_hours_a_group'];

    	echo "Horas Realizadas em Grupo: ";
    	echo $consulting_A['projects']['hours_a_performed_group'];
    	echo "<br><br>";
    	echo "Saldo de Horas Individuais: ";
    	echo $consulting_A['projects']['balance_hours_a_individual'];
    	echo "<br><br>";
    	
    


?>

<!-- FIm da zona de teste -->

<!-- Tabela a ser montada -->

<!-- Tabela Consultoria A -->
<?php
    for ($na=0; $na<=count($consulting_A)-1; $na++){
        $ta = ($consulting_A[$na]);
        echo "<br><br><br><br>";
     	
        // print_r($ta);
        

    }
?>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<th colspan="3" rowspan="2" scope="col">Consultoria A</th>
		<th colspan="3" scope="col">Horas contratadas em grupo</th>
		<th width="7%" scope="col"><?php echo $ta['projects']['a_hours_group'];?></th>
	</tr>
	<tr>
		<td colspan="3">Horas contratadas Individual</td>
		<td><?php echo $ta['projects']['a_hours_individual'];?></td>
	</tr>
	<tr>
		<th width="5%" scope="row">ID</th>
		<td colspan="2">Atividade</td>
		<td width="20%">Consultor</td>
		<td width="13%">Data</td>
		<td width="10%">Tipo</td>
		<td>Qt Hs</td>
	</tr>
	<tr>
		<th scope="row"><?php echo $ta['activities']['id'] ?></th>
		<td colspan="2"><?php echo $ta['activities']['description'] ?></td>
		<td><?php echo $ta['consultants']['name'] ?></td>
		<td><?php echo $ta['activities']['date'] ?></td>
		<td><?php echo $ta['entries']['type'] ?></td>
		<td><?php echo $ta['entries']['hours_worked'] ?></td>
	</tr>
	<tr>
		<th colspan="2" scope="row">Saldo de Horas em Grupo</th>
		<td width="9%"><!--<?php echo $ta['projects']['balance_hours_a_group'] ?>--></td>
		<td colspan="3">Horas Realizadas em Grupo</td>
		<td>GG</td>
	</tr>
	<tr>
		<th colspan="2" scope="row">Saldo de Horas Individuais</th>
		<td>KK</td>
		<td colspan="3">Horas Realizadas Individual</td>
		<td>HH</td>
	</tr>
	<tr>
		<th colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
		<td>II</td>
	</tr>
</table>
<!-- Fim tabela Consultoria A -->

<br><br>
		<?php print_r($sum_per_consultant); ?> <br><br>
 		<?php print_r($sum_per_date); ?> <br><br>
 		<?php print_r($sum_all); ?> <br><br>
 		<?php print_r($month_year); ?> <br><br>
 		<?php print_r($list_consultant); ?> <br><br>


<?php echo $this -> Html -> script ('relatorios') ?>