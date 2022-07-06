<?php

    namespace APP\Model;

    class Book {
        private int $id_book;
        private string $title;
        private string $author;
        private string $name_who_posted;
        private string $date_posted;
        private string $description;
        private string $name_book_cover;
        private string $name_book_pdf;

        public function __construct(string $title, string $author, string $name_who_posted, string $date_posted, string $description, string $name_book_cover, string $name_book_pdf, int $id_book = 0) {
            $this->title = $title;
            $this->author = $author;
            $this->name_who_posted = $name_who_posted;
            $this->date_posted = $date_posted;
            $this->description = $description;
            $this->name_book_cover = $name_book_cover;
            $this->name_book_pdf = $name_book_pdf;
            $this->id_book = $id_book;
        }

        public function __get($attribute) {
            return $this->$attribute;
        }
    }

?>