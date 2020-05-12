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

$query = "INSERT INTO Usuarios(Nome_Usuario, Senha_Usuario, Perfil) 
VALUES(UPPER('$Nome'), '$Senha', UPPER('$Perfil'))";

mysqli_query($conexao, $query);
header('location:home.php?pagina=criar_usuario');