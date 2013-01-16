<h1> Consultor - <?php echo $company['Company']['name']; ?>
		<?php echo $this->Html->link(
$this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$company['Company']['id'],
array('escape'=>false)) ?> 
<?php echo $this->Html->link(
$this->Html->image("delete.png", array("alt" => "Deletar")),
array('action' => 'delete', $company['Company']['id']),
array('escape'=>false),"Você quer excluir realmente ?");?>
</h1>

<div class="company view">
	
	<div class='dadosEmpresa'>
		<p><?php 
				echo 'Sigla: ';
				echo $company['Company']['acronym'];
			?></p>
		<p><?php 
				echo 'CNPJ: ';
				echo $company['Company']['cnpj'];
			?></p>
		<p><?php 
				echo 'Telefone 1: ';
				echo $company['Company']['phone1'];
			?></p>
		<p><?php 
				echo 'Telefone 2: ';
				echo $company['Company']['phone2'];
			?></p>
	</div>

	<div class='dadosEndereco'>
		<p><?php 
			echo 'Endereço: ';
			echo $company['Address']['address']; 
		?></p>
		<p><?php 
			echo 'Número: ';
			echo $company['Address']['number'];
		?>
			<?php 
			echo '/ Bairro: ';
			echo $company['Address']['neighborhood'];
		?></p>
		<p><?php 
			echo 'Complemento: ';
			echo $company['Address']['complement'];
		?>
			<?php 
			echo '/ CEP: ';
			echo $company['Address']['zip_code'];
		?></p>
		<p><?php 
			echo 'Cidade: ';
			echo $company['Address']['city'];
		?>
			<?php 
			echo '/ Estado: ';
			echo $company['Address']['state'];
		?></p>
	</div>

	<div id='integranteDefault'>
		<?php echo $this->Html->image('consultant-default.jpg')?>
	</div>

	<div class='dadosSponsor'>
		<h2 class="tituloCompanyView">Sponsor</h2>

		<p><?php 
			echo 'Nome: ';
			echo $company['Sponsor']['name']; 
		?></p>
		<p><?php 
			echo 'Telefone: ';
			echo $company['Sponsor']['phone'];
		?></p>
		
		<p><?php 
			echo 'Email: ';
			echo $company['Sponsor']['email'];
		?></p>
	</div>

	<div id='integranteDefault2'>
		<?php echo $this->Html->image('consultant-default.jpg')?>
	</div>

	<div class='dadosFinancial'>
		<h2 class="tituloCompanyView">Financeiro</h2>

		<p><?php 
			echo 'Nome: ';
			echo $company['Financial']['name']; 
		?></p>
		<p><?php 
			echo 'Telefone: ';
			echo $company['Financial']['phone'];
		?></p>
		
		<p><?php 
			echo 'Email: ';
			echo $company['Financial']['email'];
		?></p>
	</div>

	<div id='integranteDefault3'>
		<?php echo $this->Html->image('consultant-default.jpg')?>
	</div>

	<div class='dadosSepg'>
		<h2 class="tituloCompanyView">SEPG</h2>
		
		<p><?php 
			echo 'Nome: ';
			echo $company['Sepg']['name']; 
		?></p>
		<p><?php 
			echo 'Telefone: ';
			echo $company['Sepg']['phone'];
		?></p>
		
		<p><?php 
			echo 'Email: ';
			echo $company['Sepg']['email'];
		?></p>
	</div>

</div>