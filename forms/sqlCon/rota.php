<?php
    require "../func/funcoes.php";
    require "./conect.php";
    
    session_start();

    cabecalho("Redirecionamento", "../css/resposta.css");

    //GERA O SPLASH PARA ANIMAÇÃO DA TELA DE CARREGAMENTO DE DADOS.
    echo "<div id='err_resposta' class='container'>
          <img src='../img/Loader.gif' width='50px' height='50px'>
          <H2>Aguarde...Carregando.</H2>
          </div>
    ";

    if(isset($_SESSION['target']))//SELECIONA O DIRETÓRIO DO ARQUIVO QUE SOLICITOU UMA AÇÃO DA ROTA
    {
        $paginaAlvo = $_SESSION['target'];
    }

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
    }elseif(isset($_GET['codigoPrint'])){ //CARREGA OS DADOS DA REIMPRESSÃO NO FORMULARIO PARA POSSIBILITAR EDIÇÃO
        $carga = $_GET['codigoPrint'];

        $_SESSION['reimpressao'] = 'RE-IMPRIMIR';

        $recarga = $pdo->prepare("SELECT * FROM atendimentos WHERE num_doc = :carga");
        $recarga->bindValue(':carga', $carga);
        $recarga->execute();

        while ($row = $recarga->fetch(PDO::FETCH_ASSOC)){
            //sleep(1);
            if ($row['documento'] == 'AMPLIAÇÃO')
            {
                $_SESSION['docPrint']       = 'AMPLIAÇÃO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['conforme']       = $row['conf_alvara'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['data']           = $convertDate;
                $_SESSION['fase1']          = $row['const_fase1'];
                $_SESSION['aumento']        = $row['const_add'];
                $_SESSION['total']          = $row['area_const'];
                $_SESSION['obs']            = $row['obs'];
                $paginaAlvo                 = '../formularios/ampliacao.php';

            }elseif ($row['documento'] == 'ATUALIZAÇÃO DOS DADOS CADASTRAIS')
            {
                $_SESSION['docPrint']       = 'ATUALIZAÇÃO DOS DADOS CADASTRAIS';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['nomeN']          = $row['alterar_para'];
                $_SESSION['cpfN']           = $row['cpf_t'];
                $_SESSION['rgN']            = $row['rg_t'];
                $_SESSION['endN']           = $row['end_t'];
                $_SESSION['numN']           = $row['numero_t'];
                $_SESSION['bairroN']        = $row['bairro_t'];
                $_SESSION['cepN']           = $row['cep_t'];
                $_SESSION['cidadeN']        = $row['cidade_t'];
                $_SESSION['estadoN']        = $row['estado_t'];
                $_SESSION['obs']            = $row['obs'];
                $paginaAlvo                 = '../formularios/atualizacaoCad.php';

            }elseif ($row['documento'] == 'B.C.I. (BOLETIM DO CADASTRAMENTO DE IMÓVEIS)')
            {
                $_SESSION['docPrint']       = 'B.C.I. (BOLETIM DO CADASTRAMENTO DE IMÓVEIS)';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $paginaAlvo                 = '../formularios/bci.php';

            }elseif ($row['documento'] == 'BUSCAS DE IPTU')
            {
                $_SESSION['docPrint']       = 'BUSCAS DE IPTU';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['ano']            = $row['ano'];
                $paginaAlvo                 = '../formularios/buscaIPTU.php';

            }elseif ($row['documento'] == 'CANCELAMENTO DE ALVARÁ')
            {
                $_SESSION['docPrint']       = 'CANCELAMENTO DE ALVARÁ';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['canceAlv']       = $row['conf_alvara'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['cancApr']        = $convertDate;
                $_SESSION['cancArea']       = $row['area_const'];
                $_SESSION['coments']        = $row['obs'];
                $paginaAlvo                 = '../formularios/cancelamentoAlvara.php'; 

            }elseif ($row['documento'] == 'CONFRONTANTES')
            {
                $_SESSION['docPrint']       = 'CONFRONTANTES';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $paginaAlvo                 = '../formularios/confrontantes.php';

            }elseif ($row['documento'] == 'CONSTRUÇÃO/HABITE-SE')
            {
                $_SESSION['docPrint']       = 'CONSTRUÇÃO/HABITE-SE';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['projeto']        = $row['check_box1'];
                $_SESSION['requerimento']   = $row['check_box2'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['dataAprov']      = $convertDate;
                $_SESSION['alvara']         = $row['conf_alvara'];
                $_SESSION['areaAprov']      = $row['area_const'];
                $_SESSION['obs']            = $row['obs'];
                $paginaAlvo                 = '../formularios/certConstrucao_habite_se.php';

            }elseif ($row['documento'] == 'CÓPIA DO ALVARÁ DE CONSTRUÇÃO')
            {
                $_SESSION['docPrint']       = 'CÓPIA DO ALVARÁ DE CONSTRUÇÃO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['projeto']        = $row['projeto_numero'];
                $_SESSION['alvNum']         = $row['conf_alvara'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['aproData']       = $convertDate;
                $paginaAlvo                 = '../formularios/copiaAlvara.php';

            }elseif ($row['documento'] == 'DEMOLIÇÃO')
            {
                $_SESSION['docPrint']       = 'DEMOLIÇÃO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['aproDem']        = $convertDate;
                $_SESSION['alvDem']         = $row['conf_alvara'];
                $_SESSION['areaDem']        = $row['area_const'];
                $paginaAlvo                 = '../formularios/certDemolicao.php';

            }elseif ($row['documento'] == 'DENOMINAÇÃO DE RUA')
            {
                $_SESSION['docPrint']       = 'DENOMINAÇÃO DE RUA';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['den_ruaAntiga']  = $row['rua_antiga'];
                $_SESSION['den_ruaAtual']   = $row['rua_atual'];
                $_SESSION['den_bairro']     = $row['bairro_x'];
                $_SESSION['coments']        = $row['obs'];
                $paginaAlvo                 = '../formularios/certDenominacaoRua.php';

            }elseif ($row['documento'] == 'EMPLACAMENTO')
            {
                $_SESSION['docPrint']       = 'EMPLACAMENTO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['emplac_chk1']    = $row['check_box1'];
                $_SESSION['emplac_chk2']    = $row['check_box2'];
                $_SESSION['alvEmp']         = $row['conf_alvara'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['aproEmp']        = $convertDate;
                $_SESSION['areaEmp']        = $row['area_const'];
                $_SESSION['obsEmp']         = $row['obs'];
                $paginaAlvo                 = '../formularios/certEmplacamento.php';

            }elseif ($row['documento'] == 'LADO')
            {
                $_SESSION['docPrint']       = 'LADO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['coments']        = $row['obs'];

                $paginaAlvo                 = '../formularios/certLadodoImovel.php';

            }elseif ($row['documento'] == 'FICHA CADASTRAL')
            {
                $_SESSION['docPrint']       = 'FICHA CADASTRAL';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['coments']        = $row['obs'];

                $paginaAlvo                 = '../formularios/certFichaCad.php';

            }elseif ($row['documento'] == 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"')
            {
                $_SESSION['docPrint']       = 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['coments']        = $row['obs'];

                $paginaAlvo                 = '../formularios/certMedInLoco.php';

            }elseif ($row['documento'] == 'VALOR VENAL')
            {
                $_SESSION['docPrint']       = 'VALOR VENAL';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['ano']            = $row['ano'];

                $paginaAlvo                 = '../formularios/certValorVenal.php';

            }elseif ($row['documento'] == 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO')
            {
                $_SESSION['docPrint']       = 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['n_alv']      = $row['conf_alvara'];
                $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                $_SESSION['proj_data']  = $convertDate;
                $_SESSION['area_Proj']  = $row['area_const'];

                $paginaAlvo                 = '../formularios/certRenCopiaAlvara.php';

            }elseif ($row['documento'] == 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO')
            {
                $_SESSION['docPrint']       = 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['ncad1']          = $row['cad_1'];
                $_SESSION['ncad2']          = $row['cad_2'];
                $_SESSION['ncad3']          = $row['cad_3'];
                $_SESSION['coments']        = $row['obs'];

                $paginaAlvo                 = '../formularios/certRenCertDesdobro.php';

            }elseif ($row['documento'] == 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO')
            {
                $_SESSION['docPrint']       = 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO';
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['ncad1']          = $row['cad_1'];
                $_SESSION['ncad2']          = $row['cad_2'];
                $_SESSION['ncad3']          = $row['cad_3'];
                $_SESSION['coments']        = $row['obs'];

                $paginaAlvo                 = '../formularios/certUnificacao.php';

            }elseif ($row['documento'] == 'REVISÃO DE IPTU')
            {
                $_SESSION['docPrint']       = 'REVISÃO DE IPTU';
                $_SESSION['carne']          = $row['n_carne'];
                $_SESSION['codigoMantido']  = $row['num_doc'];
                $_SESSION['cpf']            = $row['cpf'];
                $_SESSION['cadastro']       = $row['n_cad'];
                $_SESSION['menu']           = $row['menu'];                
                $_SESSION['Motivo']         = $row['motivo'];
                $_SESSION['carne']          = $row['n_carne'];

                if ($row['menu'] == '1')
                {
                    $_SESSION['AreaCarne']  = $row['area_no_carne'];
                    $_SESSION['AnoCarne']   = $row['desde'];
                }elseif ($row['menu'] == '2')
                {
                    $_SESSION['Emitida']    = $row['desde'];
                    $_SESSION['Areade']     = $row['area_aprov'];
                }elseif ($row['menu'] == '3')
                {
                    $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                    $_SESSION['DesData']      = $convertDate;
                    $_SESSION['cadastro1']    = $row['cad_1'];
                    $_SESSION['cadastro2']    = $row['cad_2'];
                    $_SESSION['cadastro3']    = $row['cad_3'];
                    $_SESSION['cadastro4']    = $row['cad_4'];
                    $_SESSION['cadastro5']    = $row['cad_5'];      
                }elseif ($row['menu'] == '4')
                {
                    $_SESSION['n_alv']      = $row['conf_alvara'];
                    $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                    $_SESSION['proj_data']  = $convertDate;
                    $_SESSION['area_Proj']  = $row['area_aprov']; 
                }elseif ($row['menu'] == '5')
                {
                            
                }elseif ($row['menu'] == '6')
                {
                    $convertDate = substr($row['data_aprov'], 8, 2).'/'.substr($row['data_aprov'], 5, 2).'/'.substr($row['data_aprov'], 0, 4);
                    $_SESSION['UniData']      = $convertDate;
                    $_SESSION['cadastro1']    = $row['cad_1'];
                    $_SESSION['cadastro2']    = $row['cad_2'];
                    $_SESSION['cadastro3']    = $row['cad_3'];
                    $_SESSION['cadastro4']    = $row['cad_4'];
                    $_SESSION['cadastro5']    = $row['cad_5'];      
                }
                
                $paginaAlvo = '../formularios/revisaoIPTU.php';

            }
        }
        
        echo "<script>window.location.replace(\"$paginaAlvo\")</script>";
        exit;
    }elseif (!empty($_POST['text']) || !empty($_POST['FillCamp']))//PROCESSA OF FILTROS PARA CONSULTA DE ATENDIMENTOS ANTERIORES
    {
        $paginaAlvo               = '../act/reg_atendimento.php';

        $_SESSION['FiltrarTable'] = $_POST['text'];
        $_SESSION['palavra']      = $_POST['FillCamp'];

        echo "<script>window.location.replace(\"$paginaAlvo\")</script>";
        exit;        
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

    }else{ //RETORNA UMA MENSAGEM DE ERRO CASO NÃO SEJA POSSIVEL IDENTIFICAR A SOLICITAÇÃO
        echo "<h1>Nenhum código foi enviado!!!</h1>";
    }

rodape();
?>