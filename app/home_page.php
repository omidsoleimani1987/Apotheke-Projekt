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

/**
 * check if user is already logged in
 */
userLoginStatus('Bitte loggen Sie zuerst ein.');
/**
 * check if there is a message of successful operation :
 */
checkMessage();

/**
 * reset some sessions :
 */
$_SESSION['libraryFilename'] = '';
$_SESSION['libraryFileExtension'] = '';
$_SESSION['libraryFilepath'] = '';
$_SESSION['fileTableName'] = '';
$_SESSION['medId'] = '';
$_SESSION['resetPasswordEmail'] = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/css/home_page.css">
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <script src="https://kit.fontawesome.com/2afc0aa7f0.js" crossorigin="anonymous"></script>
    <title>Start Seite</title>
</head>
<body>
    <!-- sidebar start -->
    <span id="home_icon" style="cursor:pointer" onclick="openNav()">&#9776;</span>
    <div class="background"></div>
    <aside>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h1 class="welcome">Willkommen <?php echo ucfirst(strtolower($_SESSION['firstname']))?></h1>
            <a class="a" href="editprofile_page.php" style="display:block; width:30%;"><i class="fas fa-user-edit"></i> Profil bearbeiten</a>
            <a class="a" href="uploadfile_page.php" style="display:block; width:30%;"><i class="fas fa-cloud-upload-alt"></i> Excel file hochladen</a>
            <a class="a" href="../excel template/sample.xlsx" download style="display:block; width:30%;"><i class="far fa-file-excel"></i> Excel Beispiel herunterladen</a>
            <a class="a" href="searchfile_page.php" style="display:block; width:30%;"><i class="fas fa-search"></i> Aufteilungen suchen</a>
            <a class="a" href="seeall_page.php" style="display:block; width:30%;"><i class="far fa-eye"></i> Alle Aufteilungen</a>
            <?php if($_SESSION['userposition'] === 'admin') {
                echo '<a class="a" href="seeusers_page.php" style="display:block; width:30%;"><i class="fas fa-users"></i> Benutzer ansehen</a>';
            }?>
            <?php if($_SESSION['userposition'] === 'admin') {
                echo '<a class="a" href="changecode_page.php" style="display:block; width:30%;"><i class="fas fa-key"></i> Den Code wechseln</a>';
            }?>
            <a class="a" href="logout_page.php" style="display:block; width:30%;"><span style="color: #ff0000;"><i class="fas fa-power-off"></i></span> Abmelden</a>
        </div>
    </aside>
    <!-- sidebar end -->
    <script src="../script/home_page.js"></script>
</body>
</html>