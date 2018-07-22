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

// Book query

$result = $book->read();

// Get row count

$num = $result->rowCount();

// Check if there are any books

if ($num > 0) {

	// Book array

	$books = array();
	$books_arr['data'] = array();
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$book_item = array(
			'id' => $id,
			'title' => $title,
			'price' => $price,
			'author_name' => $author_name,
			'genre_genre' => $genre_genre,
			'description' => $description
		);

		// Push to "data

		array_push($books_arr['data'], $book_item);
	}

	// Turn to JSON and output

	echo json_encode($books_arr);
}
else {

	// No books

	echo json_encode(array(
		'message' => 'No Books Found'
	));
}
