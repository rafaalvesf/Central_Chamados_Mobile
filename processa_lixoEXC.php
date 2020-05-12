<?php 
session_start();
include 'db.php';
$Nome_Produto = $_POST['nome_produtose'];
$Quantidade = $_POST['quantidadese'];
$Solicitante = $_POST['solicitantese'];
$Setor_Solicitante = $_POST['setorse'];
$Motivo = $_POST['descricaose'];


$query = "UPDATE Lixo SET Quantidade = Quantidade-'$Quantidade', Valor_Aproximado = Valor_Aproximado/Lixo.Quantidade*(Lixo.Quantidade -1) WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Saida_Lixo(Nome_Produto, Quantidade, Data_Saida, Motivo_Retirada) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, '$Motivo')"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual RECUPEROU $Quantidade produto de nosso LIXO ELETRÔNICO ($Nome_Produto). Não está levando lixo pra casa não né joven?! 🤔";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php?pagina=lixo');
