<h3>Anexos</h3>

<label>Nome:</label> <input id="txt-nome-anexo" type="field"/>
<br>
<input id="bt-anexar-ativ" type="file">
<input id="bt-salvar-anexo" type="button" value="Salvar">
<input id="bt-cancelar-anexo" type="button" value="Cancelar">

<table id="tabela-anexos">
	<tr class="altrow">
		<th class="nome">Nome </th>
		<th class="criacao">Data de Criação</th>
		<th class="acoes">Ações</th>	
	</tr>
<?php foreach( $attachments as $attachment) { 
		
		echo '<tr> ' .
				'<td>' .
				$attachment['Attachment']['file_name'].
				'</td>'.
				'<td>'.
				$attachment['Attachment']['creation_date'].
				'</td>'.
				'<td>'.
				
					$this->Html->image("delete.png", array('alt' => 'Remover','onclick'=>'removeAttach('.$attachment['Attachment']['id'].')')).
					$this->Html->image("view.png", array('alt' => 'Abrir Arquivo','onclick'=>'openFile('.$attachment['Attachment']['id'].')'))
					.
				'</td>'.
			'</tr>';			
	}   ?>

</table>


