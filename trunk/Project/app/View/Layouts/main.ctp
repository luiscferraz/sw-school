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

<table border = 2 align=center>

<?php

//linha dos meses

echo '<tr>';
echo '<td colspan="3" rowspan="2" bgcolor="White">';
echo '</td>';


$meses = array('Fevereiro','Fevereiro','Março','Março','Março','Março','Abril','Abril','Abril','Abril','Maio','Maio','Maio','Maio','Maio','Junho','Junho','Junho','Junho','Julho','Julho','Julho','Julho','Julho');
foreach ($meses as $mes) {
	echo '<td colspan="10" align=center bgcolor="Cornsilk">';
	echo $mes;
	echo '</td>';
	echo '<td colspan="2" bgcolor="gray">';
	echo '</td>';
} 
echo '</tr>';

//fim da linha dos meses

//linha dos números dos dias

echo '<tr>';

$final_de_semana = array('Sat','Sun');
for ($dia = 1; $dia <= 167; $dia++) {
	$dataFinal = mktime(24*$dia, 0, 0, 02, 17, 2013);
	if (in_array((date('D',$dataFinal)),$final_de_semana)){
		echo '<td colspan="2" bgcolor="gray" align=center>';
		echo '&nbsp;&nbsp;';		
		echo '</td>';
		$dia = $dia+1;
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
$manha_tarde = 'T';
echo '<td align=center nowrap bgcolor="White">';
echo 'PROJETOS PAI';
echo '</td>';
echo '<td align=center nowrap bgcolor="White">';
echo 'P. FILHOS';
echo '</td>';
echo '<td align=center nowrap bgcolor="White">';
echo 'P. NETOS';
echo '</td>';
for ($mt = 1; $mt <= 264; $mt++) {
	if ($mt % 11 == 0){	
		echo '<td colspan="2" bgcolor="gray">';		
		echo '</td>';						
	} else {		
		if ($manha_tarde == 'T'){
			echo '<td align=center bgcolor="Turquoise">';
			echo '&nbsp;M&nbsp;';
			$manha_tarde = 'M';
			echo '</td >';
		} else {
			echo '<td align=center bgcolor="PaleGreen">';
			echo '&nbsp;T&nbsp;';
			$manha_tarde = 'T';
			echo '</td>';
		}
	}
}
echo '</tr>';

//fim da linha dos MT

//projetos

foreach ($projectsPais as $project) {
	//conta filhos pra saber quantas linhas será necessário mesclar abaixo
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
		
	if ($mesclar == 0) {
		$mesclar_cols = 3;
		$mesclar_rows = 4;
	}else{
		$mesclar_cols = 1;
		$mesclar = ($mesclar * 4);
		$mesclar_rows = $mesclar;	
	}
	echo '<tr>';
	echo '<td bgcolor="Lavender" align=center nowrap colspan ="'.$mesclar_cols.'"  rowspan="'.$mesclar_rows.'">';
	echo $project['Project']['name'];
	echo '</td>';
	//$i = 0;
	if ($mesclar == 0) {
		//echo '</tr>';
		//echo '<tr>';
		for ($n = 1; $n <= 264; $n++) { 
			if ($n % 11 == 0){	
				echo '<td colspan="2" bgcolor="gray"></td>';	
			}else{
				echo '<td align = center bgcolor="DarkSeaGreen1">';
				echo "1";
				echo '</td>';
			}
		}
		echo '</tr>';
		echo '<tr>';
		for ($n = 1; $n <= 264; $n++) { 
			if ($n % 11 == 0){	
				echo '<td colspan="2" bgcolor="gray"></td>';	
			}else{
				echo '<td align = center bgcolor="LightCyan">';
				echo "2";
				echo '</td>';
			}
		}
		echo '</tr>';
		echo '<tr>';
		for ($n = 1; $n <= 264; $n++) { 
			if ($n % 11 == 0){	
				echo '<td colspan="2" bgcolor="gray"></td>';	
			}else{
				echo '<td align = center bgcolor="LightYellow">';
				echo "3";
				echo '</td>';
			}
		}
		echo '</tr>';
		echo '<tr>';
		for ($n = 1; $n <= 264; $n++) { 
			if ($n % 11 == 0){	
				echo '<td colspan="2" bgcolor="gray"></td>';	
			}else{
				echo '<td align = center bgcolor="MistyRose">';
				echo "4";
				echo '</td>';
			}
		}
		echo '</tr>';
		
		
	}else{
		foreach ($projectsFilhos as $projectf) {
			$conta_netos2 = 0;
			foreach ($projectsNetos as $projectcn) {
			
				if ($projectf['Project']['id']==$projectcn['Project']['parent_project_id']){
					
					$conta_netos2 = $conta_netos2 + 1;	
				}  
			}
			if ($conta_netos2 == 0) {
				$mesclar_cols2 = 2;
				$conta_netos2 = 4;
				$check_conta_netos = 1;
			}else{
				$check_conta_netos = 0;
				$mesclar_cols2 = 1;
				$conta_netos2 = ($conta_netos2*4);
			}
			if ($project['Project']['id']==$projectf['Project']['parent_project_id']){
				echo '<td bgcolor="LavenderBlush" align=center nowrap colspan="'.$mesclar_cols2.'" rowspan="'.$conta_netos2.'">';	
				echo $projectf['Project']['name'];
				echo '</td>';
				//echo '</tr>';
		
				if (($conta_netos2 == 4)and($check_conta_netos == 1)) {		
					//echo '<tr>';
					for ($n = 1; $n <= 264; $n++) { 
						if ($n % 11 == 0){	
							echo '<td colspan="2" bgcolor="gray"></td>';	
						}else{
							echo '<td align = center bgcolor="DarkSeaGreen1">';
							echo "1";
							echo '</td>';
						}
					}
					echo '</tr>';
					echo '<tr>';
					for ($n = 1; $n <= 264; $n++) { 
						if ($n % 11 == 0){	
							echo '<td colspan="2" bgcolor="gray"></td>';	
						}else{
							echo '<td align = center bgcolor="LightCyan">';
							echo "2";
							echo '</td>';
						}
					}
					echo '</tr>';
					echo '<tr>';
					for ($n = 1; $n <= 264; $n++) { 
						if ($n % 11 == 0){	
							echo '<td colspan="2" bgcolor="gray"></td>';	
						}else{
							echo '<td align = center bgcolor="LightYellow">';
							echo "3";
							echo '</td>';
						}
					}
					echo '</tr>';
					echo '<tr>';
					for ($n = 1; $n <= 264; $n++) { 
						if ($n % 11 == 0){	
							echo '<td colspan="2" bgcolor="gray"></td>';	
						}else{
							echo '<td align = center bgcolor="MistyRose">';
							echo "4";
							echo '</td>';
						}
					}
					echo '</tr>';
			
				} else {
					foreach ($projectsNetos as $projectn) {				
						if ($projectf['Project']['id']==$projectn['Project']['parent_project_id']){
							echo '<td bgcolor="AliceBlue" align=center nowrap rowspan=4>';	
							echo $projectn['Project']['name'];
							echo '</td>';
							
							//echo '<tr>';
							for ($n = 1; $n <= 264; $n++) { 
								if ($n % 11 == 0){	
									echo '<td colspan="2" bgcolor="gray"></td>';	
								}else{
									echo '<td align = center bgcolor="DarkSeaGreen1">';
									echo "1";
									echo '</td>';
								}
							}
							echo '</tr>';
					
							echo '<tr>';
							for ($n = 1; $n <= 264; $n++) { 
								if ($n % 11 == 0){	
									echo '<td colspan="2" bgcolor="gray"></td>';	
								}else{
									echo '<td align = center bgcolor="LightCyan">';
									echo "2";
									echo '</td>';
								}
							}
							echo '</tr>';
							echo '<tr>';
							for ($n = 1; $n <= 264; $n++) { 
								if ($n % 11 == 0){	
									echo '<td colspan="2" bgcolor="gray"></td>';	
								}else{
									echo '<td align = center bgcolor="LightYellow">';
									echo "3";
									echo '</td>';
								}
							}
							echo '</tr>';
							echo '<tr>';
							for ($n = 1; $n <= 264; $n++) { 
								if ($n % 11 == 0){	
									echo '<td colspan="2" bgcolor="gray"></td>';	
								}else{
									echo '<td align = center bgcolor="MistyRose">';
									echo "4";
									echo '</td>';
								}
							}
							echo '</tr>';
						
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




</body>
</html>