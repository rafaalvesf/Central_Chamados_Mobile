<?php 
session_start();
include 'db.php';

$Id_Compra = $_POST['Id'];
$Nome_Produto = strtoupper($_POST['nomeP']);
$Marca_Produto = strtoupper($_POST['marcaP']);
$Modelo_Produto = $_POST['modeloP'];
$Serial_Produto = $_POST['serialP'];
$Nota_Produto = $_POST['notaP'];
$Prazo_Garantia = $_POST['garantiaP'];

$Fornecedor_Produto = $_POST['fornecedorP'];
$Destino_Produto = $_POST['destinatarioP'];

$Data_Compra = $_POST['dataP'];

$query = "UPDATE Compras SET Nome_Produto=UPPER('$Nome_Produto'),
Marca_Produto=UPPER('$Marca_Produto'), Modelo_Produto=UPPER('$Modelo_Produto'), Serial_Number= UPPER('$Serial_Produto'),
Nota_Fiscal=UPPER('$Nota_Produto'), Prazo_Garantia=UPPER('$Prazo_Garantia'), Fornecedor=UPPER('$Fornecedor_Produto'),
Destinatario=UPPER('$Destino_Produto'), Data_Compra=UPPER('$Data_Compra') WHERE Id = '$Id_Compra'";

mysqli_query($conexao, $query);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual EDITOU o produto $Nome_Produto-$Marca_Produto em nossa lista de controle de COMPRAS.";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php?pagina=gcompras');