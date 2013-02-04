<h3>Anexos</h3>
<input type="file" />
<br>
<input type="field"/>
<table id="tabela-anexos">
	<tr class="altrow">
		<th class="nome">Nome </th>
		<th class="nome">Data de Criação</th>
		<th class="nome">Remover</th>	
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
				
					$this->Html->image("delete.png", array('alt' => 'Remover','onclick'=>'removeAttach('.$attachment['Attachment']['id'].',"'.$attachment['Attachment']['file'].'")'))
					.
				'</td>'.
			'</tr>';			
	}   ?>

</table>


