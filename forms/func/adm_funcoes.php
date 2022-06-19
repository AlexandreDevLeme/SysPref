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
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
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
        <script type='text/javascript'>
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