<h1>Período</h1>

<form id="form_relatori_proj" method="post" action="">
	<input type="hiden" value="<?php echo $idproject ?>" name="report[id]" style="display:none">
	<input type="radio" name="report[time]" value="all" style="width:auto">Tudo<br>
	<input type="radio" name="report[time]" value="date" style="width:auto">De : 
	<input type="text" style="width:auto" name="report[dateInit]" value="" class="date"> até <input type="text" value="" name="report[dateEnd]" style="width:auto" class="date">
	<input class="botao" id="botao_relatorio_proj" type="submit" value="Aplicar" />
</form>


<?php if ($filters) { ?>
	<select>
		<option value="membro">Membro</option>
		<option value="atividade">Atividade</option>
		<option value="categoria">Categoria</option>
		<option value="projeto">Projeto</option>
	</select>
	<?php print_r($consulting_A); ?>
	<?php print_r($consulting_B); ?>
	<?php print_r($consulting_C); ?>

	<?php print_r($hours_A_ind); ?>
	<?php print_r($hours_A_group); ?>
	<?php print_r($hours_B_ind); ?>
	<?php print_r($hours_B_group); ?>
	<?php print_r($hours_C_ind); ?>
	<?php print_r($hours_C_group); ?>
<?php } ?>




<?php echo $this -> Html -> script ('relatorios') ?>