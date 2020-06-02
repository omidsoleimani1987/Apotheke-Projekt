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
 * check if user is logged in
 */
userLoginStatus('Bitte loggen Sie zuerst ein.');

/**
 * set the name of the table from DB to use it in the next pages
 */
$tableName = $_SESSION['fileTableName'];
/**
 * validation:
 */
$mainobject = new Main;
/**
 * these two if conditions to prevent errors when the user send the post and the form action refers to same page , so we will not have error because of not defined variable $_GET['medId']
 */
if(count($_POST) > 0) {
    $_GET['medId'] = '';
    $tableName = $_SESSION['fileTableName'];
    $medId = $_SESSION['medId'];
    $postArray = $_POST;

    $mainobject->postInfo($tableName, $medId, $postArray);
    
    header ('location: searchwork_page.php');
}
/**
 * fixing the error of not define variable of GET when we come to this page again after submitting the form
 */
if($_GET['medId'] != '') {
    $medId = $_GET['medId'];
    $_SESSION['medId'] = $medId;
} else {
    $medId = $_SESSION['medId'];
}
/**
 * get actual information of DB about the table and show it in page before sending the post
 */
$ResultArray = $mainobject->readMed($tableName, $medId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="omid soleimani" />
    <link href="../style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/css/main_page.css" />
    <link rel="stylesheet" href="../style/css/fonts.css" />
    <script defer src="../style/fontawesome/js/all.js"></script>
    <title>Hauptseite</title>
</head>
<body>
    <!-- header start -->
    <header>
        <span id="back-icon"><a href="searchwork_page.php"><i class="fas fa-arrow-circle-left"></i></a></span>
    </header>
    <!-- header end -->
    <main>
        <!-- form (with some infos inside it) start -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
            <div class="first">
                <div class="container" id="one">
                    <div class="container">
                        <h1><?php echo $ResultArray['Bezeichnung'];?></h1>
                        <h3>PZN: <?php echo $ResultArray['pzn'];?></h3>
                        <h3><?php echo $ResultArray['Menge'];?> <?php echo $ResultArray['Einheit'];?></h3>
                        <h3>Ablauf : <input type="text" id="ablauf" name="Datum" value="<?php echo strval($ResultArray['Datum']);?>" autofocus="autofocus"/></h3>
                        <h3>Charge : <input type="text" id="charge" name="Charge" value="<?php echo strval($ResultArray['Charge']);?>"/></h3>
                    </div>
                    <div class="container">
                        <h3>Bestellt : <?php echo intval($ResultArray['Summe_k']);?></h3>
                        <h3>Bekommt : <?php echo intval($ResultArray['Summe_v']);?></h3>
                        <h3>Übrig : <?php echo intval($ResultArray['Summe_k']) - intval($ResultArray['Summe_v']);?></h3>
                    </div>
                </div>
                <div class="container" id="two">
                    <div class="container">
                        <h3>Abgelaufen:</h3>
                        <input type="text" name="Ablauf" value="<?php echo strval($ResultArray['Ablauf']);?>"/>
                    </div>
                    <div class="container">
                        <h3>Zu viel:</h3>
                        <input type="text" name="Viel" value="<?php echo strval($ResultArray['Viel']);?>"/>
                    </div>
                    <div class="container">
                        <h3>Beschädigt:
                        </h3><input type="text" name="Kaput" value="<?php echo strval($ResultArray['Kaput']);?>"/>
                    </div>
                    <div class="container">
                        <h3>Andere:</h3>
                        <input type="text" name="Andere" value="<?php echo strval($ResultArray['Andere']);?>"/>
                    </div>
                </div>
            </div>
            <div class="second" id="small_company">
                <div class="container" id="adler">
                    <h3>Adler</h3>
                    <h3>bestellt: <span id="adler_k"><?php echo intval($ResultArray['adler_k']); ?></span></h3>
                    <h3>bekommt: <span id="adler_v"><?php echo intval($ResultArray['adler_v']); ?></span></h3>
                    <h3>übrig: <span id="adler_rest"><?php echo (intval($ResultArray['adler_k']) - intval($ResultArray['adler_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="adler_v" id="adler_input"/>
                </div>
                <div class="container" id="billroth">
                    <h3>Billroth</h3>
                    <h3>bestellt: <span id="billroth_k"><?php echo intval($ResultArray['billroth_k']); ?></span></h3>
                    <h3>bekommt: <span id="billroth_v"><?php echo intval($ResultArray['billroth_v']); ?></span></h3>
                    <h3>übrig: <span id="billroth_rest"><?php echo (intval($ResultArray['billroth_k']) - intval($ResultArray['billroth_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="billroth_v" id="billroth_input"/>
                </div>
                <div class="container" id="citygate">
                    <h3>Citygate</h3>
                    <h3>bestellt: <span id="citygate_k"><?php echo intval($ResultArray['citygate_k']); ?></span></h3>
                    <h3>bekommt: <span id="citygate_v"><?php echo intval($ResultArray['citygate_v']); ?></span></h3>
                    <h3>übrig: <span id="citygate_rest"><?php echo (intval($ResultArray['citygate_k']) - intval($ResultArray['citygate_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="citygate_v" id="citygate_input"/>
                </div>
                <div class="container" id="hoffnung">
                    <h3>Hoffnung</h3>
                    <h3>bestellt: <span id="hoffnung_k"><?php echo intval($ResultArray['hoffnung_k']); ?></span></h3>
                    <h3>bekommt: <span id="hoffnung_v"><?php echo intval($ResultArray['hoffnung_v']); ?></span></h3>
                    <h3>übrig: <span id="hoffnung_rest"><?php echo (intval($ResultArray['hoffnung_k']) - intval($ResultArray['hoffnung_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="hoffnung_v" id="hoffnung_input"/>
                </div>
                <div class="container" id="retz">
                    <h3>Retz</h3>
                    <h3>bestellt: <span id="retz_k"><?php echo intval($ResultArray['retz_k']); ?></span></h3>
                    <h3>bekommt: <span id="retz_v"><?php echo intval($ResultArray['retz_v']); ?></span></h3>
                    <h3>übrig: <span id="retz_rest"><?php echo (intval($ResultArray['retz_k']) - intval($ResultArray['retz_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="retz_v" id="retz_input"/>
                </div>
                <div class="container" id="wienerberg">
                    <h3>Wienerberg</h3>
                    <h3>bestellt: <span id="wienerberg_k"><?php echo intval($ResultArray['wienerberg_k']); ?></span></h3>
                    <h3>bekommt: <span id="wienerberg_v"><?php echo intval($ResultArray['wienerberg_v']); ?></span></h3>
                    <h3>übrig: <span id="wienerberg_rest"><?php echo (intval($ResultArray['wienerberg_k']) - intval($ResultArray['wienerberg_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="wienerberg_v" id="wienerberg_input"/>
                </div>
            </div>
            <div class="second" id="big_company">
                <div class="container" id="phönix">
                    <h3>Phönix</h3>
                    <h3>bestellt: <span id="phönix_k"><?php echo intval($ResultArray['phönix_k']); ?></span></h3>
                    <h3>bekommt: <span id="phönix_v"><?php echo intval($ResultArray['phönix_v']); ?></span></h3>
                    <h3>übrig: <span id="phönix_rest"><?php echo (intval($ResultArray['phönix_k']) - intval($ResultArray['phönix_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="phönix_v" id="phönix_input"/>
                </div>
                <div class="container" id="kwizda">
                    <h3>Kwizda</h3>
                    <h3>bestellt: <span id="kwizda_k"><?php echo intval($ResultArray['kwizda_k']); ?></span></h3>
                    <h3>bekommt: <span id="kwizda_v"><?php echo intval($ResultArray['kwizda_v']); ?></span></h3>
                    <h3>übrig: <span id="kwizda_rest"><?php echo (intval($ResultArray['kwizda_k']) - intval($ResultArray['kwizda_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="kwizda_v" id="kwizda_input"/>
                </div>
                <div class="container" id="herba">
                    <h3>Herba</h3>
                    <h3>bestellt: <span id="herba_k"><?php echo intval($ResultArray['herba_k']); ?></span></h3>
                    <h3>bekommt: <span id="herba_v"><?php echo intval($ResultArray['herba_v']); ?></span></h3>
                    <h3>übrig: <span id="herba_rest"><?php echo (intval($ResultArray['herba_k']) - intval($ResultArray['herba_v'])); ?></span></h3>
                    <input type="number" pattern="[1-9-]+" name="herba_v" id="herba_input"/>
                </div>
            </div>
            <div class="third flex">
                <input type="submit" value="Send">
            </div>
        </form>
        <!-- form end -->
    </main>
    <script src="../script/main_page.js"></script>
</body>
</html>