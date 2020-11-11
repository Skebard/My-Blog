<?php
require 'post.class.php';
//! NOW a single admin will take all the posts but it the next versions
//each admin will display its own 

class PanelGenerator
{
    public $posts;
    public function __construct($authorId)
    {
        $this->posts = Post::getPostsByAuthorId($authorId);
    }
    public function printPublishedTable()
    {
        //var_dump($this->posts);
        $html = '<div class="table published ">';
        $header =['Title','Publishing date','Creation date'];
        $html .= $this->createTableHeader('green',$header);
        foreach($this->posts as $post){
            $params = [$post['title'],$post['publishingDate'],$post['creationDate']];
            $html .= $this->createRow($params);
        }
        $html .='</div>';
        echo $html;
    }
    public function printDraftTable()
    {
    }
    public function printDeletedTable()
    {
    }
    private function createRow($params)
    {
        $html = '<div class="row post">';
        foreach ($params as $param) {
            $html .= '<div class="cell">'
                . htmlentities($param) . '</div>';
        }
        $html .= '</div>';
        return $html;
    }
    private function createTableHeader($color, $params)
    {
        $html = '<div class="row header' . $color . ' green">';
        foreach ($params as $param) {
            $html .= '<div class="cell">'
                . htmlentities($param) .
                '</div>';
        }
        $html .= '</div>';
        return $html;
    }
}


