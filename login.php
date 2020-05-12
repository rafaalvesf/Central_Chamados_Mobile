<?php
session_start();
include 'db.php';

#condição de login
if(empty($_POST['usuario_digitado']) || empty($_POST['senha_digitada'])) {
header('Location: index.php');
exit();
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario_digitado']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha_digitada']);

$query = "select Nome_Usuario FROM Usuarios where Nome_Usuario = '{$usuario}' and BINARY Senha_Usuario = '{$senha}'";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['usuario_digitado'] = $usuario;
	$_SESSION['senha_digitada']= $senha;
	header('Location: home.php');
	exit();	
} else{
	$_SESSION['nao_autenticado']=true;
	header('Location: index.php');
	exit();
}

?>