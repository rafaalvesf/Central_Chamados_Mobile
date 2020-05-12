<?php
if (isset($_GET['filtrose'])) {
?>

<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h3 class="ctexto1">CHAMADOS ABERTOS PARA <?php echo $_GET['filtrose']?></h3>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
<table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
	</tr>
    <?php    
		while($linha = mysqli_fetch_array($consulta_chamados4)){
            $datab = new DateTime($linha['Data_Abertura']);
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1 largtable">'.$linha['Titulo_Chamado'].'</td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td class="alicolunas"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtrose='.$linha['Setor_Solicitante'].'">'.$linha['Setor_Solicitante'].'</a></td>';
            echo '<td class="alicolunas">'.$datab->format('d-m-y').'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td class="alicolunas" style="color:red; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td class="alicolunas" style="color:gray; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td class="alicolunas" style="color:black; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td class="alicolunas" style="color:orange; font-weight:bold">'.$linha['Status'].'</td>';
            }
    ?>
	<?php
        }
	?>

</table>
</div>

    <?php } ?>

<?php
if (isset($_GET['filtroso'])) {
?>

<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h3 class="ctexto1">CHAMADOS ABERTOS PARA <?php echo $_GET['filtroso']?></h3>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
<table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
	</tr>
    <?php    
		while($linha = mysqli_fetch_array($consulta_chamados5)){
            $datab = new DateTime($linha['Data_Abertura']);
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1 largtable">'.$linha['Titulo_Chamado'].'</td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td class="alicolunas"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtrose='.$linha['Setor_Solicitante'].'">'.$linha['Setor_Solicitante'].'</a></td>';
            echo '<td class="alicolunas">'.$datab->format('d-m-y').'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td class="alicolunas" style="color:red; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td class="alicolunas" style="color:gray; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td class="alicolunas" style="color:black; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td class="alicolunas" style="color:orange; font-weight:bold">'.$linha['Status'].'</td>';
            }
    ?>
	<?php
        }
	?>

</table>
</div>

<?php } ?>
<?php
if (isset($_GET['filtroseu'])) {
?>

<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h3 class="ctexto1">CHAMADOS ABERTOS PARA <?php echo $_GET['filtroseu']?></h3>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
<table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
	</tr>
    <?php    
		while($linha = mysqli_fetch_array($consulta_chamados6)){
            $datab = new DateTime($linha['Data_Abertura']);
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1 largtable">'.$linha['Titulo_Chamado'].'</td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td class="alicolunas"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtrose='.$linha['Setor_Solicitante'].'">'.$linha['Setor_Solicitante'].'</a></td>';
            echo '<td class="alicolunas">'.$datab->format('d-m-y').'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td class="alicolunas" style="color:red; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td class="alicolunas" style="color:gray; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td class="alicolunas" style="color:black; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td class="alicolunas" style="color:orange; font-weight:bold">'.$linha['Status'].'</td>';
            }
    ?>
	<?php
        }
	?>

</table>
</div>

    <?php } ?>

<?php
if (isset($_GET['filtrosou'])) {
?>

<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h3 class="ctexto1">CHAMADOS ABERTOS PARA <?php echo $_GET['filtrosou']?></h3>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
<table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
	</tr>
    <?php    
		while($linha = mysqli_fetch_array($consulta_chamados7)){
            $datab = new DateTime($linha['Data_Abertura']);
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1 largtable">'.$linha['Titulo_Chamado'].'</td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td class="alicolunas"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtrose='.$linha['Setor_Solicitante'].'">'.$linha['Setor_Solicitante'].'</a></td>';
            echo '<td class="alicolunas">'.$datab->format('d-m-y').'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td class="alicolunas" style="color:red; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td class="alicolunas" style="color:gray; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td class="alicolunas" style="color:black; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td class="alicolunas" style="color:orange; font-weight:bold">'.$linha['Status'].'</td>';
            }
    ?>
	<?php
        }
	?>

</table>
</div>

<?php } ?>

<?php
if (isset($_GET['filtrosearch'])) {
?>

<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h3 class="ctexto1">CHAMADOS ABERTOS PARA <?php echo $_GET['filtrosearch']?></h3>

    <a href="?pagina=abrir_chamado" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
<table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Motivo</th>
		<th>Descrição</th>
        <th>Solicitante</th>
        <th>Setor</th>
        <th>Abertura</th>
        <th>Responsável</th>
        <th>Prioridade</th>
        <th>Status</th>
	</tr>
    <?php    
		while($linha = mysqli_fetch_array($consulta_chamados8)){
            $datab = new DateTime($linha['Data_Abertura']);
			echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id_Chamado'].'</td>';
            if($linha['Status'] != 'FECHADO'){
            echo '<td class="alicolunas alicolunas1 largtable">'.$linha['Titulo_Chamado'].'</td>';
            }
            else{
                echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></td>';
            }
            echo '<td class="alicolunas">'.$linha['Descricao_Chamado'].'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td class="alicolunas"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtrose='.$linha['Setor_Solicitante'].'">'.$linha['Setor_Solicitante'].'</a></td>';
            echo '<td class="alicolunas">'.$datab->format('d-m-y').'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha['Responsavel_Tecnico'].'</td>';
            
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td class="alicolunas" style="color:red; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td class="alicolunas" style="color:gray; font-weight:bold">'.$linha['Prioridade'].'</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td class="alicolunas" style="color:green; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td class="alicolunas" style="color:black; font-weight:bold">'.$linha['Status'].'</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td class="alicolunas" style="color:orange; font-weight:bold">'.$linha['Status'].'</td>';
            }
    ?>
	<?php
        }
	?>

</table>
</div>

    <?php } ?>