<?php
//importa o arquivo de configuração da conexão do mysql.
require "./conect.php";

//importa as funções cabeçalho, rodape e menu.
require "../func/funcoes.php";

//Abrindo Sessão para armazenar dados
session_start();

//chama a função cabeçalho para monta-lo.
cabecalho("Gravando dados no Banco", "../css/resposta.css");

//Recebendo valores do formulario
if(!empty($_POST['nomeR'])){
    $nome        = $_POST['nomeR'];
    $cpf         = $_POST['cpfR'];
    $rg          = $_POST['rgR'];
    $telefone    = $_POST['telR'];
    $celular     = $_POST['celR'];
    $endereco    = $_POST['endR'];
    $numero      = $_POST['numR'];
    $complemento = $_POST['complementoR'];
    $bairro      = $_POST['bairroR'];
    $cep         = $_POST['cepR'];
    $cidade      = $_POST['cidR'];
    $estado      = $_POST['ufR'];

    //Verificamdo campos do Requerente
    verificaReq("nomeR", $nome);
    verificaReq("cpfR", $cpf);
    verificaReq("celR", $celular);
    verificaReq("endR", $endereco);
    verificaReq("numR", $numero);
    verificaReq("bairroR", $bairro);
    verificaReq("cidR", $cidade);
    verificaReq("ufR", $estado);

}elseif(!empty($_POST['rua'])){
    $rua = $_POST['rua'];
    $num = $_POST['num'];

    if(isset($_POST['lote']))
    {
        $lote = $_POST['lote'];
    }
    if(isset($_POST['quadra']))
    {
        $quadra = $_POST['quadra'];
    }
    
    $vila = $_POST['vila'];
    $cad = $_POST['ncad1'];
    $nomeP = $_POST['nome'];

    //Verificamdo campos do Imóvel
    verificaIM("rua", $rua);
    verificaIM("num", $num);
    verificaIM("vila", $vila);
    verificaIM("ncad1", $cad);
    verificaIM("nome", $nomeP);

}elseif(!empty($_POST['nameUSER'])){
    $_userOP      = $_POST['nameUSER'];
    $_mailOP      = $_POST['mailUSER'];
    $_passOP      = $_POST['passUSER'];
    $_cpassOP     = $_POST['cpassUSER'];
    $_nomeOP      = $_POST['operUSER'];
    $_sobrenomeOP = $_POST['subOperUSER'];
    $_matriculaOP = $_POST['matUSER'];
    $_dtNascOP    = $_POST['dnUSER'];
    $_dtNascOP    = date("Y-m-d",strtotime(str_replace('/','-',$_dtNascOP)));

    //Verificamdo campos do Operador
    verificaCadOP("nameUSER", $_userOP);
    verificaCadOP("mailUSER", $_mailOP);
    verificaCadOP("passUSER", $_passOP);
    verificaCadOP("cpassUSER", $_cpassOP);
    verificaCadOP("operUSER", $_nomeOP);
    verificaCadOP("subOperUSER", $_sobrenomeOP);
    verificaCadOP("matUSER", $_matriculaOP);
    verificaCadOP("dnUSER", $_dtNascOP);
}

if (isset($_SESSION['dadosR'])) {

    $verificaR = "000.000.000-00";
    if(!empty($_POST['cpfR'])){
        $compareR = $pdo->prepare("SELECT * from requerente where cpf = :cpf");
        $compareR->bindValue(':cpf', $cpf);
        $compareR->execute();

        while($dadoR = $compareR->FETCH(PDO::FETCH_ASSOC)){
            $verificaR = "$dadoR[cpf]";
        }
    }

    if ($verificaR != $cpf) {

        //Verifica ataque XSS
        $nome        = htmlentities($nome);
        $cpf         = htmlentities($cpf);
        $rg          = htmlentities($rg);
        $telefone    = htmlentities($telefone);
        $celular     = htmlentities($celular);
        $endereco    = htmlentities($endereco);
        $numero      = htmlentities($numero);
        $complemento = htmlentities($complemento);
        $bairro      = htmlentities($bairro);
        $cep         = htmlentities($cep);
        $cidade      = htmlentities($cidade);
        $estado      = htmlentities($estado);

        //Comando SQL que insere na tabela clientes.
        $insert = $pdo->prepare("insert into requerente values (:id_Requerente,:nome,:cpf,:rg,:tel,:cel,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado)");

        //Vincula as labels com as variáveis vindas do form.
        $insert->bindValue(':id_Requerente', 0);
        $insert->bindValue(':nome', $nome);
        $insert->bindValue(':cpf', $cpf);
        $insert->bindValue(':rg', $rg);
        $insert->bindValue(':tel', $telefone);
        $insert->bindValue(':cel', $celular);
        $insert->bindValue(':endereco', $endereco);
        $insert->bindValue(':numero', $numero);
        $insert->bindValue(':complemento', $complemento);
        $insert->bindValue(':bairro', $bairro);
        $insert->bindValue(':cep', $cep);
        $insert->bindValue(':cidade', $cidade);
        $insert->bindValue(':estado', $estado);

            //Tenta executar o insert no banco de dados.
            if($insert->execute())
            {
                echo "<div id='acc_resposta' class='container'>
                <H1>Requerente cadastrado com sucesso</H1>";
                unset($_SESSION['dadosR']);
                echo "<a href='javascript:window.location.replace(\"../cadgeral.php\");'>
                        <input type='button' value='Voltar a tela de cadastro'></a>";
                echo "</div>";
            }else
            {
                echo "<div id='err_resposta' class='container'>
                <H1>Erro ao cadastrar</H1><br>";
                echo "<a href='javascript:window.history.back();'>
                        <input type='button' value='Voltar a tela de cadastro'></a>";
                    exit;
                echo "</div>";
            }

    }else{
        echo "<div id='err_resposta' class='container'>
        <h1>Já existe um registro com o CPF: $cpf.</h1><br>";
        echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }

}elseif(isset($_SESSION['dadosI'])){

    $verificaI = "00.0000.0000.000";
    if(!empty($_POST['ncad1'])){
        $compareI = $pdo->prepare("SELECT * from imovel where n_cad = :cad");
        $compareI->bindValue(':cad', $cad);
        $compareI->execute();

        while($dadoI = $compareI->FETCH(PDO::FETCH_ASSOC)){
            $verificaI = "$dadoI[n_cad]";
        }
    }

    if ($verificaI != $cad) {

    //Verifica ataque XSS
    $rua    = htmlentities($rua);
    $num    = htmlentities($num);
    $lote   = htmlentities($lote);
    $quadra = htmlentities($quadra);
    $vila   = htmlentities($vila);
    $cad    = htmlentities($cad);
    $nomeP  = htmlentities($nomeP);
    
    //Comando SQL que insere na tabela clientes.
    $insert = $pdo->prepare("insert into imovel (id_imovel,n_cad,rua,numero,lote,quadra,bairro,proprietario) values (:id_imovel,:n_cad,:rua,:numero,:lote,:quadra,:vila,:proprietario)");
    
    //Vincula as labels com as variáveis vindas do form.
    $insert->bindValue(':id_imovel', 0);
    $insert->bindValue(':n_cad', $cad);
    $insert->bindValue(':rua', $rua);
    $insert->bindValue(':numero', $num);
    $insert->bindValue(':lote', $lote);
    $insert->bindValue(':quadra', $quadra);
    $insert->bindValue(':vila', $vila);
    $insert->bindValue(':proprietario', $nomeP);
    
        //Tenta executar o insert no banco de dados.
        if($insert->execute())
        {
            echo "<div id='acc_resposta' class='container'>
            <H1>Imóvel cadastrado com sucesso.</H1>";
            unset($_SESSION['dadosI']);
            echo "<a href='javascript:window.location.replace(\"../cadgeral.php\");'>
                    <input type='button' value='Voltar a tela de cadastro'></a>";
                exit;
            echo "</div>";
        }else
        {
            echo "<div id='err_resposta' class='container'>
            <H1>Erro ao cadastrar.</H1>";
            echo "<a href='javascript:window.history.back();'>
                    <input type='button' value='Voltar a tela de cadastro'></a>";
                exit;
            echo "</div>";
        }

    }else{
        echo "<div id='err_resposta' class='container'>
        <h1>Já existe um registro com o Número de cadastro: $cad.</h1><br>";
        echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }

}elseif(isset($_SESSION['dadosOP'])){
    
    $verificaOP = "00000000";
    if(!empty($_POST['matUSER'])){
        $compareOP = $pdo->prepare("SELECT * from acesso where matricula = :_matriculaOP");
        $compareOP->bindValue(':_matriculaOP', $_matriculaOP);
        $compareOP->execute();

        while($dadoOP = $compareOP->FETCH(PDO::FETCH_ASSOC)){
            $verificaOP = "$dadoOP[matricula]";
        }
    }
    if ($verificaOP != $_matriculaOP) {

    //Verifica ataque XSS
    $_userOP      = htmlentities($_userOP);
    $_mailOP      = htmlentities($_mailOP);
    $_passOP      = htmlentities($_passOP);
    $_cpassOP     = htmlentities($_cpassOP);
    $_nomeOP      = htmlentities($_nomeOP);
    $_sobrenomeOP = htmlentities($_sobrenomeOP);
    $_matriculaOP = htmlentities($_matriculaOP);
    $_dtNascOP    = htmlentities($_dtNascOP);
    
    //Comando SQL que insere na tabela clientes.
    $insert = $pdo->prepare("insert into acesso values (:id_usuario,:username,:userpass,:nome,:sobrenome,:matricula,:data_nasc,:email)");
    
    //Vincula as labels com as variáveis vindas do form.
    $insert->bindValue(':id_usuario', 0);
    $insert->bindValue(':username', $_userOP);
    $insert->bindValue(':userpass', $_passOP);
    $insert->bindValue(':nome', $_nomeOP);
    $insert->bindValue(':sobrenome', $_sobrenomeOP);
    $insert->bindValue(':matricula', $_matriculaOP);
    $insert->bindValue(':data_nasc', $_dtNascOP);
    $insert->bindValue(':email', $_mailOP);
    
        //Tenta executar o insert no banco de dados.
        if($insert->execute())
        {
            echo "<div id='acc_resposta' class='container'>
            <H1>Operador cadastrado com sucesso.</H1>";
            unset($_SESSION['dadosOP']);
            echo "<input type='button' value='Sair' class='btn btn-outline-dark botaoSair' onClick=\"fechar_pagina();\">";
                exit;
            echo "</div>";
        }else
        {
            echo "<div id='err_resposta' class='container'>
            <H1>Erro ao cadastrar.</H1>";
            echo "<a href='javascript:window.history.back();'>
                    <input type='button' value='Voltar a tela de cadastro'></a>";
                exit;
            echo "</div>";
        }

    }else{
        echo "<div id='err_resposta' class='container'>
        <h1>Já existe um registro com o Número de cadastro: $_matriculaOP.</h1><br>";
        echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }

}else{
    echo "<div id='err_resposta' class='container'>
    <h1>Nenhuma ação foi realizada.</h1>";
    echo "<a href='javascript:window.history.back();'>
            <input type='button' value='Voltar a tela de cadastro'></a>";
        exit;
    echo "</div>";
}  

rodape();
?>