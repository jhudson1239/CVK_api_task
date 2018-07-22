<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Book.php';

    //Instantiate DB and Connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate book object
    $book = new Book($db);

    // GET raw posted data
    $data = json_decode(file_get_contents("php://input"));
    
    $book->id = $data->id;

    if($book->delete()){
        echo json_encode(
            array('message' => 'Book Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Book Not Deleted')
        );
    }