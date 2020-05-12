<?php 
session_start();
include 'db.php';

$Nome_Item = strtoupper($_POST['nome_item']);
$Descricao_Item = $_POST['descricao_item'];
$Quantidade_Minima = $_POST['quantidade_minima'];

$query = "INSERT INTO Estoque(Nome_Produto, Descricao_Produto, Quantidade_Minima, Quantidade_Estocada) 
VALUES(UPPER('$Nome_Item'), UPPER('$Descricao_Item'), '$Quantidade_Minima', 0)";

mysqli_query($conexao, $query);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual CRIOU um novo produto em nosso ESTOQUE ($Nome_Item). Agora teremos um maior controle sobre a entrada e saída desse produto em nosso estoque!";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php?pagina=estoque');