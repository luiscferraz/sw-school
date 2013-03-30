<div class="none form_relatorio" >
<h1>Período</h1>

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
    <td class="bordaTabela" id="cor_saldo" width="9%">
      <?php 
        $hsga = $horasAG['0']['balance_hours_a_group'];
        if (empty($hsga)) {
          echo "";
        }
        else{
          $lensga = strlen($hsga);
          $sssga = substr($hsga, -2);
          $mmsga = substr($hsga, -4, -2);
          $hhsga = substr($hsga, -$lensga, -4);
          echo $hhsga . ":" . $mmsga . ":" . $sssga; 
        }
      ?>
    </td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real">
    <?php
      $hrga = $horasAG['0']['hours_a_performed_group'];
      if (empty($hrga)) {
         echo "";
       }
      else{
        $lenrga=strlen($hrga);
        $ssrga = substr($hrga, -2);
        $mmrga = substr($hrga, -4, -2);
        $hhrga = substr($hrga, -$lenrga, -4);
        echo $hhrga . ":" . $mmrga . ":" . $ssrga;  
      } 
      
      
    ?>
  </td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo">
      <?php 
        $hsia = $horasAI['0']['balance_hours_a_individual'];
        if (empty($hsia)) {
          echo "";
        }
        else{
          $lensia = strlen($hsia);
          $sssia = substr($hsia, -2);
          $mmsia = substr($hsia, -4, -2);
          $hhsia = substr($hsia, -$lensia, -4);
          echo $hhsia . ":" . $mmsia . ":" . $sssia;
      
        }
      ?>
    </td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hria = $horasAI['0']['hours_a_performed_individual'];
        if (empty($hria)) {
          echo "";
        }
        else{
          $lenria=strlen($hria);
          $ssria = substr($hria, -2);
          $mmria = substr($hria, -4, -2);
          $hhria = substr($hria, -$lenria, -4);
          echo $hhria . ":" . $mmria . ":" . $ssria;
        }

      ?>
    </td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
    <td class="bordaTabela" id="cor_footer">
      <?php 
        $hsta = $horasAG['0']['hours_a_performed_group']+$horasAI['0']['hours_a_performed_individual'];
        if (empty($hsta)) {
          echo "";
        }
        else{
          $lensta = strlen($hsta);
          $sssta = substr($hsta, -2);
          $mmsta = substr($hsta, -4, -2);
          $hhsta = substr($hsta, -$lensta, -4);
          echo $hhsta . ":" . $mmsta . ":" . $sssta;
        }
        
      ?>
    </td>
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
    <td class="bordaTabela" id="cor_saldo" width="9%">
      <?php 
        $hsgb = $horasBG['0']['balance_hours_b_group'];
        if (empty($hsgb)) {
          echo "";
        }
        else{
          $lensgb = strlen($hsgb);
          $sssgb = substr($hsgb, -2);
          $mmsgb = substr($hsgb, -4, -2);
          $hhsgb = substr($hsgb, -$lensgb, -4);
          echo $hhsgb . ":" . $mmsgb . ":" . $sssgb; 

        } 
      ?>
    </td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hrgb = $horasBG['0']['hours_b_performed_group'];
      if (empty($hrgb)) {
         echo "";
       }
      else{
        $lenrgb=strlen($hrgb);
        $ssrgb = substr($hrgb, -2);
        $mmrgb = substr($hrgb, -4, -2);
        $hhrgb = substr($hrgb, -$lenrgb, -4);
        echo $hhrgb . ":" . $mmrgb . ":" . $ssrgb;  
      } 
      
      ?>
    </td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo">
      <?php 
        $hsib = $horasBI['0']['balance_hours_b_individual'];
        if (empty($hsib)) {
          echo "";
          # code...
        }
        else{
          $lensib = strlen($hsib);
          $sssib = substr($hsib, -2);
          $mmsib = substr($hsib, -4, -2);
          $hhsib = substr($hsib, -$lensib, -4);
          echo $hhsib . ":" . $mmsib . ":" . $sssib;
      
        } 
    
      ?>
    </td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        
        $hrib = $horasBI['0']['hours_b_performed_individual'];
        if (empty($hrib)) {
          echo "";
        }
        else{
          $lenrib=strlen($hrib);
          $ssrib = substr($hrib, -2);
          $mmrib = substr($hrib, -4, -2);
          $hhrib = substr($hrib, -$lenrib, -4);
          echo $hhrib . ":" . $mmrib . ":" . $ssrib;
        }
      ?>
    </td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
    <td class="bordaTabela" id="cor_footer">
      <?php 
        $hstb = $horasBG['0']['hours_b_performed_group']+$horasBI['0']['hours_b_performed_individual'];
        if (empty($hstb)) {
          echo "";
        }
        else{
          $lenstb = strlen($hstb);
          $ssstb = substr($hstb, -2);
          $mmstb = substr($hstb, -4, -2);
          $hhstb = substr($hstb, -$lenstb, -4);
          echo $hhstb . ":" . $mmstb . ":" . $ssstb;
        }
      ?>
    </td>
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
    <td class="bordaTabela" id="cor_saldo" width="9%">
      <?php 
        $hsgc = $horasCG['0']['balance_hours_c_group'];
        if (empty($hsgc)) {
          echo "";
        }
        else{
          $lensgc = strlen($hsgc);
          $sssgc = substr($hsgc, -2);
          $mmsgc = substr($hsgc, -4, -2);
          $hhsgc = substr($hsgc, -$lensgc, -4);
          echo $hhsgc . ":" . $mmsgc . ":" . $sssgc; 

        }
      ?>
    </td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        
        $hrgc = $horasCG['0']['hours_c_performed_group'];
      if (empty($hrgc)) {
         echo "";
       }
      else{
        $lenrgc = strlen($hrgc);
        $ssrgc = substr($hrgc, -2);
        $mmrgc = substr($hrgc, -4, -2);
        $hhrgc = substr($hrgc, -$lenrgc, -4);
        echo $hhrgc . ":" . $mmrgc . ":" . $ssrgc;  
      } 
      
      ?>
    </td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo">
      <?php 
        $hsic = $horasCI['0']['balance_hours_c_individual'];
        if (empty($hsic)) {
          echo "";
          # code...
        }
        else{
          $lensic = strlen($hsic);
          $sssic = substr($hsic, -2);
          $mmsic = substr($hsic, -4, -2);
          $hhsic = substr($hsic, -$lensic, -4);
          echo $hhsic . ":" . $mmsic . ":" . $sssic;
      
        }  
      ?>
    </td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hric = $horasCI['0']['hours_c_performed_individual'];
        if (empty($hric)) {
          echo "";
        }
        else{
          $lenric=strlen($hric);
          $ssric = substr($hric, -2);
          $mmric = substr($hric, -4, -2);
          $hhric = substr($hric, -$lenric, -4);
          echo $hhric . ":" . $mmric . ":" . $ssric;
        }
      ?>
    </td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
    <td class="bordaTabela" id="cor_footer">
      <?php 
        $hstc = $horasCG['0']['hours_c_performed_group']+$horasCI['0']['hours_c_performed_individual'];
        if (empty($hstc)) {
          echo "";
        }
        else{
        $lenstc = strlen($hstc);
        $ssstc = substr($hstc, -2);
        $mmstc = substr($hstc, -4, -2);
        $hhstc = substr($hstc, -$lenstc, -4);
        echo $hhstc . ":" . $mmstc . ":" . $ssstc;
      }
      ?>
    </td>
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
    <td class="bordaTabela" id="cor_saldo" width="9%">
      <?php 
        $hsga = $horasAG['0']['balance_hours_a_group'];
        if (empty($hsga)) {
          echo "";
        }
        else{
          $lensga = strlen($hsga);
          $sssga = substr($hsga, -2);
          $mmsga = substr($hsga, -4, -2);
          $hhsga = substr($hsga, -$lensga, -4);
          echo $hhsga . ":" . $mmsga . ":" . $sssga; 
        } 
      ?>
    </td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php
      $hrga = $horasAG['0']['hours_a_performed_group'];
      if (empty($hrga)) {
         echo "";
       }
      else{
        $lenrga=strlen($hrga);
        $ssrga = substr($hrga, -2);
        $mmrga = substr($hrga, -4, -2);
        $hhrga = substr($hrga, -$lenrga, -4);
        echo $hhrga . ":" . $mmrga . ":" . $ssrga;  
      } 
      ?>
    </td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo">
      <?php 
        $hsia = $horasAI['0']['balance_hours_a_individual'];
        if (empty($hsia)) {
          echo "";
          # code...
        }
        else{
          $lensia = strlen($hsia);
          $sssia = substr($hsia, -2);
          $mmsia = substr($hsia, -4, -2);
          $hhsia = substr($hsia, -$lensia, -4);
          echo $hhsia . ":" . $mmsia . ":" . $sssia;
        } 
      ?>
    </td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hria = $horasAI['0']['hours_a_performed_individual'];
        if (empty($hria)) {
          echo "";
        }
        else{
          $lenria=strlen($hria);
          $ssria = substr($hria, -2);
          $mmria = substr($hria, -4, -2);
          $hhria = substr($hria, -$lenria, -4);
          echo $hhria . ":" . $mmria . ":" . $ssria;
        }
    ?></td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
    <td class="bordaTabela" id="cor_footer">
      <?php 
        $hsta = $horasAG['0']['hours_a_performed_group']+$horasAI['0']['hours_a_performed_individual'];
        if (empty($hsta)) {
          echo "";
        }
        else{
          $lensta = strlen($hsta);
          $sssta = substr($hsta, -2);
          $mmsta = substr($hsta, -4, -2);
          $hhsta = substr($hsta, -$lensta, -4);
          echo $hhsta . ":" . $mmsta . ":" . $sssta;
        }
      ?>
    </td>
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
    <td class="bordaTabela" id="cor_saldo" width="9%">
      <?php 
        $hsgb = $horasBG['0']['balance_hours_b_group'];
        if (empty($hsgb)) {
          echo "";
        }
        else{
          $lensgb = strlen($hsgb);
          $sssgb = substr($hsgb, -2);
          $mmsgb = substr($hsgb, -4, -2);
          $hhsgb = substr($hsgb, -$lensgb, -4);
          echo $hhsgb . ":" . $mmsgb . ":" . $sssgb; 

        } 
      ?>
    </td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hrgb = $horasBG['0']['hours_b_performed_group'];
        if (empty($hrgb)) {
           echo "";
         }
        else{
          $lenrgb=strlen($hrgb);
          $ssrgb = substr($hrgb, -2);
          $mmrgb = substr($hrgb, -4, -2);
          $hhrgb = substr($hrgb, -$lenrgb, -4);
          echo $hhrgb . ":" . $mmrgb . ":" . $ssrgb;  
        } 
      ?>
    </td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo">
      <?php 
        $hsib = $horasBI['0']['balance_hours_b_individual'];
        if (empty($hsib)) {
          echo "";
          # code...
        }
        else{
          $lensib = strlen($hsib);
          $sssib = substr($hsib, -2);
          $mmsib = substr($hsib, -4, -2);
          $hhsib = substr($hsib, -$lensib, -4);
          echo $hhsib . ":" . $mmsib . ":" . $sssib;
      
        }  
      ?>
    </td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hrib = $horasBI['0']['hours_b_performed_individual'];
        if (empty($hrib)) {
          echo "";
        }
        else{
          $lenrib=strlen($hrib);
          $ssrib = substr($hrib, -2);
          $mmrib = substr($hrib, -4, -2);
          $hhrib = substr($hrib, -$lenrib, -4);
          echo $hhrib . ":" . $mmrib . ":" . $ssrib;
        }
      ?>
    </td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
    <td class="bordaTabela" id="cor_footer">
      <?php 
        $hstb = $horasBG['0']['hours_b_performed_group']+$horasBI['0']['hours_b_performed_individual'];
        if (empty($hstb)) {
          echo "";
        }
        else{
          $lenstb = strlen($hstb);
          $ssstb = substr($hstb, -2);
          $mmstb = substr($hstb, -4, -2);
          $hhstb = substr($hstb, -$lenstb, -4);
          echo $hhstb . ":" . $mmstb . ":" . $ssstb;
        }
      ?>
    </td>
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
    <td class="bordaTabela" id="cor_saldo" width="9%">
      <?php
        $hsgc = $horasCG['0']['balance_hours_c_group'];
        if (empty($hsgc)) {
          echo "";
        }
        else{
          $lensgc = strlen($hsgc);
          $sssgc = substr($hsgc, -2);
          $mmsgc = substr($hsgc, -4, -2);
          $hhsgc = substr($hsgc, -$lensgc, -4);
          echo $hhsgc . ":" . $mmsgc . ":" . $sssgc;
        } 
      ?>
    </td>
    <th class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hrgc = $horasCG['0']['hours_c_performed_group'];
        if (empty($hrgc)) {
           echo "";
         }
        else{
          $lenrgc = strlen($hrgc);
          $ssrgc = substr($hrgc, -2);
          $mmrgc = substr($hrgc, -4, -2);
          $hhrgc = substr($hrgc, -$lenrgc, -4);
          echo $hhrgc . ":" . $mmrgc . ":" . $ssrgc;  
        } 
      ?>
    </td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_saldo" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_saldo">
      <?php 
        $hsic = $horasCI['0']['balance_hours_c_individual'];
        if (empty($hsic)) {
          echo "";
          # code...
        }
        else{
          $lensic = strlen($hsic);
          $sssic = substr($hsic, -2);
          $mmsic = substr($hsic, -4, -2);
          $hhsic = substr($hsic, -$lensic, -4);
          echo $hhsic . ":" . $mmsic . ":" . $sssic;
      
        }  
      ?>
    </td>
    <th  class="bordaTabela" id="cor_horas_real" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horas_real">
      <?php 
        $hric = $horasCI['0']['hours_c_performed_individual'];
        if (empty($hric)) {
          echo "";
        }
        else{
          $lenric=strlen($hric);
          $ssric = substr($hric, -2);
          $mmric = substr($hric, -4, -2);
          $hhric = substr($hric, -$lenric, -4);
          echo $hhric . ":" . $mmric . ":" . $ssric;
        }
      ?>
    </td>
  </tr>
  <tr>
    <th  class="bordaTabela" id="cor_footer" colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
    <td class="bordaTabela" id="cor_footer">
      <?php 
        $hstc = $horasCG['0']['hours_c_performed_group']+$horasCI['0']['hours_c_performed_individual'];
        if (empty($hstc)) {
          echo "";
        }
        else{
        $lenstc = strlen($hstc);
        $ssstc = substr($hstc, -2);
        $mmstc = substr($hstc, -4, -2);
        $hhstc = substr($hstc, -$lenstc, -4);
        echo $hhstc . ":" . $mmstc . ":" . $ssstc;
      }
      ?>
    </td>
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


