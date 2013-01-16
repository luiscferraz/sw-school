
<h1>Editar Consultor</h1>

 <?php echo $this->Form->create('Consultant', array('action' => 'edit')); ?>
 			<div class="left" >
			<fieldset id="dados_pessoais">
				<legend class="legenda">Dados Pessoais</legend>
					<?php echo $this->Form->input('Consultant.id', array('type' => 'hidden')); ?>
					<?php echo $this->Form->input('Consultant.name', array('label' => 'Nome: ','placeholder'=>'', 'id'=>'name')); ?>
					<?php echo $this->Form->input('Consultant.cpf', array('label' => 'CPF: ','placeholder'=>'', 'id'=>'cpf')); ?>
					<?php echo $this->Form->input('Consultant.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronym')); ?>
					<?php echo $this->Form->input('Consultant.acronym_color', array('type'=> 'text','label' => 'Cor: ', 'id'=>'acronym_color')); ?>
						<?php echo $this->Form->input('Consultant.phone1', array('label' => 'Telefone: ' )); ?>
					<?php echo $this->Form->input('Consultant.phone2', array('label' => 'Celular: ')); ?>
					<?php echo $this->Form->input('Consultant.email', array('label' => 'E-mail: ', 'id'=>'email')); ?>					
			</fieldset>
			</div>
			<div class="right">
			<fieldset id="endereço">
				<legend class="legenda">Endereço</legend>
					<?php echo $this->Form->input('Address.id', array('type' => 'hidden')); ?>
					<?php echo $this->Form->input('Address.address', array('label' => 'Endereço: ','required'=>'required', 'id'=>'address')); ?>
					<?php echo $this->Form->input('Address.number', array('label' => 'Número: ','required'=>'required')); ?>
					<?php echo $this->Form->input('Address.complement', array('label' => 'Complemento: ')); ?>
					<?php echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro: ','required'=>'required','id'=>'neighborhood')); ?>
					<?php echo $this->Form->input('Address.city', array('label' => 'Cidade: ','required'=>'required', 'id'=>'city')); ?>
					<?php echo $this->Form->input('Address.state', array('options' => array("AC"=>"AC","AL"=>"AL","AP"=>"AP","AM"=>"AM","BA"=>"BA","CE"=>"CE","DF"=>"DF","ES"=>"ES","GO"=>"GO","MA"=>"MA","MG"=>"MG","MT"=>"MT","MS"=>"MS","PA"=>"PA","PB"=>"PB","PE"=>"PE","PI"=>"PI","PR"=>"PR","RJ"=>"RJ","RN"=>"RN","RO"=>"RO","RR"=>"RR","RS"=>"RS","SC"=>"SC","SE"=>"SE","SP"=>"SP","TO"=>"TO"),'type' => 'select', 'empty' => 'Selecione','label' => 'Estado: ','required'=>'required', 'id'=>'state')); ?>
					<?php echo $this->Form->input('Address.zip_code', array('label' => 'CEP: ','required'=>'required', 'id'=>'zip_code')); ?>
			</fieldset>
			</div>
			<?php echo $this->Form->end('Salvar Edição'); ?>
		</form>
	