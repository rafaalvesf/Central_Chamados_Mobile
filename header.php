<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chamados TI</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <?php date_default_timezone_set('America/Sao_Paulo'); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="?pagina=home" class="logo">
                <img src="img/oie_transparent.png" title="Logo" alt="Logo" width="110" height="73">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=chamados">Meus Chamados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=estoque">Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=lixo">Lixo Eletrônico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=gcompras">Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=gsetor">Relatórios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?pagina=alterar_senha">Alterar Minha Senha</a>
                            <?php 
			while($linha = mysqli_fetch_array($consulta_usuarios1)){
				if($linha['Perfil'] == '1'){
					echo '<a  class="dropdown-item" href="?pagina=criar_usuario">Gerenciar Usuários</a>';
				}
			}
			?>
                        </div>
                    </li>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="logout.php">Sair</a>
                </ul>
            </div>
        </nav>

</html>