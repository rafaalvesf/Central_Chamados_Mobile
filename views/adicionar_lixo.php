<?php if(!isset($_GET['add'])&&!isset($_GET['remove'])){ ?>

<script type="text/javascript">
function validateFormAddItem() {
    var nomeitem = document.forms["form_add_item"]["nome_item"].value;
    var descricao_item = document.forms["form_add_item"]["descricao_item"].value;
    var estoque_minimo = document.forms["form_add_item"]["quantidade_minima"].value;
    if (nomeitem == null || nomeitem == "" || descricao_item == null || descricao_item == "" || estoque_minimo ==
        null || estoque_minimo == "") {
        alert("Há campos em branco");
        return false;

    }
}
</script>
<br>
<div class="backformulario">
    <div class="ctexto">
        <p class="h6 ctexto1">ADICIONAR UM ÍTEM NA LISTA</p>
    </div>
    <form name="form_add_item" onsubmit="return validateFormAddItem()" method="post" action="processa_lixo.php"
        class="formulario ctexto">
        <br>
        <label>Nome do Item:</label><br>
        <input type="text" name="nome_item" placeholder="Nome do Item" style="text-transform:uppercase"
            class="ctexto backformularioinput">
        <br><br>
        <label>Descrição:</label><br>
        <textarea class="form-control backformularioinput" aria-label="With textarea" name="descricao_item"
            style="height: 60px" placeholder="Descreva o item a ser adicionado"
            style="text-transform:uppercase"></textarea><br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button">
        </div>
    </form>
</div>


<?php } else if(isset($_GET['add'])) { ?>
<?php while($linha = mysqli_fetch_array($consulta_lixo)){ ?>
<?php if($linha['Nome_Produto'] == $_GET['add']){ ?>

<div class="ctexto">
    <p class="h6 ctexto1">ENTRADA DE LIXO NO ESTOQUE</p>
</div>
<div>
    <div>
        <p class="h6 ctexto">Últimas Entradas de Lixo</p>
        <form method="post" class="padding ctexto">
            <button type="submit" class="btn btn-secondary left" value="Exibir Todos" name="checktodoslx"> Exibir Todos
            </button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">QTD</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_entrada_lixo)){

				$datab = new DateTime($linha1['Data_Entrada']);
				$dataa = new DateTime();
				$intervalo = $datab->diff($dataa);

            echo '<tr><th scope="row">'.$linha1['Id_Entrada'].'</td>';
            echo '<td>'.$linha1['Nome_Produto'].'</td>';
            echo '<td>'.$linha1['Quantidade'].'</td>';
            echo '<td>'.$intervalo->format('%R%a dias %H:%I').'</td>';
			}
    		?>
        </tbody>
    </table>
    <br>
</div>
<div class="backformulario">
    <div class="ctexto ctexto1">
        <p class="h6">Descartando <?php echo $linha['Nome_Produto']?> ao lixo.</p>
    </div>
    <form method="post" action="processa_lixoADD.php" class="formulario ctexto">
        <br>
        <label>Quantidade:</label><br>
        <input type="NUMBER" name="quantidadeee" value="1" class="ctexto backformularioinput">
        <br><br>
        <label>Valor Aproximado (UND):</label><br>
        R$<input type="number" name="valor_aproximadoee" class="ctexto backformularioinput" style="width:195px"><br><br>
        <label>Setor de Origem:</label><br>
        <input type="text" name="fornecedoree" class="ctexto backformularioinput"
            placeholder="Escreva o Setor de Origem" style="text-transform:uppercase"><br><br>
        <label>Motivo / Defeito:</label><br>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="backformularioinput marginz" style="height:50px" aria-label="With textarea"
                name="descricaoee"></textarea>
        </div>
        <input type="hidden" name="nome_produtoee" value="<?php echo $linha['Nome_Produto']?>">
        <br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button"><br><br>
        </div>
    </form>
</div><br>
<?php } ?>
<?php } ?>
<?php } else { while($linha = mysqli_fetch_array($consulta_lixo)){ ?>
<?php if($linha['Nome_Produto'] == $_GET['remove']){ ?>

<div class="ctexto">
    <p class="h6 ctexto1">SAÍDA DE PRODUTO DO LIXO</p>
</div>
<div>
    <div>
        <p class="h6 ctexto">Últimas Saídas de Produtos</p>
		<form method="post" class="padding ctexto">
            <button type="submit" class="btn btn-secondary left" value="Exibir Todos" name="checktodoslx1"> Exibir Todos
            </button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Produto</th>
            <th scope="col">QTD</th>
            <th scope="col">Data Ret.</th>
            <th scope="col">Motivo</th>
        </tr>
		</thead>
        <tbody>
        <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_saida_lixo)){
			
			$datab = new DateTime($linha1['Data_Saida']);
			$dataa = new DateTime();
			$intervalo = $datab->diff($dataa);	
				
            echo '<tr><th scope="row">'.$linha1['Id_Saida'].'</td>';
            echo '<td>'.$linha1['Nome_Produto'].'</td>';
            echo '<td>'.$linha1['Quantidade'].'</td>';
            echo '<td>'.$intervalo->format('%R%a dias %H:%I').'</td>';
			echo '<td>'.$linha1['Motivo_Retirada'].'</td>';
			}
    		?>
    </table>
    <br>
</div>
<div class="backformulario">
    <div class="ctexto ctexto1">
        <p class="h6">Retirando <?php echo $linha['Nome_Produto']?> do Lixo.</p>
    </div>
    <form method="post" action="processa_lixoEXC.php" class="formulario ctexto">
        <input type="hidden" name="nome_produtose" value="<?php echo $linha['Nome_Produto']?>">
        <br>
        <label>Quantidade:</label><br>
        <input type="NUMBER" name="quantidadese" value="1" class="ctexto backformularioinput">
        <br><br>
        <label>Motivo da Saída:</label><br>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="backformularioinput marginz" style="height:50px" aria-label="With textarea"
                name="descricaose"></textarea>
        </div><br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button"><br><br>
        </div>
    </form>
</div>
<?php } ?>
<?php } ?>
<?php } ?>