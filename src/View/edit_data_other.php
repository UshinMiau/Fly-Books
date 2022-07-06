<?php

    session_start();

    if(!empty($_SESSION['data_login_user']) && (!empty($_SESSION['user_data_edit']) || !empty($_SESSION['client_data_edit']))) {
        $data_user = unserialize($_SESSION['data_login_user']); 
        
        if(!empty($_SESSION['user_data_edit'])) {
            $user_data_edit = $_SESSION['user_data_edit'];
        }
        else {
            $client_data_edit = $_SESSION['client_data_edit'];
        }
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
    <title>Editar Dados</title>
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
            <h2>Altere os dados desejados</h2>
            <?php
                if(!empty($user_data_edit)):
            ?>
                <form action="../Controller/User.php?operation=update&&edit_other=true" method="POST">
                    <article class="form__inputs">
                        <label for="name">Nome completo:</label>
                        <input required type="text" name="name" id="name" value="<?= $user_data_edit['name'] ?>">
                        
                        <label for="login">Login:</label>
                        <input required type="text" name="login" id="login" value="<?= $user_data_edit['login'] ?>">

                        <label for="password">Senha:</label>
                        <input required type="password" name="password" id="password">
                        
                        <input type="hidden" name="id_user" id="id_user" value="<?= $user_data_edit['id_user'] ?>">

                        <input type="submit" value="Atualizar">
                    </article>
                </form>
            <?php
                unset($_SESSION['user_data_edit']);
                else:
            ?>
                <form action="../Controller/Client.php?operation=update&&edit_other=true" method="POST">
                    <article class="form__inputs">
                        <label for="name">Nome completo:</label>
                        <input required type="text" name="name" id="name" value="<?= $client_data_edit['name'] ?>">
                        
                        <label for="birth_date">Data de nascimento:</label>
                        <input required type="date" name="birth_date" id="birth_date" value="<?= $client_data_edit['birth_date'] ?>">
                        
                        <label for="email">E-Mail:</label>
                        <input required type="email" name="email" id="email" value="<?= $client_data_edit['email'] ?>">

                        <label for="password">Senha:</label>
                        <input required type="password" name="password" id="password">
                        
                        <input type="hidden" name="id_client" id="id_client" value="<?= $client_data_edit['id_client'] ?>">

                        <input type="submit" value="Atualizar">
                    </article>
                </form>
            <?php
                endif;
                unset($_SESSION['client_data_edit']);
            ?>
        </div>
    </main>
    
    <footer class="site-end">
        <div class="container">
            <p>©Todos os direitos reservados.</p>
        </div>
    </footer>
</body>

</html>