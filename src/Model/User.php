<?php

    namespace APP\Model;

    class User {
        private int $id_user;
        private string $login;
        private string $password;
        private string $name;

        public function __construct(string $login, string $password, string $name, int $id_user = 0) {
            $this->login = $login;
            $this->password = $password;
            $this->name = $name;
            $this->id_user = $id_user;
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }

?>