
<h1>Projetos</h1>

<?php //só mostrar o botão cadastrar se for usuário admin
    if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
      echo '<div id="bt-cadastrar-projeto">'; 
      echo $this->Html->link("Cadastrar", array('action' => 'add'),array('class'=>'botao'));
      echo '</div>';
    }
  ?>    


<div id="menuEsquerda">

  
<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $('.show').click(function(){
          var id = $(this).attr('id');
          $(".slidingDiv").hide();
          $("#div_"+id).slideToggle();
        });
 
});
 
</script>



<?php

 #FUNÇÃO RECURSIVA PARA IMPRIMIR OS FILHOS DE UM PROJETOS E SUAS RESPECTIVAS ATIVIDADES

  function imprimirFilhos($project, $projectsFilhos, $activities) {
    #Percorrendo os projetos filhos usando a condição se seu id pai é igual ao id do $projeto
    
    foreach ($projectsFilhos as $projectFilho) {

      if ($project['Project']['id']==$projectFilho['Project']['parent_project_id']) {
        echo '<ul>';

        echo '<a href="#" class="show" id="'.$projectFilho['Project']['id'].'">','<li class="arvore"><span class="spanArvore">',$projectFilho['Project']['name'],'</span></a>';
        
        imprimirFilhos($projectFilho, $projectsFilhos, $activities);

        echo '</ul>';
      }
    }
    
    echo '</li>';    
  }

?>


<?php 

  echo '<ul id="red" class="treeview-gray">';

  #Percorrendo os projetos pais

  foreach ($projectsPais as $project) {

    echo '<a href="#" class="show" id="'.$project['Project']['id'].'">','<li class="arvore"><span class="spanArvore">',$project['Project']['name'],'</span></a>';

    imprimirFilhos($project, $projectsFilhos, $activities);
    

  }

  echo '</li>';
  echo '</ul>';
  

  echo '</div>';

?>



<?php foreach ($projects as $project) { ?>
 
<div class="slidingDiv" id="div_<?php echo $project['Project']['id']; ?>">
      <h3 class="tituloProjeto">
        Projeto - <?php echo $project['Project']['name']; ?> 
        <span class="icon-action">
          <?php echo $this->Html->link(
          $this->Html->image("delete.png", array("alt" => "Deletar", "title" => "Deletar Projeto")),
          array('action' => 'delete', $project['Project']['id']),
          array('escape'=>false),"Você quer excluir realmente ?");?>
        </span>
        
        <span class="icon-action"> 
          <?php 
          if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
          echo $this->Html->link(
          $this->Html->image("consultor.png", array('alt' => 'Consultores Alocados','title' => 'Consultores Alocados')), array('action' => 'alocados',$project['Project']['id']), array('escape'=>false, 'id'=>'link'));
          }
          ?>

          <?php echo $this->Html->link(
          $this->Html->image("financial.png", array('alt' => 'Despesas','title' => 'Despesas')), array('action' => 'financial',$project['Project']['id']), array('escape'=>false, 'id'=>'link'))?>

          <?php echo $this->Html->link(
          $this->Html->image("edit.png", array("alt" => "Editar","title" => "Editar Projeto")),'edit/'.$project['Project']['id'],
          array('escape'=>false)) ?>


        </span> 
      
      </h3>

      
        <h4 class="tituloDadosProjeto"> Dados Projeto </h4>
        <p><span>Sigla: </span> <?php echo $project['Project']['name']; ?></p>
        <p><span>Descrição: </span><?php echo $project['Project']['description']; ?></p>  
        <p><span>Projeto Pai: </span>
        <?php 
        foreach ($projects as $projectPai) {
          if ($projectPai['Project']['id'] == $project['Project']['parent_project_id']){
            echo '<a href="#" class="show" id="'.$projectPai['Project']['id'].'">','<span>',$projectPai['Project']['name'],'</span></a>';
          }
        }
        ?>
        </p>

        <p><span>Empresa: </span>
        <?php 
        foreach ($companies as $company) {
          if ($project['Project']['company_id'] == $company['Company']['id']) {
            echo '<a href="../companies/view/',$company['Company']['id'],'">','<span>',$company['Company']['name'],'</span></a>';
          }
        } ?>
        </p>

        <p><span>Gerente de projeto: </span>
        <?php 
        foreach ($consultants as $consultant) {
          if ($project['Project']['consultant_id'] == $consultant['Consultant']['id']) {
            echo '<a href="../consultants/view/',$consultant['Consultant']['id'],'">','<span>',$consultant['Consultant']['name'],'</span></a>';
          }
        } ?></p>
      


        <h4 class="tituloDadosProjeto"> Horas </h4>

        <table cellpadding="0" cellspacing="0">
        <tr>
          <th>Individual</th>
          <th>Em grupo</th>
        </tr>
        <tr>
          <td><span>Hora A: </span><?php echo $project['Project']['a_hours_individual']; ?>h</span></td>
          <td><span>Hora A: </span><?php echo $project['Project']['a_hours_group']; ?>h</span></td>
        </tr>
        <tr>
          <td><span>Hora B: </span><?php echo $project['Project']['b_hours_individual']; ?>h</td>
          <td><span>Hora B: </span><?php echo $project['Project']['b_hours_group']; ?>h</td>
        </tr>
        <tr>
          <td><span>Hora C: </span><?php echo $project['Project']['c_hours_individual']; ?>h</td>
          <td><span>Hora C: </span><?php echo $project['Project']['c_hours_group']; ?>h</td>
        </tr>
        </table>

        
        


  <h2 id="AtividadesEmProjetoIndex2">
    Atividades - <?php echo $project['Project']['name']; ?> 
  </h2>

    <div class="AtividadesEmProjetoIndex2">

      <table cellpadding="0" cellspacing="0">
        <tr>
          <th>Descrição</th>
          <th class="responsive">Status</th>
          <th class="responsive">Data</th>
          <th class="actions">Visualizar Detalhadamente</th>
        </tr>

        <?php
          
          foreach ($activities as $activity){
            
            if ($activity['Activity']['project_id']===$project['Project']['id']) {
              echo '<tr>';
              echo '<td class="descrição">';

              if ($activity['Activity']['project_id']===$project['Project']['id']){

                echo $activity['Activity']['description'];}

                echo '</td>';
                echo '<td class="status">';

                if ($activity['Activity']['project_id']===$project['Project']['id']){
                  echo $activity['Activity']['status'];
                }

                echo '</td>';
                echo '<td class="data">';
                if ($activity['Activity']['project_id']===$project['Project']['id']){
                  echo $activity['Activity']['date'];
                }
                echo '</td>';

              echo '<div class="actions">';
              echo '<td>';
              echo $this->html->link(
                $this->html->image("view.png", array('alt' => 'Ver')), array('action' => '../activities/view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'));
              echo '</td>';
                }
              ?>
            

          </div>
<?php } ?>
      </table>
  
    </div>  
 </div>

 <?php } ?>

