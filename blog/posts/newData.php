<?php
//this endpoint provides  the data  that is displayed in the main blog page
require '../../Private/classes/blog.class.php';

$response = new stdClass;

if(isset($_GET['categories'])){
    $blog = new Blog;
    echo json_encode($blog->getCategories());
}else{
    //we want to get the main info of the latest posts
    $response = new stdClass;
    $limit = $_GET['limit']?? 'undefined';
    $offset = $_GET['offset']?? 'undefined';
    $limit = intval($limit);
    $offset = intval($offset);
    $response->limit = $limit;
    $response->offset =$offset;
    $response->results = [];

    $blog = new Blog;
    $posts;
    if(isset($_GET['category']) && $_GET['category']!='All'){
        $category = $_GET['category'];
        $posts = Post::getPostsByCategory($category,$limit,$offset);
        $response->count = $blog->getNumPosts($category);
    }else{
        $posts = Post::getPosts(intval($limit),intval($offset));
        $response->count = $blog->getNumPosts();
    }
    foreach($posts as $post){
        $authorInfo = Post::getAuthorInfo($post['authorId']);
        $newPost = new stdClass;
        $newPost->id = 1;
        $newPost->title = $post['title'];
        $newPost->mainImage = $post['mainImage'];
        $newPost->publishingDate = $post['publishingDate'];
        $newPost->body = $post['description'];
        $postIdentifier = str_replace(' ','-',$post['title']);
        $newPost->url = "posts/post.php?id=".$postIdentifier;
        unset($authorInfo['password']);

        //check image is correct 
        $img = @file_get_contents($authorInfo['profileImage']);
        if(!$img){
            $authorInfo['profileImage'] = "https://i.imgur.com/wIHZKq1.png";
        }

        $newPost->authorInfo = $authorInfo;
        array_push($response->results,$newPost);
    }
   echo json_encode($response);
}


// id
// title
// url->title separated by dashes
//body
//image
