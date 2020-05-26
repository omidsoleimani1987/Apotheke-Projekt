<?php

session_start();

/**
 * class auto loader:
 */
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

/**
 * config:
 */
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/error_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Fehler</title>
</head>
<body>
    <!-- header start -->
    <header>
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="home_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <!-- header end -->
    <main>
        <!-- error_preview start -->
        <section class="flex container">
            <span><i class="fas fa-exclamation-circle"></i></span>
            <div class="flex">
                <h1 class="title">Ein Fehler ist passiert</h1>
                <h3><?php echo $_GET['message']; ?></h3>
            </div>
        </section>
        <!-- error_preview end -->
    </main>
</body>
</html>