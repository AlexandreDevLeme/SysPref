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
?>