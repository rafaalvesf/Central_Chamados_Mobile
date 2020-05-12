<?php
if(isset($_GET['filtrarcompras'])) {
?>

<link rel="stylesheet" href="css/main.css">
<div class="ctexto"> 
    <h3 class="ctexto1">COMPRAS REALIZADAS</h3>

    <a href="?pagina=abrir_compras" style="text-decoration:none;"><img src="img/add.ico" class="iconadd"></a>
    <table border="0.5" class="table table-hover">
	<tr class="thead-dark">
		<th>ID</th>
		<th>Produto</th>
		<th>Marca</th>
        <th>Data Aquisição</th>
        <th>Fornecedor</th>
        <th>Destino</th>
	</tr>

    <?php              
		while($linha = mysqli_fetch_array($consulta_compras2)){
           
            $datab = new DateTime($linha['Data_Compra']);


            echo '<tr><td class="alicolunas alicolunas1">'.$linha['Id'].'</td>';
            echo '<td class="alicolunas alicolunas1"><a class="linktitulo" href="?pagina=abrir_compras&tratativa='.$linha['Id'].'">'.$linha['Nome_Produto'].'</a></td>';
            echo '<td class="alicolunas">'.$linha['Marca_Produto'].'</td>';
            echo '<td class="alicolunas">'.$datab->format('d-m-y').'</td>';
            echo '<td class="alicolunas alicolunas1" style="color:#696969">'.$linha['Fornecedor'].'</td>';
            echo '<td class="alicolunas">'.$linha['Destinatario'].'</td>';
		}
	?>

</table>
</div>

    <?php } ?>