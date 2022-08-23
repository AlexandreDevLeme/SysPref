<?php

require "../func/funcoes.php";
require "../sqlCon/conect.php";

session_start();

cabecalho("Histórico de Atendimento", "../css/atendimento.CSS");

if(isset($_SESSION['bdlogado']))
{
    $perfil = $_SESSION['bdlogado'];
}else{
        echo "<script>window.location.replace(\"../index.php\")</script>";
}

echo "
    <div class='container-fluid'><!-- ABERTURA DO CONAINER -->
        <div class='menuSuperior'><!--Botão de acesso ao menu lateral e titulo da tela principal-->
            <table>
                <tr>
                    <td id='t1'><a href='../cadgeral.php'><img src='../img/btn-home.png' width='50px' heigth='60px' alt='logo' class='botaoVoltar'></a></td>
                    <td id='t2'><h4>PESQUISA DE DADOS REFERENTES A ATENDIMENTOS ANTERIORES</h4></td>
                    <td id='t3'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                </tr>
            </table>
            <label id='logado' name='logado' class='lblPerfil'>$perfil</label>
        </div>
";

//Selecionando dados de requerentes e imóveis ja cadastrados
$order   = '';
$check_0 = '';
$check_1 = '';
$check_2 = '';
$check_3 = '';
$check_4 = '';
$check_5 = '';
$tabela  = '';
$filtro  = "";

if (isset($_SESSION['FiltrarTable'])){
    if ($_SESSION['FiltrarTable'] == 'num_doc'){
        $check_0 = 'Checked';
    }
    if ($_SESSION['FiltrarTable'] == 'data_lanc'){
        $check_1 = 'Checked';
    }
    if ($_SESSION['FiltrarTable'] == 'documento'){
        $check_2 = 'Checked';
    }
    if ($_SESSION['FiltrarTable'] == 'nome'){
        $check_3 = 'Checked';
    }
    if ($_SESSION['FiltrarTable'] == 'cpf'){
        $check_4 = 'Checked';
    }
    if ($_SESSION['FiltrarTable'] == 'n_cad'){
        $check_5 = 'Checked';
    }
}

if (isset($_SESSION['FiltrarTable'])){
    $order = $_SESSION['FiltrarTable'];
    $tabela = $order;
    $filtro = $_SESSION['palavra'];
}

echo "
    <label id='titleBarReq'>Aqui estão sendo exibidas as principais informações sobre os atendimentos</label>
";
echo "
    <form id='capture' action='../sqlCon/rota.php' method='post'>
    
    <div class='input-group input-group-sm mb-0 filtro-box form-check'>
        <span class='input-group-text FillCheck' id='inputGroup-sizing-sm'>Buscar filtro</span>
        <input type='text' id='FillCamp' name='FillCamp' value='$filtro' size='14' maxlength='50' class='form-control txtFill' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Descreva o filtro'>
        <input type='button' value='Carregar dados' class='btn btn-outline-dark buscaFill' onClick='Submit_Capture()'>
        <input type='text' name='text' id='text' value='$order' class='npVision'></input>
    </div>
    <div class='input-group input-group-sm mb-0 check-filtro form-check'>
        <label class='form-check-label f0' for='flexCheckDefault'></label>
        <input class='form-check-input' type='checkbox' value='num_doc' id='flexCheckDefault' onclick=\"marcaDesmarca(this)\" $check_0/><label class='form-check-label f1' for='flexCheckDefault' ReadOnly>F. Req.</label>
        <input class='form-check-input' type='checkbox' value='data_lanc' id='flexCheckDefault' onclick=\"marcaDesmarca(this)\" $check_1/><label class='form-check-label f2' for='flexCheckDefault' ReadOnly>Filtrar Data</label>
        <input class='form-check-input' type='checkbox' value='documento' id='flexCheckDefault' onclick=\"marcaDesmarca(this)\" $check_2/><label class='form-check-label f3' for='flexCheckDefault' ReadOnly>Filtrar Documento</label>
        <input class='form-check-input' type='checkbox' value='nome' id='flexCheckDefault' onclick=\"marcaDesmarca(this)\" $check_3/><label class='form-check-label f4' for='flexCheckDefault' ReadOnly>Filtrar Requerente</label>
        <input class='form-check-input' type='checkbox' value='cpf' id='flexCheckDefault' onclick=\"marcaDesmarca(this)\" $check_4/><label class='form-check-label f5' for='flexCheckDefault' ReadOnly>Filtrar CPF</label>
        <input class='form-check-input' type='checkbox' value='n_cad' id='flexCheckDefault' onclick=\"marcaDesmarca(this)\" $check_5/><label class='form-check-label f6' for='flexCheckDefault' ReadOnly>Filtrar Cadastro</label>
    </div>
    <div class='input-group input-group-sm mb-0 filtro'>
        <label class='form-check-label f7' for='flexCheckDefault' ReadOnly></label>
        <label class='form-check-label f8' for='flexCheckDefault' ReadOnly>N° Req.</label>
        <label class='form-check-label f9' for='flexCheckDefault' ReadOnly>Data</label>
        <label class='form-check-label f10' for='flexCheckDefault' ReadOnly>Operador</label>
        <label class='form-check-label f11' for='flexCheckDefault' ReadOnly>Documento</label>
        <label class='form-check-label f12' for='flexCheckDefault' ReadOnly>Requerente</label>
        <label class='form-check-label f13' for='flexCheckDefault' ReadOnly>CPF</label>
        <label class='form-check-label f14' for='flexCheckDefault' ReadOnly>N° Cadastro</label>
    </div>
    
    </form>

    <div class='reqDiv'>";

            if ($order != '')
            {
                if ($filtro != "" && $order == '')
                {
                    $dados = $pdo->prepare("SELECT id_atendimentos,num_doc,alt_por,data_lanc,documento,nome,cpf,n_cad FROM atendimentos WHERE '1=1' and $tabela like '%$filtro%' order by id_atendimentos");
                }elseif ($filtro != "" && $order != '')
                {
                    $dados = $pdo->prepare("SELECT id_atendimentos,num_doc,alt_por,data_lanc,documento,nome,cpf,n_cad FROM atendimentos WHERE '1=1' and $tabela like '%$filtro%' order by $order");
                }elseif ($filtro == "" && $order != '')
                {
                    $dados = $pdo->prepare("SELECT id_atendimentos,num_doc,alt_por,data_lanc,documento,nome,cpf,n_cad FROM atendimentos WHERE '1=1' order by $order");
                }else{
                    $dados = $pdo->prepare("SELECT id_atendimentos,num_doc,alt_por,data_lanc,documento,nome,cpf,n_cad FROM atendimentos WHERE '1=1' order by id_atendimentos");
                }
        
                $dados->execute();

                echo "<table id='tableReq' class='table table-hover'>";
    
                    while($row = $dados->FETCH(PDO::FETCH_ASSOC)){
                        $convertDate = substr($row['data_lanc'], 8, 2).'/'.substr($row['data_lanc'], 5, 2).'/'.substr($row['data_lanc'], 0, 4);
                        echo "<Tr id='linhas'>";
                        echo "<td class='npVision'>$row[id_atendimentos]</td>";
                        echo "<td>$row[num_doc]</td>";
                        echo "<td>$convertDate</td>";
                        echo "<td>$row[alt_por]</td>";
                        echo "<td>$row[documento]</td>";
                        echo "<td>$row[nome]</td>";
                        echo "<td>$row[cpf]</td>";
                        echo "<td>$row[n_cad]</td>";
                        echo "<td>
                        <a href='../sqlCon/rota.php?codigoPrint=$row[num_doc]' class='btn btn-primary btnBD' onclick=\"return confirm('Confirma a impressão do registro?')\">Imprimir</a>
                        </td>";
                        echo "</tr>";
                    }
                echo "</table></div><br>";
            }else{
                $dados = $pdo->prepare("SELECT id_atendimentos,num_doc,alt_por,data_lanc,documento,nome,cpf,n_cad FROM atendimentos WHERE '1=1' order by id_atendimentos");
        
                $dados->execute();

                echo "<table id='tableReq' class='table table-hover'>";
    
                    while($row = $dados->FETCH(PDO::FETCH_ASSOC)){
                        $convertDate = substr($row['data_lanc'], 8, 2).'/'.substr($row['data_lanc'], 5, 2).'/'.substr($row['data_lanc'], 0, 4);
                        echo "<Tr id='linhas'>";
                        echo "<td class='npVision'>$row[id_atendimentos]</td>";
                        echo "<td>$row[num_doc]</td>";
                        echo "<td>$convertDate</td>";
                        echo "<td>$row[alt_por]</td>";
                        echo "<td>$row[documento]</td>";
                        echo "<td>$row[nome]</td>";
                        echo "<td>$row[cpf]</td>";
                        echo "<td>$row[n_cad]</td>";
                        echo "<td>
                        <a href='../sqlCon/rota.php?codigoPrint=$row[num_doc]' class='btn btn-primary btnBD' onclick=\"return confirm('Confirma a impressão do registro?')\">Imprimir</a>
                        </td>";
                        echo "</tr>";
                    }
                echo "</table></div><br>";
            }

        echo "<script type='text/javascript' src='../js/ativaCheckBox.js'></script>";
        echo "<script type='text/javascript'>
                document.getElementById('FillCamp').focus();
              </script>
             ";

echo "
    </div>
";   
echo "
    </div>
";  
unset($_SESSION['FiltrarTable']);

rodape();
?>