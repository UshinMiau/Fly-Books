<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\DAO\UserDAO;
    use APP\Model\User;
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
            signUpUser();
            break;

        case 'list_of_users':
            findAllUsers();
            break;

        case 'remove':
            removeUser();
            break;

        case 'edit':
            editUser();
            break;
    
        case 'update':
            updateUser();
            break;

        default:
            Uteis::redirect(message: 'Operação não informada. Por favor, informá-la!');
    }

    function signUpUser() {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        $check = UserDAO::findUser($login);

        if($check) {
            Uteis::redirect(message: ['Já existe um cadastro com esse login!!'], session_name: 'msg_error_validation');
        }

        $error = array();

        if(!Validation::validateName($name)) {
            array_push($error, "O nome informado é inválido");
        }

        if(!Validation::validateLoginAndPassword($login)) {
            array_push($error, "O login deve conter ao menos 8 caracteres, incluindo letras, caracteres especias e números.");
        }

        if(!Validation::validateLoginAndPassword($password)) {
            array_push($error, "A senha deve conter ao menos 8 caracteres, incluindo letras, caracteres especias e números.");
        }

        if($error) {
            Uteis::redirect(message: $error, session_name: 'msg_error_validation');
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user = new User(
            name: $name, 
            login: $login, 
            password: $password
        );

        $result = UserDAO::sign_up($user);

        if($result) {
            $_SESSION['user'] = serialize($user);
            Uteis::redirect(message: 'Usuário cadastrado com sucesso!!', session_name: 'msg_confirm');
        }
        else {
            Uteis::redirect(message: 'Lamento não foi possível cadastrar o usuário!!');
        }
    }

    function findAllUsers() {
        $users = UserDAO::findAll();

        if($users) {
            Uteis::redirect(message: $users, session_name: "list_of_users", url: "../View/ListOfUsers.php");
        }
        else {
            Uteis::redirect(message: "Nenhum usuário cadastrado no momento!!");
        }
    }

    function removeUser() {

        if(empty($_GET["id_user"])) {
            Uteis::redirect(message: "Código do usuário não informado!!");
        }

        $result = UserDAO::remove($_GET["id_user"]);

        if($result) {
            if(empty($_GET['remove_other'])) {
                unset($_SESSION["data_login_user"]);
                Uteis::redirect(message: "Conta removida com sucesso!!", session_name: "msg_confirm");
            }
            else {
                Uteis::redirect(message: "Usuário removido com sucesso!!", session_name: "msg_confirm");
            }
        }
        else {
            if(empty($_GET['remove_other'])) {
                Uteis::redirect(message: "Não foi possível remover a conta!!");
            }
            else {
                Uteis::redirect(message: "Não foi possível remover o usuário!!");
            }
        }
    }

    function editUser() {
        if(empty($_GET['id_user'])) {
            Uteis::redirect("Código não informado!!");
        }

        $user = UserDAO::findUserId($_GET['id_user']);

        if($user) {
            Uteis::redirect(message: $user, session_name: "user_data_edit", url: '../View/edit_data_other.php');
        }
        else {
            Uteis::redirect("Usuário não localizado!!");
        }
    }

    function updateUser() {
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $id_user = $_POST['id_user'];

        $error = array();

        if(!Validation::validateName($name)) {
            array_push($error, "O nome informado é inválido");
        }

        if(!Validation::validateLoginAndPassword($login)) {
            array_push($error, "O login deve conter ao menos 8 caracteres, incluindo letras, caracteres especias e números.");
        }

        if(empty($password)) {
            array_push($error, "Preencha a senha para realizar as alterações!");
        }
        else if (!Validation::validateLoginAndPassword($password)) {
            array_push($error, "A senha deve conter ao menos 8 caracteres, incluindo letras, caracteres especias e números.");
        }

        if($error) {
            Uteis::redirect(message: $error, session_name: 'msg_error_validation');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $user = new User(
            name: $name,
            login: $login,
            password: $password,
            id_user: $id_user
        );

        $result = UserDAO::update($user);

        if($result) {
            if(!empty($_GET['edit_other'])) {
                unset($_SESSION['user_data_edit']);
            }
            else {
                $userArray = [
                    "name" => $name, 
                    "login" => $login, 
                    "id_user" => $id_user
                ];
                $_SESSION['data_login_user'] = serialize($userArray);
            }

            Uteis::redirect(message: 'Usuário editado com sucesso!!', session_name: "msg_confirm");
        }
        else {
            Uteis::redirect("Não foi possível editar os dados do usuário!!");
        }
    }
?>