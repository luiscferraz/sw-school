<?php
header('Content-Type: text/html; charset=UTF-8');
?>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<h1 id="titulo"><a id="titulolink" href="#" onClick="window.parent.$.fancybox.close();" alt="<?php echo $project['Project']['name'] ?>">Projeto - <?php echo $project['Project']['name'] ?></a></h1>
	<table class="zebra" id="tabela_atividades" cellpadding="0" cellspacing="0">
		<tr>

			<th>Descrição</th>
			<th class="responsive">Status</th>
			<th class="responsive">Data</th>
			<th class="actions">Ações</th>
		</tr>

		<?php
			
			$i = 0;
			foreach ($activities as $activity) 
			{
				$class = null;
				
				if($i++ % 2 == 0)
				{
					$class = 'class="altrow"';
					foreach($attachments as $attachment){
						
						$list_attachments[$attachment['Attachment']['id']] = $attachment['Attachment']['file_name'];
						
						
					}
				}
					
							
		?>

		<tr <?php echo $class; ?>>

			<td class="descrição"><?php echo $activity['Activity']['description']; ?></td>
			<td class="status"><?php echo $activity['Activity']['status']; ?></td>
			<td class="data"><?php echo $activity['Activity']['date']; ?></td>

			
				<td>
					<div class="actions">
					<?php echo $this->Html->link(
					$this->Html->image("view.png", array('alt' => 'Ver','title'=>'Visualizar')), array('action' => 'view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'))?>

					<?php 
						if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
							echo $this->Html->link($this->Html->image("edit.png", array('alt' => 'Editar','title'=>'Editar')), array('action' => 'edit', $activity['Activity']['id'], $activity['Activity']['project_id']),
							array('escape'=>false, 'id'=>'link'));
						}
					?>					
					                							
					<?php 
						if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
							echo $this->Html->link($this->Html->image("delete.png", array('alt' => 'Remover','title'=>'Excluir')), array('action' => 'delete', $activity['Activity']['id'], $activity['Activity']['project_id']),
							array('escape'=>false, 'id'=>'link'), "Confirmar exclusão da atividade?");
						}
					?>
					<br>
					<?php 
						if (in_array($tipo_usuario , array('admin'))){
							echo $this->Html->link($this->Html->image("junk.png", array('alt' => 'Excluir Def','title'=>'Excluir Definitivamente')), array('action' => 'eliminate', $activity['Activity']['id'], $activity['Activity']['project_id']),
							array('escape'=>false, 'id'=>'link'), "Confirmar exclusão definitiva da atividade?");
						}
					?>
					
					
					<?php echo $this->Html->image("attachment.png",array('alt'=>'Anexar','title'=>'Anexar','onClick'=>'ListAttachments('.$activity['Activity']['id'].')'));?>

					<br>

					<a href="../../entries/add/<?php echo $activity['Activity']['id']."/".$activity['Activity']['project_id'] ?>"><?php echo $this->Html->image("clock.png",array('alt'=>'Apontar', 'title' => 'Apontar', 'id' => 'btnRelogio'));?></a>

					<a href="../../entries/index/<?php echo $activity['Activity']['id'] ?>"><?php echo $this->Html->image("eye.png",array('alt'=>'Visualizar Apontamento', 'title' => 'Visualizar Apontamento', 'id' => 'btnVisuzalizar-Apontamento'));?></a>
					
					
					<!--<input id="botaoAnexo" type="button" value="Anexar" onClick='ListAttachments(<?php $attachment['Attachment']['activity_id'] ?>);' <img src="img/attachment.png" /></input> -->

					</div>
				</td>
			
		</tr>
		<?php } ?>
	</table>
<br>
<br>
<?php
echo $this->Html->link("Cadastrar Atividade", array('action' => '../activities/add/'.$project['Project']['id']),array('class'=>'botao', 'id'=>'botao-cadastrar-atividade'));

?>
