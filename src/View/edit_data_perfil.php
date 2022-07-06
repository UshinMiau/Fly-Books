<?php

    session_start();

    if(empty($_SESSION['data_login_client']) && empty($_SESSION['data_login_user'])) {
        header('location: ../../index.php');
    }
    else {
        if(!empty($_SESSION['data_login_user'])) {
            $data_user = unserialize($_SESSION['data_login_user']); 
        }
        else if(!empty($_SESSION['data_login_client'])) {
            $data_client = unserialize($_SESSION['data_login_client']); 
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="imagem/png" href="img/logo.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Meu perfil</title>
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
                        <?php
                            if(!empty($data_user)):
                        ?>
                            <i class="fas fa-user-astronaut"></i>
                            <?= $data_user['name']; ?>
                        <?php
                            else:
                        ?>
                            <i class="fas fa-user-circle"></i>
                        <?php
                            echo $data_client['name'];
                            endif;
                        ?>
                    </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <nav class="menu-mobile">
        <ul>
            <li><a href="../Controller/Book.php?operation=list_of_books">Explorar livros</a></li>
            <li><a href="perfil.php">
                <?php
                    if(!empty($data_user)):
                ?>
                    <i class="fas fa-user-astronaut"></i>
                    <?= $data_user['name']; ?>
                <?php
                    else:
                ?>
                    <i class="fas fa-user-circle"></i>
                <?php
                    echo $data_client['name'];
                    endif;
                ?>
            </a></li>
        </ul>
    </nav>

    <main class="form">
        <div class="container">
            <h2>Altere os dados desejados:</h2>
            
            <?php
                if(!empty($data_user)):
            ?>
                <form action="../Controller/User.php?operation=update" method="POST">
                    <article class="form__inputs">
                        <label for="name">Nome:</label>
                        <input required type="text" name="name" id="name" value="<?= $data_user['name'] ?>">

                        <label for="login">Login:</label>
                        <input required type="text" name="login" id="login" value="<?= $data_user['login'] ?>">

                        <label for="password">Senha:</label>
                        <input required type="password" name="password" id="password">

                        <input type="hidden" name="id_user" id="id_user" value= "<?= $data_user['id_user'] ?>">

                        <input type="submit" value="Atualizar">
                    </article>
                </form>
            <?php
                else:
            ?>
                <form action="../Controller/Client.php?operation=update" method="POST">
                    <article class="form__inputs">
                        <label for="name">Nome:</label>
                        <input required type="text" name="name" id="name" value="<?= $data_client['name'] ?>">
                        
                        <label for="birth_date">Data de nascimento:</label>
                        <input required type="date" name="birth_date" id="birth_date" value="<?= $data_client['birth_date'] ?>">

                        <label for="login">E-Mail:</label>
                        <input required type="email" name="email" id="email" value="<?= $data_client['email'] ?>">

                        <label for="password">Senha:</label>
                        <input required type="password" name="password" id="password">
                        
                        <input type="hidden" name="id_client" id="id_client" value= "<?= $data_client['id_client'] ?>">
                        
                        <input type="submit" value="Atualizar">
                    </article>
                </form>
            <?php
                endif;
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