
<h1>Despesas</h1>

    
<fieldset id="dadosDespesas">
    <?php echo $this->Form->create('Project', array('action' => 'addfinancial')); ?>             
                <?php echo $this->Form->input('Expense.description', array('type' => 'textarea', 'label' => 'Descrição: <br>','required'=>'required', 'id' => 'descricaoDespesa')); ?>
                <?php echo $this->Form->input('Expense.value', array('label' => 'Valor :  <br>','required'=>'required', 'id' => 'selectValor')); ?>
                <?php echo $this->Form->input('Expense.type', array('label' => 'Tipo : <br>','options' => array('e' => 'Entrada', 's' => 'Saida' ), 'required'=>'required', 'id' => 'selectTipoDespesa')); ?>
                <?php echo $this->Form->input('Expense.project_id', array('type'=> 'hidden', 'value'=> $id)); ?>
    <?php echo $this->Form->end('Salvar') 


    ?>
</fieldset>


<fieldset class="despesasProjeto">

    <label for="totalEntrada">Total Entrada:</label><br>
    <input  name="totalEntrada" type="select" id="total-entrada" disabled><br>
                
</fieldset>

<fieldset class="despesasProjeto">

    <label for="totalSaida">Total Saída:</label><br>
    <input  name="totalSaida" type="select" id="total-saida" disabled><br>

</fieldset>

<fieldset class="despesasProjeto">

    <label for="saldo">Saldo:</label><br>
    <input name="saldo" type="text" id="total-financas" disabled><br>

</fieldset>



<table cellpadding="0" cellspacing="0" id="tabelaDespesas">
        <tr>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Excluir</th>
        </tr>


<?php 

    foreach ($financials as $financial) {

            if ($financial['Expense']['type'] == 'e') {
                echo '<tr class="tr-entrada">';
                    echo '<td>'.$financial['Expense']['description'].'</td>';
                    echo '<td class="entrada">'.$financial['Expense']['value'].'</td>';
                    echo '<td> Entrada </td>';
                    echo '<div>';
                    echo '<td class="actions">';
                    echo $this->Html->link(
                    $this->Html->image("delete.png", array('alt' => 'Ver')),
                    array('action' => 'deletefinancial', $financial['Expense']['id']),
                    array('escape'=>false, 'class'=>'link'));
                    echo '</td>';
                    echo '</div>';
            }
            else {
                 echo '<tr class="tr-saida">';
                    echo '<td>'.$financial['Expense']['description'].'</td>';
                    echo '<td class="saida">'.$financial['Expense']['value'].'</td>';
                    echo '<td> Saida </td>';
                    echo '<div>';
                    echo '<td class="actions">';
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

