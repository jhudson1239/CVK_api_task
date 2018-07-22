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

        //Get single
        public function read_single(){
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
                genre ON books.genre_id = genre.id
            WHERE
                books.id = ?';
            
            // Prepare statment            
            $stmt = $this->conn->prepare($query);

            //Bind Id
            $stmt->bindParam(1, $this->id);

            //Execute query
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set propertise
            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->author_id = $row['author_id'];
            $this->author_name = $row['author_name'];
            $this->genre_id = $row['genre_id'];
            $this->genre_genre = $row['genre_genre'];
            
        }
    }