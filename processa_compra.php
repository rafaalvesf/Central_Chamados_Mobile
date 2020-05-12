<?php 
session_start();
include 'db.php';

$Nome_Produto = strtoupper($_POST['nomeP']);
$Marca_Produto = strtoupper($_POST['marcaP']);
$Modelo_Produto = $_POST['modeloP'];
$Serial_Produto = $_POST['serialP'];
$Nota_Produto = $_POST['notaP'];
$Prazo_Garantia = $_POST['garantiaP'];
$Tempo_Garantia = $_POST['garantia1P'];
$Fornecedor_Produto = $_POST['fornecedorP'];
$Destino_Produto = $_POST['destinatarioP'];
$Garantia = "$Prazo_Garantia $Tempo_Garantia";
$Data_Compra = $_POST['dataP'];

$query = "INSERT INTO Compras(Nome_Produto, Marca_Produto, Modelo_Produto, Serial_Number, Nota_Fiscal, Data_Compra, Prazo_Garantia, Fornecedor, Destinatario) 
VALUES (UPPER('$Nome_Produto'), UPPER('$Marca_Produto'), UPPER('$Modelo_Produto'), UPPER('$Serial_Produto'), UPPER('$Nota_Produto'), '$Data_Compra', UPPER('$Garantia'), UPPER('$Fornecedor_Produto'), UPPER('$Destino_Produto'))";

mysqli_query($conexao, $query);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
$Msgm="🤖 Olá, vi que o $User_Atual REGISTROU um $Nome_Produto-$Marca_Produto em nossa lista de controle de COMPRAS. Agora teremos um maior controle sobre suas informações!";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php?pagina=gcompras');