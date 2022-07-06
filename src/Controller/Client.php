<?php

    namespace APP\Controller;

    require_once '../../vendor/autoload.php';

    use APP\Model\Client;
    use APP\Model\DAO\ClientDAO;
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
            signUpClient();
            break;

        case 'list_of_clients':
            findAllClients();
            break;
        
        case 'remove':
            removeClient();
            break;

        case 'edit':
            editClient();
            break;

        case 'update':
            updateClient();
            break;

        default:
            Uteis::redirect(message: 'Operação informada inválida. Por favor, informar uma operação válida!');
    }

    function signUpClient() {
        $name = $_POST['name'];
        $birth_date = $_POST['birth_date'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = ClientDAO::findClient($email);

        if($check) {
            Uteis::redirect(message: ['Já existe um cadastro com esse e-mail!!'], session_name: 'msg_error_validation');
        }
    
        $error = array();

        if (!Validation::validateName($name)) {
            array_push($error, "Nome inválido!");
        }

        if (!Validation::validateDate($birth_date)) {
            array_push($error, "Data de nascimento inválida!");
        }
    
        if (!Validation::validateEmail($email)) {
            array_push($error, "E-mail inválido!");
        }
    
        if (!Validation::validateLoginAndPassword($password)) {
            array_push($error, "Senha inválida!");
        }
        
        if($error) {
            Uteis::redirect(message: $error, session_name: 'msg_error_validation');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $client = new Client(
            name: $name,
            birth_date: $birth_date,
            email: $email,
            password: $password
        );

        $result = ClientDAO::sign_up($client);

        if($result) {
            Uteis::redirect(message: 'Conta cadastrada com sucesso!!', session_name: 'msg_confirm');
        }
        else {
            Uteis::redirect(message: 'Lamento não foi possível cadastrar a conta!!');
        }

    }
    
    function findAllClients() {
        $clients = ClientDAO::findAll();

        if($clients) {
            Uteis::redirect(message: $clients, session_name: "list_of_clients", url: "../View/ListOfClients.php");
        }
        else {
            Uteis::redirect(message: "Nenhum cliente cadastrado no momento!!");
        }
    }

    function removeClient() {

        if(empty($_GET["id_client"])) {
            Uteis::redirect(message: "Código do usuário não informado!!");
        }

        $result = ClientDAO::remove($_GET["id_client"]);

        if($result) {
            if(empty($_GET['remove_other'])) {
                unset($_SESSION["data_login_client"]);
                Uteis::redirect(message: "Conta removida com sucesso!!", session_name: "msg_confirm");
            }
            else {
                Uteis::redirect(message: "Cliente removido com sucesso!!", session_name: "msg_confirm");
            }
        }
        else {
            if(empty($_GET['remove_other'])) {
                Uteis::redirect(message: "Não foi possível remover a conta!!");
            }
            else {
                Uteis::redirect(message: "Não foi possível remover o cliente!!");
            }
        }
    }

    function editClient() {
        if(empty($_GET['id_client'])) {
            Uteis::redirect("Código não informado!!");
        }

        $client = ClientDAO::findClientId($_GET['id_client']);

        if($client) {
            Uteis::redirect(message: $client, session_name: "client_data_edit", url: '../View/edit_data_other.php');
        }
        else {
            Uteis::redirect("Cliente não localizado!!");
        }
    }

    function updateClient() {
        $name = $_POST['name'];
        $birth_date = $_POST['birth_date'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_client = $_POST['id_client'];

        $error = array();

        if (!Validation::validateName($name)) {
            array_push($error, "Nome inválido!");
        }

        if (!Validation::validateDate($birth_date)) {
            array_push($error, "Data de nascimento inválida!");
        }
    
        if (!Validation::validateEmail($email)) {
            array_push($error, "E-mail inválido!");
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

        $client = new Client(
            name: $name,
            birth_date: $birth_date,
            email: $email, 
            password: $password, 
            id_client: $id_client
        );

        $result = ClientDAO::update($client);

        if($result) {
            if(!empty($_GET['edit_other'])) {
                unset($_SESSION['client_data_edit']);   
            }
            else {

                $clientArray = [
                    "name" => $name, 
                    "birth_date" => $birth_date, 
                    "email" => $email, 
                    "id_client" => $id_client
                ];
                $_SESSION['data_login_client'] = serialize($clientArray);
            }

            Uteis::redirect(message: 'Cliente editado com sucesso!!', session_name: "msg_confirm");
        }
        else {
            Uteis::redirect("Não foi possível editar os dados do cliente!!");
        }
    }

?>