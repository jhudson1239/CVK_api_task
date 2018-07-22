/*Create Books Table*/
CREATE TABLE `books` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `price` decimal(5,2) NOT NULL,
    `author_id` int(11) NOT NULL,
    `genre_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
);

/*Populating the books table*/
INSERT INTO `books` (`id`, `title`, `description`, `price`, `author_id`, `genre_id` ) VALUES
(1, 'Forever and a day', 'M laid down his pipe and stared at it tetchily. We have no choice. We’re just going to bring forward this other chap you’ve been preparing. But you didn’t tell me his name. It’s Bond, sir, the Chief of Staff replied. James Bond.The sea keeps its secrets. But not this time.One body. Three bullets. 007 floats in the waters of Marseille, killed by an unknown hand.', 18.99, 1, 1 ),

(2, 'The word is murder', 'A woman is strangled six hours after organising her own funeral.Did she know she was going to die? Did she recognise her killer? Daniel Hawthorne, a recalcitrant detective with secrets of his own, is on the case, together with his reluctant side-kick – a man completely unaccustomed to the world of crime. But even Hawthorne isnt prepared for the twists and turns in store – as unexpected as they are bloody...', 21.88, 1, 2),

(3, 'Surprise me', "After being together for ten years, Sylvie and Dan have a comfortable home, fulfilling jobs, beautiful twin girls, and communicate so seamlessly, they finish each other's sentences. They have a happy marriage and believe they know everything there is to know about each other. Until it's casually mentioned to them that they could be together for another sixty-eight years... and panic sets in.", 3.89, 2, 3),

(4, 'Hugh Grant The unauthorised biography', 'Hugh Grant is the quintessential English movie star. He is also a man of opposites; his easy charm belies a malicious wit and as heart throb star of Four Weddings and a Funeral he shocked the world when police found him enjoying the services of a Sunset Boulevard prostitute.', 45.99, 3, 4);

/*Create Author Table*/
CREATE TABLE `author` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `age` int(11) NOT NULL,
    `bio` text NOT NULL,
    PRIMARY KEY (`id`)
);

/*Populating the author table*/
INSERT INTO `author` (`id`, `name`, `age`, `bio`) VALUES
(1, 'Anthony Horowitz', '63', 'Anthony Horowitz, OBE is an English novelist and screenwriter specialising in mystery and suspense. His work for young adult readers includes The Diamond Brothers series, the Alex Rider series, and The Power of Five series.'),
(2, 'Sophie Kinsella', 48, 'Madeleine Sophie Wickham, also known under the pen name Sophie Kinsella, is an English author of chick lit.'),
(3, 'Jody Tressider', 34, 'No bio available');


/*Create Genre Table*/
CREATE TABLE `genre` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `genre` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
);

/*Populating the genre table*/
INSERT INTO `genre` (`id`, `genre`) VALUES
(1, 'Fiction'),
(2, 'Crime'),
(3, 'Novel'),
(4, 'Biography');
