<?php
    while ($linha = mysqli_fetch_array($consulta_chamados)) {
        $datab = new DateTime($linha['Data_Abertura']);
?>
<?php
        if ($linha['Id_Chamado'] == $_GET['tratativa']) {
?>
<p class="h6 ctexto ctexto1"> TRATATIVAS REALIZADAS NO CHAMADO #<?php
            echo $linha['Id_Chamado'];
?> </p>
<br>
<div class="bordertratativa">
    <div class="colorform">
        <p class="h5 ctexto ctexto3"><?php
            echo $linha['Titulo_Chamado'];
?></p>
        <p class="ctexto tratativaletter h6">DESCRIÇÃO DO CHAMADO</p>
        <P class="formulario formulariocolor ctexto"><?php
            echo $linha['Descricao_Chamado'];
?></p>
        <p class="ctexto tratativaletter h6">SOLICITANTE DO CHAMADO</p>
        <p class="formulario formulariocolor ctexto h6" style="margin: 0 auto"><?php
            echo $linha['Solicitante_Chamado'];
?> - <?php
            echo $linha['Setor_Solicitante'];
?></p> <br>
        <p class="ctexto tratativaletter h6">DATA</p>
        <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $datab->format('d-m-y h:i');
?></p><br>
        <p class="ctexto tratativaletter h6">RESPONSÁVEL</p>
        <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Responsavel_Tecnico'];
?></p><br>
        <p class="ctexto tratativaletter h6">PRIORIDADE</p>
        <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Prioridade'];
?></p><br>
        <p class="ctexto tratativaletter h6">STATUS</p>
        <p class="formulario formulariocolor ctexto" style="margin: 0 auto"><?php
            echo $linha['Status'];
?></p><br>
        <p class="h5 ctexto" style="color:#FA5858;text-decoration: underline;">Ações Realizadas</p>
        <?php
            $i = 1;
            $y = 0;
            while ($linha = mysqli_fetch_array($consulta_tratativa)) {
                $dataalt = new DateTime($linha['Data_Fechamento']);
?>
        <p class="formulario ctexto" style="margin: 0 auto"><?php echo $dataalt->format('d-m-y h:i') ?>_#<?php
                echo $i;
?> - <?php
                echo $linha['Tratativa'];
                $i++;
                $y = 1;
?></p>
        <?php
            }
?>
        <?php
                if($y==0){?>
        <p class="h6 ctexto ctexto1"> Nenhuma Tratativa Realizada </p>
        <?php }
?>
        <br>
        <form method="post" action="processa_fechamento.php" class="formulario">
            <div style="text-align:center">
                <input type="hidden" name="Id_Chamado_Ref" value="<?php echo $_GET['tratativa']?>">
                <div class="d-flex">
                    <div class="MARGINZ">
                        <button type="submit" name="itstatus" value="ABERTO" class="btn btn-secondary">Reabrir</button>
                    </div>
                </div>

            </div>
            <br>
    </div>
    </form>
</div>
<?php
        }
?>
<?php
    }
?>