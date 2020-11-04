<?php
//MODIFY CONTENT STRATEGY
// every time we want to modify the content of the post instead of retrieving all the data we just
//delete all content and create all over again



require 'dbh.inc.php';
class Post extends Dbh{ 
    function __construct($post){
        $this->post = $post;
    }

    public static function searchByTag($tag){

    }
    public static function searchByText($text){

    }

    public function validateContent(){

    }
    public function publish(){

    }
    public function withdraw(){

    }
    public function addTag(){

    }
    public function removeTag(){

    }
    public function setMainTag(){

    }

    public function setAuthor(){

    }
    public function getAuthor(){

    }
    public function storePost(){

    }
    public function retrievePost(){
        
     }
}