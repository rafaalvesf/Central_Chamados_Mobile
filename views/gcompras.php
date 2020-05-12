<link rel="stylesheet" href="css/main.css">
<div class="ctexto">

    <p class="h6 ctexto1">COMPRAS REALIZADAS</p>
    <nav class="navbar navbar-light bg-light">
        <form method="post" action="?pagina=filtrar_compras&filtrarcompras" class="form-inline">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="searchcomp" placeholder="Procurar" aria-label="Procurar">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </div>
        </form>
    </nav>
    <div class="padding">
        <a href="?pagina=abrir_compras" type="button" class="btn btn-primary btn-success">Adicionar Novo Ítem</a>
    </div>

    <table class="table table-hover ctexto">
        <thead>
            <tr class="thead-dark">
            <th scope="col">Produto</th>
            <th scope="col">Marca</th>
            <th scope="col">Data Comp.</th>
            <th scope="col">Dest.</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php              
		while($linha = mysqli_fetch_array($consulta_compras)){           
            $datab = new DateTime($linha['Data_Compra']);
            echo '<tr><th scope="row"><a class="linktitulo" href="?pagina=abrir_compras&tratativa='.$linha['Id'].'">'.$linha['Nome_Produto'].'</a></th>';
            echo '<td>'.$linha['Marca_Produto'].'</td>';
            echo '<td>'.$datab->format('d-m-y').'</td>';
            echo '<td>'.$linha['Destinatario'].'</td>';
    ?>
        <td><a href="?pagina=editar_compras&editar=<?php echo $linha['Id'];?>"><img class="logo_edit"
                    src="img/edit.png"></a></td>
        <?php
		}
	?>

    </table>

</div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>