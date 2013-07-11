
<h1>Centro de Custos</h1>
<h2 id="tituloprojeto">Projeto - <?php echo $nome_projeto; ?> </h2>

<!--<h1 id="tituloprojeto">Projeto - <?php //echo $nome_projeto; ?> </h1>-->


    
<fieldset id="dadosDespesas">
    <?php echo $this->Form->create('Project', array('action' => 'addfinancial')); ?>
                <?php echo $this->Form->input('Expense.consultant_name', array('type'=>'hidden', 'value' => $nome_consultor_logado)); ?>
                <?php echo $this->Form->input('Expense.description', array('type' => 'textarea', 'label' => 'Descrição: <br>','required'=>'required', 'id' => 'descricaoDespesa')); ?>
                <?php echo $this->Form->input('Expense.value', array('label' => 'Valor :  <br>','required'=>'required', 'id' => 'selectValor')); ?>
                
                <!--CONDIÇÃO-->
                <?php
                if (in_array($tipo_usuario , array('fin_manager', 'admin'))){
                  	echo $this->Form->input('Expense.type', array('label' => 'Tipo : <br>','options' => array('e' => 'Entrada', 's' => 'Saida' ), 'required'=>'required', 'id' => 'selectTipoDespesa'));
                }else{
                	echo $this->Form->input('Expense.type', array('label' => 'Tipo : <br>','options' => array('s' => 'Saida' ), 'required'=>'required', 'id' => 'selectTipoDespesa'));
                }?>
                <?php echo $this->Form->input('Expense.typeExpense', array('label' => 'Tipo de Despesa : <br>','options' => array('l' => 'Logística', 'a' => 'Alimentação', 'd' => 'Diversos' ), 'required'=>'required', 'id' => 'selectTipoDespesa')); ?>
                <?php echo $this->Form->input('Expense.project_id', array('type'=> 'hidden', 'value'=> $id)); ?>
    <?php echo $this->Form->end('Salvar') 


    ?>
</fieldset>


<fieldset class="despesasProjeto">

    <label for="totalEntrada">Total Entrada:</label><br>
    <input  name="totalEntrada" type="select" id="total-entrada" disabled><br>
                
</fieldset>

<fieldset class="despesasProjeto">

    <label for="totalSaida">Total Despesas:</label><br>
    <input  name="totalSaida" type="select" id="total-saida" disabled><br>

</fieldset>

<fieldset class="despesasProjeto">

    <label for="saldo">Saldo:</label><br>
    <input name="saldo" type="text" id="total-financas" disabled><br>

</fieldset>


<fieldset class="despesasProjeto">
	
    <label for="anexo">Anexar Nota Fiscal:</label><br>
    <input type="file" name="anexar" value="Anexar">
    
</fieldset>



<table cellpadding="0" cellspacing="0" id="tabelaDespesas">
        <tr>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Autor</th>
            <th>Ações</th>
        </tr>


<?php 

    foreach ($financials as $financial) {

            if ($financial['Expense']['type'] == 'e') {
                echo '<tr class="tr-entrada">';
                    echo '<td align="center">'.$financial['Expense']['description'].'</td>';
                    echo '<td align="center" class="entrada">'.$financial['Expense']['value'].'</td>';
                    echo '<td align="center"> Entrada </td>';
                    echo '<td align="center">' .$financial['Expense']['consultant_name']. '</td>';
                    echo '<div>';
                    echo '<td align="center" class="actions">';
                    echo $this->Html->link(
                    $this->Html->image("delete.png", array('alt' => 'Ver')),
                    array('action' => 'deletefinancial', $financial['Expense']['id']),
                    array('escape'=>false, 'class'=>'link'));
                    echo '</td>';
                    echo '</div>';
            }
            else {
                 echo '<tr class="tr-saida">';
                    echo '<td align="center">'.$financial['Expense']['description'].'</td>';
                    echo '<td align="center" class="saida">'.$financial['Expense']['value'].'</td>';
                    echo '<td align="center"> Saida </td>';
                    echo '<td align="center">' .$financial['Expense']['consultant_name']. '</td>';
                    echo '<div>';
                    echo '<td align="center" class="actions">';
                    echo $this->Html->link(
                    $this->Html->image("delete.png", array('alt' => 'Ver')),
                    array('action' => 'deletefinancial', $financial['Expense']['id']),
                    array('escape'=>false, 'class'=>'link'));
                    echo '</td>';
                    echo '</div>';
                
            }


        echo '</tr>';
    }
?>

</table>


</br>
</br>

