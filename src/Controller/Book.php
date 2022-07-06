<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\Book;
    use APP\Model\DAO\BookDAO;
    use APP\Model\Uteis;
    use APP\Model\Validation;

    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Requisição inválida!');
    }

    if(empty($_GET['operation'])) {
        Uteis::redirect(message: 'Operação não informada. Por favor, informá-la!');
    }

    switch ($_GET['operation']) {
        case 'sign_up':
            signUpBook();
            break;

        case 'list_of_books':
            findAllBooks();
            break;
        
        case 'remove':
            removeBook();
            break;

        case 'edit':
            editBook();
            break;

        case 'search':
            searchBook();
            break;
        
        default:
            Uteis::redirect(message: 'Operação informada inválida. Por favor, informar uma operação válida!');
    }

    function signUpBook() {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $name_who_posted = $_POST['name_who_posted'];
        $date_posted = $_POST['date_posted'];
        $description = $_POST['description'];

        $_FILES['book_cover']['name'] = $title . '.' . explode("/", $_FILES['book_cover']['type'])[1];
        $name_book_cover = $_FILES['book_cover']['name'];
        $book_cover = $_FILES['book_cover'];
        $dir_book_cover = "../View/img_book/book_cover/" . $book_cover['name'];

        $_FILES['book_pdf']['name'] = $title . '.' . explode("/", $_FILES['book_pdf']['type'])[1];
        $name_book_pdf = $_FILES['book_pdf']['name'] = $title . '.' . explode("/", $_FILES['book_pdf']['type'])[1];
        $book_pdf = $_FILES['book_pdf'];
        $dir_book_pdf = "../View/img_book/book_pdf/" . $book_pdf['name'];

        $error = array();

        if(!Validation::validateTitle($title)) {
            array_push($error, "Título inválido!");
        }

        if(!Validation::validateAuthor($author)) {
            array_push($error, "Autor inválido!");
        }

        if(!Validation::validateDescription($description)) {
            array_push($error, "Descrição inválida!");
        }

        if(!Validation::validateBookCover($book_cover)) {
            array_push($error, "Arquivo da capa do livro inválido! Envie um arquivo em formato de imagem!");
        }
        
        if(!Validation::validateBookPdf($book_pdf)) {
            array_push($error, "Arquivo do livro inválido! Envie um arquivo em formato PDF!");
        }

        if($error) {
            Uteis::redirect(message: $error, session_name: 'msg_error_validation');
        }

        $book = new Book(
            title: $title,
            author: $author,
            name_who_posted: $name_who_posted,
            date_posted: $date_posted,
            description: $description,
            name_book_cover: $name_book_cover,
            name_book_pdf: $name_book_pdf
        );

        $result = BookDAO::sign_up($book);

        if($result) {
            move_uploaded_file($book_cover['tmp_name'], $dir_book_cover);
            move_uploaded_file($book_pdf['tmp_name'], $dir_book_pdf);
            Uteis::redirect(message: 'Livro cadastrado com sucesso!!', session_name: 'msg_confirm');
        }
        else {
            Uteis::redirect(message: 'Lamento não foi possível cadastrar o livro!!');
        }

    }

    function findAllBooks() {
        $books = BookDAO::findAll();

        if($books) {
            if(!empty($_GET['edit_books'])) {
                Uteis::redirect(message: $books, session_name: "list_of_books", url: "../View/edit_books.php");
            }
            else {
                Uteis::redirect(message: $books, session_name: "list_of_books", url: "../View/explorar.php");
            }
        }
        else {
            Uteis::redirect(message: "Nenhum livro cadastrado no momento!!");
        }
    }

    function editBook() {
        if(empty($_GET['id_book'])) {
            Uteis::redirect("Código do livro não informado!!");
        }

        $book = BookDAO::findBookId($_GET['id_book']);

        if($book) {
            Uteis::redirect(message: $book, session_name: "data_book", url: '../View/book.php');
        }
        else {
            Uteis::redirect("Livro não localizado!!");
        }
    }

    function removeBook() {
        if(empty($_GET["id_book"])) {
            Uteis::redirect(message: "Código do livro não informado!!");
        }

        $result = BookDAO::remove($_GET["id_book"]);

        if($result) {
            unlink('../View/img_book/book_cover/' . $_GET["name_book_cover"]);
            unlink('../View/img_book/book_pdf/' . $_GET["name_book_pdf"]);

            Uteis::redirect(message: "Livro removido com sucesso!!", session_name: "msg_confirm");                             
        }
        else {
            Uteis::redirect(message: "Não foi possível remover o livro!!");
        }
    }

    function searchBook() {
        $name_book = '%' . trim($_POST['name_book']) . '%';
        $books = BookDAO::findBookName($name_book);

        if($books) {
            Uteis::redirect(message: $books, session_name: "list_of_books", url: '../View/explorar.php');
        }
        else {
            Uteis::redirect("Livro não localizado!!");
        }
    }
?>