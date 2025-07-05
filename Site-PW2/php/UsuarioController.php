<?php
    $requisicao = $_POST['requisicao'];

    switch($requisicao){
        
        case 'Atualizar';
            include 'AtualizarUsuario.php';
            break;

        case 'Cadastrar Produto';
            include 'CadastroProduto.php';
            break;

        case 'Consultar';
            include 'ConsultarUsuario.php';
            break;

        case 'Remover';
            include 'RemoveUsuario.php';
            break;

        case 'Cadastrar Usuario';
            include 'CadastrarUsuario.php';
            break;

        default:
            echo "Acão inválida, por gentileza selecionar uma opção válida";
            break;
    }
?>