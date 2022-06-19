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
$dados = $pdo->prepare("SELECT id_atendimentos,num_doc,alt_por,data_lanc,documento,nome,cpf,n_cad FROM atendimentos order by id_atendimentos");
$dados->execute();

echo "
    <label id='titleBarReq'>Aqui estão sendo exibidas as principais informações sobre os atendimentos</label>
";
echo "
    <div class='input-group input-group-sm mb-0 filtro-box form-check'>
        <span class='input-group-text FillCheck' id='inputGroup-sizing-sm'>Buscar filtro</span>
        <input type='text' id='FillCamp' name='FillCamp' size='14' maxlength='50' class='form-control txtFill' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Descreva o filtro'>
        <input type='button' value='Carregar dados' class='btn btn-outline-dark buscaFill' onClick='Submit_BuscaCPF()'>
    </div>
    <div class='input-group input-group-sm mb-0 check-filtro form-check'>
        <label class='form-check-label f0' for='flexCheckDefault'></label>
        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' /><label class='form-check-label f1' for='flexCheckDefault'>F. Req.</label>
        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' /><label class='form-check-label f2' for='flexCheckDefault'>Filtrar Data</label>
        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' /><label class='form-check-label f3' for='flexCheckDefault'>Filtrar Documento</label>
        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' /><label class='form-check-label f4' for='flexCheckDefault'>Filtrar Requerente</label>
        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' /><label class='form-check-label f5' for='flexCheckDefault'>Filtrar CPF</label>
        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' /><label class='form-check-label f6' for='flexCheckDefault'>Filtrar Cadastro</label>
    </div>
    <div class='input-group input-group-sm mb-0 filtro'>
        <label class='form-check-label f7' for='flexCheckDefault'></label>
        <label class='form-check-label f8' for='flexCheckDefault'>N° Req.</label>
        <label class='form-check-label f9' for='flexCheckDefault'>Data</label>
        <label class='form-check-label f10' for='flexCheckDefault'>Operador</label>
        <label class='form-check-label f11' for='flexCheckDefault'>Documento</label>
        <label class='form-check-label f12' for='flexCheckDefault'>Requerente</label>
        <label class='form-check-label f13' for='flexCheckDefault'>CPF</label>
        <label class='form-check-label f14' for='flexCheckDefault'>N° Cadastro</label>
    </div>
    <div class='reqDiv'>";
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
        <a href='#' class='btn btn-primary btnBD' onclick=\"return confirm('Confirma a impressão do registro?')\">Imprimir</a>
        </td>";
        echo "</tr>";
    }
        echo "</table></div><br>";

echo "
    <script type='text/javascript'>
        alert('Para agilizar a consulta \u000ASelecione um filtro e descreva o valor ou nome procurado');
    </script>
    </div>
";

rodape();
?>