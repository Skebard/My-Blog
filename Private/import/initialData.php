<?php
$initialData = "INSERT INTO authors (username, password, firstName, lastName1, lastName2,profileImage)
VALUES ('Skebard','1234','Antonio','Jorda','Aparicio','https://imgur.com/XEbYUnk');

INSERT INTO authors (username,password, firstName, lastName1, lastName2)
VALUES ('Raopub','1234','Bernat','Jorda','Quetglas');

INSERT INTO authors (username, password, firstName, lastName1, lastName2)
VALUES ('LeCat','1234','Cati','Calafell','Quetglas');


INSERT INTO categories(name)
VALUES ('PHP');
INSERT INTO categories(name)
VALUES ('Javascript');
INSERT INTO categories(name)
VALUES ('CSS');
INSERT INTO categories(name)
VALUES ('NPM');
INSERT INTO categories(name)
VALUES ('MySql');


INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1,'Getting started with PHP',1);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'Using composer',2);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'OOP javascript',1);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'Laravel',3);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (2, 'Unit testing',3);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (3, 'OOP PHP',1);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (3, 'Python',2);

INSERT INTO postCategories (postId,categoryId)
VALUES (1,2);
INSERT INTO postCategories (postId,categoryId)
VALUES (1,3);
INSERT INTO postCategories (postId,categoryId)
VALUES (2,1);
INSERT INTO postCategories (postId,categoryId)
VALUES (2,2);
INSERT INTO postCategories (postId,categoryId)
VALUES (3,4);


INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('title','My first post',1,1);

INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('text','This blog is still under development',2,1);

INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('subtitle','My subtitle',3,1);



INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('text','Welcome to this great post ',1,4);
INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('subtitle','My subtitle',5,4);
INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('text','some more text over here',4,4);
INSERT INTO htmlElements ( type, content,position, postId)
VALUES ('code','some amazing code',3,4);
";