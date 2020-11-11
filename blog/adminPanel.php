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
    <script defer src="../Public/js/adminPanel/app.js"></script>
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
                <div class='create-post-btn'>New post</div>
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
                    ?>

                </div>
            </div>
        </div>


    </main>

    <footer>

    </footer>
</body>

</html>