<h3>Perido</h3>
<form method="post" action="">
	<input type="hiden" value="<?php echo $idproject ?>" name="report[id]" style="display:none">
	<input type="radio" name="report[time]" value="all" style="width:auto">Tudo<br>
	<input type="radio" name="report[time]" value="date" style="width:auto">De : 
	<input type="text" style="width:auto" name="report[dateInit]" value="" class="date"> até <input type="text" value="" name="report[dateEnd]" style="width:auto" class="date">
	<input type="submit" value="Aplicar" />
</form>






<?php echo $this -> Html -> script ('relatorios') ?>