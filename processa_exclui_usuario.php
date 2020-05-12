<?php 
session_start();
include 'db.php';

$Nome_Usuario = $_POST['nomeexcusuario'];

$query = "DELETE FROM Usuarios WHERE Nome_Usuario = '$Nome_Usuario'";

mysqli_query($conexao, $query);
header('location:home.php?pagina=criar_usuario');