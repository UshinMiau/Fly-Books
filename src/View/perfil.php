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
    <link rel="stylesheet" href="css/style_perfil.css">
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
                    </a></li>
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

    <main class="perfil">
        <div class="container">
            <section class="perfil__section">
                <h1>Meus dados:</h1>
                <article class="perfil__container">
                    <div class="perfil__icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    
                    <?php
                        if(!empty($data_user)):
                    ?>
                        <div class="perfil__data">
                            <div class="perfil__container-data">
                                <p><b>Nome:</b> <?= $data_user['name'] ?></p>
                            </div>
                            
                            <div class="perfil__container-data">
                                <p><b>Login:</b> <?= $data_user['login'] ?></p>
                            </div>
                        </div>

                    </article>

                    <div class="perfil__edit">
                        <a href="edit_data_perfil.php">Editar</a>
                        <a href="../Controller/Login.php?operation=sign_out">Sair</a>
                        <a href="../Controller/User.php?operation=remove&id_user=<?= $data_user['id_user'] ?>">Apagar conta</a>
                    </div>
                    <?php
                        else:
                    ?>
                        <div class="perfil__data">
                            <div class="perfil__container-data">
                                <p><b>Nome:</b> <?= $data_client['name'] ?></p>
                            </div>
                            
                            <div class="perfil__container-data">
                                <p><b>Data de nascimento:</b> <?= $data_client['birth_date'] ?></p>
                            </div>
                            
                            <div class="perfil__container-data">
                                <p><b>E-Mail:</b> <?= $data_client['email'] ?></p>
                            </div>
                        </div>
                        
                    </article>

                    <div class="perfil__edit">
                        <a href="edit_data_perfil.php">Editar</a>
                        <a href="../Controller/Login.php?operation=sign_out">Sair</a>
                        <a href="../Controller/Client.php?operation=remove&id_client=<?= $data_client['id_client'] ?>">Apagar conta</a>
                    </div>
                    <?php
                        endif;
                    ?>
            </section>
            
            <?php 
                if(!empty($data_user)):
            ?>
                <div class="perfil__line"></div>
                
                <section class="perfil__section perfil__adm">
                    <h1>Painel de Administrador</h1>
                    <article class="perfil__container">
                        <div class="perfil__adm-command">
                            <i class="fas fa-users-cog"></i>
                            <a href="../Controller/Client.php?operation=list_of_clients">Listar Clientes</a>
                        </div>

                        <div class="perfil__adm-command">
                            <i class="fas fa-user-shield"></i>
                            <a href="../Controller/User.php?operation=list_of_users">Listar Usuários</a>
                        </div>

                        <div class="perfil__adm-command">
                            <i class="fas fa-user-plus"></i>
                            <a href="sign_up_user.php">Cadastrar Usuário</a>
                        </div>

                        <div class="perfil__adm-command">
                            <i class="fas fa-book-open"></i>
                            <a href="../Controller/Book.php?operation=list_of_books&&edit_books=true">Listar livros</a>
                        </div>
                    </article>
                </section>
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