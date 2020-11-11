<?php
    require '../../Private/classes/postGenerator.class.php';
    require '../../Private/templates/postHeader.php';

    echo "<script> let ti = ".microtime(true).";</script>";
    $postTitle = $_GET['id'];
    $postTitle = str_replace('-',' ',$postTitle);
    if(!Post::postExists($postTitle)){

        echo "<h1>Post does not exist</h1>";
    }else{
        echo "<script> let tf1 = ".microtime(true).";</script>";
        $post = new PostGenerator($postTitle);
        echo "<script> let tf2 = ".microtime(true).";</script>";
        $post->printTitle();
        $post->printAuthor();
        $post->printCategories();
        echo "<script> let tf3 = ".microtime(true).";</script>";
        $post->printContents();
        echo "<script> let tf4 = ".microtime(true).";</script>";
        $post->printRelated();
        echo "<script> let tf5 = ".microtime(true).";</script>";
        $post->closeMain();
  
    }
    echo "<script> let tf = ".microtime(true).";</script>";
    echo "<script> let tt = parseInt(tf)-parseInt(ti);</script>";

    require '../../Private/templates/footer.php';
