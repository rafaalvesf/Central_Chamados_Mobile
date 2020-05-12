<?php 
session_start();
include 'db.php';
$Senha_antiga = $_POST['senhatual'];
$Senha_nova = $_POST['senhanova'];
$ConfSenha_nova = $_POST['confsenhanova'];
$Usuario_logado = $_SESSION['usuario_digitado'];
$Senha_logada = $_SESSION['senha_digitada'];

if($Senha_antiga == $Senha_logada && $Senha_nova==$ConfSenha_nova){
    $query = "UPDATE Usuarios SET Senha_Usuario = '$Senha_nova' WHERE Nome_Usuario = '$Usuario_logado'";


mysqli_query($conexao, $query);
header('location:index.php');
}
else{
    header('location:home.php');
}