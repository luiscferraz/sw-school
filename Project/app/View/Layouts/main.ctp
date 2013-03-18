<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
	<head>
		<?php echo $this->Html->css('reset'); ?>		
		<?php echo $this->Html->css('smoothness/jquery-ui-1.8rc3.custom'); ?>
		<?php echo $this->Html->css('jquery.weekcalendar'); ?>
		<?php echo $this->Html->css('demo'); ?>		
		<?php echo $this->Html->css('agenda'); ?>		
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	    <?php echo $this->Html->script('jquery-ui-1.8rc3.custom.min'); ?>
	    <?php echo $this->Html->script('jquery.weekcalendar'); ?>
		<?php echo $this->Html->script('agenda'); ?>	    
	    <?php echo $this->Html->script('aplicacao'); ?>
	    
	</head>
<body> 

<h2>Agenda</h2>
<?php include 'includes/menu.php'; ?>
<div id = 'tabela'>
<table border = 2 align=center>

<?php

date_default_timezone_set('America/Recife');

//linha dos meses

echo '<tr>';
echo '<td colspan="3" rowspan="3" align=center  bgcolor="White">';
echo 'Projetos:';
echo '</td>';

//perspectiva de 6 meses apartir da data de hoje(180 dias)
for ($dia = 0; $dia <= 180; $dia++) {
	//cria uma data com a data de hoje + (24 horas*contador)
	$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
	if (date('D',$dataFinal) == 'Mon'){
		//se for Segunda-feira, mescla 10 colunas a direita com o nome do mes, depois 2 colunas cinzas (final de semana)
		echo '<td colspan="10" align=center bgcolor="Cornsilk">';
		echo date('F',$dataFinal);
		echo '</td>';
		echo '<td colspan="4" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+6;
	} elseif (date('D',$dataFinal) == 'Tue'){
		echo '<td colspan="8" align=center bgcolor="Cornsilk">';
		echo date('F',$dataFinal);
		echo '</td>';
		echo '<td colspan="4" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+5;
	} elseif (date('D',$dataFinal) == 'Wed'){
		echo '<td colspan="6" align=center bgcolor="Cornsilk">';
		echo date('F',$dataFinal);
		echo '</td>';
		echo '<td colspan="4" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+4;
	} elseif (date('D',$dataFinal) == 'Thu'){
		echo '<td colspan="4" align=center bgcolor="Cornsilk">';
		echo date('M',$dataFinal);
		echo '</td>';
		echo '<td colspan="4" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+3;
	} elseif (date('D',$dataFinal) == 'Fri'){
		echo '<td colspan="2" align=center bgcolor="Cornsilk">';
		echo date('M',$dataFinal);
		echo '</td>';
		echo '<td colspan="4" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+2;
	} elseif (date('D',$dataFinal) == 'Sat'){
		echo '<td colspan="4" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+1;
	} elseif (date('D',$dataFinal) == 'Sun'){	
		echo '<td colspan="2" bgcolor="gray" align=center>';	
		echo '&nbsp;&nbsp;';
		echo '</td>';
	}
}
echo '</tr>';
//fim da linha dos meses

//linha dos números dos dias
echo '<tr>';
$final_de_semana = array('Sat','Sun');
//perspectiva de 6 meses apartir da data de hoje(180 dias)
for ($dia = 0; $dia <= 180; $dia++) {
	//cria uma data com a data de hoje + (24 horas*contador)
	$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
	//se for um final de semana não imprime o dia e imprime cinza
	if (in_array((date('D',$dataFinal)),$final_de_semana)){
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';		
		
	//imprime o numero do dia
	} else {
		echo '<td colspan="2" align=center bgcolor="NavajoWhite">';
		echo date('d',$dataFinal);
		echo '</td>';
	}
}
echo '</tr>';
//fim da linha dos números dos dias

//linha dos M T
echo '<tr>';
$final_de_semana = array('Sat','Sun');
for ($dia = 0; $dia <= 180; $dia++) {
	//cria uma data com a data de hoje + (24 horas*contador)
	$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
	//se for um final de semana não imprime o dia e imprime cinza
	if (in_array((date('D',$dataFinal)),$final_de_semana)){
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		
	} else {
		//imprime as 2 colunas Manha e Tarde
		echo '<td align=center bgcolor="Turquoise">';
		echo '&nbsp;M&nbsp;';			
		echo '</td >';
		echo '<td align=center bgcolor="PaleGreen">';
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
	echo '<td bgcolor="Lavender" align=center nowrap colspan ="'.$mesclar_cols.'"  rowspan="'.$mesclar_rows.'">';
	echo $project['Project']['name'];
	echo '</td>';
	//se o projeto não tiver filhos/netos, não precisa mesclar abaixo, ja pode imprimir os consultores
	if ($mesclar == 0) {
	//Caso1 - Projetos sem filhos
	//Linha do consultor 1 dos projetos sem filhos
	$final_de_semana = array('Sat','Sun');
	for ($dia = 0; $dia <= 180; $dia++) {	
		$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
		if (in_array((date('D',$dataFinal)),$final_de_semana)){
		//se for fim de semana fica cinza
			echo '<td colspan="2" bgcolor="gray" align=center>';
			echo '&nbsp;&nbsp;';		
			echo '</td>';		
		} else {
			echo '<td align=center bgcolor="DarkSeaGreen1">';
			//valor da manha do dia
			$idM = (string)$project['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.1';
			echo buscar_atividade($idM);
			echo '</td >';
			echo '<td align=center bgcolor="DarkSeaGreen1">';
			//valor da tarde do dia
			$idT = (string)$project['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.1';
			echo buscar_atividade($idT);		
			echo '</td>';
		}	
	}
	echo '</tr>';
	
	//Linha do consultor 2 dos projetos sem filhos
	echo '<tr>';
	$final_de_semana = array('Sat','Sun');
	for ($dia = 0; $dia <= 180; $dia++) {	
		$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
		if (in_array((date('D',$dataFinal)),$final_de_semana)){
			echo '<td colspan="2" bgcolor="gray" align=center>';
			echo '&nbsp;&nbsp;';		
			echo '</td>';
		} else {
			echo '<td align=center bgcolor="LightCyan">';
			$idM = (string)$project['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.2';
			echo buscar_atividade($idM);			
			echo '</td >';
			echo '<td align=center bgcolor="LightCyan">';
			$idT = (string)$project['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.2';
			echo buscar_atividade($idT);			
			echo '</td>';
		}	
	}
	echo '</tr>';

	//Linha do consultor 3 dos projetos sem filhos
	echo '<tr>';
	$final_de_semana = array('Sat','Sun');
	for ($dia = 0; $dia <= 180; $dia++) {
		$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
		if (in_array((date('D',$dataFinal)),$final_de_semana)){
			echo '<td colspan="2" bgcolor="gray" align=center>';
			echo '&nbsp;&nbsp;';		
			echo '</td>';
		} else {
			echo '<td align=center bgcolor="LightYellow">';
			$idM = (string)$project['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.3';
			echo buscar_atividade($idM);			
			echo '</td >';
			echo '<td align=center bgcolor="LightYellow">';
			$idT = (string)$project['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.3';
			echo buscar_atividade($idT);			
			echo '</td>';
		}	
	}
	echo '</tr>';	
	
	//Linha do consultor 4 dos projetos sem filhos
	echo '<tr>';
	$final_de_semana = array('Sat','Sun');
	for ($dia = 0; $dia <= 180; $dia++) {
		$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
		if (in_array((date('D',$dataFinal)),$final_de_semana)){
			echo '<td colspan="2" bgcolor="gray" align=center>';
			echo '&nbsp;&nbsp;';		
			echo '</td>';
		} else {
			echo '<td align=center bgcolor="MistyRose">';
			$idM = (string)$project['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.4';
			echo buscar_atividade($idM);			
			echo '</td >';
			echo '<td align=center bgcolor="MistyRose">';
			$idT = (string)$project['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.4';
			echo buscar_atividade($idT);			
			echo '</td>';
		}	
	}
	echo '</tr>';
	//fim das linhas dos consultores dos projetos sem filhos
	
	//se o projeto tiver filhos	
	}else{
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
				echo '<td bgcolor="LavenderBlush" align=center nowrap colspan="'.$mesclar_cols2.'" rowspan="'.$conta_netos2.'">';	
				echo $projectf['Project']['name'];
				echo '</td>';
				
				if (($conta_netos2 == 4)and($check_conta_netos == 1)) {		
				// Caso2 - Projetos com filhos e sem netos
					//Linha do consultor 1 dos projetos com filhos e sem netos
					$final_de_semana = array('Sat','Sun');
					for ($dia = 0; $dia <= 180; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
						if (in_array((date('D',$dataFinal)),$final_de_semana)){
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';
						} else {
							echo '<td align=center bgcolor="DarkSeaGreen1">';
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.1';
							echo buscar_atividade($idM);			
							echo '</td >';
							echo '<td align=center bgcolor="DarkSeaGreen1">';
							$idT = (string)$projectf['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.1';
							echo buscar_atividade($idT);			
							echo '</td>';
						}	
					}
					echo '</tr>';
	
					//Linha do consultor 2 dos projetos com filhos e sem netos
					echo '<tr>';
					$final_de_semana = array('Sat','Sun');
					for ($dia = 0; $dia <= 180; $dia++) {	
						$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
						if (in_array((date('D',$dataFinal)),$final_de_semana)){
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';
						} else {
							echo '<td align=center bgcolor="LightCyan">';
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.2';
							echo buscar_atividade($idM);			
							echo '</td >';
							echo '<td align=center bgcolor="LightCyan">';
							$idT = (string)$projectf['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.2';
							echo buscar_atividade($idT);			
							echo '</td>';
						}	
					}
					echo '</tr>';

					//Linha do consultor 3 dos projetos com filhos e sem netos
					echo '<tr>';
					$final_de_semana = array('Sat','Sun');
					for ($dia = 0; $dia <= 180; $dia++) {
						$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
						if (in_array((date('D',$dataFinal)),$final_de_semana)){
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';
						} else {
							echo '<td align=center bgcolor="LightYellow">';
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.3';
							echo buscar_atividade($idM);			
							echo '</td >';
							echo '<td align=center bgcolor="LightYellow">';
							$idT = (string)$projectf['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.3';
							echo buscar_atividade($idT);			
							echo '</td>';
						}	
					}
					echo '</tr>';	
	
					//Linha do consultor 4 dos projetos com filhos e sem netos
					echo '<tr>';
					$final_de_semana = array('Sat','Sun');
					for ($dia = 0; $dia <= 180; $dia++) {
						$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
						if (in_array((date('D',$dataFinal)),$final_de_semana)){
							echo '<td colspan="2" bgcolor="gray" align=center>';
							echo '&nbsp;&nbsp;';		
							echo '</td>';
						} else {
							echo '<td align=center bgcolor="MistyRose">';
							$idM = (string)$projectf['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.4';
							echo buscar_atividade($idM);			
							echo '</td >';
							echo '<td align=center bgcolor="MistyRose">';
							$idT = (string)$projectf['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.4';
							echo buscar_atividade($idT);			
							echo '</td>';
						}	
					}
					echo '</tr>';
				//fim das linhas dos consultores dos projetos com filhos e sem netos
			
				} else {
					foreach ($projectsNetos as $projectn) {				
						if ($projectf['Project']['id']==$projectn['Project']['parent_project_id']){
							echo '<td bgcolor="AliceBlue" align=center nowrap rowspan=4>';	
							echo $projectn['Project']['name'];
							echo '</td>';
							
							//Caso3 - Projetos com filhos e com netos
							//Linha do consultor 1 dos projetos com filhos e com netos
							$final_de_semana = array('Sat','Sun');
							for ($dia = 0; $dia <= 180; $dia++) {	
								$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
								if (in_array((date('D',$dataFinal)),$final_de_semana)){
									echo '<td colspan="2" bgcolor="gray" align=center>';
									echo '&nbsp;&nbsp;';		
									echo '</td>';
								} else {
									echo '<td align=center bgcolor="DarkSeaGreen1">';
									$idM = (string)$projectn['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.1';
									echo buscar_atividade($idM);			
									echo '</td >';
									echo '<td align=center bgcolor="DarkSeaGreen1">';
									$idT = (string)$projectn['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.1';
									echo buscar_atividade($idT);			
									echo '</td>';
								}	
							}
							echo '</tr>';
							
							//Linha do consultor 2 dos projetos com filhos e com netos
							echo '<tr>';
							$final_de_semana = array('Sat','Sun');
							for ($dia = 0; $dia <= 180; $dia++) {	
								$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
								if (in_array((date('D',$dataFinal)),$final_de_semana)){
									echo '<td colspan="2" bgcolor="gray" align=center>';
									echo '&nbsp;&nbsp;';		
									echo '</td>';
								} else {
									echo '<td align=center bgcolor="LightCyan">';
									$idM = (string)$projectn['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.2';
									echo buscar_atividade($idM);			
									echo '</td >';
									echo '<td align=center bgcolor="LightCyan">';
									$idT = (string)$projectn['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.2';
									echo buscar_atividade($idT);			
									echo '</td>';
								}	
							}
							echo '</tr>';

							//Linha do consultor 3 dos projetos com filhos e com netos
							echo '<tr>';
							$final_de_semana = array('Sat','Sun');
							for ($dia = 0; $dia <= 180; $dia++) {
								$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
								if (in_array((date('D',$dataFinal)),$final_de_semana)){
									echo '<td colspan="2" bgcolor="gray" align=center>';
									echo '&nbsp;&nbsp;';		
									echo '</td>';
								} else {
									echo '<td align=center bgcolor="LightYellow">';
									$idM = (string)$projectn['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.3';
									echo buscar_atividade($idM);			
									echo '</td >';
									echo '<td align=center bgcolor="LightYellow">';
									$idT = (string)$projectn['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.3';
									echo buscar_atividade($idT);			
									echo '</td>';
								}	
							}
							echo '</tr>';	
							
							//Linha do consultor 4 dos projetos com filhos e com netos
							echo '<tr>';
							$final_de_semana = array('Sat','Sun');
							for ($dia = 0; $dia <= 180; $dia++) {
								$dataFinal = mktime(24*$dia, 0, 0, date("m"), date("d"), date("Y"));
								if (in_array((date('D',$dataFinal)),$final_de_semana)){
									echo '<td colspan="2" bgcolor="gray" align=center>';
									echo '&nbsp;&nbsp;';		
									echo '</td>';
								} else {
									echo '<td align=center bgcolor="MistyRose">';
									$idM = (string)$projectn['Project']['id'] . '.M.' . date('d/m/y',$dataFinal) . '.4';
									echo buscar_atividade($idM);			
									echo '</td >';
									echo '<td align=center bgcolor="MistyRose">';
									$idT = (string)$projectn['Project']['id'] . '.T.'. date('d/m/y',$dataFinal) . '.4';
									echo buscar_atividade($idT);			
									echo '</td>';
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