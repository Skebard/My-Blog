<?php


if ( isset($_GET['categories'])){
    $categories = ['any','CSS','javascript','HTML','PHP','MySql','Random'];
    echo json_encode($categories);
    exit();
}


$response = new stdClass;
$limit = $_GET['limit']?? 'undefined';
$offset = $_GET['offset']?? 'undefined';
$response->limit = $limit;
$response->offset =$offset;
$response->results = [];
$response->count = 0;
//mock data
for($i=$offset+1; $i<=($offset+$limit); $i++){
    if($i>18){
        //$response->count = ($offset+$limit)-$i;
        break;
    }
    $response->count+=1;
    $post = new stdClass;
    $post->id = $i;
    $post->title = 'Post title '.$i;
    if(isset($_GET['category'])){
        $post->title .= $_GET['category'];
    }
    $post->url = 'posts/'.$i.".php";
    $post->body = "tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
    rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
    consectetur bibendum. Fusce maximus elit id pretium tincidunt. Etiam vel lorem congue, molestie
    lorem at, congue massa. Aliquam aliquet nibh at magna rutrum commodo. Nullam commodo diam nisi, nec";
    array_push($response->results,$post);
}


echo json_encode($response);