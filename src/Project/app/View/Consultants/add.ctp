
<h1>Cadastrar Consultor</h1>
<?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
		echo $this->Form->create('Consultant', array('action' => 'add','type'=>'file')); ?>
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
			<div class="left">
				<fieldset id="dados_pessoais">
					<legend class="legenda">Dados Pessoais</legend>
						
						<?php echo $this->Form->input('Consultant.name', array('label' => 'Nome <sup title="Campo obrigatório" class="obrigatorio">*</sup>: ','required'=>'required', 'id'=>'name')); ?>
						<?php echo $this->Form->input('Consultant.cpf', array('label' => 'CPF <sup title="Campo obrigatório" class="obrigatorio">*</sup>:  ', 'required'=>'required', 'id'=>'cpf','div'=>'div_cpf','onblur'=>'checkCPF(this)')); ?>
						<?php echo $this->Form->input('Consultant.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronym','onblur'=>'checkAcronym(this)')); ?>
						<?php echo $this->Form->input('Consultant.acronym_color', array('type'=> 'text','label' => 'Cor <sup title="Campo obrigatório" class="obrigatorio">*</sup>: ','required'=>'required', 'value'=>'#000000','id'=>'acronym_color','onblur'=>'checkColor(this)')); ?>
						<?php echo $this->Form->input('Consultant.phone1', array('label' => 'Telefone: ', 'id'=>'phone1')); ?>
						<?php echo $this->Form->input('Consultant.phone2', array('label' => 'Celular <sup title="Campo obrigatório" class="obrigatorio">*</sup>:', 'required'=>'required', 'id'=>'phone2')); ?>
						<?php echo $this->Form->input('Consultant.email', array('type' => 'email','label' => 'E-mail <sup title="Campo obrigatório" class="obrigatorio">*</sup>: ', 'required'=>'required', 'id'=>'email')); ?>					
				</fieldset>


			</div>
			<div class="right">
				<fieldset id="enderecoAddConsultor">
					<legend class="legenda">Endereço</legend>


						<?php echo $this->Form->input('Address.zip_code', array('label' => 'CEP: ' , 'id'=>'zip_code')); ?>
						<?php echo $this->Form->input('Address.address', array('label' => 'Endereço: ', 'id'=>'address')); ?>
						<?php echo $this->Form->input('Address.number', array('label' => 'Número: ' )); ?>
						<?php echo $this->Form->input('Address.complement', array('label' => 'Complemento: ')); ?>
						<?php echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro: ','id'=>'neighborhood')); ?>
						<?php echo $this->Form->input('Address.city', array('label' => 'Cidade: ', 'id'=>'city')); ?>
						<?php echo $this->Form->input('Address.state', array('options' => array("AC"=>"AC","AL"=>"AL","AP"=>"AP","AM"=>"AM","BA"=>"BA","CE"=>"CE","DF"=>"DF","ES"=>"ES","GO"=>"GO","MA"=>"MA","MG"=>"MG","MT"=>"MT","MS"=>"MS","PA"=>"PA","PB"=>"PB","PE"=>"PE","PI"=>"PI","PR"=>"PR","RJ"=>"RJ","RN"=>"RN","RO"=>"RO","RR"=>"RR","RS"=>"RS","SC"=>"SC","SE"=>"SE","SP"=>"SP","TO"=>"TO"),'type' => 'select', 'empty' => 'Selecione','label' => 'Estado: ', 'id'=>'state')); ?>
						</fieldset>
						
    			<fieldset id='usuario'>
        			<legend>Usuário</legend>
        			<?php echo $this->Form->input('User.username',array('label' => 'Nome de usuário <sup title="Campo obrigatório" class="obrigatorio">*</sup>: <br>', 'required'=>'required','id' => 'campo_usuario')); ?>
        			<?php echo $this->Form->input('User.password', array('label' => 'Senha <sup title="Campo obrigatório" class="obrigatorio">*</sup>: <br>','required'=>'required', 'id' => 'senha')); ?>
        			<?php echo $this->Form->input('User.type', array('label' => 'Tipo de usuário <sup title="Campo obrigatório" class="obrigatorio">*</sup>: <br>', 'empty' => 'Selecione','required'=>'required', 'id' => 'tipousuario',
            		'options' => array('cons' => 'Consultor', 'cons_manager' => 'Gerente de consultoria', 'fin_manager' => 'Gerente financeiro',  'rel_manager' => 'Gerente de relacionamento', 'admin' => 'Admin'))); ?>
       
     

     	<?php echo $this->Form->input('foto',array('type'=>'file'));?>
    
        
 
    </fieldset>

     <fieldset id="dados_bancarios_add_consultor">
					<legend class="legenda">Dados Bancários</legend>
						
						<?php echo $this->Form->input('BankInfoConsultant.name_bank', array('label' => 'Nome do Banco: ' , 'id'=>'BankInfoConsultant.name_bank')); ?>
				
						<?php echo $this->Form->input('BankInfoConsultant.number_agency', array('label' => 'Número da Agência: ' , 'id'=>'BankInfoConsultant.number_agency')); ?>

						<?php echo $this->Form->input('BankInfoConsultant.number_account', array('label' => 'Número da Conta: ',  'id'=>'BankInfoConsultant.number_account')); ?>
											
				</fieldset>

   

	
			</div>
			<?php echo $this->Form->end('Confirmar Cadastro'); ?>
	
			<?php /*
			
			
			========== Dados Futuros para o sistema
			
			
			<fieldset id="Dados_sistema">
				<legend>Dados do Sistema</legend>
				<form>
					<label for="usuario">Usuario:</label><br>
					<input name="usuario" type="text" placeholder="4-20 caracteres" maxlength='20' required><br>
					
					<label for="senha">Senha:</label><br>
					<input name="senha" type="password" placeholder="6-20 caracteres" maxlength='20' required><br>
					
					<label for="repetir_senha">Repetir Senha:</label><br>
					<input name="repetir_senha" type="password" placeholder="6-20 caracteres" maxlength='20' required><br>
	
					<label for="sigla">Sigla:</label><br>
					<input name="sigla" type="text" placeholder="2 caracteres" maxlength='2' required><br>
	
					<label for="cor">Cor:</label><br>
					<input name="cor" type="color" required><br>
	
					
					
				</form>
	
			</fieldset>
			<fieldset>
				<legend>Dados Banc�rios</legend>
				<form>
					<label for="nome_banco">Nome do Banco:</label><br>
					<input name="nome_banco" type="text" required><br>
	
					<label for="agencia">Ag�ncia:</label><br>
					<input name="agencia" type="text" required><br>
				</form>
	
			</fieldset>
	
		
	
	
		</form>
		<fieldset>
			<legend>Anexar Arquivos</legend>
			<input name="add_files" type="file" value="Add files..."/>
			<input name="start_upload" type="submit" value="Start Upload"/>
			<input name="cancel_upload" type="submit" value="Cancel Upload"/>
			<input name="delete" type="submit" value="Delete"/>
		</fieldset>*/ ?>