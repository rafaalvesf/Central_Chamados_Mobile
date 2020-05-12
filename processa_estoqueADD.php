<?php 
session_start();
include 'db.php';
$Nome_Produto = strtoupper($_POST['nome_produtoee']);
$Quantidade = $_POST['quantidadeee'];
$Quantidade_Minima = $_POST['quantidade_minimaee'];
$Valor_aproximado = $_POST['valor_aproximadoee'];
$Fornecedor = $_POST['fornecedoree'];
$Motivo = $_POST['descricaoee'];

$query = "UPDATE Estoque SET Quantidade_Estocada = Quantidade_Estocada+'$Quantidade', Quantidade_Minima = '$Quantidade_Minima' , Valor_aproximado = Estoque.Quantidade_Estocada*'$Valor_aproximado' WHERE Nome_Produto = '$Nome_Produto'";
$query1 ="INSERT INTO Entrada_Estoque(Nome_Produto, Quantidade, Data_Entrada, Fornecedor, Descricao, Valor_Aproximado) 
VALUES ('$Nome_Produto', '$Quantidade', CURRENT_TIMESTAMP, UPPER('$Fornecedor'), '$Motivo', '$Valor_aproximado')"; 


mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual ADICIONOU $Quantidade - $Nome_Produto(S) em nosso ESTOQUE. Agora sabemos que temos $Nome_Produto caso alguém precise!";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php?pagina=estoque');