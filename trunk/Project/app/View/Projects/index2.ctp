<div id="menuEsquerda">

  <h1 id="tituloArvore">Projetos</h1>

    <?php

    echo '<ul id="red" class="treeview-gray">';

    foreach ($projects as $project) {
    	echo '<li class="arvore"><span>';
       	echo $this->html->link(($project['Project']['name']), array('action' => 'view', $project['Project']['id']), array('escape'=>false, 'id'=>'link'));
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