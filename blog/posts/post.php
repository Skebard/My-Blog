<?php
    require '../../Private/classes/postGenerator.class.php';
    require '../../Private/templates/postHeader.php';

    echo "<script> let ti = ".microtime(true).";</script>";
    $postTitle = $_GET['id'];
    $postTitle = str_replace('-',' ',$postTitle);
    if(!Post::postExists($postTitle)){

        echo "<h1>Post does not exist</h1>";
        exit();
    }else if(Post::postStatus($postTitle)!=='published'){
        echo "<h1>Post does not exist</h1>";
        exit();
    }
    else{
        $post = new PostGenerator($postTitle);
        $post->printTitle();
        $post->printAuthor();
        $post->printCategories();
        $post->printContents();
        $post->printRelated();
        $post->closeMain();
  
    }
    echo "<script> let tf = ".microtime(true).";</script>";
    echo "<script> let tt = parseInt(tf)-parseInt(ti);</script>";

    require '../../Private/templates/footer.php';
