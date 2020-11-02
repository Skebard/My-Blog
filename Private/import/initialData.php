<?php
$initialData = "INSERT INTO authors (username, password, firstName, lastName1, lastName2)
VALUES ('Skebard','1234','Antonio','Jorda','Aparicio');

INSERT INTO authors (username,password, firstName, lastName1, lastName2)
VALUES ('Raopub','1234','Bernat','Jorda','Quetglas');

INSERT INTO authors (username, password, firstName, lastName1, lastName2)
VALUES ('LeCat','1234','Cati','Calafell','Quetglas');


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
";