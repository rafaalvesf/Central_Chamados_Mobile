<?php 
session_start();
include 'db.php';

$Titulo_Chamado = strtoupper($_POST['imotivo']);
$Descricao_Chamado = $_POST['idescricao_chamado'];
$Solicitante_Chamado = strtoupper($_POST['isolicitante']);
$Setor_Solicitante = $_POST['isetor_solicitante'];
$Responsavel_Tecnico = strtoupper($_POST['idesignado']);
$Prioridade = $_POST['iprioridade'];

if($Titulo_Chamado==null || $Descricao_Chamado==null || $Solicitante_Chamado==null|| $Setor_Solicitante==null ||$Responsavel_Tecnico=="Selecione um atendente" ){

}
else{
$query = "INSERT INTO Chamados(Titulo_Chamado, Descricao_Chamado, Solicitante_Chamado, Setor_Solicitante, Data_Abertura ,Responsavel_Tecnico, Prioridade, Status) 
VALUES(UPPER('$Titulo_Chamado'), '$Descricao_Chamado',UPPER('$Solicitante_Chamado'), UPPER('$Setor_Solicitante'), CURRENT_TIMESTAMP, UPPER('$Responsavel_Tecnico'),'$Prioridade', 'ABERTO')";

}
mysqli_query($conexao, $query);

################ BOT TELEGRAM ############################
$Token = '1167014634:AAEk3g7VZasm9Bz6hv2P68uAZu8Oz1wPEuY';
$Group_id = -1001232835927;
##$Group_id = -1001232835927;
if($Prioridade=='ALTA'){
 $Urgencia = 'e me parece ser URGENTE';
}
if($Prioridade=='BAIXA'){
    $Urgencia = 'mas não me parece ser urgente';
   }
$Msgm="🤖 Olá, vi que foi ABERTO a requisição de $Titulo_Chamado pelo Sr(a) $Solicitante_Chamado Sob responsabilidade do Sr. $Responsavel_Tecnico $Urgencia";
$Request_Params=[
    'chat_id' => $Group_id,
    'text' => $Msgm
];
$Request_Url='https://api.telegram.org/bot'.$Token.'/sendMessage?chat_id='.$Group_id.'&text='.$Msgm.'';
file_get_contents($Request_Url);
##########################################################

header('location:home.php');