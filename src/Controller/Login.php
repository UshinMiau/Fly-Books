<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\DAO\UserDAO;
    use APP\Model\DAO\ClientDAO;
    use APP\Model\Uteis;

    session_start();

    if(empty($_POST) && empty($_GET)) {
        Uteis::redirect(message: 'Requisição inválida!');
    }

    if(empty($_GET['operation'])) {
        Uteis::redirect(message: 'Operação não informada. Por favor, informá-la!');
    }

    switch ($_GET['operation']) {
        case 'sign_in':
            signIn();
            break;
        
        case 'sign_out':
            signOut();
            break;
        
        default:
            Uteis::redirect(message: 'Operação não informada. Por favor, informá-la!');
    }

    function signIn() {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $result = UserDAO::findUser($login); 
        
        if(!$result) {
            $result = ClientDAO::findClient($login);
            
            if(!$result) {
                Uteis::redirect(message: 'Cadastro inexistente!');
            }
            else {
                if(matchPassword($password, $result['password'])) {
                    $clientArray = [
                        "name" => $result['name'], 
                        "birth_date" => $result['birth_date'], 
                        "email" => $result['email'], 
                        "id_client" => $result['id_client']
                    ];

                    Uteis::redirect(message: serialize($clientArray), session_name: 'data_login_client', url: '../View/explorar.php');
                }
                else {
                    Uteis::redirect(message: ['Senha incorreta!'], session_name: 'msg_error_validation');
                }
            }
        }
        else {
            if(matchPassword($password, $result['password'])) {
                $userArray = [
                    "name" => $result['name'], 
                    "login" => $result['login'], 
                    "id_user" => $result['id_user']
                ];

                Uteis::redirect(message: serialize($userArray), session_name: 'data_login_user', url: '../View/explorar.php');
            }
            else {
                Uteis::redirect(message: ['Senha incorreta!'], session_name: 'msg_error_validation');
            }
        }
    }

    function signOut() {
        session_destroy();
        header('location: ../../index.php');
    }

    function matchPassword($password, $result) {
        return password_verify($password, $result);
    }
?>