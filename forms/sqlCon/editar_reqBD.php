<?php
//importa o arquivo de configuração da conexão do mysql.
require "../sqlCon/conect.php";

//importa as funções cabeçalho, rodape e menu.
require "../func/funcoes.php";

//Abrindo Sessão para armazenar dados
session_start();

//verifica se ha um usuario logado.
require "./checkLogin.php";

//chama a função cabeçalho para monta-lo.
cabecalho("Alterando dados do Banco", "../css/cadgeral.css");

$_SESSION['target'] = "./editar_reqBD.php";

    $codigo = "";
    $nome = "";
    $cpf = "";
    $rg = "";
    $telefone = "";
    $celular = "";
    $endereco = "";
    $numero = "";
    $complemento = "";
    $bairro = "";
    $cep = "";
    $cidade = "";
    $estado = "";

if (!empty($_SESSION['Requerente'])) {
$codigoRef = $_SESSION['Requerente'];

$consulta = $pdo->prepare("SELECT * FROM requerente where id_Requerente=:codigoRef");

$consulta->bindValue(':codigoRef', $codigoRef);
$consulta->execute();

//Busca as informações do Banco de Dados
while ($row = $consulta->fetch(PDO::FETCH_ASSOC))
{
    //Recebendo valores do formulario
    $codigo = $row['id_Requerente'];
    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $rg = $row['rg'];
    $telefone = $row['tel'];
    $celular = $row['cel'];
    $endereco = $row['endereco'];
    $numero = $row['numero'];
    $complemento = $row['complemento'];
    $bairro = $row['bairro'];
    $cep = $row['cep'];
    $cidade = $row['cidade'];
    $estado = $row['estado'];
}

    //Monta o form com os dados
    echo "
        <div class='container-fluid'>
    ";
    echo "
            <div class='menuSuperior'><!--Botão de acesso ao menu lateral e titulo da tela principal-->
                <table>
                    <tr>
                        <td id='t1edt'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                        <td id='t2edt'><h4>ALTERAÇÃO DE DADOS DO REQUERENTE</h4></td>
                        <td id='t3edt'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                    </tr>
                </table>
                <label id='logado' name='logado' class='lblPerfilEDT'>$perfil</label>
            </div>
    ";
    echo "
            <div class='reg_requerente'>
                <form id='formCadReq' action='rota.php' method='post'><!-- FORM QUE ENVIDA OS DADOS PARA CADASTRAR O REQUERENTE -->
                    <div class='input-group input-group-sm mb-0 inp01 position-static'>    
                        <h4 class='titleR'>Dados do Requerente</h4>
                        <label id='status_busca' name='status_busca' class='retornoBusca'></label><!-- RETORNO DA PESQUISA DE REQUERENTES -->
                        <label name='codigoEdtReqBD' value='$codigo' class='npVision'></label>
                        <span class='input-group-text BuscaCEPReq position-static' id='inputGroup-sizing-sm'>Buscar endereço por cep</span>
                        <input type='text' id='cep' name='cepR' size='20' maxlength='10' value='$cep' class='form-control i9 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    </div>

                    <div class='input-group input-group-sm mb-0 inp1 position-static'>
                        <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Nome Requerente</span>
                        <input type='text' id='nomeR' name='nomeR' value='$nome' class='form-control i1 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Digite o nome do contribuinte.'>
                    </div>

                    <div class='input-group input-group-sm mb-0 inp2 position-static'>
                        <span class='input-group-text toggle position-static' id='inputGroup-sizing-sm'>N° do CPF</span>
                        <input type='text' id='cpf' name='cpfR' size='14' maxlength='14' value='$cpf' class='form-control i2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                        <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do RG</span>
                        <input type='text' id='rg' name='rgR' size='16' maxlength='16' value='$rg' class='form-control i3 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
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
                    <div class='btn1'>
                        <input type='button' value='Gravar novos dados' class='btn btn-outline-light grava' onClick='Submit_FormReq()'>
                        <a href='../cadgeral.php' class='btn btn-outline-light apaga'>Cancelar e Voltar a tela Inicial</a>
                    </div>
                </div>
            </form>
    ";
    echo "
        </div>
    ";
}else{
    echo "<div id='err_resposta' class='container'>
                <h1>Você clicou no botão antes de realizar a consulta</h1><br>
                <h1>ou</h1><br>
                <h1>Não foi localizado o código do requerente.</h1>";
    echo "<a href='javascript:window.history.back();'>
            <input type='button' value='Voltar a tela de cadastro'></a>";
        exit;
    echo "</div>";
}
rodape();
?>