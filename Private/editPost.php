<?php
require 'classes/post.class.php';
require 'classes/category.php';

$author =1;     //! get author
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $response = new stdClass;
    $response->completed = false;


    $action = $_POST['action'];
    switch ($action) {
        case 'save':
            //we expect a title, mainCategory, categories and contents
            $postId = $_POST['id'];
            $title = htmlentities($_POST['title']);
            $mainCategory = htmlentities($_POST['mainCategory']);
            $description = $_POST['description'];
            $mainImage = $_POST['mainImage'];
            $categories = json_decode($_POST['categories']);
            $contents = json_decode($_POST['contents']);
            $response->data = [$title,$mainCategory,$categories,$contents];
            $mainCategory = Category::getCategoryId($mainCategory);
            Post::updatePost($postId,$title,$mainImage,$description,$mainCategory,$categories,$contents);
            var_dump($response);
            break;
        case 'publish':
            Post::publish($_POST['id']);
            break;
        case 'withdraw':
            break;
        case 'create':
            $title = htmlentities($_POST['title']);
            $mainCategory=2;
            Post::insertPost($title,$author,$mainCategory);
        break;
        default:
            break;
    }
}
