<?php

session_start();

require_once('Conexao.php');

$usuario = $_POST['usuarioFormulario'];
$senha = $_POST['senhaFormulario'];

if(!empty($usuario) && !empty($senha)){

$sql = 'SELECT * FROM usuario WHERE usuario = :usuario';

$requisicao = $conexao -> prepare($sql);
$requisicao -> bindParam(':usuario', $usuario);
$requisicao -> execute();

$usuario = $requisicao -> fetch(PDO::FETCH_ASSOC);

if($usuario && password_verify($senha, $usuario['senha'])){

header ('Location: ../html/PaginaPrincipal.html');

}else{

echo'Usuario ou senha incorretos';

}

}else{

echo'Preencha todos os campos';

}
?>