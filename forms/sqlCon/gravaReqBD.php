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
if (isset($_SESSION['Requerente'])) {
    $codigoRef = $_SESSION['Requerente'];
    $nome      = $_SESSION['nome'];
    $cpf       = $_SESSION['cpf'];
    $rg        = $_SESSION['rg'];
    $telefone  = $_SESSION['tel'];
    $celular   = $_SESSION['cel'];
    $endereco  = $_SESSION['end'];
    $numero    = $_SESSION['num'];
    $bairro    = $_SESSION['bairro'];
    $cep       = $_SESSION['cep'];
    $cidade    = $_SESSION['cid'];
    $estado    = $_SESSION['uf'];

    //Prepara o caminho para excluir
    $comando = "UPDATE requerente set nome=:nome, cpf=:cpf, rg=:rg, tel=:telefone, cel=:celular, endereco=:endereco, numero=:numero, bairro=:bairro, cep=:cep, cidade=:cidade, estado=:estado where id_Requerente=:codigoRef";
    $update = $pdo->prepare($comando);

    //Vincula o label com a variável
    $update->bindValue(':codigoRef', $codigoRef);
    $update->bindValue(':nome', $nome);
    $update->bindValue(':cpf', $cpf);
    $update->bindValue(':rg', $rg);
    $update->bindValue(':telefone', $telefone);
    $update->bindValue(':celular', $celular);
    $update->bindValue(':endereco', $endereco);
    $update->bindValue(':numero', $numero);
    $update->bindValue(':bairro', $bairro);
    $update->bindValue(':cep', $cep);
    $update->bindValue(':cidade', $cidade);
    $update->bindValue(':estado', $estado);

    //Execute o camando
    if($update->execute())
    {
        echo "<div id='acc_resposta' class='container'>
        <H1>Cadastro alterado com sussesso.</H1>";
        unset($_SESSION['Requerente']);
        unset($_SESSION['rg']);
        unset($_SESSION['tel']);
        unset($_SESSION['cel']);
        unset($_SESSION['end']);
        unset($_SESSION['num']);
        unset($_SESSION['complemento']);
        unset($_SESSION['bairro']);
        unset($_SESSION['cep']);
        unset($_SESSION['cid']);
        unset($_SESSION['uf']);
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