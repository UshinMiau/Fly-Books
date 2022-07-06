<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\Client;
    use PDO;

    class ClientDAO {
        private static PDO $connection;

        public static function sign_up(Client $client) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("insert into client values(null, ?, ?, ?, ?)");
            $statement->bindParam(1, $client->name, PDO::PARAM_STR);
            $statement->bindParam(2, $client->birth_date, PDO::PARAM_STR);
            $statement->bindParam(3, $client->email, PDO::PARAM_STR);
            $statement->bindParam(4, $client->password, PDO::PARAM_STR);

            return $statement->execute();
        }

        public static function findAll(): array {
            self::$connection = Connection::getConnection();
            $sql = "select * from client";
            $statement = self::$connection->query($sql);

            return $statement->fetchAll((PDO::FETCH_ASSOC));
        }

        public static function remove(int $id_client): bool {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("delete from client where id_client = ?");
            $statement->bindParam(1, $id_client, PDO::PARAM_INT);

            return $statement->execute();
        }

        public static function findClient(string $login) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->query("select * from client where email = '$login'");

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function findClientId(int $id_client) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->query("select * from client where id_client = $id_client");

            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function update(Client $client) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare('update client set name = ?, birth_date = ?, email = ?, password = ? where id_client = ?');
            $statement->bindParam(1, $client->name, PDO::PARAM_STR);
            $statement->bindParam(2, $client->birth_date, PDO::PARAM_STR);
            $statement->bindParam(3, $client->email, PDO::PARAM_STR);
            $statement->bindParam(4, $client->password, PDO::PARAM_STR);
            $statement->bindParam(5, $client->id_client, PDO::PARAM_INT);

            return $statement->execute();
        }

    }

?>