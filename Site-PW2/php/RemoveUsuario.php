<?php
    require_once'Conexao.php'; //conecta ao banco

    $email = $_POST['emailFormulario'];

    if(!empty($email)){
        $sql = "DELETE FROM usuario WHERE email = :email";

        //preparar a remoção de dados no banco
        $requisicao = $conexao->prepare($sql);
        //vamos pegar o e-mail digitado no form e passar por parametro,
        //isso fará que a consulta na variavel $sql, use o e-mail que
        //o usuario digitou, o bindParam serve para evitar SQLInjection.
        //é uma proteção da aplicação no banco de dados.
        $requisicao->bindParam(':email', $email);
        try{
            $requisicao->execute();
            if($requisicao->rowCount() > 0){
                echo "O usuario foi removido!";
            }else{
                echo "Usuario não existe";
            }
        }catch(PDOException $e){
            echo "Erro ao remover: " . $e-> getMessage();
        }
    }else{
        echo "Digite um e-mail para remover algum usuario!";
    }




?>