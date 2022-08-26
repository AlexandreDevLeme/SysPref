<?php

session_start();

if($_SESSION['gravarDados'] == 'GRAVAR')
{
    if (isset($_SESSION['reimpressao']))
    {
        $num_doc     = $_SESSION['codigoMantido'];
    }else{
        $num_doc     = 0;
    }    
    $alt_por     = $_SESSION['operador'];
    $data_alt    = date('Y/m/d');
    $data_lanc   = date('Y/m/d');
    $formulario  = $_SESSION['className'];

    if(!empty($_SESSION['new_nome']))
    {
        $nome           = $_SESSION['new_nome'];
        $cpf            = $_SESSION['new_cpf'];
        $rg             = $_SESSION['new_rg'];
        $endereco       = $_SESSION['new_end'];
        $complemento    = $_SESSION['new_complemento'];
        $numero         = $_SESSION['new_num'];
        $bairro         = $_SESSION['new_bairro'];
        $cep            = $_SESSION['new_cep'];
        $cidade         = $_SESSION['new_cidade'];
        $estado         = $_SESSION['new_estado'];
        $telefone       = $_SESSION['new_tel'];
        $celular        = $_SESSION['new_cel'];
        
        require "./verificaRequerente.php";
    }

    sleep(1);

    if(!empty($_SESSION['new_Rua']))
    {

        $im_Rua         = $_SESSION['new_Rua'];
        $im_Numero      = $_SESSION['new_Numero'];
        $im_Lote        = $_SESSION['new_Lote'];
        $im_Quadra      = $_SESSION['new_Quadra'];
        $im_Bairro      = $_SESSION['new_Bairro'];
        $im_Cadastro    = $_SESSION['new_Cadastro'];
        if(isset($_SESSION['new_Carne']))
        {
            $carne = $_SESSION['new_Carne'];    
        }else{
            $carne = '';
        }
        if(isset($_SESSION['new_Proprietario']))
        {
            $im_Proprietario = $_SESSION['new_Proprietario'];
        }else{
            $im_Proprietario = '';
        }

        require "./verificaImovel.php";
    }

    if(isset($_SESSION['className']) and $_SESSION['className'] == 'AMPLIAÇÃO')//reimpressão ok
    {
        $convertDate = substr($_SESSION['AproAmpl'], 6, 4).'/'.substr($_SESSION['AproAmpl'], 3, 2).'/'.substr($_SESSION['AproAmpl'], 0, 2);
        $AlvAmpl    = $_SESSION['AlvAmpl'];
        $AproAmpl   = $convertDate;
        $Area1Ampl  = $_SESSION['Area1Ampl'];
        $Area2Ampl  = $_SESSION['Area2Ampl'];
        $Area3Ampl  = $_SESSION['Area3Ampl'];
        $obs        = $_SESSION['obs'];
        
        $documento  = 'AMPLIAÇÃO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            conf_alvara=:AlvAmpl,data_aprov=:AproAmpl,const_fase1=:Area1Ampl,const_add=:Area2Ampl,area_const=:Area3Ampl,obs=:obs
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            conf_alvara,data_aprov,const_fase1,const_add,area_const,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :AlvAmpl,:AproAmpl,:Area1Ampl,:Area2Ampl,:Area3Ampl,:obs)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':AlvAmpl', $AlvAmpl);
        $strInsert->bindValue(':AproAmpl', $AproAmpl);
        $strInsert->bindValue(':Area1Ampl', $Area1Ampl);
        $strInsert->bindValue(':Area2Ampl', $Area1Ampl);
        $strInsert->bindValue(':Area3Ampl', $Area1Ampl);
        $strInsert->bindValue(':obs', $obs);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['AlvAmpl']);
        unset($_SESSION['AproAmpl']);
        unset($_SESSION['Area1Ampl']);
        unset($_SESSION['Area2Ampl']);
        unset($_SESSION['Area3Ampl']);
        unset($_SESSION['obs']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'ATUALIZAÇÃO DOS DADOS CADASTRAIS')//reimpressão ok
    {
        $nomeN         = $_SESSION['nomeN'];
        $cpfN          = $_SESSION['cpfN'];
        $rgN           = $_SESSION['rgN']; 
        $enderecoN     = $_SESSION['endN'];
        $numeroN       = $_SESSION['numN'];
        $bairroN       = $_SESSION['bairroN'];
        $cepN          = $_SESSION['cepN'];
        $cidN          = $_SESSION['cidadeN'];
        $ufN           = $_SESSION['estadoN'];
        $enderecoTrib  = $_SESSION['endCompleto'];
        $obs           = $_SESSION['obs'];
        
        $documento  = 'ATUALIZAÇÃO DOS DADOS CADASTRAIS';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            alterar_para=:nomeN,cpf_t=:cpfN,rg_t=:rgN,end_t=:endN,numero_t=:numN,bairro_t=:bairroN,cep_t=:cepN,cidade_t=:cidN,estado_t=:ufN,endCompleto=:endCompleto,obs=:obs
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            alterar_para,cpf_t,rg_t,end_t,numero_t,bairro_t,cep_t,cidade_t,estado_t,endCompleto,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :nomeN,:cpfN,:rgN,:endN,:numN,:bairroN,:cepN,:cidN,:ufN,:endCompleto,:obs)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':nomeN', $nomeN);
        $strInsert->bindValue(':cpfN', $cpfN);
        $strInsert->bindValue(':rgN', $rgN);
        $strInsert->bindValue(':endN', $enderecoN);
        $strInsert->bindValue(':numN', $numeroN);
        $strInsert->bindValue(':bairroN', $bairroN);
        $strInsert->bindValue(':cepN', $cepN);
        $strInsert->bindValue(':cidN', $cidN);
        $strInsert->bindValue(':ufN', $ufN);

        $strInsert->bindValue(':endCompleto', $enderecoTrib);
        $strInsert->bindValue(':obs', $obs);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['nomeN']);
        unset($_SESSION['cpfN']);
        unset($_SESSION['rgN']);
        unset($_SESSION['endN']);
        unset($_SESSION['numN']);
        unset($_SESSION['bairroN']);
        unset($_SESSION['cepN']);
        unset($_SESSION['cidadeN']);
        unset($_SESSION['estadoN']);
        unset($_SESSION['endCompleto']);
        unset($_SESSION['obs']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'B.C.I. (BOLETIM DO CADASTRAMENTO DE IMÓVEL)')//reimpressão ok
    {
        
        $documento  = 'B.C.I. (BOLETIM DO CADASTRAMENTO DE IMÓVEIS)';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'BUSCAS DE IPTU')//reimpressão ok
    {
        $anoBuscaI = $_SESSION['anoBuscaI'];
        
        $documento  = 'BUSCAS DE IPTU';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            ano=:anoBuscaI
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            ano)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :anoBuscaI)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':anoBuscaI', $anoBuscaI);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['anoBuscaI']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);    
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'CANCELAMENTO DE ALVARÁ')//reimpressão ok
    {
        $convertDate = substr($_SESSION['cancApr'], 6, 4).'/'.substr($_SESSION['cancApr'], 3, 2).'/'.substr($_SESSION['cancApr'], 0, 2);
        $numAlv   = $_SESSION['canceAlv'];
        $dataAlv  = $convertDate;
        $cancArea = $_SESSION['cancArea'];
        $coments  = $_SESSION['coments'];
        
        $documento  = 'CANCELAMENTO DE ALVARÁ';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            conf_alvara=:numAlv,data_aprov=:dataAlv,area_const=:cancArea,obs=:coments
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            conf_alvara,data_aprov,area_const,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :numAlv,:dataAlv,:cancArea,:coments)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':numAlv', $numAlv);
        $strInsert->bindValue(':dataAlv', $dataAlv);
        $strInsert->bindValue(':cancArea', $cancArea);
        $strInsert->bindValue(':coments', $coments);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['numAlv']);
        unset($_SESSION['dataAlv']);
        unset($_SESSION['cancArea']);
        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'CONFRONTANTES')//reimpressão ok
    {
        $obs = $_SESSION['obs'];

        $documento  = 'CONFRONTANTES';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            obs=:obs
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :obs)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':obs', $obs);

        $strInsert->execute();
        
        sleep(1);
        
        unset($_SESSION['obs']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);    
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'REVISÃO DE IPTU')//reimpressão ok
    {
        if($_SESSION['menu'] == '1')
        {
            $menu      = $_SESSION['menu'];
            $Motivo    = $_SESSION['Motivo'];
            $AreaCarne = $_SESSION['AreaCarne'];
            $AnoCarne  = $_SESSION['AnoCarne'];

            $documento  = 'REVISÃO DE IPTU';
            
            if(isset($_SESSION['reimpressao']))
            {
                $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            menu=:menu,motivo=:Motivo,area_no_carne=:AreaCarne,desde=:AnoCarne
                                                            WHERE num_doc=:num_doc");
            }else{
                $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            menu,motivo,area_no_carne,desde)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :menu,:Motivo,:AreaCarne,:AnoCarne)");
            }
        

            $strInsert->bindValue(':num_doc', $num_doc);
            $strInsert->bindValue(':alt_por', $alt_por);
            $strInsert->bindValue(':data_alt', $data_alt);
            $strInsert->bindValue(':data_lanc', $data_lanc);
            $strInsert->bindValue(':documento', $documento);

            $strInsert->bindValue(':nome', $nome);
            $strInsert->bindValue(':cpf', $cpf);
            $strInsert->bindValue(':rg', $rg);
            $strInsert->bindValue(':telefone', $telefone);
            $strInsert->bindValue(':celular', $celular);
            $strInsert->bindValue(':endereco', $endereco);
            $strInsert->bindValue(':numero', $numero);
            $strInsert->bindValue(':complemento', $complemento);
            $strInsert->bindValue(':bairro', $bairro);
            $strInsert->bindValue(':cep', $cep);
            $strInsert->bindValue(':cidade', $cidade);
            $strInsert->bindValue(':estado', $estado);

            $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
            $strInsert->bindValue(':carne', $carne);
            $strInsert->bindValue(':im_Rua', $im_Rua);
            $strInsert->bindValue(':im_Numero', $im_Numero);
            $strInsert->bindValue(':im_Lote', $im_Lote);
            $strInsert->bindValue(':im_Quadra', $im_Quadra);
            $strInsert->bindValue(':im_Bairro', $im_Bairro);
            $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

            $strInsert->bindValue(':menu', $menu);
            $strInsert->bindValue(':Motivo', $Motivo);
            $strInsert->bindValue(':AreaCarne', $AreaCarne);
            $strInsert->bindValue(':AnoCarne', $AnoCarne);

            $strInsert->execute();
            
            sleep(1);
            
            unset($_SESSION['menu']);
            unset($_SESSION['Motivo']);
            unset($_SESSION['AreaCarne']);
            unset($_SESSION['AnoCarne']);
            unset($_SESSION['className']);

            unset($_SESSION['new_nome']);
            unset($_SESSION['new_cpf']);
            unset($_SESSION['new_rg']);
            unset($_SESSION['new_tel']);
            unset($_SESSION['new_cel']);
            unset($_SESSION['new_end']);
            unset($_SESSION['new_num']);
            unset($_SESSION['new_complemento']);
            unset($_SESSION['new_bairro']);
            unset($_SESSION['new_cep']);
            unset($_SESSION['new_cidade']);
            unset($_SESSION['new_estado']);

            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['carne']);
            unset($_SESSION['new_Proprietario']);

        }elseif($_SESSION['menu'] == '2')
        {
            $menu       =   $_SESSION['menu'];
            $Motivo     =   $_SESSION['Motivo'];
            $Emitida    =   $_SESSION['Emitida'];
            $Areade     =   $_SESSION['Areade'];
        
            $documento  = 'REVISÃO DE IPTU';
            
            if(isset($_SESSION['reimpressao']))
            {
                $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            menu=:menu,motivo=:Motivo,area_aprov=:Areade,desde=:Emitida
                                                            WHERE num_doc=:num_doc");
            }else{
                $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            menu,motivo,area_aprov,desde)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :menu,:Motivo,:Areade,:Emitida)");
            }

            $strInsert->bindValue(':num_doc', $num_doc);
            $strInsert->bindValue(':alt_por', $alt_por);
            $strInsert->bindValue(':data_alt', $data_alt);
            $strInsert->bindValue(':data_lanc', $data_lanc);
            $strInsert->bindValue(':documento', $documento);

            $strInsert->bindValue(':nome', $nome);
            $strInsert->bindValue(':cpf', $cpf);
            $strInsert->bindValue(':rg', $rg);
            $strInsert->bindValue(':telefone', $telefone);
            $strInsert->bindValue(':celular', $celular);
            $strInsert->bindValue(':endereco', $endereco);
            $strInsert->bindValue(':numero', $numero);
            $strInsert->bindValue(':complemento', $complemento);
            $strInsert->bindValue(':bairro', $bairro);
            $strInsert->bindValue(':cep', $cep);
            $strInsert->bindValue(':cidade', $cidade);
            $strInsert->bindValue(':estado', $estado);

            $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
            $strInsert->bindValue(':carne', $carne);
            $strInsert->bindValue(':im_Rua', $im_Rua);
            $strInsert->bindValue(':im_Numero', $im_Numero);
            $strInsert->bindValue(':im_Lote', $im_Lote);
            $strInsert->bindValue(':im_Quadra', $im_Quadra);
            $strInsert->bindValue(':im_Bairro', $im_Bairro);
            $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

            $strInsert->bindValue(':menu', $menu);
            $strInsert->bindValue(':Motivo', $Motivo);
            $strInsert->bindValue(':Emitida', $Emitida);
            $strInsert->bindValue(':Areade', $Areade);

            $strInsert->execute();
            
            sleep(1);
            
            unset($_SESSION['menu']);
            unset($_SESSION['Motivo']);
            unset($_SESSION['Emitida']);
            unset($_SESSION['Areade']);
            unset($_SESSION['className']);

            unset($_SESSION['new_nome']);
            unset($_SESSION['new_cpf']);
            unset($_SESSION['new_rg']);
            unset($_SESSION['new_tel']);
            unset($_SESSION['new_cel']);
            unset($_SESSION['new_end']);
            unset($_SESSION['new_num']);
            unset($_SESSION['new_complemento']);
            unset($_SESSION['new_bairro']);
            unset($_SESSION['new_cep']);
            unset($_SESSION['new_cidade']);
            unset($_SESSION['new_estado']);

            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['carne']);
            unset($_SESSION['new_Proprietario']);

        }elseif($_SESSION['menu'] == '3')
        {
            $convertDate = substr($_SESSION['DesData'], 6, 4).'/'.substr($_SESSION['DesData'], 3, 2).'/'.substr($_SESSION['DesData'], 0, 2);
            $menu       =   $_SESSION['menu'];
            $Motivo     =   $_SESSION['Motivo'];
            $DesData    =   $convertDate;
            $cadastro1  =   $_SESSION['cadastro1'];
            $cadastro2  =   $_SESSION['cadastro2'];

            if(isset($_SESSION['cadastro3']))
            {
                $cadastro3  =   $_SESSION['cadastro3'];
            }
            
            if(isset($_SESSION['cadastro4']))
            {
                $cadastro4  =   $_SESSION['cadastro4'];
            }
            
            if(isset($_SESSION['cadastro5']))
            {
                $cadastro5  =   $_SESSION['cadastro5'];
            }
        
            $documento  = 'REVISÃO DE IPTU';
            
            if(isset($_SESSION['reimpressao']))
            {
                $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            menu=:menu,motivo=:Motivo,data_aprov=:DesData,cad_1=:cadastro1,cad_2=:cadastro2,cad_3=:cadastro3,cad_4=:cadastro4,cad_5=:cadastro5
                                                            WHERE num_doc=:num_doc");
            }else{
                $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            menu,motivo,data_aprov,cad_1,cad_2,cad_3,cad_4,cad_5)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :menu,:Motivo,:DesData,:cadastro1,:cadastro2,:cadastro3,:cadastro4,:cadastro5)");
            }

            $strInsert->bindValue(':num_doc', $num_doc);
            $strInsert->bindValue(':alt_por', $alt_por);
            $strInsert->bindValue(':data_alt', $data_alt);
            $strInsert->bindValue(':data_lanc', $data_lanc);
            $strInsert->bindValue(':documento', $documento);

            $strInsert->bindValue(':nome', $nome);
            $strInsert->bindValue(':cpf', $cpf);
            $strInsert->bindValue(':rg', $rg);
            $strInsert->bindValue(':telefone', $telefone);
            $strInsert->bindValue(':celular', $celular);
            $strInsert->bindValue(':endereco', $endereco);
            $strInsert->bindValue(':numero', $numero);
            $strInsert->bindValue(':complemento', $complemento);
            $strInsert->bindValue(':bairro', $bairro);
            $strInsert->bindValue(':cep', $cep);
            $strInsert->bindValue(':cidade', $cidade);
            $strInsert->bindValue(':estado', $estado);

            $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
            $strInsert->bindValue(':carne', $carne);
            $strInsert->bindValue(':im_Rua', $im_Rua);
            $strInsert->bindValue(':im_Numero', $im_Numero);
            $strInsert->bindValue(':im_Lote', $im_Lote);
            $strInsert->bindValue(':im_Quadra', $im_Quadra);
            $strInsert->bindValue(':im_Bairro', $im_Bairro);
            $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

            $strInsert->bindValue(':menu', $menu);
            $strInsert->bindValue(':Motivo', $Motivo);
            $strInsert->bindValue(':DesData', $DesData);
            $strInsert->bindValue(':cadastro1', $cadastro1);
            $strInsert->bindValue(':cadastro2', $cadastro2);
            $strInsert->bindValue(':cadastro3', $cadastro3);
            $strInsert->bindValue(':cadastro4', $cadastro4);
            $strInsert->bindValue(':cadastro5', $cadastro5);

            $strInsert->execute();
            
            sleep(1);
            
            unset($_SESSION['menu']);
            unset($_SESSION['Motivo']);
            unset($_SESSION['DesData']);
            unset($_SESSION['cadastro1']);
            unset($_SESSION['cadastro2']);
            unset($_SESSION['cadastro3']);
            unset($_SESSION['cadastro4']);
            unset($_SESSION['cadastro5']);
            unset($_SESSION['className']);

            unset($_SESSION['new_nome']);
            unset($_SESSION['new_cpf']);
            unset($_SESSION['new_rg']);
            unset($_SESSION['new_tel']);
            unset($_SESSION['new_cel']);
            unset($_SESSION['new_end']);
            unset($_SESSION['new_num']);
            unset($_SESSION['new_complemento']);
            unset($_SESSION['new_bairro']);
            unset($_SESSION['new_cep']);
            unset($_SESSION['new_cidade']);
            unset($_SESSION['new_estado']);

            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['carne']);
            unset($_SESSION['new_Proprietario']);

        }elseif($_SESSION['menu'] == '4')
        {
            $convertDate = substr($_SESSION['proj_data'], 6, 4).'/'.substr($_SESSION['proj_data'], 3, 2).'/'.substr($_SESSION['proj_data'], 0, 2);
            $menu       =   $_SESSION['menu'];        
            $Motivo     =   $_SESSION['Motivo'];
            $n_alv      =   $_SESSION['n_alv'];
            $proj_data  =   $convertDate;
            $area_Proj  =   $_SESSION['area_Proj'];

            $documento  = 'REVISÃO DE IPTU';
            
            if(isset($_SESSION['reimpressao']))
            {
                $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            menu=:menu,motivo=:Motivo,conf_alvara=:n_alv,data_aprov=:proj_data,area_aprov=:area_Proj
                                                            WHERE num_doc=:num_doc");
            }else{
                $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            menu,motivo,conf_alvara,data_aprov,area_aprov)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :menu,:Motivo,:n_alv,:proj_data,:area_Proj)");
            }

            $strInsert->bindValue(':num_doc', $num_doc);
            $strInsert->bindValue(':alt_por', $alt_por);
            $strInsert->bindValue(':data_alt', $data_alt);
            $strInsert->bindValue(':data_lanc', $data_lanc);
            $strInsert->bindValue(':documento', $documento);

            $strInsert->bindValue(':nome', $nome);
            $strInsert->bindValue(':cpf', $cpf);
            $strInsert->bindValue(':rg', $rg);
            $strInsert->bindValue(':telefone', $telefone);
            $strInsert->bindValue(':celular', $celular);
            $strInsert->bindValue(':endereco', $endereco);
            $strInsert->bindValue(':numero', $numero);
            $strInsert->bindValue(':complemento', $complemento);
            $strInsert->bindValue(':bairro', $bairro);
            $strInsert->bindValue(':cep', $cep);
            $strInsert->bindValue(':cidade', $cidade);
            $strInsert->bindValue(':estado', $estado);

            $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
            $strInsert->bindValue(':carne', $carne);
            $strInsert->bindValue(':im_Rua', $im_Rua);
            $strInsert->bindValue(':im_Numero', $im_Numero);
            $strInsert->bindValue(':im_Lote', $im_Lote);
            $strInsert->bindValue(':im_Quadra', $im_Quadra);
            $strInsert->bindValue(':im_Bairro', $im_Bairro);
            $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

            $strInsert->bindValue(':menu', $menu);
            $strInsert->bindValue(':Motivo', $Motivo);
            $strInsert->bindValue(':n_alv', $n_alv);
            $strInsert->bindValue(':proj_data', $proj_data);
            $strInsert->bindValue(':area_Proj', $area_Proj);

            $strInsert->execute();
            
            sleep(1);
            
            unset($_SESSION['menu']);
            unset($_SESSION['Motivo']);
            unset($_SESSION['n_alv']);
            unset($_SESSION['proj_data']);
            unset($_SESSION['area_Proj']);
            unset($_SESSION['className']);

            unset($_SESSION['new_nome']);
            unset($_SESSION['new_cpf']);
            unset($_SESSION['new_rg']);
            unset($_SESSION['new_tel']);
            unset($_SESSION['new_cel']);
            unset($_SESSION['new_end']);
            unset($_SESSION['new_num']);
            unset($_SESSION['new_complemento']);
            unset($_SESSION['new_bairro']);
            unset($_SESSION['new_cep']);
            unset($_SESSION['new_cidade']);
            unset($_SESSION['new_estado']);

            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['carne']);
            unset($_SESSION['new_Proprietario']);

        }elseif($_SESSION['menu'] == '5')
        {
            $menu       =   $_SESSION['menu'];
            $Motivo     =   $_SESSION['Motivo'];

            $documento  = 'REVISÃO DE IPTU';
            
            if(isset($_SESSION['reimpressao']))
            {
                $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            menu=:menu,motivo=:Motivo
                                                            WHERE num_doc=:num_doc");
            }else{
                $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            menu,motivo)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :menu,:Motivo)");
            }

            $strInsert->bindValue(':num_doc', $num_doc);
            $strInsert->bindValue(':alt_por', $alt_por);
            $strInsert->bindValue(':data_alt', $data_alt);
            $strInsert->bindValue(':data_lanc', $data_lanc);
            $strInsert->bindValue(':documento', $documento);

            $strInsert->bindValue(':nome', $nome);
            $strInsert->bindValue(':cpf', $cpf);
            $strInsert->bindValue(':rg', $rg);
            $strInsert->bindValue(':telefone', $telefone);
            $strInsert->bindValue(':celular', $celular);
            $strInsert->bindValue(':endereco', $endereco);
            $strInsert->bindValue(':numero', $numero);
            $strInsert->bindValue(':complemento', $complemento);
            $strInsert->bindValue(':bairro', $bairro);
            $strInsert->bindValue(':cep', $cep);
            $strInsert->bindValue(':cidade', $cidade);
            $strInsert->bindValue(':estado', $estado);

            $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
            $strInsert->bindValue(':carne', $carne);
            $strInsert->bindValue(':im_Rua', $im_Rua);
            $strInsert->bindValue(':im_Numero', $im_Numero);
            $strInsert->bindValue(':im_Lote', $im_Lote);
            $strInsert->bindValue(':im_Quadra', $im_Quadra);
            $strInsert->bindValue(':im_Bairro', $im_Bairro);
            $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

            $strInsert->bindValue(':menu', $menu);
            $strInsert->bindValue(':Motivo', $Motivo);

            $strInsert->execute();
            
            sleep(1);
            
            unset($_SESSION['menu']);
            unset($_SESSION['Motivo']);

            unset($_SESSION['new_nome']);
            unset($_SESSION['new_cpf']);
            unset($_SESSION['new_rg']);
            unset($_SESSION['new_tel']);
            unset($_SESSION['new_cel']);
            unset($_SESSION['new_end']);
            unset($_SESSION['new_num']);
            unset($_SESSION['new_complemento']);
            unset($_SESSION['new_bairro']);
            unset($_SESSION['new_cep']);
            unset($_SESSION['new_cidade']);
            unset($_SESSION['new_estado']);

            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['carne']);
            unset($_SESSION['new_Proprietario']);

        }elseif($_SESSION['menu'] == '6')
        {
            $convertDate = substr($_SESSION['UniData'], 6, 4).'/'.substr($_SESSION['UniData'], 3, 2).'/'.substr($_SESSION['UniData'], 0, 2);
            $menu       =   $_SESSION['menu'];
            $Motivo     =   $_SESSION['Motivo'];
            $UniData    =   $convertDate;
            $cadastro1  =   $_SESSION['cadastro1'];
            $cadastro2  =   $_SESSION['cadastro2'];

            if(isset($_SESSION['cadastro3']))
            {
                $cadastro3  =   $_SESSION['cadastro3'];
            }
            
            if(isset($_SESSION['cadastro4']))
            {
                $cadastro4  =   $_SESSION['cadastro4'];
            }
            
            if(isset($_SESSION['cadastro5']))
            {
                $cadastro5  =   $_SESSION['cadastro5'];
            }
        
            $documento  = 'REVISÃO DE IPTU';
            
            if(isset($_SESSION['reimpressao']))
            {
                $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            menu=:menu,motivo=:Motivo,data_aprov=:UniData,cad_1=:cadastro1,cad_2=:cadastro2,cad_3=:cadastro3,cad_4=:cadastro4,cad_5=:cadastro5
                                                            WHERE num_doc=:num_doc");
            }else{
                $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            menu,motivo,data_aprov,cad_1,cad_2,cad_3,cad_4,cad_5)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :menu,:Motivo,:UniData,:cadastro1,:cadastro2,:cadastro3,:cadastro4,:cadastro5)");
            }

            $strInsert->bindValue(':num_doc', $num_doc);
            $strInsert->bindValue(':alt_por', $alt_por);
            $strInsert->bindValue(':data_alt', $data_alt);
            $strInsert->bindValue(':data_lanc', $data_lanc);
            $strInsert->bindValue(':documento', $documento);

            $strInsert->bindValue(':nome', $nome);
            $strInsert->bindValue(':cpf', $cpf);
            $strInsert->bindValue(':rg', $rg);
            $strInsert->bindValue(':telefone', $telefone);
            $strInsert->bindValue(':celular', $celular);
            $strInsert->bindValue(':endereco', $endereco);
            $strInsert->bindValue(':numero', $numero);
            $strInsert->bindValue(':complemento', $complemento);
            $strInsert->bindValue(':bairro', $bairro);
            $strInsert->bindValue(':cep', $cep);
            $strInsert->bindValue(':cidade', $cidade);
            $strInsert->bindValue(':estado', $estado);

            $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
            $strInsert->bindValue(':carne', $carne);
            $strInsert->bindValue(':im_Rua', $im_Rua);
            $strInsert->bindValue(':im_Numero', $im_Numero);
            $strInsert->bindValue(':im_Lote', $im_Lote);
            $strInsert->bindValue(':im_Quadra', $im_Quadra);
            $strInsert->bindValue(':im_Bairro', $im_Bairro);
            $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

            $strInsert->bindValue(':menu', $menu);
            $strInsert->bindValue(':Motivo', $Motivo);
            $strInsert->bindValue(':UniData', $UniData);
            $strInsert->bindValue(':cadastro1', $cadastro1);
            $strInsert->bindValue(':cadastro2', $cadastro2);
            $strInsert->bindValue(':cadastro3', $cadastro3);
            $strInsert->bindValue(':cadastro4', $cadastro4);
            $strInsert->bindValue(':cadastro5', $cadastro5);

            $strInsert->execute();
            
            sleep(1);
            
            unset($_SESSION['menu']);
            unset($_SESSION['Motivo']);
            unset($_SESSION['UniData']);
            unset($_SESSION['cadastro1']);
            unset($_SESSION['cadastro2']);
            unset($_SESSION['cadastro3']);
            unset($_SESSION['cadastro4']);
            unset($_SESSION['cadastro5']);
            unset($_SESSION['className']);

            unset($_SESSION['new_nome']);
            unset($_SESSION['new_cpf']);
            unset($_SESSION['new_rg']);
            unset($_SESSION['new_tel']);
            unset($_SESSION['new_cel']);
            unset($_SESSION['new_end']);
            unset($_SESSION['new_num']);
            unset($_SESSION['new_complemento']);
            unset($_SESSION['new_bairro']);
            unset($_SESSION['new_cep']);
            unset($_SESSION['new_cidade']);
            unset($_SESSION['new_estado']);

            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['carne']);
            unset($_SESSION['new_Proprietario']);

        }
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'CONSTRUÇÃO/HABITE-SE')//reimpressão ok
    {
        $convertDate = substr($_SESSION['dataAprov'], 6, 4).'/'.substr($_SESSION['dataAprov'], 3, 2).'/'.substr($_SESSION['dataAprov'], 0, 2);

        if (isset($_SESSION['projeto']))
        {
            $check1 = $_SESSION['projeto'];
        }
        
        if (isset($_SESSION['requerimento']))
        {  
            $check2 = $_SESSION['requerimento']; 
        }

        $dataAprov = $convertDate;
        $alvara    = $_SESSION['alvara'];
        $areaAprov = $_SESSION['areaAprov'];
        $obs = $_SESSION['obs'];
        
        $documento  = 'CONSTRUÇÃO/HABITE-SE';

        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            check_box1=:check1,check_box2=:check2,data_aprov=:dataAprov,conf_alvara=:alvara,area_const=:areaAprov,obs=:obs
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            check_box1,check_box2,data_aprov,conf_alvara,area_const,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :check1,:check2,:dataAprov,:alvara,:areaAprov,:obs)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':check1', $check1);
        $strInsert->bindValue(':check2', $check2);
        $strInsert->bindValue(':dataAprov', $dataAprov);
        $strInsert->bindValue(':alvara', $alvara);
        $strInsert->bindValue(':areaAprov', $areaAprov);
        $strInsert->bindValue(':obs', $obs);

        $strInsert->execute();
        
        sleep(1);
        
        unset($_SESSION['projeto']);
        unset($_SESSION['requerimento']);
        unset($_SESSION['dataAprov']);
        unset($_SESSION['alvara']);
        unset($_SESSION['areaAprov']);
        unset($_SESSION['obs']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'CÓPIA DE PROJETO')//reimpressão ok
    {
        $convertDate = substr($_SESSION['aproData'], 6, 4).'/'.substr($_SESSION['aproData'], 3, 2).'/'.substr($_SESSION['aproData'], 0, 2);

        $numeroProjeto   = $_SESSION['projeto'];
        $dataDeAprovacao = $_SESSION['alvNum'];
        $areaConstruida  = $convertDate;
        
        $documento  = 'CÓPIA DE PROJETO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            projeto_numero=:numeroProjeto,conf_alvara=:dataDeAprovacao,data_aprov=:areaConstruida
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            projeto_numero,conf_alvara,data_aprov)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :numeroProjeto,:dataDeAprovacao,:areaConstruida)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':numeroProjeto', $numeroProjeto);
        $strInsert->bindValue(':dataDeAprovacao', $dataDeAprovacao);
        $strInsert->bindValue(':areaConstruida', $areaConstruida);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['projeto']);
        unset($_SESSION['alvNum']);
        unset($_SESSION['aproData']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'DEMOLIÇÃO')//reimpressão ok
    {
        $convertDate = substr($_SESSION['aproDem'], 6, 4).'/'.substr($_SESSION['aproDem'], 3, 2).'/'.substr($_SESSION['aproDem'], 0, 2);

        $demolirAlvara = $_SESSION['alvDem'];
        $demolirData   = $convertDate;
        $demolirArea   = $_SESSION['areaDem'];
        
        $documento  = 'DEMOLIÇÃO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            conf_alvara=:demolirAlvara,data_aprov=:demolirData,area_const=:demolirArea
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            conf_alvara,data_aprov,area_const)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :demolirAlvara,:demolirData,:demolirArea)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':demolirAlvara', $demolirAlvara);
        $strInsert->bindValue(':demolirData', $demolirData);
        $strInsert->bindValue(':demolirArea', $demolirArea);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['alvDem']);
        unset($_SESSION['aproDem']);
        unset($_SESSION['areaDem']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'DENOMINAÇÃO DE RUA')//reimpressão ok
    {
        $den_ruaAntiga = $_SESSION['den_ruaAntiga'];
        $den_ruaAtual  = $_SESSION['den_ruaAtual'];
        $den_bairro    = $_SESSION['den_bairro'];
        $den_obs       = $_SESSION['coments'];
        
        $documento  = 'DENOMINAÇÃO DE RUA';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            rua_antiga=:den_ruaAntiga,rua_atual=:den_ruaAtual,bairro_x=:den_bairro,obs=:den_obs
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            rua_antiga,rua_atual,bairro_x,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :den_ruaAntiga,:den_ruaAtual,:den_bairro,:den_obs)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':den_ruaAntiga', $den_ruaAntiga);
        $strInsert->bindValue(':den_ruaAtual', $den_ruaAtual);
        $strInsert->bindValue(':den_bairro', $den_bairro);
        $strInsert->bindValue(':den_obs', $den_obs);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['den_ruaAntiga']);
        unset($_SESSION['den_ruaAtual']);
        unset($_SESSION['den_bairro']);
        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'EMPLACAMENTO')//reimpressão ok
    {
        $convertDate = substr($_SESSION['aproEmp'], 6, 4).'/'.substr($_SESSION['aproEmp'], 3, 2).'/'.substr($_SESSION['aproEmp'], 0, 2);

        if(isset($_SESSION['emplac_chk1'])){
            $check1 = $_SESSION['emplac_chk1'];   
        }
        
        if(isset($_SESSION['emplac_chk2'])){
            $check2 = $_SESSION['emplac_chk2'];
        }
        
        $emplacAlvara    = $_SESSION['alvEmp'];
        $emplacData      = $convertDate;
        $emplacAreaConst = $_SESSION['areaEmp'];
        $obs             = $_SESSION['obsEmp'];    
        
        $documento  = 'EMPLACAMENTO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            check_box1=:check1,check_box2=:check2,conf_alvara=:emplacAlvara,data_aprov=:emplacData,area_const=:emplacAreaConst,obs=:obsEmp
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            check_box1,check_box2,conf_alvara,data_aprov,area_const,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :check1,:check2,:emplacAlvara,:emplacData,:emplacAreaConst,:obsEmp)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':check1', $check1);
        $strInsert->bindValue(':check2', $check2);
        $strInsert->bindValue(':emplacAlvara', $emplacAlvara);
        $strInsert->bindValue(':emplacData', $emplacData);
        $strInsert->bindValue(':emplacAreaConst', $emplacAreaConst);
        $strInsert->bindValue(':obsEmp', $obs);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['emplac_chk1']);
        unset($_SESSION['emplac_chk2']);
        unset($_SESSION['alvEmp']);
        unset($_SESSION['aproEmp']);
        unset($_SESSION['areaEmp']);
        unset($_SESSION['obsEmp']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'VALOR VENAL')
    {
        $valorVenal = $_SESSION['ano'];
        
        $documento  = 'VALOR VENAL';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            ano=:valorVenal
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            ano)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :valorVenal)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':valorVenal', $valorVenal);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['ano']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);    
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"')
    {
        $comentarios  = $_SESSION['coments'];
        
        $documento  = 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            obs=:comentarios
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :comentarios)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':comentarios', $comentarios);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);    
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'LADO')
    {
        $comentarios = $_SESSION['coments'];
        
        $documento  = 'LADO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            obs=:comentarios
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :comentarios)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':comentarios', $comentarios);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);   
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'FICHA CADASTRAL')//reimpressão ok
    {
        $comentarios = $_SESSION['coments'];;
        
        $documento  = 'FICHA CADASTRAL';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            obs=:comentarios
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :comentarios)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':comentarios', $comentarios);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);   
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO')//reimpressão ok
    {
        $convertDate = substr($_SESSION['aproCop'], 6, 4).'/'.substr($_SESSION['aproCop'], 3, 2).'/'.substr($_SESSION['aproCop'], 0, 2);

        $numeroAlvara    = $_SESSION['alvCop'];
        $dataDeAprovacao = $convertDate;
        $areaConstruida  = $_SESSION['areaCop'];
        
        $documento  = 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            n_cad=:im_Cadastro,n_carne=:carne,rua=:im_Rua,numero_r=:im_Numero,lote=:im_Lote,quadra=:im_Quadra,bairro_r=:im_Bairro,proprietario=:im_Proprietario,
                                                            conf_alvara=:numeroAlvara,data_aprov=:dataDeAprovacao,area_const=:areaConstruida
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            n_cad,n_carne,rua,numero_r,lote,quadra,bairro_r,proprietario,
                                                            conf_alvara,data_aprov,area_const)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :im_Cadastro,:carne,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario,
                                        :numeroAlvara,:dataDeAprovacao,:areaConstruida)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);

        $strInsert->bindValue(':im_Cadastro', $im_Cadastro);
        $strInsert->bindValue(':carne', $carne);
        $strInsert->bindValue(':im_Rua', $im_Rua);
        $strInsert->bindValue(':im_Numero', $im_Numero);
        $strInsert->bindValue(':im_Lote', $im_Lote);
        $strInsert->bindValue(':im_Quadra', $im_Quadra);
        $strInsert->bindValue(':im_Bairro', $im_Bairro);
        $strInsert->bindValue(':im_Proprietario', $im_Proprietario);

        $strInsert->bindValue(':numeroAlvara', $numeroAlvara);
        $strInsert->bindValue(':dataDeAprovacao', $dataDeAprovacao);
        $strInsert->bindValue(':areaConstruida', $areaConstruida);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['alvCop']);
        unset($_SESSION['aproCop']);
        unset($_SESSION['areaCop']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(isset($_SESSION['className']) and $_SESSION['className'] == 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO')//reimpressão ok
    {
        
        $desdCadastro1   = $_SESSION['ncad1'];
        $desdCadastro2   = $_SESSION['ncad2'];
        $desdCadastro3   = $_SESSION['ncad3'];
        $desdComentarios = $_SESSION['coments'];
        
        $documento  = 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            cad_1=:desdCadastro1,cad_2=:desdCadastro2,cad_3=:desdCadastro3,obs=:desdComentarios
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            cad_1,cad_2,cad_3,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :desdCadastro1,:desdCadastro2,:desdCadastro3,:desdComentarios)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':desdCadastro1', $desdCadastro1);
        $strInsert->bindValue(':desdCadastro2', $desdCadastro2);
        $strInsert->bindValue(':desdCadastro3', $desdCadastro3);
        $strInsert->bindValue(':desdComentarios', $desdComentarios);

        $strInsert->execute();
        
        sleep(1);

        unset($_SESSION['ncad1']);
        unset($_SESSION['ncad2']);
        unset($_SESSION['ncad3']);
        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }

    elseif(!empty($_SESSION['className']) and $_SESSION['className'] == 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO')//reimpressão ok
    {
        $unifCadastro1   = $_SESSION['ncad1'];
        $unifCadastro2   = $_SESSION['ncad2'];
        $unifCadastro3   = $_SESSION['ncad3'];
        $unifComentarios = $_SESSION['coments'];
        
        $documento  = 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO';
        
        if(isset($_SESSION['reimpressao']))
        {
            $strInsert = $pdo->prepare("UPDATE atendimentos SET num_doc=:num_doc,alt_por=:alt_por,data_alt=:data_alt,documento=:documento,
                                                            nome=:nome,cpf=:cpf,rg=:rg,tel=:telefone,cel=:celular,endereco=:endereco,numero=:numero,complemento=:complemento,bairro=:bairro,cep=:cep,cidade=:cidade,estado=:estado,
                                                            cad_1=:unifCadastro1,cad_2=:unifCadastro2,cad_3=:unifCadastro3,obs=:unifComentarios
                                                            WHERE num_doc=:num_doc");
        }else{
            $strInsert = $pdo->prepare("INSERT INTO atendimentos (num_doc,alt_por,data_alt,data_lanc,documento,
                                                            nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado,
                                                            cad_1,cad_2,cad_3,obs)
                                VALUES (:num_doc,:alt_por,:data_alt,:data_lanc,:documento,
                                        :nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado,
                                        :unifCadastro1,:unifCadastro2,:unifCadastro3,:unifComentarios)");
        }

        $strInsert->bindValue(':num_doc', $num_doc);
        $strInsert->bindValue(':alt_por', $alt_por);
        $strInsert->bindValue(':data_alt', $data_alt);
        $strInsert->bindValue(':data_lanc', $data_lanc);
        $strInsert->bindValue(':documento', $documento);

        $strInsert->bindValue(':nome', $nome);
        $strInsert->bindValue(':cpf', $cpf);
        $strInsert->bindValue(':rg', $rg);
        $strInsert->bindValue(':endereco', $endereco);
        $strInsert->bindValue(':numero', $numero);
        $strInsert->bindValue(':complemento', $complemento);
        $strInsert->bindValue(':bairro', $bairro);
        $strInsert->bindValue(':cep', $cep);
        $strInsert->bindValue(':cidade', $cidade);
        $strInsert->bindValue(':estado', $estado);
        $strInsert->bindValue(':telefone', $telefone);
        $strInsert->bindValue(':celular', $celular);

        $strInsert->bindValue(':unifCadastro1', $unifCadastro1);
        $strInsert->bindValue(':unifCadastro2', $unifCadastro2);
        $strInsert->bindValue(':unifCadastro3', $unifCadastro3);
        $strInsert->bindValue(':unifComentarios', $unifComentarios);

        $strInsert->execute();
        
        sleep(1);
        
        unset($_SESSION['ncad1']);
        unset($_SESSION['ncad2']);
        unset($_SESSION['ncad3']);
        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['new_Proprietario']);
    }
    
    if (isset($_SESSION['reimpressao']))
    {
        unset($_SESSION['reimpressao']);
        unset($_SESSION['codigoMantido']);
        unset($_SESSION['docPrint']);

        unset($_SESSION['AlvAmpl']);
        unset($_SESSION['AproAmpl']);
        unset($_SESSION['Area1Ampl']);
        unset($_SESSION['Area2Ampl']);
        unset($_SESSION['Area3Ampl']);
        unset($_SESSION['nomeN']);
        unset($_SESSION['cpfN']);
        unset($_SESSION['rgN']);
        unset($_SESSION['endN']);
        unset($_SESSION['numN']);
        unset($_SESSION['bairroN']);
        unset($_SESSION['cepN']);
        unset($_SESSION['cidadeN']);
        unset($_SESSION['estadoN']);
        unset($_SESSION['endCompleto']);
        unset($_SESSION['anoBuscaI']);
        unset($_SESSION['numAlv']);
        unset($_SESSION['dataAlv']);
        unset($_SESSION['cancArea']); 
        unset($_SESSION['menu']);
        unset($_SESSION['Motivo']);
        unset($_SESSION['AreaCarne']);
        unset($_SESSION['AnoCarne']);
        unset($_SESSION['Emitida']);
        unset($_SESSION['Areade']);
        unset($_SESSION['DesData']);
        unset($_SESSION['n_alv']);            
        unset($_SESSION['proj_data']);
        unset($_SESSION['area_Proj']);
        unset($_SESSION['UniData']);
        unset($_SESSION['cadastro1']);
        unset($_SESSION['cadastro2']);
        unset($_SESSION['cadastro3']);
        unset($_SESSION['cadastro3']);
        unset($_SESSION['cadastro4']);        
        unset($_SESSION['projeto']);
        unset($_SESSION['requerimento']);
        unset($_SESSION['dataAprov']);
        unset($_SESSION['alvara']);
        unset($_SESSION['areaAprov']);
        unset($_SESSION['obs']);
        unset($_SESSION['projeto']);
        unset($_SESSION['alvNum']);
        unset($_SESSION['aproData']);
        unset($_SESSION['alvDem']);
        unset($_SESSION['aproDem']);
        unset($_SESSION['areaDem']);
        unset($_SESSION['den_ruaAntiga']);
        unset($_SESSION['den_ruaAtual']);
        unset($_SESSION['den_bairro']);
        unset($_SESSION['emplac_chk1']);
        unset($_SESSION['emplac_chk2']);
        unset($_SESSION['alvEmp']);
        unset($_SESSION['aproEmp']);
        unset($_SESSION['areaEmp']);
        unset($_SESSION['ano']);
        unset($_SESSION['alvCop']);
        unset($_SESSION['aproCop']);
        unset($_SESSION['areaCop']);
        unset($_SESSION['ncad1']);
        unset($_SESSION['ncad2']);
        unset($_SESSION['ncad3']);
        unset($_SESSION['coments']);
        unset($_SESSION['className']);

        unset($_SESSION['new_nome']);
        unset($_SESSION['new_cpf']);
        unset($_SESSION['new_rg']);
        unset($_SESSION['new_tel']);
        unset($_SESSION['new_cel']);
        unset($_SESSION['new_end']);
        unset($_SESSION['new_num']);
        unset($_SESSION['new_complemento']);
        unset($_SESSION['new_bairro']);
        unset($_SESSION['new_cep']);
        unset($_SESSION['new_cidade']);
        unset($_SESSION['new_estado']);

        unset($_SESSION['new_Rua']);
        unset($_SESSION['new_Numero']);
        unset($_SESSION['new_Bairro']);
        unset($_SESSION['new_Lote']);
        unset($_SESSION['new_Quadra']);
        unset($_SESSION['new_Cadastro']);
        unset($_SESSION['carne']);
        unset($_SESSION['new_Carne']);
        unset($_SESSION['new_Proprietario']);

        unset($_SESSION['gravarDados']);
        
        sleep(1);
        
        echo "<script type='text/javascript'>alert('Reimpressão realizada com sucesso!')</script>";
    }else{
        $strSelect = $pdo->prepare("SELECT * FROM atendimentos WHERE num_doc = 0");
        $strSelect->execute();

            while($dados = $strSelect->FETCH(PDO::FETCH_ASSOC)){
                $retorno = "$dados[id_atendimentos]";
            }

        $cod = $retorno;

        $dia = '-'.date('d').date('m').date('y');
        $newCod = strVal($cod).$dia;

        $strUpdate = $pdo->prepare("UPDATE atendimentos SET num_doc = :newCod WHERE id_atendimentos = :retorno and num_doc = 0");
        $strUpdate->bindValue(':newCod', $newCod);
        $strUpdate->bindValue(':retorno', $retorno);
        $strUpdate->execute();

        $regUpdate = $pdo->prepare("UPDATE atendimentofinal SET registro = :newCod WHERE id_Final = 1");
        $regUpdate->bindValue(':newCod', $newCod);
        $regUpdate->execute();

    }

    unset($_SESSION['gravarDados']);

    echo "<script>window.location.replace(\"../cadgeral.php\")</script>";
}else if ($_SESSION['gravarDados'] == 'NÃO GRAVAR')
{
    unset($_SESSION['AlvAmpl']);
    unset($_SESSION['AproAmpl']);
    unset($_SESSION['Area1Ampl']);
    unset($_SESSION['Area2Ampl']);
    unset($_SESSION['Area3Ampl']);
    unset($_SESSION['nomeN']);
    unset($_SESSION['cpfN']);
    unset($_SESSION['rgN']);
    unset($_SESSION['endN']);
    unset($_SESSION['numN']);
    unset($_SESSION['bairroN']);
    unset($_SESSION['cepN']);
    unset($_SESSION['cidadeN']);
    unset($_SESSION['estadoN']);
    unset($_SESSION['endCompleto']);
    unset($_SESSION['anoBuscaI']);
    unset($_SESSION['numAlv']);
    unset($_SESSION['dataAlv']);
    unset($_SESSION['cancArea']); 
    unset($_SESSION['menu']);
    unset($_SESSION['Motivo']);
    unset($_SESSION['AreaCarne']);
    unset($_SESSION['AnoCarne']);
    unset($_SESSION['Emitida']);
    unset($_SESSION['Areade']);
    unset($_SESSION['DesData']);
    unset($_SESSION['n_alv']);            
    unset($_SESSION['proj_data']);
    unset($_SESSION['area_Proj']);
    unset($_SESSION['UniData']);
    unset($_SESSION['cadastro2']);
    unset($_SESSION['cadastro3']);
    unset($_SESSION['cadastro4']);
    unset($_SESSION['cadastro5']);
    unset($_SESSION['cadastro6']);        
    unset($_SESSION['projeto']);
    unset($_SESSION['requerimento']);
    unset($_SESSION['dataAprov']);
    unset($_SESSION['alvara']);
    unset($_SESSION['areaAprov']);
    unset($_SESSION['obs']);
    unset($_SESSION['projeto']);
    unset($_SESSION['alvNum']);
    unset($_SESSION['aproData']);
    unset($_SESSION['alvDem']);
    unset($_SESSION['aproDem']);
    unset($_SESSION['areaDem']);
    unset($_SESSION['den_ruaAntiga']);
    unset($_SESSION['den_ruaAtual']);
    unset($_SESSION['den_bairro']);
    unset($_SESSION['emplac_chk1']);
    unset($_SESSION['emplac_chk2']);
    unset($_SESSION['alvEmp']);
    unset($_SESSION['aproEmp']);
    unset($_SESSION['areaEmp']);
    unset($_SESSION['ano']);
    unset($_SESSION['alvCop']);
    unset($_SESSION['aproCop']);
    unset($_SESSION['areaCop']);
    unset($_SESSION['ncad1']);
    unset($_SESSION['ncad2']);
    unset($_SESSION['ncad3']);
    unset($_SESSION['coments']);
    unset($_SESSION['className']);

    unset($_SESSION['new_nome']);
    unset($_SESSION['new_cpf']);
    unset($_SESSION['new_rg']);
    unset($_SESSION['new_tel']);
    unset($_SESSION['new_cel']);
    unset($_SESSION['new_end']);
    unset($_SESSION['new_num']);
    unset($_SESSION['new_complemento']);
    unset($_SESSION['new_bairro']);
    unset($_SESSION['new_cep']);
    unset($_SESSION['new_cidade']);
    unset($_SESSION['new_estado']);

    unset($_SESSION['new_Rua']);
    unset($_SESSION['new_Numero']);
    unset($_SESSION['new_Bairro']);
    unset($_SESSION['new_Lote']);
    unset($_SESSION['new_Quadra']);
    unset($_SESSION['new_Cadastro']);
    unset($_SESSION['carne']);
    unset($_SESSION['new_Carne']);
    unset($_SESSION['new_Proprietario']);

    unset($_SESSION['gravarDados']);
    echo "<script>window.location.replace(\"../cadgeral.php\")</script>";    
}

?>