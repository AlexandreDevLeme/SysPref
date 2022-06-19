<?php
    require "../func/funcoes.php";
    require "./conect.php";
    
    session_start();

    cabecalho("Redirecionamento", "../css/resposta.css");

    
    $paginaAlvo = $_SESSION['target'];//SELECIONA O DIRETÓRIO DO ARQUIVO QUE SOLICITOU UMA AÇÃO DA ROTA

    if(!empty($_POST['cpfR'])){//PREENCHE OS CAMPOS DO FORMULARIO PARA EDIÇÃO DE CADASTRO DE REQUERENTE
        $nome = $_POST['nomeR'];
            $_SESSION['nome']="$nome";
        $cpf = $_POST['cpfR'];
            $_SESSION['cpf']="$cpf";
        $rg = $_POST['rgR'];
            $_SESSION['rg']="$rg";
        $telefone = $_POST['telR'];
            $_SESSION['tel']="$telefone";
        $celular = $_POST['celR'];
            $_SESSION['cel']="$celular";
        $endereco = $_POST['endR'];
            $_SESSION['end']="$endereco";
        $numero = $_POST['numR'];
            $_SESSION['num']="$numero";
        $complemento = $_POST['complementoR'];
            $_SESSION['complemento']="$complemento";
        $bairro = $_POST['bairroR'];
            $_SESSION['bairro']="$bairro";
        $cep = $_POST['cepR'];
            $_SESSION['cep']="$cep";
        $cidade = $_POST['cidR'];
            $_SESSION['cid']="$cidade";
        $estado = $_POST['ufR'];
            $_SESSION['uf']="$estado";
    }elseif(!empty($_POST['ncad1'])){//PREENCHE OS CAMPOS DO FORMULARIO PARA EDIÇÃO DE CADASTRO DE IMÓVEIS
        $rua = $_POST['rua'];
            $_SESSION['Rua']="$rua";
        $numero = $_POST['num'];
            $_SESSION['Numero']="$numero";
        $bairro = $_POST['vila'];
            $_SESSION['Bairro']="$bairro";
        $lote = $_POST['lote'];
            $_SESSION['Lote']="$lote";
        $quadra = $_POST['quadra'];
            $_SESSION['Quadra']="$quadra";
        $cadastro = $_POST['ncad1'];
            $_SESSION['Cadastro']="$cadastro";
        $nome = $_POST['nome'];
            $_SESSION['Proprietario']="$nome";

    }elseif(isset($_POST['cpfR1'])){ // PESQUISAR REQUERENTES CADASTRADOS EM TODOS OS FORMULARIOS
        $documento = $_POST['cpfR1'];
        //$paginaAlvo = $_SESSION['target'];

        $sql = $pdo->prepare("SELECT * FROM requerente where cpf=:documento");
        $sql->bindValue(':documento', $documento);
        $sql->execute();

        //Busca as informações do Banco de Dados
        while ($row = $sql->fetch(PDO::FETCH_ASSOC))
        {
        $_SESSION['cpf']=$row['cpf'];
        }
        
        if(isset($_SESSION['cpf'])){
            $_SESSION['resultado']="Busca realizada com sussesso!";
            echo "<script>window.location.replace(\"$paginaAlvo\")</script>";
            exit;
        }else{
            $_SESSION['resultado']="Não foram encontrados dados para o CPF informado!";
            echo "<script>window.location.replace(\"$paginaAlvo\")</script>";
            exit;
        }
    }elseif(isset($_POST['ncadI1'])){// PESQUISAR IMOVEIS CADASTRADOS EM TODOS OS FORMULARIOS
        $n_cadastro = $_POST['ncadI1'];

        $sql = $pdo->prepare("SELECT * FROM imovel where n_cad=:n_cadastro");
        $sql->bindValue(':n_cadastro', $n_cadastro);
        $sql->execute();

        //Busca as informações do Banco de Dados
        while ($row = $sql->fetch(PDO::FETCH_ASSOC))
        {
        $_SESSION['cadastro']=$row['n_cad'];
        }


        
        if(isset($_SESSION['cadastro'])){
            $_SESSION['resultadoI']="Busca realizada com sussesso!";
            echo "<script>window.location.replace(\"$paginaAlvo\")</script>";
            exit;
        }else{
            $_SESSION['resultadoI']="Não foram encontrados dados para o Cadastro informado!";
            echo "<script>window.location.replace(\"$paginaAlvo\")</script>";
            exit;
        }
    }elseif(isset($_POST['svr_lg'])){ // GRAVAR DADOS ENVIADOS PELO USUARIO NA SESSAO - USADO NO CADASTRO DE NOVOS ADMs
        $_SESSION['registro'] = "Acesso de ADM";
        $_SESSION['server_lg'] = $_POST['svr_lg'];
        
        if(!empty($_POST['svr_pss']))
        {
            $_SESSION['server_pss'] = $_POST['svr_pss'];
        }else{
            $_SESSION['server_pss'] = "";
        }
        
        $_SESSION['adm_name'] = $_POST['new_nameADM'];
        $_SESSION['adm_pss'] = $_POST['new_passADM'];
        
        echo "<script>window.location.replace(\"./add_adm_user.php\")</script>";
        exit;
    }elseif (isset($_POST['nameADM'])) { // VERIFICAÇAO E VALIDAÇÃO DE LOGIN DE ADMs
        
        $Autenticador = $_POST['nameADM'];
        $Seguranca = $_POST['passADM'];

        $verificaADM = "admintest";
        $verificaPASS = "admintest";
        if(!empty($Autenticador)){
            $compare = $pdo->prepare("SELECT * from acessoadm where username = :Autenticador");
            $compare->bindValue(':Autenticador', $Autenticador);
            $compare->execute();
    
            while($dados = $compare->FETCH(PDO::FETCH_ASSOC)){
                $verificaADM = "$dados[username]";
                $verificaPASS = "$dados[userpass]";
            }
        }
        if ($verificaADM == $Autenticador && $verificaPASS == $Seguranca) // SE OS DADOS DE LOGIN DO ADM ESTIVEREM OK, CHAMA O FORMULARIO DE CADASTRO DE USUARIOS
        {
            echo "<script>window.location.replace(\"../act/form_cad_SystemUsers.php\")</script>";
            exit;
        }else{
            echo "<div id='err_resposta' class='container'>
                <H1>Nome de usuário ou senha incorretos.</H1><br>";
                session_destroy();
                echo "<a href='javascript:window.history.back();'>
                        <input type='button' value='Voltar a tela de Acesso'></a>";
                    exit;
            echo "</div>";
        }
    }

    /* ############################################################################################################################ */
    
    if(isset($_GET['codigoReqEdt'])){ // ENVIA O CODIGO DO REQUERENTE PARA O FORMULARIO DE EDIÇAO CARREGAR OS DADOS
        $codigo = $_GET['codigoReqEdt'];
        $_SESSION['Requerente']="$codigo";

        echo "<script>window.location.replace(\"editar_ReqBD.php\")</script>";
        exit;

    }elseif(isset($_GET['codigoReqEx'])){ // ENVIA O CODIGO DO REQUERENTE PARA O FORMULARIO DE EXCLUSAO DELETAR OS DADOS
        $codigo = $_GET['codigoReqEx'];
        $_SESSION['Requerente']="$codigo";
        
        echo "<script>window.location.replace(\"excluir_reqBD.php\")</script>";
        exit;

    }elseif(isset($_GET['codigoImEdt'])){ // ENVIA O CODIGO DO IMOVEL PARA O FORMULARIO DE EDIÇAO CARREGAR OS DADOS
        $codigo = $_GET['codigoImEdt'];
        $_SESSION['Imovel']="$codigo";
        
        echo "<script>window.location.replace(\"editar_ImovBD.php\")</script>";
        exit;

    }elseif(isset($_GET['codigoImEx'])){ // ENVIA O CODIGO DO IMOVEL PARA O FORMULARIO DE EXCLUSAO DELETAR OS DADOS
        $codigo = $_GET['codigoImEx'];
        $_SESSION['Imovel']="$codigo";
        
        echo "<script>window.location.replace(\"excluir_ImovBD.php\")</script>";
        exit;

    }elseif(isset($_SESSION['Requerente'])){ // VERIFICA SE FORAM ESCRITOS OS DADOS NA SESSAO PARA O FORMULARIOS DE CADASTRO GRAVAR O REQUERENTE EDITADO
        
        echo "<script>window.location.replace(\"gravaReqBD.php\")</script>";
        exit;

    }elseif(isset($_SESSION['Imovel'])){ // VERIFICA SE FORAM ESCRITOS OS DADOS NA SESSAO PARA O FORMULARIOS DE CADASTRO GRAVAR O IMÓVEL EDITADO
        
        echo "<script>window.location.replace(\"gravaImovBD.php\")</script>";
        exit;

    }elseif(isset($_SESSION['cpfR'])){
        
        echo "<script>
            window.close();
        </script>";
        exit;

    }else{
        echo "<h1>Nenhum código foi enviado!!!</h1>";
    }

rodape();
?>