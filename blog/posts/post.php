<?php
    require '../../Private/classes/postGenerator.class.php';
    require '../../Private/templates/postHeader.php';


    $postTitle = $_GET['id'];
    $postTitle = str_replace('-',' ',$postTitle);
    if(!Post::postExists($postTitle)){

        echo "<h1>Post does not exist</h1>";
    }else{
        $post = new PostGenerator($postTitle);
        $post->printTitle();
        $post->printAuthor();
        $post->printCategories();
        $post->printContents();
        $post->printRelated();
        $post->closeMain();
  
    }

    require '../../Private/templates/footer.php';
