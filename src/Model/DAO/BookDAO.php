<?php

    namespace APP\Model\DAO;

    use APP\Model\Connection;
    use APP\Model\Book;
    use PDO;

    class BookDAO {
        private static PDO $connection;

        public static function sign_up(Book $book) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("insert into book values(null, ?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $book->title, PDO::PARAM_STR);
            $statement->bindParam(2, $book->author, PDO::PARAM_STR);
            $statement->bindParam(3, $book->name_who_posted, PDO::PARAM_STR);
            $statement->bindParam(4, $book->date_posted, PDO::PARAM_STR);
            $statement->bindParam(5, $book->description, PDO::PARAM_STR);
            $statement->bindParam(6, $book->name_book_cover, PDO::PARAM_STR);
            $statement->bindParam(7, $book->name_book_pdf, PDO::PARAM_STR);

            return $statement->execute();
        }

        public static function findAll(): array {
            self::$connection = Connection::getConnection();
            $sql = "select * from book";
            $statement = self::$connection->query($sql);

            return $statement->fetchAll((PDO::FETCH_ASSOC));
        }

        public static function remove(int $id_book): bool {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("delete from book where id_book = ?");
            $statement->bindParam(1, $id_book, PDO::PARAM_INT);

            return $statement->execute();
        }

        public static function findBookId(int $id_book) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->query("select * from book where id_book = $id_book");

            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public static function findBookName(string $name_book) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->query("select * from book where title like '$name_book'");

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function update(Book $book) {
            self::$connection = Connection::getConnection();
            $statement = self::$connection->prepare("update book set title = ?, author = ?, name_who_posted = ?, date_posted = ?, description = ? where id_book = ?");
            $statement->bindParam(1, $book->title, PDO::PARAM_STR);
            $statement->bindParam(2, $book->author, PDO::PARAM_STR);
            $statement->bindParam(3, $book->name_who_posted, PDO::PARAM_STR);
            $statement->bindParam(4, $book->date_posted, PDO::PARAM_STR);
            $statement->bindParam(5, $book->description, PDO::PARAM_STR);
            $statement->bindParam(6, $book->id_book, PDO::PARAM_INT);

            return $statement->execute();
        }
    }

?>