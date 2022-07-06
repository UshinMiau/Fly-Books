<?php

    session_start();

    
    if(empty($_SESSION['data_book'])) {
        header('location: ../Controller/Book.php?operation=list_of_books');
    }
    else {
        $book = $_SESSION['data_book'];

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
    <title>Book</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/jQuery.js"></script>
    <!--  font awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- my scripts -->
    <script src="js/functions_main.js"></script>
    <!-- my styles -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_main.css">
    <link rel="stylesheet" href="css/style_book.css">
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

                    <?php
                        if(empty($data_user) && empty($data_client)):
                    ?>
                        <li><a href="sign_in.php">Iniciar sessão</a></li>
                    <?php
                        else:
                    ?>
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
                    <?php
                        endif;
                    ?>
                </ul>
            </nav>
        </div>
    </header>

    <nav class="menu-mobile">
        <ul>
            <li><a href="../Controller/Book.php?operation=list_of_books">Explorar livros</a></li>
            <?php
                if(empty($data_user) && empty($data_client)):
            ?>
                <li><a href="sign_in.php">Iniciar sessão</a></li>
            <?php
                else:
            ?>
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
            <?php
                endif;
            ?>
        </ul>
    </nav>


    <main class="book">
        <div class="container">
            <section class="book__section">
                <header>
                    <img src="img_book/book_cover/<?= $book['name_book_cover'] ?>" alt="Capa do livro">
                    
                    <article class="book__data">
                        <h2><?= $book['title'] ?></h2>
                        <h3><?= $book['author'] ?></h3>
                        <p>Postado por: <?= $book['name_who_posted'] ?></p>
                        <p>Data de postagem: <?= $book['date_posted'] ?></p>
                    </article>
                </header>
                
                <article class="book__description">
                    <h3>Sinopse:</h3>
                    <p>
                        <?= $book['description'] ?>
                    </p>
                </article>
                
                <footer>
                    <a download href="img_book/book_pdf/<?= $book['name_book_pdf'] ?>" class="book__button">Baixar livro</a>

                    <a target="_blank" href="img_book/book_pdf/<?= $book['name_book_pdf'] ?>" class="book__button">Ler livro</a>
                </footer>
            </section>
        </div>
    </main>

    <footer class="site-end">
        <div class="container">
            <p>©Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>









