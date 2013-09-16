<?php 
    foreach ($projects as $project) {        
        $list_projects[$project['projects']['id']] =$project['projects']['name'];
        };                    
    if (!isset($list_projects)){
        $list_projects['none'] = 'Nenhum Projeto Cadastrado';
    }
?>
<?php 
    foreach ($consultants as $consultant) {        
        $list_consultants[$consultant['Consultant']['id']] =$consultant['Consultant']['name'];
        };                    
    if (!isset($list_consultants)){
        $list_consultants['none'] = 'Nenhum Consultor Cadastrado';
    }
?>

<script>
$(function() {
        var scntDiv = $('#block2');
        var i = $('#block2 fieldset.cadastro').size();
        var projeto = [];
        var consultor = [];

        $.ajax({
        async: false,
        url: limparUrl("projetos"), //URL que puxa os dados
        dataType: "json", //Tipo de Retorno
        success: function(json){ //Se ocorrer tudo certo
        var options = "";
            $.each(json, function(key, value){
               options += '<option value="' + key + '">' + value + '</option>';
            });
            projetos = options;
        }
                
});
        $.ajax({
        async: false,
        url: limparUrl("consultores"), //URL que puxa os dados
        dataType: "json", //Tipo de Retorno
        success: function(json){ //Se ocorrer tudo certo
        var options = "";
            $.each(json, function(key, value){
               options += '<option value="' + key + '">' + value + '</option>';
            });
            consultores = options;
        }

                
});   
function limparUrl(pag){
    var url = window.location.toString();
    n =  url.search('add3');
    url = url.slice(0,n);
    return url+pag;
}  
        $(document).ready(function() {
        $("input.hasDatepicker").live("click", function() {
        $(this)
            .removeClass("hasDatepicker")
            .datepicker({showOn:"focus"})
            .focus();
    });
});
   
    
        var projeto = projetos;
        var consultor = consultores;


        $('#addScnt').live('click', function() {
                $("<fieldset class='cadastro'><fieldset class='projeto'><div class='input select'><label for='actvID'></label><select name='data[Activity]["+i+"][project_id]' class='projetos' id='actvID' style='width: 90px'><option value=''>Selecione</option>"+projeto+"</select></div></fieldset><fieldset class='atividade'><div class='input text'><label for='actvDesc'></label><input name='data[Activity]["+i+"][description]' id='actvDesc' maxlength='100' type='text'/></div></fieldset><fieldset class='consultor'><div class='input select'><label for='actvID'></label><select name='data[Activity]["+i+"][consultant1_id]' id='actvID' style='width: 90px' class='cosultant-atividade'><option value=''>Selecione</option>"+consultor+"</select></div></fieldset><fieldset class='consultor'><div class='input select'><label for='actvID'></label><select name='data[Activity]["+i+"][consultant2_id]' id='actvID' style='width: 90px' class='cosultant-atividade'><option value=''>Selecione</option>"+consultor+"</select></div></fieldset><fieldset class='consultor'><div class='input select'><label for='actvID'></label><select name='data[Activity]["+i+"][consultant3_id]' id='actvID' style='width: 90px' class='cosultant-atividade'><option value=''>Selecione</option>"+consultor+"</select></div></fieldset><fieldset class='consultor'><div class='input select'><label for='actvID'></label><select name='data[Activity]["+i+"][consultant4_id]' id='actvID' style='width: 90px' class='cosultant-atividade'><option value=''>Selecione</option>"+consultor+"</select></div></fieldset><fieldset class='hora1'><div class='input text'><label for='actvStartHour'></label><input name='data[Activity]["+i+"][start_hours]' onblur='checkHour()' type='text'/></div></fieldset><fieldset class='hora1'><div class='input text'><label for='actvEndtHour'></label><input name='data[Activity]["+i+"][end_hours]' onblur='checkHour()' type='text'/></div></fieldset><fieldset class='data1'><div class='input text'><label for='datepicker'></label><input name='data[Activity]["+i+"][start_date]' onblur='checkDate(this)' type='text' class='hasDatepicker'/></div></fieldset><fieldset class='data1'><div class='input text'><input name='data[Activity]["+i+"][end_date]' onblur='checkDate(this)' type='text' class='hasDatepicker'/></div></fieldset><a href=# id=remScnt>x</a></fieldset>").appendTo(scntDiv);
                        
                        
/*
                $("<p><input type='text' style='width: 85px' name='Activity.'+ i +'.description' value='' id=atividade); ><a href=# id=remScnt>Remover</a></p>").appendTo(scntDiv);
/*
                 $('#addScnt').live('click', function() {
                $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="Activity.' + i +'.project_id" value="" placeholder="Input Value" /></label> <a href="#" id="remScnt">Remover</a></p>').appendTo(scntDiv);
*/

                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 1 ) {
                        $(this).parents('fieldset.cadastro').remove();
                        i--;
                }
                return false;
        });
});

</script>

<a href='../../home' class="botao" alt="Cancelar"> Cancelar </a>
<?php echo $this->Form->create('Activities', array('action' => 'add3')); ?>
    <H2>Cadastro de Atividades</H2>
    <fieldset id="cadastro2">
        <fieldset class="projeto">
             Projeto:
        </fieldset>
        <fieldset class="atividade">
            Descrição:
        </fieldset>
        <fieldset class="consultor">
            Consultor 1:
        </fieldset>
        <fieldset class="consultor">
            Consultor 2:
        </fieldset>
        <fieldset class="consultor">
            Consultor 3:
        </fieldset>
        <fieldset class="consultor">
            Consultor 4: 
        </fieldset>
        <fieldset class="hora1">
            Hora Inicial: 
        </fieldset>
        <fieldset class="hora1">
            Hora Final: 
        </fieldset>
        <fieldset class="data1">
            Data Inicial: 
        </fieldset>
        <fieldset class="data1">
            Data Final: 
        </fieldset>
    </fieldset>

    <div id="block2">
            <fieldset class="cadastro"  >
                <fieldset class="projeto">
                
                <?php echo $this->Form->input('Activity.0.project_id', array('options' => $list_projects,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 85px'/*'required'=>'required', */)); ?>
                </fieldset>
                <fieldset class="atividade">
                <?php echo $this->Form->input('Activity.0.description', array('label' => '', 'id'=>'actvDesc'/*'required'=>'required', */)); ?> 
                </fieldset>   
                <fieldset class="consultor">
                <?php echo $this->Form->input('Activity.0.consultant1_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade'/*'required'=>'required', */)); ?>
                </fieldset>
                <fieldset class="consultor">
                <?php echo $this->Form->input('Activity.0.consultant2_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class' =>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset class="consultor">
                <?php echo $this->Form->input('Activity.0.consultant3_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>
                </fieldset>
                <fieldset class="consultor">
                <?php echo $this->Form->input('Activity.0.consultant4_id', array('options' => $list_consultants,'empty' => 'Selecione', 'type'=>'select','label' => '', 'id'=>'actvID','style'=>'width: 90px','class'=>'cosultant-atividade')); ?>    
                </fieldset>
                <fieldset class="hora1">
                <?php echo $this->Form->input('Activity.0.start_hours', array('type'=>'text','label' => '',/*'required'=>'required', */'id'=>'actvStartHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset class="hora1">
                <?php echo $this->Form->input('Activity.0.end_hours', array('type'=>'text', 'label' => '',/*'required'=>'required', */'id'=>'actvEndHour', 'onblur' => 'checkHour()')); ?>
                </fieldset>
                <fieldset class="data1">
                <?php echo $this->Form->input('Activity.0.start_date', array('type'=>'text','label' => '', /*'required'=>'required', */'id'=>'datepicker', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
                <fieldset class="data1">
                <?php echo $this->Form->input('Activity.0.end_date', array('type'=>'text','label' => '', /*'required'=>'required', */'id'=>'datepicker2', 'onblur' => 'checkDate(this)')); ?>
                </fieldset>
            </fieldset>   
    </div>
    <b><a href="#" id="addScnt"><input class="botao" style="width:14%" id="botao-aplicar-data" type="submit" value=" Adicionar " /></a></b><!--AQUUUIII-->
  
    <?php echo $this->Form->end('Confirmar Cadastro'); ?>

