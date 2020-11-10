<?php
//Endpoint to retrieve a post
//we will get the author from the session


require 'classes/postHandler.php';
if($_SERVER['REQUEST_METHOD']!=='POST'){
    echo "wrong method";
    exit();
}else{
    if(!isset($_POST['action'],$_POST['title'],$_POST['author-username'],$_POST['contents'])){
        echo 'not everything set';
        exit();
    }
}




$action = $_POST['action'];
$title = $_POST['title'];
$authorUsername= $_POST['author-username'];
$contents = json_decode($_POST['contents']);


echo "contents: ";
var_dump($contents);
//PostHandler::addNewPost($title,$authorUsername,$contents);
$response = new stdClass;


$post = new PostHandler($title);
$post->publish();

$response->info = $post->getInfo();
$response->author = $post->getAuthor();
$response->content = $post->getContent();

echo json_encode($response);


