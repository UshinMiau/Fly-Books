<?php   

    session_start();

    if(!empty($_SESSION['data_login_user'])) {
        $data_user = unserialize($_SESSION['data_login_user']); 
    }
    else if(!empty($_SESSION['data_login_client'])) {
        $data_client = unserialize($_SESSION['data_login_client']); 
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="icon" type="imagem/png" href="src/View/img/logo.png" />
    <meta name="description" content="Site feito para ler, baixar e enviar livros PDF gratuitamente">
    <meta name="keywords" content="livros, ler, online, gratis, gratuito, PDF, baixar, gratuitamente">
    <meta name="author" content="Oliver Castro dos Santos">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Fly Books</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="src/View/js/jQuery.js"></script>
    <!-- slick slider -->
    <link rel="stylesheet" href="src/View/css/slick.css">
    <script src="src/View/js/slick.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="src/View/css/all.min.css">
    <link rel="stylesheet" href="src/View/css/fontawesome.min.css">
    <!-- my scripts -->
    <script src="src/View/js/functions_main.js"></script>
    <script src="src/View/js/functions_index.js"></script>
    <!-- my styles -->
    <link rel="stylesheet" href="src/View/css/reset.css">
    <link rel="stylesheet" href="src/View/css/style_main.css">
    <link rel="stylesheet" href="src/View/css/style_index.css">
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
                    <li><a href="src/Controller/Book.php?operation=list_of_books">Explorar livros</a></li>

                    <?php
                        if(empty($data_user) && empty($data_client)):
                    ?>
                        <li><a href="src/View/sign_in.php">Iniciar sess??o</a></li>
                    <?php
                        else:
                    ?>
                        <li><a href="src/View/perfil.php">
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
            <li><a href="src/Controller/Book.php?operation=list_of_books">Explorar livros</a></li>

            <?php
                if(empty($data_user) && empty($data_client)):
            ?>
                <li><a href="src/View/sign_in.php">Iniciar sess??o</a></li>
            <?php
                else:
            ?>
                <li><a href="src/View/perfil.php">
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

    <section class="objectives-banner">
        <div class="container">
            <article class="objectives-banner__slide-container">
                <div class="objectives-banner__slide">
                    <div class="objectives-banner__slide-text">
                        <h2>Minha motiva????o</h2>
                        <p>
                            Me motivei a criar esta plataforma para que cada vez mais pessoas tenham acesso a leitura, independente de sua situa????o financeira.
                        </p>
                    </div>
                    <div style="background-image: url(src/View/img/person\ reading.png)" class="objectives-banner__slide-img">
                        <!-- img escolhida -->
                    </div>
                </div>

                <div class="objectives-banner__slide">
                    <div class="objectives-banner__slide-text">
                        <h2>Por que acho t??o importante meu projeto?</h2>
                        <p>
                            Hoje em dia, vimos que cada vez mais os n??meros de pessoas que leem livros tem baixado devido h?? falta de dinheiro para os comprar. Sempre houve pessoas desprovidas de material de leitura por n??o terem condi????es financeiras, mas com o aumento do pre??o dos livros isso s?? tem aumentado.
                        </p>
                    </div>
                    <div style="background-image: url(src/View/img/girls\ reading.png)" class="objectives-banner__slide-img">
                        <!-- img escolhida -->
                    </div>
                </div>

                <div class="objectives-banner__slide">
                    <div class="objectives-banner__slide-text">
                        <h2>Como funciona a Fly Books?</h2>
                        <p>
                            ?? simples e pr??tico! ?? s?? acessar o site e fazer sua pesquisa do livro, achar e baixa-lo. Pode tamb??m fazer o upload de um livro para aumentar o acervo da nossa plataforma.  
                        </p>
                    </div>
                    <div style="background-image: url(src/View/img/books.png)" class="objectives-banner__slide-img">
                        <!-- img escolhida -->
                    </div>
                </div>            
            </article>
        </div>
    </section>

    <section class="call">
        <div class="container">
            <h2>Sobre mim</h2>
            <p>
                Meu nome ?? Oliver Castro dos Santos e sou um aluno do curso t??cnico de inform??tica para a internet na Faculdade e Escola T??cnica QI. Estou dedicado e motivado a tornar a Fly Books uma plataforma de livros conhecida e boa de utilizar.
            </p>
        </div>
    </section>

    <section class="differentials">
        <div class="container">
            <h2>Nossos diferenciais</h2>
            <article class="differentials__container-itens">
                <div class="differentials__half">
                    <h3>
                        <i class="fas fa-user-lock"></i>
                    </h3>
                    <p>
                        Nos diferenciamos dos outros sites em quest??o de seguran??a e prote????o contra qualquer tipo de v??rus, para que as pessoas fiquem tranquilas sem pegarem v??rus ao baixar livros e sem ter seus dados vazados, por isso nosso site consta com a seguran??a de cria????o de senhas fortes para seu cadastro ser seguro. 
                    </p>
                </div>
                
                <div class="differentials__half">
                    <h3>
                        <i class="fas fa-mobile-alt"></i>
                    </h3>
                    <p>
                        Nosso site tem uma facilidade de acesso maior que as dos outros porque ele ?? compat??vel com todos os aparelhos e navegadores com acesso ?? internet, de celular a tablet e computador, isso o torna um site com uma grande amplitude de acesso possibilitando acessibilidade at?? mesmo para pessoas de baixa renda. 
                    </p>
                </div>

                
                <div class="differentials__half">
                    <h3>
                        <i class="fas fa-book"></i>
                    </h3>
                    <p>
                        O site possibilita tamb??m ao pr??prio usu??rio, solicitar para que seja adicionado um livro que n??o tenha no site, para que ele possa ler sem ter que comprar o livro ou ter que pesquisar em outros sites at?? achar de gra??a. Assim como possibilita aos usu??rios cadastrarem livros para que outros possam baix??-los.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <footer class="site-end">
        <div class="container">
            <p>??Todos os direitos reservados.</p>
        </div>
    </footer>
</body>

</html>