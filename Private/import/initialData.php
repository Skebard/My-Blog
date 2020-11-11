<?php
$initialData = "INSERT INTO authors (username, password, firstName, lastName1, lastName2,profileImage)
VALUES ('Skebard','1234','Antonio','Jorda','Aparicio','https://i.imgur.com/XEbYUnk.jpg');

INSERT INTO authors (username,password, firstName, lastName1, lastName2)
VALUES ('Raopub','1234','Jose','Jorda','Quetglas');

INSERT INTO authors (username, password, firstName, lastName1, lastName2)
VALUES ('LeCat','1234','Tomeu','Calafell','Quetglas');


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
INSERT INTO categories(name)
VALUES ('Composer');
INSERT INTO categories(name)
VALUES ('All');
INSERT INTO categories(name)
VALUES ('Random');
INSERT INTO categories(name)
VALUES ('API');


INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1,'Getting started with PHP',1);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'Using composer',2);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'OOP javascript',1);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'Laravel',3);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'UnitPHP',5);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (1, 'Basic MySQL queries',5);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (2, 'Unit testing',3);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (3, 'OOP PHP',1);
INSERT INTO posts ( authorId,title,mainCategory)
VALUES (3, 'Javascript libraries',2);

UPDATE posts 
SET description = 'Maecenas sit amet fermentum justo, eu egestas felis. Aliquam lobortis ut tellus a dictum. Nam rhoncus suscipit arcu, non convallis enim. Vestibulum vestibulum, felis a scelerisque aliquet, ligula magna viverra nisl, sed ullamcorper neque massa eget lectus. Pellentesque eu porttitor ipsum, ac fringilla mauris. Etiam fringilla felis ullamcorper diam pulvinar scelerisque. Suspendisse vel enim eros';

INSERT INTO postCategories (postId,categoryId)
VALUES (1,2);
INSERT INTO postCategories (postId,categoryId)
VALUES (1,3);
INSERT INTO postCategories (postId,categoryId)
VALUES (2,1);
INSERT INTO postCategories (postId,categoryId)
VALUES (2,4);
INSERT INTO postCategories (postId,categoryId)
VALUES (3,4);
INSERT INTO postCategories (postId,categoryId)
VALUES (4,1);
INSERT INTO postCategories (postId,categoryId)
VALUES (4,2);


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