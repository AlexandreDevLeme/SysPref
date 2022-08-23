<?php

############# LIMPANDO DADOS DO IMÓVEL NA SESSÃO ##############
function LimpaImovel()
{
    unset($_SESSION['DadosI']);
    unset($_SESSION['Imovel']);
    unset($_SESSION['Rua']);
    unset($_SESSION['Numero']);
    unset($_SESSION['Bairro']);
    unset($_SESSION['Lote']);
    unset($_SESSION['Quadra']);
    unset($_SESSION['Cadastro']);
    unset($_SESSION['Proprietario']);
    unset($_SESSION['Representante']);
}

############# LIMPANDO DADOS DO NEW_IMÓVEL ##############
function LimpaNewImovel()
{
    unset($_SESSION['new_Rua']);
    unset($_SESSION['new_Numero']);
    unset($_SESSION['new_Bairro']);
    unset($_SESSION['new_Lote']);
    unset($_SESSION['new_Quadra']);
    unset($_SESSION['new_Cadastro']);
    unset($_SESSION['new_Proprietario']);
}

############# LIMPANDO DADOS DO REQUERENTE NA SESSÃO ##############
function LimpaRequerente()
{
    unset($_SESSION['DadosR']);
    unset($_SESSION['Requerente']);
    unset($_SESSION['nome']);
    unset($_SESSION['cpf']);
    unset($_SESSION['rg']);
    unset($_SESSION['tel']);
    unset($_SESSION['cel']);
    unset($_SESSION['end']);
    unset($_SESSION['num']);
    unset($_SESSION['bairro']);
    unset($_SESSION['cep']);
    unset($_SESSION['cid']);
    unset($_SESSION['uf']);
}

############# LIMPANDO DADOS DO NEW_REQUERENTE ##############
function LimpaNewRequerente()
{
    unset($_SESSION['new_nome']);
    unset($_SESSION['new_cpf']);
    unset($_SESSION['new_rg']);
    unset($_SESSION['new_tel']);
    unset($_SESSION['new_cel']);
    unset($_SESSION['new_end']);
    unset($_SESSION['new_num']);
    unset($_SESSION['new_bairro']);
    unset($_SESSION['new_cep']);
    unset($_SESSION['new_cid']);
    unset($_SESSION['new_uf']);
}

################# LIMPANDO DADOS UTILIZADOS PARA INSERÇÃO EM BANCO DE DADOS #####################
function ClearSQLTempData()
{
    unset($_SESSION['reimpressao']);
    unset($_SESSION['codigoMantido']);
    unset($_SESSION['docPrint']);

    unset($_SESSION['AlvAmpl']);
    unset($_SESSION['AproAmpl']);
    unset($_SESSION['Area1Ampl']);
    unset($_SESSION['Area2Ampl']);
    unset($_SESSION['Area3Ampl']);
    unset($_SESSION['nomeN']);
    unset($_SESSION['cpfN']);
    unset($_SESSION['rgN']);
    unset($_SESSION['endN']);
    unset($_SESSION['numN']);
    unset($_SESSION['bairroN']);
    unset($_SESSION['cepN']);
    unset($_SESSION['cidadeN']);
    unset($_SESSION['estadoN']);
    unset($_SESSION['endCompleto']);
    unset($_SESSION['anoBuscaI']);
    unset($_SESSION['numAlv']);
    unset($_SESSION['dataAlv']);
    unset($_SESSION['cancArea']); 
    unset($_SESSION['menu']);
    unset($_SESSION['Motivo']);
    unset($_SESSION['AreaCarne']);
    unset($_SESSION['AnoCarne']);
    unset($_SESSION['Emitida']);
    unset($_SESSION['Areade']);
    unset($_SESSION['DesData']);
    unset($_SESSION['n_alv']);            
    unset($_SESSION['proj_data']);
    unset($_SESSION['area_Proj']);
    unset($_SESSION['UniData']);
    unset($_SESSION['cadastro1']);
    unset($_SESSION['cadastro2']);
    unset($_SESSION['cadastro3']);
    unset($_SESSION['cadastro3']);
    unset($_SESSION['cadastro4']);        
    unset($_SESSION['projeto']);
    unset($_SESSION['requerimento']);
    unset($_SESSION['dataAprov']);
    unset($_SESSION['alvara']);
    unset($_SESSION['areaAprov']);
    unset($_SESSION['obs']);
    unset($_SESSION['projeto']);
    unset($_SESSION['alvNum']);
    unset($_SESSION['aproData']);
    unset($_SESSION['alvDem']);
    unset($_SESSION['aproDem']);
    unset($_SESSION['areaDem']);
    unset($_SESSION['den_ruaAntiga']);
    unset($_SESSION['den_ruaAtual']);
    unset($_SESSION['den_bairro']);
    unset($_SESSION['emplac_chk1']);
    unset($_SESSION['emplac_chk2']);
    unset($_SESSION['alvEmp']);
    unset($_SESSION['aproEmp']);
    unset($_SESSION['areaEmp']);
    unset($_SESSION['ano']);
    unset($_SESSION['alvCop']);
    unset($_SESSION['aproCop']);
    unset($_SESSION['areaCop']);
    unset($_SESSION['ncad1']);
    unset($_SESSION['ncad2']);
    unset($_SESSION['ncad3']);
    unset($_SESSION['coments']);
    unset($_SESSION['className']);

    unset($_SESSION['new_nome']);
    unset($_SESSION['new_cpf']);
    unset($_SESSION['new_rg']);
    unset($_SESSION['new_tel']);
    unset($_SESSION['new_cel']);
    unset($_SESSION['new_end']);
    unset($_SESSION['new_num']);
    unset($_SESSION['new_complemento']);
    unset($_SESSION['new_bairro']);
    unset($_SESSION['new_cep']);
    unset($_SESSION['new_cidade']);
    unset($_SESSION['new_estado']);

    unset($_SESSION['new_Rua']);
    unset($_SESSION['new_Numero']);
    unset($_SESSION['new_Bairro']);
    unset($_SESSION['new_Lote']);
    unset($_SESSION['new_Quadra']);
    unset($_SESSION['new_Cadastro']);
    unset($_SESSION['carne']);
    unset($_SESSION['new_Carne']);
    unset($_SESSION['new_Proprietario']);

    unset($_SESSION['gravarDados']);
}
?>