
<h1>Editar Consultor</h1>

 <?php echo $this->Form->create('Consultant', array('action' => 'edit')); ?>
 <script language="JavaScript" type="text/javascript">
function HandleBrowseClick()
{
    var fileinput = document.getElementById("foto");
    fileinput.click();
}
function Handlechange()
{
var fileinput = document.getElementById("foto");
var textinput = document.getElementById("filename");
textinput.value = fileinput.value;
}
</script>
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
					<?php echo $this->Form->input('Consultant.email', array('type' => 'email','label' => 'E-mail: ', 'id'=>'email')); ?>					
			</fieldset>
			</div>
			<div class="right">
			<fieldset id="enderecoAddConsultor">
				<legend class="legenda">Endereço</legend>
					<?php echo $this->Form->input('Address.id', array('type' => 'hidden')); ?>
					<?php echo $this->Form->input('Address.zip_code', array('label' => 'CEP: ', 'id'=>'zip_code')); ?>
					<?php echo $this->Form->input('Address.address', array('label' => 'Endereço: ', 'id'=>'address')); ?>
					<?php echo $this->Form->input('Address.number', array('label' => 'Número: ')); ?>
					<?php echo $this->Form->input('Address.complement', array('label' => 'Complemento: ')); ?>
					<?php echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro: ','id'=>'neighborhood')); ?>
					<?php echo $this->Form->input('Address.city', array('label' => 'Cidade: ', 'id'=>'city')); ?>
					<?php echo $this->Form->input('Address.state', array('options' => array("AC"=>"AC","AL"=>"AL","AP"=>"AP","AM"=>"AM","BA"=>"BA","CE"=>"CE","DF"=>"DF","ES"=>"ES","GO"=>"GO","MA"=>"MA","MG"=>"MG","MT"=>"MT","MS"=>"MS","PA"=>"PA","PB"=>"PB","PE"=>"PE","PI"=>"PI","PR"=>"PR","RJ"=>"RJ","RN"=>"RN","RO"=>"RO","RR"=>"RR","RS"=>"RS","SC"=>"SC","SE"=>"SE","SP"=>"SP","TO"=>"TO"),'type' => 'select', 'empty' => 'Selecione','label' => 'Estado: ', 'id'=>'state')); ?>
					
			</fieldset>

<fieldset id='usuario'>
        			<legend>Usuário</legend>
					<?php echo $this->Form->input('User.id', array('type' => 'hidden')); ?>
        			<?php echo $this->Form->input('User.username',array('label' => 'Usuário: ', 'id' => 'campo_usuario','required'=>'required')); ?>
        			<p></p>
        			<?php echo $this->Form->input('User.password', array('label' => 'Senha: ', 'id' => 'senha','required'=>'required')); ?>
        			<p></p>
        			<?php echo $this->Form->input('User.type', array('label' => 'Usuário: ','required'=>'required', 'empty' => 'Selecione', 'id' => 'tipousuario',
            		'options' => array('cons' => 'Consultor', 'cons_manager' => 'Gerente de consultoria', 'fin_manager' => 'Gerente financeiro',  'rel_manager' => 'Gerente de relacionamento', 'admin' => 'Admin'))); ?>
 
 	 
	<?php echo $this->Html->image('consultant.jpg')?>
		
		<input type="file" id="foto" name="fileupload" style="display: none" onChange="Handlechange();" action="Foto"/>
    	<input type="button" value="Foto" id="fakeBrowse" onclick="HandleBrowseClick();"/>

    </fieldset>

    <fieldset id="dados_bancarios_edit_consultor">
					<legend class="legenda">Dados Bancários</legend>

						<?php echo $this->Form->input('BankInfoConsultant.id', array('type' => 'hidden')); ?>
						
						<?php echo $this->Form->input('BankInfoConsultant.name_bank', array('label' => 'Nome do Banco: ','required'=>'required', 'id'=>'BankInfoConsultant.name_bank')); ?>
				
						<?php echo $this->Form->input('BankInfoConsultant.number_agency', array('label' => 'Número da Agência: ','required'=>'required', 'id'=>'BankInfoConsultant.number_agency')); ?>

						<?php echo $this->Form->input('BankInfoConsultant.number_account', array('label' => 'Número da Conta: ','required'=>'required', 'id'=>'BankInfoConsultant.number_account')); ?>
											
				</fieldset>

			</div>
			<?php echo $this->Form->end('Salvar Edição'); ?>
		</form>
	