<div class="none form_relatorio" >
<h1>Período</h1>
<h2 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h2>

<form id="form_relatori_proj" method="post" action="">
  <input type="hiden" value="<?php echo $idproject ?>" name="report[id]" style="display:none">
  <input type="radio" checked name="report[time]" value="all" style="width:auto">Tudo</br>
  <input type="radio" name="report[time]" value="date" style="width:auto">De : 
  <input type="text" style="width:auto" name="report[dateInit]" value="<?php echo (date('d/m/Y')); ?>" class="date"> até <input type="text" value="<?php echo (date('d/m/Y')); ?>" name="report[dateEnd]" style="width:auto" class="date">
  <input class="botao" id="botao_relatorio_proj" type="submit" value="Aplicar" />
</form>
</div>
<?php if ($filtersName == 'all') { ?>
<h2 id="nome_relatorio">Relatório de acompanhamento da consultoria</h2>
<a id="gerar_pdf" href="#" onclick="window.print();"> Imprimir </a>
<?php 
$mesnome[1] = "janeiro";
$mesnome[2] = "fevereiro";
$mesnome[3] = "março";
$mesnome[4] = "abril";
$mesnome[5] = "maio";
$mesnome[6] = "junho";
$mesnome[7] = "julho";
$mesnome[8] = "agosto";
$mesnome[9] = "setembro";
$mesnome[10] = "outubro";
$mesnome[11] = "novembro";
$mesnome[12] = "dezembro";

$ano = date('Y');
$mes = date('n');
$dia = date('d');

//exibindo...
$data = $dia.' de '.$mesnome[$mes].' de '.$ano; ?>
<h4>Projeto : <span class="leve"><?php echo $nameProject; ?></span></h4>
<h4>Data : <span class="leve"><?php echo $data; ?></span></h4>




<!-- Relatório Geral "Tudo" -->
<!-- Tabela A --> 
<!-- Teste -->
  <?php 
  if (empty($consulting_A)) {
    echo '<p>Não houve consultoria A</p>';
  }
  else {
  ?>
  
  <table class="tabela_relatorio" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria A</th>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
        <th class="bordaTabela" id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_A[0]['projects']['a_hours_group'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
        <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_A[0]['projects']['a_hours_individual'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_header" width="5%" scope="row">ID</th>
        <th class="bordaTabela" id="cor_header" colspan="2">Atividade</th>
        <th class="bordaTabela" id="cor_header" width="20%">Consultor</th>
        <th class="bordaTabela" id="cor_header" width="13%">Data</th>
        <th class="bordaTabela" id="cor_header" width="10%">Tipo</th>
        <th class="bordaTabela" id="cor_header">Quant. Horas</th>
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
        <td class="bordaTabela" ><?php echo $ta['entries']['date'] ?></td>
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
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_saldo" width="9%"><?php echo $horasAG['0']['balance_hours_a_group']; ?></td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasAG['0']['hours_a_performed_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo"><?php echo $horasAI['0']['balance_hours_a_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasAI['0']['hours_a_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
    <td class="bordaTabela" id="cor_footer"><?php echo $horasAG['0']['hours_a_performed_group']+$horasAI['0']['hours_a_performed_individual'];?></td>
  </tr>
</table>  
</br>
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

<table class="tabela_relatorio" width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria B</th>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
    <th class="bordaTabela" id="cor_horaGrupo" width="7%" scope="col">
      <?php echo $consulting_B[0]['projects']['b_hours_group'];?>
    </th>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
    <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_B[0]['projects']['b_hours_individual'];?></th>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_header" width="5%" scope="row">ID</th>
    <th class="bordaTabela" id="cor_header" colspan="2">Atividade</th>
    <th class="bordaTabela" id="cor_header" width="20%">Consultor</th>
    <th class="bordaTabela" id="cor_header" width="13%">Data</th>
    <th class="bordaTabela" id="cor_header" width="10%">Tipo</th>
    <th class="bordaTabela" id="cor_header">Quant. Horas</th>
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
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_saldo" width="9%"><?php echo $horasBG['0']['balance_hours_b_group']; ?></td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasBG['0']['hours_b_performed_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo"><?php echo $horasBI['0']['balance_hours_b_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasBI['0']['hours_b_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
    <td class="bordaTabela" id="cor_footer"><?php echo $horasBG['0']['hours_b_performed_group']+$horasBI['0']['hours_b_performed_individual'];?></td>
  </tr>
</table> 
</br>   
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
 <table class="tabela_relatorio" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria C</th>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
      <th class="bordaTabela" id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_C[0]['projects']['c_hours_group'];?></th>
    </tr>

    <tr>
      <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
      <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_C[0]['projects']['c_hours_individual'];?></th>
    </tr>
    <tr>
      <th class="bordaTabela" id="cor_header" width="5%" scope="row">ID</th>
      <th class="bordaTabela" id="cor_header" colspan="2">Atividade</th>
      <th class="bordaTabela" id="cor_header" width="20%">Consultor</th>
      <th class="bordaTabela" id="cor_header" id="cor_header" width="13%">Data</th>
      <th class="bordaTabela" id="cor_header" width="10%">Tipo</th>
      <th class="bordaTabela" id="cor_header">Quant. Horas</th>
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
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_saldo" width="9%"><?php echo $horasCG['0']['balance_hours_c_group']; ?></td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasCG['0']['hours_c_performed_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo"><?php echo $horasCI['0']['balance_hours_c_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasCI['0']['hours_c_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
    <td class="bordaTabela" id="cor_footer"><?php echo $horasCG['0']['hours_c_performed_group']+$horasCI['0']['hours_c_performed_individual'];?></td>
  </tr>
</table> 

<!-- FIm da zona de teste -->

<!-- Tabela a ser montada -->
<!-- Fim tabela Consultoria C -->
<?php } } ?>


<?php if ($filtersName == 'date') { ?>
<h2 id="nome_relatorio">Relatório de acompanhamento da consultoria</h2>
<a id="gerar_pdf" href="#" onclick="window.print();"> Imprimir </a>
<?php 
$mesnome[1] = "janeiro";
$mesnome[2] = "fevereiro";
$mesnome[3] = "março";
$mesnome[4] = "abril";
$mesnome[5] = "maio";
$mesnome[6] = "junho";
$mesnome[7] = "julho";
$mesnome[8] = "agosto";
$mesnome[9] = "setembro";
$mesnome[10] = "outubro";
$mesnome[11] = "novembro";
$mesnome[12] = "dezembro";

$ano = date('Y');
$mes = date('n');
$dia = date('d');

//exibindo...
$data = $dia.' de '.$mesnome[$mes].' de '.$ano; ?>
<h4>Projeto : <span class="leve"><?php echo $nameProject; ?></span></h4>
<h4>Data : <span class="leve"><?php echo $dateInit .' - '.$dateEnd; ?></span></h4>




<!-- Relatório Geral "Tudo" -->
<!-- Tabela A --> 
<!-- Teste -->
  <?php 
  if (empty($consulting_A)) {
    echo '<p>Não houve consultoria A</p>';
  }
  else {
  ?>
  
  <table class="tabela_relatorio" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria A</th>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
        <th class="bordaTabela" id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_A[0]['projects']['a_hours_group'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
        <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_A[0]['projects']['a_hours_individual'];?></th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_header" width="5%" scope="row">ID</th>
        <th class="bordaTabela" id="cor_header" colspan="2">Atividade</th>
        <th class="bordaTabela" id="cor_header" width="20%">Consultor</th>
        <th class="bordaTabela" id="cor_header" width="13%">Data</th>
        <th class="bordaTabela" id="cor_header" width="10%">Tipo</th>
        <th class="bordaTabela" id="cor_header">Quant. Horas</th>
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
        <td class="bordaTabela" ><?php echo $ta['entries']['date'] ?></td>
        <td class="bordaTabela" ><?php echo $ta['entries']['type'] ?></td>
        <td class="bordaTabela" ><?php echo $ta['entries']['hours_worked'] ?></td>
      </tr>

  <?php 
    }       

    $horasAG = $hours_A_group[0];       
    $horasAI = $hours_A_ind[0];   
    
?>

<?php if ($filtersName == 'date') {  ?>        
   <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_saldo" width="9%"><?php echo $horasAG['0']['balance_hours_a_group']; ?></td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasAG['0']['hours_a_performed_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo"><?php echo $horasAI['0']['balance_hours_a_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasAI['0']['hours_a_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
    <td class="bordaTabela" id="cor_footer"><?php echo $horasAG['0']['hours_a_performed_group']+$horasAI['0']['hours_a_performed_individual'];?></td>
  </tr>
</table>  
</br>
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

<table class="tabela_relatorio" width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria B</th>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
    <th class="bordaTabela" id="cor_horaGrupo" width="7%" scope="col">
      <?php echo $consulting_B[0]['projects']['b_hours_group'];?>
    </th>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
    <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_B[0]['projects']['b_hours_individual'];?></th>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_header" width="5%" scope="row">ID</th>
    <th class="bordaTabela" id="cor_header" colspan="2">Atividade</th>
    <th class="bordaTabela" id="cor_header" width="20%">Consultor</th>
    <th class="bordaTabela" id="cor_header" width="13%">Data</th>
    <th class="bordaTabela" id="cor_header" width="10%">Tipo</th>
    <th class="bordaTabela" id="cor_header">Quant. Horas</th>
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
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_saldo" width="9%"><?php echo $horasBG['0']['balance_hours_b_group']; ?></td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasBG['0']['hours_b_performed_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo"><?php echo $horasBI['0']['balance_hours_b_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasBI['0']['hours_b_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
    <td class="bordaTabela" id="cor_footer"><?php echo $horasBG['0']['hours_b_performed_group']+$horasBI['0']['hours_b_performed_individual'];?></td>
  </tr>
</table>  
</br>  
<?php } ?> 
<?php }// Fim Tabela B ?>         
<?php //Tabela C ?>
<?php if ($filtersName == 'date') {  ?> 
<?php 
  if (empty($consulting_C)) {
    echo '<p>Não houve consultoria C</p>';
  }
  else {
?>
 <table class="tabela_relatorio" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria C</th>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
      <th class="bordaTabela" id="cor_horaGrupo" width="7%" scope="col"><?php echo $consulting_C[0]['projects']['c_hours_group'];?></th>
    </tr>

    <tr>
      <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
      <th class="bordaTabela" id="cor_horaInd"><?php echo $consulting_C[0]['projects']['c_hours_individual'];?></th>
    </tr>
    <tr>
      <th class="bordaTabela" id="cor_header" width="5%" scope="row">ID</th>
      <th class="bordaTabela" id="cor_header" colspan="2">Atividade</th>
      <th class="bordaTabela" id="cor_header" width="20%">Consultor</th>
      <th class="bordaTabela" id="cor_header" id="cor_header" width="13%">Data</th>
      <th class="bordaTabela" id="cor_header" width="10%">Tipo</th>
      <th class="bordaTabela" id="cor_header">Quant. Horas</th>
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
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_saldo" width="9%"><?php echo $horasCG['0']['balance_hours_c_group']; ?></td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasCG['0']['hours_c_performed_group'];?></td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo"><?php echo $horasCI['0']['balance_hours_c_individual']; ?></td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real"><?php echo $horasCI['0']['hours_c_performed_individual'];?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
    <td class="bordaTabela" id="cor_footer"><?php echo $horasCG['0']['hours_c_performed_group']+$horasCI['0']['hours_c_performed_individual'];?></td>
  </tr>
</table> 

<!-- FIm da zona de teste -->

<!-- Tabela a ser montada -->
<!-- Fim tabela Consultoria C -->
<?php } } ?>
<?php if($filtersName == 'date'){ ?>

<?php 
 }
?>
<?php echo $this -> Html -> script ('relatorios') ?>