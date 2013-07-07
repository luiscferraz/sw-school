
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

<script type="text/javascript">
    $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      $('.fancybox').fancybox({'frameWidth' : 600, 'autoDimensions' : false, 'width' : 600});
      $.fancybox.update()


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
          <?php
      if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){     
      echo $this->Html->link(
          $this->Html->image("delete.png", array("alt" => "Deletar", "title" => "Deletar Projeto")),
          array('action' => 'delete', $project['Project']['id']),
          array('escape'=>false),"Você quer excluir realmente ?");
      }
      ?>
        </span>
        
        <span class="icon-action"> 

          <a class="fancybox fancybox.iframe" href="./activities/index/<?php echo $project['Project']['id'] ?>"><?php echo $this->Html->image("activity.png", array('alt' => 'Atividades','title' => 'Atividades', 'id' => 'btnAtividades'))?></a>

          <a class="fancybox fancybox.iframe" href="./Projects/reports/<?php echo $project['Project']['id'] ?>"><?php echo $this->Html->image("rel.png", array('alt' => 'Relatórios','title' => 'Relatórios', 'id' => 'btnRelatorio'))?></a>
          
         

       

      <?php 
      if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
        $idPrj = $project['Project']['id'];
		

        echo '<a class="fancybox fancybox.iframe" alt="Consultores Alocados" id="link" href="./Projects/alocados/'.$idPrj.'"><img src="./img/consultor.png"  alt="Consultores Alocados" title="Consultores Alocados" id="btnalocados" ></a>';

      }
      ?>        



        <?php 
      if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
        $idPrj = $project['Project']['id'];
		

        echo '<a class="fancybox fancybox.iframe" alt="Despesas" id="link" href="./Projects/financial/'.$idPrj.'"><img src="./img/financial.png"  alt="Despesas" title="Despesas" id="btnFinancial" ></a>';

      }
      ?>        



      <?php 
      if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
        $idPrj = $project['Project']['id'];
		

        echo '<a class="fancybox fancybox.iframe" alt="Editar" id="link" href="./Projects/edit/'.$idPrj.'"><img src="./img/edit.png"  alt="Editar" title="Editar" id="btnEdit" ></a>';

      }
      ?>        


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
            echo '<a href="companies/view/',$company['Company']['id'],'">','<span>',$company['Company']['name'],'</span></a>';
          }
        } ?>
        </p>

        <p><span>Gerente de projeto: </span>
        <?php 
        foreach ($consultants as $consultant) {
          if ($project['Project']['consultant_id'] == $consultant['Consultant']['id']) {
            echo '<a href="consultants/view/',$consultant['Consultant']['id'],'">','<span>',$consultant['Consultant']['name'],'</span></a>';
          }
        } ?></p>
      


        <h4 class="tituloDadosProjeto"> Horas </h4>

        <table class="zebra" cellpadding="0" cellspacing="0">
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

        

    <div class="AtividadesEmProjetoIndex2">

      <table  class="zebra" cellpadding="0" cellspacing="0">
  
        <?php
          
          foreach ($activities as $activity){
            
              ?>

          </div>
<?php } ?>
      </table>
  
    </div>  
 </div>

 <?php } ?>

