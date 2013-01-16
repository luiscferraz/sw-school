<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<?php echo $this->Html->css('reset'); ?>
		<?php echo $this->Html->css('style-sws'); ?>
		<?php echo $this->Html->css('smoothness/jquery-ui-1.8rc3.custom'); ?>
		<?php echo $this->Html->css('jquery.weekcalendar'); ?>
		<?php echo $this->Html->css('demo'); ?>
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
	    <?php echo $this->Html->script('jquery-ui-1.8rc3.custom.min'); ?>
	    <?php echo $this->Html->script('jquery.weekcalendar'); ?>
	    <?php echo $this->Html->script('demo'); ?>
	    <?php echo $this->Html->script('aplicacao'); ?>
	</head>
<body> 
	<?php echo $this->Session->flash(); ?>
	<?php include 'includes/menu.php' ?>
	<h1>Sws - Agenda</h1>
	
	<div id='calendar'></div>
	<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Data: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Hora de Inicio: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">Hora de Termino: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
				<li>
					<label for="title">Titulo: </label><input type="text" name="title" />
				</li>
				<li>
					<label for="body">Descrição: </label><textarea name="body"></textarea>
				</li>
			</ul>
		</form>
	</div>
	
</body>
</html>
