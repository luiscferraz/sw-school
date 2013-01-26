<div id="menuEsquerda">

  <script type="text/javascript">
      function clicar() {
        alert('emtrou');
        document.getElementById('frameIndex').src='add';
        }
  </script>

  <h1 id="tituloArvore">Projetos</h1>

    <?php

    echo '<ul id="red" class="treeview-gray">';

    foreach ($projects as $project) {
    	echo '<li class="arvore"><span>';
       	echo $this->html->link(($project['Project']['name']), array('onclick' => 'clicar(this)'));
       	echo'</span>'; 
        echo '<ul>';
           
           foreach ($activities as $activity) {

                   if ($activity['Activity']['project_id']===$project['Project']['id']) {
                   	echo '<li><span>';
                   	echo $this->html->link(($activity['Activity']['description']), array('action' => '../activities/view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'));
                   	echo'</span></li>';
      				}
           
           }
           echo '</ul>';
           echo '</li>';        
    }

    ?>

</div>



<iframe scrolling="no"  id="frameIndex" src="add.html" frameborder=0 border=0  allowtransparency="no" scrolling="auto"></iframe>

