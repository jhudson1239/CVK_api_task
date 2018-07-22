<?php

// Headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.php';

include_once '../../models/Book.php';

// Instantiate DB and Connect

$database = new Database();
$db = $database->connect();

// Instantiate book object

$book = new Book($db);

// Get ID from URL

$book->id = isset($_GET['id']) ? $_GET['id'] : die();
$book->read_single();

// Create array

$book_arr = array(
	'id' => $book->id,
	'title' => $book->title,
	'price' => $book->price,
	'author_name' => $book->author_name,
	'genre_genre' => $book->genre_genre,
	'description' => $book->description
);

// Make JSON

print_r(json_encode($book_arr));