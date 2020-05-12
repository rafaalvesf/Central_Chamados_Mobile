<script type="text/javascript">
function validateUser() {
    var nome = document.forms["criar_user"]["nomeusuario"].value;
    var senha = document.forms["criar_user"]["senhausuario"].value;
    var confsenha = document.forms["criar_user"]["senhausuario1"].value;

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
<script>
function funcao1() {
    var x;
    var r = confirm("Você Realmente deseja EXCLUIR o usuário?");
    if (r == true) {
        x = "você pressionou OK!";
    } else {
        return false;;
    }
    document.getElementById("demo").innerHTML = x;
}
</script>
<p class="h6 ctexto ctexto1">Usuários Existentes no Momento</p><br>
<table class="table table-hover">
    <thead>
        <tr class="thead-dark">
            <th scope="col">Nome Usuário</th>
            <th scope="col">Perfil</th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>
        <?php    
	    while($linha1 = mysqli_fetch_array($consulta_usuarios)){
        echo '<tr><th scope="row">'.$linha1['Nome_Usuario'].'</th>';
        if($linha1['Perfil'] == "1"){
        echo '<td>Administrador</td>';
        }
        else{
            echo '<td>Padrão</td>';
        }
    	?>
        <td><a href="?pagina=editar_usuario&editar=<?php echo $linha1['Nome_Usuario'];?>"><img class="logo_edit"
                    src="img/edit.png"></a></td>
        <td>
            <form method="post" onsubmit="return funcao1()" action="processa_exclui_usuario.php">
                <input type="hidden" name="nomeexcusuario" value="<?php echo $linha1['Nome_Usuario'];?>">
                <input type="image" class="logo_edit" src="img/removs.png">
            </form>
        </td>
        <?php } ?>
    </tbody>
</table><br>
<div class="ctexto backformulario">
    <p class="h6 ctexto1">Criar Usuário</p>
    <form method="post" action="processa_criar_usuario.php" class="formulario" onsubmit="return validateUser()"
        name="criar_user">
        <div style="ctexto">
            <label>Nome do Usuário:</label><br>
            <input class="ctexto backformularioinput" type="text" name="nomeusuario"
                placeholder="Digite o nome do usuário" style="text-transform:uppercase">
            <br><br>
            <label>Criar Senha:</label><br>
            <input class="ctexto backformularioinput" type="password" name="senhausuario"
                placeholder="DIGITE A SENHA DESEJADA">
            <br><br>
            <label>Confirmar Senha:</label><br>
            <input class="ctexto backformularioinput" type="password" name="senhausuario1"
                placeholder="REPITA A SENHA DIGITADA">
            <br><br>
            <select class="ctexto" name="perfilusuario" class="backformularioinput">
                <option class="ctexto">PADRÃO</option>
                <option class="ctexto">ADMINISTRADOR</option>
            </select><br><br>
            <div class="d-flex">
                <div class="marginz">
                    <button type="submit" name="salvarusers" value="ABERTO" class="btn btn-secondary">Salvar</button>
                </div>
            </div>
        </div>
        <br>
</div>
</form><br>
</div>