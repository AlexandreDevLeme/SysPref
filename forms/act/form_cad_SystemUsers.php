<?php
    require "../func/adm_funcoes.php";
    require "../sqlCon/conect.php";

    cabecalho("Cadastro de Usuários", "../css/userCAD.css");
?>
    <div class="container-fluid justify-content-center align-items-center">

        <form id="formCadUsers" name="f1" action="../sqlCon/alimentadorBD.php" method="post">
        
            <H1 class="tituloA">Ficha de cadastro de operadores do sistema</H1>

            <h4 class="tituloB">Informe os dados solicitados</h4>
                <div class="input-group input-group-sm mb-0 uNome">
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Nome de Usuário</span>
                    <input type='text' id='nameUSER' name='nameUSER' size='15' maxlength='15' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uMail">
                    <span class='input-group-text' id='inputGroup-sizing-sm'>E-mail</span>
                    <input type='email' pattern="[a-zA-Z]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,}" required="required" id='mailUSER' name='mailUSER' size='50' maxlength='50' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uSenha">    
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Senha de Acesso</span>
                    <input type='password' id='passUSER' name='passUSER' size='15' maxlength='15' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uCSenha">    
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Confirme a Senha de Acesso</span>
                    <input type='password' id='cpassUSER' name='cpassUSER' size='15' maxlength='15' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uOper">
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Primeiro nome do operador</span>
                    <input type='text' id='operUSER' name='operUSER' size='50' maxlength='50' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uSubOper">    
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Sobrenome do operador</span>
                    <input type='text' id='subOperUSER' name='subOperUSER' size='100' maxlength='100' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uMatricula">
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Matrícula</span>
                    <input type='text' id='matUSER' name='matUSER' size='8' maxlength='8' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="input-group input-group-sm mb-0 uDNasc">    
                    <span class='input-group-text' id='inputGroup-sizing-sm'>Data de nascimento</span>
                    <input type='text' id='data3' name='dnUSER' size='10' maxlength='10' class='form-control campo' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            <br>
                <div class="btnFrmUser">
                    <input type='button' value='Gravar dados do novo operador' class='btn btn-outline-dark btnFCadOP' onClick="Submit_FormOPE()">
                    <a href="cad_usuarios.php" class="btn btn-outline-dark btnFCadOP2">Voltar a tela de anterior</a>
                </div>
        </form>
    </div>
<?php
    rodape();
?>