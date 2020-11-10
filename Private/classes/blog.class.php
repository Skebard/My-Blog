<?php
require 'post.class.php';
class Blog extends Dbh
{
    public function getCategories()
    {
        $sql = 'SELECT name FROM categories';
        $conn = $this->connect();
        $stmt = $conn->query($sql);
        return array_map(fn ($category) => $category['name'], $stmt->fetchAll());
    }
    public function searchPost($text)
    {
        $sql = 'SELECT * FROM posts WHERE title LIKE "%' . htmlentities($text) . '%" ORDER BY publishingDate';
        $conn = $this->connect();
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
    }
    public function getNumPosts($category = null)
    {
        $sql = 'SELECT COUNT(id) as NumberOfPosts FROM posts';
        $conn = $this->connect();
        if ($category) {
            $sql .= ' WHERE mainCategory IN (SELECT id FROM categories WHERE name =?)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$category]);
        }else{
            $stmt = $conn->query($sql);
        }
        return $stmt->fetch();
    }
}
