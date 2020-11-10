<?php
require 'postGenerator.class.php';

class PostHandler extends PostGenerator{
    protected $title;
    protected $author;
    protected $content;
    protected $info;
    protected $conn;
    function __construct($postTitle){
        //look for the post in the database
        //if it does not exists throw an error
        if(!self::postExists($postTitle)){
            throw new Exception ('Post '. $postTitle.' does not exist.');
        }
        $this->title = $postTitle;
        $this->conn = $this->connect();
    }

    static public function postExists($postTitle){
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $postTitle = htmlentities($postTitle);
        $stmt = $conn->prepare('SELECT * FROM posts WHERE title=?');
        $stmt->execute([$postTitle]);
        //check if post exists
        if($stmt->rowCount()===0){
            return false;
        }
        return true;
    }

    //publish a post means to create the the entire html in the file
    //the name of the file corresponds with the title of the posts in small letters replacing spaces for -
    public function publish(){
        $sql = 'UPDATE posts
                SET published = 1
                WHERE title=?';
        $stmt = $this->conn->prepare($sql);
        try{
            $stmt->execute([$this->title]);
            $this->createFile();
            $this->appendHeader();
            $this->appendTitle();
            $this->appendFooter();
            $this->closeFile();
        }catch(Exception $e){
            return $e;
        }


    }

    //delete the html file
    public function withdraw(){

    }
    //get the author
    public function getAuthor(){
        $sql = 'SELECT *
        FROM authors WHERE id=? ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->info['authorId']]);
        return $stmt->fetch();

    }
    public function setAuthor(){

    }
    public function getContent(){
        $stmt = $this->conn->prepare('SELECT * FROM htmlelements WHERE postId=?');
        $stmt->execute([$this->info['id']]);
        $this->content = $stmt->fetchAll();
        return $this->content;

    }
    public function setContent(){

    }
    public function setTitle(){

    }
    public function getTitle(){
    }
    public function getInfo(){
        $stmt = $this->conn->prepare('SELECT * FROM posts WHERE title=?');
        $stmt->execute([$this->title]);
        $this->info = $stmt->fetch();
        return $this->info;
    }

    static public function addNewPost($title,$authorUsername,$content){
        $pdo = new Dbh;
        $conn = $pdo->connect();
        //validate that all the fields are correct
        //info -> title, author
        //content -> content, position,

        //get authorId
        $stmt =$conn->prepare( 'SELECT id FROM authors WHERE username = ?');
        $stmt->execute([$authorUsername]);
        if($stmt->rowCount()===0){
            //author does not exist
            return false;
        }
        $authorId = $stmt->fetch();
        $authorId = $authorId['id'];
        var_dump($authorId);
        $sql = 'INSERT INTO posts (authorId,title)
                VALUES (?,?)';
        $stmt = $conn->prepare($sql);
        
        try{
            $stmt->execute([$authorId,$title]);
            //get the id of the new post
            $sql = 'SELECT id FROM posts WHERE title=?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$title]);
            $postId = $stmt->fetch();
            echo 'post id';
            var_dump($postId);
            $postId = $postId['id'];
            $sql = 'INSERT INTO htmlelements(type, content, position, postId)
                    VALUES (?, ?, ?, ?)';
            var_dump($content);
            foreach($content as $el){
                $stmt = $conn->prepare($sql);
                $stmt->execute([$el->type,$el->content,$el->position,$postId]);
            }
        }catch(Exception $e){
            echo "<h1>";
            echo $e->getMessage();
            echo "</h1>";
            return false;
        }
        return true;
    }

}


//throw new Exception ('Post does not exist');
// $el1 = (object)[
//     'type'=>'subtitle',
//     'content'=>'mysub1',
//     'position'=>'1'
// ];
// $el2 = (object)[
//     'type'=>'text',
//     'content'=>'mysub1',
//     'position'=>'2'
// ];
// $el3 = (object)[
//     'type'=>'subtitle',
//     'content'=>'mysub1',
//     'position'=>'3'
// ];
// $el4 = (object)[
//     'type'=>'subtitle',
//     'content'=>'mysub1',
//     'position'=>'4'
// ];
// $content = [$el1,$el2,$el3,$el4];
// PostHandler::addNewPost('ThirdPost','Skebard',$content);
// echo "<br>";
// echo "<br>";
// try{
//     $post = new PostHandler('Getting started with PHP');
//     var_dump($post->getInfo());
//     echo "NEXT";
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
//     var_dump($post->getAuthor());
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
//     var_dump($post->getContent());
// }catch(Exception $e){
//     echo $e->getMessage();
// }
