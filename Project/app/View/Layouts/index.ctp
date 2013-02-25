<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    
    <head>
		<title><?php echo $title_for_layout; ?></title>
        <meta http-equiv="Content-Type" content="text/html" "charset"="UTF-8" />
		<?php echo $this->Html->css('style-sws'); ?>
		<?php echo $this->Html->css('colorpicker'); ?>
		<?php echo $this->Html->css('jquery.fancybox'); ?>
		<?php echo $this->Html->css('jquery-ui.css'); ?>	
		<?php echo $this->Html->css('jquery.treeview'); ?>
		<?php echo $this->Html->css('menu_index2_projects'); ?>
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
		<?php echo $this->Html->script('jquery.maskedinput-1.1.4.pack'); ?>
		<?php echo $this->Html->script('jquery-ui'); ?>	
		<?php echo $this->Html->script('jquery.cookie'); ?>	
		<?php echo $this->Html->script('jquery.treeview'); ?>	
		<?php echo $this->Html->script('demo_index2_projects'); ?>	
		<?php echo $this->Html->script('validacoes'); ?>
		<?php echo $this->Html->script('buscacep'); ?>
		<?php echo $this->Html->script('colorpicker'); ?>
		<?php echo $this->Html->script('jquery.fancybox'); ?>
		<?php echo $this->Html->script('projetos'); ?>
		<?php echo $this->Html->script('anexo'); ?>
		<?php echo $this->Html->script('aplicacao'); ?>
				
    </head>

    <body>
    	<?php echo $this->Session->flash(); ?>
        
	<?php //só mostrar o botão cadastrar se for usuário admin
		if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
			echo '<div id="bt-cadastrar">';	
			echo $this->Html->link("Cadastrar", array('action' => 'add'),array('class'=>'botao'));
			echo '</div>';
		}
	?>		
				
		<?php include 'includes/menu.php'; ?>
		
		<div class="conteudo">
			<h1><?php echo $title_for_layout; ?></h1>	        
			<?php echo $this->fetch('content'); ?>
	    </div>
	   	</div>

    </body>



</html>
