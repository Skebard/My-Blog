<?php

if(isset($_GET['add-subscription'])){
    try{
        $data = json_decode(file_get_contents('../Private/emails.json'));
        if(!is_array($data)){
            $data = [];
        }
    }catch(Exception $e){
        $data = [];
    }
    array_push($data,$_GET['email']);
    file_put_contents('../Private/emails.json',json_encode($data));
    echo json_encode($data);
}