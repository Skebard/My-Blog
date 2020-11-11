<?php
require 'classes/post.class.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $response = new stdClass;
    $response->completed = false;


    $action = $_POST['action'];
    switch ($action) {
        case 'save':
            //we expect a title, mainCategory, categories and contents
            $title = htmlentities($_POST['title']);
            $mainCategory = htmlentities($_POST['mainCategory']);
            $categories = json_decode($_POST['categories']);
            $contents = json_decode($_POST['contents']);
            $response->data = [$title,$mainCategory,$categories,$contents];
            POST::insertPost($title,1,2);
            var_dump($response);
            break;
        case 'publish':
            break;
        case 'withdraw':
            break;
        default:
            break;
    }
}
