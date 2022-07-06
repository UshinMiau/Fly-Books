<?php

    session_start();

    if(empty($_SESSION['list_of_books'])) {
        header('location: ../Controller/Book.php?operation=list_of_books');
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
    <link rel="icon" type="imagem/png" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Explorar livros</title>
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
    <link rel="stylesheet" href="css/style_explorar.css">
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

    <nav class="search">
        <div class="container">
            <form action="../Controller/Book.php?operation=search" method="POST">
                <article class="search__container-input">
                    <input type="text" name="name_book" id="name_book" placeholder="Busque seu livro">
                    <label for="submit_input">
                        <i class="fas fa-search"></i>
                    </label>
                    <input type="submit" name="submit_input" id="submit_input">
                </article>
            </form>
        </div>
    </nav>
    
    <?php
        if(!empty($_SESSION['data_login_client']) || !empty($_SESSION['data_login_user'])) :
    ?>
        <section class="add-book">
            <div class="container">
                <a href="add_book.php">Cadastrar livro</a>
            </div>
        </section>
    <?php
        endif;
    ?>

    <main class="book-shelf">
        <div class="container">
            
            <?php
                foreach ($_SESSION['list_of_books'] as $book):
            ?>
                <div class="book-shelf__book-container">
                    <article class="book-shelf__book">
                        <header>
                            <img src="img_book/book_cover/<?= $book['name_book_cover'] ?>" alt="Capa do livro">
                            <article class="book-shelf__data">
                                <h3><?= $book['title'] ?></h3>
                                <h4><?= $book['author'] ?></h4>
                            </article>
                        </header>
                        
                        <main class="book-shelf__description">
                            <p>
                                <?= $book['description'] ?>
                            </p>
                        </main>

                        <footer>
                            <a href="../Controller/Book.php?operation=edit&&id_book=<?= $book['id_book'] ?>" class="book-shelf__read-more-button">Ler mais</a>
                        </footer>
                    </article>
                </div>
            <?php
                endforeach;
                unset($_SESSION['list_of_books']);
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