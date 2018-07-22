<?php
    class Book {
        //DB connection and table
        private $conn;
        private $table = "books";

        //properties
        public $id;
        public $title;
        public $description;
        public $author_id;
        public $author_name;
        public $genre_id;
        public $genre_genre;
        public $price;

        //Constructor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //Get Books
        public function read(){
            //Create query
            $query = 'SELECT
                author.name as author_name,
                genre.genre as genre_genre,
                books.id,
                books.title,
                books.price,
                books.author_id,
                books.genre_id,
                books.description
            FROM
                ' . $this->table . '
            LEFT JOIN 
                author ON books.author_id = author.id
            LEFT JOIN
                genre on books.genre_id = genre.id
            ORDER BY
                books.id ASC';

            //Create Prepared Statement
            $stmt = $this->conn->prepare($query);

            //Exacute query
            $stmt->execute();

            return $stmt;
        }
    }