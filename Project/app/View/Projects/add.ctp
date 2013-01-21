
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

    <h1>Cadastrar Projeto</h1>

    <div id="conteudoAddProjeto">
        <?php echo $this->Form->create('Projects', array('action' => 'add')); ?>
            <fieldset id="dadosProjeto">
            <legend class="legenda">Dados</legend>
                        <?php echo $this->Form->input('Project.name', array('label' => 'Nome: ','required'=>'required', 'id'=>'nameProject')); ?>
                        <?php echo $this->Form->input('Project.description', array('label' => 'Descrição: ', 'id'=>'description')); ?>
                        <?php echo $this->Form->input('Project.acronym', array('label' => 'Abreviação do Nome: ', 'id'=>'acronymProject')); ?>
                        <?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
                        <?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?><br>
                        <input id="bt-add-gerente" type="button" value="Gerente de Projeto" onclick='ListGerentes();'> 
            </fieldset>

            <fieldset id="horaIndiv">
                 <legend class="legenda">Hora Individual</legend>
                    <?php echo $this->Form->input('Project.a_hours', array('min'=>"1", 'max'=>"999",'label' => 'Hora A: ','required'=>'required','id'=>'hora_a',)); ?>
                    <?php echo $this->Form->input('Project.b_hours', array('min'=>"1", 'max'=>"999",'label' => 'Hora B: ', 'id'=>'hora_b')); ?>
                    <?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Hora C: ', 'id'=>'hora_c')); ?>
            </fieldset>           

            <fieldset id="horaGrupo">
                <legend class="legenda">Hora em grupo</legend>
                <?php echo $this->Form->input('Project.a_hours', array('min'=>"1", 'max'=>"999",'label' => 'Hora A: ','required'=>'required','id'=>'hora_a',)); ?>
                    <?php echo $this->Form->input('Project.b_hours', array('min'=>"1", 'max'=>"999",'label' => 'Hora B: ', 'id'=>'hora_b')); ?>
                    <?php echo $this->Form->input('Project.c_hours', array('min'=>"1", 'max'=>"999",'label' => 'Hora C: ', 'id'=>'hora_c')); ?>
            </fieldset>
            
        	<?php echo $this->Form->end('Confirmar Cadastro'); ?>
    </div>
</div>

