<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>My blog</title>
        <link rel='stylesheet' href="../Public/css/main2.css">
        <link rel="stylesheet" href="../Public/css/editor.css">
        <script defer type="module" src="../Public/js/editor/app.js"></script>
        <!--Font awesome-->
        <script  src="https://kit.fontawesome.com/9547750bbd.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>

        </header>
        <main class="max-width">
            <div class = "title-container">
                <small class="title-tag">Title</small>
                <h3 contenteditable="true" class="title-content">Introduce your title</h3>
            </div>
            <div class="category-wrapper">
                <h3>Tags: </h3>
                <button class="btn-add-category" id="btn-add-tag-id">+</button>
                <ul class="category-tags" id='category-tags-id'>
                    <!-- <li>CSS</li>
                    <li>HTML</li> -->
                </ul>

            </div>
            <div >
                <ul id='content-options-id' class="content-options">
                    <!-- <li>Subtitle</li>
                    <li>Text content</li>
                    <li>link</li>
                    <li>bold</li>
                    <li>cursive</li>
                    <li>Image</li>
                    <li>code</li> -->
                </ul>
            </div>
            <div id="post-wrapper" class="post-wrapper">
                <!-- <div class="box">
                    <div class="box-header">
                        <span class="arrows"> 
                            <i class="fas fa-sort-up"></i>
                            <i class="fas  fa-sort-down"></i>
                        </span>
                        <span class="right-container">
                            <span class="content-type">subtitle</span>
                            <i class="fas fa-trash-alt"></i>
                        </span>

                    </div>
                    <div class="box-content" contenteditable="true">
                        Here there is going to be a great content

                    </div>

                </div> -->



            </div>
        </main>
        <div class="modal link-modal hidden" id="link-modal-id">

            <div class='modal-body'>
                <span class="close">X</span>
                <h3>Introduce your link</h3>
                <input type="text" placeholder="your link">
                <button class="btn-add-link">Add link</button>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
