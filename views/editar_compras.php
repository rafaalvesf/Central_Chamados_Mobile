<script type="text/javascript">
function validateFormedit() {
    var nome = document.forms["editar_compra_form"]["nomeP"].value;
    var marca = document.forms["editar_compra_form"]["marcaP"].value;
    var modelo = document.forms["editar_compra_form"]["modeloP"].value;
    var serial = document.forms["editar_compra_form"]["serialP"].value;
    var nota = document.forms["editar_compra_form"]["notaP"].value;
    var data = document.forms["editar_compra_form"]["dataP"].value;
    var prazo = document.forms["editar_compra_form"]["garantiaP"].value;
    var fornecedor = document.forms["editar_compra_form"]["fornecedorP"].value;
    var destinatario = document.forms["editar_compra_form"]["destinatarioP"].value;

    if (nome == null || nome == "" || marca == null || marca == "" || modelo == null || modelo == "" || serial ==
        null || serial == "" || nota == null || nota == "" || data == null || data == "" || data == "dd/mm/aaaa" ||
        prazo == null || prazo == "" || fornecedor == null || fornecedor == "" || destinatario == null ||
        destinatario == "") {
        alert("HÁ CAMPOS OBRIGATÓRIOS NÂO PREENCHIDOS");
        return false;
    }
}
</script>
<br>
<?php while($linha = mysqli_fetch_array($consulta_compras)){ ?>
<?php if($linha['Id'] == $_GET['editar']){ ?>
<link rel="stylesheet" href="css/main.css">
<div class="backformulario">
    <p class="h6 ctexto ctexto1">EDITAR REGISTRO DE COMPRA</p>
    <div class="ctexto">
        <form name="editar_compra_form" action="processa_edita_compras.php" class="formulario"
            onsubmit="return validateFormedit()" method="post">
            <input type="hidden" name="Id" value="<?php echo $linha['Id']; ?>">
            <br>
            <label>Nome do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="nomeP"
                value="<?php echo $linha['Nome_Produto']; ?>" style="text-transform:uppercase">
            <br><br>
            <label>Marca do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="marcaP"
                value="<?php echo $linha['Marca_Produto']; ?>" style="text-transform:uppercase">
            <br><br>
            <label>Modelo do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="modeloP"
                value="<?php echo $linha['Modelo_Produto']; ?>" style="text-transform:uppercase"><br><br>
            <label>Serial Number:</label><br>
            <input class="ctexto backformularioinput" type="text" name="serialP"
                value="<?php echo $linha['Serial_Number']; ?>" style="text-transform:uppercase"><br><br>
            <label>Nota Fiscal:</label><br>
            <input class="ctexto backformularioinput" type="text" name="notaP"
                value="<?php echo $linha['Nota_Fiscal']; ?>" style="text-transform:uppercase"><br><br>
            <label>Data da Compra:</label><br>
            <input class="ctexto backformularioinput" type="date" name="dataP"
                value="<?php echo $linha['Data_Compra']; ?>" style="text-transform:uppercase"><br><br>
            <label>Prazo de Garantia:</label><br>
            <input class="ctexto backformularioinput" type="text" name="garantiaP"
                value="<?php echo $linha['Prazo_Garantia']; ?>" style="text-transform:uppercase"><br><br>
            <label>Fornecedor:</label><br>
            <input class="ctexto backformularioinput" type="text" name="fornecedorP"
                value="<?php echo $linha['Fornecedor']; ?>" style="text-transform:uppercase"><br><br>
            <label>Destino do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="destinatarioP"
                value="<?php echo $linha['Destinatario']; ?>" style="text-transform:uppercase"><br><br>
            <div class="ctexto">
                <input type="submit" value="Salvar" name="Salvar" class="button">
            </div>
        </form>
    </div>
</div><br>
<?php } ?>
<?php } ?>