<?php
require '../../Private/templates/postHeader.php';
?>
<main>
    <div class="single-post active">
        <div class="poster-post">

        </div>
        <div class="post-content max-width">
            <h1 class="post-title">POST asdfasdf asfda asdf asdfa asdfas title</h1>
            <div class='post-info'>
                <div class="author-info">
                    <a href="#"><img class="author-photo" src="../../Public/images/authorAntonioJorda2.png" alt="profile photo"></a>
                    <div>
                        <h4><span class="author-name">Antonio Jorda</span></h4>
                        <h5 class="email">Oct 13, 2020 11:44:14 AM</h5>
                    </div>

                </div>
                <ul class='categories-tags'>
                    <li class="main-category-tag">Javascript</li>
                    <li>HTML</li>
                    <li>CSS</li>
                </ul>
            </div>


            <p class="text-content">
                tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
                rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
                consectetur bibendum. Fusce maximus elit id pretium tincidunt. Etiam vel lorem congue, molestie
                lorem at, congue massa. Aliquam aliquet nibh at magna rutrum commodo. Nullam commodo diam nisi, nec
                placerat mi eleifend efficitur. Aliquam er
            </p>
            <h2 class="subtitle">My Subtitle</h2>
            <p class="text-content">
                tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
                rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
                consectetur bibendum. Fusce maximus elit id pretium tincidunt. Etiam vel lorem congue, molestie
                lorem at, congue massa. Aliquam aliquet nibh at magna rutrum commodo. Nullam commodo diam nisi, nec
                placerat mi eleifend efficitur. Aliquam er
            </p>
            <h2 class="subtitle">My Subtitle</h2>
            <div class="comments-container">
                <h2 class="comments-title">Comments <button class="btn-comments show">show</button></h2>
                <ul class="comments">
                    <li>
                        <h4 class="comment-name">Comment name</h4>
                        <p>tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
                            rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
                            consectetur bibendum.</p>
                        <small class="comment-email">email@gmail.com</small>
                    </li>
                    <li>
                        <h4 class="comment-name">Comment name</h4>
                        <p>tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
                            rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
                            consectetur bibendum.</p>
                        <small class="comment-email">email@gmail.com</small>
                    </li>
                    <li>
                        <h4 class="comment-name">Comment name</h4>
                        <p>tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
                            rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
                            consectetur bibendum.</p>
                        <small class="comment-email">email@gmail.com</small>
                    </li>
                    <li>
                        <h4 class="comment-name">Comment name</h4>
                        <p>tur urna. Mauris sit amet neque eget ligula facilisis convallis. Integer facilisis dui erat, vitae
                            rhoncus ipsum mollis nec. Nunc dapibus eleifend enim ac faucibus. Aenean vestibulum libero nec lorem
                            consectetur bibendum.</p>
                        <small class="comment-email">email@gmail.com</small>
                    </li>

                </ul>
                <div class="add-comment-wrapper">
                    <form id="add-comment-form-id" class="add-comment-form" >
                        <legend>Add your comment</legend>
                        <label for="" >Your name</label>
                        <input type="text" maxlength="30" minlength="5" name="name" required>
                        <label for=""  >E-mail</label>
                        <input type="email"  name="email" required>
                        <label for="">Comment</label>
                        <textarea name="comment-content" required></textarea>
                        <input type="submit" value="Submit comment">
                    </form>
                </div>
               
            </div>
        </div>
        <div class='max-width center '>
            <h2 class='related-title'> Related</h2>
            <ul class="related-posts-wrapper">
                <li>
                    <img src='https://picsum.photos/250/200?t=2'>
                    <div class="main-category">PHP</div>
                    <div class="related-post-info">
                        <h4 class="title">Making incredible things with PHP</h4>
                        <h5 class="email">Oct 13, 2020 11:44:14 AM</h5>


                        <div class="author-info">
                            <div class="author-info-align">
                                <a href="#"><img class="author-photo" src="../../Public/images/authorAntonioJorda2.png" alt="profile photo"></a>
                                <h4><span class="author-name">Antonio Jorda</span></h4>
                            </div>

                        </div>

                    </div>
                </li>
                <li>
                    <img src='https://picsum.photos/250/200?t=2'>
                    <div class="main-category">CSS</div>
                    <div class="related-post-info">
                        <h4 class="title">Breathtaking effects with CSS</h4>
                        <h5 class="email">Oct 13, 2020 11:44:14 AM</h5>


                        <div class="author-info">
                            <div class="author-info-align">
                                <a href="#"><img class="author-photo" src="../../Public/images/authorAntonioJorda2.png" alt="profile photo"></a>
                                <h4><span class="author-name">Antonio Jorda</span></h4>
                            </div>

                        </div>

                    </div>
                </li>
                <li>
                    <img src='https://picsum.photos/250/200?t=2'>
                    <div class="main-category">javascript</div>
                    <div class="related-post-info">
                        <h4 class="title">Starting with ES6</h4>
                        <h5 class="email">Oct 13, 2020 11:44:14 AM</h5>


                        <div class="author-info">
                            <div class="author-info-align">
                                <a href="#"><img class="author-photo" src="../../Public/images/authorAntonioJorda2.png" alt="profile photo"></a>
                                <h4><span class="author-name">Antonio Jorda</span></h4>
                            </div>

                        </div>

                    </div>
                </li>



            </ul>
        </div>

    </div>
</main>
<div id="modal-comment-sent-id" class='modal-comment-sent hidden'>
                    <div class="modal-background">
                    </div>
                    <h2 class="message">
                        Thanks for your comment.<br>
                        It will be  revised and published within 48 hours.
                    </h2>

                </div>

<?php
require '../../Private/templates/footer.php';
