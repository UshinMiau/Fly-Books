<?php

    session_start();

    if(!empty($_SESSION['data_login_user']) && !empty($_SESSION['list_of_books'])) {
        $data_user = unserialize($_SESSION['data_login_user']); 
    }
    else {
        header('location: ../Controller/Book.php?operation=list_of_books') ;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="imagem/png" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Editar livros</title>
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

    <nav class="search">
        <div class="container">
            <input type="text" name="search" id="search" placeholder="Busque seu livro">
        </div>
    </nav>

    <section class="add-book">
        <div class="container">
            <a href="add_book.php">Cadastrar livro</a>
        </div>
    </section>
    
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

                            <a href="../Controller/Book.php?operation=remove&&id_book=<?= $book['id_book'] ?>&&name_book_cover=<?= $book['name_book_cover'] ?>&&name_book_pdf=<?= $book['name_book_pdf'] ?>" class="book-shelf__read-more-button">Remover</a>
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