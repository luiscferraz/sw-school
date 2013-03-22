<h1>Período</h1>

<form id="form_relatori_proj" method="post" action="">
	<input type="hiden" value="<?php echo $idproject ?>" name="report[id]" style="display:none">
	<input type="radio" checked name="report[time]" value="all" style="width:auto">Tudo<br>
	<input type="radio" name="report[time]" value="date" style="width:auto">De : 
	<input type="text" style="width:auto" name="report[dateInit]" value="01/01/2010" class="date"> até <input type="text" value="01/01/2014" name="report[dateEnd]" style="width:auto" class="date">
	<input class="botao" id="botao_relatorio_proj" type="submit" value="Aplicar" />
</form>


<?php if ($filters) { ?>
	<select>
		<option value="membro">Membro</option>
		<option value="atividade">Atividade</option>
		<option value="categoria">Categoria</option>
		<option value="projeto">Projeto</option>
	</select>

<!-- <?php print_r($consulting_A);
echo "<br><br><br><br>";?> -->

<!-- 	<?php print_r($consulting_B);
echo "<br><br><br><br>";?>-->
<!--	<?php print_r($consulting_C);
echo "<br><br><br><br>";?> -->

<!--<?php print_r($hours_A_ind);
echo "<br><br><br><br>";?>
		<?php print_r($hours_A_group);
echo "<br><br><br><br>";?>-->

<!--	<?php print_r($hours_B_ind);
echo "<br><br><br><br>";?>
	<?php print_r($hours_B_group);
echo "<br><br><br><br>";?>-->

<!--	<?php print_r($hours_C_ind);
echo "<br><br><br><br>";?>
	<?php print_r($hours_C_group);
echo "<br><br><br><br>";?>-->




<!-- Fim Tabela C -->

<!-- FIm da zona de teste -->

<!-- Tabela a ser montada -->

<!-- Tabela Consultoria A -->
<?php
    for ($na=0; $na<=count($consulting_A)-1; $na++){
        $ta = ($consulting_A[$na]);
        echo "<br><br><br><br>";
     	
        // echo ($ta);
        
        // echo "<br><br><br><br>";

    }
?>
<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria A</th>
		<th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
		<th id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_A[0]['projects']['a_hours_group'];?></th>
	</tr>
	<tr>
		<th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
		<th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_A[0]['projects']['a_hours_individual'];?></th>
	</tr>
	<tr>
		<th class="bordaTabela" width="5%" scope="row">ID</th>
		<th class="bordaTabela" colspan="2">Atividade</th>
		<th class="bordaTabela" width="20%">Consultor</th>
		<th class="bordaTabela" width="13%">Data</th>
		<th class="bordaTabela" width="10%">Tipo</th>
		<th class="bordaTabela">Quant. Horas</th>
	</tr>

	<tr>
		<td class="bordaTabela" scope="row"><?php echo $ta['activities']['id'] ?></td>
		<td class="bordaTabela" colspan="2"><?php echo $ta['activities']['description'] ?></td>
		<td class="bordaTabela" ><?php echo $ta['consultants']['name'] ?></td>
		<td class="bordaTabela" ><?php echo $ta['activities']['date'] ?></td>
		<td class="bordaTabela" ><?php echo $ta['entries']['type'] ?></td>
		<td class="bordaTabela" ><?php echo $ta['entries']['hours_worked'] ?></td>
	</tr>

	<tr>
		<th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
		<td class="bordaTabela" id="cor_horaGrupo"width="9%"><!--<?php echo $ta['projects']['balance_hours_a_group'] ?>--></td>
		<th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
		<td class="bordaTabela" id="cor_horaGrupo">JJ</td>
	</tr>
	<tr>
		<th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
		<td class="bordaTabela" id="cor_horaInd">MM</td>
		<th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
		<td class="bordaTabela" id="cor_horaInd">HH</td>
	</tr>
	<tr>
		<th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
		<td class="bordaTabela"> </td>
	</tr>
</table>
<!-- Fim tabela Consultoria A -->

<br><br>

<?php
    for ($nb=0; $nb<=count($consulting_B)-1; $nb++){
        $tb = ($consulting_B[$nb]);
        echo "<br><br><br><br>";
        
        // echo ($tb);
        
        // echo "<br><br><br><br>";

    }
?>
<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria A</th>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
        <th id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_B[0]['projects']['b_hours_group'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
        <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_B[0]['projects']['b_hours_individual'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" width="5%" scope="row">ID</th>
        <th class="bordaTabela" colspan="2">Atividade</th>
        <th class="bordaTabela" width="20%">Consultor</th>
        <th class="bordaTabela" width="13%">Data</th>
        <th class="bordaTabela" width="10%">Tipo</th>
        <th class="bordaTabela">Quant. Horas</th>
    </tr>

    <tr>
        <td class="bordaTabela" scope="row"><?php echo $tb['activities']['id'] ?></td>
        <td class="bordaTabela" colspan="2"><?php echo $tb['activities']['description'] ?></td>
        <td class="bordaTabela" ><?php echo $tb['consultants']['name'] ?></td>
        <td class="bordaTabela" ><?php echo $tb['activities']['date'] ?></td>
        <td class="bordaTabela" ><?php echo $tb['entries']['type'] ?></td>
        <td class="bordaTabela" ><?php echo $tb['entries']['hours_worked'] ?></td>
    </tr>

    <tr>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
        <td class="bordaTabela" id="cor_horaGrupo"width="9%"><!--<?php echo $tb['projects']['balance_hours_b_group'] ?>--></td>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
        <td class="bordaTabela" id="cor_horaGrupo">JJ</td>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
        <td class="bordaTabela" id="cor_horaInd">MM</td>
        <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
        <td class="bordaTabela" id="cor_horaInd">HH</td>
    </tr>
    <tr>
        <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
        <td class="bordaTabela"> </td>
    </tr>
</table>
<!-- Fim tabela Consultoria B -->

<!-- Tabela Consultoria C -->

<?php
    for ($nc=0; $nc<=count($consulting_C)-1; $nc++){
        $tc = ($consulting_C[$nc]);
        echo "<br><br><br><br>";
        
        // echo ($tb);
        
        // echo "<br><br><br><br>";

    }
?>
<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria C</th>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
        <th id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_C[0]['projects']['c_hours_group'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
        <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_C[0]['projects']['c_hours_individual'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" width="5%" scope="row">ID</th>
        <th class="bordaTabela" colspan="2">Atividade</th>
        <th class="bordaTabela" width="20%">Consultor</th>
        <th class="bordaTabela" width="13%">Data</th>
        <th class="bordaTabela" width="10%">Tipo</th>
        <th class="bordaTabela">Quant. Horas</th>
    </tr>

    <tr>
        <td class="bordaTabela" scope="row"><?php echo $tc['activities']['id'] ?></td>
        <td class="bordaTabela" colspan="2"><?php echo $tc['activities']['description'] ?></td>
        <td class="bordaTabela" ><?php echo $tc['consultants']['name'] ?></td>
        <td class="bordaTabela" ><?php echo $tc['activities']['date'] ?></td>
        <td class="bordaTabela" ><?php echo $tc['entries']['type'] ?></td>
        <td class="bordaTabela" ><?php echo $tc['entries']['hours_worked'] ?></td>
    </tr>

    <tr>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
        <td class="bordaTabela" id="cor_horaGrupo"width="9%"><!--<?php echo $tc['projects']['balance_hours_c_group'] ?>--></td>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
        <td class="bordaTabela" id="cor_horaGrupo">JJ</td>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
        <td class="bordaTabela" id="cor_horaInd">MM</td>
        <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
        <td class="bordaTabela" id="cor_horaInd">HH</td>
    </tr>
    <tr>
        <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
        <td class="bordaTabela"> </td>
    </tr>
</table>
<!-- Fim tabela Consultoria C -->

<br><br>
<!-- Area de Testes -->
<!-- area de testes soma por consultores -->

      <!--  <?php print_r($sum_per_consultant); ?> <br><br> -->
       <?php 
       //print_r(array_keys($sum_per_consultant)); 
       $ids = (array_keys($sum_per_consultant));
       echo "<br><br>"; ?>
       <br><br>
       <?php 
       //print_r(array_values($sum_per_consultant)); 
       $horas = (array_values($sum_per_consultant));
       ?>
        

        <!-- <?php print_r($sum_per_date); ?> <br><br>
        <?php print_r($sum_all); ?> <br><br>
        <?php print_r($month_year); ?> <br><br>
        <?php print_r($list_consultant); ?> <br><br>  -->
        <?php
        $ids = (array_keys($sum_per_consultant));
        $horas = (array_values($sum_per_consultant));
        echo "ID Consultor: Soma de horas";
        for ($idhora=0; $idhora <=count($ids)-1 ; $idhora++) {

            echo "<br><br>";
            print_r($ids[$idhora]);
            echo ": ";
            print_r($horas[$idhora]); 
    
        }
    ?>
<br><br>
<!-- teste de soma por datas -->
  <!--   <?php print_r($sum_per_date); ?> <br><br> -->

    <?php echo "ID / Mes / Data: ";
        echo "<br>";?>

    <?php
    $idcons= (array_keys($sum_per_date));
    $meshr = (array_values($sum_per_date));


    for ($idc=0; $idc <=count($idcons)-1 ; $idc++) {
        
        $idconsultor = $idcons[$idc];
        
        echo "Id: ";
        print_r($idconsultor);
        echo "<br>";
        $mhora = $meshr[$idc];
        // print_r($mhora);
        $horas = array_values($mhora);
        $mezes = array_keys($mhora);
        for ($ms=0; $ms <=count($mhora)-1 ; $ms++) {
             $mes =  $mezes[$ms];
             $hora = $horas[$ms];
             echo "Mes: ";
             print_r($mes);
             echo "<br>";
             echo "Horas: ";
             print_r($hora);
             echo "<br><br>";
         }
        echo "<br>";
    }

    ?>

<!-- Fim de soma por datas -->
<!-- Total -->
 <?php 
 echo "Total de horas: ";
 $totalHoras = ($sum_all);
 print_r($sum_all);
 echo "<br><br><br>";

 ?>

        <!--  <?php print_r($sum_per_consultant); ?> <br><br> -->
       <!--  <?php print_r($sum_per_date); ?> <br><br>  -->
       <!--  <?php print_r($sum_all); ?> <br><br> -->
        <?php print_r($month_year); ?> <br><br>
        <?php print_r($list_consultant); ?> <br><br>

<!-- Fim da area de testes -->
<?php } ?>
<?php echo $this -> Html -> script ('relatorios') ?>