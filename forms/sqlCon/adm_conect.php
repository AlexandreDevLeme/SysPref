<?php
session_start();
//Arquivo para criar conexão com Banco de Dados MySQL.
$svr_adm_lg = $_SESSION["server_lg"];
$svr_adm_pss = $_SESSION["server_pss"];

//Usa PDO para fazer a conexão.
$pdo = new PDO('mysql:host=localhost;dbname=sysprefbd', $svr_adm_lg, $svr_adm_pss, array(PDO::ATTR_PERSISTENT => true));

//$pdo --> objeto da classe PDO que usaremos para conexão.
//mysql:host = localhost; --> (Mysql local).
//dbname=bdcadastro --> (banco de dados dentro do Mysql, criado anteriormente).
//'root' --> usuário dentro do Mysql para fazer a conexão.
//'' --> senha em branco do usuário root.
//array(PDO::ATTR_PERSISTENT => true)); --> conexão permanente.

//Habilita a exibição de erros.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_destroy();
?>