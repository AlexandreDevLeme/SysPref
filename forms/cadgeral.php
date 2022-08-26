<?php
require "./func/cadgeral_funcoes.php";
require "./sqlCon/conect.php";
require "./func/unset.Func.php";
session_start();

cabecalho("Secretaria de Finanças - Núcleo de Cadastro Imobiliário", "./css/cadgeral.css");

if (isset($_SESSION['Imovel'])){
    LimpaImovel();
} elseif (isset($_SESSION['Requerente'])){
    LimpaRequerente();
}

ClearSQLTempData();

/*########################################################################################*/
/*#################### VARIAVEIS PARA ARMAZENAR OS DESTINOS DOS LINKS ####################*/
/*#### VERIFICANDO A EXISTENCIA DE DADOS PARA PREENCHIMENTO DE RETORNO DAS CONSULTAS #####*/
    $_SESSION['target'] = "../cadgeral.php";
    require "./sqlCon/checkLogin.php";
    require "./sqlCon/Consulta_R_I.php";
/*#########################################################################################*/

echo "
    <div class='container-fluid'><!-- ABERTURA DO CONAINER -->
        <div class='menuSuperior'><!--Botão de acesso ao menu lateral, titulo da tela principal e brasão da prefeitura-->
            <table>
                <tr>
                    <td id='t1'><img src='./img/menu_bars.png' width='50px' heigth='60px' alt='logo' class='btnabre botao'></td><!-- BOTÃO PARA EXIBIR O MENU LATERAL -->
                    <td id='t2'><h4>PESQUISA DE DADOS PARA PREENCHIMENTO DE REQUERIMENTOS E FORMULÁRIOS</h4></td>
                    <td id='t3'><img src='./img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                </tr>
            </table>

            <label id='logado' name='logado' class='lblPerfil'>$perfil</label><!-- EXIBE O NOME DO OPERADOR -->
        </div>

            <nav class='menuOculto'><!--Menu lateral de acesso aos formularios e serviços-->
                <div class='menu'>Serviços<span class='material-icons btnfecha'>close</span></div>
                    <ul>
                        <li>
                            <ul>
                                <li><a href='formularios/ampliacao.php'>Certidão de Ampliação</a></li>
                                <li><a href='formularios/atualizacaoCad.php'>Certidão de Atualização dos Dados Cadastrais</a></li>
                                <li><a href='formularios/bci.php'>Certidão de BCI</a></li>
                                <li><a href='formularios/buscaIPTU.php'>Certidão de Busca de IPTU</a></li>
                                <li><a href='formularios/cancelamentoAlvara.php'>Certidão de Cancelamento de Alvará</a></li>
                                <li><a href='formularios/confrontantes.php'>Certidão de Confrontantes</a></li>
                                <li><a href='formularios/certConstrucao_habite_se.php'>Certidão de Construção / Habite-se</a></li>
                                <li><a href='formularios/copiaAlvara.php'>Cópia de Projeto</a></li>
                                <li><a href='formularios/certDemolicao.php'>Certidão de Demolição</a></li>
                                <li><a href='formularios/certDenominacaoRua.php'>Certidão de Denominação de Rua</a></li>
                                <li><a href='formularios/certEmplacamento.php'>Certidão de Emplacamento</a></li>
                                <li><a href='formularios/certFichaCad.php'>Certidão de Ficha Cadastral</a></li>
                                <li><a href='formularios/certLadodoImovel.php'>Certidão de Lado do Imóvel</a></li>
                                <li><a href='formularios/certMedInLoco.php'>Medição / Verificação in Loco</a></li>
                                <li><a href='formularios/certRenCertDesdobro.php'>Certidão de Renovação da Certidão de Desdobro</a></li>
                                <li><a href='formularios/certRenCopiaAlvara.php'>Certidão de Renovação do Alvará de Constução</a></li>
                                <li><a href='formularios/revisaoIPTU.php'>Certidão de Revisão de IPTU</a></li>
                                <li><a href='formularios/certUnificacao.php'>Certidão de Unificação</a></li>
                                <li><a href='formularios/certValorVenal.php'>Certidão de Valor Venal</a></li>
                                <li><a href='act/reg_atendimento.php'>Carregar Histórico de Atendimentos</a></li>
                                <li><a href='./act/ajuda.php'>Ajuda</a></li>
                                <li><a href='../index.php'>Sair para a tela de login</a></li>        
                            </ul>
                        </li>
                    </ul>
            </nav>
            <script type='text/javascript' src='./js/cadgeral.js'></script><!--Chama a jquery que ativa o menu oculto-->        
";
echo "
        <div class='bar-contrib position-static'><label class='campo-req'>Cadastro - Consulta e Edição de Requerentes</label></div>
";
echo "
        <div class='reg_requerente'><!-- DIVISÃO DOS ITENS RESERVADOS AO CADASTRO, CONSULTA E EDIÇÃO DE REQUERENTES -->
            <form id='formBuscaCPF' action='./sqlCon/rota.php' method='post'><!-- FORM QUE ENVIA OS DADOS DA CONSULTA DE REQUERENTES -->
                <div class='input-group input-group-sm mb-0 pesquisaRequerente position-absolute'><!-- DIV QUE LIMITA A DISPERSÃO DOS OBJETOS DA CONSULTA -->
                    <span class='input-group-text toggle conCPF_txt' id='inputGroup-sizing-sm'>Buscar Requerente por CPF</span>
                    <input type='text' id='cpf4' name='cpfR1' size='14' maxlength='20' class='form-control pesq_cpf' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <input type='button' value='Carregar dados' class='btn btn-outline-light buscaCPF2' onClick='Submit_BuscaCPF_Principal()'>
                </div>
            </form>
            <form id='formCadReq' action='./sqlCon/alimentadorBD.php' method='post'><!-- FORM QUE ENVIDA OS DADOS PARA CADASTRAR O REQUERENTE -->
                <div class='input-group input-group-sm mb-0 inp01 position-static'>    
                    <h4 class='titleR'>Dados do Requerente</h4>
                    <label id='status_busca' name='status_busca' class='retornoBusca'>$texto</label><!-- RETORNO DA PESQUISA DE REQUERENTES -->
                    <span class='input-group-text BuscaCEPReq position-static' id='inputGroup-sizing-sm'>Buscar endereço por cep</span>
                    <input type='text' id='cep' name='cepR' size='20' maxlength='10' value='$cep' class='form-control i9 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>

                <div class='input-group input-group-sm mb-0 inp1 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Nome Requerente</span>
                    <input type='text' id='nomeR' name='nomeR' value='$nome' class='form-control i1 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Digite o nome do contribuinte.'>
                </div>

                <div class='input-group input-group-sm mb-0 inp2 position-static'>
                    <span class='input-group-text toggle position-static' id='inputGroup-sizing-sm'>N° do CPF</span>
                    <input type='text' id='cpf' name='cpfR' size='14' maxlength='20' value='$cpf' class='form-control i2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do RG</span>
                    <input type='text' id='rg' name='rgR' size='16' maxlength='20' value='$rg' class='form-control i3 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Telefone Fixo</span>
                    <input type='text' id='tel' name='telR' size='16' maxlength='14' value='$telefone' class='form-control i4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Celular</span>
                    <input type='text' id='cel' name='celR' size='17' maxlength='16' value='$celular' class='form-control i5 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>

                <div class='input-group input-group-sm mb-0 inp3 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Endereço</span>
                    <input type='text' id='endereco' name='endR' value='$endereco' class='form-control i6 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Número</span>
                    <input type='text' id='numero' name='numR' size='5' maxlength='5' value='$numero' class='form-control i7 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Complemento</span>
                    <input type='text' id='complemento' name='complementoR' value='$complemento' class='form-control i000 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>

                <div class='input-group input-group-sm mb-0 inp4 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Bairro</span>
                    <input type='text' id='bairro' name='bairroR' value='$bairro' class='form-control i8 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Cidade</span>
                    <input type='text' id='cidade' name='cidR' value='$cidade' class='form-control i10 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <label class='input-group-text position-static' for='inputGroupSelect01 uf'>Estado</label>
                    <select class='form-select i11 position-static' id='inputGroupSelect01' name='ufR'>
                        <option selected>$estado</option>
                        <option value='AC'>Acre</option>
                        <option value='AL'>Alagoas</option>
                        <option value='AP'>Amapá</option>
                        <option value='AM'>Amazonas</option>
                        <option value='BH'>Bahia</option>
                        <option value='CE'>Ceará</option>
                        <option value='DF'>Distrito Federal</option>
                        <option value='ES'>Espírito Santo</option>
                        <option value='GO'>Goiás</option>
                        <option value='MA'>Maranhão</option>
                        <option value='MT'>Mato Grosso</option>
                        <option value='MS'>Mato Grosso do Sul</option>
                        <option value='MG'>Minas Gerais</option>
                        <option value='PA'>Pará</option>
                        <option value='PB'>Paraíba</option>
                        <option value='PR'>Paraná</option>
                        <option value='PE'>Pernambuco</option>
                        <option value='PI'>Piauí</option>
                        <option value='RJ'>Rio de Janeiro</option>
                        <option value='RN'>Rio Grande do Norte</option>
                        <option value='RS'>Rio Grande do Sul</option>
                        <option value='RO'>Rondônia</option>
                        <option value='RR'>Roraima</option>
                        <option value='SC'>Santa Catarina</option>
                        <option value='SP'>São Paulo</option>
                        <option value='SE'>Sergipe</option>
                        <option value='TO'>Tocantins</option>
                    </select>
                </div>

                <!--################# Chamando jquery que faz a busca do Endereço por CEP #############-->
                <script type=\"text/javascript\">
                $(\"#cep\").focusout(function(){
                    //Início do Comando AJAX
                    $.ajax({
                        //O campo URL diz o caminho de onde virá os dados
                        //É importante concatenar o valor digitado no CEP
                        url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
                        //Aqui você deve preencher o tipo de dados que será lido,
                        //no caso, estamos lendo JSON.
                        dataType: 'json',
                        //SUCESS é referente a função que será executada caso
                        //ele consiga ler a fonte de dados com sucesso.
                        //O parâmetro dentro da função se refere ao nome da variável
                        //que você vai dar para ler esse objeto.
                        success: function(resposta){
                            //Agora basta definir os valores que você deseja preencher
                            //automaticamente nos campos acima.
                            $(\"#endereco\").val(resposta.logradouro);
                            $(\"#bairro\").val(resposta.bairro);
                            $(\"#cidade\").val(resposta.localidade);
                            $(\"#inputGroupSelect01\").val(resposta.uf);
                            //Vamos incluir para que o Número seja focado automaticamente
                            //melhorando a experiência do usuário
                            $(\"#numero\").focus();
                        }
                    });
                });
                </script>
                <!--######################################################################################-->

                <label id='edt_id' name='edt_id' class='edt_id'>$codigo_edt</label><!-- ARMAZENA O CODIGO DO REQUERENTE APÓS A CONSULTA -->

                <div class='btn1'>
                    <input type='button' value='Grava Dados do Requerente' class='btn btn-outline-light grava' onClick='Submit_FormReq()'>
                    <input type='button' value='Limpar Dados do Requerente' class='btn btn-outline-light apaga' onClick='limpaReq()'>
                    <a href='sqlCon/rota.php?codigoReqEdt=$codigo_edt' value='' class='btn btn-primary btnEditarSelecionado'>Editar Requerente Localizado</a>
                </div>
            </form>
        </div>
";
echo "
        <p></p>
";
echo "
        <div class='bar-imovel position-static'><label class='campo-im'>Cadastro - Consulta e Edição de Imóveis</label></div>
";
echo "
        <div class='reg_imovel'><!-- DIVISÃO DOS ITENS RESERVADOS AO CADASTRO, CONSULTA E EDIÇÃO DE IMÓVEIS -->
            <form id='formBuscaCad' action='./sqlCon/rota.php' method='post'><!-- FORM QUE ENVIA OS DADOS DA CONSULTA DE IMÓVEIS -->
                <div class='input-group input-group-sm mb-0 pesquisaImovel position-absolute'><!-- DIV QUE LIMITA A DISPERSÃO DOS OBJETOS DA CONSULTA -->    
                    <span class='input-group-text conCAD_txt' id='inputGroup-sizing-sm'>Buscar Imóvel por N° de Cadastro</span>
                    <input type='text' id='ncad7' name='ncadI1' size='16' maxlength='16' class='form-control pesq_cad' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <input type='button' value='Carregar dados' class='btn btn-outline-light buscaCAD2' onClick='Submit_BuscaCAD_Principal()'>
                </div>
            </form>

                <div class='input-group input-group-sm mb-0 inp5 position-static'>
                    <h4 class='titleI'>Dados do Imóvel</h4>
                    <label id='status_buscaI' name='status_buscaI' class='retornoBuscaI'>$textoI</label><!-- RETORNO DA PESQUISA DE IMÓVEIS -->
                    <span class='input-group-text buscaCEP2 position-static' id='inputGroup-sizing-sm'>Buscar rua e bairro por cep</span>
                    <input type='text' id='buscaCEP' name='buscaCEP' class='form-control i18 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            
            <form id='formCadIm' action='./sqlCon/alimentadorBD.php' method='post'><!-- FORM QUE ENVIDA OS DADOS PARA CADASTRAR O IMÓVEL -->
                <div class='input-group input-group-sm mb-0 inp6 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Rua / Avenida</span>
                    <input type='text' id='rua' name='rua' value='$rua' class='form-control i12 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Número</span>
                    <input type='text' id='num' name='num' value='$num' size='5' maxlength='5' class='form-control i13 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Bairro</span>
                    <input type='text' id='vila' name='vila' value='$vila' size='50' maxlength='50' class='form-control i16 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
        
                <div class='input-group input-group-sm mb-0 inp7 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Lote</span>
                    <input type='text' id='lote' name='lote' value='$lote' size='100' maxlength='100' class='form-control i14 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Quadra</span>
                    <input type='text' id='quadra' name='quadra' value='$quadra' size='16' maxlength='14' class='form-control i15 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'> 
                </div>
        
                <div class='input-group input-group-sm mb-0 inp8 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do Cadastro</span>
                    <input type='text' id='ncad1' name='ncad1' value='$cad' size='16' maxlength='16' class='form-control i19 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Proprietário</span>
                    <input type='text' id='nomeP' name='nome' value='$dono' class='form-control i17 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
        
                    <!--################# Chamando jquery que faz a busca do Endereço por CEP para campos do imóvel #############-->
                    <script type=\"text/javascript\">
                    $(\"#buscaCEP\").focusout(function(){
                        //Início do Comando AJAX
                        $.ajax({
                            //O campo URL diz o caminho de onde virá os dados
                            //É importante concatenar o valor digitado no CEP
                            url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/',
                            //Aqui você deve preencher o tipo de dados que será lido,
                            //no caso, estamos lendo JSON.
                            dataType: 'json',
                            //SUCESS é referente a função que será executada caso
                            //ele consiga ler a fonte de dados com sucesso.
                            //O parâmetro dentro da função se refere ao nome da variável
                            //que você vai dar para ler esse objeto.
                            success: function(resposta){
                                //Agora basta definir os valores que você deseja preencher
                                //automaticamente nos campos acima.
                                $(\"#rua\").val(resposta.logradouro);
                                $(\"#vila\").val(resposta.bairro);
                                //Vamos incluir para que o Número seja focado automaticamente
                                //melhorando a experiência do usuário
                                $(\"#num\").focus();
                            }
                        });
                    });
                    </script>
                    <!--##########################################################################################################-->
        
                <label id='edtI_id' name='edtI_id' class='edtI_id'>$codigo_edtI</label><!-- ARMAZENA O CODIGO DO IMÓVEL APÓS A CONSULTA -->
        
                <div class='btn2'>
                    <input type='button' value='Grava Dados do Imóvel' class='btn btn-outline-light salva' onClick='Submit_FormIm()'>
                    <input type='button' value='Limpar Dados do Imóvel' class='btn btn-outline-light deleta' onClick='limpaIm()'>
                    <a href='sqlCon/rota.php?codigoImEdt=$codigo_edtI' value='' class='btn btn-primary btnConsultaI'>Editar Imóvel Localizado</a>
                </div>
            </form>
        </div>
";
echo "
    </div><!-- FIM DO CONAINER -->
";
rodape();
?>