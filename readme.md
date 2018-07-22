# Library API

This API has been created for a small task. It allows the users to:

  - Gain the abaility to have access to the information of a specific book in the database.
  - Gain the ability to have access to the information of all books in the database.
  - Gain the ability to Delete books.
  - Gain the ability to Create books.
  - Gain the ability to Update books.

# Database

The database sql code has been included in this repository, named library.sql .

# Set up

To set up, please create a database and import the sql file. To adapt the api to your database please adjust the database
file located in config/database.php .

# Running

When ran locally, the URL's to interact with the api are as follows

- For all books | localhost/CVK_api_task/api/book/read.php
- For singular book | localhost/CVK_api_task/api/book/read_single.php/?id=1
- To create a book | localhost/CVK_api_task/api/book/create.php | please pass a json file with following values (title, description, price, author_id, genre_id)
- To delete a book | localhost/CVK_api_task/api/book/delete.php/?id=1
- To update a book | localhost/CVK_api_task/api/book/update.php | please pass a json file with following values (id, title, description, price, author_id, genre_id)
