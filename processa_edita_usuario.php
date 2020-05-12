<?php 
session_start();
include 'db.php';

$Nome = $_POST['nomeusuario'];
$Senha = $_POST['senhausuario'];
if($_POST['perfilusuario'] == 'ADMINISTRADOR'){
$Perfil = "1";
}
else{
$Perfil = "0";   
}

$query = "UPDATE Usuarios SET Nome_Usuario='$Nome', Senha_Usuario='$Senha', Perfil='$Perfil' WHERE Nome_Usuario = '$Nome'";

mysqli_query($conexao, $query);
header('location:home.php?pagina=criar_usuario');