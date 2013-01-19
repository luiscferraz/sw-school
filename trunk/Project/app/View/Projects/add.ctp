
<?php 
                        foreach ($projects as $project) 
                            {
                                $list_projects[$project['Project']['id']] =$project['Project']['name'];
                            };
                    
                        foreach ($companies as $company) 
                            {
                                $list_companies[$company['Company']['id']] =$company['Company']['name'];
                            };
                        if (!isset($list_projects)){
                            $list_projects['none'] = 'Nenhum Projeto Cadastrado';
                        }
                        if(!isset($list_companies)){
                            $list_companies['none'] = 'Nenhuma Empresa Cadastrada';
                        }
                    ?>

        <script type="text/javascript">
        $(document).ready(function(){
            $("#content div:nth-child(1)").show();
            $(".abas li:first div").addClass("selected");      
            $(".aba").click(function(){
                $(".aba").removeClass("selected");
                $(this).addClass("selected");
                var indice = $(this).parent().index();
                indice++;
                $("#content div").hide();
                $("#content div:nth-child("+indice+")").show();
            });
             
            $(".aba").hover(
                function(){$(this).addClass("ativa")},
                function(){$(this).removeClass("ativa")}
            );             
        });
    </script>
<h1>Cadastrar Projeto</h1>

<div class="TabControl">
    <div id="header">
        <ul class="abas">
            <li>
                <div class="aba">
                    <span>Projeto Pai</span>
                </div>
            </li>
            <li>
                <div class="aba">
                    <span>Projeto Filho</span>
                </div>
            </li>
        </ul>
    </div>
    <div id="content">
        <div class="conteudo">
            <fieldset id="Dados_projeto_pai">
                    <form>
                        <?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
                        <?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
                        <?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
                        <?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
                        <?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?>
                        
                      </form>
            </fieldset>
            <fieldset id="botaoGerente">
                    <form>
                       <input id="gerente" type="submit" value="Gerente de projeto"> 
                    </form>

            </fieldset>

        </div>
        <div class="conteudo">
            <fieldset id="Dados_projeto_filho">
                    <form>
                         <?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
                        <?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
                        <?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
                        <?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
                        <?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?>
                    </form>
            </fieldset>
            <fieldset id="horas">
                <form>
                 <legend class="legenda">Horas</legend>
                    <?php echo $this->Form->input('Project.a_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas A: ','required'=>'required','id'=>'hora_a',)); ?>
                        
                    <?php echo $this->Form->input('Project.b_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas B: ', 'id'=>'hora_b')); ?>
                    
                    <?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas C: ', 'id'=>'hora_c')); ?>
                    <p> </p>
                    <p> </p>
                    <div id="total-de-horas">Total de horas : <p style="color:#000"></p></div>
                </form>
            </fieldset>           
        
        </div>
    </div>
</div>
<div id="botaoAddProjeto"><input type="submit" value="Confirmar Cadastro"></div>

