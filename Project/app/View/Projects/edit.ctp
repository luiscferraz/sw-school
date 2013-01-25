
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

    <h1>Editar Projeto</h1>

    <div id="conteudoAddProjeto">
        <?php echo $this->Form->create('Projects', array('action' => 'edit')); ?>
            <fieldset id="dadosProjeto">
            <legend class="legenda">Dados</legend>
                        <?php echo $this->Form->input('Project.id', array('type'=>'hidden')); ?>
                        <?php echo $this->Form->input('Project.name', array('label' => 'Sigla: ','required'=>'required', 'id'=>'nameProject')); ?>
                        <?php echo $this->Form->input('Project.description', array('type'=>'textarea', 'label' => 'Descrição: ', 'id'=>'description')); ?>
                        <?php echo $this->Form->input('Project.parent_project_id',array('options' => $list_projects,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Pai: ', 'id' => 'parent_project')); ?>
                        <?php echo $this->Form->input('Project.company_id',array('options' => $list_companies,'type' => 'select', 'empty' => 'Selecione','label' => 'Projeto Empresa: ', 'id' => 'company', 'required'=>'required')); ?><br>
            </fieldset>

            <fieldset id="horaGrupo">
                <legend class="legenda">Hora em grupo</legend><br>
                    <?php echo $this->Form->input('Project.a_hours_group', array('min'=>"1", 'max'=>"999",'label' => 'Hora A: ','id'=>'hora_a_group', 'onblur'=>'SomarHorasGrupoProjeto()', 'id'=>'horaA')); ?><br>
                    <?php echo $this->Form->input('Project.b_hours_group', array('min'=>"1", 'max'=>"999",'label' => 'Hora B: ', 'id'=>'hora_b_group', 'onblur'=>'SomarHorasGrupoProjeto()', 'id'=>'horaB')); ?><br>
                    <?php echo $this->Form->input('Project.c_hours_group', array('min'=>"1", 'max'=>"999",'label' => 'Hora C: ', 'id'=>'hora_c_group', 'onblur'=>'SomarHorasGrupoProjeto()', 'id'=>'horaC')); ?><br>
                    <span id="total-de-horas-grupo">Total de horas : <p style=display:inline></p> </span><br>
            </fieldset>

            <fieldset id="horaIndiv">
                 <legend class="legenda">Hora Individual</legend><br>
                    <?php echo $this->Form->input('Project.a_hours_individual', array('min'=>"1", 'max'=>"999",'label' => 'Hora A: ','id'=>'hora_a', 'onblur'=>'SomarHorasProjeto()', 'id'=>'horaA')); ?><br>
                    <?php echo $this->Form->input('Project.b_hours_individual', array('min'=>"1", 'max'=>"999",'label' => 'Hora B: ', 'id'=>'hora_b', 'onblur'=>'SomarHorasProjeto()', 'id'=>'horaB')); ?><br>
                    <?php echo $this->Form->input('Project.c_hours_individual', array('min'=>"1", 'max'=>"999",'label' => 'Hora C: ', 'id'=>'hora_c', 'onblur'=>'SomarHorasProjeto()', 'id'=>'horaC')); ?><br>
                     <span id="total-de-horas">Total de horas : <p style= display:inline></p> </span><br>
            </fieldset>           

         <fieldset id="botoesGerenteConsultor">
                <legend>Gerente e Consultores</legend>
                    <div id="botaoGerente">
                            <label>Gerente de relacionamento:</label>
                            <input id="bt-add-gerente" type="button" value="Selecionar Gerente" onclick='ListGerentes();'> 
                    </div>
                    <div>
                        <label>Consultores: </label>
                        <input id="bt-add-consultores" type="button" value="Selecionar Consultores">
                   </div>  
            </fieldset>
            
            <?php echo $this->Form->end('Atualizar'); ?>
    </div>
</div>

