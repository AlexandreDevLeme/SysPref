<?php
//Variaveis de busca
        $texto       = "";
        $textoI      = "";
        $documento   = "";

        $codigo_edt  = "";
        $nome        = "";
        $cpf         = "";
        $rg          = "";
        $telefone    = "";
        $celular     = "";
        $endereco    = "";
        $numero      = "";
        $complemento = "";
        $bairro      = "";
        $cep         = "";
        $cidade      = "";
        $estado      = "";

        $codigo_edtI = "";
        $cad         = "";
        $rua         = "";
        $n_rua       = "";
        $num         = "";
        $lote        = "";
        $quadra      = "";
        $vila        = "";
        $dono        = "";

        $_SESSION['docAtual']="";

    if(isset($_SESSION['cpf'])){
        $documento=$_SESSION['cpf'];
        if(isset($_SESSION['resultado'])){
            $texto=$_SESSION['resultado'];
        }
    
    $sql = $pdo->prepare("SELECT * FROM requerente where cpf=:documento");
    $sql->bindValue(':documento', $documento);
    $sql->execute();

        //Busca as informações do Banco de Dados
        while ($row = $sql->fetch(PDO::FETCH_ASSOC))
        {
            //Recebendo valores da busca
            $codigo_edt  = $row['id_Requerente'];
            $nome        = $row['nome'];
            $cpf         = $row['cpf'];
            $rg          = $row['rg'];
            $telefone    = $row['tel'];
            $celular     = $row['cel'];
            $endereco    = $row['endereco'];
            $numero      = $row['numero'];
            $complemento = $row['complemento'];
            $bairro      = $row['bairro'];
            $cep         = $row['cep'];
            $cidade      = $row['cidade'];
            $estado      = $row['estado'];
        }

        $_SESSION['new_nome']       = "$nome";
        $_SESSION['new_cpf']        = "$cpf";
        $_SESSION['new_rg']         = "$rg";
        $_SESSION['new_tel']        = "$telefone";
        $_SESSION['new_cel']        = "$celular";
        $_SESSION['new_end']        = "$endereco";
        $_SESSION['new_num']        = "$numero";
        $_SESSION['new_complemento']= "$complemento";
        $_SESSION['new_bairro']     = "$bairro";
        $_SESSION['new_cep']        = "$cep";
        $_SESSION['new_cidade']     = "$cidade";
        $_SESSION['new_estado']     = "$estado";
        $_SESSION['docAtual']       = $_SESSION['target'];

        if($_SESSION['target'] == "../cadgeral.php"){
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
        }

        if(isset($_SESSION['Cadastro']) and $_SESSION['target'] != "../cadgeral.php"){
            //recuperando dados do imóvel
            $cad    = $_SESSION['new_Cadastro'];
            $rua    = $_SESSION['new_Rua'];
            $num    = $_SESSION['new_Numero'];
            $lote   = $_SESSION['new_Lote'];
            $quadra = $_SESSION['new_Quadra'];
            $vila   = $_SESSION['new_Bairro'];
            $dono   = $_SESSION['new_Proprietario'];
        }
        
    }elseif(isset($_SESSION['cadastro'])){
        $n_cadastro=$_SESSION['cadastro'];
        $textoI=$_SESSION['resultadoI'];
    
    $sql = $pdo->prepare("SELECT * FROM imovel where n_cad=:n_cadastro");
    $sql->bindValue(':n_cadastro', $n_cadastro);
    $sql->execute();

        //Busca as informações do Banco de Dados
        while ($row = $sql->fetch(PDO::FETCH_ASSOC))
        {
            //Recebendo valores da busca
            $codigo_edtI = $row['id_imovel'];
            $cad         = $row['n_cad'];
            $rua         = $row['rua'];
            $num         = $row['numero'];
            $lote        = $row['lote'];
            $quadra      = $row['quadra'];
            $vila        = $row['bairro'];
            $dono        = $row['proprietario'];
        }

        $_SESSION['new_Rua']          = "$rua";
        $_SESSION['new_Numero']       = "$num";
        $_SESSION['new_Bairro']       = "$vila";
        $_SESSION['new_Lote']         = "$lote";
        $_SESSION['new_Quadra']       = "$quadra";
        $_SESSION['new_Cadastro']     = "$cad";
        $_SESSION['new_Proprietario'] = "$dono";
        $_SESSION['docAtual']         = $_SESSION['target'];

        if($_SESSION['target'] == "../cadgeral.php"){
            unset($_SESSION['new_Rua']);
            unset($_SESSION['new_Numero']);
            unset($_SESSION['new_Bairro']);
            unset($_SESSION['new_Lote']);
            unset($_SESSION['new_Quadra']);
            unset($_SESSION['new_Cadastro']);
            unset($_SESSION['new_Proprietario']);
        }

        if (isset($_SESSION['new_cpf']) and $_SESSION['target'] != "../cadgeral.php"){
            //recuperando os dados do requerente
            $nome        = $_SESSION['new_nome'];
            $cpf         = $_SESSION['new_cpf'];
            $rg          = $_SESSION['new_rg'];
            $telefone    = $_SESSION['new_tel'];
            $celular     = $_SESSION['new_cel'];
            $endereco    = $_SESSION['new_end'];
            $numero      = $_SESSION['new_num'];
            $complemento = $_SESSION['new_complemento'];
            $bairro      = $_SESSION['new_bairro'];
            $cep         = $_SESSION['new_cep'];
            $cidade      = $_SESSION['new_cidade'];
            $estado      = $_SESSION['new_estado'];
            
        }

        /*if($_SESSION['target'] != "../cadgeral.php"){
            if(isset($_SESSION['representante'])){
                $id=$_SESSION['representante'];
        
                $sql = $pdo->prepare("SELECT * FROM requerente where id_Requerente=:id");
                $sql->bindValue(':id', $id);
                $sql->execute();

                //Busca as informações do Banco de Dados caso a consulta venha de um formulario de atendimento
                while ($row = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    //Recebendo valores da busca
                    $codigo_edt  = $row['id_Requerente'];
                    $nome        = $row['nome'];
                    $cpf         = $row['cpf'];
                    $rg          = $row['rg'];
                    $telefone    = $row['tel'];
                    $celular     = $row['cel'];
                    $endereco    = $row['endereco'];
                    $numero      = $row['numero'];
                    $complemento = $row['complemento'];
                    $bairro      = $row['bairro'];
                    $cep         = $row['cep'];
                    $cidade      = $row['cidade'];
                    $estado      = $row['estado'];
                }
            }
        }*/
    }
    if(isset($_SESSION['resultado'])){
        $texto=$_SESSION['resultado'];
    }elseif(isset($_SESSION['resultadoI'])){
        $textoI=$_SESSION['resultadoI'];
    }
    
    unset($_SESSION['cpf']);
    unset($_SESSION['cadastro']);
    unset($_SESSION['resultado']);
    unset($_SESSION['resultadoI']);
    unset($_SESSION['representante']);
/*###### Fim da consulta ######*/
?>