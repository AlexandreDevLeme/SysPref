<?php
//importa o arquivo de configuração da conexão do mysql.
/*require "./adm_conect.php";*/

//importa as funções cabeçalho, rodape e menu.
require "../func/funcoes.php";

//Abrindo Sessão para armazenar dados
session_start();

//Arquivo para criar conexão com Banco de Dados MySQL.
$svr_adm_lg = $_SESSION["server_lg"];
$svr_adm_pss = $_SESSION["server_pss"];

//Usa PDO para fazer a conexão.
$pdo = new PDO('mysql:host=localhost;dbname=sysprefbd',$svr_adm_lg,$svr_adm_pss,array(PDO::ATTR_PERSISTENT => true));

//$pdo --> objeto da classe PDO que usaremos para conexão.
//mysql:host = localhost; --> (Mysql local).
//dbname=bdcadastro --> (banco de dados dentro do Mysql, criado anteriormente).
//'root' --> usuário dentro do Mysql para fazer a conexão.
//'' --> senha em branco do usuário root.
//array(PDO::ATTR_PERSISTENT => true)); --> conexão permanente.

//Habilita a exibição de erros.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//chama a função cabeçalho para monta-lo.
cabecalho("Gravando dados no Banco", "../css/resposta.css");

//Recebendo valores do formulario
if(!empty($_SESSION["adm_name"])){
    $novoADM = $_SESSION["adm_name"];
    $novaSenha = $_SESSION["adm_pss"];

    //Verificamdo campos do Requerente
    verificaAdm("adm_name", $novoADM);
    verificaAdm("adm_pss", $novaSenha);
}

if (isset($_SESSION['adm_name'])) {

    $verificaADM = "admintest";
    if(!empty($novoADM)){
        $compare = $pdo->prepare("SELECT * from acessoadm where username = :novoADM");
        $compare->bindValue(':novoADM', $novoADM);
        $compare->execute();

        while($dados = $compare->FETCH(PDO::FETCH_ASSOC)){
            $verificaADM = "$dados[username]";
        }
    }

    if ($verificaADM != $novoADM) {

        //Verifica ataque XSS
        $novoADM = htmlentities($novoADM);
        $novaSenha = htmlentities($novaSenha);

        //Comando SQL que insere na tabela clientes.
        $insert = $pdo->prepare("insert into acessoadm values (:id_adm,:username,:userpass,:nivel)");

        //Vincula as labels com as variáveis vindas do form.
        $insert->bindValue(':id_adm', 0);
        $insert->bindValue(':username', $novoADM);
        $insert->bindValue(':userpass', $novaSenha);
        $insert->bindValue(':nivel', 1);

            //Tenta executar o insert no banco de dados.
            if($insert->execute())
            {
                echo "<div id='acc_resposta' class='container'>
                <H1>Novo administrador cadastrado com sussesso</H1>";
                session_destroy();
                echo "<a href='javascript:window.location.replace(\"../act/cad_admin.php\");'>
                        <input type='button' value='Voltar a tela de cadastro'></a>";
                echo "</div>";
            }else
            {
                echo "<div id='err_resposta' class='container'>
                <H1>Erro ao cadastrar</H1><br>";
                session_destroy();
                echo "<a href='javascript:window.history.back();'>
                        <input type='button' value='Voltar a tela de cadastro'></a>";
                    exit;
                echo "</div>";
            }

    }else{
        echo "<div id='err_resposta' class='container'>
        <h1>Já existe um registro com o nome de usuário informado.<br>Escolha um nome de usuário diferente.</h1><br>";
        echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }

}
?>