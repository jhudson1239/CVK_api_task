<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Book.php';

    //Instantiate DB and Connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $book = new Book($db);

    //Blog post query
    $result = $book->read();

    //Get row count
    $num = $result->rowCount();

    //Check if there are any posts
    if ($num > 0){
        //Post array
        $posts_arr = array();
        $posts_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $post_item = array(
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'author' => $author_id,
                'author_name' => $author_name,
                'genre' => $genre_id,
                'genre_genre' => $genre_genre
            );

            //Push to "data
            array_push($posts_arr['data'], $post_item);
        }

        //Turn to JSON and output
        echo json_encode($posts_arr);

    }else{
        // No posts
        echo json_encode(
            array('message' => 'No Posts Found')
        );
    }
