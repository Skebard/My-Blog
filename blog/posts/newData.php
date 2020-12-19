<?php
//this endpoint provides  the data  that is displayed in the main blog page
require __DIR__.'/../../Private/classes/blog.class.php';

$response = new stdClass;

if(isset($_GET['categories'])){
    $blog = new Blog;
    echo json_encode($blog->getCategories());
}else if(isset($_GET['title'])){
    //
    $postTitle = str_replace('-',' ',$_GET['title']);
    $post = new Post($postTitle);
    $response->postInfo = $post->postInfo;
    $authorInfo = $post->getAuthor();
    unset($authorInfo['password']);
    $response->authorInfo = $authorInfo;
    $response->mainCategory = $post->getMainCategory();
    $response->categories = $post->getCategories();
    $response->postContents = $post->getContents();
    $response->completed = true;
    echo json_encode($response);
    exit();

}
else{
    //we want to get the main info of the latest posts
    $response = new stdClass;
    $limit = $_GET['limit']?? 'undefined';
    $offset = $_GET['offset']?? 'undefined';
    $limit = intval($limit);
    $offset = intval($offset);
    $response->limit = $limit;
    $response->offset =$offset;
    $response->results = [];
    $response->queries = 0;
    $blog = new Blog;
    $posts;
    if(isset($_GET['category']) && $_GET['category']!='All'){
        $category = $_GET['category'];
        $posts = Post::getPostsByCategory($category,$limit,$offset,'','published');
        $response->count = $blog->getNumPosts($category);
        $response->queries +=2;
    }else{
        $posts = Post::getPosts(intval($limit),intval($offset),'','published');
        $response->count = $blog->getNumPosts();
        $response->queries +=2;
    }
    $response->allPosts = [];

    foreach($posts as $post){
        $authorInfo = Post::getAuthorInfo($post['authorId']);
        $response->queries +=1;
        $newPost = new stdClass;
        $newPost->id = 1;
        $newPost->title = $post['title'];

        $file = $post['mainImage'];
        $file_headers = @get_headers($file);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
            $post['mainImage'] = "https://i.imgur.com/YcjzYu0.jpg";
        }
        else {
            $exists = true;
        }

        $newPost->mainImage = $post['mainImage'];
        $newPost->publishingDate = $post['publishingDate'];
        $newPost->body = $post['description'];
        $postIdentifier = str_replace(' ','-',$post['title']);
        $newPost->url = "posts/post.php?id=".$postIdentifier;
        unset($authorInfo['password']);

        //check image is correct 
        //this line is very very slow
        // $img = @file_get_contents($authorInfo['profileImage']);
        // if(!$img){
        //     $authorInfo['profileImage'] = "https://i.imgur.com/wIHZKq1.png";
        // }

        $file = $authorInfo['profileImage'];
        $file_headers = @get_headers($file);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
            $authorInfo['profileImage'] = "https://i.imgur.com/wIHZKq1.png";
        }
        else {
            $exists = true;
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
