<?php 
session_start();
include 'db.php';

$Nome_Item = strtoupper($_POST['nome_item']);
$Descricao_Item = $_POST['descricao_item'];

$query = "INSERT INTO Lixo(Nome_Produto, Quantidade, Descricao) 
VALUES(UPPER('$Nome_Item'), 0, '$Descricao_Item')";

mysqli_query($conexao, $query);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual CRIOU um novo item em nosso LIXO ELETRÔNICO ($Nome_Item).";
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php?pagina=lixo');

