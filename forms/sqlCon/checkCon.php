<?php
    
    session_start();

    $dados = "";
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=SysprefBD', 'root', '', array(PDO::ATTR_PERSISTENT => true));
        $conexao->exec("set names utf8");
        $estado = $conexao->prepare('SELECT * FROM serverstatus WHERE id_status=1');
        $estado->execute();

        while($row = $estado->FETCH(PDO::FETCH_ASSOC)){
            $dados = $row['resposta'];
        }

        $_SESSION['Saida_ok']=$dados;
        
    } catch (PDOException $erro) {
        $err_msg = "Erro na conexão:" . $erro->getMessage();
        $dados = "Desconectado";
           $_SESSION['Saida_err']=$dados;
           $_SESSION['sv_err']=$err_msg;
    }
?>