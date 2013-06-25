<?php $html =''; ?>

<?php if ($filtersName == 'all') { 
	$html = $html."<h1>". $nameCompany ."</h1>";
	if (empty($consulting_A)) {}
	else {
  
  	$html = $html .'<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria A</th>
        <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
        <th id="cor_horaGrupo" width="7%" scope="col">'.$consulting_A[0]["projects"]["a_hours_group"].'</th>
    </tr>
    <tr>
        <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
        <th class="bordaTabela" id="cor_horaInd">'
        	.$consulting_A[0]['projects']['a_hours_individual'].
        '</th>
    </tr>
    <tr>
        <th class="bordaTabela" width="5%" scope="row">ID</th>
        <th class="bordaTabela" colspan="2">Atividade</th>
        <th class="bordaTabela" width="20%">Consultor</th>
        <th class="bordaTabela" width="13%">Data</th>
        <th class="bordaTabela" width="10%">Tipo</th>
        <th class="bordaTabela">Quant. Horas</th>
    </tr>';             
    for ($na=0; $na<=count($consulting_A)-1; $na++){        
      $ta = ($consulting_A[$na]); 
      $html = 
	      $html .'<tr>
	        <td class="bordaTabela" scope="row">'.$ta['activities']['id'] .'</td>
	        <td class="bordaTabela" colspan="2">'. $ta['activities']['description'] .'</td>
	        <td class="bordaTabela" >'. $ta['consultants']['name'] .'</td>
	        <td class="bordaTabela" >'. $ta['activities']['date'] .'</td>
	        <td class="bordaTabela" >'. $ta['entries']['type'] .'</td>
	        <td class="bordaTabela" >'. $ta['entries']['hours_worked'] .'</td>
	      </tr>';
    }       

    $horasAG = $hours_A_group[0];       
    $horasAI = $hours_A_ind[0];   

if ($filtersName == 'all') {     
    $html = $html .'<tr>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
      <td class="bordaTabela" id="cor_horaGrupo"width="9%">'.$horasAG['0']['balance_hours_a_group'].'</td>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
      <td class="bordaTabela" id="cor_horaGrupo">'.substr($horasAG['0']['balance_hours_a_group'],0,2).':'.substr($horasAG['0']['balance_hours_a_group'],2,2).'
      </td>
    </tr>
    <tr>
      <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
      <td class="bordaTabela" id="cor_horaInd">'.$horasAI['0']['balance_hours_a_individual'].'
      </td>
      <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
      <td class="bordaTabela" id="cor_horaInd">'.$horasAI['0']['hours_a_performed_individual'].'</td>
    </tr>
    <tr>
        <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria A</th>
        <td class="bordaTabela"> </td>
    </tr>
  </table>';
 } }

  if (empty($consulting_B)) {
    $html = $html .'<p>Não houve consultoria B</p>';
  }
  else {

	$html = $html . '<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria B</th>
	    <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
	    <th id="cor_horaGrupo" width="7%" scope="col">'.$consulting_B[0]['projects']['b_hours_group'].'
	    </th>
	  </tr>
	  <tr>
	    <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
	    <th class="bordaTabela" id="cor_horaInd">'.$consulting_B[0]['projects']['b_hours_individual'].'</th>
	  </tr>
	  <tr>
	    <th class="bordaTabela" width="5%" scope="row">ID</th>
	    <th class="bordaTabela" colspan="2">Atividade</th>
	    <th class="bordaTabela" width="20%">Consultor</th>
	    <th class="bordaTabela" width="13%">Data</th>
	    <th class="bordaTabela" width="10%">Tipo</th>
	    <th class="bordaTabela">Quant. Horas</th>
	  </tr>    ';       
  for ($nb=0; $nb<=count($consulting_B)-1; $nb++){        
    $tb = ($consulting_B[$nb]);
    $html = $html .'<tr>
      <td class="bordaTabela" scope="row">'.$tb['activities']['id'] .'</td>
      <td class="bordaTabela" colspan="2">'.$tb['activities']['description'] .'</td>
      <td class="bordaTabela" >'.$tb['consultants']['name'] .'</td>
      <td class="bordaTabela" >'.$tb['activities']['date'] .'</td>
      <td class="bordaTabela" >'.$tb['entries']['type'] .'</td>
      <td class="bordaTabela" >'.$tb['entries']['hours_worked'] .'</td>
    </tr>';
} 
 
  $horasBG = $hours_B_group[0];       
  $horasBI = $hours_B_ind[0];     
         
  $html = $html . '<tr>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo"width="9%">'. $horasBG['0']['balance_hours_b_group'].'</td>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo">'. $horasBG['0']['balance_hours_b_group'].'</td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd">'. $horasBI['0']['balance_hours_b_individual'].'</td>
    <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd">'. $horasBI['0']['hours_b_performed_individual'].'</td>
  </tr>
  <tr>
    <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria B</th>
    <td class="bordaTabela"> </td>
  </tr>
</table>    ';   
} 
}// Fim Tabela B         
if ($filtersName == 'all') {  
  if (empty($consulting_C)) {
    $html = $html .'<p>Não houve consultoria C</p>';
  }
  else {
 	$html = $html .'<table class="zebra" width="80%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th class="bordaTabela" id="cor_consultoria" colspan="3" rowspan="2" scope="col">Consultoria C</th>
      <th class="bordaTabela" id="cor_horaGrupo" colspan="3" scope="col">Horas contratadas em grupo</th>
      <th id="cor_horaGrupo" width="7%" scope="col">'. $consulting_C[0]['projects']['c_hours_group'].'</th>
    </tr>

    <tr>
      <th class="bordaTabela" id="cor_horaInd" colspan="3">Horas contratadas Individuais</th>
      <th class="bordaTabela" id="cor_horaInd">'. $consulting_C[0]['projects']['c_hours_individual'].'</th>
    </tr>
    <tr>
      <th class="bordaTabela" width="5%" scope="row">ID</th>
      <th class="bordaTabela" colspan="2">Atividade</th>
      <th class="bordaTabela" width="20%">Consultor</th>
      <th class="bordaTabela" width="13%">Data</th>
      <th class="bordaTabela" width="10%">Tipo</th>
      <th class="bordaTabela">Quant. Horas</th>
    </tr>     ';

 for ($nc=0; $nc<=count($consulting_C)-1; $nc++){        
  $tc = ($consulting_C[$nc]);
  $html = $html .'<tr>
    <td class="bordaTabela" scope="row">'. $tc['activities']['id'].'</td>
    <td class="bordaTabela" colspan="2">'. $tc['activities']['description'].'</td>
    <td class="bordaTabela" >'. $tc['consultants']['name'].'</td>
    <td class="bordaTabela" >'. $tc['activities']['date'].'</td>
    <td class="bordaTabela" >'. $tc['entries']['type'].'</td>
    <td class="bordaTabela" >'. $tc['entries']['hours_worked'].'</td>
  </tr> ';         
  }  
 $horasCG = $hours_C_group[0];       
 $horasCI = $hours_C_ind[0];                   
  	$html = $html .'<tr>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="2" scope="row">Saldo de Horas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo"width="9%">'. $horasCG['0']['balance_hours_c_group'].'</td>
    <th class="bordaTabela" id="cor_horaGrupo" colspan="3">Horas Realizadas em Grupo</th>
    <td class="bordaTabela" id="cor_horaGrupo">'. $horasCG['0']['balance_hours_c_group'].'</td>
  </tr>
  <tr>
    <th class="bordaTabela" id="cor_horaInd" colspan="2" scope="row">Saldo de Horas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd">'. $horasCI['0']['balance_hours_c_individual'].'</td>
    <th  class="bordaTabela" id="cor_horaInd" colspan="3">Horas Realizadas Individuais</th>
    <td class="bordaTabela" id="cor_horaInd">'. $horasCI['0']['hours_c_performed_individual'].'</td>
  </tr>
  <tr>
    <th  class="bordaTabela"colspan="6" scope="row">Total de Horas realizadas na Consultoria C</th>
    <td class="bordaTabela"> </td>
  </tr>
</table> ';
} }
	$this->Pdf->core->SetCreator(PDF_CREATOR);
	$this->Pdf->core->SetAuthor('Nicola Asuni');
	$this->Pdf->core->SetTitle('TCPDF Example 005');
	$this->Pdf->core->SetSubject('TCPDF Tutorial');
	$this->Pdf->core->SetKeywords('TCPDF, PDF, example, test, guide');

	// set cell padding
$this->Pdf->core->setCellPaddings(1, 1, 1, 1);

// set cell margins
$this->Pdf->core->setCellMargins(1, 1, 1, 1);

// set color for background
$this->Pdf->core->SetFillColor(255, 255, 127);

    $this->Pdf->core->addPage('', 'USLETTER');
    $this->Pdf->core->setFont('helvetica', '', 9);
    $this->Pdf->core->writeHTML($html);
    ob_start ();
    $this->Pdf->core->Output('report.pdf', 'D');
?>
