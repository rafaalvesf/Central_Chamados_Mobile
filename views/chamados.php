<link rel="stylesheet" href="css/main.css">
<div class="ctexto">
    <p class="h6 ctexto1">MEUS CHAMADOS</p>
    <nav class="navbar navbar-light bg-light">
        <form method="post" action="?pagina=filtrar_chamado&filtrosearch" class="form-inline">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="insearch" placeholder="Procurar" aria-label="Procurar">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>
            </div>
        </form>
    </nav>
    <div class="input-group mb-3 spacement padding">
        <form method="post">
            <button type="submit" class="btn btn-secondary left" value="Exibir Fechados" name="mcheckbox1">Exibir
                Fechados</button>
        </form>
        <a href="?pagina=abrir_chamado" type="button" class="btn btn-success right">Abrir Chamado</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr class="thead-dark">
                <th scope="col">Motivo</th>
                <th scope="col">Soli.</th>
                <th scope="col">Resp.</th>
                <th scope="col">Prio.</th>
                <th scope="col">Stat.</th>
            </tr>
        </thead>
        <tbody>
            <?php              
		while($linha = mysqli_fetch_array($consulta_chamados3)){

            if($linha['Status'] != 'FECHADO'){
            echo '<tr><th scope="row"><a class="linktitulo" href="?pagina=abrir_chamado&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></th>';
            }
            else{
                echo '<tr><th scope="row"><a class="linktitulo" href="?pagina=listar_fechados&tratativa='.$linha['Id_Chamado'].'">'.$linha['Titulo_Chamado'].'</a></th>';
            }
            echo '<td style="color:#696969"><a class="linktitulo filtros" href="?pagina=filtrar_chamado&filtroso='.$linha['Solicitante_Chamado'].'">'.$linha['Solicitante_Chamado'].'</a></td>';
            echo '<td>'.$linha['Responsavel_Tecnico'].'</td>';
            
            if($linha['Prioridade'] == 'ALTA'){
            echo '<td style="color:red; font-weight:bold">✱</td>';
            };
            if($linha['Prioridade'] == 'BAIXA'){
            echo '<td style="color:green; font-weight:bold">✱</td>';
            };
            if($linha['Prioridade'] == 'MEDIA'){
            echo '<td style="color:gray; font-weight:bold">✱</td>';
            };     

            if($linha['Status'] == 'ABERTO'){
            echo '<td style="color:green; font-weight:bold">✱</td>';
            };
            if($linha['Status'] == 'FECHADO'){
            echo '<td style="color:black; font-weight:bold">✱</td>';
            };
            if($linha['Status'] == 'PAUSADO'){
            echo '<td style="color:orange; font-weight:bold">✱</td>';
            }
    ?>
            <?php
		}
	?>
        </tbody>
    </table>

</div>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='60'>";
?>