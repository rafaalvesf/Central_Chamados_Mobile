<?php 
session_start();
include 'db.php';
$Id_Chamado = $_POST['Id_Chamado'];
$Titulo_Chamado = strtoupper($_POST['imotivo']);
$Descricao_Chamado = $_POST['idescricao_chamado'];
$Solicitante_Chamado = strtoupper($_POST['isolicitante']);
$Setor_Solicitante = $_POST['isetor_solicitante'];
$Responsavel_Tecnico = strtoupper($_POST['idesignado']);
$Prioridade = $_POST['iprioridade'];

if($Titulo_Chamado==null || $Descricao_Chamado==null || $Solicitante_Chamado==null|| $Setor_Solicitante==null ||$Responsavel_Tecnico=="Selecione um atendente" ){

}
else{
$query = "UPDATE Chamados SET Titulo_Chamado=UPPER('$Titulo_Chamado'), Descricao_Chamado='$Descricao_Chamado', Solicitante_Chamado=UPPER('$Solicitante_Chamado'), Setor_Solicitante= UPPER('$Setor_Solicitante'), Responsavel_Tecnico=UPPER('$Responsavel_Tecnico'), Prioridade=('$Prioridade') WHERE Id_Chamado = '$Id_Chamado'";
}
mysqli_query($conexao, $query);
################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$Group_id = -1001232835927;
$User_Atual = strtoupper($_SESSION['usuario_digitado']);
if($Prioridade=='ALTA'){
 $Urgencia = 'com prioridade ALTA';
}
if($Prioridade=='BAIXA'){
    $Urgencia = 'com prioridade BAIXA';
   }
$Msgm="🤖 Olá, vi que o $User_Atual EDITOU o chamado $Titulo_Chamado solicitado pelo Sr(a) $Solicitante_Chamado Sob responsabilidade do Sr. $Responsavel_Tecnico $Urgencia";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################
header('location:home.php');