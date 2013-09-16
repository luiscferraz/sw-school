<?php
foreach ($projects as $project) 
{
	$list_projects[$project['Project']['id']] =$project['Project']['name'];
};
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
	<title>Agenda SW School</title>
	
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<?php echo $this->Html->css('reset'); ?>		
		<?php echo $this->Html->css('smoothness/jquery-ui-1.8rc3.custom'); ?>
		<?php echo $this->Html->css('tipsy'); ?>
		<?php echo $this->Html->css('demo'); ?>		
		<?php echo $this->Html->css('agenda'); ?>	
		<?php echo $this->Html->css('jquery.fancybox_agenda'); ?>	
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	    <?php echo $this->Html->script('jquery-ui-1.8rc3.custom.min'); ?>
	    <?php echo $this->Html->script('jquery.tipsy'); ?>
		<?php echo $this->Html->script('agenda'); ?>	    
	    <?php echo $this->Html->script('aplicacao'); ?>
		<?php echo $this->Html->script('jquery.fancybox_agenda'); ?>
		
		

	</head>
<body> 


<IMG id="logoSW" SRC="./img/logo.gif">
<IMG id="logoAgenda" SRC="./img/logoAgenda.png">
<h1>
__________________
</h1>

<h2>
Bem vindo(a), 
<?php echo $nome_usuario.'!' ;?></h2>




<?php include 'includes/menu.php'; ?>
<?php
date_default_timezone_set('America/Recife');

if( !isset($date_submit)){
	$date_submit = date('d/m/Y'); 
}
	?>

 



<form method="post" action="home">
	<input class="date" id="data-agenda" type="text" value=<?php echo $date_submit; ?> name="date_submit" maxlength="10" />
	<input class="botao" id="botao-aplicar-data" type="submit" value=" Aplicar " />
</form>
<form method="post" action="home">
	<input class="botao" id="botao-hoje-data" type="submit" value="  Hoje  " />
	
</form>

<input type="button" value="Pesquisar sigla" id="botao-pesquisar-consultor"  class='botao' onclick='listConsultores();' />
<form id = "ProjectsAddForm" method = "post" action = "home">

<a href="../../activities/add3" ><input type="button" value="Atividades" id="cadastrar-atividade" class="botao" ></a> 

<div class = "submit">
<input type="submit" value="Buscar" id="buscar" class="botao"/>
</div>


 <?php 
	
	echo $this->Form->input('Project.id',array('options' =>  $list_projects,'type' => 'select', 'empty' => '--Selecione um projeto--','label' => '', 'id' => 'projects')); 
    	
 ?> 
<br>		
<?php

$dias = 60;
$amp = 1; //0 <= amp <= 12

while (1){
	$dia_inicial = (int)substr($date_submit, 0, 2);
	$mes_inicial = (int)substr($date_submit, 3, 2);
	$ano_inicial = (int)substr($date_submit, 6, 4);
	if (!mktime(0, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial)){
		$date_submit = date('d/m/Y');
		continue;
	}
	break;
}

if($mes_inicial == 1){
	$mes_inicial = 12 -($amp -1);
	$ano_inicial -= 1;
	if($mes_inicial == 2 and $dia_inicial > 28){
		$dia_inicial = 28;
	}
}
else{
	$mes_inicial -= $amp;
	if($mes_inicial == 2 and $dia_inicial > 28){
		$dia_inicial = 28;
	}
}

?><br>


<div id = 'div_tabela_projetos'>
<table class='zebra' align='left' id='listaProjetosTabela' width="230" border="0" cellspacing="0" cellpadding="0">
<?php

//Colapse das três primeiras linhas da tabela e das 3 primeiras colunas, para formação da célula "Projetos"
//Correspondência, à direita, de Meses, dias e horários, em cada linha respectivamente.
echo '<tr><td class="zebra_td" colspan="3" rowspan="3" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));">';
echo 'Projetos:';
echo '</td><td class="zebra_td" align=center bgcolor="White">&nbsp;</td></tr><tr><td class="zebra_td" align=center bgcolor="White">&nbsp;</td></tr><tr><td class="zebra_td" align=center bgcolor="White">&nbsp;</td></tr>';

//projetos

foreach ($projectsPais as $project) {
	//conta filhos pra saber quantas linhas será necessário mesclar abaixo pra o pai ficar do mesmo tamanho dos filhos juntos
	//Aparentemente essa função não serve mais para a nova versão, mas melhor não mexer.
	$conta_filhos = 0;	
	foreach ($projectsFilhos as $projectcf) {
		if ($project['Project']['id']==$projectcf['Project']['parent_project_id']){
			$conta_filhos = $conta_filhos + 1;
			$conta_netos = 0;
			foreach ($projectsNetos as $projectcn) {
				if ($projectcf['Project']['id']==$projectcn['Project']['parent_project_id']){
					$conta_netos = $conta_netos + 1;
				if ($conta_netos > 1) {
				$conta_filhos = $conta_filhos + ($conta_netos - 1);
				}
				}
			}		
		}
	}
	$mesclar = $conta_filhos;
	//mesclar colunas e linhas do projeto pai de acordo com a quantidade de filhos/netos pra ficar o mesmo tamanho
	if ($mesclar == 0) {
		$mesclar_cols = 3;
		$mesclar_rows = 4;
	}else{
		$mesclar_cols = 1;
		$mesclar = ($mesclar * 4);
		$mesclar_rows = $mesclar;	
	}
	//nome do projeto atual no loop

	//A partir daqui, ele imprime apenas os projetos Pais, mesmo que eles tenham filhos ou não, já que isso não importa nessa nova versão.
		echo '<tr>';
		echo '<td class="zebra_td" colspan="3" rowspan="4" nowrap align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ddddfe), to(Lavender));">';
		echo $project['Project']['name'];
		echo '</td>';
		echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
		echo '</tr>';
//Fim dos projetos pais.

	//Esse código é a mesma coisa do de lá de cima: não sei se ainda é útil, mas não vamos mexer ;D
	//se o projeto tiver filhos	
	if ($mesclar <> 0) {
	//conta os filhos dele
		foreach ($projectsFilhos as $projectf) {
			$conta_netos2 = 0;
			foreach ($projectsNetos as $projectcn) {			
				if ($projectf['Project']['id']==$projectcn['Project']['parent_project_id']){					
					$conta_netos2 = $conta_netos2 + 1;	
				}  
			}
			//se o projeto filho não tiver filho, mescla 2 colunas pra direita e 4 pra baixo (os 4 consultores)
			if ($conta_netos2 == 0) {
				$mesclar_cols2 = 2;
				$conta_netos2 = 4;
				$check_conta_netos = 1;
			}else{
			//se o projeto filho tiver filho, mescla abaixo a quantidade de filhos * 4 (os 4 consultores de cada filho)
				$check_conta_netos = 0;
				$mesclar_cols2 = 1;
				$conta_netos2 = ($conta_netos2*4);
			}
			//nome do projeto atual no loop
			//Verifica se o Id do projeto Pai atual é igual ao Id do pai do projeto Filho atual
			if ($project['Project']['id']==$projectf['Project']['parent_project_id']){
				//echo '<td class="zebra_td" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ffe7d8), to(LavenderBlush));" nowrap colspan="'.$mesclar_cols2.'" rowspan="'.$conta_netos2.'">';	
				//echo $projectf['Project']['name'];
				//echo '</td>';
				
				if (($conta_netos2 == 4)and($check_conta_netos == 1)) {		
				// Caso2 - Projetos com filhos e sem netos

					//Imprime apenas os filhos, sem os netos, porque ele não tem filhos.
					echo '<tr>';
					echo '<td class="zebra_td" width="16" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ddddfe), to(Lavender));">&nbsp;</td>';
					echo '<td class="zebra_td" colspan="2" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ffe7d8), to(LavenderBlush));" nowrap>';
					echo $projectf['Project']['name'];
					echo '</td>';
					echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
					echo '</tr>';
					echo '<tr>';
					echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
					echo '</tr>';


//					echo '<td class="zebra_td" align=center bgcolor="White">';
//					echo '&nbsp;&nbsp;FILHO1';
//					echo '</td>';
//					echo '</tr>';
//					echo '<tr>';
//					echo '<td class="zebra_td" align=center bgcolor="White">';
//					echo '&nbsp;&nbsp;FILHO2';
//					echo '</td>';
//					echo '</tr>';
//					echo '<tr>';
//					echo '<td class="zebra_td" align=center bgcolor="White">';
//					echo '&nbsp;&nbsp;FILHO3';
//					echo '</td>';
//					echo '</tr>';
//					echo '<tr>';
//					echo '<td class="zebra_td" align=center bgcolor="White">';
//					echo '&nbsp;&nbsp;FILHO4';
//					echo '</td>';
//					echo '</tr>';
					
				} else {
							//Imprime os projetos filhos e, logo abaixo no "foreach", ele imprime os netos.
							echo '<tr>';
							echo '<td class="zebra_td" width="16" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ddddfe), to(Lavender));">&nbsp;</td>';
							echo '<td class="zebra_td" colspan="2" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ffe7d8), to(LavenderBlush));" nowrap>';
							echo $projectf['Project']['name'];
							echo '</td>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';

					//Aqui vão os netos
					foreach ($projectsNetos as $projectn) {				
						if ($projectf['Project']['id']==$projectn['Project']['parent_project_id']){

							echo '<tr>';
							echo '<td class="zebra_td" width="16" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ddddfe), to(Lavender));">&nbsp;</td>';
							echo '<td class="zebra_td" width="16" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#ffe7d8), to(LavenderBlush));" nowrap>&nbsp;</td>';
							echo '<td class="zebra_td" width="184" rowspan="4" align="center" valign="middle" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#d3efe1), to(AliceBlue));">';
							echo $projectn['Project']['name'];
							echo '</td>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';
							echo '<tr>';
							echo '<td class="zebra_td" align=center bgcolor="White">&nbsp;</td>';
							echo '</tr>';





//							echo '<td class="zebra_td" style="background-image: -webkit-gradient(linear, left top, left bottom, from(#d3efe1), to(AliceBlue));" align=center nowrap rowspan=4>';	
//							echo $projectn['Project']['name'];
//							echo '</td>';
//							echo '<td class="zebra_td" align=center bgcolor="White">';
//							echo '&nbsp;&nbsp;NETO1';
//							echo '</td>';
//							echo '</tr>';
//							echo '<tr>';
//							echo '<td class="zebra_td" align=center bgcolor="White">';
//							echo '&nbsp;&nbsp;NETO2';
//							echo '</td>';
//							echo '</tr>';
//							echo '<tr>';
//							echo '<td class="zebra_td" align=center bgcolor="White">';
//							echo '&nbsp;&nbsp;NETO3';
//							echo '</td>';
//							echo '</tr>';
//							echo '<tr>';
//							echo '<td class="zebra_td" align=center bgcolor="White">';
//							echo '&nbsp;&nbsp;NETO4';
//							echo '</td>';
//							echo '</tr>';
					
							//Caso3 - Projetos com filhos e com netos
							
						}		
					}
				}
			}
		}
	}
}

//fim projetos

 ?>

</table>
</div>

</div>


<div id = 'div_tabela_agenda'>
<table border = 2 id="tabela_agenda" class="tabelaEditavel" >

<?php

date_default_timezone_set('America/Recife');

//linha dos meses

echo '<tr>';

//echo '<td colspan="3" rowspan="3" align=center  bgcolor="White">';
//echo 'Projetos:';
//echo '</td>';

//perspectiva de 2 meses apartir da data de hoje(60 dias)
for ($dia = 0; $dia <= $dias; $dia++) {
	//string para background das td's
	$bgColorMes = 'style="background-image: -webkit-gradient(linear, right top, left bottom, from(#fff8dc), to(#f4e9bd));"';
	//cria uma data com a data de hoje + (24 horas*contador)
	$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);

	$ver = date('D',$dataFinal);
	if ($ver == 'Mon'){
		//se for Segunda-feira, mescla 10 colunas a direita com o nome do mes, depois 2 colunas cinzas (final de semana)
		echo '<td style="background-image: -webkit-gradient(linear, right top, left bottom, from(#fff8dc), to(#f4e9bd));" style="height:25px" colspan="10" >';
		echo date('<b>F',$dataFinal);
		echo '&nbsp;-&nbsp;';
		echo date('Y</b>',$dataFinal);
		echo '</td>';
		echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+6;
	} elseif ($ver == 'Tue'){
		echo '<td colspan="8" ',$bgColorMes,'>';
		echo date('<b>F',$dataFinal);
		echo '&nbsp;-&nbsp;';
		echo date('Y</b>',$dataFinal);
		echo '</td>';
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+5;
	} elseif ($ver == 'Wed'){
		echo '<td colspan="6" ',$bgColorMes,'>';
		echo date('<b>F',$dataFinal);
		echo '&nbsp;-&nbsp;';
		echo date('Y</b>',$dataFinal);
		echo '</td>';
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+4;
	} elseif ($ver == 'Thu'){
		echo '<td colspan="4" ',$bgColorMes,'>';
		echo date('<b>M',$dataFinal);
		echo '&nbsp;-&nbsp;';
		echo date('Y</b>',$dataFinal);
		echo '</td>';
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+3;
	} elseif ($ver == 'Fri'){
		echo '<td colspan="2" ',$bgColorMes,'>';
		echo date('<b>M',$dataFinal);
		echo '&nbsp;-&nbsp;';
		echo date('Y</b>',$dataFinal);
		echo '</td>';
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+2;
	} elseif ($ver == 'Sat'){
		echo '<td  colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+1;
	} elseif ($ver == 'Sun'){	
		echo '<td  colspan="2" bgcolor="gray" align=center>';	
		echo '&nbsp;&nbsp;';
		echo '</td>';
	}
}
echo '</tr>';
//fim da linha dos meses

//linha dos números dos dias
echo '<tr>';
for ($dia = 0; $dia <= $dias; $dia++) {
	//cria uma data com a data de hoje + (24 horas*contador)
	$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
	//se for um final de semana não imprime o dia e imprime cinza

	//string para background das td's
	$bgColorDia = 'style="background-image: -webkit-gradient(linear, right top, left bottom, from(#ffdead), to(#f4e9bd));"';


	if (date('D',$dataFinal) == 'Sat'){
		echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';	
		$dia = $dia+1;
		}
	else if (date('D',$dataFinal) == 'Sun'){	
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';
		echo '</td>';
	//imprime o numero do dia
	} else {
		echo '<td colspan="2" ',$bgColorDia,'>';
		echo date('d',$dataFinal);
		echo '</td>';
	}
}
echo '</tr>';
//fim da linha dos números dos dias

//linha dos M T
echo '<tr>';
for ($dia = 0; $dia <= $dias; $dia++) {
	//cria uma data com a data de hoje + (24 horas*contador)
	$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
	//se for um final de semana não imprime o dia e imprime cinza


	//string para background das td's
	$bgColorM = 'style="background-image: -webkit-gradient(linear, right top, left bottom, from(#40e0d0), to(#56beb4));"';
	//string para background das td's
	$bgColorT = 'style="background-image: -webkit-gradient(linear, right top, left bottom, from(#98fb98), to(#64cf64));"';


	if (date('D',$dataFinal) == 'Sat'){
		echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';	
		$dia = $dia+1;
		}
	else if (date('D',$dataFinal) == 'Sun'){	
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
	} else {
		//imprime as 2 colunas Manha e Tarde
		echo '<td id="tdTurnos" ',$bgColorM,'>';
		echo '&nbsp;M&nbsp;';			
		echo '</td >';
		echo '<td id="tdTurnos" ',$bgColorT,'>';
		echo '&nbsp;T&nbsp;';		
		echo '</td>';
	}	
}
echo '</tr>';
//fim da linha dos MT

//projetos

foreach ($projectsPais as $project) {
	//conta filhos pra saber quantas linhas será necessário mesclar abaixo pra o pai ficar do mesmo tamanho dos filhos juntos
	$conta_filhos = 0;	
	foreach ($projectsFilhos as $projectcf) {
		if ($project['Project']['id']==$projectcf['Project']['parent_project_id']){
			$conta_filhos = $conta_filhos + 1;
			$conta_netos = 0;
			foreach ($projectsNetos as $projectcn) {
				if ($projectcf['Project']['id']==$projectcn['Project']['parent_project_id']){
					$conta_netos = $conta_netos + 1;
					if ($conta_netos > 1) {
						$conta_filhos = $conta_filhos + ($conta_netos - 1);
					}
				}
			}		
		}
	}
	$mesclar = $conta_filhos;
	//mesclar colunas e linhas do projeto pai de acordo com a quantidade de filhos/netos pra ficar o mesmo tamanho
	if ($mesclar == 0) {
		$mesclar_cols = 3;
		$mesclar_rows = 4;
	}else{
		$mesclar_cols = 1;
		$mesclar = ($mesclar * 4);
		$mesclar_rows = $mesclar;	
	}
	//nome do projeto atual no loop
	echo '<tr>';

	//echo '<td bgcolor="Lavender" align=center nowrap colspan ="'.$mesclar_cols.'"  rowspan="'.$mesclar_rows.'">';
	//echo $project['Project']['name'];
	//echo '</td>';

	//se o projeto não tiver filhos/netos, não precisa mesclar abaixo, ja pode imprimir os consultores
	
		//Caso1 - Projetos sem filhos
		//AQUI VÃO TODOS OS PROJETOS PAIS
		//Linha do consultor 1 dos projetos sem filhos e sem netos
					
		for ($dia = 0; $dia <= $dias; $dia++) {	
			$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
			if (date('D',$dataFinal) == 'Sat'){
				echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';		
				echo '</td>';	
				$dia = $dia+1;
			}else if (date('D',$dataFinal) == 'Sun'){	
				echo '<td colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';	
				echo '</td>';		
			} else {
				//valor da manha do dia
				$idM = (string)$project['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.1';			
				if (array_key_exists($idM, $arrayConsultor1)){
					echo '<td align=center bgcolor="'.$arrayConsultor1[$idM][1].'" title="'.$arrayConsultor1[$idM][2].'" class="days" id="'.$idM.'">';
					$idX = $idM . '.' . $arrayConsultor1[$idM][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor1[$idM][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
					//valor da tarde do dia
				$idT = (string)$project['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.1';			
				if (array_key_exists($idT, $arrayConsultor1)){
					echo '<td align=center bgcolor="'.$arrayConsultor1[$idT][1].'" title="'.$arrayConsultor1[$idT][2].'" class="days" id="'.$idT.'">';

					$idX = $idT . '.' . $arrayConsultor1[$idT][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor1[$idT][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
			}	
		}
		echo '</tr>';
		//Linha do consultor 2 dos projetos sem filhos e sem netos
		echo '<tr>';
		for ($dia = 0; $dia <= $dias; $dia++) {	
			$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
			if (date('D',$dataFinal) == 'Sat'){
				echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';		
				echo '</td>';	
				$dia = $dia+1;
			}else if (date('D',$dataFinal) == 'Sun'){	
				echo '<td colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';	
				echo '</td>';		
			} else {
				//valor da manha do dia
				$idM = (string)$project['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.2';			
				if (array_key_exists($idM, $arrayConsultor2)){
					echo '<td align=center bgcolor="'.$arrayConsultor2[$idM][1].'" title="'.$arrayConsultor2[$idM][2].'" class="days" id="'.$idM.'">';
					$idX = $idM . '.' . $arrayConsultor2[$idM][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor2[$idM][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
					//valor da tarde do dia
				$idT = (string)$project['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.2';			
				if (array_key_exists($idT, $arrayConsultor2)){
					echo '<td align=center bgcolor="'.$arrayConsultor2[$idT][1].'" title="'.$arrayConsultor2[$idT][2].'" class="days" id="'.$idT.'">';
					$idX = $idT . '.' . $arrayConsultor2[$idT][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor2[$idT][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
			}	
		}
		echo '</tr>';
		
		//Linha do consultor 3 dos projetos sem filhos e sem netos
		echo '<tr>';
		for ($dia = 0; $dia <= $dias; $dia++) {	
			$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
			if (date('D',$dataFinal) == 'Sat'){
				echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';		
				echo '</td>';	
				$dia = $dia+1;
			}else if (date('D',$dataFinal) == 'Sun'){	
				echo '<td colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';	
				echo '</td>';		
			} else {
				//valor da manha do dia
				$idM = (string)$project['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.3';			
				if (array_key_exists($idM, $arrayConsultor3)){
					echo '<td align=center bgcolor="'.$arrayConsultor3[$idM][1].'" title="'.$arrayConsultor3[$idM][2].'" class="days" id="'.$idM.'">';
					$idX = $idM . '.' . $arrayConsultor3[$idM][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor3[$idM][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
					//valor da tarde do dia
				$idT = (string)$project['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.3';			
				if (array_key_exists($idT, $arrayConsultor3)){
					echo '<td align=center bgcolor="'.$arrayConsultor3[$idT][1].'" title="'.$arrayConsultor3[$idT][2].'" class="days" id="'.$idT.'">';
					$idX = $idT . '.' . $arrayConsultor3[$idT][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor3[$idT][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
			}	
		}
		echo '</tr>';
	
		//Linha do consultor 4 dos projetos sem filhos e sem netos
		echo '<tr>';					
		for ($dia = 0; $dia <= $dias; $dia++) {	
			$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
			if (date('D',$dataFinal) == 'Sat'){
				echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';		
				echo '</td>';	
				$dia = $dia+1;
			}else if (date('D',$dataFinal) == 'Sun'){	
				echo '<td colspan="2" bgcolor="gray" align=center>';
				echo '&nbsp;&nbsp;';	
				echo '</td>';		
			} else {
				//valor da manha do dia
				$idM = (string)$project['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.4';			
				if (array_key_exists($idM, $arrayConsultor4)){
					echo '<td align=center bgcolor="'.$arrayConsultor4[$idM][1].'" title="'.$arrayConsultor4[$idM][2].'" class="days" id="'.$idM.'">';
					$idX = $idM . '.' . $arrayConsultor4[$idM][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor4[$idM][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
					//valor da tarde do dia
				$idT = (string)$project['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.4';			
				if (array_key_exists($idT, $arrayConsultor4)){
					echo '<td align=center bgcolor="'.$arrayConsultor4[$idT][1].'" title="'.$arrayConsultor4[$idT][2].'" class="days" id="'.$idT.'">';
					$idX = $idT . '.' . $arrayConsultor4[$idT][0];
					echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
					echo '<div style="height:100%;width:100%">';
					echo $arrayConsultor4[$idT][0];
					echo '</div>';
					echo '</a>';
					echo '</td >';
				}else {
					echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
					echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
					echo '<span style="display: block;height:24px;;width:24px;"></span>';
					echo '</a>';
					echo '</td >';
				}
			}	
		}
		echo '</tr>';
		//fim das linhas dos consultores dos projetos sem filhos
		//se o projeto tiver filhos	
	if ($mesclar <> 0) {
		//conta os filhos dele
		foreach ($projectsFilhos as $projectf) {
			$conta_netos2 = 0;
			foreach ($projectsNetos as $projectcn) {			
				if ($projectf['Project']['id']==$projectcn['Project']['parent_project_id']){					
					$conta_netos2 = $conta_netos2 + 1;	
				}  
			}
			//se o projeto filho não tiver filho, mescla 2 colunas pra direita e 4 pra baixo (os 4 consultores)
			if ($conta_netos2 == 0) {
				$mesclar_cols2 = 2;
				$conta_netos2 = 4;
				$check_conta_netos = 1;
			}else{
				//se o projeto filho tiver filho, mescla abaixo a quantidade de filhos * 4 (os 4 consultores de cada filho)
				$check_conta_netos = 0;
				$mesclar_cols2 = 1;
				$conta_netos2 = ($conta_netos2*4);
			}
			//nome do projeto atual no loop
			if ($project['Project']['id']==$projectf['Project']['parent_project_id']){
				//echo '<td bgcolor="LavenderBlush" align=center nowrap colspan="'.$mesclar_cols2.'" rowspan="'.$conta_netos2.'">';	
				//echo $projectf['Project']['name'];
				//echo '</td>';
				
				if (($conta_netos2 == 4)and($check_conta_netos == 1)) {		
				//AQUI VÃO OS FILHOS DOS PROJETOS COM FILHOS SEM NETOS
					//Linha do consultor 1 dos projetos com filhos e sem netos
					
					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		
						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.1';			
							if (array_key_exists($idM, $arrayConsultor1)){
								echo '<td style="height:25px" align=center bgcolor="'.$arrayConsultor1[$idM][1].'" title="'.$arrayConsultor1[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor1[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor1[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td style="height:25px" align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.1';			
							if (array_key_exists($idT, $arrayConsultor1)){
								echo '<td style="height:25px" align=center bgcolor="'.$arrayConsultor1[$idT][1].'" title="'.$arrayConsultor1[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor1[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor1[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td style="height:25px" align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
	
					//Linha do consultor 2 dos projetos com filhos e sem netos
					echo '<tr>';					
					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.2';			
							if (array_key_exists($idM, $arrayConsultor2)){
								echo '<td align=center bgcolor="'.$arrayConsultor2[$idM][1].'" title="'.$arrayConsultor2[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor2[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor2[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.2';			
							if (array_key_exists($idT, $arrayConsultor2)){
								echo '<td align=center bgcolor="'.$arrayConsultor2[$idT][1].'" title="'.$arrayConsultor2[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor2[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor2[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';

					//Linha do consultor 3 dos projetos com filhos e sem netos
					echo '<tr>';

					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.3';			
							if (array_key_exists($idM, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor3[$idM][1].'" title="'.$arrayConsultor3[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor3[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor3[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.3';			
							if (array_key_exists($idT, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor3[$idT][1].'" title="'.$arrayConsultor3[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor3[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor3[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
	
					//Linha do consultor 4 dos projetos com filhos e sem netos
					echo '<tr>';					
					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.4';			
							if (array_key_exists($idM, $arrayConsultor4)){
								echo '<td align=center bgcolor="'.$arrayConsultor4[$idM][1].'" title="'.$arrayConsultor4[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor4[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor4[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.4';			
							if (array_key_exists($idT, $arrayConsultor4)){
								echo '<td align=center bgcolor="'.$arrayConsultor4[$idT][1].'" title="'.$arrayConsultor4[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor4[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor4[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
				//fim das linhas dos consultores dos projetos com filhos e sem netos
			
				} else {
					//AQUI VÃO OS FILHOS DO PROJETOS COM FILHOS E NETOS

					//Linha do consultor 1 dos projetos com filhos e com netos
						for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		
						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.1';			
							if (array_key_exists($idM, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor1[$idM][1].'" title="'.$arrayConsultor1[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor1[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor1[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.1';			
							if (array_key_exists($idT, $arrayConsultor1)){
								echo '<td align=center bgcolor="'.$arrayConsultor1[$idT][1].'" title="'.$arrayConsultor1[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor1[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor1[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
	
					//Linha do consultor 2 dos projetos com filhos e com netos
					echo '<tr>';					
					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.2';			
							if (array_key_exists($idM, $arrayConsultor2)){
								echo '<td align=center bgcolor="'.$arrayConsultor2[$idM][1].'" title="'.$arrayConsultor2[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor2[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor2[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.2';			
							if (array_key_exists($idT, $arrayConsultor2)){
								echo '<td align=center bgcolor="'.$arrayConsultor2[$idT][1].'" title="'.$arrayConsultor2[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor2[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor2[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';

					//Linha do consultor 3 dos projetos com filhos e com netos
					echo '<tr>';

					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.3';			
							if (array_key_exists($idM, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor3[$idM][1].'" title="'.$arrayConsultor3[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor3[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor3[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.3';			
							if (array_key_exists($idT, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor3[$idT][1].'" title="'.$arrayConsultor3[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor3[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor3[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
	
					//Linha do consultor 4 dos projetos com filhos e com netos
					echo '<tr>';					
					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.4';			
							if (array_key_exists($idM, $arrayConsultor4)){
								echo '<td align=center bgcolor="'.$arrayConsultor4[$idM][1].'" title="'.$arrayConsultor4[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor4[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor4[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectf['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.4';			
							if (array_key_exists($idT, $arrayConsultor4)){
								echo '<td align=center bgcolor="'.$arrayConsultor4[$idT][1].'" title="'.$arrayConsultor4[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor4[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor4[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
				//fim das linhas dos consultores dos projetos com filhos e com netos

					//AQUI VÃO OS NETOS DOS PROJETOS COM FILHOS E NETOS
					foreach ($projectsNetos as $projectn) {				
						if ($projectf['Project']['id']==$projectn['Project']['parent_project_id']){
							//echo '<td bgcolor="AliceBlue" align=center nowrap rowspan=4>';	
							//echo $projectn['Project']['name'];
							//echo '</td>';
							
							//Caso3 - Projetos com filhos e com netos

					//Linha do consultor 1 dos Netos
						for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		
						} else {
							//valor da manha do dia
							$idM = (string)$projectn['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.1';			
							if (array_key_exists($idM, $arrayConsultor1)){
								echo '<td align=center bgcolor="'.$arrayConsultor1[$idM][1].'" title="'.$arrayConsultor1[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor1[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor1[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectn['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.1';			
							if (array_key_exists($idT, $arrayConsultor1)){
								echo '<td align=center bgcolor="'.$arrayConsultor1[$idT][1].'" title="'.$arrayConsultor1[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor1[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor1[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
							//Linha do consultor 2 dos netos
							echo '<tr>';
							for ($dia = 0; $dia <= $dias; $dia++) {	
							$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
								if (date('D',$dataFinal) == 'Sat'){
									echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
									echo '&nbsp;&nbsp;';		
									echo '</td>';	
									$dia = $dia+1;
								}
								else if (date('D',$dataFinal) == 'Sun'){	
									echo '<td colspan="2" bgcolor="gray" align=center>';
									echo '&nbsp;&nbsp;';	
									echo '</td>';		

								} else {
							//valor da manha do dia
							$idM = (string)$projectn['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.2';			
							if (array_key_exists($idM, $arrayConsultor2)){
								echo '<td align=center bgcolor="'.$arrayConsultor2[$idM][1].'" title="'.$arrayConsultor2[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor2[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor2[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectn['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.2';			
							if (array_key_exists($idT, $arrayConsultor2)){
								echo '<td align=center bgcolor="'.$arrayConsultor2[$idT][1].'" title="'.$arrayConsultor2[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor2[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor2[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';

							
					//Linha do consultor 3 dos netos
					echo '<tr>';

					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectn['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.3';			
							if (array_key_exists($idM, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor3[$idM][1].'" title="'.$arrayConsultor3[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor3[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor3[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectn['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.3';			
							if (array_key_exists($idT, $arrayConsultor3)){
								echo '<td align=center bgcolor="'.$arrayConsultor3[$idT][1].'" title="'.$arrayConsultor3[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor3[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor3[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="#E0EEE0" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
							
					//Linha do consultor 4 dos netos
					echo '<tr>';					
					for ($dia = 0; $dia <= $dias; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
						if (date('D',$dataFinal) == 'Sat'){
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';	
							$dia = $dia+1;
						}
						else if (date('D',$dataFinal) == 'Sun'){	
							echo '<td style="height:25px" colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';	
							echo '</td>';		

						} else {
							//valor da manha do dia
							$idM = (string)$projectn['Project']['id'] . '.M.' . date('Y-m-d',$dataFinal) . '.4';			
							if (array_key_exists($idM, $arrayConsultor4)){
								echo '<td align=center bgcolor="'.$arrayConsultor4[$idM][1].'" title="'.$arrayConsultor4[$idM][2].'" class="days" id="'.$idM.'">';
								$idX = $idM . '.' . $arrayConsultor4[$idM][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor4[$idM][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idM.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idM.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
								//valor da tarde do dia
							$idT = (string)$projectn['Project']['id'] . '.T.' . date('Y-m-d',$dataFinal) . '.4';			
							if (array_key_exists($idT, $arrayConsultor4)){
								echo '<td align=center bgcolor="'.$arrayConsultor4[$idT][1].'" title="'.$arrayConsultor4[$idT][2].'" class="days" id="'.$idT.'">';
								$idX = $idT . '.' . $arrayConsultor4[$idT][0];
								echo '<a class="fancybox fancybox.iframe golinkindex2" href="#" data-info="'. $idX . '">';
								echo '<div style="height:100%;width:100%">';
								echo $arrayConsultor4[$idT][0];
								echo '</div>';
								echo '</a>';
								echo '</td >';
							}else {
								echo '<td align=center bgcolor="White" class="days" id="'.$idT.'">';
								echo '<a class="fancybox fancybox.iframe golinkadd" href="#" data-info="' . $idT.'">';
								echo '<span style="display: block;height:24px;;width:24px;"></span>';
								echo '</a>';
								echo '</td >';
							}
						}	
					}
					echo '</tr>';
							//fim das linhas dos consultores dos projetos com filhos e com netos
						
						}	

					}


				}
					
			}
		}
	}
}

//fim projetos

 ?>

</table>

</div>


</body>
</html>

