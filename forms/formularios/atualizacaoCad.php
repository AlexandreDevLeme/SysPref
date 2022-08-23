<?php
require "../func/funcoes.php";
require "../sqlCon/conect.php";

session_start();

cabecalho("Atualização Cadastral", "../css/formularios.css");
/*########################################################################################*/
/*#################### VARIAVEIS PARA ARMAZENAR OS DESTINOS DOS LINKS ####################*/
/*#### VERIFICANDO A EXISTENCIA DE DADOS PARA PREENCHIMENTO DE RETORNO DAS CONSULTAS #####*/
$_SESSION['target'] = "../formularios/atualizacaoCad.php";
if(isset($_SESSION['bdlogado']))
{
    $perfil = $_SESSION['bdlogado'];
}else{
    echo "<script>window.location.replace(\"../index.php\")</script>";
}
require "../sqlCon/Consulta_R_I.php";
/*########################### Dados do requerente ################################*/
echo "
    <div class='container-fluid'>
";        
        echo "
            <div class='menuSuperior'><!--Botão de acesso ao menu lateral e titulo da tela principal-->
                <table>
                    <tr>
                        <td id='t1'><a href='../cadgeral.php'><img src='../img/btn-home.png' width='50px' heigth='60px' alt='logo' class='botaoVoltar'></a></td>
                        <td id='t2AtuCad'><h4>PREENCHIMENTO DE CERTIDÃO DE ATUALIZAÇÃO DE DADOS CADASTRAIS</h4></td>
                        <td id='t3'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                    </tr>
                </table>
                <label id='logado' name='logado' class='lblPerfil'>$perfil</label>
            </div>
        ";
        echo "
        <form id='formBuscaCad' action='../sqlCon/rota.php' method='post'>    
            <div id='npVision' class='trasferirDados position-absolute'><!--captura e transfere os dados para realização da consulta de imóveis-->
                <input type='text' id='ncad7' name='ncadI1' size='16' maxlength='16' value=''>
            </div>
        </form>
        <form id='formBuscaCPF' action='../sqlCon/rota.php' method='post'>
            <div id='npVision' class='trasferirDados position-absolute'><!--Abertura da div busca requerente-->
                <input type='text' id='receptor' name='cpfR1' size='14' maxlength='14' value=''>
            </div>
        </form>
        <form id='Submit_Print' action='../act/impressao.php' method='post' class='form-control-inline'>
            <div class='reg_requerente background1'><!--Abertura da div requerente-->
                <div class='input-group input-group-sm mb-0 busca_requerente'><!--Abertura da div busca requerente-->   
                    <h4 class='titleR'>Dados do Requerente</h4>    
                    <span class='input-group-text toggle conCPF_txt position-static' id='inputGroup-sizing-sm'>Buscar Requerente por CPF</span>
                    <input type='text' id='cpf4' name='transferCpf' size='14' maxlength='20' class='form-control pesq_cpf position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <input type='button' value='Carregar dados' class='btn btn-outline-light buscaCPF2 position-static' onClick='Submit_BuscaCPF()'>
                    <label id='edt_id' name='edt_id' class='edt_id'>$codigo_edt</label>
                </div>
                <div class='input-group input-group-sm mb-0 title1 position-static'>
                    <label id='status_busca' name='status_busca' class='retornoBusca'>$texto</label>
                </div>
                    <div class='input-group input-group-sm mb-0 inp1 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Nome Requerente</span>
                    <input type='text' id='nome' name='nomeR' value='$nome' class='form-control i1 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
                <div class='input-group input-group-sm mb-0 inp2 position-static'>
                    <span class='input-group-text toggle position-static' id='inputGroup-sizing-sm'>N° do CPF</span>
                    <input type='text' id='cpf' name='cpfR' size='14' maxlength='20' value='$cpf' class='form-control i2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do RG</span>
                    <input type='text' id='rg' name='rgR' size='12' maxlength='12' value='$rg' class='form-control i3 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Telefone Fixo</span>
                    <input type='text' id='telefone' name='telR' size='16' maxlength='14' value='$telefone' class='form-control i4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Celular</span>
                    <input type='text' id='celular' name='celR' size='17' maxlength='16' value='$celular' class='form-control i5 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
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
                    <input type='text' id='uf' name='ufR' value='$estado' class='form-control i11 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            </div><!--Fechamento da div requerente-->
        <p>
    ";
/*########################### Dados do Imóvel ################################*/
    echo "
        <div class='reg_imovel background2'><!--Abertura da div imovel-->
            <div class='input-group input-group-sm mb-0 busca_imovel'><!--Abertura da div busca imovel-->
                <h4 class='titleI'>Dados do Imóvel</h4>    
                <span class='input-group-text conCAD_txt position-static' id='inputGroup-sizing-sm'>Buscar Imóvel por N° de Cadastro</span>
                <input type='text' id='transferCad' name='transferCad' size='16' maxlength='16' value='' class='form-control pesq_cad position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                <input type='button' value='Carregar dados' class='btn btn-outline-light buscaCAD2 position-static' onClick='Submit_BuscaCAD()'>
                <label id='edtI_id' name='edtI_id' class='edtI_id'>$codigo_edtI</label>
            </div>
            <div class='input-group input-group-sm mb-0 inp01 position-static'> 
                <label id='status_buscaI' name='status_buscaI' class='retornoBuscaI'>$textoI</label>
            </div>
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
        </div><!--Fechamento da div imovel-->
    <p>";
/*########################### Dados do Individuais ################################*/
echo "
        <div class='dadosNPro background3'>
            <div class='input-group input-group-sm mb-0 inp9 position-static'>    
                <h4 class='titleB'>Dados da alteração cadastral</h4>
                <span class='input-group-text buscaCEP3 position-static' id='inputGroup-sizing-sm'>Buscar novo endereço por CEP</span>
                <input type='text' id='buscaCEPX' name='buscaCEPX' value='$cepN' size='20' maxlength='10' class='form-control d1 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='input-group input-group-sm mb-0 inp10 position-static'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Novo Proprietário/Responsável</span>
                <input type='text' id='nomeR' name='nomeN' value='$nomeN' class='form-control d2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='input-group input-group-sm mb-0 inp11 position-static'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do CPF</span>
                <input type='text' id='cpf3' name='cpfN' value='$cpfN' size='14' maxlength='14' class='form-control d3 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do RG</span>
                <input type='text' id='rg3' name='rgN' value='$rgN' size='12' maxlength='12' class='form-control d4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='input-group input-group-sm mb-0 inp12 position-static'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Endereço Tributário</span>
                <input type='text' id='enderecoN' name='endN' value='$enderecoN' class='form-control d5 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Número</span>
                <input type='text' id='numeroN' name='numN' value='$numeroN' size='5' maxlength='5' class='form-control d6 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Bairro</span>
                <input type='text' id='bairroN' name='bairroN' value='$bairroN' class='form-control d7 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='input-group input-group-sm mb-0 inp13 position-static'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Cidade</span>
                <input type='text' id='cidadeN' name='cidN' value='$cidN' class='form-control d8 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                <label class='input-group-text position-static' for='inputGroupSelect02 ufCad'>Estado</label>
                <select class='form-select d9 position-static' id='inputGroupSelect02' name='ufN'>
                    <option selected>$ufN</option>
                    <option value='AC'>Acre</option>
                    <option value='AL'>Alagoas</option>
                    <option value='AP'>Amapá</option>
                    <option value='AM'>Amazonas</option>
                    <option value='BA'>Bahia</option>
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
                <input type='text' id='motivo' name='className' value='ATUALIZAÇÃO DOS DADOS CADASTRAIS' class='motivo'></input>
            </div>
            <div class='input-group input-group-sm mb-0 inp11 txtArea2 position-static'>
                <div class='form-floating'>
                    <textarea class='form-control k4 position-static' name='coments' id='floatingTextarea2 comentarios' style='height: 100px'>$obs</textarea>
                    <label for='floatingTextarea2'>Observações</label>
                </div>
                <div id='buttonPRT'><button type='button' class='btn btn-outline-light atualPos' onClick=\"Print_Sub()\">IMPRIMIR</button></div>
            </div>
            <!--################# Chamando jquery que faz a busca do Endereço por CEP #############-->
            <script type=\"text/javascript\">
            $(\"#buscaCEPX\").focusout(function(){
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
                        $(\"#enderecoN\").val(resposta.logradouro);
                        $(\"#bairroN\").val(resposta.bairro);
                        $(\"#cidadeN\").val(resposta.localidade);
                        $(\"#inputGroupSelect02\").val(resposta.uf);
                        //Vamos incluir para que o Número seja focado automaticamente
                        //melhorando a experiência do usuário
                        $(\"#numeroN\").focus();
                    }
                });
            });
            </script>
            <!--######################################################################################-->
        </div>
    </form>";
echo "
    </div>
";
rodape();
?>
        
        
        
        
        