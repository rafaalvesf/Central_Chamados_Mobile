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
    <form name="form_add_item" onsubmit="return validateFormAddItem()" method="post" action="processa_estoque.php"
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
        <label>Estoque Mínimo:</label><br>
        <input type="number" name="quantidade_minima" class="ctexto backformularioinput"><br><br>
        <br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button">
        </div>
    </form>
</div>


<?php } else if(isset($_GET['add'])) { ?>
<script type="text/javascript">
function validateFormAddItem() {
    var qtditem = document.forms["form_rmv_item"]["quantidadeee"].value;
    var qtdminitem = document.forms["form_rmv_item"]["quantidade_minimaee"].value;
    var fornecedoritem = document.forms["form_rmv_item"]["fornecedoree"].value;

    if (qtditem <= 0 || qtditem == "" || qtdminitem < 0 || qtdminitem == "" || fornecedoritem == null ||
        fornecedoritem == "") {
        alert("Há campos obrigatórios em branco");
        return false;

    }
}
</script>
<?php while($linha = mysqli_fetch_array($consulta_estoque)){ ?>
<?php if($linha['Nome_Produto'] == $_GET['add']){ ?>

<div class="ctexto">
    <p class="h6 ctexto1">ENTRADA DE PRODUTO NO ESTOQUE</p>
</div>
<div>
    <div>
        <p class="h6 ctexto">Últimas Entradas de Produtos</p>
        <form method="post" class="padding ctexto">
            <button type="submit" class="btn btn-secondary left" value="Exibir Todos" name="checktodos"> Exibir Todos
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
                <th scope="col">Fornecedor</th>
            </tr>
        </thead>
        <tbody>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_entrada_estoque)){

				$datab = new DateTime($linha1['Data_Entrada']);
				$dataa = new DateTime();
				$intervalo = $datab->diff($dataa);

            echo '<tr><th scope="row">'.$linha1['Id_Entrada'].'</th>';
            echo '<td>'.$linha1['Nome_Produto'].'</td>';
            echo '<td>'.$linha1['Quantidade'].'</td>';
            echo '<td>'.$intervalo->format('%R%a dias %H:%I').'</td>';
            echo '<td>'.$linha1['Fornecedor'].'</td>';
			}
    		?>
    </table>
    <br>
</div>
<div class="backformulario">
    <div class="ctexto ctexto1">
        <p class="h6">Adicionando <?php echo $linha['Nome_Produto']?> ao estoque.</p>
    </div>
    <form name="form_rmv_item" onsubmit="return validateFormAddItem()" method="post" action="processa_estoqueADD.php"
        class="formulario ctexto">
        <label>Quantidade:</label><br>
        <input type="NUMBER" name="quantidadeee" value="1" class="ctexto backformularioinput">
        <br><br>
        <label>Estoque Mínimo Necessário(ATUAL):</label><br>
        <input type="number" name="quantidade_minimaee" value="<?php echo $linha['Quantidade_Minima']?>"
            class="ctexto backformularioinput"><br><br>
        <label>Valor Aproximado (UND):</label><br>
        R$<input type="number" name="valor_aproximadoee" class="ctexto backformularioinput" style="width:195px"><br><br>
        <label>Fornecedor:</label><br>
        <input type="text" name="fornecedoree" class="ctexto backformularioinput"
            placeholder="Escreva o Nome do Fornecedor" style="text-transform:uppercase"><br><br>
        <label>Motivo da Compra:</label><br>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="backformularioinput marginz" style="height:50px" aria-label="With textarea"
                name="descricaoee"></textarea>
        </div>
        <input type="hidden" name="nome_produtoee" value="<?php echo $linha['Nome_Produto']?>">
        <br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button"><br>
        </div>
    </form><br>
</div><br>
<?php } ?>
<?php } ?>
<?php } else { while($linha = mysqli_fetch_array($consulta_estoque)){ ?>
<?php if($linha['Nome_Produto'] == $_GET['remove']){ ?>
<script type="text/javascript">
function validateFormRmvItem() {
    var qtditemr = document.forms["form_rmve_item"]["quantidadese"].value;
    var solicititemr = document.forms["form_rmve_item"]["solicitantese"].value;
    var setorsolir = document.forms["form_rmve_item"]["setorse"].value;
    var motivor = document.forms["form_rmve_item"]["descricaose"].value;

    if (qtditemr <= 0 || qtditemr == "" || solicititemr < null || solicititemr == "" || setorsolir ==
        "SETOR DO SOLICITANTE" || setorsolir == "" || setorsolir == null || motivor < null || motivor == "") {
        alert("Preencher Todos os Campos");
        return false;

    }
}
</script>
<script>
function reapareceDiv() {
    document.getElementById("teste").style.display = "block";
}
</script>

<div class="ctexto">
    <p class="h6 ctexto1">SAÍDA DE PRODUTO NO ESTOQUE</p>
</div>
<div>
    <div>
        <p class="h6 ctexto">Últimas Saídas de Produtos</p>
        <form method="post" class="padding ctexto">
            <button type="submit" class="btn btn-secondary left" value="Exibir Todos" name="checktodos"> Exibir Todos
            </button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="thead-dark">
                <th>ID</th>
                <th>Produto</th>
                <th>QTD</th>
                <th>Data Said.</th>
                <th>Solicitante</th>
            </tr>
        </thead>
        <tbody>
            <?php    
	    	while($linha1 = mysqli_fetch_array($consulta_saida_estoque)){
			
			$datab = new DateTime($linha1['Data_Saida']);
			$dataa = new DateTime();
			$intervalo = $datab->diff($dataa);	
				
            echo '<tr><th scope="row">'.$linha1['Id_Saida'].'</th>';
            echo '<td><a class="linktitulo" href="?pagina=termo_entrega&termo='.$linha1['Id_Saida'].'">'.$linha1['Nome_Produto'].'</a></td>';
            echo '<td>'.$linha1['Quantidade'].'</td>';
            echo '<td>'.$intervalo->format('%R%a dias %H:%I').'</td>';
            echo '<td>'.$linha1['Solicitante'].'</td>';
			}
    		?>
        </tbody>
    </table>
    <br><br><br>
</div>
<div class="backformulario">
    <div class="ctexto ctexto1">
        <h4>Retirando <?php echo $linha['Nome_Produto']?> do estoque.</h4>
    </div>
    <form name="form_rmve_item" onsubmit="return validateFormRmvItem()" method="post" action="processa_estoqueEXC.php"
        class="formulario ctexto">
        <input type="hidden" name="nome_produtose" value="<?php echo $linha['Nome_Produto']?>">
        <br>
        <label>Quantidade:</label><br>
        <input type="NUMBER" name="quantidadese" value="1" class="ctexto backformularioinput">
        <br><br>
        <label>Solicitante:</label><br>
        <input type="text" name="solicitantese" class="ctexto backformularioinput"
            placeholder="Escreva o Nome do Solicitante" style="text-transform:uppercase"><br><br>
        <label>Setor do Solicitante:</label><br>

        <select name="setorse" class="backformularioinput">
            <option>SETOR DO SOLICITANTE</option>
            <?php
    						while ($linha = mysqli_fetch_array($consulta_setores)) {
        					echo '<option class="ctexto" value="' . $linha['Nome_Setor'] . '">' . $linha['Nome_Setor'] . '</option>';
    					}

						?>
        </select>
        <br><br>

        <label>Motivo da Saída:</label><br>
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <textarea class="backformularioinput marginz" style="height:50px" aria-label="With textarea"
                name="descricaose"></textarea>
        </div><br><br>
        <input class="" type="button" value="Especificação Técnica" onclick="reapareceDiv()" /><br />
        <div class="ocultadiv" id="teste">
            <label>Marca:</label><br>
            <input type="text" name="marcase" class="ctexto backformularioinput"
                placeholder="Escreva a Marca do Produto" style="text-transform:uppercase"><br><br>
            <label>Modelo:</label><br>
            <input type="text" name="modelose" class="ctexto backformularioinput"
                placeholder="Escreva o Modelo do Produto" style="text-transform:uppercase"><br><br>
            <label>Acessórios:</label><br>
            <input type="text" name="acessoriosse" class="ctexto backformularioinput"
                placeholder="Escreva os Acessórios do Produto" style="text-transform:uppercase"><br><br>
            <label>S/N:</label><br>
            <input type="text" name="serialse" class="ctexto backformularioinput" placeholder="Escreva o S/N do Produto"
                style="text-transform:uppercase"><br><br>
            <label>Especificações:</label><br>
            <input type="text" name="especificacoesse" class="ctexto backformularioinput"
                placeholder="Escreva as Especificações do Produto" style="text-transform:uppercase"><br><br>
            <label>Condição:</label><br>
            <input type="text" name="condicaose" class="ctexto backformularioinput"
                placeholder="Escreva a Condição do Produto" style="text-transform:uppercase"><br><br>
        </div><br><br>
        <div class="ctexto">
            <input type="submit" value="Salvar" class="button"><br><br>
        </div>
    </form>
</div><br>
<?php } ?>
<?php } ?>
<?php } ?>