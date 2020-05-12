<script type="text/javascript">
function validateUser() {
    var nome = document.forms["edit_user"]["nomeusuario"].value;
    var senha = document.forms["edit_user"]["senhausuario"].value;
    var confsenha = document.forms["edit_user"]["senhausuario1"].value;

    if (nome == null || nome == "" || senha == null || senha == "" || confsenha == null || confsenha == "") {
        alert("HÁ CAMPOS OBRIGATÓRIOS NÂO PREENCHIDOS");
        return false;
    }
    if (senha != confsenha) {
        alert("AS SENHAS NÃO CORRESPONDEM");
        return false;
    }
}
</script>
<br>
<?php while($linha=mysqli_fetch_array($consulta_usuarios)){ ?>
<?php if($linha['Nome_Usuario'] == $_GET['editar']){ ?>
<div class="ctexto backformulario">
    <p class="h6 ctexto ctexto1">ALTERAR DADOS DE <?php echo $_GET['editar'] ?></p>
    <form method="post" action="processa_edita_usuario.php" onsubmit="return validateUser()" name='edit_user'
        class="formulario">
        <div style="ctexto">
            <label>Alterar Nome do Usuário:</label><br>
            <input class="ctexto backformularioinput" type="text" name="nomeusuario" readonly=“true”
                value="<?php echo $linha['Nome_Usuario']?>" style="text-transform:uppercase">
            <br><br>
            <label>Alterar Senha:</label><br>
            <input class="ctexto backformularioinput" type="password" name="senhausuario"
                value="<?php echo $linha['Senha_Usuario']?>">
            <br><br>
            <label>Confirmar Senha:</label><br>
            <input class="ctexto backformularioinput" type="password" name="senhausuario1"
                value="<?php echo $linha['Senha_Usuario']?>">
            <br><br>
            <?php 
                if($linha['Perfil'] == '1'){ ?>
            <select class="ctexto" name="perfilusuario" class="backformularioinput">
                <option class="ctexto">ADMINISTRADOR</option>
                <option class="ctexto">PADRÃO</option>
            </select><br><br>
            <?php }
                else{
                ?>
            <select class="ctexto" name="perfilusuario" class="backformularioinput">
                <option class="ctexto">PADRÃO</option>
                <option class="ctexto">ADMINISTRADOR</option>
            </select><br><br>
            <?php } ?>
            <div class="d-flex">
                <div class="marginz">
                    <button type="submit" name="salvarusers" value="ABERTO" class="btn btn-secondary">Salvar</button>
                </div>
            </div>
        </div>
        <br>
</div>
</form>
</div>
<?php } ?>
<?php } ?>