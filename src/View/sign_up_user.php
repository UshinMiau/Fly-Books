<?php

    session_start();

    if(!empty($_SESSION['data_login_user'])) {
        $data_user = unserialize($_SESSION['data_login_user']); 
    }
    else {
        header('location: ../../index.php'); 
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="imagem/png" href="img/logo.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Sign Up Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/jQuery.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- my scripts -->
    <script src="js/functions_main.js"></script>
    <!-- my styles -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_main.css">
    <link rel="stylesheet" href="css/style_form.css">
</head>
<body>
    <header class="menu">
        <div class="container">
            <a href="../../index.php">
                <article class="menu__logo">
                    
                </article>
            </a>
            <nav class="menu__menu-desktop">
                <div class="menu__mobile-navigation-icon">
                    <i class="fas fa-bars"></i>
                </div>
                
                <ul>
                    <li><a href="../Controller/Book.php?operation=list_of_books">Explorar livros</a></li>
                    <li><a href="perfil.php">
                        <i class="fas fa-user-astronaut"></i>
                        <?= $data_user['name']; ?>
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <nav class="menu-mobile">
        <ul>
            <li><a href="../Controller/Book.php?operation=list_of_books">Explorar livros</a></li>
            <li><a href="perfil.php">
                <i class="fas fa-user-astronaut"></i>
                <?= $data_user['name']; ?>
            </a></li>
        </ul>
    </nav>

    <main class="form">
        <div class="container">
            <h2>Insira as credenciais</h2>
            
            <form action="../Controller/User.php?operation=sign_up" method="POST">
                <article class="form__inputs">
                    <label for="name">Nome completo:</label>
                    <input required type="text" name="name" id="name">
                    
                    <label for="login">Login:</label>
                    <input required type="text" name="login" id="login">

                    <label for="password">Senha:</label>
                    <input required type="password" name="password" id="password">

                    <input type="submit" value="Cadastrar">
                </article>
            </form>
        </div>
    </main>

    <footer class="site-end">
        <div class="container">
            <p>©Todos os direitos reservados.</p>
        </div>
    </footer>
</body>

</html>