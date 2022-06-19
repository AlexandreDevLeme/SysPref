<?php
require "../func/funcoes.php";

cabecalho("Acesso Restrito", "../css/userCAD.css");

echo "<div id='err_resposta' class='container'>
    <H2>Atenção, a tela a seguir é para uso exclusivo do administrador do sistema!<br>Se você não é um ADM, contate o suporte responsável pela manutenção do sistema.</H2><br>";
echo "<a href='cad_admin.php' class='btn btn-outline-dark position-absolute svr_newAdm2'>Continuar</a>
    <input type='button' value='Sair' class='btn btn-outline-dark botaoExit' onClick=\"fechar_pagina();\">";
exit;
echo "</div>";

    
?>