<?php

    namespace APP\Model;

    class Validation {

        public static function validateName($name) {
            return strlen($name) >= 2 && ctype_alpha(str_replace(' ', '', $name));
        }

        public static function validateEmail($email): bool {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public static function validateAddress($address) {
            return strlen($address) > 3;
        }

        public static function validateLoginAndPassword($loginOrPassword) {
            return preg_match("/^(?=.*\d)(?=.*[#$@!%&*?\.\/])[A-Za-z\d#$@!%&*?\.\/]{8,}$/", $loginOrPassword);
        }

        public static function validateDate($date) {
            $date = explode("-", $date);
        
            return checkdate($date[1], $date[2], $date[0]);
        }

        public static function validateAuthor($author) {
            return strlen($author) > 3;
        }

        public static function validateTitle($title) {
            return strlen($title) > 2;
        }

        public static function validateDescription($description) {
            return strlen($description) < 65535;
        }

        public static function validateBookCover($book_cover) {
            if(explode('/', $book_cover['type'])[0] === "image") {
                return true;
            }
            else {
                return false;
            }
        }

        public static function validateBookPdf($book_pdf) {
            if($book_pdf['type'] === "application/pdf") {
                return true;
            }
            else {
                return false;
            }
        }

    }

?>