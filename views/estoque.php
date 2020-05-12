<link rel="stylesheet" href="css/main.css">
<div class="ctexto">
    <p class="h6 ctexto1">ESTOQUE SITRAN</p>

    <div class="padding">
        <a href="?pagina=adicionar_estoque" type="button" class="btn btn-primary btn-success">Adicionar Novo Ítem</a>
    </div>

    <table class="table table-hover ctexto">
        <thead>
            <tr class="thead-dark">
                <th scope="col">Produto</th>
                <th scope="col">QTD</th>
                <th scope="col">Est.Mín.</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php    
	    while($linha = mysqli_fetch_array($consulta_estoque)){
            $datab = new DateTime($linha['Ultima_Retirada']);
            $dataa = new DateTime();
            $intervalo = $datab->diff($dataa);

            echo '<tr><th scope="row">'.$linha['Nome_Produto'].'</th>';
            if($linha['Quantidade_Estocada'] <= $linha['Quantidade_Minima']){
            echo '<td style="color:red">'.$linha['Quantidade_Estocada'].'</td>';
            }
            else{
            echo '<td>'.$linha['Quantidade_Estocada'].'</td>';    
            }
            if($linha['Quantidade_Estocada'] <= $linha['Quantidade_Minima']){
            echo '<td style="color:red"> '.$linha['Quantidade_Minima'].' </td>';
            }
            else{
            echo '<td>'.$linha['Quantidade_Minima'].'</td>';    
            }
    ?>
            <td><a href="?pagina=adicionar_estoque&add=<?php echo $linha['Nome_Produto']; ?>"><img src="img/Add.ico"
                        style="width:25px; height:25px"></a></td>
            <td><a href="?pagina=adicionar_estoque&remove=<?php echo $linha['Nome_Produto']; ?>"><img
                        src="img/remov.png" style="width:25px; height:25px"></a></td>
            <?php
        }
	?>

    </table>

</div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>