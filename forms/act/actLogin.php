<?php
require "../func/funcoes.php";
require "../sqlCon/conect.php";

session_start();

cabecalho("Logando no sistema de cadastro", "../css/resposta.css","");

$login_name = $_POST['user'];
$senha = $_POST['pass'];
$_SESSION['nome'] = $login_name;
$_SESSION['password'] = $senha;

$sql = $pdo->prepare("SELECT * FROM acesso where username=:login_name");
$sql->bindValue(':login_name', $login_name);
$sql->execute();

while ($row = $sql->fetch(PDO::FETCH_ASSOC))
    {
        $_SESSION['bdnome']=$row['username'];
        $_SESSION['bdpassword']=$row['userpass'];
        $_SESSION['bdlogado']="Operador logado: ".$row['nome'];
        $_SESSION['operador']="Emitido por: ".$row['nome'];
    }

if(isset($_SESSION['bdnome']))
{
    if ($login_name == $_SESSION['bdnome'] && $senha == $_SESSION['bdpassword'])
    {
    
        unset($_SESSION['bdnome']);
        unset($_SESSION['bdpassword']);

        /*Script para chamar nova pagina*/
        echo "<script language=\"JavaScript\">
        window.location=\"../cadgeral.php\";
        </script>";
        exit;

    }else{

        session_destroy();

        echo "<div id='err_resposta' class='container'>
            <H2>Nome de usuário ou senha incorretos!<br>Dica: Verificque se não esqueceu algum número ou se a tecla CAPSLOOK esta ativada.</H2><br>";
            echo "<a href='javascript:window.location=\"../../index.php\";'>
                <input type='button' value='Voltar a tela de login'></a>";
            exit;
        echo "</div>";
    }
}else{

  session_destroy();

  echo "<div id='err_resposta' class='container'>
    <H2>Erro!<br>Não foi possível realizar o login.<br>Não existe cadastro com o nome de usuário: $login_name.<br>Código do erro: sql.notRETURN</H2><br>";
    echo "<a href='javascript:window.location=\"../../index.php\";'>
        <input type='button' value='Voltar a tela de login'></a>";
    exit;
  echo "</div>"; 

}
?>