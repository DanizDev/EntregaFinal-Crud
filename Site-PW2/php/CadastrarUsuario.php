<?php
    require_once 'Conexao.php';

    $email = $_POST['emailFormulario'];
    $nome  = $_POST['nomeFormulario'];
    $senha = $_POST['senhaFormulario']; 
    $usuario = $_POST['usuarioFormulario'];


    
    if(!empty($email) && !empty($nome) && !empty($senha) && !empty($usuario)){
        //Pegamos a senha digitado pelo usuário e realizamos uma criptografia nela
        //com base nisso, vamos armazenar o hash(criptografia) no banco de dados.
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        //Instrução DML
        $sql = "INSERT INTO cadastro (email, nome, senha, usuario) VALUES (:email, :nome, :senha, :usuario)";
        $sql = "INSERT INTO usuario (email, nome, senha, usuario) VALUES (:email, :nome, :senha, :usuario)";

        //preparar a inserção de dados no banco
        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':email', $email);
        $requisicao->bindParam(':nome', $nome);
        $requisicao->bindParam(':senha', $senhaHash);
        $requisicao->bindParam(':usuario', $usuario);
        try{
            $requisicao->execute();
            echo 'Usuário cadastrado com sucesso!';
        }catch(PDOException $e){
            echo 'Erro ao cadastrar: ' . $e->getMessage();
        }

    }else{
        echo '<p style="color:red;">Preencha todos os campos. </p>';
    }

?>