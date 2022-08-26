<?php
$verificaI = "00.0000.0000.000";
       
$compareI = $pdo->prepare("SELECT * FROM imovel WHERE n_cad = :im_Cadastro");
$compareI->bindValue(':im_Cadastro', $im_Cadastro);
$compareI->execute();

while($dadoI = $compareI->FETCH(PDO::FETCH_ASSOC)){
    $verificaI = "$dadoI[n_cad]";
}

if ($verificaI != $im_Cadastro and $im_Cadastro != '') {
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
}

?>