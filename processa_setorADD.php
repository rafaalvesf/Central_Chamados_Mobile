<?php 
session_start();
include 'db.php';

$Nome_Setor = strtoupper($_POST['nomesetoradd']);


if($Nome_Setor==null || $Nome_Setor==""){

}
else{
$query = "INSERT INTO Setores(Nome_Setor) 
VALUES(UPPER('$Nome_Setor'))";

}
mysqli_query($conexao, $query);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, Foi adicionado o $Nome_Setor em nossa lista de setores.";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php');