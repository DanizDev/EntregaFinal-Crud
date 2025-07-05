<?php
    //declarando as variáveis que vamos utilizar na conexão
    $host      = 'localhost';
    $nomeBanco = 'danielTattoo';
    $usuario   = 'root';
    $senha     = '';
    

    //Criar um novo objeto que conecta no banco de dados
    //Vamos utilizar o PDO para isso, passando as variaveis acima como parametro. 
    try{
        $conexao = new PDO(
            "mysql:host=$host;
            dbname=$nomeBanco;charset=UTF8",
            $usuario,
            $senha
        );
        //Define como o PDO vai tratar o erro
        //No caso, vai lançar uma exceção, que posteriormente será tratada no CATCH
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexão realizada com êxito! <br><hr><br>";

    }catch(PDOException $e){
        echo "ERRO: " . $e->getMessage();
    }
?>