<?php
//importa o arquivo de configuração da conexão do mysql.
require "../sqlCon/conect.php";

//importa as funções cabeçalho, rodape e menu.
require "../func/funcoes.php";

//Abrindo Sessão para armazenar dados
session_start();

//chama a função cabeçalho para monta-lo.
cabecalho("Excluindo Imível do Banco", "../css/resposta.css");

if(isset($_SESSION['Imovel']))
{
    $codigo = $_SESSION['Imovel'];

    //Prepara o caminho para excluir
    $delete = $pdo->prepare("DELETE from imovel where id_imovel= :codigo");

    //Vincula o label com a variável
    $delete->bindValue(':codigo', $codigo);

    //Execute o camando
    if($delete->execute())
    {
        echo "<div id='acc_resposta' class='container'>
                <H1>Imóvel excluido com sussesso.</H1>";
                session_destroy();
                echo "<a href='javascript:window.location.replace(\"../cadgeral.php\");'>
                        <input type='button' value='Voltar a tela de cadastro'></a>";
                echo "</div>";
    }else{
        echo "<div id='acc_resposta' class='container'>
                <H1>Erro ao excluir.</H1>";
                session_destroy();
                echo "<a href='javascript:window.location.replace(\"../cadgeral.php\");'>
                        <input type='button' value='Voltar a tela de cadastro'></a>";
                echo "</div>";
    }
}else{
    session_destroy();
    echo "<script>window.location.replace(\"../cadgeral.php\")</script>";
}

rodape();
?>