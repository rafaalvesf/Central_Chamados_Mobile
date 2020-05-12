<?php 
session_start();
include 'db.php';

$Status_fechamento = $_POST['itstatus'];
$Descricao_Fechamento = $_POST['idescricao_tratativa'];
$Id_Referencia = $_POST['Id_Chamado_Ref'];

if($Descricao_Fechamento==""){

}
else{
$query = "INSERT INTO fechar_chamado(Id_Chamado_Ref, Tratativa, Data_Fechamento) 
VALUES('$Id_Referencia', '$Descricao_Fechamento', CURRENT_TIMESTAMP)";
}
$query1 = "UPDATE Chamados SET Chamados.Status='$Status_fechamento' WHERE Id_Chamado = $Id_Referencia";

if($Status_fechamento == "FECHADO"){
    $query2 = "INSERT INTO fechar_chamado(Id_Chamado_Ref, Tratativa, Data_Fechamento) 
    VALUES('$Id_Referencia', 'Chamado Fechado', CURRENT_TIMESTAMP)";
}

mysqli_query($conexao, $query);
mysqli_query($conexao, $query1);
mysqli_query($conexao, $query2);
################ BOT TELEGRAM ############################
while($linha = mysqli_fetch_array($consulta_chamados2)){
    if($linha['Id_Chamado'] == $Id_Referencia){
##Variaveis
$datab = new DateTime($linha['Data_Abertura']);
$dataa = new DateTime();
$intervalo = $datab->diff($dataa);
$Tempo_Fechamento = $intervalo->format('%R%a dias %H:%I');

$Nome_Chamado = $linha['Titulo_Chamado'];
$Nome_Solicitante = $linha['Solicitante_Chamado'];
$Setor_Chamado = $linha['Setor_Solicitante'];
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$GRUPO SITRAN ID = -1001232835927;
##$GRUP TESTE ID = -443000747;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
if($Status_fechamento == 'FECHADO'){
$Msgm="🤖 Olá, vi que o $User_Atual acabou de FECHAR o chamado $Nome_Chamado solicitado pelo Sr.(a) $Nome_Solicitante-$Setor_Chamado. O chamado foi Finalizado!";
}
if($Status_fechamento == 'PAUSADO'){
    $Msgm="🤖 Olá, vi que o $User_Atual acabou de PAUSAR o chamado $Nome_Chamado solicitado pelo Sr.(a) $Nome_Solicitante-$Setor_Chamado.";
}
if($Status_fechamento == 'ABERTO'){
    $Msgm="🤖 Olá, vi que o $User_Atual INSERIU UMA TRATATIVA no chamado $Nome_Chamado solicitado pelo Sr.(a) $Nome_Solicitante-$Setor_Chamado.";
}
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
    }
}
##########################################################
header('location:home.php?pagina=chamados');