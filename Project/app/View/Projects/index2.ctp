<div id="menuEsquerda">

  
<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    });
 
});
 
</script>


  <h1 id="tituloArvore">Projetos</h1>

    <?php

    echo '<ul id="red" class="treeview-gray">';

    foreach ($projects as $project) {
      echo '<a href="#" class="show_hide">','<li class="arvore"><span>',$project['Project']['name'],'</span></a>'; 
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


echo '</div>';



?>




<div class="slidingDiv">
      <h3>
      Projeto - <?php echo $project['Project']['name']; ?> 
      <span class="icon-action">
        <?php echo $this->Html->link(
        $this->Html->image("delete.png", array("alt" => "Deletar")),
        array('action' => 'delete', $project['Project']['id']),
        array('escape'=>false),"Você quer excluir realmente ?");?>
      </span>
      
      <span class="icon-action"> 
        <?php echo $this->Html->link(
        $this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$project['Project']['id'],
        array('escape'=>false)) ?>
      </span> 
      
    </h3>

    <div> 
      <fieldset class='fieldIndexProject'>
        <h4> Dados Projeto </h4>
        <p><span>Sigla: </span> <?php echo $project['Project']['name']; ?></p>
        <p><span>Descrição: </span><?php echo $project['Project']['description']; ?></p>  
      </fieldset>

      <fieldset class='fieldIndexProject'>
        <h4> Hora Individual </h4>
        <p><span>Hora A: </span><?php echo $project['Project']['a_hours_individual']; ?>h</span></p>
        <p><span>Hora B: </span><?php echo $project['Project']['b_hours_individual']; ?>h</p>
        <p><span>Hora C: </span><?php echo $project['Project']['c_hours_individual']; ?>h</p>
      </fieldset>

      <fieldset class='fieldIndexProject'>
        <h4> Hora em grupo </h4>
        <p><span>Hora A: </span><?php echo $project['Project']['a_hours_group']; ?>h</span></p>
        <p><span>Hora B: </span><?php echo $project['Project']['b_hours_group']; ?>h</p>
        <p><span>Hora C: </span><?php echo $project['Project']['c_hours_group']; ?>h</p>
      </fieldset>

    </div>
 </div>
