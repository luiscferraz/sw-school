<h1> Empresa - <?php echo $company['Company']['name']; ?>

<?php 
	if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
	
	echo '<span class="icon-action">';
	echo $this->Html->link($this->Html->image("delete.png", array("alt" => "Deletar")),array('action' => 'delete', $company['Company']['id']),array('escape'=>false),"Você quer excluir realmente ?");
	echo '</span>';
	echo '<span class="icon-action">'; 
	echo $this->Html->link($this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$company['Company']['id'],array('escape'=>false));
	echo '</span>';
	}
	?>
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
				echo 'Data de Fundação: ';
				echo $company['Company']['fundation'];
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
			echo $company['Sponsor']['phone1'];
		?></p>
		<p><?php 
			echo 'Celular: ';
			echo $company['Sponsor']['phone2'];
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
			echo $company['Financial']['phone1'];
		?></p>
		<p><?php 
			echo 'Celular: ';
			echo $company['Financial']['phone2'];
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
			echo $company['Sepg']['phone1'];
		?></p>
		<p><?php 
			echo 'Celular: ';
			echo $company['Sepg']['phone2'];
		?></p>
		<p><?php 
			echo 'Email: ';
			echo $company['Sepg']['email'];
		?></p>
	</div>

	
	<div class='dadosDono'>
		<h2 class="tituloCompanyView">Dono da Empresa</h2>
		
		<p><?php 
			echo 'Nome: ';
			echo $company['Owner']['name']; 
		?></p>
		<p><?php 
			echo 'Data de Nacimento: ';
			echo $company['Owner']['date'];
		?></p>
		<p><?php 
			echo 'Email: ';
			echo $company['Owner']['email'];
		?></p>
		<p><?php 
			echo 'Telefone: ';
			echo $company['Owner']['phone'];
		?></p>
		
		
	</div>

	<div class='dadosBancariosempresa'>
		<h2 class="tituloCompanyView">Dados Bancários</h2>
		
		<p><?php 
			echo 'Nome do Banco: ';
			echo $company['BankInfoCompany']['name_bank']; 
		?></p>
		<p><?php 
			echo 'Número da Agência: ';
			echo $company['BankInfoCompany']['number_agency'];
		?></p>
		<p><?php 
			echo 'Número da Conta: ';
			echo $company['BankInfoCompany']['number_account'];
		?></p>
		
		
		
	</div>

	<!--
	<div class='contatos'>
		<h2 class="tituloCompanyView">Contato</h2>
		
		<p><?php 
			//echo 'Nome: ';
			//echo $company['Contact']['name']; 
		?></p>
		<p><?php 
			//echo 'Função: ';
			//echo $company['Contact']['function'];
		?></p>
		<p><?php 
			//echo 'Email: ';
			//echo $company['Contact']['email'];
		?></p>
		<p><?php 
			//echo 'Telefone: ';
			//echo $company['Contact']['telephone'];
		?></p>
		
		
		
	</div>
	-->
	

</div>