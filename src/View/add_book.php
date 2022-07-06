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
    <link rel="icon" type="imagem/png" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Cadastrar livro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/jQuery.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- my scripts -->
    <script src="js/functions_main.js"></script>
    <script src="js/functions_add-book.js"></script>
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


    <main class="form">
        <div class="container">
            <h2>Insira os dados do livro</h2>
            
            <form action="../Controller/Book.php?operation=sign_up" method="POST" enctype="multipart/form-data">
                <article class="form__inputs">
                    <label for="title">Título:</label>
                    <input required type="text" name="title" id="title">
                    
                    <label for="author">Autor:</label>
                    <input required type="text" name="author" id="author">

                    <label for="description">Descrição:</label>
                    <textarea required name="description" id="description" cols="30" rows="10"></textarea>

                    <label>Capa do Livro:</label>
                    <div class="form__container-file">
                        <label class="label-input" for="book_cover">Selecionar arquivo <i class="fas fa-file-image"></i></label>
                        <span name="book_cover"></span>
                    </div>
                    <input required type="file" name="book_cover" id="book_cover" accept="image/*">

                    <label>Livro em PDF:</label>
                    <div class="form__container-file">
                        <label class="label-input" for="book_pdf">Selecionar arquivo <i class="fas fa-file-pdf"></i></label>
                        <span name="book_pdf"></span>
                    </div>
                    <input required type="file" name="book_pdf" id="book_pdf" accept="application/pdf">
                    
                    <input type="hidden" name="name_who_posted" id="name_who_posted" value="<?php
                        if(!empty($data_user)) {
                            echo $data_user['name'];
                        }
                        else {
                            echo $data_client['name'];
                        }
                    ?>">
                
                    <input type="hidden" name="date_posted" id="date_posted" value="<?= date('Y-m-d') ?>">

                    <input type="submit" value="Cadastrar livro">
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