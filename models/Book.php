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

        public function update(){
            //Create query
            $query = 'UPDATE ' . 
                $this->table . '
            SET
                title = :title,
                description = :description,
                author_id = :author_id,
                genre_id = :genre_id,
                price = :price
            WHERE
                id = :id;'; 

            //Prepare statment
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->author_id = htmlspecialchars(strip_tags($this->author_id));
            $this->genre_id = htmlspecialchars(strip_tags($this->genre_id));
            $this->price = htmlspecialchars(strip_tags($this->price));

            //bind data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':author_id', $this->author_id);
            $stmt->bindParam(':genre_id', $this->genre_id);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':id', $this->id);


            if($stmt->execute()){
                return true;
            } else {
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }

        public function create(){
            //Create query
            $query = 'INSERT INTO '. $this->table . '
            SET
                title = :title,
                description = :description,
                author_id = :author_id,
                genre_id = :genre_id,
                price = :price';

            //Prep the statment
            $stmt = $this->conn->prepare($query);

            //CLean the data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->author_id = htmlspecialchars(strip_tags($this->author_id));
            $this->genre_id = htmlspecialchars(strip_tags($this->genre_id));
            $this->price = htmlspecialchars(strip_tags($this->price));

            //Bind params
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':author_id', $this->author_id);
            $stmt->bindParam(':genre_id', $this->genre_id);
            $stmt->bindParam(':price', $this->price);

            if ($stmt->execute()){
                return true;
            } 

            printf("Error: %s.\n", $stmt->error);
            return false;
            
        }

        //Delete Book
        public function delete(){
            //Create query
            $query = "DELETE FROM ". $this->table . '
            WHERE
                id = :id
            ';

            //prepare statement
            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }