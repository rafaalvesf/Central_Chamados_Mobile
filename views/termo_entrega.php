<?php
include 'db.php';

    while ($linha = mysqli_fetch_array($consulta_saida_estoque)) {
        $datab = new DateTime($linha['Data_Saida']);
?>
   <?php
        if ($linha['Id_Saida'] == $_GET['termo']) {
?>

<p class="h6 ctexto ctexto1"> TERMO DE ENTREGA DE EQUIPAMENTO </p>
        <div class="">
        <div class="">
  <br><br>
        <div class="displaytratativa">
            <p class="h6 formulario formulariocolor">Item: </p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Nome_Produto'].'</p>';?></p>  
        </div>
        <br>
        <div class="displaytratativa">
            <p class="formulario formulariocolor">Marca: </p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Marca_Produto'].'</p>';?></p>
        </div>
        <br>
        <div class="displaytratativa">
            <p class="formulario formulariocolor">Modelo: </p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Modelo_Produto'].'</p>';?></p>
        </div>
        <br>
        <div class="displaytratativa">
            <p class="formulario formulariocolor">Acessórios: </p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Acessorios'].'</p>';?></p>
        </div>
            <br>
        <div class="displaytratativa">
            <p class="formulario formulariocolor">S/N: </p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Serial_Number'].'</p>';?></p>
        </div>
            <br>
        <div class="displaytratativa">
            <p class="formulario formulariocolor">Especificações: </p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Especificacoes'].'</p>';?></p>
        </div>
            <br>
        <div class="displaytratativa">
            <p class="formulario formulariocolor">Estado de uso:</p><p> &nbsp; &nbsp;<?php echo '<p class="h6">'.$linha['Condicao_Produto'].'</p>';?></p>
        </div>
            <br>
        </div>

            <p>Foi fornecido, para o(a) Sr(a). <?php echo $linha['Solicitante'];?> do setor de <?php echo $linha['Setor_Solicitante'];?> um(a) <?php echo $linha['Nome_Produto'];?>
                da marca <?php echo $linha['Marca_Produto'];?>, modelo <?php echo $linha['Modelo_Produto'];?> <?php if($linha['Acessorios'] == '' || $linha['Acessorios'] == null){ ?>
                    .
                <?php } else{ ?>
                    , com <?php echo $linha['Acessorios'];?>.
                <?php } ?>

            </p><br>
            <p>O equipamento foi entregue pelo setor de informática para o uso do Sr(a).<?php echo $linha['Solicitante'];?> em suas atribuições profissionais.</p><br>
            <p>O equipamento de SN: <?php echo $linha['Serial_Number'];?> entregue ao solicitante, é dotado de um <?php echo $linha['Especificacoes'];?>.</p><br>
            <p>O equipamento foi entregue na data de <?php echo $datab->format('d-m-y h:i');?> e a condição de uso é <?php echo $linha['Condicao_Produto'];?>.</p>
       </div>
    <?php
        }
?>
    <?php }
    ?>