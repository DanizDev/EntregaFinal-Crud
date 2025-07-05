<?php

require_once('conexao.php');

$email = $_POST["emailFormulario"];
$nome = $_POST["nomeFormulario"];
$novaSenha = $_POST["senhaFormulario"];

if(!empty($nome && !empty($email))){

    if(!empty($novaSenha)){

        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario SET nome = :nome, senha = :senha WHERE email = :email";
        
    }else{

        $sql = "UPDATE usuario SET nome = :nome WHERE email = :email";

    }

    $requisicao = $conexao -> prepare($sql);
    $requisicao -> bindParam(':email', $email);
    $requisicao -> bindParam(':nome', $nome);

    if(!empty($novaSenha)){

        $requisicao -> bindParam(':senha', $senhaHash);

    }

try {

    $requisicao -> execute();
    echo'Informações do Usuário atualizadas!';

}catch(PDOException $e){

echo'Erro: ' . $e -> getMessage();

}

}else{

echo'Preencha o nome e o email para a atualização';

}

?>