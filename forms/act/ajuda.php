<?php
require "../func/imp_funcoes.php";
require "../sqlCon/conect.php";

session_start();

cabecalho("Ajuda e Suporte ao usuário", "../css/ajuda.CSS");

echo "
    <div class='container-fluid'>
        <div class='menuSuperior'>
            <table>
                <tr>
                    <td id='t1'><a href='../cadgeral.php'><img src='../img/btn-home.png' width='50px' heigth='60px' alt='logo' class='botaoVoltar'></a></td>
                    <td id='t2Ajuda'><h4>AJUDA E SUPORTE AO USUÁRIO</h4></td>
                    <td id='t3'><img src='../img/PADRAO_BRASAO.png' width='50px' heigth='60px' alt='logo'></td>
                </tr>
            </table>
            <p></p>
            <label id='titleBarSub'>Aqui você encontra tutoriais em video e PDF, e também o Setor Perguntas Frequentes para tirar dúvidas.</label>
        </div>
";

echo "
        <fieldset class='bloco1' id='PDF-VIDEO'>
                <table class='PV'>
                    <tr>
                        <div id='titulo' class='card' style='border-radius: 1rem;'>
                            <label>TUTORIAIS DE UTILIZAÇÃO DO SISTEMA</label>
                        </div>
                        <td id='pdf'>
                            <div id='pdfCard' class='card' style='border-radius: 1rem;'>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como cadastrar um requerente.pdf\", 400, 600,);'>PDF -> Como cadastrar um requerente</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como editar um requerente.pdf\", 400, 600,);'>PDF -> Como editar um requerente?</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como cadastrar um imóvel.pdf\", 400, 600,);'>PDF -> Como cadastrar um imóvel?</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como editar um imóvel.pdf\", 400, 600,);'>PDF -> Como editar um imóvel?</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como emitir um requerimento.pdf\", 400, 600,);'>PDF -> Como emitir um requerimento?</a>
                            </div>
                        </td>
                        <td id='separador'></td>
                        <td id='video'>
                            <div id='videoCard' class='card' style='border-radius: 1rem;'>
                            <a href='#' onclick='window.open(\"../ajuda/video/TUTORIAL 3.mp4\", 400, 600,);'>VIDEO -> Como cadastrar um requerente</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como editar um requerente.pdf\", 400, 600,);'>VIDEO -> Como editar um requerente?</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como cadastrar um imóvel.pdf\", 400, 600,);'>VIDEO -> Como cadastrar um imóvel?</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como editar um imóvel.pdf\", 400, 600,);'>VIDEO -> Como editar um imóvel?</a>
                            <a href='#' onclick='window.open(\"../ajuda/pdf/Como emitir um requerimento.pdf\", 400, 600,);'>VIDEO -> Como emitir um requerimento?</a>
                            </div>
                        </td>
                    </tr>
                </table>
        </fieldset>

        <fieldset class='bloco2' id='PESGUNTAS'>
            <div id='titulo' class='card' style='border-radius: 1rem;'>
                <label>PERGUNTAS FREQUENTES</label>
            </div>
            <div id='perguntasCard' class='card' style='border-radius: 1rem;'>
                <label>Porque ainda vejo algumas telas de erro?</label>
                <label>Porque o sistema tem essas cores?</label>
                <label>Esse sistema serve para outros setores da Prefeitura de Leme?</label>
                <label>Como posso contribuir para melhoria do sistema?</label>
                <label>Quando os programadores podem atender aos chamados?</label>
            </div>
        </fieldset>
            
        <fieldset class='bloco3' id='SUPORTE'>
            <div id='titulo' class='card' style='border-radius: 1rem;'>
                <label>CONTATAR OS DESENVOLVEDORES</label>
            </div>
            <div id='suporteCard' class='card' style='border-radius: 1rem;'>
                <label>PARA CONTATAR O SUPORTE, AVISE O CPD PARA QUE OS DESENVOLVEDORES SEJAM CHAMADOS.</label>
                <label>Ou entre em contato com DEVLEME Sistemas: (99) 9 9999-9999</label>
            </div>
        </fieldset>
    </div>
";
rodape();
?>