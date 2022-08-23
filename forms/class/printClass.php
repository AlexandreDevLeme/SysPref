<?php

session_start();

//Classe Titulos e Nomes
class Titulos
{
    public $formName;
    public $frmObs;
}

//Classe Requerente
class Requerente
{
    public $req_Name;
    public $req_CPF;
    public $req_RG;
    public $req_End;
    public $req_Fone;
    public $req_Cel;
}

//Classe Imóvel
class Imovel
{
    public $im_Rua;
    public $im_Numero;
    public $im_Lote;
    public $im_Quadra;
    public $im_Bairro;
    public $im_Cadastro;
    public $im_Proprietario;
}

//Classe Denominação de Rua
class DenominacaoRua
{
    public $den_ruaAntiga;
    public $den_ruaAtual;
    public $den_Bairro;
    public $den_Obs;
}

//Classe Ampliação
class Ampliacao
{
    public $AlvAmpl;
    public $AproAmpl;
    public $Area1Ampl;
    public $Area2Ampl;
    public $Area3Ampl;
    public $obs;
}

//Classe Atualização de dados cadastrais
class atualizacaoCad
{
    
    public $nomeN;
    public $cpfN;
    public $rgN;
    public $enderecoN;
    public $numeroN;
    public $complementoN;
    public $bairroN;
    public $cepN;
    public $cidadeN;
    public $estadoN;
    public $telefoneN;
    public $enderecoTrib;
    public $obs;
}

//Classe Cancelamento de alvará
class cancelamentoAlvara
{
    public $canceAlv;
    public $cancApr;
    public $cancArea;
}

//Classe Cópia de alvará
class copiaAlvara
{
    public $projeto;
    public $alvNum;
    public $aproData;
}

//Classe Demolição
class demolirAlvara
{
    public $alvDem;
    public $aproDem;
    public $areaDem;
}

//Classe Buscas de IPTU
class buscasIPTU
{
    public $anoBuscaI;
    public $textoFinal;
}
//Classe Revisão de IPTU
class RevisaoIPTU
{
    public $menu;
    public $Motivo; //motivo da solicitação | Referente a todos os itens do menu
    public $n_carne; //exclusivo da Revisão de IPTU
    public $AreaCarne;//Referente aos itens 1 do menu
    public $DesData;// Referente aos itens 3 do menu
    public $AnoCarne;// Referente aos itens 1 do menu
    public $Emitida;// Referente aos itens 2 do menu
    public $Areade;// Referente aos itens 2 do menu
    public $UniData;// Referente aos itens 6 do menu
    public $cadastro1;// Referente aos itens 3 e 6 do menu
    public $cadastro2;// Referente aos itens 3 e 6 do menu
    public $cadastro3;// Referente aos itens 3 e 6 do menu
    public $cadastro4;// Referente aos itens 3 e 6 do menu
    public $cadastro5;// Referente aos itens 3 e 6 do menu
    public $n_alv;// Referente aos itens 4 do menu
    public $proj_data;// Referente aos itens 4 do menu
    public $area_Proj;// Referente aos itens 4 do menu
}

//Classe Contrução e Habite-se
class Const_Habite_se
{
    public $projeto;
    public $requerimento;
    public $dataAprov;
    public $alvara;
    public $areaAprov;
    public $obs;   
}

//Classe Emplacamento
class Emplacamento
{
    public $emplac_chk1;
    public $emplac_chk2;
    public $alvEmp;
    public $aproEmp;
    public $areaEmp;
    public $obsEmp;

}

//Classe Valor Venal
class valorVenal
{
    public $anoVv;
    public $textoFinal;
}

//Classe Medição / Verificação IN LOCO
class mvLoco
{
    public $coments;
}

//Classe Lado do Imóvel
class ladoImovel
{
    public $coments;
}
//Classe Ficha Cadastral
class fichaCadastral
{
    public $coments;
    public $textoFinal;
}

//Classe Renovação do Alvará de Construção
class renAlvaraConst
{
    public $alvCop;
    public $aproCop;
    public $areaCop;
}

//Classe Renovação de Certidão de Desdobro
class renDesdobro
{
    public $ncad1;
    public $ncad2;
    public $ncad3;
    public $coments;
}

//Classe Renovação de Certidão de Unificação
class renUnificacao
{
    public $ncad1;
    public $ncad2;
    public $ncad3;
    public $coments;
}

//Recebendo valores do formulario
    //#####################################################################################################################################
    //Estanciando Requerente
    $Contribuinte = new Requerente;
        if (!empty($_POST['nomeR']))
        {
            $Contribuinte->req_Name = $_POST['nomeR'];
        }
        if (!empty($_POST['cpfR']))
        {
            $Contribuinte->req_CPF = $_POST['cpfR'];
        }
        if (!empty($_POST['rgR']))
        {
            $Contribuinte->req_RG = $_POST['rgR'];
        }
        if (!empty($_POST['endR']))
        {
            if (isset($_POST['complementoR']))
            {
                $Contribuinte->req_End = $_POST['endR']. ", ". $_POST['numR']. " - ". $_POST['complementoR']. " - ". $_POST['bairroR']. " - ". $_POST['cidR']. "/". $_POST['ufR'];
            }else{
                $Contribuinte->req_End = $_POST['endR']. ", ". $_POST['numR']. " - ". $_POST['bairroR']. " - ". $_POST['cidR']. "/". $_POST['ufR'];
            }
        }    
        if(!empty($_POST['telR']) and !empty($_POST['celR']))
        {
            $Contribuinte->req_Contato = $_POST['telR']. " | ". $_POST['celR'];
        }elseif(!empty($_POST['telR']) and $_POST['celR'] == "")
        {
            $Contribuinte->req_Contato = $_POST['telR'];
        }elseif(!empty($_POST['celR']) and $_POST['telR'] == "")
        {
            $Contribuinte->req_Contato = $_POST['celR'];
        }

        //DADOS PARA IMPRESSÃO DE FORMULÁRIOS EM BRANCO E/OU TRATAMENTO DE ERROS
        if ($_POST['nomeR'] == '' and $_POST['cpfR'] == '' and $_POST['rgR'] == '' and $_POST['endR'] == '' and $_POST['numR'] == '' and $_POST['bairroR'] == '' and $_POST['cidR'] == '' and $_POST['ufR'] == '' and $_POST['telR'] == "" and $_POST['celR'] == "")
        {
            $_SESSION['gravarDados'] = 'NÃO GRAVAR';

            $Contribuinte->req_Name    = ' ';
            $Contribuinte->req_CPF     = ' ';
            $Contribuinte->req_RG      = ' ';
            $Contribuinte->req_End     = ' ';
            $Contribuinte->req_Contato = ' ';
        }else
        {
            $_SESSION['gravarDados'] = 'GRAVAR';

            if($_POST['nomeR'] == '')
            {
                $Contribuinte->req_Name = ' ';
            }
            if($_POST['cpfR'] == '')
            {
                $Contribuinte->req_CPF = ' ';  
            }
            if($_POST['rgR'] == '')
            {
                $Contribuinte->req_RG = ' ';
            }
            if($_POST['endR'] == '')
            {
                $Contribuinte->req_End = ' ';
            }
            if($_POST['telR'] == '' and $_POST['celR'] == '')
            {
                $Contribuinte->req_Contato = ' ';
            }
        }
    //#####################################################################################################################################
    //Estanciando Imóvel
    $Residencia = new Imovel;
        if(!empty($_POST['rua']))
        {
            $Residencia->im_Rua = $_POST['rua'];
        }else{
            $Residencia->im_Rua = ' ';
        }

        if(!empty($_POST['num']))
        {
            $Residencia->im_Numero = $_POST['num'];
        }else{
            $Residencia->im_Numero = ' ';
        }

        if(!empty($_POST['lote']))
        {
            $Residencia->im_Lote = $_POST['lote'];
        }else{
            $Residencia->im_Lote = ' ';
        }

        if(!empty($_POST['quadra']))
        {
            $Residencia->im_Quadra = $_POST['quadra'];
        }else{
            $Residencia->im_Quadra = ' ';
        }

        if(!empty($_POST['vila']))
        {
            $Residencia->im_Bairro = $_POST['vila'];
        }else{
            $Residencia->im_Bairro = ' ';
        }

        if(!empty($_POST['ncad1']))
        {
            $Residencia->im_Cadastro = $_POST['ncad1'];
        }else{
            $Residencia->im_Cadastro = ' ';
        }

        if(isset($_POST['carne']) and !empty($_POST['carne']))
        {
            $carne                 = $_POST['carne'];
            $_SESSION['new_Carne'] = $carne;    
        }else{
            $carne = ' ';
        }

        if(isset($_POST['nome']) and !empty($_POST['nome']))
        {
            $Residencia->im_Proprietario = $_POST['nome'];
        }else{
            $Residencia->im_Proprietario = ' ';  
        }

//#########################################################################################################################################
//Criando Objetos e seus atributos
if(isset($_POST['className']) and $_POST['className'] == 'AMPLIAÇÃO')//concluído
{
    $ampliacao = new Ampliacao;
    if (!empty($_POST['alvAmpl'])){
        $ampliacao->AlvAmpl   = $_POST['alvAmpl'];
    }else{
        $ampliacao->AlvAmpl = ' ';
    }

    if (!empty($_POST['aproAmpl'])){
        $ampliacao->AproAmpl  = $_POST['aproAmpl'];
    }else{
        $ampliacao->AproAmpl = ' ';  
    }

    if (!empty($_POST['area1Ampl'])){
        $ampliacao->Area1Ampl = $_POST['area1Ampl'];
    }else{
        $ampliacao->Area1Ampl = ' ';       
    }

    if (!empty($_POST['area2Ampl'])){
        $ampliacao->Area2Ampl = $_POST['area2Ampl'];
    }else{
        $ampliacao->Area2Ampl = ' ';       
    }

    if (!empty($_POST['area3Ampl'])){
        $ampliacao->Area3Ampl = $_POST['area3Ampl'];
    }else{
        $ampliacao->Area3Ampl = ' ';        
    }

    if (!empty($_POST['coments'])){
        $ampliacao->obs       = $_POST['coments'];
    }else{
        $ampliacao->obs = '_________________________________________________________________________________________________________________________________________________________________________________________';        
    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação';
    
    unset($_SESSION['docPrint']); 
    unset($_SESSION['cpf']);       
    unset($_SESSION['cadastro']);   
    unset($_SESSION['conforme']);  
    unset($_SESSION['data']);  
    unset($_SESSION['fase1']);   
    unset($_SESSION['aumento']);  
    unset($_SESSION['total']);   
    unset($_SESSION['obs']);
}

elseif(isset($_POST['className']) and $_POST['className'] == 'ATUALIZAÇÃO DOS DADOS CADASTRAIS')//concluido
{
    $atualizaCad = new atualizacaoCad;
    if (!empty($_POST['nomeN'])){
        $atualizaCad->nomeN         = $_POST['nomeN'];
    }else{
        $atualizaCad->nomeN         = ' ';
    }

    if (!empty($_POST['cpfN'])){
        $atualizaCad->cpfN          = $_POST['cpfN'];
    }else{
        $atualizaCad->cpfN          = ' ';
    }
    
    if (!empty($_POST['rgN'])){
        $atualizaCad->rgN           = $_POST['rgN'];
    }else{
        $atualizaCad->rgN           = ' ';
    }
    
    if (!empty($_POST['endN'])){
        $atualizaCad->enderecoN     = $_POST['endN'];
    }else{
        $atualizaCad->enderecoN     = ' ';
    }
    
    if (!empty($_POST['numN'])){
        $atualizaCad->numeroN       = $_POST['numN'];
    }else{
        $atualizaCad->numeroN       = ' ';
    }
    
    if (!empty($_POST['bairroN'])){
        $atualizaCad->bairroN       = $_POST['bairroN'];
    }else{
        $atualizaCad->bairroN       = ' ';
    }
    
    if (!empty($_POST['buscaCEPX'])){
        $atualizaCad->cepN          = $_POST['buscaCEPX'];
    }else{
        $atualizaCad->cepN          = ' ';
    }
    
    if (!empty($_POST['cidN'])){
        $atualizaCad->cidadeN       = $_POST['cidN'];
    }else{
        $atualizaCad->cidadeN       = ' ';
    }
    
    if (!empty($_POST['ufN'])){
        $atualizaCad->estadoN       = $_POST['ufN'];
    }else{
        $atualizaCad->estadoN       = ' ';
    }
    
    if (!empty($_POST['endN'])){
        $atualizaCad->enderecoTrib  = $_POST['endN']. ", ". $_POST['numN']. ", ". $_POST['bairroN']. " - ". $_POST['cidN']. "/". $_POST['ufN']. " - CEP: ". $_POST['buscaCEPX'];
    }else{
        $atualizaCad->enderecoTrib  = '__________________________________________________________________________________________________________________________________________________________________________';
    }
    
    if (!empty($_POST['coments'])){
        $atualizaCad->obs           = $_POST['coments'];
    }else{
        $atualizaCad->obs           = '_________________________________________________________________________________________________________________________________________________________________________________________';  
    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'Anexar cópia da escritura, matrícula ou contrato de compra e venda. Protocolar na prefeitura.';

    unset($_SESSION['docPrint']);
    unset($_SESSION['nomeN']);
    unset($_SESSION['cpfN']);
    unset($_SESSION['rgN']);
    unset($_SESSION['endN']);
    unset($_SESSION['numN']);
    unset($_SESSION['bairroN']);
    unset($_SESSION['cepN']);
    unset($_SESSION['cidadeN']);
    unset($_SESSION['estadoN']);
    unset($_SESSION['obs']);
}

elseif(isset($_POST['className']) and $_POST['className'] == 'B.C.I. (BOLETIM DO CADASTRAMENTO DE IMÓVEL)')//concluido
{
    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'BUSCAS DE IPTU')//concluido
{
    $buscas = new buscasIPTU;
    
    if (!empty($_POST['anoBuscaI'])){
        $buscas->anoBuscaI = $_POST['anoBuscaI'];
    }else{
        $buscas->anoBuscaI = '________';
    }
    
    $buscas->textoFinal = ' desde o ano de: '.$buscas->anoBuscaI.'.';

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';    
}

elseif(isset($_POST['className']) and $_POST['className'] == 'CANCELAMENTO DE ALVARÁ')//concluido
{
    $cancelaCad = new cancelamentoAlvara;
    
    if(!empty($_POST['canceAlv']))
    {
        $cancelaCad->canceAlv   = $_POST['canceAlv'];
    }else{
        $cancelaCad->canceAlv   = ' ';
    }
    if(!empty($_POST['cancApr']))
    {
        $cancelaCad->cancApr    = $_POST['cancApr'];
    }else{
        $cancelaCad->cancApr    = ' ';
    }
    if(!empty($_POST['cancArea']))
    {
        $cancelaCad->cancArea   = $_POST['cancArea'];
    }else{
        $cancelaCad->cancArea   = ' ';
    }
    if(!empty($_POST['coments']))
    {
        $cancelaCad->coments = $_POST['coments'];
    }else{
        $cancelaCad->coments = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'É necessário a devolução do Projeto em sua totalidade.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'CONFRONTANTES')//concluido
{
    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';    
}
elseif(isset($_POST['className']) and $_POST['className'] == 'REVISÃO DE IPTU')//concluido
{
    if($_POST['motivo'] == '1')
    {
        $rev_iptu = new revisaoIPTU;
        $rev_iptu->menu  = '1';
        $rev_iptu->Motivo = 'Área no local difere do constante em carnê de IPTU';
        $rev_iptu->n_carne = $_POST['carne'];
        
        if(!empty($_POST['areaCarne']))
        {
            $rev_iptu->AreaCarne = $_POST['areaCarne'];
        }else{
            $rev_iptu->AreaCarne = ' ';
        }
        
        if(!empty($_POST['anoCarne']))
        {
            $rev_iptu->AnoCarne = $_POST['anoCarne'];
        }else{
            $rev_iptu->AnoCarne = ' ';
        } 
        

    }elseif($_POST['motivo'] == '2')
    {
        $rev_iptu = new revisaoIPTU;
        $rev_iptu->menu = '2';
        $rev_iptu->Motivo = 'Certidão de Construção/Habite-se emitida em '. date('Y', strtotime('-1 Year'));
        
        if(!empty($_POST['emitida']))
        {
            $rev_iptu->Emitida = $_POST['emitida'];
        }else{
            $rev_iptu->Emitida = ' ';
        }
        
        if(!empty($_POST['areade']))
        {
            $rev_iptu->Areade = $_POST['areade'];
        }else{
            $rev_iptu->Areade = ' ';
        }
        

    }elseif($_POST['motivo'] == '3')
    {
        $rev_iptu = new revisaoIPTU;
        $rev_iptu->menu = '3';
        $rev_iptu->Motivo = 'Desdobro aprovado em '. date('Y', strtotime('-1 Year'));
        
        if(!empty($_POST['des_data']))
        {
            $rev_iptu->DesData = $_POST['des_data'];
        }else{
            $rev_iptu->DesData = ' ';
        }
        if(!empty($_POST['ncad2']))
        {
            $rev_iptu->cadastro1 = $_POST['ncad2'];
        }else{
            $rev_iptu->cadastro1 = ' ';
        }
        if(!empty($_POST['ncad3']))
        {
            $rev_iptu->cadastro2 = $_POST['ncad3'];
        }else{
            $rev_iptu->cadastro2 = ' ';
        }
        
        if(isset($_POST['ncad4']))
        {
            if(!empty($_POST['ncad4']))
            {
                $rev_iptu->cadastro3 = $_POST['ncad4'];
            }else{
                $rev_iptu->cadastro3 = ' ';
            }
        }
        
        if(isset($_POST['ncad5']))
        {
            if(!empty($_POST['ncad5']))
            {
                $rev_iptu->cadastro4 = $_POST['ncad5'];
            }else{
                $rev_iptu->cadastro4 = ' ';
            }
        }
        
        if(isset($_POST['ncad6']))
        {
            if(!empty($_POST['ncad6']))
            {
                $rev_iptu->cadastro5 = $_POST['ncad6'];
            }else{
                $rev_iptu->cadastro5 = ' ';
            }
        }

    }elseif($_POST['motivo'] == '4')
    {
        $rev_iptu = new revisaoIPTU;
        $rev_iptu->menu = '4';
        $rev_iptu->Motivo    = 'Projeto aprovado em '. date('Y', strtotime('-1 Year'));

        if(!empty($_POST['n_alv']))
        {
            $rev_iptu->n_alv     = $_POST['n_alv'];
        }else{
            $rev_iptu->n_alv     = ' ';
        }
        
        if(!empty($_POST['proj_data']))
        {
            $rev_iptu->proj_data = $_POST['proj_data'];
        }else{
            $rev_iptu->proj_data = ' ';
        }
        
        if(!empty($_POST['area_proj']))
        {
            $rev_iptu->area_Proj = $_POST['area_proj'];
        }else{
            $rev_iptu->area_Proj = ' ';
        }
        

    }elseif($_POST['motivo'] == '5')
    {
        $rev_iptu = new revisaoIPTU;
        $rev_iptu->menu = '5';
        $rev_iptu->Motivo = 'Revisão de categoria da construção';

    }elseif($_POST['motivo'] == '6')
    {
        $rev_iptu = new revisaoIPTU;
        $rev_iptu->menu  = '6';
        $rev_iptu->Motivo = 'Unificação';
        if(!empty($_POST['uni_data']))
        {
            $rev_iptu->UniData = $_POST['uni_data'];
        }else{
            $rev_iptu->UniData = ' ';
        }
        if(!empty($_POST['ncad2']))
        {
            $rev_iptu->cadastro1 = $_POST['ncad2'];
        }else{
            $rev_iptu->cadastro1 = ' ';
        }
        if(!empty($_POST['ncad3']))
        {
            $rev_iptu->cadastro2 = $_POST['ncad3'];
        }else{
            $rev_iptu->cadastro2 = ' ';
        }
        
        if(isset($_POST['ncad4']))
        {
            if(!empty($_POST['ncad4']))
            {
                $rev_iptu->cadastro3 = $_POST['ncad4'];
            }else{
                $rev_iptu->cadastro3 = ' ';
            }
        }
        
        if(isset($_POST['ncad5']))
        {
            if(!empty($_POST['ncad5']))
            {
                $rev_iptu->cadastro4 = $_POST['ncad5'];
            }else{
                $rev_iptu->cadastro4 = ' ';
            }
        }
        
        if(isset($_POST['ncad6']))
        {
            if(!empty($_POST['ncad6']))
            {
                $rev_iptu->cadastro5 = $_POST['ncad6'];
            }else{
                $rev_iptu->cadastro5 = ' ';
            }
        }

    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = '.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'CONSTRUÇÃO/HABITE-SE')//concluido
{
    $const_habite = new const_habite_se;
    
    if (isset($_POST['con_hab_chk1']))
    {
        if(!empty($_POST['con_hab_chk1']))
        {
            $const_habite->projeto = $_POST['con_hab_chk1'];
        }else{
            $const_habite->projeto = ' ';
        }
    }
    
    if (isset($_POST['con_hab_chk2']))
    {
        if(!empty($_POST['con_hab_chk2']))
        {  
            $const_habite->requerimento = $_POST['con_hab_chk2'];
        }else{
            $const_habite->requerimento = ' ';
        } 
    }

    if(!empty($_POST['data_alvHabit']))
    {
        $const_habite->dataAprov = $_POST['data_alvHabit'];
    }else{
        $const_habite->dataAprov = ' ';
    }

    if(!empty($_POST['alvHabit']))
    {
        $const_habite->alvara = $_POST['alvHabit'];
    }else{
        $const_habite->alvara = ' ';
    }

    if(!empty($_POST['areaHabit']))
    {
        $const_habite->areaAprov = $_POST['areaHabit'];
    }else{
        $const_habite->areaAprov = ' ';
    }

    if(!empty($_POST['coments']))
    {
        $const_habite->obs = $_POST['coments'];
    }else{
        $const_habite->obs = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }    

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'CÓPIA DO ALVARÁ DE CONSTRUÇÃO')//concluido
{
    $copiadoAlv = new copiaAlvara;
    
    if(!empty($_POST['projeto']))
    {
        $copiadoAlv->projeto  = $_POST['projeto'];
    }else{
        $copiadoAlv->projeto  = ' ';
    }    
    if(!empty($_POST['alvNum']))
    {
        $copiadoAlv->alvNum   = $_POST['alvNum'];
    }else{
        $copiadoAlv->alvNum   = ' ';
    }    
    if(!empty($_POST['aproData']))
    {
        $copiadoAlv->aproData = $_POST['aproData'];
    }else{
        $copiadoAlv->aproData = ' ';
    }  

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'É necessário a devolução do Projeto em sua totalidade.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'DEMOLIÇÃO')//concluido
{
    $demolirAlv = new demolirAlvara;    
    if(!empty($_POST['alvDem']))
    {
        $demolirAlv->alvDem     = $_POST['alvDem'];
    }else{
        $demolirAlv->alvDem     = ' ';
    }    
    if(!empty($_POST['aproDem']))
    {
        $demolirAlv->aproDem    = $_POST['aproDem'];
    }else{
        $demolirAlv->aproDem    = ' ';
    }    
    if(!empty($_POST['areaDem']))
    {
        $demolirAlv->areaDem    = $_POST['areaDem'];
    }else{
        $demolirAlv->areaDem    = ' ';
    }    

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'DENOMINAÇÃO DE RUA')//concluido
{
    $denominar = new DenominacaoRua;    
    if(!empty($_POST['ruaAntiga']))
    {
        $denominar->den_ruaAntiga = $_POST['ruaAntiga'];
    }else{
        $denominar->den_ruaAntiga = ' ';
    }    
    if(!empty($_POST['ruaAtual']))
    {
        $denominar->den_ruaAtual  = $_POST['ruaAtual'];
    }else{
        $denominar->den_ruaAtual  = ' ';
    }    
    if(!empty($_POST['vila']))
    {
        $denominar->den_Bairro    = $_POST['vila'];
    }else{
        $denominar->den_Bairro    = ' ';
    }    
    if(!empty($_POST['coments']))
    {
        $denominar->den_Obs       = $_POST['coments'];
    }else{
        $denominar->den_Obs       = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }    

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'EMPLACAMENTO')//concluido
{
    $emplacar = new Emplacamento;
    if(!empty($_POST['emplac_chk1'])){
        $emplacar->emplac_chk1 = $_POST['emplac_chk1'];   
    }else{
        $emplacar->emplac_chk1 = ' ';
    }
    
    if(!empty($_POST['emplac_chk2'])){
        $emplacar->emplac_chk2 = $_POST['emplac_chk2'];
    }else{
        $emplacar->emplac_chk2 = ' ';
    }
    
    if(!empty($_POST['alvEmp'])){
        $emplacar->alvEmp  = $_POST['alvEmp'];
    }else{
        $emplacar->alvEmp = ' ';
    }

    if(!empty($_POST['aproEmp'])){
        $emplacar->aproEmp = $_POST['aproEmp'];
    }else{
        $emplacar->aproEmp = ' ';
    }

    if(!empty($_POST['areaEmp'])){
        $emplacar->areaEmp = $_POST['areaEmp'];
    }else{
        $emplacar->areaEmp = ' ';
    }

    if(!empty($_POST['coments'])){
        $emplacar->obsEmp = $_POST['coments'];
    }else{
        $emplacar->obsEmp = '________________________________________________________________________________________';
    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'VALOR VENAL')//concluido
{
    $vv = new valorVenal;    
    if(!empty($_POST['anoVv']))
    {
        $vv->anoVv = $_POST['anoVv'];
        $vv->textoFinal = ' referente ao ano de: '.$vv->anoVv.'.';
    }else{
        $vv->anoVv = ' ';
        $vv->textoFinal = ' referente ao ano de: ________.';
    }
    

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
    
}

elseif(isset($_POST['className']) and $_POST['className'] == 'MEDIÇÃO / VERIFICAÇÃO "IN LOCO"')//concluido
{
    $mloco = new mvLoco;    
    if(!empty($_POST['coments']))
    {
        $mloco->coments = $_POST['coments'];
    }else{
        $mloco->coments = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = '.';    
}

elseif(isset($_POST['className']) and $_POST['className'] == 'LADO')//concluido
{
    $lado = new ladoImovel;    
    if(!empty($_POST['coments']))
    {
        $lado->coments = $_POST['coments'];
    }else{
        $lado->coments = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs  = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'FICHA CADASTRAL')//concluido
{
    $ficha = new fichaCadastral;    
    if(!empty($_POST['coments']))
    {
        $ficha->coments = $_POST['coments'];
    }else{
        $ficha->coments = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }
    
    $ficha->textoFinal = ', (Certidão de Inteiro Teor).';

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'RENOVAÇÃO DO ALVARÁ DE CONSTRUÇÃO')//concluido
{
    $renAlvC = new renAlvaraConst;    
    if(!empty($_POST['alvCop']))
    {
        $renAlvC->alvCop     = $_POST['alvCop'];
    }else{
        $renAlvC->alvCop     = ' ';
    }    
    if(!empty($_POST['aproCop']))
    {
        $renAlvC->aproCop    = $_POST['aproCop'];
    }else{
        $renAlvC->aproCop    = ' ';
    }    
    if(!empty($_POST['areaCop']))
    {
        $renAlvC->areaCop    = $_POST['areaCop'];
    }else{
        $renAlvC->areaCop    = ' ';
    }   

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'É necessário a devolução do Projeto em sua totalidade.';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'RENOVAÇÃO DE CERTIDÃO DE DESDOBRO')//concluido
{
    $renDesd = new renDesdobro;

    if(!empty($_POST['ncad1']))
    {
        $renDesd->ncad1    = $_POST['ncad1'];
    }else{
        $renDesd->ncad1    = ' ';
    }    
    if(!empty($_POST['ncad2']))
    {
        $renDesd->ncad2    = $_POST['ncad2'];
    }else{
        $renDesd->ncad2    = ' ';
    }    
    if(!empty($_POST['ncad3']))
    {   
        $renDesd->ncad3    = $_POST['ncad3'];
    }else{
        $renDesd->ncad3    = ' ';
    }    
    if(!empty($_POST['coments']))
    {
        $renDesd->coments  = $_POST['coments'];
    }else{
        $renDesd->coments  = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }    

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'Anexar a cópia da certidão de desdobro a ser renovada. O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação. ';
}

elseif(isset($_POST['className']) and $_POST['className'] == 'RENOVAÇÃO DE CERTIDÃO DE UNIFICAÇÃO')//concluido
{
    $renUnif = new renUnificacao;

    if(!empty($_POST['ncad1']))
    {
        $renUnif->ncad1    = $_POST['ncad1'];
    }else{
        $renUnif->ncad1    = ' ';
    }    
    if(!empty($_POST['ncad2']))
    {
        $renUnif->ncad2    = $_POST['ncad2'];
    }else{
        $renUnif->ncad2    = ' ';
    }    
    if(!empty($_POST['ncad3']))
    {
        $renUnif->ncad3    = $_POST['ncad3'];
    }else{
        $renUnif->ncad3    = ' ';
    }    
    if(!empty($_POST['coments']))
    {
        $renUnif->coments  = $_POST['coments'];
    }else{
        $renUnif->coments  = '_________________________________________________________________________________________________________________________________________________________________________________________';
    }    

    $referencia = new Titulos;
    // Recebe o nome do formulario solicitante
    $referencia->formName = $_POST['className'];
    // Escreve um comentário no rodape do formulario
    $referencia->formObs = 'Anexar a cópia da certidão de desdobro a ser renovada. O pagamento da taxa na Secretaria de Finanças é indispensável para a conclusão desta solicitação. ';
}
?>