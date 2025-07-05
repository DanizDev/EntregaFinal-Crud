<?php
     require_once'Conexao.php'; //conecta ao banco

    $nome = $_POST['nomeFormulario'];
    $email = $_POST['emailFormulario'];

    if(!empty($email) && !empty($nome)){
        //instrução DQL
        $sql = "SELECT * FROM usuario WHERE email = :email ";

        //preparar a remoção de dados no banco
        $requisicao = $conexao->prepare($sql);
        
        $requisicao->bindParam(':email', $email);
        try{
            $requisicao->execute();
            //especificar como queremos o retorno da consulta no banco de dados
            //FETCH_ASSOC indica que queremos retornar um array indexado
                $usuario = $requisicao->fetch(PDO::FETCH_ASSOC);

                if($usuario){
                    echo "Nome: ". $usuario['nome'] . "<br>";
                    echo "Email: ". $usuario['email'] . "<br>";
                }else{
                    echo "Usuario não encontrado";
                }
            }catch(PDOException $e){
            echo "Erro ao consultar: " . $e-> getMessage();
        }
        }else{
             echo "Digite um e-mail e um nome para consultar algum usuario!";
        }

?>