<?php
function cabecalho($Titulo, $Estilos)
{echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head><!--Itens do head e scripts-->
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$Titulo</title>
    
        <!--Estilos Locais CSS -->
        <link rel='stylesheet' type='text/css' href='$Estilos'>
        <!--Estilos BootStrap Offline-->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <script src='http://localhost/SysPref/forms/js/bootstrap.min.js'></script>
        <!--Icones Google Fonts -->
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        <!--Funções JQUERY  e fonts-->
        <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script><!--Necessário para consultar endereço por CEP.-->
        <script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>  <!-- Necessario para a criação de mascaras java scrypt -->
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js'></script> <!-- Necessario para a criação de mascaras java scrypt -->
        <script src='https://use.fontawesome.com/62e43a72a9.js'></script>
        <script src='https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
        <!--############################################################################################################################################################# -->
        <!-- Mascara para os valores -->
        <script type='text/javascript'><!--Máscaras das text box-->
            $(document).ready(function(){
            $('#valor').mask('#.###,##');
            $('#data1').mask('##/##/####');
            $('#data2').mask('##/##/####');
            $('#data3').mask('##/##/####');
            $('#aproData').mask('##/##/####');
            $('#aproAmpl').mask('##/##/####');
            $('#aproCop').mask('##/##/####');
            $('#cancApr').mask('##/##/####');
            $('#tel').mask('(##) ####-####');
            $('#cel').mask('(##) # ####-####');
            $('#ncad1').mask('##.####.####.###');
            $('#ncad2').mask('##.####.####.###');
            $('#ncad3').mask('##.####.####.###');
            $('#ncad4').mask('##.####.####.###');
            $('#ncad5').mask('##.####.####.###');
            $('#ncad6').mask('##.####.####.###');
            $('#ncad7').mask('##.####.####.###');
            $('#transferCad').mask('##.####.####.###');
            });
        </script>
        <script type='text/javascript'>
            function placeholders() {
                document.getElementsByName('nomeR')[0].placeholder='Nome do requerene';
                document.getElementsByName('rgR')[0].placeholder='Número do RG';
                document.getElementsByName('telR')[0].placeholder='(00) 0000-0000';
                document.getElementsByName('celR')[0].placeholder='(00) 0 0000-0000';
                document.getElementsByName('endR')[0].placeholder='Rua onde o requerente mora';
                document.getElementsByName('numR')[0].placeholder='Número';
                document.getElementsByName('complementoR')[0].placeholder='Complemento do requerene';
                document.getElementsByName('bairroR')[0].placeholder='Bairro do requerene';
                document.getElementsByName('cidR')[0].placeholder='Cidade do Requerente';
                document.getElementsByName('ufR')[0].placeholder='Estado / UF';
                document.getElementsByName('transferCad')[0].placeholder='00.0000.0000.000';
                document.getElementsByName('rua')[0].placeholder='Rua do imóvel';
                document.getElementsByName('num')[0].placeholder='N° do imóvel';
                document.getElementsByName('vila')[0].placeholder='Bairro do imóvel';
                document.getElementsByName('lote')[0].placeholder='N° do lote';
                document.getElementsByName('quadra')[0].placeholder='N° da quadra';
                document.getElementsByName('ncad1')[0].placeholder='00.0000.0000.000';
                document.getElementsByName('nome')[0].placeholder='Nome do proprietário do imóvel';
            }
        </script>
        <script type='text/javascript'><!--Função para alternar entre CPF e CNPJ-->
        $(document).ready(function() {

            $(\".i2\").mask(\"999.999.999-99\").attr('placeholder', '000.000.000-00');
            $(\".pesq_cpf\").mask(\"999.999.999-99\").attr('placeholder', '000.000.000-00');
            
            $('.toggle').click(function() {
              $(\"#cpf\").toggleClass('i2');
              $(\"#cpf\").val('');
              if (document.getElementById('cpf').placeholder == \"000.000.000-00\")
              {
                $(\".i2\").mask(\"99.999.999/9999-99\").attr('placeholder', '00.000.000/0000-00');
              }else{
                $(\".i2\").mask(\"999.999.999-99\").attr('placeholder', '000.000.000-00');
              }
              $(\"#cpf4\").toggleClass('pesq_cpf');
              $(\"#cpf4\").val('');
              if (document.getElementById('cpf4').placeholder == \"000.000.000-00\")
              {
                $(\".pesq_cpf\").mask(\"99.999.999/9999-99\").attr('placeholder', '00.000.000/0000-00');
              }else{  
                $(\".pesq_cpf\").mask(\"999.999.999-99\").attr('placeholder', '000.000.000-00');
              }
            })
          
            $(\"#cpf4\").on(\"blur\", function() {
              var last = $(this).val().substr($(this).val().indexOf(\"-\") + 1);
          
              if (last.length == 3) {
                var move = $(this).val().substr($(this).val().indexOf(\"-\") - 1, 1);
                var lastfour = move + last;
          
                var first = $(this).val().substr(0, 9);
          
                $(this).val(first + '-' + lastfour);
              }
            });

            $(\"#cpf\").on(\"blur\", function() {
                var last = $(this).val().substr($(this).val().indexOf(\"-\") + 1);
            
                if (last.length == 3) {
                  var move = $(this).val().substr($(this).val().indexOf(\"-\") - 1, 1);
                  var lastfour = move + last;
            
                  var first = $(this).val().substr(0, 9);
            
                  $(this).val(first + '-' + lastfour);
                }
              });
          });
        </script>
        <script type='text/javascript'><!--Funções limpeza de boxes e submits-->
            function limpaReq(){
            document.getElementById('nomeR').value=\"\";
            document.getElementById('cpf').value=\"\";
            document.getElementById('rg').value=\"\";
            document.getElementById('tel').value=\"\";
            document.getElementById('cel').value=\"\";
            document.getElementById('endereco').value=\"\";
            document.getElementById('numero').value=\"\";
            document.getElementById('complemento').value = \"\";
            document.getElementById('bairro').value=\"\";
            document.getElementById('cep').value=\"\";
            document.getElementById('cidade').value=\"\";
            document.getElementById('inputGroupSelect01').value=\"\";
            }
            function limpaIm(){
                document.getElementById('buscaCEP').value=\"\";
                document.getElementById('rua').value=\"\";
                document.getElementById('num').value=\"\";
                document.getElementById('lote').value=\"\";
                document.getElementById('quadra').value=\"\";
                document.getElementById('vila').value=\"\";
                document.getElementById('ncad1').value=\"\";
                document.getElementById('nomeP').value=\"\";
            }
            function Submit_FormReq(){
                document.getElementById('formCadReq').submit();
            }
            function Submit_FormIm(){
                document.getElementById('formCadIm').submit();
            }
            function Submit_BuscaCPF_Principal(){
                document.getElementById('formBuscaCPF').submit();
            }
            function Submit_BuscaCAD_Principal(){
                document.getElementById('formBuscaCad').submit();
            }
            function Submit_BuscaCPF(){
                var VBusca = document.getElementById('cpf4').value;
                document.getElementById('receptor').value = VBusca;
                document.getElementById('formBuscaCPF').submit();
            }
            function Submit_BuscaCAD(){
                var VBusca = document.getElementById('transferCad').value;
                document.getElementById('ncad7').value = VBusca;
                document.getElementById('formBuscaCad').submit();
            }
            function Submit_FormADM(){
                document.getElementById('formCadAdm').submit();
            }
            function Submit_FormACSS(){
                document.getElementById('formAcessCad').submit();
            }
            function Submit_FormOPE(){
                document.getElementById('formCadUsers').submit();
            }
            function fechar_pagina() {
                if (confirm(\"Deseja fechar a pagína atual?\")) {
                window.close();
                }
            }
            <!--Função do botão para liberar o menu da sessão de escolhas de menu-->
            function Submit_Opened(){
                if (confirm(\"Esta ação vai remover os campos abaixo! \u000ADeseja continuar?\")) {
                    document.getElementById(\"campoS\").disabled = false;
                    document.getElementById(\"campoS\").value = \"\";
                    document.getElementById(\"liberar\").disabled = true;
                    document.getElementById(\"temp\").remove();
                    document.getElementById(\"dados-revisao\").style.height = \"\";
                }
            }
        </script>
        <script language=\"javascript\" type=\"text/javascript\"><!--Função para escolha de serviços na Revisão de IPTU-->
            function OnSelectionChange (select) {
                
                var escolha = select.options[select.selectedIndex];
                if (escolha.value == 1){

                    select.disabled = \"true\";
                    document.getElementById(\"liberar\").disabled = false;
                    document.getElementById(\"motivo\").value = 1;

                    var d = document.getElementById('revisao');
                    $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu1' aligin-itens='inline'><span class='input-group-text X1 position-static' id='inputGroup-sizing-sm'>Área no carnê de IPTU</span><input type='text' id='areaCarne' name='areaCarne' value='' size='32' maxlength='32' class='form-control X2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a área do carnê'><span class='input-group-text X3 position-static' id='inputGroup-sizing-sm'>Desde</span><input type='text' id='anoCarne' name='anoCarne' value='' size='4' maxlength='4' class='form-control X4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o ano'></nav>\");
                    document.getElementById(\"temp\").style.display = \"\";
                    
                } else if (escolha.value == 2){

                    select.disabled = \"true\";
                    document.getElementById(\"liberar\").disabled = false;
                    document.getElementById(\"motivo\").value = 2;

                    var d = document.getElementById('revisao');
                    $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu2' aligin-itens='inline'><span class='input-group-text X1 position-static' id='inputGroup-sizing-sm'>Emitida em</span><input type='text' id='emitida' name='emitida' value='' size='32' maxlength='32' class='form-control X2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o ano de emissão'><span class='input-group-text X3 position-static' id='inputGroup-sizing-sm'>Área de</span><input type='text' id='areade' name='areade' value='' size='4' maxlength='4' class='form-control X4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a área lançada'></nav>\");
                    document.getElementById(\"temp\").style.display = \"\";

                } else if (escolha.value == 3){
                    select.disabled = \"true\";
                    document.getElementById(\"liberar\").disabled = false;
                    document.getElementById(\"motivo\").value = 3;

                    var d = document.getElementById('revisao');
                    $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu3' aligin-itens='inline'><span class='input-group-text X31 position-static' id='inputGroup-sizing-sm'>Data:</span><input type='text' id='des_data' name='des_data' value='' size='10' maxlength='10' class='form-control X32 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Data de aprovação'><span class='input-group-text X33 position-static' id='inputGroup-sizing-sm'>Cadastros</span><input type='text' id='ncad2' name='ncad2' value='' size='16' maxlength='16' class='form-control X34 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 1° cadastro'><input type='text' id='ncad3' name='ncad3' value='' size='16' maxlength='16' class='form-control X35 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 2° cadastro'><input type='text' id='ncad4' name='ncad4' value='' size='16' maxlength='16' class='form-control X36 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 3° cadastro'><input type='text' id='ncad5' name='ncad5' value='' size='16' maxlength='16' class='form-control X37 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 4° cadastro'><input type='text' id='ncad6' name='ncad6' value='' size='16' maxlength='16' class='form-control X38 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 5° cadastro'></nav>\");
                    document.getElementById(\"temp\").style.display = \"\";

                } else if (escolha.value == 4){
                    select.disabled = \"true\";
                    document.getElementById(\"liberar\").disabled = false;
                    document.getElementById(\"motivo\").value = 4;
                    
                    var d = document.getElementById('revisao');
                    $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu4' aligin-itens='inline'><span class='input-group-text X41 position-static' id='inputGroup-sizing-sm'>Alvará n°</span><input type='text' id='n_alv' name='n_alv' value='' size='10' maxlength='10' class='form-control X42 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='N° do alvará'><span class='input-group-text X43 position-static' id='inputGroup-sizing-sm'>Data</span><input type='text' id='proj_data' name='proj_data' value='' size='10' maxlength='10' class='form-control X44 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a data de aprovação'><span class='input-group-text X45 position-static' id='inputGroup-sizing-sm'>Área de</span><input type='text' id='area_proj' name='area_proj' value='' size='4' maxlength='4' class='form-control X46 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe a área do projeto'></nav>\");
                    document.getElementById(\"temp\").style.display = \"\";

                } else if (escolha.value == 5){
                    select.disabled = \"true\";
                    document.getElementById(\"liberar\").disabled = false;
                    document.getElementById(\"motivo\").value = 5;
                        
                    var d = document.getElementById('revisao');
                    $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu5' aligin-itens='inline'><div class='form-check'><div class'content_5'><div class='form-check'><input class='form-check-input' type='checkbox' value='' id='flexCheckDefault' checked><label class='form-check-label' for='flexCheckDefault'>Revisão de categoria da construção</label></div></div></div></nav>\");
                    document.getElementById(\"temp\").style.display = \"\";
                } else if (escolha.value == 6){
                    select.disabled = \"true\";
                    document.getElementById(\"liberar\").disabled = false;
                    document.getElementById(\"motivo\").value = 6;

                    var d = document.getElementById('revisao');
                    $(\"#revisao\").append(d.innerHTML + \"<nav id='temp' class='input-group input-group-sm mb-0 position-static menu6' aligin-itens='inline'><span class='input-group-text X61 position-static' id='inputGroup-sizing-sm'>Data:</span><input type='text' id='uni_data' name='uni_data' value='' size='10' maxlength='10' class='form-control X62 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Data de aprovação'><span class='input-group-text X63 position-static' id='inputGroup-sizing-sm'>Cadastros</span><input type='text' id='ncad2' name='ncad2' value='' size='16' maxlength='16' class='form-control X64 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 1° cadastro'><input type='text' id='ncad3' name='ncad3' value='' size='16' maxlength='16' class='form-control X65 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 2° cadastro'><input type='text' id='ncad4' name='ncad4' value='' size='16' maxlength='16' class='form-control X66 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 3° cadastro'><input type='text' id='ncad5' name='ncad5' value='' size='16' maxlength='16' class='form-control X67 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 4° cadastro'><input type='text' id='ncad6' name='ncad6' value='' size='16' maxlength='16' class='form-control X68 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' placeholder='Informe o 5° cadastro'></nav>\");
                    document.getElementById(\"temp\").style.display = \"\";
                }
            }
        </script>
        <script type='text/javascript'><!--Verificação e confirmação do preenchimento dos campos-->
            function Print_Sub()
            {
                if (document.getElementById('nome').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('nome').focus();
                    }
                }else if (document.getElementById('cpf').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('cpf').focus();
                    }
                }else if (document.getElementById('rg').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('rg').focus();
                    }
                }else if (document.getElementById('telefone').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('telefone').focus();
                    }
                }else if (document.getElementById('celular').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('celular').focus();
                    }
                }else if (document.getElementById('endereco').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('endereco').focus();
                    }
                }else if (document.getElementById('numero').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('numero').focus();
                    }
                }else if (document.getElementById('complemento').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('complemento').focus();
                    }
                }else if (document.getElementById('bairro').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('bairro').focus();
                    }
                }else if (document.getElementById('cidade').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('cidade').focus();
                    }
                }else if (document.getElementById('uf').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('uf').focus();
                    }
                }else if (document.getElementById('rua').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('rua').focus();
                    }
                }else if (document.getElementById('num').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('num').focus();
                    }
                }else if (document.getElementById('vila').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('vila').focus();
                    }
                }else if (document.getElementById('lote').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('lote').focus();
                    }
                }else if (document.getElementById('quadra').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('quadra').focus();
                    }
                }else if (document.getElementById('ncad1').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('ncad1').focus();
                    }
                }else if (document.getElementById('nomeP').value == \"\"){
                    var redirecionar = confirm(\"Há campos não preenchidos. \u000ADeseja continuar?\");
                    if (redirecionar == true) {
                        document.getElementById('Submit_Print').submit();
                    }else{
                        document.getElementById('nomeP').focus();
                    }
                }else{
                    document.getElementById('Submit_Print').submit();
                }
            }
        </script>
    </head>
    <body class='fundo' onload=\"placeholders()\">";

}
function rodape()
{
    echo "<br>
    </body>
    </html>";
}

function verificacampotextoim($campoI, $valor)
{
    if ($valor == "")
    {
        
        //session_destroy();
        echo "<H2>Atenção, o campo $campoI deve ser preenchido!</H2><p>";
            echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar'></a>";
            exit;
    }
}
function verificaAdm($campoAdm, $valor)
{
    if ($valor != "")
    {
         
    }else{
        if($_SESSION["server_lg"] == ""){
            $tituloADM = "Login SQL";
        }elseif($_SESSION["server_pss"] == ""){
            $tituloADM = "Senha SQL";
        }elseif($_SESSION["adm_name"] == ""){
            $tituloADM = "Novo Nome de Administrador";
        }elseif($_SESSION["adm_pss"] == ""){
            $tituloADM = "Nova Senha de Administrador";
        }

        session_destroy();
        echo "<div id='err_resposta' class='container'>
            <H2>Atenção, o campo $tituloADM deve ser preenchido!</H2><br>";
            echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
            echo "</div>";
    }
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

        echo "<div id='err_resposta' class='container'>
            <H2>Atenção, o campo $tituloI deve ser preenchido!</H2><br>";
            echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }
}

function verificaCadOP($campoOP, $valor)
{
    if ($valor != "")
    {
        $_SESSION['dadosOP'] = "Operador";
    }else{
        if($campoOP == "nameUSER"){
            $tituloOP = "Nome de usuário";
        }elseif($campoOP == "mailUSER"){
            $tituloOP = "E-mail";
        }elseif($campoOP == "passUSER"){
            $tituloOP = "Senha de acesso";
        }elseif($campoOP == "cpassUSER"){
           $tituloOP = "Confirme a senha de acesso";          
        }elseif($campoOP == "operUSER"){
            $tituloOP = "Primeiro nome do operador";
        }elseif($campoOP == "subOperUSER"){
            $tituloOP = "Sobrenome do Operador";
        }elseif($campoOP == "matUSER"){
            $tituloOP = "Matrícula";
        }elseif($campoOP == "dnUSER"){
            $tituloOP = "Data de nascimento";
        }

        echo "<div id='err_resposta' class='container'>
            <H2>Atenção, o campo $tituloOP deve ser preenchido!</H2><br>";
            echo "<a href='javascript:window.history.back();'>
                <input type='button' value='Voltar a tela de cadastro'></a>";
            exit;
        echo "</div>";
    }
}

function get_endereco($cep){


    // formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";
  
    $xml = simplexml_load_file($url);
    return $xml;
  }
