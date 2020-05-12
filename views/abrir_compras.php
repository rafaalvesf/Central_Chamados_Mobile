<?php
include 'db.php';
if (!isset($_GET['tratativa'])) {
?>

<script type="text/javascript">
function validateForm() {
    var nome = document.forms["abrir_compra_form"]["nomeP"].value;
    var marca = document.forms["abrir_compra_form"]["marcaP"].value;
    var modelo = document.forms["abrir_compra_form"]["modeloP"].value;
    var serial = document.forms["abrir_compra_form"]["serialP"].value;
    var nota = document.forms["abrir_compra_form"]["notaP"].value;
    var data = document.forms["abrir_compra_form"]["dataP"].value;
    var prazo = document.forms["abrir_compra_form"]["garantiaP"].value;
    var fornecedor = document.forms["abrir_compra_form"]["fornecedorP"].value;
    var destinatario = document.forms["abrir_compra_form"]["destinatarioP"].value;

    if (nome == null || nome == "" || marca == null || marca == "" || modelo == null || modelo == "" || serial ==
        null || serial == "" || nota == null || nota == "" || data == null || data == "" || data == "dd/mm/aaaa" ||
        prazo == null || prazo == "" || fornecedor == null || fornecedor == "" || destinatario == null ||
        destinatario == "") {
        alert("HÁ CAMPOS OBRIGATÓRIOS NÂO PREENCHIDOS");
        return false;
    }
}
</script>
<div class="backformulario">
    <link rel="stylesheet" href="css/main.css">
    <p class="h6 ctexto ctexto1">REGISTRAR PRODUTO</p>
    <div class="ctexto">
        <form name="abrir_compra_form" action="processa_compra.php" class="formulario" onsubmit="return validateForm()"
            method="post">
            <br>
            <label>Nome do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="nomeP" placeholder="Insira o nome do produto"
                style="text-transform:uppercase">
            <br><br>
            <label>Marca do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="marcaP" placeholder="Insira a marca do produto"
                style="text-transform:uppercase">
            <br><br>
            <label>Modelo do Produto:</label><br>
            <input class="ctexto backformularioinput" type="text" name="modeloP"
                placeholder="Insira o modelo do produto" style="text-transform:uppercase">
            <br><br>
            <label>Serial Number:</label><br>
            <input class="ctexto backformularioinput" type="text" name="serialP" placeholder="Insira o S/N do produto"
                style="text-transform:uppercase">
            <br><br>
            <label>N° Nota Fiscal:</label><br>
            <input class="ctexto backformularioinput" type="text" name="notaP" placeholder="Insira a o número da NF"
                style="text-transform:uppercase">
            <br><br>
            <label>Data Compra:</label><br>
            <input class="ctexto backformularioinput" type="date" name="dataP">
            <br><br>
            <label>Prazo de Garantia:</label><br>
            <input class="ctexto backformularioinput" type="number" name="garantiaP" value="0"
                style="text-transform:uppercase;width:110px">
            <select name="garantia1P" class="backformularioinput" style="width:100px">
                <option>MESES</option>
                <option>ANOS</option>
            </select>
            <br><br>
            <label>Fornecedor:</label><br>
            <input class="ctexto backformularioinput" type="text" name="fornecedorP"
                placeholder="Insira o fornecedor do produto" style="text-transform:uppercase">
            <br><br>
            <label>Destinatário:</label><br>
            <input class="ctexto backformularioinput" type="text" name="destinatarioP"
                placeholder="Insira o destinatário do produto" style="text-transform:uppercase">
            <br><br>
            <div class="ctexto">
                <input type="submit" value="Salvar" name="Salvar" class="button">
            </div><br>
        </form>
    </div>
</div><br>
<?php
} else {
?>
<?php
    while ($linha = mysqli_fetch_array($consulta_compras)) {
        $datab = new DateTime($linha['Data_Compra']);
?>
<?php
        if ($linha['Id'] == $_GET['tratativa']) {
?>
<p class="h6 ctexto ctexto1"> INFORMAÇÕES ADICIONAIS DO ÍTEM #<?php
            echo $linha['Id'];
?> </p>
<br>
<div class="bordertratativa">
    <div class="colorform">
        <p class="h6 ctexto ctexto3"><?php
            echo $linha['Nome_Produto'];
?></p>
        <p class="h6 ctexto tratativaletter">INFORMAÇÕES ESPECIAIS</p><br>
        <div class="displaytratativa">
            <p class="ctexto flexstrutura tratativaletter" style="margin: 0 auto">Marca: </p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Marca_Produto'];            
?></p>
            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">Modelo:</p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Modelo_Produto'];
?></p><br><br><br>
        </div>
        <div class="displaytratativa">

            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">S/N:</p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Serial_Number'];
?></p>
            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">Nota Fiscal:</p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Nota_Fiscal'];
?></p>
        </div>
        <br><br>
        <div class="displaytratativa">
            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">Prazo de Garantia: </p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Prazo_Garantia'];
?></p>
            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">Data Compra:</p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $datab->format('d-m-Y');
?></p><br><br><br>
        </div>
        <div class="displaytratativa">
            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">Fornecedor:</p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Fornecedor'];
?></p>
            <p class="h6 ctexto flexstrutura tratativaletter" style="margin: 0 auto">Destino:</p>
            <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Destinatario'];
?></p>
        </div>
        <br><br>
        <?php
            $i = 1;
            $y = 0;
            while ($linha = mysqli_fetch_array($consulta_tratativa)) {
                $dataalt = new DateTime($linha['Data_Fechamento']);
?>
        <h6 class="formulario ctexto" style="margin: 0 auto"><?php echo $dataalt->format('d-m-y h:i') ?>_#<?php
                echo $i;
?> - <?php
                echo $linha['Tratativa'];
                $i++;
                $y = 1;
?></h6>
        <?php
            }
?>
        <br>
        <div style="text-align:center">
            <div class="d-flex">
            </div>

        </div>
        <br>
    </div>
</div>
<?php
        }
?>
<?php
    }
?>

<?php
}
?>