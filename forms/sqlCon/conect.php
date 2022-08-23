<?php

//Arquivo para criar conexão com Banco de Dados MySQL.
//Usa PDO para fazer a conexão.
if ($pdo = new PDO('mysql:host=localhost;dbname=SysprefBD', 'root', '', array(PDO::ATTR_PERSISTENT => true)))
{
    
}else{

    session_destroy();
  
    echo "<div id='err_resposta' class='container'>
      <H2>Erro!<br>Não foi possível realizar o login.<br>O servidor parece estar OffLine.<br>Código do erro: sql.notRETURN</H2><br>";
      echo "<a href='javascript:window.location=\"../../index.php\";'>
          <input type='button' value='Voltar a tela de login'></a>";
      exit;
    echo "</div>"; 
  
}

//$pdo --> objeto da classe PDO que usaremos para conexão.
//mysql:host = localhost; --> (Mysql local).
//dbname=bdcadastro --> (banco de dados dentro do Mysql, criado anteriormente).
//'root' --> usuário dentro do Mysql para fazer a conexão.
//'' --> senha em branco do usuário root.
//array(PDO::ATTR_PERSISTENT => true)); --> conexão permanente.

//Habilita a exibição de erros.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>