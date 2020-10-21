<?php
require "../Private/templates/header.php";
?>
<main>
    <div class="title-wrapper">
        <h1 class="page-title noselect">Blog</h1>
    </div>

    <div id="posts-overview-id" class="page-wrapper">
        <div class='search-wrapper'>
            <input type='text' placeholder="Search">
            <i class="fas fa-search"></i>
        </div>
        <ul class="categories-tags center max-width">
            <li>Javascript</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>PHP</li>
            <li>MySql</li>
            <li>Random</li>
        </ul>
        <div id="posts-container-id" class="posts-container center max-width">
            <ul class="posts-page">
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">Creating a CMS for a blog</h2>
                        <div class="post-body">
                            <div>
                                <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                                <a href="#">Read More >></a>
                            </div>
                            <div class="author-info">
                                <a href="#"><img class="author-photo" src="../Public/images/authorAntonioJorda2.png" alt="profile photo"></a>
                                <div>
                                    <h4><span class="author-name">Antonio Jorda</span></h4>
                                    <h5 class="email">Oct 13, 2020 11:44:14 AM</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="posts-page hidden">
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
                <li class="post-summary">
                    <img src="https://picsum.photos/650/500?t=1" alt="post-image">
                    <div class="post">
                        <h2 class="post-title">POST TITLE</h2>
                        <div class="post-body">
                            <p class="fade">The term “micro content” is something I started using three or four years ago. The notion was: content made specifically for the platform. You know, the videos, the pictures, the quotes, the written words that work on Faceb</p>
                            <a href="#">Read More >></a>
                        </div>
                    </div>
                </li>
            </ul>

            <ul id="test-posts" class="posts-page ">

            </ul>


        </div>
        <div class="load-more center">
            <button class="center btn-load-more">load more </button>
            <i class="fas fa-angle-double-down"></i>
        </div>


    </div>
</main>

<?php
require "../Private/templates/footer.php";
