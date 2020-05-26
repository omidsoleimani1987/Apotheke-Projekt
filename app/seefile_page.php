<?php
session_start();

//class auto loader:
require $_SERVER["DOCUMENT_ROOT"].'/includes/autoloader.inc.php';

//config:
require $_SERVER["DOCUMENT_ROOT"].'/includes/config.inc.php';

// check if user is logged in
userLoginStatus('Bitte loggen Sie zuerst ein.');

// check if user reach this page from searchfile_page.php or not:
searchfileStatus('Bitte suchen Sie zuerst eine Ware aus');

//first: with this id ($_GET['id']) we search into "buy" table from DB for the name of the file with this id:
//second: with the file name, we find the table in DB, and then  we read the records of table and show them as a table to user: 
$id = $_GET['id'];
$seefileobject = new SeeFile;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/seefile_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Aufteilung ansehen</title>
</head>
<body>
    <header>    
        <span id="pill-icon"><i class="fas fa-capsules"></i></span>
        <span id="back-icon"><a href="searchfile_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <main class="flex">
        <section class="flex section">
            <a class="link-button" href="searchwork_page.php">Anfangen</a>
        </section>
        <section class="flex section">
            <table>
                <tr id="header">
                    <th>ID</th>
                    <th>PZN</th>
                    <th>Bezeichnung</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                    <th>Adler</th>
                    <th>Billroth</th>
                    <th>Citygate</th>
                    <th>Hoffnung</th>
                    <th>Retz</th>
                    <th>Wienerberg</th>
                    <th>Phönix</th>
                    <th>Kwizda</th>
                    <th>Herba</th>
                    <th>Summe</th>
                </tr>
                <?php $seefileobject->showTabledata($id); ?>
            </table>
        </section>
    </main>
</body>
</html>

