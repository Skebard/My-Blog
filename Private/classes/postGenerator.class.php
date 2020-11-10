<?php
require 'post.class.php';
//The post generator
class PostGenerator extends Post
{
    protected $mainCategory;
    protected $categories;
    protected $title;
    protected $author;
    protected $postFile;
    //For the paths we have to take into account that the post files will be stored under the folders blog/posts
    const POSTS_REL_PATH = '../blog/posts';
    const POST_HEADER_PATH = '../../Private/templates/postHeader.php';
    const POST_FOOTER_PATH = '../../Private/templates/footer.php';
    const RELATED_POSTS_PATH = '../../Private/templates/relatedPosts.php';
    const NUM_RELATED_POSTS = 3;
    /**
     * Creates a file. The file will have the same name as the title but replacing spaces for dashes( - )
     */
    public function createFile()
    {
        echo 'FILE NAME:   ';
        echo $this->title;
        echo " END NAME";
        $fileName = str_replace(" ", "-", $this->title);
        $fileName .= '.php';
        $this->postFile = fopen(self::POSTS_REL_PATH . "/" . $fileName, 'w');
        fwrite($this->postFile, "<?php\n");
    }
    public function appendHeader()
    {
        fwrite($this->postFile, $this->requireStmt(self::POST_HEADER_PATH));
    }
    public function appendTitle()
    {
        $html = '<main>
        <div class="single-post active">
            <div class="poster-post">
    
            </div>
            <div class="post-content max-width">
                <h1 class="post-title">POST asdfasdf asfda asdf asdfa asdfas title</h1>
                <div class="post-info">
                    <div class="author-info">
                        <a href="#"><img class="author-photo" src="../../Public/images/authorAntonioJorda2.png" alt="profile photo"></a>
                        <div>
                            <h4><span class="author-name">Antonio Jorda</span></h4>
                            <h5 class="email">Oct 13, 2020 11:44:14 AM</h5>
                        </div>
    
                    </div>
                    <ul class="categories-tags">
                        <li class="main-category-tag">Javascript</li>
                        <li>HTML</li>
                        <li>CSS</li>
                    </ul>
                </div>';
        fwrite($this->postFile, $html);
    }
    public function appendContent($contents)
    {
    }
    public function appendRelated()
    {
        fwrite($this->postFile, $this->requireStmt(self::RELATED_POSTS_PATH));
    }
    public function appendFooter()
    {
        fwrite($this->postFile, $this->requireStmt(self::POST_FOOTER_PATH));
        //add code to trigger the code
    }
    public function closeFile()
    {
        fclose($this->postFile);
    }
    public function requireStmt($path)
    {
        return "require '" . $path . "';\n";
    }
    public function appendAuthor()
    {
    }
    public function appendCategories()
    {
    }
    public function appendText($text)
    {
        $html = "<p class='text-content'>" . $text . "</p>";
        return $html;
    }
    public function appendSubtitle($text)
    {
        $html = "<h2 class='subtitle'>" . $text . "</h2>";
        return $html;
    }
    public function appendImage()
    {
    }
    public function appendSubtitle2()
    {
    }
    public function appendCode($lang)
    {
    }

    public function printTitle()
    {
        echo '<main>
        <div class="single-post active">
            <div class="poster-post">
            </div>
            <div class="post-content max-width">
                <h1 class="post-title">' . $this->postInfo['title'] . '</h1>';
    }
    public function printCategories()
    {
        $this->getCategories();
        $this->getMainCategory();
        $html =  '<ul class="categories-tags">
        <li class="main-category-tag">' . $this->mainCategory . '</li>';
        foreach ($this->categories as $category) {
            $html .= '<li>' . $category . '</li>';
        }
        $html .= '</ul>
        </div>';
        echo $html;
    }
    public function printAuthor()
    {
        $this->getAuthor();
        echo ' <div class="post-info">
        <div class="author-info">
            <a href="../../about/"><img class="author-photo" src="' . $this->author['profileImage'] . '" alt="profile photo"></a>
            <div>
                <h4><span class="author-name">' . $this->author['firstName'] . " " . $this->author['lastName1'] . '</span></h4>
                <h5 class="email">' . $this->postInfo['publishingDate'] . '</h5>
            </div>
        </div>';
    }


    public function printText($text)
    {
        echo '<p class="text-content">' . $text . '<p>';
    }
    public function printSubtitle($text)
    {
        echo '<h2 class="subtitle">' . $text . '</h2>';
    }
    public function printContents()
    {
        $this->getContents();
        foreach($this->contents as $content){
            switch ($content['type']) {
                case 'text':
                    $this->printText($content['content']);
                    break;
                case 'subtitle':
                    $this->printSubtitle($content['content']);
                    break;
                default:
                    break;
            }
        }

    }
    public function printRelated(){
        //get 3 posts related with the main topic or secondary amd if not any topic
        $related = Post::getPostsByCategory($this->mainCategory,PostGenerator::NUM_RELATED_POSTS,0,$this->title);
        $numFound = count($related);
        if($numFound<PostGenerator::NUM_RELATED_POSTS){
            $moreRelated = POST::getPosts(PostGenerator::NUM_RELATED_POSTS-$numFound,0,$this->title);
        $related = array_merge($related,$moreRelated);
        }
        $html = '        <div class="max-width center ">
        <h2 class="related-title"> Related</h2>
        <ul class="related-posts-wrapper">';

        foreach($related as $post){
            $authorInfo = Post::getAuthorInfo($post['authorId']);
            //in case it does not exist we do not want to show a warning that is why we put a @
            $img = @file_get_contents($authorInfo['profileImage']);
            if(!$img){
                $authorInfo['profileImage'] = "https://i.imgur.com/wIHZKq1.png";
            }
            $mainCategory = Post::getCategoryName($post['mainCategory']);
            $url = "?id=". str_replace(' ','-',$post['title']);
            $html .='  <li>
            <a href = "'.$url.'"><img src="'.$post['mainImage'].'"></a>
            <div class="main-category">'.$mainCategory.'</div>
            <div class="related-post-info">
                <a href = "'.$url.'" ><h4 class="title">'.$post['title'].'</h4><a>
                <h5 class="email">'.$post['publishingDate'].'</h5>


                <div class="author-info">
                    <div class="author-info-align">
                        <a href="../../about/"><img class="author-photo" src="'.$authorInfo['profileImage'].'" alt="profile photo"></a>
                        <h4><span class="author-name">'.$authorInfo['firstName']." ".$authorInfo['lastName1'].'</span></h4>
                    </div>

                </div>

            </div>
        </li>';
        }

        $html .= '</ul>
                </div>';
        echo $html;
    }
    public function closeMain()
    {
        echo '</div></main>';
    }
    public function printFooter()
    {
    }
}

