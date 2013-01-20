
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
	                $("#content div.conteudo").hide();
	                
	                $("#content div.conteudo:nth-child("+indice+")").show();
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
        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
						echo $this->Form->create('Projects', array('action' => 'add')); ?>
            <fieldset id="Dados_projeto_pai">
            	
                        <?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
                        <?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
                        <?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
                        <?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas em grupo: ', 'id'=>'hora_c')); ?>
                        <?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
                        <?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?>
                        
            </fieldset>
            <fieldset id="botaoGerente">
                    
            	<label>Gerente de Projeto: </label>
                <input id="bt-add-gerente" type="button" value="Escolher Gerente de Projeto" onclick='ListGerentes();'> 
            </fieldset>
            <?php echo $this->Form->end('Confirmar Cadastro'); ?>

        </div>
        <div class="conteudo">
        <?php //provavelmente na view add, ou o equivalente para adicionar a pessoa
						echo $this->Form->create('Projects', array('action' => 'add')); ?>
            <fieldset id="Dados_projeto_pai">
            			
            	
                        <?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
                        <?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
                        <?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
                        <?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
                        <?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?>
            </fieldset>
            <fieldset id="horas">
                 <legend class="legenda">Horas</legend>
                    <?php echo $this->Form->input('Project.a_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas A: ','required'=>'required','id'=>'hora_a',)); ?>
                    <?php echo $this->Form->input('Project.b_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas B: ', 'id'=>'hora_b')); ?>
                    <?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Horas C: ', 'id'=>'hora_c')); ?>
                    <p> </p>
                    <p> </p>
                    <span id="total-de-horas">Total de horas : <p style="color:#000"></p></span>
            </fieldset>           
        	<?php echo $this->Form->end('Confirmar Cadastro'); ?>
        </div>
    </div>
</div>

