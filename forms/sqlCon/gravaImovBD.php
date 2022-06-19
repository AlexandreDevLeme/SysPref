<?php
//importa o arquivo de configuração da conexão do mysql.
require "../sqlCon/conect.php";

//importa as funções cabeçalho, rodape e menu.
require "../func/funcoes.php";

//Abrindo Sessão para armazenar dados
session_start();

//chama a função cabeçalho para monta-lo.
cabecalho("Inserindo novos dados no Banco", "../css/resposta.css");

//Recebendo valores do formulario.
if (isset($_SESSION['Imovel'])) {
    $codigoRef    = $_SESSION['Imovel'];
    $rua          = $_SESSION['Rua'];
    $numero       = $_SESSION['Numero'];
    $bairro       = $_SESSION['Bairro'];
    $lote         = $_SESSION['Lote'];
    $quadra       = $_SESSION['Quadra'];
    $cadastro     = $_SESSION['Cadastro'];
    $proprietario = $_SESSION['Proprietario'];

    //Prepara o caminho para excluir
    $comando = "UPDATE imovel set rua=:rua, numero=:numero, bairro=:bairro, lote=:lote, quadra=:quadra, n_cad=:cadastro, proprietario=:proprietario where id_Imovel=:codigoRef";
    $update = $pdo->prepare($comando);

    //Vincula o label com a variável
    $update->bindValue(':codigoRef', $codigoRef);
    $update->bindValue(':rua', $rua);
    $update->bindValue(':numero', $numero);
    $update->bindValue(':bairro', $bairro);
    $update->bindValue(':lote', $lote);
    $update->bindValue(':quadra', $quadra);
    $update->bindValue(':cadastro', $cadastro);
    $update->bindValue(':proprietario', $proprietario);

    //Execute o camando
    if($update->execute())
    {
        echo "<div id='acc_resposta' class='container'>
        <H1>Cadastro alterado com sussesso.</H1>";
        unset($_SESSION['Imovel']);
        unset($_SESSION['Rua']);
        unset($_SESSION['Numero']);
        unset($_SESSION['Bairro']);
        unset($_SESSION['Lote']);
        unset($_SESSION['Quadra']);
        unset($_SESSION['Cadastro']);
        unset($_SESSION['Proprietario']);
        echo "<a href='javascript:window.location.replace(\"../cadgeral.php\");'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
        echo "</div>";
    }else
    {
        echo "<div id='err_resposta' class='container'>
        <H1>Erro ao alterar o cadastro.</H1><br>";
        echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de alteração'></a>";
            exit;
        echo "</div>";
    }
}else{
    echo "<script>window.location.replace(\"../cadgeral.php\")</script>";
}

rodape();
?>