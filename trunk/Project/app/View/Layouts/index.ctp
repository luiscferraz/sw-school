<!DOCTYPE html>

<html>
    
    <head>
		<title><?php echo $title_for_layout; ?></title>
		
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<?php echo $this->Html->css('style-sws'); ?>
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
		<?php echo $this->Html->script('aplicacao'); ?>
    </head>

    <body>
    	<?php echo $this->Session->flash(); ?>

        <div id="bt-cadastrar">
            <?php echo $this->Html->link("Cadastrar", array('action' => 'add'),array('class'=>'botao')); ?>
        </div>

		<?php include 'includes/menu.php'; ?>
		
		<div class="conteudo">
			<h1><?php echo $title_for_layout; ?></h1>	        
			<?php echo $this->fetch('content'); ?>
	    </div>
	   	</div>

    </body>



</html>
