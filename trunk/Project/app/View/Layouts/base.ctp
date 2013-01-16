<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
	<title>Swschool</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php //echo $this->Html->css('styleAddConsultant'); ?>
	<?php echo $this->Html->css('style-sws'); ?>
	<?php echo $this->Html->css('colorpicker'); ?>
	<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	<?php echo $this->Html->script('jquery.maskedinput-1.1.4.pack'); ?>
	<?php echo $this->Html->script('validacoes'); ?>
	<?php echo $this->Html->script('buscacep'); ?>
	<?php echo $this->Html->script('colorpicker'); ?>

	<?php echo $this->Html->script('aplicacao'); ?>
</head>
<body>
	<?php echo $this->Session->flash(); ?>
	<?php include 'includes/menu.php' ?>
	
	<div class="conteudo">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>

