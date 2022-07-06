<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\User;
    use PDO;

    class UserDAO {
        private static PDO $connection;

        public static function sign_up(User $user) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("insert into user values(null, ?, ?, ?)");
            $statement->bindParam(1, $user->name, PDO::PARAM_STR);
            $statement->bindParam(2, $user->login, PDO::PARAM_STR);
            $statement->bindParam(3, $user->password, PDO::PARAM_STR);

            return $statement->execute();
        }

        public static function findAll(): array {
            self::$connection = Connection::getConnection();
            $sql = "select * from user";
            $statement = self::$connection->query($sql);

            return $statement->fetchAll((PDO::FETCH_ASSOC));
        }

        public static function remove(int $id): bool {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("delete from user where id_user = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);

            return $statement->execute();
        }

        public static function findUser(string $login) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->query("select * from user where login = '$login'");

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function findUserId(int $id_user) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->query("select * from user where id_user = $id_user");

            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function update(User $user) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare('update user set name = ?, login = ?, password = ? where id_user = ?');
            $statement->bindParam(1, $user->name, PDO::PARAM_STR);
            $statement->bindParam(2, $user->login, PDO::PARAM_STR);
            $statement->bindParam(3, $user->password, PDO::PARAM_STR);
            $statement->bindParam(4, $user->id_user, PDO::PARAM_INT);

            return $statement->execute();
        }

    }


?>