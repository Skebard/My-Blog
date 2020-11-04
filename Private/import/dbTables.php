<?php

$htmlElements = 'CREATE TABLE htmlElements(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    position INT(6) NOT NULL,
    postId INT(6) UNSIGNED NOT NULL,
    CONSTRAINT fk_ph_post_id
        FOREIGN KEY (postId)
        REFERENCES posts (id)
        ON DELETE CASCADE
    )';

$posts = 'CREATE TABLE posts(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    creationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    publishingDate DATETIME,
    lastModificationDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    authorId INT(6) UNSIGNED NOT NULL,
    CONSTRAINT fk_ph_author_id
        FOREIGN KEY (authorId)
        REFERENCES authors (id)
        ON DELETE CASCADE
    )';

$comments = 'CREATE TABLE comments(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    postId INT(6) UNSIGNED NOT NULL,
    CONSTRAINT fk_post_id
        FOREIGN KEY (postId)
        REFERENCES posts (id)
        ON DELETE CASCADE
    )';
$authors = 'CREATE TABLE authors(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    firstName VARCHAR(30) NOT NULL,
    lastName1 VARCHAR(30) NOT NULL,
    lastName2 VARCHAR(30) NOT NULL,
    birthdate DATETIME,
    profileImage VARCHAR(3000),
    email VARCHAR (150),
    UNIQUE (username),
    UNIQUE (email)
    )';


/*

INSERT INTO authors ( firstName, lastName1, lastName2)
VALUES ('Antonio','Jorda','Aparicio');

INSERT INTO authors ( firstName, lastName1, lastName2)
VALUES ('Bernat','Jorda','Quetglas');

INSERT INTO authors ( firstName, lastName1, lastName2)
VALUES ('Cati','Calafell','Quetglas');


INSERT INTO posts ( authorId)
VALUES (1);
INSERT INTO posts ( authorId)
VALUES (1);
INSERT INTO posts ( authorId)
VALUES (1);
INSERT INTO posts ( authorId)
VALUES (1);
INSERT INTO posts ( authorId)
VALUES (2);
INSERT INTO posts ( authorId)
VALUES (3);
INSERT INTO posts ( authorId)
VALUES (3);


INSERT INTO htmlElements ( type, content, postId)
VALUES ('title','My first post',1);

INSERT INTO htmlElements ( type, content, postId)
VALUES ('text','This blog is still under development',1);

INSERT INTO htmlElements ( type, content, postId)
VALUES ('subtitle','My subtitle',1);


INSERT INTO comments (username,email,content,postId)
VALUES ('Lara','lara@gmail.com','Please keep posting',1);


*/
