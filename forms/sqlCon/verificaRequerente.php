<?php
$verificaR = "000.000.000-00";
    
$compareR = $pdo->prepare("SELECT * FROM requerente WHERE cpf = :cpf");
$compareR->bindValue(':cpf', $cpf);
$compareR->execute();

while($dadoR = $compareR->FETCH(PDO::FETCH_ASSOC)){
    $verificaR = "$dadoR[cpf]";
}

if ($verificaR != $cpf and $cpf != '') {

    //Comando SQL que insere na tabela clientes.
    $reqInsert = $pdo->prepare("INSERT INTO requerente (id_requerente,nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado) VALUES (:id_Requerente,:nome,:cpf,:rg,:telefone,:celular,:endereco,:numero,:complemento,:bairro,:cep,:cidade,:estado)");

    //Vincula as labels com as variáveis vindas do form.
    $reqInsert->bindValue(':id_Requerente', 0);
    $reqInsert->bindValue(':nome', $nome);
    $reqInsert->bindValue(':cpf', $cpf);
    $reqInsert->bindValue(':rg', $rg);
    $reqInsert->bindValue(':endereco', $endereco);
    $reqInsert->bindValue(':numero', $numero);
    $reqInsert->bindValue(':complemento', $complemento);
    $reqInsert->bindValue(':bairro', $bairro);
    $reqInsert->bindValue(':cep', $cep);
    $reqInsert->bindValue(':cidade', $cidade);
    $reqInsert->bindValue(':estado', $estado);
    $reqInsert->bindValue(':telefone', $telefone);
    $reqInsert->bindValue(':celular', $celular);

    //Tenta executar o insert no banco de dados.
    $reqInsert->execute();
}

$verificaI = "00.0000.0000.000";
        
$compareI = $pdo->prepare("SELECT * FROM imovel WHERE n_cad = :im_Cadastro");
$compareI->bindValue(':im_Cadastro', $im_Cadastro);
$compareI->execute();

while($dadoI = $compareI->FETCH(PDO::FETCH_ASSOC)){
    $verificaI = "$dadoI[n_cad]";
}

if ($verificaI != $im_Cadastro and $im_cadastro != '') {
    
    //Comando SQL que insere na tabela clientes.
    $imvInsert = $pdo->prepare("INSERT INTO imovel (id_imovel,n_cad,rua,numero,lote,quadra,bairro,proprietario) VALUES (:id_imovel,:im_Cadastro,:im_Rua,:im_Numero,:im_Lote,:im_Quadra,:im_Bairro,:im_Proprietario)");
    
    //Vincula as labels com as variáveis vindas do form.
    $imvInsert->bindValue(':id_imovel', 0);
    $imvInsert->bindValue(':im_Cadastro', $im_Cadastro);
    $imvInsert->bindValue(':im_Rua', $im_Rua);
    $imvInsert->bindValue(':im_Numero', $im_Numero);
    $imvInsert->bindValue(':im_Lote', $im_Lote);
    $imvInsert->bindValue(':im_Quadra', $im_Quadra);
    $imvInsert->bindValue(':im_Bairro', $im_Bairro);
    $imvInsert->bindValue(':im_Proprietario', $im_Proprietario);
    
    //Tenta executar o insert no banco de dados.
    $imvInsert->execute();

    echo "<script type='text/javascript'>Imovel</script>";
}

?>