<?php
require_once 'dbh.class.php';
class Category{
    static public function getCategoryId($name){
        $sql = 'SELECT id FROM categories WHERE name =?';
        $pdo = new Dbh;
        $conn = $pdo->connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name]);
        $category = $stmt->fetch();
        return $category['id'];
    }
}