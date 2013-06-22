<div id="Menu_Home">
	<a href="#" id="botao_home"><?php echo $this->Html->image('logo.png', array('alt' => 'sw', 'id'=>'logoSw'))?>
		<?php echo $this->Html->image('botao_home.png', array('alt' => '', 'id'=>'botao_home_img'))?></a>
		<ul>
			<li><?php echo $this->Html->link('Agenda', array('action' =>'../home'));?></li>
			<li><?php echo $this->Html->link('Consultores', array('action' =>'../consultants'));?></li>
			<li><?php echo $this->Html->link('Empresas', array('action' =>'../companies'));?></li>
			<li><?php echo $this->Html->link('Projetos', array('action' =>'../projects'));?></li>
			<li><?php echo $this->Html->link('Apontamentos', array('action' =>'../entries'));?></li>
			<!-- <li><?php echo $this->Html->link('Relatórios', array('action' =>'../reports'));?></li> -->
			<li><?php echo $this->Html->link('Sair', array('action' =>'../users/logout'));?></li>
		</ul>
</div>
