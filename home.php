<?php
session_start();
#verificar se o usuário é valodio
include ('verifica_login.php');

#Banco de dados 
include 'db.php';

#Incluindo o Cabecalho da página
include 'header.php';

#Incluindo o corpo da página
if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}
else{
	$pagina = 'home';
}

switch($pagina){
	case 'chamados': include 'views/chamados.php'; break;
	case 'estoque': include 'views/estoque.php'; break;
	case 'lixo': include 'views/lixo.php'; break;
	case 'gsetor': include 'views/gsetor.php'; break;
	case 'gcompras': include 'views/gcompras.php'; break;
	case 'gresponsavel': include 'views/gresponsavel.php'; break;
	case 'gprioridade': include 'views/gprioridade.php'; break;
	case 'abrir_chamado': include 'views/abrir_chamado.php'; break;
	case 'abrir_compras': include 'views/abrir_compras.php'; break;
	case 'adicionar_estoque': include 'views/adicionar_estoque.php'; break;
	case 'editar_chamado': include 'views/editar_chamado.php'; break;
	case 'editar_usuario': include 'views/editar_usuario.php'; break;
	case 'editar_compras': include 'views/editar_compras.php'; break;
	case 'listar_fechados': include 'views/listar_fechados.php'; break;
	case 'adicionar_setores': include 'views/adicionar_setores.php'; break;
	case 'alterar_senha': include 'views/alterar_senha.php'; break;
	case 'criar_usuario': include 'views/criar_usuario.php'; break;
	case 'filtrar_chamado': include 'views/filtrar_chamado.php'; break;
	case 'filtrar_compras': include 'views/filtrar_compras.php'; break;
	case 'termo_entrega': include 'views/termo_entrega.php'; break;
	case 'adicionar_lixo': include 'views/adicionar_lixo.php'; break;


	default: include 'views/home.php'; break;
}

#Incluindo o Rodape da pagina
include 'footer.php';