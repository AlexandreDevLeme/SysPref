<?php
//Variaveis de busca
        $texto          = "";
        $textoI         = "";
        $documento      = "";

        $codigo_edt     = "";
        $nome           = "";
        $cpf            = "";
        $rg             = "";
        $telefone       = "";
        $celular        = "";
        $endereco       = "";
        $numero         = "";
        $complemento    = "";
        $bairro         = "";
        $cep            = "";
        $cidade         = "";
        $estado         = "";

        $codigo_edtI    = "";
        $cad            = "";
        $rua            = "";
        $n_rua          = "";
        $num            = "";
        $lote           = "";
        $quadra         = "";
        $vila           = "";
        $dono           = "";

        $conforme       = "";
        $data           = "";
        $fase1          = "";
        $aumento        = "";
        $total          = "";
        $obs            = "";
        $total          = "";
        $area           = "";
        $projeto        = "";
        $requerimento   = "";
        $alvara         = "";
        $ano            = "";

        $nomeN          = "";
        $cpfN           = "";
        $rgN            = ""; 
        $enderecoN      = "";
        $numeroN        = "";
        $bairroN        = "";
        $cepN           = "";
        $cidN           = "";
        $ufN            = "";

        $den_ruaAntiga  = "";
        $den_ruaAtual   = "";
        $den_bairro     = "";

        $checkEmp       = "";
        $checkEmpAdd    = "";

        $menu           = "";
        $carne          = "";
        $motivo         = "";
        $cadastro1      = "";
        $cadastro2      = "";
        $cadastro3      = "";
        $cadastro4      = "";
        $cadastro5      = "";

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

        if(isset($_SESSION['new_Cadastro']) and $_SESSION['target'] != "../cadgeral.php"){
            //recuperando dados do imóvel
            $cad    = $_SESSION['new_Cadastro'];
            $rua    = $_SESSION['new_Rua'];
            $num    = $_SESSION['new_Numero'];
            $lote   = $_SESSION['new_Lote'];
            $quadra = $_SESSION['new_Quadra'];
            $vila   = $_SESSION['new_Bairro'];
            $dono   = $_SESSION['new_Proprietario'];
        }
        
}

if(isset($_SESSION['cadastro'])){
    $n_cadastro=$_SESSION['cadastro'];
    
    if (isset($_SESSION['reimpressao']))
    {
        $textoI=' ';
    }else{
        $textoI=$_SESSION['resultadoI'];
    }
    
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

}
if (isset($_SESSION['reimpressao']))//carregar dados para reimpressão
{
    if (!empty($_SESSION['docPrint']))
    {
        if(($_SESSION['docPrint'] == 'AMPLIAÇÃO'))
        {
            $conforme = $_SESSION['conforme'];
            $data     = $_SESSION['data'];
            $fase1    = $_SESSION['fase1'];
            $aumento  = $_SESSION['aumento'];
            $total    = $_SESSION['total'];
            $obs      = $_SESSION['obs'];
        }
        elseif(($_SESSION['docPrint'] == 'ATUALIZAÇÃO DOS DADOS CADASTRAIS'))
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
            $obs           = $_SESSION['obs'];
        }
        elseif ($_SESSION['docPrint'] == 'BUSCAS DE IPTU')
        {
            $ano           = $_SESSION['ano'];
        }
        elseif ($_SESSION['docPrint'] == 'CANCELAMENTO DE ALVARÁ')
        {
            $alvara      = $_SESSION['canceAlv'];
            $data        = $_SESSION['cancApr'];
            $area        = $_SESSION['cancArea']; 
            $obs         = $_SESSION['coments']; 
        }
        elseif ($_SESSION['docPrint'] == 'CONSTRUÇÃO/HABITE-SE')
        {
            if ($_SESSION['projeto'] == 'X'){
                $projeto  = 'Checked';
                $requerimento = 'UnChecked';

            }elseif ($_SESSION['requerimento'] == 'X'){
                $projeto  = 'UnChecked';
                $requerimento = 'Checked';
            }
            $data         = $_SESSION['dataAprov'];
            $alvara       = $_SESSION['alvara'];
            $area         = $_SESSION['areaAprov'];
            $obs          = $_SESSION['obs'];
        }
        elseif ($_SESSION['docPrint'] == 'CÓPIA DE PROJETO')
        {
            $projeto  = $_SESSION['projeto'];
            $alvara   = $_SESSION['alvNum'];
            $data     = $_SESSION['aproData'];
        }
        elseif ($_SESSION['docPrint'] == 'DEMOLIÇÃO')
        {
            $alvara   = $_SESSION['alvDem'];
            $data     = $_SESSION['aproDem'];
            $area     = $_SESSION['areaDem'];
        }
        elseif ($_SESSION['docPrint'] == 'DENOMINAÇÃO DE RUA')
        {
            $den_ruaAntiga  = $_SESSION['den_ruaAntiga'];
            $den_ruaAtual   = $_SESSION['den_ruaAtual'];
            $den_bairro     = $_SESSION['den_bairro'];
            $obs            = $_SESSION['coments'];                 
        }
        elseif ($_SESSION['docPrint'] == 'EMPLACAMENTO')
        {
            if ($_SESSION['emplac_chk1'] == 'X'){
                $checkEmp    = 'Checked';
                $checkEmpAdd = 'UnChecked';

            }elseif ($_SESSION['emplac_chk2'] == 'X'){
                $checkEmp    = 'UnChecked';
                $checkEmpAdd = 'Checked';
            }
            $data         = $_SESSION['aproEmp'];
            $alvara       = $_SESSION['alvEmp'];
            $area         = $_SESSION['areaEmp'];
            $obs          = $_SESSION['obsEmp'];
        }
        elseif ($_SESSION['docPrint'] == 'LADO')
        {
            $obs          = $_SESSION['coments']; 
        }
        elseif ($_SESSION['docPrint'] == 'FICHA CADASTRAL')
        {
            $obs          = $_SESSION['coments'];
        }
        elseif ($_SESSION['docPrint'] == 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"')
        {
            $obs          = $_SESSION['coments'];
        }
        elseif ($_SESSION['docPrint'] == 'VALOR VENAL')
        {
            $ano          = $_SESSION['ano'];
        }
        elseif ($_SESSION['docPrint'] == 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO')
        {
            $alvara     =   $_SESSION['n_alv'];
            $data       =   $_SESSION['proj_data'];
            $area       =   $_SESSION['area_Proj'];
        }
        elseif ($_SESSION['docPrint'] == 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO')
        { 
            $cadastro1      = $_SESSION['ncad1'];
            $cadastro2      = $_SESSION['ncad2'];
            $cadastro3      = $_SESSION['ncad3'];
            $obs            = $_SESSION['coments'];
        }
        elseif ($_SESSION['docPrint'] == 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO')
        {
            $cadastro1      = $_SESSION['ncad1'];
            $cadastro2      = $_SESSION['ncad2'];
            $cadastro3      = $_SESSION['ncad3'];
            $obs            = $_SESSION['coments'];
        }
        elseif ($_SESSION['docPrint'] == 'REVISÃO DE IPTU')
        {
            $menu           =   $_SESSION['menu'];                
            $motivo         =   $_SESSION['Motivo'];
            $carne          =   $_SESSION['carne'];

            if ($_SESSION['menu'] == '1')
            {
                $area       =   $_SESSION['AreaCarne'];
                $ano        =   $_SESSION['AnoCarne'];
            }elseif ($_SESSION['menu'] == '2')
            {
                $ano        =   $_SESSION['Emitida'];
                $area       =   $_SESSION['Areade'];
            }elseif ($_SESSION['menu'] == '3')
            {  
                $data       =   $_SESSION['DesData'];
                $cadastro1  =   $_SESSION['cadastro1'];
                $cadastro2  =   $_SESSION['cadastro2'];
                $cadastro3  =   $_SESSION['cadastro3'];
                $cadastro4  =   $_SESSION['cadastro4'];
                $cadastro5  =   $_SESSION['cadastro5'];     
            }elseif ($_SESSION['menu'] == '4')
            {
                $alvara     =   $_SESSION['n_alv'];
                $data       =   $_SESSION['proj_data'];
                $area       =   $_SESSION['area_Proj'];
            }elseif ($_SESSION['menu'] == '6')
            {
                $data       =   $_SESSION['UniData'];
                $cadastro1  =   $_SESSION['cadastro1'];
                $cadastro2  =   $_SESSION['cadastro2'];
                $cadastro3  =   $_SESSION['cadastro3'];
                $cadastro4  =   $_SESSION['cadastro4'];
                $cadastro5  =   $_SESSION['cadastro5'];     
            } 
        }
    }else{
        $conforme       = ' ';
        $data           = ' ';
        $fase1          = ' ';
        $aumento        = ' ';
        $total          = ' ';
        $obs            = ' ';
        $nomeN          = ' ';
        $cpfN           = ' ';
        $rgN            = ' '; 
        $enderecoN      = ' ';
        $numeroN        = ' ';
        $bairroN        = ' ';
        $cepN           = ' ';
        $cidN           = ' ';
        $ufN            = ' ';
        $ano            = ' ';
        $projeto        = ' ';
        $requerimento   = ' ';
        $alvara         = ' ';
        $area           = ' ';
    }   
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