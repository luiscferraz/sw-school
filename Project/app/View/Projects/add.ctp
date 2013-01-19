
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
                        <label for="nome">Nome:</label><br>
                        <input name="nome" type="text" maxlength='45' required><br>
                        
                        <label for="decricao">Descrição:</label><br>
                        <input name="descricao" type="text"><br>
                        
                        <label for="abreviacao_nome">Abreviação do Nome:</label><br>
                        <input name="abreviacao_nome" type="text"><br>

                        <label for="horas_grupo">Horas Grupo:</label><br>
                        <input name="horas_grupo" type="text"><br>
                      </form>
            </fieldset>
            <fieldset id="botaoGerente">
                    <form>
                       <input id="gerente" type="submit" value="Gerente de projeto"> 
                    </form>

            </fieldset>

        </div>
        <div class="conteudo">
            <fieldset id="Dados_projeto">
                    <form>
                        <label for="nome">Nome:</label><br>
                        <input name="nome" type="text" maxlength='45' required><br>
                        
                        <label for="sigla">Sigla:</label><br>
                        <input name="sigla" type="text"><br>
                        
                        <label for="decricao">Descrição:</label><br>
                        <input name="descricao" type="text"><br>
                        
                        <label for="empresa">Empresa:</label><br>
                        <select id='selectEmpresa' name="empresa"></select>
                    </form>
            </fieldset>
           	<fieldset id="horas">
           		<form>
                    <label for="hora_a">Hora A:</label><br>
                    <input name="hora_a" type="text"><br>
                        
                    <label for="hora_b">Hora B:</label><br>
                    <input name="hora_b" type="text"><br>
                        
                    <label for="hora_c">Hora C:</label><br>
                    <input name="hora_c" type="text"><br>
                </form>
            </fieldset>           
        
        </div>
    </div>
</div>
<div id="botaoAddProjeto"><input type="submit" value="Confirmar Cadastro"></div>

		