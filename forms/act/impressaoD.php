<?php
//Liberando no apache acesso de qualquer dominio
header("Acces-Control-Allow_Origin: *");

require_once "../func/imp_funcoes.php";
require_once "../class/printClass.php";
require_once "../sqlCon/conect.php";

cabecalho("IMPRESSÃO DE REQUERIMENTOS","../css/impressaoD.css");

$documento = $referencia->formName;
$informacao = $referencia->formObs;

//VERIFICA NO BANCO DE DADOS O NÚMERO DO ULTIMO REQUERIMENTO
$newCod = $pdo->prepare("SELECT * FROM atendimentofinal");
$newCod->execute();

while ($row = $newCod->FETCH(PDO::FETCH_ASSOC)){
    $next = $row['registro'];
}

 //GERAR A STRING CONCATENANDO '-' COM A DATA DO DIA ATUAL
$dia = '-'.date('d').date('m').date('y');

//COLETAR O NÚMERO DO CÓDIGO DO ULTIMO REGISTRO
$matriz = IntVal(substr($next, 0, (strpos($next, '-')))) + 1;

//CONERTER O NÚMERO DE INT PARA STRING
$calc = strlen($matriz);

if (isset($_SESSION['codigoMantido']))
{
    $_id = $_SESSION['codigoMantido'];
}else{
     //GERAR O NOVO NUMERO DE REQUERIMENTO
    if($_SESSION['gravarDados'] == 'NÃO GRAVAR')
    {
        $_id = '____________';  
    }else{
        $_id = StrVal($matriz).$dia;
    }
}

 //RECUPERAR DA SESSÃO O NOME DO OPERADOR
$_op = $_SESSION['operador'];

 //GRAVAR EM SESSÃO O NOME DO REQUERIMENTO
$_SESSION['className'] = $documento;

$mes = array(
    '01'=>'Janeiro',
    '02'=>'Fevereiro',
    '03'=>'Março',
    '04'=>'Abril',
    '05'=>'Maio',
    '06'=>'Junho',
    '07'=>'Julho',
    '08'=>'Agosto',
    '09'=>'Setembro',
    '10'=>'Outubro',
    '11'=>'Novembro',
    '12'=>'Dezembro'
);
echo "<div class='container'>
    <div class='folha'>";

    echo "<div class='cabecalho_print'>ILMO SR. PREFEITO DO MUNICÍPIO DE LEME</div>";

    echo "
        <label class='lbl-1 position-absolute'>$Contribuinte->req_Name</label>
        <label class='lbl-2 position-absolute'>$Contribuinte->req_CPF</label>
        <label class='lbl-3 position-absolute'>$Contribuinte->req_RG</label>
        <label class='lbl-4 position-absolute'>$Contribuinte->req_End</label>
        <label class='lbl-5 position-absolute'>$Contribuinte->req_Contato</label>
    <br>
        <div class='linha-fx'>Eu, ________________________________________________________________________________, brasileiro(a),</div>
        <div class='linha-fx'>CPF n°, _______________________________________, RG n° _________________________________________ ,</div>
        <div class='linha-fx'>Residente em __________________________________________________________________________________ , </div>
        <div class='linha-fx'>Telefone, _________________________________</div><p>
    ";

    echo "<div class='doc_print'>Abaixo assinado, vem mui respeitosamente solicitar ao Núcleo de Fiscalização de obras, que se digne a efetuar o <label class='varDoc'>$documento</label> do imóvel abaixo:</div>";

    echo "
        <label class='lbl-6 position-absolute'>$Residencia->im_Rua</label>
        <label class='lbl-7 position-absolute'>$Residencia->im_Numero</label>
        <label class='lbl-8 position-absolute'>$Residencia->im_Lote</label>
        <label class='lbl-9 position-absolute'>$Residencia->im_Quadra</label>
        <label class='lbl-10 position-absolute'>$Residencia->im_Bairro</label>
        <label class='lbl-11 position-absolute'>$Residencia->im_Cadastro</label>
        <label class='lbl-12 position-absolute'>$Residencia->im_Proprietario</label>
    <br>
        <div class='linha-fx'>Rua/Av. __________________________________________________________________________, n° __________ </div>
        <div class='linha-fx'>Lote ________________________, Quadra _________________, Bairro ___________________________________ </div>
        <div class='linha-fx'>Cadastrado nessa municipalidade sob n° ____________________________________</div>
        <div class='linha-fx'>Proprietário ____________________________________________________________________________________ </div><br>
    ";

    echo "
        <div class='data'>Leme, ". date('d'). " de ". $mes[date("m")]. " de ". date('Y'). ".</div>
        <div class='linha position-absolute'><br>_________________________________________</div>
        <div class='ass position-absolute'>Assinatura do requerente</div><br>
    ";

    echo "<div class='campoEmplac'>";
        require_once "./dadosForPrint.php";
    echo "</div>";

    echo "
        <p>
        <div class='rodape'><img src='../img/dengue.png' width='220px' heigth='80px' alt='logo'></div>
        <img src='../img/proteja-se.png' width='180px' heigth='60px' alt='logo' class='covid position-relative'>
        <div class='identific'>id Req. $_id  -  $_op</div><br>
    ";

        echo "<div class='NoBT'><span class='material-icons' role='button' onClick='submit_Saida()'>local_printshop</span></div>";

echo "</div></div>";
?>
<?php
    rodape();
?>