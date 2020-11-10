<?php
$url = 'https://i.imgur.com/XsEbYUnk.jpg';
 
//Use file_get_contents to GET the URL in question.
try{
    $contents = @file_get_contents($url);
}catch(Exception $e){
    $e->getMessage();
}
 
//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    //echo $contents;
    echo 'workds';
}else{
    echo 'nothing';
}

// class Padre{
//     protected $name;
//     function __construct($name){
//         $this->name = $name;
//     }
//     public function getName(){
//         return $this->name;
//     }
// }

// class Hijo extends Padre{

//     public function sayHi(){
//         return 'hi';
//     }
// }
// $h = new Hijo('toni');
// echo $h->getName();

// require '../Private/classes/postGenerator.class.php';
// $a = new PostGenerator('Laravel');
// $a->printRelated();

// require '../Private/classes/blog.class.php';
// $blog = new Blog;
// // var_dump($blog->searchPost('o'));
// // var_dump($blog->getCategories());
// var_dump(Post::getPosts(5,2));



