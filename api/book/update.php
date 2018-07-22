<?php

// Headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once '../../config/Database.php';

include_once '../../models/Book.php';

// Instantiate DB and Connect

$database = new Database();
$db = $database->connect();

// Instantiate book object

$book = new Book($db);

// GET raw data

$data = json_decode(file_get_contents("php://input"));

// Set ID to update

$book->id = $data->id;
$book->title = $data->title;
$book->description = $data->description;
$book->author_id = $data->author_id;
$book->genre_id = $data->genre_id;
$book->price = $data->price;

if ($book->update()) {
	echo json_encode(array(
		'message' => 'Book Updated'
	));
}
else {
	echo json_encode(array(
		'message' => 'Book Not Updated'
	));
}