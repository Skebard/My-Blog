<?php
require '../Private/classes/panelGenerator.class.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Admin panel</title>
    <link rel='stylesheet' href="../Public/css/main2.css">
    <link rel="stylesheet" href="../Public/css/editor.css">
    <link rel='stylesheet' href="../Public/css/adminPanel.css">
    <script defer  type="module" src="../Public/js/adminPanel/app.js"></script>
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/9547750bbd.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>

    </header>
    <main class="max-width">
        <div class="panel-container">
            <aside class='sidebar'>
                <ul class='options'>
                    <li class='active'>Posts</li>
                    <li>Styles</li>
                    <li>Settings</li>
                </ul>
                <div id='create-post-btn-id' class='create-post-btn'>New post</div>
            </aside>
            <div class='main-content'>
                <ul class='legend'>
                    <li>Published <span class='indicator green'></span></li>
                    <li>Draft<span class='indicator blue'></span></li>
                    <li>Deleted<span class='indicator red'></span></li>
                </ul>
                <div class="wrapper">
                    <?php

            $a = new PanelGenerator(1);
            $a->printPublishedTable();
            $a->printDraftTable();
            $a->printDeletedTable();
                    ?>

                </div>
            </div>
        </div>


    </main>
    <div id='modal-create-post-id' class='modal hidden'>
        <div class='modal-content'>;
        <form id = 'create-post-form-id'>
            <input  name='post-title' type="text">
            <input type="submit" value = 'Create'>
        </form>
        <button id='cancel-id'> cancel</button>
        </div>
    </div>

    <footer>

    </footer>
</body>

</html>