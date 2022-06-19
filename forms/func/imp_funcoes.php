<?php
function cabecalho($Titulo, $Estilos)
{echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$Titulo</title>
    
        <!--Estilos Locais CSS -->
        <link rel='stylesheet' type='text/css' href='$Estilos'>
        <!-- CSS only -->
	<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor\" crossorigin=\"anonymous\">
        <script src='http://localhost/SysPref/forms/js/bootstrap.min.js'></script>
        <!--Icones Google Fonts -->
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        <!--Funções JQUERY  e fonts-->
        <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.2.1.min.js\"></script><!--Necessário para consultar endereço por CEP.-->
        <script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>  <!-- Necessario para a criação de mascaras java scrypt -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js'></script> <!-- Necessario para a criação de mascaras java scrypt -->
        <script src='https://use.fontawesome.com/62e43a72a9.js'></script>
        <!--############################################################################################################################################################# -->
        <!-- Mascara para os valores -->
        <script type='text/javascript'>
            $(document).ready(function(){
            $('#valor').mask('#.###,##');
            $('#data1').mask('##/##/####');
            $('#data2').mask('##/##/####');
            $('#data3').mask('##/##/####');
            $('#cpf').mask('###.###.###-##');
            $('#cpf2').mask('###.###.###-##');
            $('#cpf3').mask('###.###.###-##');
            $('#cpf4').mask('###.###.###-##');
            $('#rg').mask('##.###.###-#');
            $('#rg2').mask('##.###.###-#');
            $('#rg3').mask('##.###.###-#');
            $('#cel').mask('(##) # ####-####');
            $('#tel').mask('(##) ####-####');
            $('#ncad1').mask('##.####.####.###');
            $('#ncad2').mask('##.####.####.###');
            $('#ncad3').mask('##.####.####.###');
            $('#ncad4').mask('##.####.####.###');
            $('#ncad5').mask('##.####.####.###');
            $('#ncad6').mask('##.####.####.###');
            $('#ncad7').mask('##.####.####.###');
            });
        </script>
        <script type='text/javascript'>
            function submit_Saida(){
                javascript:window.print();
                javascript:window.location.replace(\"../sqlCon/addAtendimento.php\");
            }
        </script>
    </head>
    <body class='tela'>";
}
function rodape()
{
    echo "
    </body>
    </html>";
}

function verificaReq($campoR, $valor)
{
    if ($valor != "")
    {
        $_SESSION['dadosR'] = "Requerente";
    }else{
        if($campoR == "nomeR"){
            $tituloR = "Nome do requerente";
        }elseif($campoR == "cpfR"){
            $tituloR = "CPF do requerente";
        }elseif($campoR == "rgR"){
            $tituloR = "RG do requerente";
        }elseif($campoR == "celR"){
            $tituloR = "Celular do requerente";
        }elseif($campoR == "endR"){
            $tituloR = "Endereço do requerente";
        }elseif($campoR == "numR"){
            $tituloR = "Número do requerente";
        }elseif($campoR == "bairroR"){
            $tituloR = "Bairro do requerente";
        }elseif($campoR == "cidR"){
            $tituloR = "Cidade do requerente";
        }elseif($campoR == "ufR"){
            $tituloR = "Estado/UF do requerente";
        }

        session_destroy();
        echo "<div id='err_resposta' class='container'>
            <H2>Atenção, o campo $tituloR deve ser preenchido!</H2><br>";
            echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
            echo "</div>";
    }
}
function verificaIM($campoI, $valor)
{
    if ($valor != "")
    {
        $_SESSION['dadosI'] = "Imovel";
    }else{
        if($campoI == "rua"){
            $tituloI = "Rua / Avenida do imóvel";
        }elseif($campoI == "num"){
            $tituloI = "Número do imóvel";
        }elseif($campoI == "vila"){
            $tituloI = "Bairro do imóvel";
        }elseif($campoI == "lote"){
            $tituloI = "Lote do imóvel";
        }elseif($campoI == "quadra"){
            $tituloI = "Quadra do imóvel";
        }elseif($campoI == "ncad1"){
            $tituloI = "Número de cadastro do imóvel";
        }elseif($campoI == "nome"){
            $tituloI = "Proprietário do imóvel";
        }

        session_destroy();
        echo "<div id='err_resposta' class='container'>
            <H2>Atenção, o campo $tituloI deve ser preenchido!</H2><br>";
            echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }
}