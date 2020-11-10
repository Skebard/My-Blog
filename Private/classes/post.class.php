<?php
require 'dbh.class.php';
// the class post provides all the methods to modify/retrieve data from an existing post
class Post extends Dbh
{
    protected $title;
    protected $conn;
    protected $postInfo;
    protected $categories = [];
    protected $author;
    protected $contents;
    function __construct($title)
    {
        $this->title = $title;
        $this->conn = $this->connect();
        $this->getPost(); //get main post info
    }
    public function getPost()
    {
        $sql = 'SELECT * FROM posts WHERE title =?';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->title]);
        $this->postInfo = $stmt->fetch();
        return $this->postInfo;
    }
    static public function postExists($postTitle)
    {
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $postTitle = htmlentities($postTitle);
        $stmt = $conn->prepare('SELECT * FROM posts WHERE title=?');
        $stmt->execute([$postTitle]);
        //check if post exists
        if ($stmt->rowCount() === 0) {
            return false;
        }
        return true;
    }
    public function getAuthor()
    {
        $sql = 'SELECT * FROM authors WHERE id=' . $this->postInfo['authorId'];
        $stmt = $this->conn->query($sql);
        $this->author = $stmt->fetch();
        return $this->author;
    }
    public function setAuthor()
    {
    }
    public function getCategories()
    {

        $sql = 'SELECT name FROM categories t1
        INNER JOIN postCategories t2 ON t2.categoryId = t1.id
        WHERE t2.postId =' . $this->postInfo['id'];
        $stmt = $this->conn->query($sql);

        $this->categories = [];
        while ($category = $stmt->fetch()) {
            array_push($this->categories, $category['name']);
        }
        return $this->categories;
    }
    public function setCategories()
    {
    }
    public function getMainCategory()
    {
        $sql = 'SELECT * FROM categories WHERE id=' . $this->postInfo['mainCategory'];
        $stmt = $this->conn->query($sql);
        $this->mainCategory = $stmt->fetch()['name'];
    }
    public function getContents()
    {
        $sql = 'SELECT * FROM htmlElements WHERE postId = ' . $this->postInfo['id'] . ' ORDER BY position';
        $stmt = $this->conn->query($sql);
        $this->contents = $stmt->fetchAll();
        return $this->contents;
    }

    static public function getAuthorInfo($authorId)
    {
        $sql = 'SELECT * FROM authors WHERE id=?';
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$authorId]);
        return $stmt->fetch();
    }
    //we will get a limited number of posts by category name
    static public function getPostsByCategory($category, $limit,$offset=null,$title)
    {
        //get id of the category
        if (!is_int($limit) || $limit < 1) {
            $limit = 1;
        }
        $sql = 'SELECT * FROM posts
                WHERE mainCategory IN ( SELECT id
                FROM categories
                WHERE name = ?) AND NOT title =?';
        $sql .=' ORDER BY publishingDate ';
        $sql .= 'LIMIT ' . htmlentities($limit);


        if($offset){
            $sql.=' OFFSET '.htmlentities($offset);
        }
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$category,$title]);
        return $stmt->fetchAll();
    }
    static public function getPosts($limit,$offset=null,$title)
    {
        if (!is_int($limit) || $limit < 1) {
            $limit = 1;
        }
        $sql = 'SELECT * FROM posts WHERE NOT title = ?';
        $sql .=' ORDER BY publishingDate ';
        $sql .= 'LIMIT ' . htmlentities($limit);

        if($offset){
            $sql.=' OFFSET '.htmlentities($offset);
        }
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title]);
        return $stmt->fetchAll();
    }
    static public function getCategoryName($categoryId){
        $sql = 'SELECT name FROM categories WHERE id=?';
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$categoryId]);
        return $stmt->fetch()['name'];
    }
}

// $a = Post::getPostByCategory('PHP', 5);
// $b = Post::getPosts(2);
// print_r($b);
// $post = new Post('Laravel');
// $post->getPost();
// echo "<br>";
// var_dump($post->getCategories());