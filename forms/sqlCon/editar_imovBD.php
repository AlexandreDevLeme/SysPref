<?php
//importa o arquivo de configuração da conexão do mysql.
require "../sqlCon/conect.php";

//importa as funções cabeçalho, rodape e menu.
require "../func/funcoes.php";

//Abrindo Sessão para armazenar dados
session_start();

//Verifica se existe um usuário logado
require "./checkLogin.php";

//chama a função cabeçalho para monta-lo.
cabecalho("Alterando dados do Banco", "../css/cadgeral.css");

$_SESSION['target'] = "./editar_imovBD.php";

if (!empty($_SESSION['Imovel'])) {
$codigoRef = $_SESSION['Imovel'];

$consulta = $pdo->prepare("SELECT * FROM imovel where id_imovel= :codigoRef");

$consulta->bindValue(':codigoRef', $codigoRef);
$consulta->execute();

//Busca as informações do Banco de Dados
while ($row = $consulta->fetch(PDO::FETCH_ASSOC))
{
    //Recebendo valores do formulario
    $codigo = $row['id_imovel'];
    $rua = $row['rua'];
    $num = $row['numero'];
    $lote = $row['lote'];
    $quadra = $row['quadra'];
    $vila = $row['bairro'];
    $cad = $row['n_cad'];
    $nomeP = $row['proprietario'];

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
                        <td id='t2edti'><h4>ALTERAÇÃO DE DADOS DO IMÓVEL</h4></td>
                        <td id='t3edt'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                    </tr>
                </table>
                <label id='logado' name='logado' class='lblPerfilEDT'>$perfil</label>
            </div>
    ";
    echo "
            
            <div class='reg_imovel'>
                <div class='input-group input-group-sm mb-0 inp5 position-static'>
                    <h4 class='titleI'>Dados do Imóvel</h4>
                    <label id='status_buscaI' name='status_buscaI' class='retornoBuscaI'></label><!-- RETORNO DA PESQUISA DE IMÓVEIS -->
                    <label name='codigoEdtImBD' value='$codigo' class='npVision'></label>
                    <span class='input-group-text buscaCEP2 position-static' id='inputGroup-sizing-sm'>Buscar rua e bairro por cep</span>
                    <input type='text' id='buscaCEP' name='buscaCEP' class='form-control i18 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            
                <form id='formCadIm' action='./rota.php' method='post'><!-- FORM QUE ENVIDA OS DADOS PARA CADASTRAR O IMÓVEL -->
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
                        <input type='text' id='nomeP' name='nome' value='$nomeP' class='form-control i17 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
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
                    <div class='btn1'>
                        <input type='button' value='Gravar novos dados' class='btn btn-outline-light grava' onClick='Submit_FormIm()'>
                        <a href='../cadgeral.php' class='btn btn-outline-light apaga'>Cancelar e Voltar a tela Inicial</a>
                    </div>
                </form>
            </div>
        </div>
    ";
}else{
    echo "<div id='err_resposta' class='container'>
    <h1>Você clicou no botão antes de realizar a consulta</h1><br>
    <h1>ou</h1><br>
    <h1>Não foi localizado o código do imóvel.</h1>";
    echo "<a href='javascript:window.history.back();'>
            <input type='button' value='Voltar a tela de cadastro'></a>";
        exit;
    echo "</div>";
}
rodape();
?>