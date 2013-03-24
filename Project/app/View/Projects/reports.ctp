<h1>Período</h1>

<form id="form_relatori_proj" method="post" action="">
	<input type="hiden" value="<?php echo $idproject ?>" name="report[id]" style="display:none">
	<input type="radio" checked name="report[time]" value="all" style="width:auto">Tudo</br>
	<input type="radio" name="report[time]" value="date" style="width:auto">De : 
	<input type="text" style="width:auto" name="report[dateInit]" value="<?php echo (date('d/m/Y')); ?>" class="date"> até <input type="text" value="<?php echo (date('d/m/Y')); ?>" name="report[dateEnd]" style="width:auto" class="date">
	<input class="botao" id="botao_relatorio_proj" type="submit" value="Aplicar" />
</form>


<?php if ($filtersName == 'all') { ?>
<h1><?php echo $nameCompany; ?></h1>

<!-- Relatório Geral "Tudo" -->
<!-- Tabela A --> 
<!-- Teste -->
<a href="../imprimirpdftudo/4"<?php echo $idproject ?>> Gerar PDF </a>
  <?php 
  if (empty($consulting_A)) {
    echo '<p>Não houve consultoria A</p>';
  }
  else {
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
<!-- Fim hearder -->
 <!--  Tabela A Body   -->   
          
  <?php                  
    for ($na=0; $na<=count($consulting_A)-1; $na++){        
        $ta = ($consulting_A[$na]); 
  ?>
      <tr>
        <td class="bordaTabela" scope="row"><?php echo $ta['activities']['id'] ?></td>
        <td class="bordaTabela" colspan="2"><?php echo $ta['activities']['description'] ?></td>
        <td class="bordaTabela" ><?php echo $ta['consultants']['name'] ?></td>
        <td class="bordaTabela" ><?php echo $ta['activities']['date'] ?></td>
        <td class="bordaTabela" ><?php echo $ta['entries']['type'] ?></td>
        <td class="bordaTabela" ><?php echo $ta['entries']['hours_worked'] ?></td>
      </tr>

  <?php 
    }       

    $horasAG = $hours_A_group[0];       
    $horasAI = $hours_A_ind[0];   
    
?>

<?php if ($filtersName == 'all') {  ?>        
    <tr>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
      <td class="bordaTabela" id="cor_horaGrupo"width="9%"><?php echo $horasAG['0']['balance_hours_a_group']; ?></td>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
      <td class="bordaTabela" id="cor_horaGrupo">
        <?php 
          echo  substr($horasAG['0']['balance_hours_a_group'],0,2).':'.substr($horasAG['0']['balance_hours_a_group'],2,2);
        ?>
      </td>
    </tr>
    <tr>
      <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
      <td class="bordaTabela" id="cor_horaInd">
        <?php 
          echo $horasAI['0']['balance_hours_a_individual']; 
          echo substr($horasAI['0']['balance_hours_a_individual'],0,2).':'.substr($horasAI['0']['balance_hours_a_individual'],2,2);
        ?>
      </td>
      <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
      <td class="bordaTabela" id="cor_horaInd">
        <?php 
        echo $horasAI['0']['hours_a_performed_individual'];?></td>
    </tr>
    <tr>
        <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
        <td class="bordaTabela"> </td>
    </tr>
  </table>
<!-- Fim Footer Tabela A -->
<?php } } ?>
<!-- Fim Tabela A -->       
         
<!-- Tabela B -->
<!-- Tabela B Header -->
<?php 
  if (empty($consulting_B)) {
    echo '<p>Não houve consultoria B</p>';
  }
  else {
?>

<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria B</th>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
    <th id="cor_horaGrupo" width="7%" scope="col">
      <?php echo $consulting_B[0]['projects']['b_hours_group'];?>
    </th>
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


<!-- Tabela B Body -->

<?php       
  for ($nb=0; $nb<=count($consulting_B)-1; $nb++){        
    $tb = ($consulting_B[$nb]); ?>
    <tr>
      <td class="bordaTabela" scope="row"><?php echo $tb['activities']['id'] ?></td>
      <td class="bordaTabela" colspan="2"><?php echo $tb['activities']['description'] ?></td>
      <td class="bordaTabela" ><?php echo $tb['consultants']['name'] ?></td>
      <td class="bordaTabela" ><?php echo $tb['activities']['date'] ?></td>
      <td class="bordaTabela" ><?php echo $tb['entries']['type'] ?></td>
      <td class="bordaTabela" ><?php echo $tb['entries']['hours_worked'] ?></td>
    </tr>
<?php } ?>
<?php 
 
  $horasBG = $hours_B_group[0];       
  $horasBI = $hours_B_ind[0];     
         
?>
  <tr>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo"width="9%"><?php echo $horasBG['0']['balance_hours_b_group']; ?></td>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo"><?php echo $horasBG['0']['balance_hours_b_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd"><?php echo $horasBI['0']['balance_hours_b_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd"><?php echo $horasBI['0']['hours_b_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
    <td class="bordaTabela"> </td>
  </tr>
</table>       
<?php } ?> 
<?php }// Fim Tabela B ?>         
<?php //Tabela C ?>
<?php if ($filtersName == 'all') {  ?> 
<?php 
  if (empty($consulting_C)) {
    echo '<p>Não houve consultoria C</p>';
  }
  else {
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
             
    
<?php  
         
 for ($nc=0; $nc<=count($consulting_C)-1; $nc++){        
  $tc = ($consulting_C[$nc]); ?>
  <tr>
    <td class="bordaTabela" scope="row"><?php echo $tc['activities']['id'] ?></td>
    <td class="bordaTabela" colspan="2"><?php echo $tc['activities']['description'] ?></td>
    <td class="bordaTabela" ><?php echo $tc['consultants']['name'] ?></td>
    <td class="bordaTabela" ><?php echo $tc['activities']['date'] ?></td>
    <td class="bordaTabela" ><?php echo $tc['entries']['type'] ?></td>
    <td class="bordaTabela" ><?php echo $tc['entries']['hours_worked'] ?></td>
  </tr> 
<?php         
  }  
 $horasCG = $hours_C_group[0];       
 $horasCI = $hours_C_ind[0];                   
?>

  <tr>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo"width="9%"><?php echo $horasCG['0']['balance_hours_c_group']; ?></td>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo"><?php echo $horasCG['0']['balance_hours_c_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd"><?php echo $horasCI['0']['balance_hours_c_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd"><?php echo $horasCI['0']['hours_c_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
    <td class="bordaTabela"> </td>
  </tr>
</table> 

<!-- FIm da zona de teste -->

<!-- Tabela a ser montada -->
<!-- Fim tabela Consultoria C -->
<?php } } ?>
<?php if($filtersName == 'date'){ ?>

<?php 
 //print_r(array_keys($sum_per_consultant)); 
  $ids = (array_keys($sum_per_consultant));
  //print_r(array_values($sum_per_consultant)); 
  $horas = (array_values($sum_per_consultant));
  $ids = (array_keys($sum_per_consultant));
  $horas = (array_values($sum_per_consultant));
  echo "ID Consultor: Soma de horas";
  for ($idhora=0; $idhora <=count($ids)-1 ; $idhora++) {

      echo "";
      print_r($ids[$idhora]);
      echo ": ";
      print_r($horas[$idhora]); 

  } }
?>
<!-- teste de soma por datas -->
<?php if($filtersName == 'date'){?>

  <select>
    <option value="membro">Membro</option>
    <option value="atividade">Atividade</option>
    <option value="categoria">Categoria</option>
    <option value="projeto">Projeto</option>
  </select>

<?php echo "ID / Mes / Data: ";
    echo "";?>

<?php
  $idcons= (array_keys($sum_per_date));
  $meshr = (array_values($sum_per_date));


  for ($idc=0; $idc <=count($idcons)-1 ; $idc++) {
      
    $idconsultor = $idcons[$idc];
    
    echo "Id: ";
    print_r($idconsultor);
    echo "";
    $mhora = $meshr[$idc];
    // print_r($mhora);
    $horas = array_values($mhora);
    $mezes = array_keys($mhora);
    for ($ms=0; $ms <=count($mhora)-1 ; $ms++) {
         $mes =  $mezes[$ms];
         $hora = $horas[$ms];
         echo "Mes: ";
         print_r($mes);
         echo "";
         echo "Horas: ";
         print_r($hora);
         echo "";
     }
      echo "";
  }

?>

<!-- Fim de soma por datas -->
<!-- Total -->
 <?php 
 echo "Total de horas: ";
 $totalHoras = ($sum_all);
 print_r($sum_all);
 echo "";

 ?>
<!-- Fim Total -->
<!-- Meses selecionados -->

<!-- FIm Meses selecionados -->
<?php 
 echo "Meses Buscados: [Ano-Mes]"; 
echo "";
$mounths = array_values($month_year);
for ($mz=0; $mz <=count($mounths)-1 ; $mz++) {
    echo "Mes: ";
    $mounth = $mounths[$mz];
    print_r($mounth);
    echo "";
}
?>
  <table class="tabela-vazia zebra" cellpadding="0" cellspacing="0">
    <?php
    $idcsltr = array_keys($list_consultant);
    for ($i=0; $i <=count($idcsltr)-1 ; $i++) { 
        echo "";
        echo "Lista de Consultores";
        echo "";
        foreach ($list_consultant as $key => $value) {
            //print_r ($value);
            echo "";
            echo "Id Consultor: ";
            echo $value['consultants']['id'];
            echo "";
            echo "Nome Consultor: ";
            echo $value['consultants']['name'];
            echo "";
            echo "ID Projeto: ";
            echo $value['projects']['project_id'];
            echo "";
            echo "Descrição Atividade: ";
            echo $value['activities']['activity_description'];
            echo "";
            echo "Data Atividade: ";
            echo $value['activities']['date'];
            echo "";
            echo "Horas Trabalhadas: ";
            echo $value['entries']['hours_worked'];
            echo "";

    }
    } ?>
    <tr>
        <th>Membro</th>
        <th><?php echo $value['activities']['date'];?></th>
    </tr>

    <tr>
        <td><?php echo $value['consultants']['name']; ?></td>
        <td><?php echo $value['entries']['hours_worked'];?></td>
    </tr>

    <tr>
        <th>Total</th>
        <td> </td>
    </tr>



<!-- Fim da area de testes -->
<?php } ?>
<?php echo $this -> Html -> script ('relatorios') ?>