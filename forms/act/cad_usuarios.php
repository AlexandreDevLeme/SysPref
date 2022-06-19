<?php
    require "../func/adm_funcoes.php";
    require "../sqlCon/conect.php";

    cabecalho("Cadastro de Usuários", "../css/userCAD.css");
?>
    <div class="container-fluid justify-content-center align-items-center">

        <form id="formAcessCad" action="../sqlCon/rota.php" method="post">
                
                <H1 class="tituloA">Acesso restrito ao administrador</H1>

                <h4 class="tituloB">Informe login e senha de ADM</h4>
                    <div class='input-group input-group-sm mb-0'>
                        <span class='input-group-text' id='inputGroup-sizing-sm'>Nome de Administrador</span>
                        <input type='text' id='nameADM' name='nameADM' size='15' maxlength='15' class='form-control texto' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    </div>
                <br>
                    <div class='input-group input-group-sm mb-0'>    
                        <span class='input-group-text' id='inputGroup-sizing-sm'>Senha de Administrador</span>
                        <input type='password' id='passADM' name='passADM' size='15' maxlength='15' class='form-control texto' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    </div>
                <br>
                    <div>
                        <input type='button' value='Acessar Sistema de Cadastro' class='btn btn-outline-dark botao' onClick="Submit_FormACSS()">
                        <input type='button' value='Sair' class='btn btn-outline-dark botaoSair' onClick="fechar_pagina();">
                    </div>
                <br>
                    <a href='./Advertencia.php' class="svr_newCad">Não há Cadastro de ADM</a>
            
        </form>
    </div>
<?php
    rodape();
?>