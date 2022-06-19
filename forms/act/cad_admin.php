<?php
    require "../func/adm_funcoes.php";
    require "../sqlCon/conect.php";

    cabecalho("Cadastro de Usuários", "../css/userCAD.css");
?>
    <div class="container-fluid justify-content-center align-items-center">
        
        <form id="formCadAdm" action="../sqlCon/rota.php" method="post">
            <H1 class="tituloA">Acesso restrito ao administrador</H1>

            <h4 class="tituloB">Informe login e senha de ADM</h4>
                <div class='input-group input-group-sm mb-0'>
                    <span class="input-group-text" id="inputGroup-sizing-sm">Login SQL</span>
                    <input type="password" id="svr_lg" name="svr_lg" size="15" maxlength="15" class="form-control texto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            <br>
                <div class='input-group input-group-sm mb-0'>
                    <span class="input-group-text" id="inputGroup-sizing-sm">Senha SQL</span>
                    <input type="password" id="svr_pss" name="svr_pss" size="15" maxlength="15" class="form-control texto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            <br>
                <div class='input-group input-group-sm mb-0'>
                    <span class="input-group-text" id="inputGroup-sizing-sm">Novo Nome de Administrador</span>
                    <input type="password" id="new_nameADM" name="new_nameADM" size="15" maxlength="15" class="form-control textonadm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            <br>
                <div class='input-group input-group-sm mb-0'>
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nova Senha de Administrador</span>
                    <input type="password" id="new_passADM" name="new_passADM" size="15" maxlength="15" class="form-control textonadm" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
            <br>
                <div class='input-group input-group-sm mb-0'>
                    <input type="button" value="Cadastrar novo Administrador" class="btn btn-outline-dark botao1" onClick="Submit_FormADM()">
                    <a href="cad_usuarios.php" class="btn btn-outline-dark botao2">Voltar a tela de anterior</a>
                </div>
        </form>
    </div>
<?php
    rodape();
?>