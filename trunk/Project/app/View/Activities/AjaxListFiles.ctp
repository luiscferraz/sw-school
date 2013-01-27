<h3>Anexos</h3>
<input type="file" />
<table id="tabela-anexos">
	<tr class="altrow">
		<th class="nome">Nome </th>
		<th class="nome">Arquivo</th>
		<th class="nome">Adicionar</th>	
	</tr>
<?php foreach( $attachments as $attachment) { 
		
		echo '<tr> ' .
				'<td>' .
				$attachment['Attachment']['name'].
				'</td>'.
				'<td>'.
				$attachment['Attachment']['file'].
				'</td>'.
				'<td>'.
				
					$this->Html->image("delete.png", array('alt' => 'Remover','onclick'=>'removeAttach('.$attachment['Attachment']['id'].',"'.$attachment['Attachment']['file'].'")'))
					.
				'</td>'.
			'</tr>';			
	}   ?>

</table>


