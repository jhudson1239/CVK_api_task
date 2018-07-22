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
                a.name as author_name,
                g.genre as genre_genre,
                b.id,
                b.title,
                b.description,
                b.author_id,
                b.genre_id,
                b.price
            FROM
                ' . $this->table . '
                b
            LEFT JOIN
                author a ON b.author_id = a.id
            LEFT JOIN
                genre g ON b.genre_id = g.id
            ORDER BY
                b.title DESC';

            //Create Prepared Statement
            $stmt = $this->conn->prepare($query);

            //Exacute query
            $stmt->execute();

            return $stmt;
        }
    }