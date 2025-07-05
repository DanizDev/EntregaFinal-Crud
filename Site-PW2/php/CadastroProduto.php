<?php
    require_once 'Conexao.php';

    $nomeProduto = $_POST['nomeProduto'];
    $valorProduto  = $_POST['valorProduto'];
    $marcaProduto = $_POST['marcaProduto']; 
    $descricaoProduto = $_POST['descricaoProduto']; 


    
    if(!empty($nomeProduto) && !empty($valorProduto) && !empty($marcaProduto) && !empty($descricaoProduto)){
        //Instrução DML
        $sql = "INSERT INTO produtos (nome, valor, marca, descricao) VALUES (:nomeProduto, :valorProduto, :marcaProduto, :descricaoProduto)";
        
        //preparar a inserção de dados no banco
        $requisicao = $conexao->prepare($sql);

        $requisicao->bindParam(':nomeProduto', $nomeProduto);
        $requisicao->bindParam(':valorProduto', $valorProduto);
        $requisicao->bindParam(':marcaProduto', $marcaProduto);
        $requisicao->bindParam(':descricaoProduto', $descricaoProduto);

        try{
            $requisicao->execute();
            echo 'Produto cadastrado com sucesso!';
        }catch(PDOException $e){
            echo 'Erro ao cadastrar Produto: ' . $e->getMessage();
        }

    }else{
        echo '<p style="color:red;">Preencha todos os campos para cadastrar o produto. </p>';
    }

?>


