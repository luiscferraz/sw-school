<a href="../../Companies/index/" class="botao" alt="Cancelar"> Cancelar</a> 
<h2>Cadastrar Empresa</h2>

<div class="companiesForm">
	<?php echo $this->Form->create('Company', array('action' => 'add')); ?>
	
	
	<div class="left">
		<fieldset id="dadosEmpresa">
			<legend class="legenda">Dados da Empresa</legend>
			<?php
				echo $this->Form->input('cnpj', array('label' => 'CNPJ <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id' => 'cnpj',  'onblur' => 'checkCnpj(this)'));				
				echo $this->Form->input('name', array('label' => 'Nome da empresa <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'required'=>'required'));
				echo $this->Form->input('acronym', array('label' => 'Sigla <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'required'=>'required' ));
				echo $this->Form->input('fundation', array('label' => 'Data de Fundação :', 'id'=> 'fundation', 'onblur' => 'checkDate(this)'));			
				echo $this->Form->input('phone1', array('label' => 'Telefone <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required', 'id' => 'phone1'));
				echo $this->Form->input('phone2', array('label' => 'Telefone 2 (opcional):', 'id' => 'phone2'));
			?>
		</fieldset>
		
		<fieldset id="dadosEndereco">
			<legend class="legenda">Endereço</legend>
			<?php
				echo $this->Form->input('Address.zip_code', array('label' => 'CEP: ' , 'id' => 'zip_code',  'onBlur' => 'getEndereco()'));                
				echo $this->Form->input('Address.address', array('label' => 'Endereço:', 'id' => 'address'));
				echo $this->Form->input('Address.number', array('label' => 'Número: '));
				echo $this->Form->input('Address.complement', array('label' => 'Complemento:'));
				echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro:', 'id' => 'neighborhood'));
				echo $this->Form->input('Address.city', array('label' => 'Cidade:', 'id' => 'city'));
				echo $this->Form->input('Address.state',array('options' => array("AC"=>"AC","AL"=>"AL","AP"=>"AP","AM"=>"AM","BA"=>"BA","CE"=>"CE","DF"=>"DF","ES"=>"ES","GO"=>"GO","MA"=>"MA","MG"=>"MG","MT"=>"MT","MS"=>"MS","PA"=>"PA","PB"=>"PB","PE"=>"PE","PI"=>"PI","PR"=>"PR","RJ"=>"RJ","RN"=>"RN","RO"=>"RO","RR"=>"RR","RS"=>"RS","SC"=>"SC","SE"=>"SE","SP"=>"SP","TO"=>"TO"),'type' => 'select', 'empty' => 'Selecione','label' => 'Estado: ','style'=>'width: 260px', 'id' => 'state'));?>
		</fieldset>

	</div>

	<div class="right">
		<fieldset id="dadosSponsor">
			<legend class="legenda">Dados do Sponsor</legend>
			<?php
				echo $this->Form->input('Sponsor.name', array('label' => 'Nome <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required'));
				echo $this->Form->input('Sponsor.phone1', array('label' => 'Telefone :', 'id' => 'phone_sponsor'));
				echo $this->Form->input('Sponsor.phone2', array('label' => 'Celular: ' , 'id'=>'phone_sepg'));
				echo $this->Form->input('Sponsor.email', array('type' => 'email','label' => 'Email <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required'));
			?>
		</fieldset>

		<fieldset id="dadosFinanceiros">
			<legend class="legenda">Dados Financeiros</legend>
			<?php
				echo $this->Form->input('Financial.name', array('label' => 'Nome: ' ));
				echo $this->Form->input('Financial.phone1', array('label' => 'Telefone: ', 'id' => 'phone1'));
				echo $this->Form->input('Financial.phone2', array('label' => 'Celular: ', 'id'=>'phone2'));
				echo $this->Form->input('Financial.email', array('type' => 'email','label' => 'Email: '));
			?>
		</fieldset>

		<fieldset id="dadosSepg">
			<legend class="legenda">Dados SEPG</legend>
			<?php
				echo $this->Form->input('Sepg.name', array('label' => 'Nome: '));
				echo $this->Form->input('Sepg.phone1', array('label' => 'Telefone: ', 'id' => 'phone1'));
				echo $this->Form->input('Sepg.phone2', array('label' => 'Celular: ', 'id'=>'phone2'));
				echo $this->Form->input('Sepg.email', array('type' => 'email','label' => 'Email: '));
			?>
		</fieldset>

		<fieldset id="dadosDono">
			<legend class="legenda">Dono da Empresa</legend>
			<?php
				echo $this->Form->input('Owner.name', array('label' => 'Nome <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required'));
				echo $this->Form->input('Owner.date', array('label' => 'Data de Nascimento: ', 'id' => 'Owner_date'));
				echo $this->Form->input('Owner.email', array('type' => 'email','label' => 'Email <sup title="Campo obrigatório" class="obrigatorio">*</sup>:','required'=>'required'));
				echo $this->Form->input('Owner.phone', array('label' => 'Telefone: ', 'id'=>'Owner_phone'));				
			?>
		</fieldset>

		 <fieldset id="dados_bancarios_add_empresa">
					<legend class="legenda">Dados Bancários</legend>
						
						<?php 
						echo $this->Form->input('BankInfoCompany.name_bank', array('label' => 'Nome do Banco: ', 'id'=>'BankInfoCompany.name_bank')); 
				
						echo $this->Form->input('BankInfoCompany.number_agency', array('label' => 'Número da Agência: ', 'id'=>'BankInfoCompany.number_agency'));

						echo $this->Form->input('BankInfoCompany.number_account', array('label' => 'Número da Conta: ', 'id'=>'BankInfoCompany.number_account', 'onblur'=>'checkConta(this, document.getElementById("BankInfoCompany.number_agency"), -1)'));
						
						?>
											
		</fieldset>

		<fieldset id="contato">
			<legend class="legenda">Contatos</legend>
			<?php
				echo $this->Form->input('Contact1.name', array('label' => 'Nome:'));
				echo $this->Form->input('Contact1.function', array('label' => 'Função:'));
				echo $this->Form->input('Contact1.email', array('type' => 'email','label' => 'Email:'));
				echo $this->Form->input('Contact1.telephone', array('label' => 'Telefone: ', 'id'=>'Contact_phone'));				
			?>
			<hr>
			<?php
				echo $this->Form->input('Contact2.name', array('label' => 'Nome:'));
				echo $this->Form->input('Contact2.function', array('label' => 'Função:'));
				echo $this->Form->input('Contact2.email', array('type' => 'email','label' => 'Email:'));
				echo $this->Form->input('Contact2.telephone', array('label' => 'Telefone: ', 'id'=>'Contact_phone'));				
			?>
		</fieldset>

		<fieldset id="contato2">
			<legend class="legenda">Contatos</legend>
			<?php
				echo $this->Form->input('Contact3.name', array('label' => 'Nome:'));
				echo $this->Form->input('Contact3.function', array('label' => 'Função:'));
				echo $this->Form->input('Contact3.email', array('type' => 'email','label' => 'Email:'));
				echo $this->Form->input('Contact3.telephone', array('label' => 'Telefone: ', 'id'=>'Contact_phone'));				
			?>
			<hr>
			<?php
				echo $this->Form->input('Contact4.name', array('label' => 'Nome:'));
				echo $this->Form->input('Contact4.function', array('label' => 'Função:'));
				echo $this->Form->input('Contact4.email', array('type' => 'email','label' => 'Email:'));
				echo $this->Form->input('Contact4.telephone', array('label' => 'Telefone: ', 'id'=>'Contact_phone'));				
			?>
		</fieldset>
	
		<?php 
		echo $this->Form->end('Confirmar cadastro');
		?>
		
	</div>
</div>
