<?php
        while($linha = mysqli_fetch_array($consulta_setores)){ ?>
		<?php if($linha['Nome_Setor'] == $_GET['add']){ ?>
			
			<div class="ctexto">
				<h3 class="ctexto1">ADICIONAR SETOR</h3>
			</div>
			<div>
			<h4 class="ctexto">Setores Existentes no Momento</h4>
			<table border="0.5" class="table table-hover tablesetores">
            <tr class="thead-dark">
                <th>ID</th>
                <th>Nome do Setor</th>

            </tr>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_setores)){
            echo '<tr><td class="alicolunas alicolunas1">'.$linha1['Id_Setor'].'</td>';
            echo '<td class="alicolunas alicolunas1">'.$linha1['Nome_Setor'].'</td>';
			}
    		?>
			</table>
			<br><br><br>
			</div>
			<div class="backformulario">
			<div class="ctexto">
				<h4>Adicionando um Novo Setor.</h4>
			</div>
			<form method="post" action="processa_setorADD.php" class="formulario ctexto">
    			<br>
    			<label>Nome do Setor:</label><br>
    			<input type="text" name="nomesetoradd" placeholder="NOME DO SETOR" class="ctexto backformularioinput" style="text-transform:uppercase">
    			<br><br>
		
    			<div class="ctexto">
    			<input type="submit" value="Salvar" class="button"><br><br>
    			</div>
			</div>
			</form>
            <?php } ?>	
            <?php } ?>	