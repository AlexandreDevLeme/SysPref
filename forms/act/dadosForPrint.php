<?php

if ($referencia->formName == 'AMPLIAÇÃO')//gravando em banco
{
    echo "
        <label class='lbl-13 position-absolute'>$ampliacao->AlvAmpl</label>
        <label class='lbl-14 position-absolute'>$ampliacao->AproAmpl</label>
        <label class='lbl-15 position-absolute'>$ampliacao->Area1Ampl</label>
        <label class='lbl-16 position-absolute'>$ampliacao->Area2Ampl</label>
        <label class='lbl-17 position-absolute'>$ampliacao->Area2Ampl</label>
    <br>
        <div class='linha-fx'>Construido conforme alvará n° __________________________, aprovado em _____________ foi edificado em</div>
        <div class='linha-fx'>sua 1° fase uma área de _____________ m², posteriormente sofreu uma alteração de ________________ m²</div>
        <div class='linha-fx'>totalizando uma área de construção de ________________ m²</div><br>
    ";

    echo "
        <br>
        <label class='lbl-113'>Observações:</label>
        <div id='obsCampoLado'>$ampliacao->obs</div>
        <br>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['AlvAmpl']      = $ampliacao->AlvAmpl;
    $_SESSION['AproAmpl']     = $ampliacao->AproAmpl;
    $_SESSION['Area1Ampl']    = $ampliacao->Area1Ampl;
    $_SESSION['Area2Ampl']    = $ampliacao->Area2Ampl;
    $_SESSION['Area3Ampl']    = $ampliacao->Area3Ampl;
    $_SESSION['obs']          = $ampliacao->obs;
}

elseif ($referencia->formName == 'ATUALIZAÇÃO DOS DADOS CADASTRAIS') //gravando em banco
{
    echo "
        <label class='lbl-73A position-absolute'>$atualizaCad->nomeN</label>
        <label class='lbl-71 position-absolute'>$atualizaCad->cpfN</label>
        <label class='lbl-72 position-absolute'>$atualizaCad->rgN</label>
    <br>
        <div class='linha-fx'>Para ________________________________________________________________________________________</div>
        <div class='linha-fx'>CPF n° _______________________________________ RG __________________________________________ </div><br>
        <div class='linha-fx'><div class='doc_print'>Endereço tributário: $atualizaCad->enderecoTrib</div></div><br>";
        if ($atualizaCad->obs <> "") 
        {
            echo "
                <label class='lbl-23'>Observações:</label>
                <div id='obsCampoAtualizaCad'>$atualizaCad->obs</div><br>
            ";
        }
    
    echo "<div class='linha-fx'><div class='doc_print'>Conforme cópia de: escritura ou contrato; RG/CPF dos proprietários e comprovante de endereço em anexo.</div></div>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['nomeN']        = $atualizaCad->nomeN;
    $_SESSION['cpfN']         = $atualizaCad->cpfN;
    $_SESSION['rgN']          = $atualizaCad->rgN;
    $_SESSION['endN']         = $atualizaCad->enderecoN;
    $_SESSION['numN']         = $atualizaCad->numeroN;
    $_SESSION['bairroN']      = $atualizaCad->bairroN;
    $_SESSION['cepN']         = $atualizaCad->cepN;
    $_SESSION['cidadeN']      = $atualizaCad->cidadeN;
    $_SESSION['estadoN']      = $atualizaCad->estadoN;
    $_SESSION['endCompleto']  = $atualizaCad->enderecoTrib;
    $_SESSION['obs']          = $atualizaCad->obs;
}

elseif ($referencia->formName == 'BUSCAS DE IPTU') //gravando em banco
{
    $_SESSION['anoBuscaI'] = $buscas->anoBuscaI;
}
elseif ($referencia->formName == 'CANCELAMENTO DE ALVARÁ') //gravando em banco
{
    echo "
        <label class='lbl-73 position-absolute'>$cancelaCad->canceAlv</label>
        <label class='lbl-74 position-absolute'>$cancelaCad->cancApr</label>
        <label class='lbl-75 position-absolute'>$cancelaCad->cancArea</label>
    ";
    echo "<div class='linha-fx'>Conforme alvará n° __________________________ aprovado em __________________________  área aprovada de ______________________ m²</div><br>
          <label>Obsevações:</label>      
          <div class='linha-fx'><div class='CancelOBS'>$cancelaCad->coments</div></div>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['canceAlv']   = $cancelaCad->canceAlv;
    $_SESSION['cancApr']    = $cancelaCad->cancApr;
    $_SESSION['cancArea']   = $cancelaCad->cancArea;
    $_SESSION['coments']    = $cancelaCad->coments;
}

elseif ($referencia->formName == 'CONFRONTANTES') //gravando em banco
{
    echo "<label class='lbl-76 position-absolute'>Obs.: Anexar cópia do croqui.</label>";
    $_SESSION['obs']    = "Obs.: Anexar cópia do croqui.";
}

elseif ($referencia->formName == 'CONSTRUÇÃO/HABITE-SE') //gravando em banco
{
    echo "
        <label class='lbl-18 position-absolute'>$const_habite->projeto</label>
        <label class='lbl-19 position-absolute'>$const_habite->requerimento</label>
        <label class='lbl-20 position-absolute'>$const_habite->dataAprov</label>
        <label class='lbl-21 position-absolute'>$const_habite->alvara</label>
        <label class='lbl-22 position-absolute'>$const_habite->areaAprov</label>
        <br>
        <div class='linha-fx'>Projeto  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </div>
        <div class='linha-fx'>Requerimento  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </div>
        <div class='linha-fx'>Data de aprovação ________________     Alvará n° ___________________     Área aprovada __________________ m² </div><br>
        <label class='lbl-23'>Observações:</label>
        <div id='obsCampo'>$const_habite->obs</div>";
    echo "
        <div class='data'>Leme, ". date('d'). " de ". $mes[date("m")]. " de ". date('Y'). ".</div>
        
        <div class='linhaASS'><br>_________________________________________</div>
        <div class='assNCI'><label class='lbl-OBS3'>Obs.: Obrigatório já ter emplacamento.</label>N.C.I</div>";

    echo "
        <div class='cerco'>
            <div class='quadro_nfo'>
                <div class='topo-nfo'>
                    NÚCLEO DE FISCALIZAÇÃO DE OBRAS
                </div>
                <label class='vistoria'>1. VISTORIA</label><label class='S-nfo'>SIM</label><label class='N-nfo'>NÃO</label>
                <div>
                    <label class'recuo'>Cobertura _ _ _ _ _ _ _ _ _ _ _ _ _ _ __</label><label class='nfo-sim pf7 position-absolute'></label><label class='nfo-nao pf1 position-absolute'></label><br>
                    <label class'recuo'>Revestimento _ _ _ _ _ _ _ _ _ _ _ _ __</label><label class='nfo-sim pf8 position-absolute'></label><label class='nfo-nao pf2 position-absolute'></label><br>
                    <label class'recuo'>Eletrificação _ _ _ _ _ _  _ _ _ _ _ _ _ _</label><label class='nfo-sim pf9 position-absolute'></label><label class='nfo-nao pf3 position-absolute'></label><br>
                    <label class'recuo'>Pintura _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</label><label class='nfo-sim pf10 position-absolute'></label><label class='nfo-nao pf4 position-absolute'></label><br>
                    <label class'recuo'>Esquadrias _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</label><label class='nfo-sim pf11 position-absolute'></label><label class='nfo-nao pf5 position-absolute'></label><br>
                    <label class'recuo'>Vidros _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ __</label><label class='nfo-sim pf12 position-absolute'></label><label class='nfo-nao pf6 position-absolute'></label><br>
                    <label class'recuo'>Área Construida: ________________________ m²</label><br>
                    <label class'recuo'>OBS.:____________________________________</label><br>
                    <label class'recuo'>_________________________________________</label><br>
                </div>
                    <label class'recuo'>2. CONCLUSÃO</label><br>
                    <label class'recuo'>Em que condições de ser habitada:</label>
                <div class='markOPT'>SIM<label class='cx-sim'></label>            NÃO<label class='cx-nao'></label></div>
                <div class='data'>Leme, ______ de ___________________ de ". date('Y'). ".</div>
                <div class='linhaNFO'>_________________________________________</div>
                <div class='assNFO'>N.F.O</div>
            </div>
            <div class='quadro_saecil'>
            <div class='topo-saecil'>
                    FISCALIZAÇÃO - SAECIL
                </div>
                <label class='S-saecil'>SIM</label><label class='N-saecil'>NÃO</label>
                <div>
                    <label class'recuo'>Ligação de água _ _ _ _ _ _ _ _ _ _ _ _ _</label><label class='saecil-sim sc9 position-absolute'></label><label class='saecil-nao sc1 position-absolute'></label><br>
                    <label class'recuo'>Ligação de esgoto_ _ _ _ _ _ _ _ _ _ _ _</label><label class='saecil-sim sc10 position-absolute'></label><label class='saecil-nao sc2 position-absolute'></label><br>
                    <label class'recuo'>Reservatório domiciliar _  _ _ _ _ _ _ _ _</label><label class='saecil-sim sc11 position-absolute'></label><label class='saecil-nao sc3 position-absolute'></label><br>
                    <label class'recuo'>Fossa Séptica _ _ _ _ _ _ _ _ _ _ _ _ _ _</label><label class='saecil-sim sc12 position-absolute'></label><label class='saecil-nao sc4 position-absolute'></label><br>
                    <label class'recuo'>Fossa Negra_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</label><label class='saecil-sim sc13 position-absolute'></label><label class='saecil-nao sc5 position-absolute'></label><br>
                    <label class'recuo'>Ag. Pl. Lig. À Rua _ _ _ _ _ _ _ _ _ _ _</label><label class='saecil-sim sc14 position-absolute'></label><label class='saecil-nao sc6 position-absolute'></label><br>
                    <label class'recuo'>Inst. Pred. de Ag. Compl._ _ _ _ _ _ _ _</label><label class='saecil-sim sc15 position-absolute'></label><label class='saecil-nao sc7 position-absolute'></label><br>
                    <label class'recuo'>Inst. Rede de Esg. Compl._ _ _ _ _ _ _ _</label><label class='saecil-sim sc16 position-absolute'></label><label class='saecil-nao sc8 position-absolute'></label><br>    
                </div>
                <br><br>
                <div class='data'>Leme, ______ de ___________________ de ". date('Y'). ".</div>
                <br><br>
                <div class='linhaSAECIL'>_________________________________________</div>
                <div class='assSAECIL'>SAECIL</div>
            </div>
        </div><br>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['projeto']      = $const_habite->projeto;
    $_SESSION['requerimento'] = $const_habite->requerimento;
    $_SESSION['dataAprov']    = $const_habite->dataAprov;
    $_SESSION['alvara']       = $const_habite->alvara;
    $_SESSION['areaAprov']    = $const_habite->areaAprov;
    $_SESSION['obs']          = $const_habite->obs;        
}

elseif ($referencia->formName == 'CÓPIA DE PROJETO') //gravando em banco
{
    echo "
        <label class='lbl-77 position-absolute'>$copiadoAlv->projeto</label>
        <label class='lbl-78 position-absolute'>$copiadoAlv->alvNum</label>
        <label class='lbl-79 position-absolute'>$copiadoAlv->aproData</label>
    ";
    echo "<div class='linha-fx'>Projeto n° _____________________ Alvará n° _____________________  aprovado em _____________________</div>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['projeto']   = $copiadoAlv->projeto;
    $_SESSION['alvNum']    = $copiadoAlv->alvNum;
    $_SESSION['aproData']  = $copiadoAlv->aproData;
}

elseif ($referencia->formName == 'DEMOLIÇÃO') //gravando em banco
{
    echo "
        <label class='lbl-100 position-absolute'>$demolirAlv->alvDem</label>
        <label class='lbl-101 position-absolute'>$demolirAlv->aproDem</label>
        <label class='lbl-102 position-absolute'>$demolirAlv->areaDem</label>
    ";
    echo "<div class='linha-fx'>Conforme Alvará n° __________________________ aprovado em __________________________  área construida de __________________________ m²</div>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['alvDem']     = $demolirAlv->alvDem;
    $_SESSION['aproDem']    = $demolirAlv->aproDem;
    $_SESSION['areaDem']    = $demolirAlv->areaDem;
}

elseif ($referencia->formName == 'REVISÃO DE IPTU')//gravando em banco
{
    if($rev_iptu->menu == '1')
    {
        echo "
            <label class='lbl-motivo' for='flexCheckDefault'>Por motivo de:</label>
            <div class='form-check'>
                <label class='form-check-label revChk3' for='flexCheckDefault'>$rev_iptu->Motivo</label>
            </div>
        ";
            echo "
                <label class='lbl-98 position-absolute'>$rev_iptu->AreaCarne</label>
                <label class='lbl-99 position-absolute'>$rev_iptu->AnoCarne</label>
            ";
        echo "<div class='linha-fx'>Area no carnê de IPTU _______________________ m², desde _____________ </div>";
    
        #Enviando dados para registro em atendimentos
        $_SESSION['menu']         = $rev_iptu->menu;
        $_SESSION['Motivo']       = $rev_iptu->Motivo;
        $_SESSION['AreaCarne']    = $rev_iptu->AreaCarne;
        $_SESSION['AnoCarne']     = $rev_iptu->AnoCarne;
    }elseif($rev_iptu->menu == '2')
    {
        echo "
            <label class='lbl-motivo' for='flexCheckDefault'>Por motivo de:</label>
            <div class='form-check'>
                <label class='form-check-label revChk3' for='flexCheckDefault'>$rev_iptu->Motivo</label>
            </div>
        ";
            echo "
                <label class='lbl-96 position-absolute'>$rev_iptu->Emitida</label>
                <label class='lbl-97 position-absolute'>$rev_iptu->Areade</label>
            ";
        echo "<div class='linha-fx'>Emitida em _______________________ Area de _____________ m² </div>";
    
        #Enviando dados para registro em atendimentos
        $_SESSION['menu']        = $rev_iptu->menu;
        $_SESSION['Motivo']      = $rev_iptu->Motivo;
        $_SESSION['Emitida']     = $rev_iptu->Emitida;
        $_SESSION['Areade']      = $rev_iptu->Areade;
    }elseif($rev_iptu->menu == '3')
    {
        echo "
            <label class='lbl-motivo' for='flexCheckDefault'>Por motivo de:</label>
            <div class='form-check'>
                <label class='form-check-label revChk3' for='flexCheckDefault'>$rev_iptu->Motivo</label>
        ";
                echo "
                    <label class='lbl-80 position-absolute'>$rev_iptu->DesData</label>
                    <label class='lbl-81 position-absolute'>$rev_iptu->cadastro1</label>
                    <label class='lbl-82 position-absolute'>$rev_iptu->cadastro2</label>
                ";
                echo "<div class='linha-fx'>Data _______________________ Cadastros __________________________ , __________________________ </div>";

                #Enviando dados para registro em atendimentos
                $_SESSION['menu']         = $rev_iptu->menu;
                $_SESSION['Motivo']       = $rev_iptu->Motivo;
                $_SESSION['DesData']      = $rev_iptu->DesData;
                $_SESSION['cadastro1']    = $rev_iptu->cadastro1;
                $_SESSION['cadastro2']    = $rev_iptu->cadastro2;

                if($rev_iptu->cadastro3 <> '' and $rev_iptu->cadastro4 == '' and $rev_iptu->cadastro5 == '')
                {
                    echo "
                        <label class='lbl-83 position-absolute'>$rev_iptu->cadastro3</label>
                    ";
                    echo "<div class='linha-fx'> ____________________________ </div>";
                    
                    $_SESSION['cadastro3']    = $rev_iptu->cadastro3;
                }
                if($rev_iptu->cadastro3 <> '' and $rev_iptu->cadastro4 <> '' and $rev_iptu->cadastro5 == '')
                {
                    echo "
                        <label class='lbl-83 position-absolute'>$rev_iptu->cadastro3</label>
                        <label class='lbl-84 position-absolute'>$rev_iptu->cadastro4</label>
                    ";
                    echo "<div class='linha-fx'> ____________________________ , ____________________________ </div>";
                    
                    $_SESSION['cadastro3']    = $rev_iptu->cadastro3;
                    $_SESSION['cadastro4']    = $rev_iptu->cadastro4;  
                }
                if($rev_iptu->cadastro3 <> '' and $rev_iptu->cadastro4 <> '' and $rev_iptu->cadastro5 <> '')
                {
                    echo "
                        <label class='lbl-83 position-absolute'>$rev_iptu->cadastro3</label>
                        <label class='lbl-84 position-absolute'>$rev_iptu->cadastro4</label>
                        <label class='lbl-85 position-absolute'>$rev_iptu->cadastro5</label>
                    ";
                    echo "<div class='linha-fx'> ____________________________ , ____________________________ , ____________________________ </div>";
                    
                    $_SESSION['cadastro3']    = $rev_iptu->cadastro3;
                    $_SESSION['cadastro4']    = $rev_iptu->cadastro4;
                    $_SESSION['cadastro5']    = $rev_iptu->cadastro5;
                }
                
        echo"</div>";
    
    }elseif($rev_iptu->menu == '4')
    {
        echo "
            <label class='lbl-motivo' for='flexCheckDefault'>Por motivo de:</label>
            <div class='form-check'>
                <label class='form-check-label revChk3' for='flexCheckDefault'>$rev_iptu->Motivo</label>
            </div>
        ";
        echo "
                    <label class='lbl-86 position-absolute'>$rev_iptu->n_alv</label>
                    <label class='lbl-87 position-absolute'>$rev_iptu->proj_data</label>
                    <label class='lbl-88 position-absolute'>$rev_iptu->area_Proj</label>
                ";
        echo "<div class='linha-fx'>Alvará n° __________________ , Data __________________ , Área de ________________ m² </div>";
    
        #Enviando dados para registro em atendimentos
        $_SESSION['menu']       = $rev_iptu->menu;
        $_SESSION['Motivo']     = $rev_iptu->Motivo;
        $_SESSION['n_alv']      = $rev_iptu->n_alv;
        $_SESSION['proj_data']  = $rev_iptu->proj_data;
        $_SESSION['area_Proj']  = $rev_iptu->area_Proj;
    }elseif($rev_iptu->menu == '5')
    {
        echo "
            <label class='lbl-motivo' for='flexCheckDefault'>Por motivo de:</label>
            <div class='form-check'>
                <label class='form-check-label revChk3' for='flexCheckDefault'>$rev_iptu->Motivo</label>
            </div>
        ";
    
        #Enviando dados para registro em atendimentos
        $_SESSION['menu']         = $rev_iptu->menu;
        $_SESSION['Motivo']       = $rev_iptu->Motivo;
    }elseif($rev_iptu->menu == '6')
    {
        echo "
            <label class='lbl-motivo' for='flexCheckDefault'>Por motivo de:</label>
            <div class='form-check'>
                <label class='form-check-label revChk3' for='flexCheckDefault'>$rev_iptu->Motivo</label>
        ";
                echo "
                    <label class='lbl-90 position-absolute'>$rev_iptu->UniData</label>
                    <label class='lbl-91 position-absolute'>$rev_iptu->cadastro2</label>
                    <label class='lbl-92 position-absolute'>$rev_iptu->cadastro3</label>
                ";
                echo "<div class='linha-fx'>Data _______________________ Cadastros __________________________ , __________________________ </div>";
                
                #Enviando dados para registro em atendimentos
                $_SESSION['menu']         = $rev_iptu->menu;
                $_SESSION['Motivo']       = $rev_iptu->Motivo;
                $_SESSION['UniData']      = $rev_iptu->UniData;
                $_SESSION['cadastro1']    = $rev_iptu->cadastro1;
                $_SESSION['cadastro2']    = $rev_iptu->cadastro2;

                if($rev_iptu->cadastro3 <> '' and $rev_iptu->cadastro4 == '' and $rev_iptu->cadastro5 == '')
                {
                    echo "
                        <label class='lbl-83 position-absolute'>$rev_iptu->cadastro3</label>
                    ";
                    echo "<div class='linha-fx'> ____________________________ </div>";
                    
                    $_SESSION['cadastro3']    = $rev_iptu->cadastro3;
                }
                if($rev_iptu->cadastro3 <> '' and $rev_iptu->cadastro4 <> '' and $rev_iptu->cadastro5 == '')
                {
                    echo "
                        <label class='lbl-83 position-absolute'>$rev_iptu->cadastro3</label>
                        <label class='lbl-84 position-absolute'>$rev_iptu->cadastro4</label>
                    ";
                    echo "<div class='linha-fx'> ____________________________ , ____________________________ </div>";
                    
                    $_SESSION['cadastro3']    = $rev_iptu->cadastro3;
                    $_SESSION['cadastro4']    = $rev_iptu->cadastro4;  
                }
                if($rev_iptu->cadastro3 <> '' and $rev_iptu->cadastro4 <> '' and $rev_iptu->cadastro5 <> '')
                {
                    echo "
                        <label class='lbl-83 position-absolute'>$rev_iptu->cadastro3</label>
                        <label class='lbl-84 position-absolute'>$rev_iptu->cadastro4</label>
                        <label class='lbl-85 position-absolute'>$rev_iptu->cadastro5</label>
                    ";
                    echo "<div class='linha-fx'> ____________________________ , ____________________________ , ____________________________ </div>";
                    
                    $_SESSION['cadastro3']    = $rev_iptu->cadastro3;
                    $_SESSION['cadastro4']    = $rev_iptu->cadastro4;
                    $_SESSION['cadastro5']    = $rev_iptu->cadastro5;
                }
                
        echo"</div>";
    }
}

elseif ($referencia->formName == 'DENOMINAÇÃO DE RUA') //gravando em banco
{
    echo "
        <label class='lbl-103 position-absolute'>$denominar->den_ruaAntiga</label>
        <label class='lbl-104 position-absolute'>$denominar->den_ruaAtual</label>
        <label class='lbl-105 position-absolute'>$denominar->den_Bairro</label>
    ";
    
    #Enviando dados para registro em atendimentos
    $_SESSION['den_ruaAntiga']   = $denominar->den_ruaAntiga;
    $_SESSION['den_ruaAtual']    = $denominar->den_ruaAtual;
    $_SESSION['den_bairro']      = $denominar->den_Bairro;
    $_SESSION['coments']         = $denominar->den_Obs;  
}

elseif ($referencia->formName == 'EMPLACAMENTO') //gravando em banco
{
    echo "
        <label class='lbl-106 position-absolute'>$emplacar->emplac_chk1</label>
        <label class='lbl-107 position-absolute'>$emplacar->emplac_chk2</label>
        <label class='lbl-108 position-absolute'>$emplacar->alvEmp</label>
        <label class='lbl-109 position-absolute'>$emplacar->aproEmp</label>
        <label class='lbl-110 position-absolute'>$emplacar->areaEmp</label>
        <br><br>
        <div class='linha-fx'>Emplacamento  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </div>
        <div class='linha-fx'>Emplacamento Adicional _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ </div>
        <div class='linha-fx'>Conforme Alvará _______________     aprovado em _________________     Área construida de _______________ m² </div><br>
        <label>Obsevações:</label>
        <div class='linha-fx'><div class='emplac_OBS'>$emplacar->obsEmp</div></div><br>      
    ";
    echo "
        <div class='data'>Leme, ". date('d'). " de ". $mes[date("m")]. " de ". date('Y'). ".</div>
        
        <div class='linhaASS'><br>_____________________________________________</div>
        <div class='assNCI'>N.C.I</div>
        <div class='info'>$informacao</div><p>
    ";

    echo "
        <p>
        <div class='cerco'>
            <div class='quadro_emplac_nfo'>
                <div class='topo-emplac_nfo'>
                    NÚCLEO DE FISCALIZAÇÃO DE OBRAS
                </div>
                <p>
                <div>
                    <label class='recuo'>O imóvel recebeu o n°: _______________</label><br>
                    <label class='recuo'>Obs.:_______________________________________________________________________________________</label><br>
                    <label class='recuo'>___________________________________________________________________________________________</label><br>
                    <label class='recuo'>___________________________________________________________________________________________</label><br>
                    <label class='recuo'>___________________________________________________________________________________________</label><br>
                </div>
                <br>    
                <div class='data'>Leme, ______ de ___________________ de ". date('Y'). ".</div>
                <p>
                <div class='linhaNFO'>_________________________________________</div>
                <div class='assNFO'>N.F.O</div>
            </div>
            
        </div>
    ";
    
    #Enviando dados para registro em atendimentos
    $_SESSION['emplac_chk1'] = $emplacar->emplac_chk1;
    $_SESSION['emplac_chk2'] = $emplacar->emplac_chk2;
    $_SESSION['alvEmp']      = $emplacar->alvEmp;
    $_SESSION['aproEmp']     = $emplacar->aproEmp;
    $_SESSION['areaEmp']     = $emplacar->areaEmp;
    $_SESSION['obsEmp']      = $emplacar->obsEmp;
    $_SESSION['informacao']  = $informacao;
}
elseif ($referencia->formName == 'VALOR VENAL') //gravando em banco
{
    #Enviando dados para registro em atendimentos
    $_SESSION['ano'] = $vv->anoVv;
}

elseif ($referencia->formName == 'LADO') //gravando em banco
{
    echo "
        <br>
        <label class='lbl-113'>Observações:</label>
        <div id='obsCampoLado'>$lado->coments</div>
        <br>
    ";
    
    #Enviando dados para registro em atendimentos
    $_SESSION['coments']  = $lado->coments;
}

elseif ($referencia->formName == 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"') //gravando em banco
{
    echo "
        <label class='lbl-111'>Observações:</label>
        <div id='obsCampoLoco'>$mloco->coments</div>
    ";
    
    #Enviando dados para registro em atendimentos
    $_SESSION['coments']       = $mloco->coments;  
}

elseif ($referencia->formName == 'FICHA CADASTRAL') //gravando em banco
{
    echo "
        <br>
        <label class='lbl-113'>Observações:</label>
        <div id='obsCampoLado'>$ficha->coments</div>
        <br>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['coments']       = $ficha->coments;   
}

elseif ($referencia->formName == 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO') //gravando em banco
{
    echo "
        <label class='lbl-114 position-absolute'>$renAlvC->alvCop</label>
        <label class='lbl-115 position-absolute'>$renAlvC->aproCop</label>
        <label class='lbl-116 position-absolute'>$renAlvC->areaCop</label>
    ";
    echo "<div class='linha-fx'>Conforme alvará n° _________________________ aprovado em _________________________  área construida de ______________________ m²</div><br> 
    ";
    
    #Enviando dados para registro em atendimentos
    $_SESSION['alvCop']       = $renAlvC->alvCop;
    $_SESSION['aproCop']      = $renAlvC->aproCop;
    $_SESSION['areaCop']      = $renAlvC->areaCop;
}

elseif ($referencia->formName == 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO') //gravando em banco
{
    
    echo "
        <label class='lbl-117 position-absolute'>$renDesd->ncad1</label>
        <label class='lbl-118 position-absolute'>$renDesd->ncad2</label>
    ";
    echo "<div class='linha-fx'>Cadastro 1: ______________________ , Cadastro 2: ______________________ </div>";
        if($renDesd->ncad3 <> '')
        {
            echo "
                <label class='lbl-119 position-absolute'>$renDesd->ncad3</label>
            ";
            echo "<div class='linha-fx'>Cadastro 3: ______________________ </div>";
        }

    echo "
        <br>
            <label class='lbl-113'>Observações:</label>
            <div id='obsCampoLado'>$renDesd->coments</div>
        <br>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['ncad1']      = $renDesd->ncad1;
    $_SESSION['ncad2']      = $renDesd->ncad2;
    $_SESSION['ncad3']      = $renDesd->ncad3;
    $_SESSION['coments']    = $renDesd->coments;
}

elseif ($referencia->formName == 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO') //gravando em banco
{
    
    echo "
        <label class='lbl-117 position-absolute'>$renUnif->ncad1</label>
        <label class='lbl-118 position-absolute'>$renUnif->ncad2</label>
    ";
    echo "<div class='linha-fx'>Cadastro 1: ______________________ , Cadastro 2: ______________________ </div>";
        if($renUnif->ncad3 <> '')
        {
            echo "
                <label class='lbl-119 position-absolute'>$renUnif->ncad3</label>
            ";
            echo "<div class='linha-fx'>Cadastro 3: ______________________ </div>";
        }

    echo "
        <br>
            <label class='lbl-113'>Observações:</label>
            <div id='obsCampoLado'>$renUnif->coments</div>
        <br>
    ";

    #Enviando dados para registro em atendimentos
    $_SESSION['ncad1']      = $renUnif->ncad1;
    $_SESSION['ncad2']      = $renUnif->ncad2;
    $_SESSION['ncad3']      = $renUnif->ncad3;
    $_SESSION['coments']    = $renUnif->coments;
}
?>