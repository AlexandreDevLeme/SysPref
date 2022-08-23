<?php
require "../func/funcoesC.php";
require "../sqlCon/conect.php";

session_start();

cabecalho("Certidão de Denominação de Rua", "../css/formularios.css", "");
/*########################################################################################*/
/*#################### VARIAVEIS PARA ARMAZENAR OS DESTINOS DOS LINKS ####################*/
/*#### VERIFICANDO A EXISTENCIA DE DADOS PARA PREENCHIMENTO DE RETORNO DAS CONSULTAS #####*/
$_SESSION['target'] = "../formularios/certDenominacaoRua.php";
if(isset($_SESSION['bdlogado']))
{
    $perfil = $_SESSION['bdlogado'];
}else{
    echo "<script>window.location.replace(\"../index.php\")</script>";
}
require "../sqlCon/Consulta_R_I.php";
/*########################### Dados do requerente ################################*/
echo "
    <div class='container-fluid'>
";
    echo "
            <div class='menuSuperior'><!--Botão de acesso ao menu lateral e titulo da tela principal-->
                <table>
                    <tr>
                        <td id='t1'><a href='../cadgeral.php'><img src='../img/btn-home.png' width='50px' heigth='60px' alt='logo' class='botaoVoltar'></a></td>
                        <td id='t2DenoR'><h4>PREENCHIMENTO DE CERTIDÃO DE DENOMINAÇÃO DE RUA</h4></td>
                        <td id='t3'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                    </tr>
                </table>
                <label id='logado' name='logado' class='lblPerfil'>$perfil</label>
            </div>
        ";
        echo "
        <form id='formBuscaCad' action='../sqlCon/rota.php' method='post'>    
            <div id='npVision' class='trasferirDados position-absolute'><!--captura e transfere os dados para realização da consulta de imóveis-->
                <input type='text' id='ncad7' name='ncadI1' size='16' maxlength='16' value=''>
            </div>
        </form>
        <form id='formBuscaCPF' action='../sqlCon/rota.php' method='post'>
            <div id='npVision' class='trasferirDados position-absolute'><!--Abertura da div busca requerente-->
                <input type='text' id='receptor' name='cpfR1' size='14' maxlength='14' value=''>
            </div>
        </form>
        <form id='Submit_Print' action='../act/impressaoC.php' method='post' class='form-control-inline'>
            <div class='reg_requerente background1'><!--Abertura da div requerente-->
                <div class='input-group input-group-sm mb-0 busca_requerente'><!--Abertura da div busca requerente-->   
                    <h4 class='titleR'>Dados do Requerente</h4>    
                    <span class='input-group-text toggle conCPF_txt position-static' id='inputGroup-sizing-sm'>Buscar Requerente por CPF</span>
                    <input type='text' id='cpf4' name='transferCpf' size='14' maxlength='20' class='form-control pesq_cpf position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <input type='button' value='Carregar dados' class='btn btn-outline-light buscaCPF2 position-static' onClick='Submit_BuscaCPF()'>
                    <label id='edt_id' name='edt_id' class='edt_id'>$codigo_edt</label>
                </div>
                <div class='input-group input-group-sm mb-0 title1 position-static'>
                    <label id='status_busca' name='status_busca' class='retornoBusca'>$texto</label>
                </div>
                    <div class='input-group input-group-sm mb-0 inp1 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Nome Requerente</span>
                    <input type='text' id='nome' name='nomeR' value='$nome' class='form-control i1 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
                <div class='input-group input-group-sm mb-0 inp2 position-static'>
                    <span class='input-group-text toggle position-static' id='inputGroup-sizing-sm'>N° do CPF</span>
                    <input type='text' id='cpf' name='cpfR' size='14' maxlength='20' value='$cpf' class='form-control i2 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>N° do RG</span>
                    <input type='text' id='rg' name='rgR' size='12' maxlength='12' value='$rg' class='form-control i3 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Telefone Fixo</span>
                    <input type='text' id='telefone' name='telR' size='16' maxlength='14' value='$telefone' class='form-control i4 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Celular</span>
                    <input type='text' id='celular' name='celR' size='17' maxlength='16' value='$celular' class='form-control i5 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
                <div class='input-group input-group-sm mb-0 inp3 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Endereço</span>
                    <input type='text' id='endereco' name='endR' value='$endereco' class='form-control i6 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Número</span>
                    <input type='text' id='numero' name='numR' size='5' maxlength='5' value='$numero' class='form-control i7 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Complemento</span>
                    <input type='text' id='complemento' name='complementoR' value='$complemento' class='form-control i000 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
                <div class='input-group input-group-sm mb-0 inp4 position-static'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Bairro</span>
                    <input type='text' id='bairro' name='bairroR' value='$bairro' class='form-control i8 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Cidade</span>
                    <input type='text' id='cidade' name='cidR' value='$cidade' class='form-control i10 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                    <label class='input-group-text position-static' for='inputGroupSelect01 uf'>Estado</label>
                    <input type='text' id='uf' name='ufR' value='$estado' class='form-control i11 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                </div>
            </div><!--Fechamento da div requerente-->
        <p>
    ";
    /*########################### Dados do Individuais ################################*/
    echo "
        <div class='reg_imovel background2'><!--Abertura da div imovel-->
            <div class='input-group input-group-sm mb-0 inp6 position-static'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Antiga Rua</span>
                <input type='text' id='ruaAntiga' name='ruaAntiga' value='$den_ruaAntiga' class='form-control i12 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='input-group input-group-sm mb-0 inp8 position-static'>
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Atual Rua</span>
                <input type='text' id='ruaAtual' name='ruaAtual' value='$den_ruaAtual' class='form-control i12 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='input-group input-group-sm mb-0 inp8 position-static'>    
                <span class='input-group-text position-static' id='inputGroup-sizing-sm'>Bairro</span>
                <input type='text' id='vila' name='vila' value='$den_bairro' size='50' maxlength='50' class='form-control i16 position-static' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
            </div>
            <div class='form-floating'>
                <textarea class='form-control denrua4 position-static' name='coments' id='floatingTextarea2 comentarios' style='height: 100px'>$obs</textarea>
                <label for='floatingTextarea2'>Observações</label>
            </div>
        </div>
    <p>";
/*########################### Botão Imprimir ################################*/
echo "
    <div class='dados-denoR background3'>
        <button type='button' class='btn btn-outline-light' onClick=\"Print_Sub()\">IMPRIMIR</button>
    </div>
    <input type='text' id='motivo' name='className' value='DENOMINAÇÃO DE RUA' class='motivo'></input>
    </form>
";
echo "
    </div>
";
rodape();
?>