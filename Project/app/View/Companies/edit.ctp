
<h1>Editar Empresa</h1>

<div class="companies form">
    <?php echo $this->Form->create('Company', array('action' => 'edit')); ?>

    <div class="left">
        <fieldset id="dadosEmpresa">
            <legend class="legenda">Dados da Empresa</legend>
            <?php
                echo $this->Form->input('id', array('type' => 'hidden'));
                echo $this->Form->input('name', array('label' => 'Nome da empresa:', 'required'=>'required'));
                echo $this->Form->input('acronym', array('label' => 'Sigla:', 'required'=>'required'));
                echo $this->Form->input('cnpj', array('label' => 'CNPJ:', 'id' => 'cnpj', 'required'=>'required', 'onchange' => 'checkCnpj(this)'));	
                echo $this->Form->input('phone1', array('label' => 'Telefone:', 'id' => 'phone1', 'required'=>'required'));
                echo $this->Form->input('phone2', array('label' => 'Telefone 2 (opcional):', 'id' => 'phone2'));
            ?>
        </fieldset>
        
        <fieldset id="dadosEndereco">
            <legend class="legenda">Endereço</legend>
            <?php
                echo $this->Form->input('Address.id', array('type' => 'hidden'));
				echo $this->Form->input('Address.zip_code', array('label' => 'CEP:', 'id' => 'zip_code'));  
                echo $this->Form->input('Address.address', array('label' => 'Endereço:', 'id' => 'address'));
                echo $this->Form->input('Address.number', array('label' => 'Número:'));
                echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro:', 'id' => 'neighborhood'));
                echo $this->Form->input('Address.city', array('label' => 'Cidade:', 'id' => 'city', 'required'=>'required'));
                echo $this->Form->input('Address.state',array('options' => array("AC"=>"AC","AL"=>"AL","AP"=>"AP","AM"=>"AM","BA"=>"BA","CE"=>"CE","DF"=>"DF","ES"=>"ES","GO"=>"GO","MA"=>"MA","MG"=>"MG","MT"=>"MT","MS"=>"MS","PA"=>"PA","PB"=>"PB","PE"=>"PE","PI"=>"PI","PR"=>"PR","RJ"=>"RJ","RN"=>"RN","RO"=>"RO","RR"=>"RR","RS"=>"RS","SC"=>"SC","SE"=>"SE","SP"=>"SP","TO"=>"TO"),'type' => 'select', 'empty' => 'Selecione','label' => 'Estado: ', 'id' => 'state', 'required'=>'required'));
                echo $this->Form->input('Address.complement', array('label' => 'Complemento:'));                
            ?>
        </fieldset>
    </div>

    <div class="right">
        <fieldset id="dadosSponsor">
            <legend class="legenda">Dados do Sponsor</legend>
            <?php
                echo $this->Form->input('Sponsor.id', array('type' => 'hidden'));
                echo $this->Form->input('Sponsor.name', array('label' => 'Nome:'));
                echo $this->Form->input('Sponsor.phone', array('label' => 'Telefone:', 'id' => 'phone_sponsor'));
                echo $this->Form->input('Sponsor.email', array('label' => 'Email:'));
            ?>
        </fieldset>

        <fieldset id="dadosFinanceiros">
            <legend class="legenda">Dados Financeiros</legend>
            <?php
                echo $this->Form->input('Financial.id', array('type' => 'hidden'));
                echo $this->Form->input('Financial.name', array('label' => 'Nome:'));
                echo $this->Form->input('Financial.phone', array('label' => 'Telefone:', 'id' => 'phone_financial'));
                echo $this->Form->input('Financial.email', array('label' => 'Email:'));
            ?>
        </fieldset>

        <fieldset id="dadosSepg">
            <legend class="legenda">Dados SEPG</legend>
            <?php
                echo $this->Form->input('Sepg.id', array('type' => 'hidden'));
                echo $this->Form->input('Sepg.name', array('label' => 'Nome:'));
                echo $this->Form->input('Sepg.phone', array('label' => 'Telefone:', 'id' => 'phone_sepg'));
                echo $this->Form->input('Sepg.email', array('label' => 'Email:'));
            ?>
        </fieldset>
    
        <?php 
        echo $this->Form->end('Atualizar'); 
        ?>
    </div>
</div>
